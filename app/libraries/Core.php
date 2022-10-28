<?php

/**
 * App Core Class
 * Creates URL and loads core controller
 * URL FORMAT - /controller/method/params
 */
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        // Get current URL
        $url = $this->getUrl();

        // Only load a controller file if URL exists, otherwise defaults to Page controller.
        if (isset($url)) {
            // Look in controllers for first value from the URL
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // If exists, set as controller
                $this->currentController = ucwords($url[0]);
                // Unset 0 Index - remove value from array once used
                unset($url[0]);
            }
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate the controller
        $this->currentController = new $this->currentController;

        // Check for second part of URL
        if (isset($url[1])) {
            // Check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // Unset 1 Index - remove value from array once used
                unset($url[1]);
            }
        }

        // Get params - as $url[0] & $url[1] have been removed, remaining values
        // in array can all be considered parameters.
        // Create new and properly indexed array from these leftovers and assign
        // to $this->params.
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params.
        // In this case the callback is CurrentController->currentMethod().
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            // Remove '/' from end of URL string
            $url = rtrim($_GET['url'], '/');
            // Remove all characters except letters, digits and $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=.
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Creates an array of values separated by '/';
            $url = explode('/', $url);
            return $url;
        }
    }
}
