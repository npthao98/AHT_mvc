<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
require __DIR__ . '/../vendor/autoload.php';

use Core\Router;
use Core\Request;
use Core\Dispatcher;

$dispatch = new Dispatcher();
$dispatch->dispatch();

//day la branch ORM









