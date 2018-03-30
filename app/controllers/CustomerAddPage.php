<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Core\DbConfig;
use Core\Models\Customer;

class CustomerAddPage extends BasePageController
{
    private static $template = 'customer.twig';
    
    public static function handler($container,  Request $request,Response $response,$args){
        
        self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

        
        // var_dump($customer);die;

        $titles = [
            "title" => "Cliente",  
            "names" => "Nombre",
            "lastname" => "Apellido Paterno", 
            "surname"=>"Apellido Materno",
        ];
        $breadcrumbs = [
            ['title' => 'home', 'link' => '/'],
            [ 'title' => 'clientes', 'link' => '/customers'],
            ['title' => 'agregar', 'link' => NULL]
        ];
        
        return self::render(self::$template, [
            'breadcrumbs' => $breadcrumbs,
            'mode' => "add",
            'titles' => $titles,
            "customers_active" => "active"

        ]);

        //        return $container->view->render($response, 'index.twig', [
        //            'name' => $args['name']
        //       ]);
    }

}