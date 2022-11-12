<?php
class Controller{

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($option, $view, $data=[]){
        require_once "./mvc/views/".$option."/".$view.".php";
    }

    public function href($message, $url){
        if($message != ''){
            echo "<script>  
            alert('$message');   
            window.location.href= '$url';
            </script>";
        }else{
            echo "<script>   
            window.location.href= '$url';
            </script>";
        }
    }

}
