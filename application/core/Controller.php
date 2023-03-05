<?php

namespace application\core;

use application\core\Load;

abstract class Controller{

    public $data;
    public $load;

    public function __construct()
    {
        $this->load = new Load();
    }
}