<?php
class Controller {

    public $model;
    public $view;

    function __construct()
    {

        $this->view = new View();
    }

    function action_index()
    {
    }

    public function add_model($model_name = false)
    {
        if ($model_name) {
            $model_file = strtolower($model_name).'.php';
            $model_path = "application/models/".$model_file;
            if(file_exists($model_path))
            {
                include "application/models/".$model_file;
            }
        }
    }
}