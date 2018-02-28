<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Core\DbConfig;
use App\Models\Menu;

class MenuController
{
    // private static $template = 'customers.twig';
    protected static $request;
    protected static $response;
    protected static $args;
    


    public static function getMenu(Request $request, Response $response, $args)
    {
        
        // self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

        $menu = new Menu(DbConfig::$default);
        $menu = $menu->getMenu();


        header('Content-Type: application/json');

        $response = json_encode($menu);

        echo $response;
        die;

    }

    public static function getStatus(Request $request, Response $response, $args)
    {
        
        // self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

        $menu = new Menu(DbConfig::$default);
        $status = TRUE;


        header('Content-Type: application/json');

        $response = json_encode($status);

        echo $response;
        die;

    }

    
}