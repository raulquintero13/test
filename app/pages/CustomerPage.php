<?php

namespace App\Pages;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Core\DbConfig;
use App\Models\Customer;

class CustomerPage extends BasePageController
{
    private static $template = 'customer.twig';
    
    public static function handler($container,  Request $request,Response $response,$args){
        
        self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

        $customer = new Customer(DbConfig::$default);
        $customer = $customer->getCustomer(self::$args['id']);

        // var_dump($customer);die;

        $titles = [
            "title" => "Cliente",  
            "names" => "Nombre",
            "lastname" => "Apellido Paterno", 
            "surname"=>"Apellido Materno",
        ];
        $breadcrumbs = [
            ['title' => 'home', 'link' => '/'],
            [ 'title' => 'cliente', 'link' => '']
        ];
        
        return self::render(self::$template, [
            'customer' => $customer,
            'breadcrumbs' => $breadcrumbs,
            'mode' => "view",
            'titles' => $titles,
            "customers_active" => "active"

        ]);

        //        return $container->view->render($response, 'index.twig', [
        //            'name' => $args['name']
        //       ]);
    }

}