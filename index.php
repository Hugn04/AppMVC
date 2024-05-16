<?php
    // $controllerPath = ucfirst(strtolower($_REQUEST["controller"]). "Controller");
    // require "./Controllers/${controllerPath}.php";
    session_start();
    require("./Controllers/Controller.php");
    require("./Models/Model.php");
    require("./config.php");
    $method = $_SERVER['REQUEST_METHOD'];
    $method = strtolower($method);
    $uri = $_SERVER['REQUEST_URI'];
    $uri = str_replace('/AppMVC/', '', $uri);
    if(strpos($uri, "?")){
        $uri = substr($uri, 0, strpos($uri, "?"));
    }
    require("./Route/router.php");
?>