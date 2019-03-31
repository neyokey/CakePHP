<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;
use Cake\Event\Event;
/**
 * Lienhe Controller
 *
 * @property \App\Model\Table\LienheTable $Lienhe
 *
 * @method \App\Model\Entity\Lienhe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LienheController extends AppController
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
        $settings = [
           'limit' => 7
         ];
        $lienhe = $this->paginate($this->Lienhe,$settings);

        $this->set(compact('lienhe'));
    }
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');    
        $lienhe = $this->Lienhe->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lienhe = $this->Lienhe->patchEntity($lienhe, $this->request->getData());
            if ($this->Lienhe->save($lienhe)) {
                $this->Flash->success('Cập nhật liên hệ thành công');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lienhe could not be saved. Please, try again.'));
        }
        $this->set(compact('lienhe'));
    }
}
