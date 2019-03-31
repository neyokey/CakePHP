<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/**
 * Donhang Controller
 *
 * @property \App\Model\Table\DonhangTable $Donhang
 *
 * @method \App\Model\Entity\Donhang[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DonhangController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function beforeFilter(Event $event) {
        if ($this->Auth->user('loainguoidung_id') > 3) {
            $this->redirect('/admin/');
        }
    }
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $status = $this->request->getData('status');  
        $info = $this->request->getData('info');  
        $price = $this->request->getData('price');
        $donhang = $this->Donhang->find('all', [
            'contain' => ['nguoidung','nguoigiaohang','khuvucgiaohang'],
            'order' => ['Donhang.id' => 'DESC']
        ]);
        if(isset($this->request->getParam('?')['id_kind']))
        {
            $id_kind = $this->request->getParam('?')['id_kind'];
            $id = $this->request->getParam('?')['id'];
            $donhang->andWhere([$id_kind.'_id' => $id]);
        }
        if ($status != null)
        {
            $donhang->andWhere(['Donhang.status' => $status]);
        }
        if ($price)
        {
            $donhang->andWhere(['price' => $price]);
        }
        if ($info)
        {
            $donhang->andWhere([
                'OR'=>[
                    ['Donhang.name like' => '%'.$info.'%'],
                        ['Donhang.phone like' => '%'.$info.'%'],
                            ['Donhang.address like' => '%'.$info.'%'],
                                ['Donhang.id' => $info]
                    ]]);
        }
        $settings = [
           'limit' => 7
         ];
        $donhang = $this->paginate($donhang,$settings);
        $this->set(compact('donhang'));
    }
    public function view($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Chitietdonhang');
        $donhang = $this->Donhang->find('all', [
            'conditions' => ['Donhang.id' => $id],
            'contain' => ['nguoidung','nguoigiaohang','khuvucgiaohang']
        ])->toArray();
        if($donhang != null)
        {
            $donhang = $donhang[0];
            $chitietdonhang = $this->Chitietdonhang->find('all',[
                'conditions'=> ['donhang_id'=> $donhang->id],
                'contain'=> ['Monan','Donhang']]);
            $nguoigiaohang = $this->Donhang->Nguoigiaohang->find('list', ['limit' => 200]);
            $nguoigiaohang->andWhere(['status' => '1']);
            $this->set('nguoigiaohang',$nguoigiaohang);
            $this->set('chitietdonhang', $chitietdonhang);
        }
        $this->set('donhang', $donhang);
    }
    public function addcart()
    {
        if ($this->request->is('post')) 
        {
            $amount = $this->request->getData('amount');
            $id_food = $this->request->getData('id_food');
            $price_food = $this->request->getData('price_food');
            $name_food = $this->request->getData('name_food');
            $session = $this->request->session();
            if(!($session->check('Donhang')))
            {
                $time = Time::now();
                $session->write('Donhang.id',$this->Auth->user('id'));
                $session->write('Donhang.insert_time',$time);
            }
            if( $session->check('Donhang.listfood'))
            {
                $data = $session->read('Donhang.listfood');
                if(isset($data[$id_food]))
                {
                    $data[$id_food]['amount'] += $amount;
                    $price = $data[$id_food]['amount'] * $price_food;
                    $data[$id_food]['price'] = $price;
                    $data[$id_food]['name'] = $name_food;
                }
                else
                {
                    $data[$id_food]['amount'] = $amount;
                    $price = $data[$id_food]['amount'] * $price_food;
                    $data[$id_food]['price'] = $price;
                    $data[$id_food]['name'] = $name_food;
                }
            }
            else
            {
                $data[$id_food]['amount'] = $amount;
                $price = $data[$id_food]['amount'] * $price_food;
                $data[$id_food]['price'] = $price;
                $data[$id_food]['name'] = $name_food;                                
            } 
            $sum_price = 0;
            foreach ($data as $val) {
                $sum_price += $val['price'];
            }
            $session->write('Donhang.price',$sum_price);
            $session->write('Donhang.listfood',$data);
        } 
        return $this->redirect(['controller' => 'home','action' => 'giohang']);        
    }
    public function editcart()
    {
        if ($this->request->is('post')) 
        {
            $id_food = $this->request->getData('id_food');
            $price_pc = $this->request->getData('price_food');
            $amount = $this->request->getData('amount');
            $session = $this->request->session();
            $listfood = $session->read('Donhang.listfood');
            $sum_price = $session->read('Donhang.price');
            foreach($listfood as $key => $var)
            {
                if($id_food == $key)
                {
                    $price_food = $price_pc/$listfood[$id_food]['amount'];
                    $listfood[$id_food]['amount'] = $amount;
                    $price = $listfood[$id_food]['amount'] * $price_food;

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
        return $this->redirect(['controller' => 'home','action' => 'giohang']);
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
        return $this->redirect(['controller' => 'home','action' => 'giohang']);
    }
    public function add()
    {
        $donhang = $this->Donhang->newEntity();
        $session = $this->request->session();
        $id_user = $session->read('Donhang.id',$this->Auth->user('id'));
        $time = $session->read('Donhang.insert_time');
        $price = $session->read('Donhang.price');
        $listfood = $session->read('Donhang.listfood');
        if($listfood != null)
        {
            $donhang->price = $price;
            $donhang->insert_time = $time;
            $donhang->nguoidung_id = $id_user;
        }
        $result = $this->Donhang->save($donhang);
        $donhang_id=$result->id;
        return $this->redirect(['controller' => 'chitietdonhang','action' => 'add',$donhang_id]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Donhang id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Nguoigiaohang');
        $this->loadModel('Nguoidung');
        $this->loadModel('Loainguoidung');
        $donhang = $this->Donhang->get($id, [
            'contain' => []
        ]);
        if($donhang->status == 2 ||$donhang->status == 3)
        {
            return $this->redirect(['action' => 'index']);
        }
        $id_nguoigiaohang = $donhang['nguoigiaohang_id'];
        $status = $donhang['status'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $donhang = $this->Donhang->patchEntity($donhang, $this->request->getData());  
            if($donhang['nguoigiaohang_id'] !== null)
            {
                $nguoigiaohang = $this->Nguoigiaohang->findById($donhang['nguoigiaohang_id'])->toArray()[0];
                if($donhang['status'] !== null)
                {
                    if($status == 0)
                    {
                        $nguoigiaohang->status = 2;
                        $donhang->status = 1;
                    }
                    elseif($donhang['status'] == 0)
                    {
                        $nguoigiaohang->status = 1;
                        $donhang->nguoigiaohang_id = null;
                    }
                    else
                    {
                        $nguoigiaohang->status = 1;
                        if($donhang['status'] == 2 && $donhang['nguoidung_id'] != null)
                        {
                            $query = $this->Nguoidung->findById($donhang['nguoidung_id'])->andWhere(['loainguoidung_id >' => 3]);
                            if($query->toArray() != null)
                            { 
                                $nguoidung = $query->toArray()[0];
                                $nguoidung->point += ($donhang['price']-$donhang['discount'])/10000;
                                if($nguoidung->loainguoidung_id != 1 || $nguoidung->loainguoidung_id != 2)
                                {
                                    $loainguoidung = $this->Loainguoidung->find('all')->where(['point !=' => '-1'])->order(['point'])->toArray();
                                    foreach ($loainguoidung as $value) 
                                    {
                                        if($nguoidung->point >= $value['point'])
                                            $nguoidung->loainguoidung_id = $value['id'];
                                    }
                                }
                                $this->Nguoidung->save($nguoidung);
                            }
                        }
                    }
                    
                }
                else
                {
                    $donhang->status = 1;
                }
                $this->Nguoigiaohang->save($nguoigiaohang);
            }
            else
            {
                $donhang->status = 0;
                if($id_nguoigiaohang != null)
                {
                    $nguoigiaohang = $this->Nguoigiaohang->findById($id_nguoigiaohang
                        )->toArray()[0];
                    $nguoigiaohang->status = 1;
                    $this->Nguoigiaohang->save($nguoigiaohang);
                } 
            }
            if ($this->Donhang->save($donhang))   
                return $this->redirect(['action' => 'index']);
        }
        $nguoigiaohang = $this->Donhang->Nguoigiaohang->find('list', ['limit' => 200]);
        $nguoigiaohang->andWhere(['status' => '1']);
        $nguoigiaohang = $nguoigiaohang->toArray();
        $nguoigiaohang[null] = 'Không chọn';
        $this->set('nguoigiaohang',$nguoigiaohang);
        $this->set(compact('donhang'));
    }
    public function print($id = null)
    {
        if($id != null)
        {
            $this->loadModel('Nguoigiaohang');
            $this->loadModel('Nguoidung');
            $this->loadModel('Khuvucgiaohang');
            $this->loadModel('Chitietdonhang');
            $donhang = $this->Donhang->get($id, [
                'contain' => []
            ]);
            $chitietdonhang = $this->Chitietdonhang->find('all',[
                'conditions'=> ['donhang_id'=> $donhang->id],
                'contain'=> ['Monan','Donhang']])->toArray();
            if($chitietdonhang != null)
            {
                $spreadsheet  = new Spreadsheet();
                $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->applyFromArray([
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ]);
                $spreadsheet->getActiveSheet()
                ->duplicateStyle(
                    $spreadsheet->getActiveSheet()->getStyle('B2'),
                    'A1:F100'
                );
                //Set document properties
                $spreadsheet ->getProperties()
                ->setCreator('shubh ')
                ->setCategory('Example');
                // Add some data 
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $spreadsheet ->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Người nhận')
                ->setCellValue('A2', $donhang->name)
                ->setCellValue('B1', 'Số điện thoại')
                ->setCellValue('B2', $donhang->phone)
                ->setCellValue('C1', 'Địa chỉ')
                ->setCellValue('C2', $donhang->address)
                ->setCellValue('D1', 'Khu vực giao hàng')
                ->setCellValue('D2', $donhang->Khuvucgiaohang['name'])
                ->setCellValue('E1', 'Thời gian đặt hàng')
                ->setCellValue('E2', $donhang->insert_time)
                ->setCellValue('F1', 'Ghi chú')
                ->setCellValue('F2', $donhang->note)
                ->setCellValue('B4', 'Món ăn')
                ->setCellValue('C4', 'Tên')
                ->setCellValue('D4', 'Số lượng')
                ->setCellValue('E4', 'Giá');
                $array = array(
                    'name' => array(),
                    'quantity' => array(),
                    'price' => array()
                );
                $sum_quantity = 0;
                $sum_price = 0 ;
                $count = 0;
                $count_row = 5;
                foreach ($chitietdonhang as  $value) {
                    $price = $value['quantity']*$value->monan['price'];
                    $spreadsheet ->setActiveSheetIndex(0)
                    ->setCellValue('C'.$count_row , $value->monan['name'])
                    ->setCellValue('D'.$count_row , $value->quantity)
                    ->setCellValue('E'.$count_row , $this->dot($price)." VND");
                    $count_row ++;
                }
                $spreadsheet ->setActiveSheetIndex(0)
                ->setCellValue('A'.($count_row + 1), 'Tổng')
                ->setCellValue('B'.($count_row + 1), 'Giá')
                ->setCellValue('C'.($count_row + 1), 'Phí giao hàng')
                ->setCellValue('D'.($count_row + 1), 'Giảm giá')
                ->setCellValue('E'.($count_row + 1), 'Tiền trả')
                ->setCellValue('B'.($count_row + 2), $this->dot($donhang->price)." VND")
                ->setCellValue('C'.($count_row + 2), $this->dot($donhang->ship_price)." VND")
                ->setCellValue('D'.($count_row + 2), $this->dot($donhang->discount)." VND")
                ->setCellValue('E'.($count_row + 2), $this->dot($donhang->price + $donhang->ship_price - $donhang->discount)." VND");
                $writer = new Xlsx($spreadsheet);
                $writer ->save(WWW_ROOT . 'files\bill_'.$donhang->id.'.xlsx');
            }
        }
        return $this->redirect(['action' => 'index']);
    }
    public function dot($n)
    {
        $len = strlen($n);
        $counter = 3;
        $result = "";
        while ($len - $counter >= 0)
        {
            $con = substr($n, $len - $counter , 3);
            $result = '.'.$con.$result;
            $counter+= 3;
        }
        $con = substr($n, 0 , 3 - ($counter - $len) );
        $result = $con.$result;
        if(substr($result,0,1)=='.'){
            $result=substr($result,1,$len+1);   
        }
        return $result;
    }
}
