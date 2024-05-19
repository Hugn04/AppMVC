<?php
    
    //Example 
    // $method
    // route => [Controller, action, middleware]
    $get =[

        ""=>["SiteController", "index"],


        "admin"=>["AdminController", "index"],
        "admin/chapter"=>["AdminController", "chapter"],
        "admin/editchapter"=>["AdminController", "editchapter"],

        
    ];  
    $post =[



        "admin"=>["AdminController", "newTale"],
        "admin/delete"=>["AdminController", "deleteImg"],
        "admin/sortImg"=>["AdminController", "sortImg"],
        "admin/chapter"=>["AdminController", "newDelChapter"],
        "admin/editchapter"=>["AdminController", "uploadImg"],
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
        "body"=>$_POST,
        "files"=>$_FILES,
    ];


    $controllerObj = new $nameController;
    $controllerObj->$action($data);

?>