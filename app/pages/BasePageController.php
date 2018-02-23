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
}