<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class AdminController extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow();
    }
	public function index()
    {
    	$this->viewBuilder()->layout('admin');
        $this->loadModel('Donhang');
        $this->loadModel('Message');
        $message = $this->Message->find('all')->andWhere(['status' => 0])->count();
        $donhang = $this->Donhang->find('all')->andWhere(['status' => 0])->count();
        if ($this->request->getData('reservation') != null) {
            $val = explode(' - ', $this->request->getData('reservation'));
            $from = strtotime($val[0]);
            $to = strtotime($val[1]);
            $data = array(
                0 => array(),
                1 => array()
            );
            $_from = date('Y-m-d 00:00:00', $from);
            $_to = date('Y-m-d 23:59:59', $to);
            $x = $from;
            for (;;) {
                $data[0] += array(date('d-m-Y', $x) => 0);
                $data[1] += array(date('d-m-Y', $x) => 0);
                $x = strtotime('+1 day', $x);
                if ($x > $to) {
                    break;
                }
            }
            $data2 = $this->Donhang->find('all', array(
                'fields' => array(
                    'insert_time','price','ship_price','discount'
                ),
                'conditions' => array(
                    'status' => 3,
                    'insert_time >=' => $_from,
                    'insert_time <=' => $_to
                ),
                'group' => array('insert_time')
            ))->toArray();
            foreach ($data2 as $key => $value) {
                $data2[$key]->insert_time = date('d-m-Y', strtotime($data2[$key]->insert_time));
            }
            foreach ($data[0] as $key => $value) 
            { 
                foreach ($data2 as $key2 => $value2) 
                {
                    if($key == $value2->insert_time)
                    {
                        $data[0][$key] += $value2->price + $value2->ship_price - $value2->discount;
                        $data[1][$key] ++;
                    }
                }
            }
            $this->set("data", $data);
        }
        $this->set("message", $message);
        $this->set("donhang", $donhang);

    }
    public function beforeFilter(Event $event) {
		if ($this->Auth->user('loainguoidung_id') > 3) {
            $this->redirect('/');
        }
        if(!$this->Auth->user()) {
            $this->redirect('/home/');
        }
	}
}