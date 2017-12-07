<?php

$container = $app->getContainer();

$container['db'] = function($c){
    $settings = [
        'driver' => 'mysql',
        //'host' => 'mysql762.umbler.com',
        'host' => '127.0.0.1',
        'database' => 'api-todo',
        //'username' => 'olivier',
        'username' => 'root',
        //'password' => '4R3jo--K{Tr',
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