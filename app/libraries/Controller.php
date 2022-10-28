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
        // Check for model file
        if (!file_exists(MODELSPATH . $model . '.php')) {
            // Model does not exist
            die('Model does not exist');
        }

        require_once MODELSPATH . $model . '.php';

        // Instantiate model
        return new $model();
    }

    // Load View
    public function view($view = null, $data = [])
    {
        // Check for view file
        if (!file_exists(VIEWSPATH . $view . '.php')) {
            // View does not exist
            die('View does not exist');
        }

        require_once VIEWSPATH . $view . '.php';
    }
}
