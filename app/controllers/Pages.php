<?php 

class Pages extends Controllers{
    public function __construct(){
        
    }

    public function index(){

        $data = [
            'title' => 'LiteMVC',
            'description' => 'Simple social network built on the LiteMVC PHP Framework!'
        ];

        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About'
        ];

        $this->view('pages/about', $data);
    }
}