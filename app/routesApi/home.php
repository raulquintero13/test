<?php

$app->get('/api/customers', function ($request, $response, $args) { 
    // echo "inicio";
    return App\Controllers\CustomersController::handler($request, $response, $args); 

})->setName('customers');
