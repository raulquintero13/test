<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Core\DbConfig;
use Core\Models\PersonCustomer;
use Core\Models\Usuario;
use Core\Models\Menu;


class Customers extends BasePageController
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
        $menu = new Menu(DbConfig::$default);
        $menus = $menu->getMenu();
        
        // var_dump(($customers));die;
        
        $titles = [
            "title" => "Clientes",  
            "names" => "Nombres",
            "lastname" => "Apellido Paterno", 
            "surname"=>"Apellido Materno",
            "genre"=>"Genero",
            "zipcode"=>"zipcode",
        ];
        
        return self::render(self::$template, [
            'menus' =>$menus,
            'customers' => $customers,
            'titles' => $titles,
            "customers_active" => "active"

        ]);

    }

}