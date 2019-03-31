<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Menu Controller
 *
 * @property \App\Model\Table\MenuTable $Menu
 *
 * @method \App\Model\Entity\Menu[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenuController extends AppController
{

    public function beforeFilter(Event $event) {
        if ($this->Auth->user('loainguoidung_id') > 2) {
            $this->redirect('/admin/');
        }
    }
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $type_view = $this->request->getData('type_view');
        $status = $this->request->getData('status');
        $menu = $this->Menu->find('all');
        if($type_view == 1)
        {
            $menu = $menu->order(['position']);
        }
        if($type_view == 2)
        {
            $menu = $menu->order(['position' => 'DESC']);
        }
        if($status != '')
        {
            $menu->andWhere(['status =' => $status]);
        }
        $settings = [
           'limit' => 7
         ];
        $menu = $this->paginate($menu,$settings);
        $this->set(compact('menu'));
    }

    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $menu = $this->Menu->newEntity();
        if ($this->request->is('post')) {
            $menu2 = $this->Menu->find('all')->order(['position' => 'DESC'])->toArray();
            $position = $menu2[0]->position + 1;
            $menu2 = $this->Menu->findByPosition($this->request->getData('position'))->toArray();
            if($menu2 != null)
            {
                $menu2= $menu2[0];
                $menu2->position = -1;
                $this->Menu->save($menu2); 
            }
            $menu = $this->Menu->patchEntity($menu, $this->request->getData());
            if ($this->Menu->save($menu)) {
                if($menu2 != null)
                {
                    $menu2->position = $position;
                    $this->Menu->save($menu2);  
                }
                $this->Flash->success(__('Thêm menu thành công'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu could not be saved. Please, try again.'));
        }
        $this->set(compact('menu'));
    }

    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $menu = $this->Menu->get($id, [
            'contain' => []
        ]);
        $old_position = $menu->position;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menu2 = $this->Menu->findByPosition($this->request->getData('position'))->toArray();
            if($menu2 != null)
            {
                $menu2= $menu2[0];
                $menu2->position = -1;
                $this->Menu->save($menu2); 
            }
            $menu = $this->Menu->patchEntity($menu, $this->request->getData());
            if ($this->Menu->save($menu)) {
                if($menu2 != null)
                {
                    $menu2->position = $old_position;
                    $this->Menu->save($menu2);  
                }
                $this->Flash->success(__('Cập nhật menu thành công'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu could not be saved. Please, try again.'));
        }
        $this->set(compact('menu'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $menu = $this->Menu->get($id);
        if($id == 10 || $id == 11)
        {
            $this->Flash->error(__('Không thể xóa menu'));
            return $this->redirect(['action' => 'index']);
        }
        if($menu->status == 1)
        {
            $this->Flash->error(__('Không thể xóa menu đang kích hoạt'));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->Menu->delete($menu)) {
            $this->Flash->success(__('Xóa menu thành công'));
        } else {
            $this->Flash->error(__('The menu could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
