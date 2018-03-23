<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Core\DbConfig;
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


    public static function getInfo(Request $request, Response $response, $args)
    {
        
        // self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

        $menu = new Menu(DbConfig::$default);
        $info = "";


        $indicesServer = array(
            'PHP_SELF',
            'argv',
            'argc',
            'GATEWAY_INTERFACE',
            'SERVER_ADDR',
            'SERVER_NAME',
            'SERVER_SOFTWARE',
            'SERVER_PROTOCOL',
            'REQUEST_METHOD',
            'REQUEST_TIME',
            'REQUEST_TIME_FLOAT',
            'QUERY_STRING',
            'DOCUMENT_ROOT',
            'HTTP_ACCEPT',
            'HTTP_ACCEPT_CHARSET',
            'HTTP_ACCEPT_ENCODING',
            'HTTP_ACCEPT_LANGUAGE',
            'HTTP_CONNECTION',
            'HTTP_HOST',
            'HTTP_REFERER',
            'HTTP_USER_AGENT',
            'HTTPS',
            'REMOTE_ADDR',
            'REMOTE_HOST',
            'REMOTE_PORT',
            'REMOTE_USER',
            'REDIRECT_REMOTE_USER',
            'SCRIPT_FILENAME',
            'SERVER_ADMIN',
            'SERVER_PORT',
            'SERVER_SIGNATURE',
            'PATH_TRANSLATED',
            'SCRIPT_NAME',
            'REQUEST_URI',
            'PHP_AUTH_DIGEST',
            'PHP_AUTH_USER',
            'PHP_AUTH_PW',
            'AUTH_TYPE',
            'PATH_INFO',
            'ORIG_PATH_INFO'
        );

        // foreach ($indicesServer as $arg) {
        //     if (isset($_SERVER[$arg])) {
        //         $info [ $arg ] = $_SERVER[$arg] ;
        //     }
        // }

        echo phpinfo();die;
        return $response->withJSON(
            $info,
            200,
            JSON_UNESCAPED_UNICODE
        );
    }
   public static function update(Request $request, Response $response, $args)
    {
        
        // self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

        // define('PRIVATE_KEY', 'XXXXXXXXXXXXXXXXxxx');

        // if ($_SERVER['REQUEST_METHOD'] === 'POST'
        //         && $_REQUEST['thing'] === PRIVATE_KEY)
        {
        echo "hola";

            echo shell_exec(__DIR__."git pull");
        }
        die;
    }
 
}