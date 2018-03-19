<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Core\DbConfig;
use App\Models\Customer;

class CustomersController
{
    // private static $template = 'customers.twig';
    protected static $request;
    protected static $response;
    protected static $args;
    
    public static function handler(Request $request,Response $response,$args){
        
        // self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;
          
        $personCustomer = new PersonCustomer(DbConfig::$default);
        $Customer = new Usuario($personCustomer);
        $customers = $Customer->getAll();
        
        header('Content-Type: application/json');
        $response = json_encode(array('aaData'=> $customers));
        $die;        
    }

}