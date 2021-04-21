<?php
 
require '../vendor/autoload.php';
//include '../application/routes/Web.php';

use App\routes\Web;



$webClass = new Web();
// https://www.php.net/manual/ru/reserved.variables.server.php
$webClass -> callController($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);


