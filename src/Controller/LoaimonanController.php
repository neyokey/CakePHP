<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Loaimonan Controller
 *
 * @property \App\Model\Table\LoaimonanTable $Loaimonan
 *
 * @method \App\Model\Entity\Loaimonan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoaimonanController extends AppController
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
        $info = $this->request->getData('info');  
        $query = $this->Loaimonan->find('all'); 
        $settings = [
           'limit' => 7
         ];
        if ($info)
        {
            $query->andWhere([
                'OR'=>[
                    ['name like' => '%'.$info.'%'],
                        ['id' => $info]
                    ]]);
        }
        $loaimonan = $this->paginate($query,$settings);
        $this->set(compact('loaimonan'));
    }

    /**
     * View method
     *
     * @param string|null $id Loaimonan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loaimonan = $this->Loaimonan->get($id, [
            'contain' => ['Monan']
        ]);
        $this->set('loaimonan', $loaimonan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');    
        $loaimonan = $this->Loaimonan->newEntity();
        if ($this->request->is('post')) {
            $loaimonan = $this->Loaimonan->patchEntity($loaimonan, $this->request->getData());
            if ($this->Loaimonan->save($loaimonan)) {
                $this->Flash->success(__('Thêm loại món ăn thành công'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('loaimonan'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Loaimonan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');    
        $loaimonan = $this->Loaimonan->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loaimonan = $this->Loaimonan->patchEntity($loaimonan, $this->request->getData());
            if ($this->Loaimonan->save($loaimonan)) {
                $this->Flash->success(__('Cập nhật loại món ăn thành công'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('loaimonan'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Loaimonan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $loaimonan = $this->Loaimonan->get($id);
        $loaimonan->status = 0;
        if ($this->Loaimonan->save($loaimonan)) {
            $this->Flash->error(__('Hủy kích hoạt loại món ăn thành công'));
        }
        return $this->redirect(['action' => 'index']);    
    }
}
