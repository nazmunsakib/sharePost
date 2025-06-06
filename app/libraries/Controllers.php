<?php 
/**
 * Base COntroller 
 */
class Controllers{

    public function model($model){
        // Require model file
        require_once '../app/models/' . $model . '.php';

        return new $model();
    }

    public function view($view, $data = []){
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            die('View Does not exist');
        }
    }
}