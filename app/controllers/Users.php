<?php

class Users extends Controllers{
    public function __construct(){

    }

    public function register(){
        //check for request method
        if('POST' == $_SERVER['REQUEST_METHOD']){
            //Proccess from
        }else{
            //Init data
            $data = [
                'name'                  => '',
                'email'                 => '',
                'password'              => '',
                'confirm_password'      => '',
                'name_err'              => '',
                'email_err'             => '',
                'password_err'          => '',
                'confirm_password_err'  => ''
            ];

            //Load forntend
            $this->view('users/register', $data);
        }
    }

    public function login(){
        //check for request method
        if('POST' == $_SERVER['REQUEST_METHOD']){
            //Proccess from
        }else{
            //Init data
            $data = [
                'email'                 => '',
                'password'              => '',
                'email_err'             => '',
                'password_err'          => '',
            ];

            //Load forntend
            $this->view('users/login', $data);
        }
    }
}