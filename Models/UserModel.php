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
            $result = mysqli_query($this->conn, "select * from user where user = '".$userName."'");
            if($row = mysqli_fetch_assoc($result)){
                if(password_verify($password, $row["password"])){
                    
                    $_SESSION["user"]=$userName;
                    return true;
                }
            }
            return false;

        }
        public function hasRole($role){
            $result = mysqli_query($this->conn, "select * from user where user = '".$_SESSION["user"]."'");
            if($row = mysqli_fetch_assoc($result)){
                if($row["role"]==$role){
                    return true;
                }
            }
            return false;
        }
        
    }
    

?>