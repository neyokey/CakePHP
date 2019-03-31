<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Khuvucgiaohang Controller
 *
 * @property \App\Model\Table\KhuvucgiaohangTable $Khuvucgiaohang
 *
 * @method \App\Model\Entity\Khuvucgiaohang[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KhuvucgiaohangController extends AppController
{

    public function beforeFilter(Event $event) {
        if ($this->Auth->user('loainguoidung_id') > 2) {
            $this->redirect('/admin/');
        }
    }
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $info = $this->request->getData('info');  
        $query = $this->Khuvucgiaohang->find('all');
        $settings = [
           'limit' => 7
         ];
        if ($info)
        {
            $query->andWhere([
                'OR'=>[
                    ['name like' => '%'.$info.'%'],
                        ['Khuvucgiaohang.id' => $info]
                    ]]);
        }
        $khuvucgiaohang = $this->paginate($query,$settings);
        
        $this->set(compact('khuvucgiaohang'));
    }

    /**
     * View method
     *
     * @param string|null $id Khuvucgiaohang id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $khuvucgiaohang = $this->Khuvucgiaohang->get($id, [
            'contain' => []
        ]);

        $this->set('khuvucgiaohang', $khuvucgiaohang);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $khuvucgiaohang = $this->Khuvucgiaohang->newEntity();
        if ($this->request->is('post')) {
            $khuvucgiaohang = $this->Khuvucgiaohang->patchEntity($khuvucgiaohang, $this->request->getData());
            if ($this->Khuvucgiaohang->save($khuvucgiaohang)) {
                $this->Flash->success(__('Thêm khu vực giao hàng thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The khuvucgiaohang could not be saved. Please, try again.'));
        }
        $this->set(compact('khuvucgiaohang'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Khuvucgiaohang id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $khuvucgiaohang = $this->Khuvucgiaohang->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $khuvucgiaohang = $this->Khuvucgiaohang->patchEntity($khuvucgiaohang, $this->request->getData());
            if ($this->Khuvucgiaohang->save($khuvucgiaohang)) {
                $this->Flash->success(__('Cập nhật khu vực giao hàng thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The khuvucgiaohang could not be saved. Please, try again.'));
        }
        $this->set(compact('khuvucgiaohang'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Khuvucgiaohang id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $khuvucgiaohang = $this->Khuvucgiaohang->get($id);
        $khuvucgiaohang->status = 0;
        if ($this->Khuvucgiaohang->save($khuvucgiaohang)) {
            $this->Flash->error(__('Hủy kích hoạt khu vực giao hàng thành công'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
