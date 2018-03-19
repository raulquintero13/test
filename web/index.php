<?php

define ('ROOT_DIR',dirname(__DIR__));

require_once ROOT_DIR."/vendor/autoload.php";
require ROOT_DIR."/core/start.php";


$app->run();