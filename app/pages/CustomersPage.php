<?php

namespace App\Pages;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Core\DbConfig;
use App\Models\PersonCustomer;
use App\Models\Usuario;
use App\Models\Menu;


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
        $menu = new Menu(DbConfig::$default);
        $customers = $customer->getAll();
        $menus = $menu->getMenu();
        

        
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