<?php 
//Inculude Config
require_once 'config/config.php';

// Class Autoload
spl_autoload_register(function($className){
    require_once 'libraries/'.$className.'.php';
});