<?php

$app->get('/api/customers', function ($request, $response, $args) { 
    // echo "inicio";
    return App\Controllers\CustomerController::getCustomers($request, $response, $args); 

})->setName('/api/customers');

$app->get('/api/customer/{cid:[0-9]+}', function ($request, $response, $args) { 
    //  echo "inicio";
    return App\Controllers\CustomerController::getCustomer($request, $response, $args); 

})->setName('/api/customer');

$app->get('/api/menu', function ($request, $response, $args) { 
    //  echo "inicio";
    return App\Controllers\MenuController::getMenu($request, $response, $args);

})->setName('/api/customer');