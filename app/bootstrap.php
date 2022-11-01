<?php

    // Load DotEnv Class first to populate config.php
    require_once 'libraries/DotEnv.php';


    // Load Config
    require_once 'config/config.php';

    // Load Helpers
    require_once 'helpers/urlHelper.php';
    require_once 'helpers/sessionHelper.php';

    // Autoload Core Libraries
    spl_autoload_register(function ($className) {
        require_once 'libraries/' . $className . '.php';
    });
