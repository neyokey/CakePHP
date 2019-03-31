<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Message Controller
 *
 * @property \App\Model\Table\MessageTable $Message
 *
 * @method \App\Model\Entity\Message[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessageController extends AppController
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
        $status = $this->request->getData('status');
        $info = $this->request->getData('info'); 
        $message = $this->Message->find('all', [
            'order' => ['id' => 'DESC']
        ]);
        if($status != '')
        {
            $message->andWhere(['status =' => $status]);
        }
        if ($info)
        {
            $message->andWhere([
                'OR'=>[
                    ['name like' => '%'.$info.'%'],
                        ['email like' => '%'.$info.'%'],
                            ['subject like' => '%'.$info.'%'],
                                ['Message.id' => $info]
                    ]]);
        }
        $settings = [
           'limit' => 7
         ];
        $message = $this->paginate($message,$settings);
        $this->set(compact('message'));
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $message = $this->Message->get($id, [
            'contain' => []
        ]);
        $message->status = 1;
        $this->Message->save($message);

        $this->set('message', $message);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $message = $this->Message->newEntity();
        if ($this->request->is('post')) {
            $message = $this->Message->patchEntity($message, $this->request->getData());
            if ($this->Message->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $this->set(compact('message'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $message = $this->Message->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $message = $this->Message->patchEntity($message, $this->request->getData());
            if ($this->Message->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $this->set(compact('message'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $message = $this->Message->get($id);
        $message->status = 0;
        $this->Message->save($message);
        return $this->redirect(['action' => 'index']);
    }
}
