<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Core\DbConfig;
use App\Models\PersonCustomer;
use App\Models\Usuario;

class CustomerController
{
    // private static $template = 'customers.twig';
    protected static $request;
    protected static $response;
    protected static $args;
    
    public static function getCustomer(Request $request,Response $response,$args){
        
        // self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

        $personCustomer = new PersonCustomer(DbConfig::$default);
        $customer = new Usuario($personCustomer);
        $customer->findBy(self::$args['id']);
        
        header('Content-Type: application/json');
        $response = json_encode($customer->toArray());
        echo $response;
        die;
        
    }

    public static function getCustomers(Request $request,Response $response,$args){
        
        // self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

        $personCustomer = new PersonCustomer(DbConfig::$default);
        $Customer = new Usuario($personCustomer);
        $customers = $Customer->getAll();
        
        header('Content-Type: application/json');
        $response = json_encode($customers);
        echo $response;
        die;
        
    }
    public static function getMenu(Request $request, Response $response, $args)
    {
        
        // self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;
        
        $menu = new Customer(DbConfig::$default);
        $menu = $menu->getMenu(1);

        header('Content-Type: application/json');
        $response = json_encode($menu);
        echo $response;
        die;

    }
}