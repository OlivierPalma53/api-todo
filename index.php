<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require "vendor/autoload.php";

$settings = require "src/settings.php";

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

require "src/dependecies.php";
require "src/routes.php";

$app->run();