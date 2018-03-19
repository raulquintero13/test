<?php

$app->get('/', function ($request, $response, $args) { 
    // echo "inicio";
    return App\Pages\Index::handler($this, $request, $response, $args); 

})->setName('index');

$app->get('/gitpull', function ($request, $response, $args) { 
    // echo "inicio";
    echo "git<br>\n";
    $salida = shell_exec('/home/karina/projects/test/git pull');
    echo "<pre>$salida</pre>";
    die;
    // return App\Pages\Index::handler($this, $request, $response, $args);

})->setName('index');

$app->get('/customers', function ($request, $response, $args) { 
    // echo "inicio";
    return App\Pages\CustomersPage::handler($this, $request, $response, $args); 

})->setName('customers');


$app->get('/customers/add', function ($request, $response, $args) { 
    // echo "inicio";
    return App\Pages\CustomerAddPage::handler($this, $request, $response, $args); 

})->setName('customerAdd');

$app->get('/customer/{id:[0-9]+}', function ($request, $response, $args) { //  ********************** como cachar este error????    
    // echo "inicio";
    return App\Pages\CustomerPage::handler($this, $request, $response, $args); 
    
})->setName('customer');

$app->post('/customer/save', function ($request, $response, $args) { //  ********************** como cachar este error????    
    // var_dump($args);die;
    //  echo "inicio";die;
    return $response->withRedirect('/api/customer/save/'.$request->getParsedBody()['id']);
    return App\Pages\CustomerPage::handler($this, $request, $response, $args); 
    
});

