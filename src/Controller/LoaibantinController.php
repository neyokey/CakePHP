<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Loaibantin Controller
 *
 * @property \App\Model\Table\LoaibantinTable $Loaibantin
 *
 * @method \App\Model\Entity\Loaibantin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoaibantinController extends AppController
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
        $info = $this->request->getData('info');  
        $query = $this->Loaibantin->find('all');
        if ($info)
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
        $loaibantin = $this->paginate($query,$settings);

        $this->set(compact('loaibantin'));
    }

    /**
     * View method
     *
     * @param string|null $id Loaibantin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $loaibantin = $this->Loaibantin->get($id, [
            'contain' => ['Bantin']
        ]);

        $this->set('loaibantin', $loaibantin);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $loaibantin = $this->Loaibantin->newEntity();
        if ($this->request->is('post')) {
            $loaibantin = $this->Loaibantin->patchEntity($loaibantin, $this->request->getData());
            if ($this->Loaibantin->save($loaibantin)) {
                $this->Flash->success(__('Thêm loại bản tin thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loaibantin could not be saved. Please, try again.'));
        }
        $this->set(compact('loaibantin'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Loaibantin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $loaibantin = $this->Loaibantin->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loaibantin = $this->Loaibantin->patchEntity($loaibantin, $this->request->getData());
            if ($this->Loaibantin->save($loaibantin)) {
                $this->Flash->success(__('Cập nhật loại bản tin thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The loaibantin could not be saved. Please, try again.'));
        }
        $this->set(compact('loaibantin'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Loaibantin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $loaibantin = $this->Loaibantin->get($id);
        $loaibantin->status = 0;
        if ($this->Loaibantin->save($loaibantin)) {
            $this->Flash->error(__('Hủy kích hoạt loại bản tin thành công'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
