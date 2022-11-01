<?php

use DevCoder\DotEnv;

// Set up DotEnv class so .env file can be read.
(new DotEnv(__DIR__ . '/../../.env'))->load();

// DB Params
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: null);
define('DB_PASS', getenv('DB_PASS') ?: null);
define('DB_NAME', getenv('DB_NAME') ?: null);

// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root
define('URLROOT', getenv('URLROOT') ?: null);
// Site Name
define('SITENAME', getenv('SITENAME') ?: null);
// Path to views directory
define('VIEWSPATH', '../app/views/');
// Path to models directory
define('MODELSPATH', '../app/models/');
// App version
define('APPVERSION', '1.0.0');
