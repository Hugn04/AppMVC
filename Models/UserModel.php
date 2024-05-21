<?php
    class UserModel extends Model
    {
        
        public function getAll(){
            $table = [];
            $result = mysqli_query($this->conn, "select * from user");
            while($row = mysqli_fetch_assoc($result)){
                array_push($table, $row);
            }
            return $table;
        }
        public function verify($userName, $password){
            $result = mysqli_query($this->conn, "select * from users where user = '".$userName."'");
            if($row = mysqli_fetch_assoc($result)){
                if(password_verify($password, $row["password"])){
                    
                    $_SESSION["user"]=$userName;
                    return true;
                }
            }
            return false;

        }
        public function hasRole($role){
            $result = mysqli_query($this->conn, "select * from users where user = '".$_SESSION["user"]."'");
            if($row = mysqli_fetch_assoc($result)){
                if($row["role"]==$role){
                    return true;
                }
            }
            return false;
        }

        public function isNullUser($user){
            $sql = "select * from users where user = '".$user."'";
            $result = mysqli_query($this->conn, $sql);
            if($row = mysqli_fetch_assoc($result)){
                return false;
            }
            return true;
        }
        public function newAccount($name, $user, $password){
            $img = "https://i.pinimg.com/736x/13/cf/c4/13cfc47308e92f7a89be1a034650fa50.jpg";
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users`(`user`, `password`, `role`, `img`, `name`) VALUES ('".$user."','".$password."','person','".$img."','".$name."')";
            mysqli_query($this->conn, $sql);
            
        }
        
    }
    

?>