<?php

function __autoload ($classname) {
    if (strpos($classname, 'Entity')) {
        require (__DIR__.'/../common/models/entities/'.$classname.'.php');
    } elseif (strpos($classname, 'Collection')) {
        require (__DIR__.'/../common/models/collections/'.$classname.'.php');
    } elseif (strpos($classname, 'Controller')) {
        require (__DIR__.'/../common/controllers/admin/'.$classname.'.php');
    } else {
        require (__DIR__.'/../common/system/'.$classname.'.php');
    }
}

$controller = 'index1.php';
$controller = (isset($_GET['c']))? $_GET['c'] : 'dashboard';
$controller =ucfirst($controller).'Controller';

$method = (isset($_GET['m']))? $_GET['m'] : 'index';

$ins = new $controller();
$ins->$method();