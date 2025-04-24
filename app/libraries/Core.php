<?php 
/**
 * App Core Class
 */

 class Core{
    protected $currentController    = 'Pages';
    protected $currentMethod        = 'index';
    protected $prams                = [];

    public function __construct(){

      $url =  $this->getUrl();

      //Find controller in first value
      if(file_exists(filename: '../app/controllers/' . ucwords($url[0]) . '.php')){
        $this->currentController = ucwords($url[0]);

        unset($url[0]);
      }

      //Require the controller class 
      require_once '../app/controllers/' . $this->currentController . '.php';

      //Instantiate the controller class
      $this->currentController = new $this->currentController;

      if(isset($url[1])){
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          unset($url[1]);
        }
      }

      $this->prams = $url ? array_values($url) : [];

      call_user_func_array([$this->currentController, $this->currentMethod], $this->prams);
      
    }

    public function getUrl(){
      if($_GET['url']){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);

        return $url;
      }
    }
 }