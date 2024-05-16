<?php
    
    class Controller
    {
        const FOLDER_VIEW = "./Views";
        const FOLDER_MODEL = "./Models";
        protected function view($path, array $data=[]){
            $path = self::FOLDER_VIEW."/".str_replace(".", "/", $path).".php";
            foreach($data as $item=>$value){
                $$item = $value;
            }
            require($path);
        }
        protected function redirect($path){
            require("./config.php");
            echo $domainApp . $path;
            header("location: ".$domainApp . $path);
        }
        protected function loadModel($modelName){
            require(self::FOLDER_MODEL."/".$modelName.".php");
        }
    }


?>