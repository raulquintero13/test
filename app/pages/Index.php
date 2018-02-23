<?php

namespace App\Pages;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Core\DbConfig;
use App\Models\Customer;

class Index extends BasePageController
{
    private static $template = 'index.twig';
    
    public static function handler($container,  Request $request,Response $response,$args){
        
        self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

          
        $customer = new Customer(DbConfig::$default);
         $customers = $customer->getCustomers();

        return self::render(self::$template, [
            'customers' => $customers,
            'home_active' => "active"

        ]);

        //        return $container->view->render($response, 'index.twig', [
        //            'name' => $args['name']
        //       ]);
    }

}