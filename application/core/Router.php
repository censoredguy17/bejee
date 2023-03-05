<?php
namespace application\core;

use application\core\View;

class Router{

    protected $controller = '';
    protected $action = '';
    public static $site_name = 'bejee';

    public function __construct()
    {
        $this->prepare();
    }

    public function prepare(){
        $req_uri = $_SERVER['REQUEST_URI'];
        if($_GET){
            $req_uri = stristr($req_uri,'?',true);
        }
        $url = str_replace('/'.Router::$site_name.'/','',$req_uri);
        $url_arr = explode('/',$url);
        $this->controller = !in_array($url_arr[0], array('', ' ', '/')) ? lcfirst($url_arr[0]) : 'Main';
        $this->action = (isset($url_arr[1]) and $url_arr[1] != '') ? $url_arr[1] : 'index';
    }

    public function run(){
        $path = 'application\controllers\\'.ucfirst($this->controller).'Controller';
        if(class_exists($path)){
            $model = $this->action;
            if(method_exists($path,$model)){
                $controller = new $path();
                $controller->$model();
            }else{
//                    echo 'Такой метод не найден: '.$model;
                Load::errorCode(404);
            }
        }else{
//                echo 'Такой класс не найден: '.$path;
            Load::errorCode(404);
        }
    }

}