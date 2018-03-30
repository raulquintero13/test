<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Core\Libs\Database\DbConfig;
use Core\Models\PersonCustomer;
use Core\Models\Usuario;

class Index extends BasePageController
{
    private static $template = 'index.twig';
    
    public static function handler($container,  Request $request,Response $response,$args){
        
        self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

          
        // $customer = new Customer(DbConfig::$default);
        //  $customers = $customer->getCustomers();

        $personCustomer = new PersonCustomer(DbConfig::$default);
        $Customer = new PersonCustomer($personCustomer);
        $customers = $Customer->getAll();

        return self::render(self::$template, [
            'customers' => $customers,
            'home_active' => "active"

        ]);

        //        return $container->view->render($response, 'index.twig', [
        //            'name' => $args['name']
        //       ]);
    }

}