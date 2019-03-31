<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Chitietdonhang Controller
 *
 * @property \App\Model\Table\ChitietdonhangTable $Chitietdonhang
 *
 * @method \App\Model\Entity\Chitietdonhang[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChitietdonhangController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add']);
    }
    public function beforeFilter(Event $event) {
        if ($this->Auth->user('loainguoidung_id') > 3 && $this->request->getParam('action') != 'add') {
            $this->redirect('/admin/');
        }
    }
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $chitietdonhang = null;
        if($this->request->getParam('pass') != null)
        {
            $donhang_id = $this->request->getParam('pass')[0];
            $chitietdonhang = $this->Chitietdonhang->find('all', [
                'conditions' => ['donhang_id' => $donhang_id],
                'contain' => ['monan']
            ]);    
        }  
        $settings = [
           'limit' => 7
         ];
        $chitietdonhang = $this->paginate($chitietdonhang,$settings);
        $this->set(compact('chitietdonhang'));
    }
    public function add()
    {  
        if(isset($this->request->getParam('pass')[0]))
        {
            $donhang_id = $this->request->getParam('pass')[0];
            $session = $this->request->session();
            $listfood = $session->read('Donhang.listfood');
            if($listfood != null)
            {
                foreach ($listfood as $key => $val) {
                    $chitietdonhang = $this->Chitietdonhang->newEntity();
                    $chitietdonhang->donhang_id = $donhang_id;
                    $chitietdonhang->monan_id = $key;
                    $chitietdonhang->quantity = $val["quantity"];
                    $data[]=$chitietdonhang;
                }
                $this->Chitietdonhang->saveMany($data);
            }
            $session->delete('Donhang');
            return $this->redirect(['controller' => 'home','action' => 'bill',$donhang_id]);
        }
        return $this->redirect('/home/');
    }

    /**
     * Edit method
     *
     * @param string|null $id Chitietdonhang id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chitietdonhang = $this->Chitietdonhang->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chitietdonhang = $this->Chitietdonhang->patchEntity($chitietdonhang, $this->request->getData());
            if ($this->Chitietdonhang->save($chitietdonhang)) {
                $this->Flash->success(__('The chitietdonhang has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chitietdonhang could not be saved. Please, try again.'));
        }
        $this->set(compact('chitietdonhang'));
    }

    public function deletes($id = null)
    {
        $this->request->allowMethod(['get','post', 'delete']);
        $ds = $this->request->getData();
        if($ds != null)
        {
            foreach ($ds['id'] as $id) {
                $chitietdonhang = $this->Chitietdonhang->get($id);
                $this->Chitietdonhang->delete($chitietdonhang);
            }
        }
        return $this->redirect(['action' => 'index']);
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['get','post', 'delete']);
        $chitietdonhang = $this->Chitietdonhang->get($id);
        if ($this->Chitietdonhang->delete($chitietdonhang)) {
        }
        return $this->redirect(['action' => 'index']);
    }
}
