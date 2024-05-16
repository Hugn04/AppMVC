<?php
    include("./Models/UserModel.php");
    class Level extends UserModel
    {
        public function __construct($role){
            parent::__construct();
            if(isset($_COOKIE["PHPSESSID"])){
                if(isset($_SESSION["user"])){
                    if($this->hasRole($role)){
                        return;
                    }else{
                        $this->redirect("/");
                        return;
                    }
                    
                }
            }
            $this->redirect("/login");
        }

        
        protected function redirect($path){
            require("./config.php");
            echo $domainApp . $path;
            header("location: ".$domainApp . $path);
        }
    }
?>