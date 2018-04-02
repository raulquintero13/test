<?php
// require_once __DIR__."/../config/config.php";

ini_set('display_errors',1);
require_once ROOT_DIR . "/vendor/autoload.php";


// Get container
//$container = $app->getContainer();

$container = new \Slim\Container;

// // Register provider
// $container['config'] = function ($container) {
//   //Create the configuration
//     return new \DavidePastore\Slim\Config\Config(ROOT_DIR . '/core/config/config.php');
// };

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(ROOT_DIR.'/templates', [
        'cache' => FALSE,
        'debug' => FALSE
        ]);
   
    $view->addExtension(new Twig_Extension_Debug());
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    // $view->addFilter(new \Twig_SimpleFilter('ucfirst', 'ucfirst'));
    return $view;
};

//Override the default Not Found Handler
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['view']->render($response->withStatus(404), '404.twig', [
            "myMagic" => "Let's roll"
        ]);
    };
};


$app = new Slim\App($container);


require ROOT_DIR."/core/routes.php";



// $app->get('/', function ($request, $response, $args) { 
//     echo "hola";
//     // return \Pages\Index::handler($this, $request, $response, $args); 

// })->setName('index');


 