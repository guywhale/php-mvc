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
                // Unset 0 Index
                unset($url[0]);
            }
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate the controller
        $this->currentController = new $this->currentController;
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

