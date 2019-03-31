<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Loainguoidung Controller
 *
 * @property \App\Model\Table\LoainguoidungTable $Loainguoidung
 *
 * @method \App\Model\Entity\Loainguoidung[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoainguoidungController extends AppController
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
        $settings = [
           'limit' => 7
         ];  
        $query = $this->Loainguoidung->find('all');
        if($this->Auth->user('loainguoidung_id') != 1)
        {
             $query= $query->andWhere(['id !=' => 1]);
        }
        if ($info)
        {
            $query->andWhere([
                'OR'=>[
                    ['name like' => '%'.$info.'%'],
                        ['id' => $info]
                    ]]);
        }
        $loainguoidung = $this->paginate($query,$settings);
        $this->set(compact('loainguoidung'));
    }

    /**
     * View method
     *
     * @param string|null $id Loainguoidung id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loainguoidung = $this->Loainguoidung->get($id, [
            'contain' => ['Nguoidung']
        ]);

        $this->set('loainguoidung', $loainguoidung);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');    
        $loainguoidung = $this->Loainguoidung->newEntity();
        if ($this->request->is('post')) {
            $loainguoidung = $this->Loainguoidung->patchEntity($loainguoidung, $this->request->getData());
            if ($this->Loainguoidung->save($loainguoidung)) {
                $this->Flash->success(__('Thêm loại người dùng thành công'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('loainguoidung'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Loainguoidung id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');    
        $loainguoidung = $this->Loainguoidung->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loainguoidung = $this->Loainguoidung->patchEntity($loainguoidung, $this->request->getData());
            if ($this->Loainguoidung->save($loainguoidung)) {
                $this->Flash->success(__('Cập nhật loại người dùng thành công'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('loainguoidung'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Loainguoidung id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $loainguoidung = $this->Loainguoidung->get($id);
        $loainguoidung->status = 0;
        if ($this->Loainguoidung->save($loainguoidung)) {
            $this->Flash->error(__('Hủy kích hoạt người dùng thành công'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
