<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Event\Event;
/**
 * Banner Controller
 *
 * @property \App\Model\Table\BannerTable $Banner
 *
 * @method \App\Model\Entity\Banner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BannerController extends AppController
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
           'limit' => 11
         ];
        $banner = $this->paginate($this->Banner,$settings);

        $this->set(compact('banner'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Banner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $banner = $this->Banner->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $banner = $this->Banner->patchEntity($banner, $this->request->getData());
            $filename = $this->request->data['file']['name'];
            $url = Router::url('/',true) . 'img/' . $filename;
            $uploadpath = 'img/';
            $uploadfile = $uploadpath . $filename;
            if (move_uploaded_file($this->request->data['file']['tmp_name'], $uploadfile)) {
                $this->request->data['file']['image'] = $filename;
                $banner->image = $url;
            } else {
                unset($this->request->data['Candidates']['photo']);
            }
            if ($this->Banner->save($banner)) {
                $this->Flash->success(__('Cập nhật banner thành công'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The banner could not be saved. Please, try again.'));
        }
        $this->set(compact('banner'));
    }
}
