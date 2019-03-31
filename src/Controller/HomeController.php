<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Routing\Router;
use Cake\I18n\I18n;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure; 

class HomeController extends AppController
 {
 	public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['news','detailNews','drinks','pizza','main','combo','appetizer','login','signup','contact','about','index','cart','addcart','confirm','addorder', 'bill','deletefoodcart','editcart']);
        $this->loadModel('Menu');
        $this->loadModel('Submenu');
        $this->loadModel('Lienhe');
        $query = $this->Menu->find()->order(['position' => 'ASC']);
        $query->andWhere(['status' => 1]);
        $query2 = $this->Submenu->find()->contain(['menu']);
        $query2->andWhere(['Submenu.status' => 1]);
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
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        if ($this->Auth->user() != null && $this->request->getParam('action') == 'login') {
            $this->redirect('/');
        }
    }
        
 	public function index()
    {
    	$this->viewBuilder()->layout('home');
        $this->loadModel('Banner');
        $this->loadModel('Gioithieu');
        $this->loadModel('Chitietdonhang');
        $this->loadModel('Monan');
        $this->loadModel('Bantin');
        $query = $this->Banner->find('all')->toArray();
        foreach ($query as  $value) {
                $banner[$value['position']] = $value['image'];
        }
        $session = $this->request->session();
        if($this->request->getParam('?')['lang'] != null)
        {
            if($this->request->getParam('?')['lang'] == "VN")
            {       
                $session->write('lang','vi_VI');
            }
            else
            {        
                $session->write('lang','us_US');
            }
        }
        $gioithieu = $this->Gioithieu->find('all')->andWhere(['page' => 'index','status' => 1 ]);
        $monmoi = $this->Monan->find('all', ['limit' => 3, 'order' => 'id DESC'])->andWhere(['status' => 1, 'Loaimonan_id' => 5]);
        $query2 = $this->Chitietdonhang->find('all');
        $monuachuong = $query2->find('all',['limit' => 3])->select(['monan_id','count' => $query2->func()->count('monan_id')])->autoFields(true)->group(['monan_id'])->order('count DESC')->contain('Monan');
        $bantin = $this->Bantin->find('all',['contain' => ['Loaibantin','Nguoidung'],'limit' => 3, 'order' => 'Bantin.id DESC']);
        foreach ($bantin as  $value) {
            $content = $value->content;
            $len = strlen($content);
            $img = null;
            while(strpos($content,'<img') !== false)
            {
                $img_start = strpos($content,'<img');
                $img_end = strpos(substr($content,$img_start,$len),'>');
                $img = substr($content,$img_start,$img_end+1);
                if(isset($value->url_img) == false)
                {
                    $value->url_img = $img;
                }
                $content = str_replace($img,'', $content);
            }
            $value->content = substr($content,0,356);
            if(strlen($content) > 356)
            {
                $value->content = $value->content.'...';
            }
        }
        $this->set('bantin', $bantin);
        $this->set('monmoi', $monmoi);
        $this->set('monuachuong', $monuachuong);
        $this->set('gioithieu', $gioithieu);
        $this->set('banner', $banner);
    }
    public function about()
    {
    	$this->viewBuilder()->layout('home');
        $this->loadModel('Gioithieu');
        $gioithieu = $this->Gioithieu->find('all')->andWhere(['page' => 'about','status' => 1 ]);
        $this->set('gioithieu', $gioithieu);
    }
    public function contact()
    {
    	$this->viewBuilder()->layout('home');
        $this->loadModel('Lienhe');
        $this->loadModel('Message');
        $session = $this->request->session();
        $message = $this->Message->newEntity();
        $lienhe = $this->Lienhe->find('all')->toArray()[0];
        if ($this->request->is('post')) {
            $captchaParams = [
                'secret' => '6Lfk8mYUAAAAANBKfajWmA4gqixS5OyVxFv0KVW5',
                'response' => $this->request->getData("g-recaptcha-response")
            ];
            if(json_decode($this->verifyCaptcha($captchaParams))->success == 'true')
            {
                $message = $this->Message->patchEntity($message, $this->request->getData());
                $message->status = 0;
                if ($this->Message->save($message)){
                    $session->write('alert','Successful send message');
                }
                else
                {
                    $session->write('alert','Unsuccessful send message');
                }
            }
            return $this->redirect('/home/contact'); 
        }
        $this->set('lienhe', $lienhe);
        $this->set('message', $message);
    }
    public function info()
    {
        $this->viewBuilder()->layout('home');
        $this->loadModel('Nguoidung');
        if(isset($this->request->getParam('pass')[0]))
        {
            $nguoidung_id = $this->request->getParam('pass')[0];
            if($nguoidung_id != $this->Auth->user('id'))
            {
                return $this->redirect('/home/index'); 
            }
            else
            {
                $nguoidung = $this->Nguoidung->get($nguoidung_id, [
                    'contain' => ['Loainguoidung']
                ]);
                $this->set('nguoidung', $nguoidung); 
            }
        }
        else
        {
            return $this->redirect('/home/index'); 
        }
    }
    public function login()
    {
        $this->viewBuilder()->layout('home'); 
        $this->loadModel('Nguoidung');
        $nguoidung = $this->Nguoidung->newEntity();
        $session = $this->request->session();
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->request->session()->destroy();
                if($user['loainguoidung_id'] <= 3)
                {
                    Configure::write('Session', [
                        'defaults' => 'php',
                        'timeout' => 4320
                    ]);
                }
                if($user['status'] == 0)
                {
                    $session->write('alert','User is not activated');
                }
                else
                {
                    $this->Auth->setUser($user);
                    $session->write('alert','Successful login');
                }
                return $this->redirect($this->Auth->redirectUrl());
            }
            $session->write('alert','Unsuccessful login');
        }  
        $this->set(compact('nguoidung', 'loainguoidung'));  
    }
    public function signup()
    {
        $this->loadModel('Nguoidung');
        $nguoidung = $this->Nguoidung->newEntity();
        $session = $this->request->session();
        if ($this->request->is('post')) {
            $captchaParams = [
                'secret' => '6Lfk8mYUAAAAANBKfajWmA4gqixS5OyVxFv0KVW5',
                'response' => $this->request->getData("g-recaptcha-response")
            ];
            if(json_decode($this->verifyCaptcha($captchaParams))->success == 'true')
            {
                $nguoidung = $this->Nguoidung->patchEntity($nguoidung, $this->request->getData());
                $nguoidung->point = 0;
                $nguoidung->status = 1;
                if ($this->Nguoidung->save($nguoidung)) {
                    $nguoidung_id = $this->Auth->identify()['id'];
                    $user = $this->Nguoidung->findById($nguoidung_id)->toArray();
                    $user = $user['0'];
                    $session->write('alert','Successful signup');
                    if($this->Auth->setUser($user))
                    {}
                }
                else
                {
                    $session->write('alert','Unsuccessful signup');
                }
            }
        }
        return $this->redirect('/home/index'); 
    }
    public function logout()
    { 
        $this->request->session()->destroy();
        $session = $this->request->session();
        $session->write('alert','Successful logout');
        return $this->redirect($this->Auth->logout());       
    }
    public function useredit($id = null)
    {
        $this->viewBuilder()->layout('home');
        $this->loadModel('Nguoidung');    
        $session = $this->request->session();
        if($id != $this->Auth->user('id'))
        {
            return $this->redirect('/home/index'); 
        }
        $nguoidung = $this->Nguoidung->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nguoidung = $this->Nguoidung->patchEntity($nguoidung, $this->request->getData());
            
            if ($this->Nguoidung->save($nguoidung)) {
                $session->write('alert','Successful change infomation');
            }
            else
            {
                $session->write('alert','Unsuccessful change infomation');
            }
            return $this->redirect(['action' => 'info',$id]);
        }
        $this->set(compact('nguoidung', 'loainguoidung'));
    }
    public function editpassword($id = null)
    {
        $this->loadModel('Nguoidung');    
        $session = $this->request->session();
        $nguoidung = $this->Nguoidung->get($id, [
            'contain' => []
        ]);
        $hasher = new DefaultPasswordHasher();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nguoidung = $this->Nguoidung->patchEntity($nguoidung, $this->request->getData());
            if($hasher->check($this->request->getData("old_password"),$nguoidung->password))
            {   
                if($this->request->getData("repeat_password") == $this->request->getData("new_password"))
                {
                    $nguoidung->password = $this->request->getData("new_password");
                    if ($this->Nguoidung->save($nguoidung)) {
                        $session->write('alert','Successful change password');
                    }
                    else
                    {
                        $session->write('alert','Unsuccessful change password');
                    }
                    return $this->redirect(['action' => 'info',$id]);
                }
            }
            
            return $this->redirect(['action' => 'useredit',$id]);
        }
    }
    
    public function orders()
    {
        $this->viewBuilder()->layout('home');
        $donhang = null;
        if($this->request->getParam('pass') != null)
        {

            $nguoidung_id = $this->request->getParam('pass')[0];
            if($nguoidung_id != $this->Auth->user('id'))
            {
                return $this->redirect('/home/index'); 
            }
            $this->loadModel('Donhang');
            $donhang = $this->Donhang->find('all', [
                'conditions' => ['nguoidung_id' => $nguoidung_id],
                'contain' => ['nguoidung']
            ]);
        }
        $donhang = $donhang->toArray();
        $this->set(compact('donhang'));
    }

    public function main()
    {
        $this->viewBuilder()->layout('home');
        $this->loadModel('Monan');
        $this->loadModel('Banner');
        $monan= $this->Monan->find('all',[
            'contain'=> ['Loaimonan'], 'order' => 'Monan.id DESC']);
        $monan->andWhere(['Loaimonan.name' => 'Món chính','Monan.status' => 1]);
        $banner = $this->Banner->findByPosition('main_banner');
        if($banner != null)
        {
            $banner = $banner->toArray()[0];
        }
        $settings = [
           'limit' => 6
         ];
        $monan = $this->paginate($monan,$settings);
        $this->set('banner', $banner);
        $this->set(compact('monan'));        
    }
    public function combo()
    {
        $this->viewBuilder()->layout('home');
        $this->loadModel('Monan');
        $this->loadModel('Banner');
        $monan= $this->Monan->find('all',[
            'contain'=> ['Loaimonan'], 'order' => 'Monan.id DESC']);
        $monan->andWhere(['Loaimonan.name' => 'Combo','Monan.status' => 1]);
        $banner = $this->Banner->findByPosition('combo_banner')->toArray();
        if($banner != null)
        {
            $banner = $banner[0];
        }
        $settings = [
           'limit' => 6
         ];
        $monan = $this->paginate($monan,$settings);
        $this->set('banner',$banner);
        $this->set(compact('monan'));        
    }
    public function appetizer()
    {
        $this->viewBuilder()->layout('home');
        $this->loadModel('Monan');
        $this->loadModel('Banner');
        $monan= $this->Monan->find('all',[
            'contain'=> ['Loaimonan'], 'order' => 'Monan.id DESC']);
        $monan->andWhere(['Loaimonan.name' => 'Món khai vị', 'Monan.status' => 1]);
        $banner = $this->Banner->findByPosition('appetizer_banner');
        if($banner != null)
        {
            $banner = $banner->toArray()[0];
        }
        $settings = [
           'limit' => 6
         ];
        $monan = $this->paginate($monan,$settings);
        $this->set('banner',$banner);
        $this->set(compact('monan'));        
    }
    public function drinks()
    {
        $this->viewBuilder()->layout('home');
        $this->loadModel('Monan');
        $this->loadModel('Banner');
        $monan= $this->Monan->find('all',[
            'contain'=> ['Loaimonan'], 'order' => 'Monan.id DESC']);
        $monan->andWhere(['Loaimonan.name' => 'Món nước', 'Monan.status' => 1]);
        $banner = $this->Banner->findByPosition('drinks_banner');
        if($banner != null)
        {
            $banner = $banner->toArray()[0];
        }
        $settings = [
           'limit' => 6
         ];
        $monan = $this->paginate($monan,$settings);
        $this->set('banner',$banner);
        $this->set(compact('monan'));        
    }
    public function pizza()
    {
        $this->viewBuilder()->layout('home');
        $this->loadModel('Monan');
        $this->loadModel('Banner');
        $monan= $this->Monan->find('all',[
            'contain'=> ['Loaimonan'], 'order' => 'Monan.id DESC']);
        $monan->andWhere(['Loaimonan.name' => 'Pizza','Monan.status' => 1]);
        $banner = $this->Banner->findByPosition('pizza_banner');
        if($banner != null)
        {
            $banner = $banner->toArray()[0];
        }
        $settings = [
           'limit' => 6
         ];
        $monan = $this->paginate($monan,$settings);
        $this->set('banner',$banner);
        $this->set(compact('monan'));        
    }
    public function addcart()
    {
        
        if ($this->request->is('get')) 
        {
            $this->loadModel('Monan');
            $id_food = $this->request->getParam('pass')[0];
            $monan = $this->Monan->get($id_food);
            $price_food = $monan->price;
            $name_food = $monan->name;
            $img_food = $monan->image;
            $unit_price = $monan->price;
            $quantity = 1;
            $session = $this->request->session();
            if(!($session->check('Donhang')))
            {
                $session->write('Donhang.id',$this->Auth->user('id'));
            }
            if($session->check('Donhang.listfood'))
            {
                $data = $session->read('Donhang.listfood');
                if(isset($data[$id_food]))
                {
                    $data[$id_food]['quantity'] += $quantity;
                    $price = $data[$id_food]['quantity'] * $price_food; 
                    $data[$id_food]['price'] = $price;
                }
                else
                {
                    $data[$id_food]['quantity'] = $quantity;
                    $price = $data[$id_food]['quantity'] * $price_food;
                    $data[$id_food]['price'] = $price;
                    $data[$id_food]['name'] = $name_food;
                    $data[$id_food]['img'] = $img_food;
                    $data[$id_food]['unit'] = $unit_price;
                }
            }
            else
            {
                $data[$id_food]['quantity'] = $quantity;
                $price = $data[$id_food]['quantity'] * $price_food;
                $data[$id_food]['price'] = $price;
                $data[$id_food]['name'] = $name_food;
                $data[$id_food]['img'] = $img_food;   
                $data[$id_food]['unit'] = $unit_price;                             
            }
            $sum_price = 0;
            foreach ($data as $val) {
                $sum_price += $val['price'];
            }
            $session->write('Donhang.price',$sum_price);
            $session->write('Donhang.listfood',$data);
        } 
        return $this->redirect(['controller' => 'home','action' => 'cart']);        
    }
    public function editcart()
    {
        if ($this->request->is('post')) 
        {
            $id_food = $this->request->getData('id_food');
            $price_pc = $this->request->getData('price_food');
            $quantity = $this->request->getData('quantity');
            $session = $this->request->session();
            $listfood = $session->read('Donhang.listfood');
            $sum_price = $session->read('Donhang.price');
            foreach($listfood as $key => $var)
            {
                if($id_food == $key)
                {
                    $price_food = $price_pc/$listfood[$id_food]['quantity'];
                    $listfood[$id_food]['quantity'] = $quantity;
                    $price = $listfood[$id_food]['quantity'] * $price_food;
                    $listfood[$id_food]['price'] = $price;
                }
            }
            $sum_price = 0;
            foreach ($listfood as $val) {
                $sum_price += $val['price'];
            }
            $session->write('Donhang.price',$sum_price);
            $session->write('Donhang.listfood',$listfood);
        }
        return $this->redirect(['controller' => 'home','action' => 'cart']);
    }

    public function deletefoodcart()
    {
        if ($this->request->is('post')) 
        {
            $id_food = $this->request->getData('id_food');
            $price_food = $this->request->getData('price_food');
            $session = $this->request->session();
            $listfood = $session->read('Donhang.listfood');
            foreach($listfood as $key => $var)
            {
                if($id_food == $key)
                    unset($listfood[$key]);
            }
            $sum_price = $session->read('Donhang.price');
            $sum_price = $sum_price - $price_food;
            $session->write('Donhang.price',$sum_price);
            $session->write('Donhang.listfood',$listfood);
        }
        return $this->redirect(['controller' => 'home','action' => 'cart']);
    }
    public function deleteallfoodcart()
    {
        $session = $this->request->session();
        $session->delete('Donhang.listfood');
        return $this->redirect(['controller' => 'home','action' => 'cart']);
    }
    public function addorder()
    {
        if($this->request->is('post'))
        {
            $captchaParams = [
                'secret' => '6Lfk8mYUAAAAANBKfajWmA4gqixS5OyVxFv0KVW5',
                'response' => $this->request->getData("g-recaptcha-response")
            ];
            if(json_decode($this->verifyCaptcha($captchaParams))->success == 'true')
            {
               $this->loadModel('Donhang');
                $this->loadModel('Nguoidung');
                $this->loadModel('Loainguoidung');
                $donhang = $this->Donhang->newEntity();
                $donhang = $this->Donhang->patchEntity($donhang, $this->request->getData());
                $session = $this->request->session();
                $id_user = $session->read('Donhang.id',$this->Auth->user('id'));
                $price = $session->read('Donhang.price');
                $listfood = $session->read('Donhang.listfood');
                $loainguoidung = null;
                if($this->Auth->user()) {
                    $nguoidung = $this->Nguoidung->findById($id_user,[
                    'contain' => ['Loainguoidung']])->toArray()[0];
                    $loainguoidung = $this->Loainguoidung->findById($nguoidung['loainguoidung_id'])->toArray()[0];
                    $discount = $loainguoidung['discount'];
                }
                if($listfood != null)
                {
                    $donhang->price = $price;
                    if($this->Auth->user()) {
                        $donhang->nguoidung_id = $id_user;
                    }
                    $donhang->status = 0;
                    if($loainguoidung['discount'] == 0 || isset($loainguoidung))
                    {
                        $donhang->discount = 0;
                        $donhang->ship_price = 20000;
                    }
                    else
                    {
                        $donhang->discount = $price / $discount;
                        if($loainguoidung['discount'] >= 10)
                            $donhang->ship_price = 0;
                    }    
                }
                $result = $this->Donhang->save($donhang);
                $donhang_id=$result->id;
                return $this->redirect(['controller' => 'chitietdonhang','action' => 'add',$donhang_id]);
            }
        }
        return $this->redirect(['controller' => 'home','action' => 'cart']);
    }
    public function cart()
    { 
        $this->viewBuilder()->layout('home');
        $this->loadModel('Donhang');
        $donhang = $this->Donhang->newEntity();
        $session = $this->request->session();
        $listfood = $session->read('Donhang.listfood');  
        $sum_price = $session->read('Donhang.price');
        $this->set(compact('listfood','sum_price')); 
        $this->set('donhang',$donhang);
    }
    public function confirm()
    {
        $this->viewBuilder()->layout('home');
        $this->loadModel('Donhang');
        $this->loadModel('Khuvucgiaohang');
        $donhang = $this->Donhang->newEntity();
        $session = $this->request->session();
        $listfood = $session->read('Donhang.listfood');  
        $sum_price = $session->read('Donhang.price');
        if($sum_price < 100000)
        {
            $session->write('alert','Orders must be over 100,000 VND');
            return $this->redirect('/home/cart');
        }
        $khuvuc = $this->Khuvucgiaohang->find('list', ['limit' => 200]);
        $khuvuc->andWhere(['status' => 1]);
        $this->set(compact('listfood','sum_price','khuvuc')); 
        $this->set('donhang',$donhang);
    }
    public function bill()
    { 
        $this->viewBuilder()->layout('home');
        if(isset($this->request->getParam('pass')[0]))
        {
            $donhang_id = $this->request->getParam('pass')[0];
            $this->loadModel('Chitietdonhang');
            $this->loadModel('Khuvucgiaohang');
            $chitietdonhang = $this->Chitietdonhang->find('all',[
                'conditions'=> ['donhang_id'=> $donhang_id],
                'contain'=> ['Monan','Donhang']]);
            if($chitietdonhang->toArray()[0]->donhang->nguoidung_id != $this->Auth->user('id'))
            {
                return $this->redirect('/home/index'); 
            }
            $khuvucgiaohang = $this->Khuvucgiaohang->findById($chitietdonhang->toArray()[0]->donhang->khuvucgiaohang_id)->toArray();
            $this->set(compact('chitietdonhang','khuvucgiaohang')); 
        }
    }
    public function detail()
    {
        $this->viewBuilder()->layout('home');
        $chitietdonhang = null;
        if($this->request->getParam('pass') != null)
        {
            $donhang_id = $this->request->getParam('pass')[0];
            $this->loadModel('Chitietdonhang');
            $chitietdonhang = $this->Chitietdonhang->find('all', [
                'conditions' => ['donhang_id' => $donhang_id],
                'contain' => ['monan','Donhang']
            ]);   
            if($chitietdonhang->toArray() != null)
            {
                if($chitietdonhang->toArray()[0]->donhang->nguoidung_id != $this->Auth->user('id'))
                {
                    return $this->redirect('/home/index'); 
                }
                $this->set(compact('chitietdonhang')); 
            }
        }
    }
    public function news()
    {
        $this->viewBuilder()->layout('home');
        $this->loadModel("Bantin");
        $this->loadModel("Loaibantin");
        $bantin = $this->Bantin->find('all',[
            'contain'=> ['Nguoidung','Loaibantin'], 'order' => 'Bantin.id DESC']);
        $bantin->andWhere(['Bantin.status' => 1]);
        if(isset($this->request->getParam('pass')[0]))
        {
            $bantin->andWhere(['loaibantin_id' => $this->request->getParam('pass')[0]]);
        }
        
        $settings = [
           'limit' => 3
         ];
        $bantin = $this->paginate($bantin,$settings);
        foreach ($bantin as  $value) {
            $content = $value->content;
            $len = strlen($content);
            $img = null;
            while(strpos($content,'<img') !== false)
            {
                $img_start = strpos($content,'<img');
                $img_end = strpos(substr($content,$img_start,$len),'>');
                $img = substr($content,$img_start,$img_end+1);
                if(isset($value->url_img) == false)
                {
                    $value->url_img = $img;
                }
                $content = str_replace($img,'', $content);
            }
            $value->content = substr($content,0,356);
            if(strlen($content) > 356)
            {
                $value->content = $value->content.'...';
            }
        }
        $loaibantin = $this->Loaibantin->find('all',[
            'contain'=> ['Bantin']])->andWhere(['Loaibantin.status' => 1])->toArray();
        foreach ($loaibantin as $value) {
            $value['count'] = count($value->bantin);
        }
        $this->set('loaibantin',$loaibantin);
        $this->set('bantin',$bantin);
    }
    public function detailNews()
    {
        $this->viewBuilder()->layout('home');
        $this->loadModel("Bantin");
        $this->loadModel("Loaibantin");
        $bantin = null;
        if($this->request->is('get'))
        {
            $bantin = $this->Bantin->find('all',[
            'contain'=> ['Loaibantin','Nguoidung'],
            'conditions' => [ 'Bantin.id' => $this->request->getParam('pass')[0], 'Bantin.status' => 1]])->toArray();
        }
        $loaibantin = $this->Loaibantin->find('all',[
            'contain'=> ['Bantin']])->andWhere(['Loaibantin.status' => 1])->toArray();
        foreach ($loaibantin as $value) {
            $value['count'] = count($value->bantin);
        }
        $this->set('loaibantin',$loaibantin);
        $this->set('bantin',$bantin);
    }
    public function verifyCaptcha($params)
    {
        $verifyUrl = env('GOOGLE_CAPTCHA_VERIFY_LINK', 'https://www.google.com/recaptcha/api/siteverify');
        $ch = curl_init($verifyUrl);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec ($ch);
        curl_close ($ch);
        return $result;
    }
 }