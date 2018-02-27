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

        $url = 'http://test.dev/api'.$url; // path to your JSON file
        $data = file_get_contents($url); // put the contents of the file into a variable
        $data = json_decode($data);

        return $data;
    }
}