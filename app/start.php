<?php
// require_once __DIR__."/../config/config.php";

ini_set('display_errors',1);

// Create app
$app = new Slim\App();



// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(ROOT_DIR.'/templates', [
        'cache' => FALSE,
        'debug' => TRUE
    ]);
   
    $view->addExtension(new Twig_Extension_Debug());
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

require ROOT_DIR."/app/routes.php";

// $app->get('/', function ($request, $response, $args) { 
//     echo "hola";
//     // return \Pages\Index::handler($this, $request, $response, $args); 

// })->setName('index');


 