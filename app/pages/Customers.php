<?php

namespace App\Pages;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
//use App\Core\DbConfig;
//use App\Models\Customer;

class Customers extends BasePageController
{
    private static $template = 'customers.twig';
    
    public static function handler($container,  Request $request,Response $response,$args){
        
        self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

          
        //$customer = new Customer(DbConfig::$default);
        //$customers = $customer->getCustomers();
        $titles = [
            "title" => "Clientes",  
            "names" => "Nombres",
            "lastname" => "Apellido Paterno", 
            "surname"=>"Apellido Materno",
        ];
        
        $customers = self::getDataFromApi("/customers");
                
        return self::render(self::$template, [
            'customers' => $customers,
            'titles' => $titles,
            "customers_active" => "active"

        ]);

       
    }

}