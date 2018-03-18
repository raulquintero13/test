<?php

namespace App\Pages;


class BasePageController
{
    protected static $container;
    protected static $request;
    protected static $response;
    protected static $args;

    public static function render($template, $parameters)
    {
        return self::$container->view->render(self::$response,
            $template, $parameters);
    }

    public static function getDataFromApi($url){

        $url = 'http://localhost/api/'.$url; // path to your JSON file
        // $data = file_get_contents($url); // put the contents of the file into a variable
        // $data = json_decode($data);
        // var_dump($data);die;

        
        //  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$url);
        // Execute
        $result=curl_exec($ch);
        var_dump($data);die;
        // Closing
        curl_close($ch);

        // Will dump a beauty json :3
        $data = (json_decode($result, true));

        return $data;
    }
}