<?php

/**
 * Base Controller
 * Loads the models and views
 */
class Controller
{
    //Load Model
    public function model($model = null)
    {
        // Require model file
        require_once '../app/models' . $model . '.php';

        // Instantiate model
        return new $model();
    }

    // Load View
    public function view($view = null, $data = [])
    {
        // Path to views directory
        $viewPath = '../app/views/';

        // Check for view file
        if (file_exists("{$viewPath}$view.php")) {
            require_once "{$viewPath}$view.php";
        } else {
            // View does not exist
            die('View does not exist');
        }
    }
}
