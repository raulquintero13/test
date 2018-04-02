<?php

return [
    'app' => [

        'url' =>'http://test.local',
        'hash' => [
            'algo' => PASSWORD_BCRYPT,
            'cost' => 10
            ]
        ],

    'db' => [
        'driver' =>'mysql',
        'host' => '127.0.0.1',
        'database' => 'pos',
        'name' => 'server',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => ''

    ],
    'auth' => [
        'session' => 'person_id',
        'remember' => 'person_r'
    ],
    'twig' => [
        'debug' => true
    ]


];