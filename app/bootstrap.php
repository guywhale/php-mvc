<?php

    // Load DotEnv Class first to populate config.php
    require_once 'libraries/DotEnv.php';


    // Load Config
    require_once 'config/config.php';

    // Autoload Core Libraries
    spl_autoload_register(function ($className) {
        require_once 'libraries/' . $className . '.php';
    });
