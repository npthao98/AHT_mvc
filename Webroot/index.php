<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
require __DIR__ . '/../vendor/autoload.php';

use Core\Router;
use Core\Request;
use Core\Dispatcher;

$dispatch = new Dispatcher();
$dispatch->dispatch();

//use Models\TaskModel;
//
//$task = new TaskModel();
//$task->setId(1);
//$task->setTitle('thao');
//$task->setDescription('skjldsd');
//$attributes = "";
//$values = "";
//$ars = $task->getProperties();
//foreach ($ars as $ar => $va){
//    if ($ar != "id") {
//        $attributes = $attributes.$ar." = :".$ar.", ";
//    }
//}
//echo $attributes;










