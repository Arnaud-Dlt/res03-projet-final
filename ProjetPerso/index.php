<?php

require "autoload.php";

try {

    $router = new Router();

    if(isset($_GET['path']))
    {
        $request = "/".$_GET['path'];
    }
    else
    {
        $request = "/";
    }
    
    $router->checkRoute($request);
}

catch(Exception $e)
{
    if($e->getCode() === 404)
    {
        "./templates/404.phtml";
    }
}


?>