<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Core\DbConfig;
use Core\Libs\Traits\Openssl;
use Core\Models\PersonCustomer;
use Core\Models\Usuario;
use Core\Models\Menu;

class Customer extends BasePageController
{
    use Openssl;

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

        // testing encrypt funcions
        $name = $customer->get("name");
        $lastname = $customer->get("lastname");
        $encryptedName = Openssl::encode($lastname);
        $customer->set("name",$encryptedName);
        // end testing
        
        $menu = new Menu(DbConfig::$default);
        $menus = $menu->getMenu();
        
        $unencryptedLastname = Openssl::decode($encryptedName);
        // echo '<!--';print_r($unencryptedLastname);echo '-->';die;
        
        $customer->set("lastname",$unencryptedLastname."hey");
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
        
        return self::render(self::$template, [
            'fullName' => $customer->getFullName(),
            'customer' => $customer->toArray(),
            'menus' => $menus,
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