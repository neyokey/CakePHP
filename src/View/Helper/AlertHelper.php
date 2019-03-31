<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class AlertHelper extends Helper
{
    public function alert()
    {
        $this->loadModel('Donhang');
        TableRegistry::get('Donhang');
        $count=$this->Donhang->find('all')->count();
        if($this->request->session()->check('Countdonhang'))
        {
            $old_count = $this->request->session()->read('Countdonhang');
            if($count != $old_count)
            {
                $this->request->session()->write('Countdonhang',$count);
                $this->request->session()->write('alert','Bạn có đơn hàng mới');
                return 'Bạn có đơn hàng mới';
            }
        }
        else
        {
            $this->request->session()->write('Countdonhang',$count);
            return 'Bạn không có đơn hàng mới';
        }
    }
}