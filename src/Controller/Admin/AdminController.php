<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class AdminController  extends AppController
{
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
	public function index()
    {
        
    }
}
?>