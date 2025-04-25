<?php

class Users extends Controllers{
    private $userModels;

    public function __construct(){
        $this->userModels = $this->model('User');
    }

    public function register(){
        //check for request method
        if('POST' == $_SERVER['REQUEST_METHOD']){
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            //Init data
            $data = [
                'name'                  => trim($_POST['name']),
                'email'                 => trim($_POST['email']),
                'password'              => trim($_POST['password']),
                'confirm_password'      => trim($_POST['confirm_password']),
                'name_err'              => '',
                'email_err'             => '',
                'password_err'          => '',
                'confirm_password_err'  => ''
            ];

            //Validate Name
            if(empty($_POST['name'])){
                $data['name_err']   = 'Please enter name';
            }

            //Validate email
            if(empty($_POST['email'])){
                $data['email_err']   = 'Please enter email';
            }else{
                if($this->userModels->findUserByEmail($data['email'])){
                    $data['email_err']   = 'Email is already taken!';
                }
            }

            //Validate password
            if(empty($_POST['password'])){
                $data['password_err']   = 'Please enter password';
            }else if(strlen($data['password']) < 6){
                $data['password_err']   = 'Password must be at last 6 characters';
            }

            //Validate Name
            if(empty($_POST['confirm_password'])){
                $data['confirm_password_err']   = 'Please enter confirm password';
            }else if($_POST['password'] != $data['confirm_password']){
                $data['confirm_password_err']   = 'Passwords do not match';
            }

            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                //create password hash
                $data['password']   =   password_hash($data['password'], PASSWORD_DEFAULT);

                if($this->userModels->register($data)){
                    flash('register_confirmation', "Your account successfully created! Now login");
                    redirect('users/login');
                }else{
                    die('Somthing went wrong!');
                }
            }else{
                //Load forntend
                $this->view('users/register', $data);
            }
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
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            //Init data
            $data = [
                'email'                 => trim($_POST['email']),
                'password'              => trim($_POST['password']),
                'email_err'             => '',
                'password_err'          => '',
            ];

            //Validate email
            if(empty($_POST['email'])){
                $data['email_err']   = 'Please enter email';
            }

            //Validate password
            if(empty($_POST['password'])){
                $data['password_err']   = 'Please enter password';
            }else if(strlen($data['password']) < 6){
                $data['password_err']   = 'Password must be at last 6 characters';
            }

            if( empty($data['email_err']) && empty($data['password_err'])){
                die('SUCCESS!');
            }else{
                //Load forntend
                $this->view('users/login', $data);
            }
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