<?php

require '../vendor/autoload.php';

use App\routes\Web;

$web = new Web();

echo "call ". __CLASS__ . " here ";

use App\models\Legs;
$web = new Legs();


 