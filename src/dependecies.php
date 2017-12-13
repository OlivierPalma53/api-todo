<?php

$container = $app->getContainer();

$container['db'] = function($c){
    $settings = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'api-todo',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'collation' => 'utf8_general_ci',
        'prefix' => ''
    ];
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($settings);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
    return $capsule;
};