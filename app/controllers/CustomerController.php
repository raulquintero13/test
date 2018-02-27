<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Core\DbConfig;
use App\Models\Customer;

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

          
        $customer = new Customer(DbConfig::$default);
        $customer = $customer->getCustomer($args['cid']);
        
        
         header('Content-Type: application/json');

        $response = json_encode(array('aaData'=> $customer));
    
        echo $response;die;
        
    }

    public static function getCustomers(Request $request,Response $response,$args){
        
        // self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

          
        $customer = new Customer(DbConfig::$default);
        $customers = $customer->getCustomers();
        
        
         header('Content-Type: application/json');

        $response = json_encode(array('aaData'=> $customers));
    
        echo $response;die;
        
    }
}