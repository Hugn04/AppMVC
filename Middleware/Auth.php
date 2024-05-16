<?php
    class Auth
    {
        public function __construct(){
            if(isset($_COOKIE["PHPSESSID"])){
                if(isset($_SESSION["user"])){
                    return;
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