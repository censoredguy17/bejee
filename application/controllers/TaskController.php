<?php

namespace Application\controllers;

use application\core\Controller;

class TaskController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->TaskModel = $this->load->model('TaskModel');
    }

    public function task_template(){
        $this->load->view('templates/task/add');
    }

    public function add_task(){
        $post = $this->data['post'] = $_POST;
        $this->TaskModel->add_task($post);
    }

    public function update_task(){
        $post = $this->data['post'] = $_POST;
        $this->TaskModel->update_task($post);
    }

    public function edit_template(){
        $post = $this->data['post'] = $_POST;
        $this->data['task'] = $this->TaskModel->get_task($post['id']);
        $this->load->view('templates/task/edit', $this->data);
    }

}