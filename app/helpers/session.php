<?php
session_start();

function flash($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty($name) && empty($_SESSION[$name])){
        if(!empty($_SESSION[$name . '_class'])){
            unset($_SESSION[$name . '_class']);
        }

        $_SESSION[$name] = $message;
        $_SESSION[$name . '_class'] = $class;
    }elseif( empty($message) && ! empty($_SESSION[$name]) ){
        $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
        
        printf('<div class="%s">%s</div>',$class, $_SESSION[$name] );

        unset($_SESSION[$name]);
        unset($_SESSION[$name . '_class']);
    }
}