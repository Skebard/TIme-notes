<?php

class Note extends Controller{
    public function getAll(){

    }
    public function render(){
        echo 'i am redering';
        // $this->model->getAll();
        var_dump($this->model->getByDate('13/12/20'));
    }
    public function all(){
        echo json_encode($this->model->getAll(),true);
    }
    public function date($date){
        $date = str_replace("-","/",$date);
        echo json_encode($this->model->getByDate($date),true);
    }
}