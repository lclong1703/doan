<?php
class App{
    protected $option="customer";
    protected $controller="home";
    protected $action="customer";
    protected $params=[];

    function __construct(){
        $arr = $this->UrlProcess();
        // //option
        if( isset($arr[0]) && file_exists("./mvc/controllers/".$arr[0]) ){
            $this->option = $arr[0];
            unset($arr[0]);
        }

        // Controller
        if( isset($arr[1]) && file_exists("./mvc/controllers/".$this->option."/".$arr[1].".php") ){
            $this->controller = $arr[1];
            unset($arr[1]);
        }

        require_once "./mvc/controllers/".$this->option."/". $this->controller .".php";
        $this->controller = new $this->controller;


        if( $this->option != $this->action ){
            $this->action = $this->option;
        }

        // Action
        if(isset($arr[2])){
            if( method_exists( $this->controller , $arr[2]) ){
                $this->action = $arr[2];
            }
            unset($arr[2]);
        }

        // Params
        $this->params = $arr?array_values($arr):[];

        call_user_func_array([$this->controller, $this->action], $this->params );

    }

    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }

}
?>