<?php
namespace App\View\Helper;

use Cake\View\Helper;

class DotHelper extends Helper
{
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