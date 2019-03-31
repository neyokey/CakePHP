<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.3.4
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Event\Event;

/**
 * Error Handling Controller
 *
 * Controller used by ExceptionRenderer to render error responses.
 */
class ErrorController extends AppController
{
    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('RequestHandler');
    }

    /**
     * beforeFilter callback.
     *
     * @param \Cake\Event\Event $event Event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeFilter(Event $event)
    {
        $this->viewBuilder()->layout('home');
        $this->loadModel('Menu');
        $this->loadModel('Submenu');
        $this->loadModel('Lienhe');
        $query = $this->Menu->find()->order(['position' => 'ASC']);
        $query->andWhere(['status' => 1]);
        $query2 = $this->Submenu->find()->contain(['menu']);
        $query->andWhere(['status' => 1]);
        $query3 = $this->Lienhe->find();
        if($this->request->session()->read('Auth.User'))
        {
            $id_loainguoidung = $this->request->session()->read('Auth.User')['loainguoidung_id'];
            $query->andWhere(['id !=' => 10]);
            if($id_loainguoidung >= 4)
            {
               $query2->andWhere(['Submenu.id !=' => 6]); 
            }
        }  
        else
        {
            $query->andWhere(['id !=' => 11]);
            $query2->andWhere(['menu_id !=' => 11]);
        }
        if($this->request->session()->read('alert'))
        {
            $alert = $this->request->session()->read('alert');
            $this->set('alert', $alert);
            $this->request->session()->write('alert',null);
        }
        $menu = $query->toArray();
        $submenu = $query2->toArray();
        $lienhe = $query3->toArray()[0];
        $this->set('menu', $menu);
        $this->set('submenu', $submenu);
        $this->set('lienhe', $lienhe);
    }

    /**
     * beforeRender callback.
     *
     * @param \Cake\Event\Event $event Event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);

        $this->viewBuilder()->setTemplatePath('Error');
    }

    /**
     * afterFilter callback.
     *
     * @param \Cake\Event\Event $event Event.
     * @return \Cake\Http\Response|null|void
     */
    public function afterFilter(Event $event)
    {
    }
}
