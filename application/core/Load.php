<?php

namespace application\core;


class Load{

    public $layout = 'default';

    public function view($path,$data = []){
        if($data){
            extract($data);
        }
        $path = 'application/views/'.$path.'.php';
        if(file_exists($path)){
            require $path;
        }
    }

    public function model($name, $nameReplace = ''){
        $path = 'application/models/'.$name.'.php';
        $path_class = 'application\models\\'.ucfirst($name);
        if(file_exists($path)){
            if($nameReplace) $name = $nameReplace;
            return $this->$name = new $path_class;
        }
    }

    public function redirect($url){
        if($url == '/'){
            $url .= Router::$site_name;
        }else{
            $url = '/'.Router::$site_name.$url;
        }
        header('Location: '.$url);
        exit;
    }

    public static function errorCode($code){
        http_response_code($code);
        $path = 'application/views/errors/'.$code.'.php';
        if(file_exists($path)){
            require $path;
        }
        exit;
    }

}