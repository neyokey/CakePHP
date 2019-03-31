<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Submenu Controller
 *
 * @property \App\Model\Table\SubmenuTable $Submenu
 *
 * @method \App\Model\Entity\Submenu[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubmenuController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function beforeFilter(Event $event) {
        if ($this->Auth->user('loainguoidung_id') > 2) {
            $this->redirect('/admin/');
        }
    }
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $query = $this->Submenu->find('all')->contain(['menu']);
        $menu_id = '';
        if($this->request->getParam('pass') != null)
        {
            $menu_id = $this->request->getParam('pass')[0];
            $query->andWhere(['menu_id =' => $menu_id]);
        } 
        else
        {
            return $this->redirect(['controller' => 'menu','action' => 'index']);
        }
        $settings = [
           'limit' => 7
         ];
        $submenu = $this->paginate($query,$settings);
        $this->set('menu_id', $menu_id);
        $this->set(compact('submenu'));
    }

    /**
     * View method
     *
     * @param string|null $id Submenu id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $submenu = $this->Submenu->get($id, [
            'contain' => ['Menu']
        ]);

        $this->set('submenu', $submenu);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $submenu = $this->Submenu->newEntity();
        if($this->request->getParam('pass') != null)
        {
            $menu_id = $this->request->getParam('pass')[0];
        } 
        else
        {
            return $this->redirect(['controller' => 'menu','action' => 'index']);
        }
        if ($this->request->is('post')) {
            $submenu = $this->Submenu->patchEntity($submenu, $this->request->getData());
            $submenu->menu_id = $menu_id;
            if ($this->Submenu->save($submenu)) {
                $this->Flash->success(__('Thêm submenu thành công'));

                return $this->redirect(['action' => 'index',$menu_id]);
            }
            $this->Flash->error(__('The submenu could not be saved. Please, try again.'));
        }
        $menu = $this->Submenu->Menu->find('list', ['limit' => 200]);
        $menu->andWhere(['status =' => 1]);
        $this->set(compact('submenu', 'menu'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Submenu id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $submenu = $this->Submenu->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $submenu = $this->Submenu->patchEntity($submenu, $this->request->getData());
            if ($this->Submenu->save($submenu)) {
                $this->Flash->success(__('Cập nhật submenu thành công'));

                return $this->redirect(['controller' => 'menu','action' => 'index']);
            }
            $this->Flash->error(__('The submenu could not be saved. Please, try again.'));
        }
        $menu = $this->Submenu->Menu->find('list', ['limit' => 200]);
        $this->set(compact('submenu', 'menu', 'id'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Submenu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $submenu = $this->Submenu->get($id);
        if($submenu->status == 0)
        {
            if ($this->Submenu->delete($submenu)) {
            $this->Flash->error(__('Xóa submenu thành công'));
            }
        }
        else
        {
            $this->Flash->error(__('Không thể xóa submenu do đang kích hoạt'));
        }
        return $this->redirect(['controller' => 'menu','action' => 'index']);      
    }
}
