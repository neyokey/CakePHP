<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Nguoidung Controller
 *
 * @property \App\Model\Table\NguoidungTable $Nguoidung
 *
 * @method \App\Model\Entity\Nguoidung[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NguoidungController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }
    public function beforeFilter(Event $event) {
        if ($this->Auth->user('loainguoidung_id') > 2) {
            $this->redirect('/admin/');
        }
    }
    public function index()
    {
        $this->viewBuilder()->layout('admin');   
        $loainguoidung_id = $this->request->getData('loainguoidung_id');  
        $info = $this->request->getData('info');  
        $this->paginate = [
            'contain' => ['Loainguoidung'],
            'sortWhitelist' => ['loainguoidung.name']
        ];
        $settings = [
           'limit' => 7
         ];
        $query = $this->Nguoidung->find('all');
        if ($loainguoidung_id)
        {
            $query->andWhere(['loainguoidung_id' => $loainguoidung_id]);
        }
        if ($info)
        {
            $query->andWhere([
                'OR'=>[
                    ['email like' => '%'.$info.'%'],
                        ['phone like' => '%'.$info.'%'],
                            ['address like' => '%'.$info.'%'],
                                ['Nguoidung.id' => $info]
                    ]]);
        }
        if($this->Auth->user('loainguoidung_id') != 1)
        {
             $query= $query->andWhere(['loainguoidung_id !=' => 2])->andWhere(['loainguoidung_id !=' => 1]);
        }
        $nguoidung = $this->paginate($query,$settings);
        $loainguoidung = $this->Nguoidung->Loainguoidung->find('list', ['limit' => 200])->toArray();
        $this->set(compact('nguoidung','loainguoidung'));
    }

    /**
     * View method
     *
     * @param string|null $id Nguoidung id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('home'); 
        $nguoidung = $this->Nguoidung->get($id, [
            'contain' => ['Loainguoidung']
        ]);

        $this->set('nguoidung', $nguoidung);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');    
        $nguoidung = $this->Nguoidung->newEntity();
        if ($this->request->is('post')) {
            $nguoidung = $this->Nguoidung->patchEntity($nguoidung, $this->request->getData());
            if ($this->Nguoidung->save($nguoidung)) {
                $this->Flash->success(__('Thêm người dùng thành công.'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $loainguoidung = $this->Nguoidung->Loainguoidung->find('list', ['limit' => 200])->andWhere(['status' => 1]);
        $this->set(compact('nguoidung', 'loainguoidung'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nguoidung id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Auth->allow();
        $this->viewBuilder()->layout('admin');    
        $nguoidung = $this->Nguoidung->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nguoidung = $this->Nguoidung->patchEntity($nguoidung, $this->request->getData());
            if ($this->Nguoidung->save($nguoidung)) {
                $this->Flash->success(__('Cập nhật người dùng thành công'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $loainguoidung = $this->Nguoidung->Loainguoidung->find('list', ['limit' => 200])->andWhere(['status' => 1]);
        $this->set(compact('nguoidung', 'loainguoidung'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nguoidung id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $nguoidung = $this->Nguoidung->get($id);
        $nguoidung->status = 0;
        if ($this->Nguoidung->save($nguoidung)) {
            $this->Flash->error(__('Hủy kích hoạt người dùng thành công'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
