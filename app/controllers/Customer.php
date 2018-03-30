<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Core\Libs\Database\DbConfig;
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
        $encryptedName = Openssl::encode($name);
        $customer->set("name",$encryptedName);
        $unencryptedName = Openssl::decode($encryptedName);
        $customer->set("lastname",$unencryptedName);
        // end testing
        
        $menu = new Menu(DbConfig::$default);
        $menus = $menu->getMenu();
        
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