<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Gioithieu Controller
 *
 * @property \App\Model\Table\GioithieuTable $Gioithieu
 *
 * @method \App\Model\Entity\Gioithieu[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GioithieuController extends AppController
{

    public function beforeFilter(Event $event) {
        if ($this->Auth->user('loainguoidung_id') > 2) {
            $this->redirect('/admin/');
        }
    }
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $page = $this->request->getData('page');  
        $info = $this->request->getData('info');  
        $query = $this->Gioithieu->find('all');
        if ($page)
        {
            $query->andWhere(['page' => $page]);
        }
        if ($info)
        {
            $query->andWhere([
                'OR'=>[
                    ['title like' => '%'.$info.'%'],
                        ['Gioithieu.id' => $info]
                    ]]);
        }
        $settings = [
           'limit' => 7
         ];
        $gioithieu = $this->paginate($query,$settings);

        $this->set(compact('gioithieu'));
    }

    /**
     * View method
     *
     * @param string|null $id Gioithieu id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
         $this->viewBuilder()->layout('admin');
        $gioithieu = $this->Gioithieu->get($id, [
            'contain' => []
        ]);

        $this->set('gioithieu', $gioithieu);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
         $this->viewBuilder()->layout('admin');
        $gioithieu = $this->Gioithieu->newEntity();
        if ($this->request->is('post')) { 
            $page = $this->request->getData('page');
            $gioithieu2 = $this->Gioithieu->find('all')->andWhere(['page' => $page])->order(['position' => 'DESC'])->toArray();
            $position = $gioithieu2[0]->position + 1;
            $gioithieu2 = $this->Gioithieu->findByPosition($this->request->getData('position'))->andWhere(['page' => $page])->toArray();
            if($gioithieu2 != null)
            {
                $gioithieu2= $gioithieu2[0];
                $gioithieu2->position = -1;
                $this->Gioithieu->save($gioithieu2); 
            }
            $gioithieu = $this->Gioithieu->patchEntity($gioithieu, $this->request->getData());
            if ($this->Gioithieu->save($gioithieu)) {
                if($gioithieu2 != null)
                {
                    $gioithieu2->position = $position;
                    $this->Gioithieu->save($gioithieu2);  
                }

                $this->Flash->success(__('Thêm giới thiệu thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gioithieu could not be saved. Please, try again.'));
        }
        $this->set(compact('gioithieu'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gioithieu id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
         $this->viewBuilder()->layout('admin');
        $gioithieu = $this->Gioithieu->get($id, [
            'contain' => []
        ]);
        $old_position = $gioithieu->position;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $page = $this->request->getData('page');
            $gioithieu2 = $this->Gioithieu->find('all')->andWhere(['page' => $page])->order(['position' => 'DESC'])->toArray();
            $gioithieu2 = $this->Gioithieu->findByPosition($this->request->getData('position'))->andWhere(['page' => $page])->toArray();
            if($gioithieu2 != null)
            {
                $gioithieu2= $gioithieu2[0];
                $gioithieu2->position = -1;
                $this->Gioithieu->save($gioithieu2); 
            }
            $gioithieu = $this->Gioithieu->patchEntity($gioithieu, $this->request->getData());
            if ($this->Gioithieu->save($gioithieu)) {
                if($gioithieu2 != null)
                {
                    $gioithieu2->position = $old_position;
                    $this->Gioithieu->save($gioithieu2);  
                }
                $this->Flash->success(__('Cập nhật giới thiệu thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gioithieu could not be saved. Please, try again.'));
        }
        $this->set(compact('gioithieu'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gioithieu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $gioithieu = $this->Gioithieu->get($id);
        if($gioithieu->status == 0)
        {
            if ($this->Gioithieu->delete($gioithieu)) {
            $this->Flash->error(__('Xóa giới thiệu thành công'));
            }
        }
        else
        {
            $this->Flash->error(__('Không thể xóa giới thiệu do đang kích hoạt'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
