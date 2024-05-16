<?php
    
    //Example 
    // $method
    // route => [Controller, action, middleware]
    $get =[
        "admin/editchapter"=>["AdminController", "index", "Level:admin"],
        "admin/chapter"=>["AdminController", "index", "Level:admin"],
        "admin"=>["AdminController", "index", "Level:admin"],

        "Read"=>["SiteController", "read"],
        ""=>["SiteController", "index"],
        "user"=>["UserController", "index", "Auth"],
        "user/show"=>["UserController", "show"],
        "login"=>["UserController", "loginView"],
        "logout"=>["UserController", "logout"],
    ];  
    $post =[
        
        "login"=>["UserController", "login"],
    ];




    try {
        if(array_key_exists($uri, $$method)){
            $controller = $$method[$uri];
        }else{
            throw new Exception("Lỗi");
        }
        
    } catch (Exception $e) {
        die("Not router {".$uri."} 404 not found");
    }
        
    $nameController = $controller[0];
    $action = $controller[1];
    if(array_key_exists(2, $controller)){
        $middleName = $controller[2];
        $param = "";
        if(strpos($controller[2], ":")){
            $middleName = substr($middleName, 0, strpos($middleName, ":"));
            $param = str_replace($middleName.":", '', $controller[2]);
        }
        require("./Middleware/".$middleName.".php");
        $middleware = new $middleName($param);
    }
    require("./Controllers/".$nameController.".php");
    $data=[
        "params"=>$_GET,
        "body"=>$_POST
    ];


    $controllerObj = new $nameController;
    $controllerObj->$action($data);

?>