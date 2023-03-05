<?php

namespace Application\controllers;

use Application\core\Controller;


class MainController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->TaskModel = $this->load->model('TaskModel');
        $this->MainModel = $this->load->model('MainModel');
        if(!isset($_SESSION['is_admin'])) $_SESSION['is_admin'] = 0;
    }

    public function index(){
        $this->data['limit'] = 3;
        $this->data['orderBy'] = (isset($_GET['orderBy']) and $_GET['orderBy'] != '') ? $_GET['orderBy'] : 'id_asc';
        $this->data['pages'] = ceil($this->TaskModel->getTasksPages()/$this->data['limit']);
        $this->data['tasks'] = $this->TaskModel->getTasks($this->data);
        $this->load->view('inc/header', $this->data);
        $this->load->view('main/index', $this->data);
        $this->load->view('inc/footer', $this->data);
    }

    public function login_template(){
        $this->load->view('templates/login');
    }

    public function message(){
        $this->load->view('templates/message', $_POST);
    }

    public function login(){
        $post = $this->data['post'] = $_POST;
        $this->MainModel->login($post);
    }

    public function logout(){
        unset($_SESSION['is_admin']);
        echo json_encode(array('result' => 1, 'message' => 'Вы разлогинились!'));
    }



}