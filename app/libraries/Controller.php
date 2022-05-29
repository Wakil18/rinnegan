<?php

/*
*Base Controller
*This Loads the Models and Views
*/

class Controller{
    // Load Models
    public function model($model){
        // Require Model
        require_once '../app/models/' . $model . '.php';

        // Instantiate the model
        return new $model();
    }

    public function view($view, $data = []){
        // Check for the view file
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            die('The view file does not exist');
        }
    }
}