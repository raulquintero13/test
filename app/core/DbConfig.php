<?php
namespace App\Core;

class DbConfig {

    public static $default = array(
    'host'			=> 'localhost',
    'user'			=> 'root',
    'password'		=> '1234',
    'database'		=> 'pos',

    );

    public static $production = array(
    'host' => 'localhost', 
    'user' => 'root', 
    'password' => 'root', 
    'database' => 'yourmagicdatabase'
);


}
