<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Nguoigiaohang Controller
 *
 * @property \App\Model\Table\NguoigiaohangTable $Nguoigiaohang
 *
 * @method \App\Model\Entity\Nguoigiaohang[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NguoigiaohangController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function beforeFilter(Event $event) {
        if ($this->Auth->user('loainguoidung_id') > 3 || ($this->Auth->user('loainguoidung_id') == 3 && $this->request->getParam('action') != 'index')) {
            $this->redirect('/admin/');
        }
    }
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $info = $this->request->getData('info');
        $status = $this->request->getData('status');   
        $query = $this->Nguoigiaohang->find('all');
        if($status)
        {
            $query->andWhere(['status' => $status]);
        }
        if($info)
        {
            $query->andWhere([
                'OR'=>[
                    ['name like' => '%'.$info.'%'],
                        ['id' => $info]
                    ]]);
        }
        $settings = [
           'limit' => 7
         ];
        $nguoigiaohang = $this->paginate($query,$settings);

        $this->set(compact('nguoigiaohang'));
    }

    /**
     * View method
     *
     * @param string|null $id Nguoigiaohang id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nguoigiaohang = $this->Nguoigiaohang->get($id, [
            'contain' => ['Donhang']
        ]);

        $this->set('nguoigiaohang', $nguoigiaohang);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $nguoigiaohang = $this->Nguoigiaohang->newEntity();
        if ($this->request->is('post')) {
            $nguoigiaohang = $this->Nguoigiaohang->patchEntity($nguoigiaohang, $this->request->getData());
            if ($this->Nguoigiaohang->save($nguoigiaohang)) {
                $this->Flash->success(__('Thêm người giao hàng thành công'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nguoigiaohang could not be saved. Please, try again.'));
        }
        $this->set(compact('nguoigiaohang'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nguoigiaohang id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $nguoigiaohang = $this->Nguoigiaohang->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nguoigiaohang = $this->Nguoigiaohang->patchEntity($nguoigiaohang, $this->request->getData());
            if ($this->Nguoigiaohang->save($nguoigiaohang)) {
                $this->Flash->success(__('Cập nhật người giao hàng thành công'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nguoigiaohang could not be saved. Please, try again.'));
        }
        $this->set(compact('nguoigiaohang'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nguoigiaohang id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $nguoigiaohang = $this->Nguoigiaohang->get($id);
        $nguoigiaohang->status = 0;
        if ($this->Nguoigiaohang->save($nguoigiaohang)) {
            $this->Flash->error(__('Hủy kích hoạt người giao hàng thành công'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
