<?php

namespace App\Pages;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Core\DbConfig;
use App\Models\PersonCustomer;
use App\Models\Usuario;


class CustomersPage extends BasePageController
{
    private static $template = 'customers.twig';
    
    public static function handler($container,  Request $request,Response $response,$args){
        self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;
        
        $personCustomer = new PersonCustomer(DbConfig::$default);
        $customer = new Usuario($personCustomer);
        $customers = $customer->getAll();

        
        $titles = [
            "title" => "Clientes",  
            "names" => "Nombres",
            "lastname" => "Apellido Paterno", 
            "surname"=>"Apellido Materno",
            "genero"=>"Genero",
            "zipcode"=>"zipcode",
        ];
        
        return self::render(self::$template, [
            'customers' => $customers,
            'titles' => $titles,
            "customers_active" => "active"

        ]);

    }

}