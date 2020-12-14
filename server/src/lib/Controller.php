<?php

class Controller{
    function __construct(){
    }
    public function loadModel($model){
        $url = MODELS.$model.'Model.php';
        if(file_exists($url)){
            require $url;
            $modelName = $model.'Model';
            $this->model = new $modelName;
        }else{
            //throw error
        }
    }
    function error(){
        $this->view->render('error/index');
    }

    function getInput(){
        $data = json_decode(file_get_contents("php://input"), true);
        $data = filter_var_array($data,FILTER_SANITIZE_STRING);
        return $data;
    }

}