<?php

class Router
{
    private $class = 'Note';
    private $method = 'getAll';
    private $params = [];

    public function __construct(){

        $url = $this->getUrl();
        if(isset($url[0]) && file_exists(CONTROLLERS.ucwords($url[0]).'Controller.php')){
            //set a new controller
            $this->class = ucwords($url[0]);
            unset($url[0]);
        }
        require_once CONTROLLERS. $this->class .'Controller.php';
        $controller = new $this->class;
        $controller->loadModel($this->class);

        //check for the method ( second param of the url)
        if(isset($url[1])){
            if(method_exists($controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }else{
                $this->method = 'error';
            }
        }
        //get params
        $this->params = $url ? array_values($url): [];
        //call a callback with array of prams
        call_user_func_array([$controller,$this->method],$this->params);
    }

    public function getUrl(){
        //we want to check that the variable url is set
        //this variable is set by the htaccess file
        echo 'get';
        if(isset($_GET['url'])){
            //remove slashes at the beginning and end
            $url = rtrim($_GET['url'],'/');
            //remove characters not allowed by urls
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
        return ['login'];
    }
}