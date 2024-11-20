<?php
class Controller{
    public function model($model){
        require_once "./user/model/bl/".$model.".php";
        return new $model;
    } 

    public function view($view, $data=[]){
        require_once "./user/view/page/".$view.".php";
    }

}
?>