<?php

namespace application\models;

use application\core\Model;

class TaskModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function getTasksPages(){
        return $tasksTotal = $this->db->row('SELECT COUNT(*) as count FROM tasks; ')[0]['count'];
    }

    public function getTasks($data){
        $order = explode('_',$data['orderBy']);
        $sql = 'SELECT * FROM tasks ORDER BY '.$order[0].' '.$order[1].' LIMIT '.$data['limit'];
        if(isset($_GET['page']) and $_GET['page'] != 1){
            $sql .= ' OFFSET '.($_GET['page'] - 1) * $data['limit'];
        }
        return $this->db->row($sql);
    }


    public function add_task($post){
        if($post['name'] == ''){
            echo json_encode(array('result' => 0, 'message' => 'Пожалуйста введите имя!'));
        } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array('result' => 0, 'message' => 'Неправильный Email!'));
        }else if($post['text'] == ''){
            echo json_encode(array('result' => 0, 'message' => 'Пожалуйста заолните текст!'));
        }else {
            $result = $this->db->insert('tasks',$post);
            if($result == true){
                echo json_encode(array('result' => 1, 'message' => 'Задача добавлена!'));
            }else{
                echo json_encode(array('result' => 0, 'message' => 'Задача не добавлена! Что-то пошло не так!'));
            }
        }
    }

    public function update_task($post){
        if(!isset($_SESSION['is_admin']) or $_SESSION['is_admin'] == 0){
            echo json_encode(array('result' => 0, 'message' => 'Пожалуйста войдите под админом! Задача не обновлена!'));
            return false;
        }
        $post['status'] = (isset($post['status']) and $post['status'] == 'on') ? 1 : 0;
        $text_was = $this->db->column('SELECT text FROM tasks WHERE id = '.$post['id']);
        if($text_was != $post['text']){
            $post['changed'] = 1;
        }
        $result = $this->db->update_by_id('tasks', $post['id'], $post);
        if($result){
            echo json_encode(array('result' => 1, 'message' => 'Задача обновлена!'));
        }else{
            echo json_encode(array('result' => 0, 'message' => 'Задача не обновлена! Что-то пошло не так!'));
        }
    }

    public function get_task($id){
        return $this->db->row('SELECT * FROM tasks WHERE id = '.$id)[0];
    }


}