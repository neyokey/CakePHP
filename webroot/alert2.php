<?php
namespace App\Controller;

use App\Controller\AppController;
 
if (!defined('DS')) {
define('DS', DIRECTORY_SEPARATOR);
}
 
require_once(dirname(dirname(__FILE__)).DS.'config'.DS.'bootstrap.php');
require_once(dirname(dirname(__FILE__)).DS.'src'.DS.'Controller'.DS.'AdminController.php');
 
$user = new AdminController();
$responseofappfunction = $user->index();
 
?>