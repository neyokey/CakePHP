<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Event\Event;
/**
 * Monan Controller
 *
 * @property \App\Model\Table\MonanTable $Monan
 *
 * @method \App\Model\Entity\Monan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MonanController extends AppController
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
        $loaimonan_id = $this->request->getData('loaimonan_id');  
        $info = $this->request->getData('info');     
        $monan = $this->Monan->find('all', [
            'contain' => ['Loaimonan']
        ]);
        if ($loaimonan_id)
        {
            $monan->andWhere(['loaimonan_id' => $loaimonan_id]);
        }
        if ($info)
        {
            $monan->andWhere([
                'OR'=>[
                    ['Monan.name like' => '%'.$info.'%'],
                        ['price' => $info],
                         ['Monan.id' => $info]
                    ]]);
        }
        $settings = [
           'limit' => 7
         ];
        $monan = $this->paginate($monan,$settings);
        $loaimonan = $this->Monan->Loaimonan->find('list', ['limit' => 200])->andWhere(['status' => 1]);
        $this->set(compact('monan','loaimonan'));
    }

    /**
     * View method
     *
     * @param string|null $id Monan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $monan = $this->Monan->get($id, [
            'contain' => ['Loaimonan']
        ]);

        $this->set('monan', $monan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');    
        $monan = $this->Monan->newEntity();
        if ($this->request->is('post')) {
            $monan = $this->Monan->patchEntity($monan, $this->request->getData());
            $filename = $this->request->data['file']['name'];
            $url = Router::url('/',true) . 'img/' . $filename;
            $uploadpath = 'img/';
            $uploadfile = $uploadpath . $filename;
            if (move_uploaded_file($this->request->data['file']['tmp_name'], $uploadfile)) {
                $this->request->data['file']['image'] = $filename;
                $monan->image = $url;
            } else {
                unset($this->request->data['Candidates']['photo']);
            }
            if ($this->Monan->save($monan)) {
                $this->Flash->success('Thêm món ăn thành công');
                return $this->redirect(['action' => 'index']);
            }
        }
        $loaimonan = $this->Monan->Loaimonan->find('list', ['limit' => 200])->andWhere(['status' => 1]);
        $this->set(compact('monan', 'loaimonan'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Monan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');    
        $monan = $this->Monan->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $monan = $this->Monan->patchEntity($monan, $this->request->getData());
            $filename = $this->request->data['file']['name'];
            $url = Router::url('/',true) . 'img/' . $filename;
            $uploadpath = 'img/';
            $uploadfile = $uploadpath . $filename;
            if (move_uploaded_file($this->request->data['file']['tmp_name'], $uploadfile)) {
                $this->request->data['file']['image'] = $filename;
                $monan->image = $url;
            } else {
                unset($this->request->data['Candidates']['photo']);
            }
            if ($this->Monan->save($monan)) {
                $this->Flash->success('Cập nhật món ăn thành công');
                return $this->redirect(['action' => 'index']);
            }
        }
        $loaimonan = $this->Monan->Loaimonan->find('list', ['limit' => 200])->andWhere(['status' => 1]);
        $this->set(compact('monan', 'loaimonan'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Monan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $monan = $this->Monan->get($id);
        $monan->status = 0;
        if ($this->Monan->save($monan)) {
            $this->Flash->error(__('Hủy kích hoạt món ăn thành công'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
