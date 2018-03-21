<?php

namespace App\Pages;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Core\DbConfig;
use App\Models\PersonCustomer;
use App\Models\Usuario;

class CustomerPage extends BasePageController
{
    private static $template = 'customer.twig';
    
    public static function handler($container,  Request $request,Response $response,$args){
        
        self::$container = $container;
        self::$request = $request;
        self::$response = $response;
        self::$args = $args;

        //  var_dump(self::$request->getParsedBody()['id']);die; 
       
        $personCustomer = new PersonCustomer(DbConfig::$default);
        $customer = new Usuario($personCustomer);
        $customer->findBy(self::$args['id']);
        
        $titles = [
            "title" => "Cliente",  
            "names" => "Nombre",
            "lastname" => "Apellido Paterno", 
            "surname"=>"Apellido Materno",
        ];
        $breadcrumbs = [
            ['title' => 'home', 'link' => '/'],
            ['title' => 'cliente', 'link' => '']
        ];
        
        if ($customer->get('id'))
            $form_url = "/customer/".$customer->get('id')."/save";
         else {
            $form_url = "/customer/0/save";
         }
        //  $customer->set('nombre',"juanete");
        //  echo '<pre>';var_export($customer->get('name'));echo '</pre>';die;
         
        return self::render(self::$template, [
            'customer' => $customer->toArray(),
            'breadcrumbs' => $breadcrumbs,
            'mode' => "view",
            'titles' => $titles,
            'form_url' => $form_url,
            "method" => "POST",
            "customers_active" => "active"

        ]);

        //        return $container->view->render($response, 'index.twig', [
        //            'name' => $args['name']
        //       ]);
    }

}