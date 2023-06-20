<?php

session_start();

//Rotas
define('HOME', 'http://26.248.91.231/tcc/');
define('THEME', 'sshtml');

define('INCLUDE_PATH', HOME . '/themes/' . THEME);
define('REQUIRE_PATH', 'themes/' . THEME);

//-----------------------------------------------------------------------
$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$setUrl = (empty($getUrl) ? 'index' : $getUrl);
$Url = explode('/', $setUrl);

    /*$db = '';
    $user = '';
    $pass = '';
    $host = '';*/


spl_autoload_register(function($class_name){
    $filename = "../php/".$class_name.".class.php";
    if(file_exists($filename)){
        require_once($filename);
    }
});

spl_autoload_register(function($class_name){
    $filename = "php/".$class_name.".class.php";
    if(file_exists($filename)){
        require_once($filename);
    }
  });
?>