<?php
$app->get('/{token}/api/customers', function ($request, $response, $args) { 
    // echo "inicio";die;
    return Api\Controllers\CustomerController::getCustomers($request, $response, $args); 
    
})->setName('/api/customers');

$app->get('/api/customer/{id:[0-9]+}', function ($request, $response, $args) { 
    //  echo "inicio";
    return Api\Controllers\CustomerController::getCustomer($request, $response, $args); 

})->setName('/api/customer');

$app->get('/api/menu', function ($request, $response, $args) { 
    //  echo "inicio";
    return Api\Controllers\MenuController::getMenu($request, $response, $args);

})->setName('/api/menu');

$app->get('/api/status', function ($request, $response, $args) { 
    // echo "inicio";
    return Api\Controllers\MenuController::getStatus($request, $response, $args);

})->setName('status');

$app->get('/api/info', function ($request, $response, $args) { 
    // echo "inicio";
    return Api\Controllers\MenuController::getInfo($request, $response, $args);

})->setName('status');

$app->get('/update', function ($request, $response, $args) { //  ********************** como cachar este error????    
    // var_dump($args);die;
    //  echo "inicio";die;
    return Api\Controllers\MenuController::update( $request, $response, $args); 
    
});