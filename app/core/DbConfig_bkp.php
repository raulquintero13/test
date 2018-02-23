<?php
namespace App\Core;

class DbConfig {

    public static $default = array(
    'host'			=> 'localhost',
    'user'			=> 'root',
    'password'		=> 'root',
    'database'		=> 'pos',

    );

    public static $production = array(
    'host' => 'localhost', 
    'user' => 'root', 
    'password' => 'root', 
    'database' => 'yourmagicdatabase'
);


}
