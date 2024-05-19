<?php
    class User extends Model
    {

        
        public static function get($type){
            $sql = "SELECT * FROM `users` WHERE user = '".$_SESSION["user"]."'";
            $result = mysqli_query(self::$connnect, $sql);
            return mysqli_fetch_assoc($result)[$type];
        }
    }
?>