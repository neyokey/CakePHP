<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\Core\Configure;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'nguoidung',
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Home',
                'action' => 'login'
            ],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        
        
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    public function beforeFilter(Event $event) {

        if($this->Auth->user('loainguoidung_id') <= 3)
        {
            Configure::write('Session', [
                'defaults' => 'php',
                'timeout' => 1
            ]);
        }
        $this->request->session()->renew();

        //dump(Configure::read('Session')); die; 
    }
    public function beforeRender(Event $event)
    {
        $this->loadComponent('Auth');
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
        if ($this->request->session()->read('Auth.User')) {
            $this->set('loginIn', true);
        }
        else {
            $this->set('loginIn', false);
        }
        $name="";
        if($this->Auth->user()) {
        $name = $this->Auth->user('name');
        }
        I18n::setLocale('vi_VI');
        //dump($this->request->session()->read()); die;
        if ($this->request->session()->check('lang')) {
            I18n::setLocale($this->request->session()->read('lang'));
        }
        if(I18n::getLocale() == 'vi_VI')
        {
            $lang = 'vi_VI';
        }
        else
        {
            $lang = 'en_US';
        }
        $this->set("lang", $lang);
        $this->set("name", $name);
        $this->set("type", $this->Auth->user('loainguoidung_id'));
        $this->set("id", $this->Auth->user('id'));
        $this->set("user", $this->Auth->user());
    }
}
