<?php

$app->get('/', function ($request, $response, $args) { 
    // echo "inicio";
    return App\Pages\Index::handler($this, $request, $response, $args); 

})->setName('index');

$app->get('/customers', function ($request, $response, $args) { 
    // echo "inicio";
    return App\Pages\Customers::handler($this, $request, $response, $args); 

})->setName('customers');


$app->get('/customers/add', function ($request, $response, $args) { 
    // echo "inicio";
    return App\Pages\CustomerAddPage::handler($this, $request, $response, $args); 

})->setName('customerAdd');

$app->get('/customer/{id:[0-9]+}', function ($request, $response, $args) { //  ********************** como cachar este error????    
    // echo "inicio";
    return App\Pages\CustomerPage::handler($this, $request, $response, $args); 
    
})->setName('customer');