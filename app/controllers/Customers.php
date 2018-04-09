<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Core\Libs\Database\DbConfig;
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
            "id" => "id",
            "curp"=>"curp",
            "names" => "Nombres",
            "lastname" => "Apellido P", 
            "surname"=>"Apellido M",
        ];
        
        return self::render(self::$template, [
            'menus' =>$menus,
            'customers' => $customers,
            'titles' => $titles,
            "customers_active" => "active"

        ]);

    }

}