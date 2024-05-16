<?php
    class Model
    {   
        private $host = "127.0.0.1";
        private $user = "root";
        private $pasword = "";
        private $dbname = "hugn";
        protected $conn = null;
        public function __construct(){
            
            $this->conn = mysqli_connect($this->host, $this->user, $this->pasword, $this->dbname);
            if(!$this->conn){
                die("Không thể kết nối tới MySql");
            }
        }

    }


?>