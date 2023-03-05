<?php

namespace application\models;

use application\core\Model;

class MainModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function login($post){
        if($post['login'] == ''){
            echo json_encode(array('result' => 0, 'message' => 'Вы не ввели логин!'));
        }else if($post['password'] == ''){
            echo json_encode(array('result' => 0, 'message' => 'Вы не ввели пароль!'));
        }else{
            $login = $this->db->row('SELECT * FROM users WHERE login = :login AND password = :password AND admin = 1', $post);
            if($login){
                $_SESSION['is_admin'] = true;
                echo json_encode(array('result' => 1, 'message' => 'Привет админ!'));
            }else{
                $_SESSION['is_admin'] = false;
                echo json_encode(array('result' => 0, 'message' => 'Неправильный логин или пароль!'));
            }
        }
    }

}