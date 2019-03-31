<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;
/**
 * Bantin Controller
 *
 * @property \App\Model\Table\BantinTable $Bantin
 *
 * @method \App\Model\Entity\Bantin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BantinController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }
    public function beforeFilter(Event $event) {
        if ($this->Auth->user('loainguoidung_id') > 3) {
            $this->redirect('/admin/');
        }
    }
    public function index()
    {
        $this->viewBuilder()->layout('admin'); 
        $loaibantin_id = $this->request->getData('loaibantin_id');  
        $info = $this->request->getData('info'); 
        $this->paginate = [
            'contain' => ['Loaibantin','Nguoidung']
        ];
        
        $settings = [
           'limit' => 7
         ];
        $query = $this->Bantin->find('all');
        if ($loaibantin_id)
        {
            $query->andWhere(['loaibantin_id' => $loaibantin_id]);
        }
        if ($info)
        {
            $query->andWhere([
                'OR'=>[
                    ['Bantin.name like' => '%'.$info.'%'],
                        ['Bantin.id' => $info]
                    ]]);
        } 
        $bantin = $this->paginate($query,$settings);
        $loaibantin = $this->Bantin->Loaibantin->find('list', ['limit' => 200]);
        $this->set(compact('bantin','loaibantin'));
    }

    /**
     * View method
     *
     * @param string|null $id Bantin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $bantin = $this->Bantin->get($id, [
            'contain' => ['Loaibantin','Nguoidung']
        ]);

        $this->set('bantin', $bantin);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $bantin = $this->Bantin->newEntity();
        if ($this->request->is('post')) {
            $bantin = $this->Bantin->patchEntity($bantin, $this->request->getData());
            $bantin->nguoidung_id = $this->Auth->user('id');
            $bantin->status = 0;
            if ($this->Bantin->save($bantin)) {
                $this->Flash->success(__('Thêm bản tin thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bantin could not be saved. Please, try again.'));
        }
        $loaibantin = $this->Bantin->Loaibantin->find('list', ['limit' => 200])->andWhere(['status' => 1]);
        $this->set(compact('bantin', 'loaibantin'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bantin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $bantin = $this->Bantin->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bantin = $this->Bantin->patchEntity($bantin, $this->request->getData());
            if ($this->Bantin->save($bantin)) {
                $this->Flash->success(__('Cập nhật bản tin thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bantin could not be saved. Please, try again.'));
        }
        $loaibantin = $this->Bantin->Loaibantin->find('list', ['limit' => 200])->andWhere(['status' => 1]);
        $this->set(compact('bantin', 'loaibantin'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bantin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $bantin = $this->Bantin->get($id);
        if($bantin->status == 0)
        {
            if ($this->Bantin->delete($bantin)) {
            $this->Flash->error(__('Xóa bản tin thành công'));
            }
        }
        else
        {
            $this->Flash->error(__('Không thể xóa bản tin do đang kích hoạt'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
