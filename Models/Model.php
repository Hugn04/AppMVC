<?php
    class Model
    {   
        private $host = null;
        private $user = null;
        private $pasword = null;
        private $dbname = null;
        protected $conn = null;
        public static $connnect;
        public function __construct(){
            $this->host = getenv("DB_HOST");
            $this->user = getenv("DB_USERNAME");
            $this->pasword =  getenv('DB_PASSWORD');
            $this->dbname =  getenv('DB_NAME');
            $this->conn = mysqli_connect($this->host, $this->user, $this->pasword, $this->dbname);
            self::$connnect=$this->conn;
            if(!$this->conn){
                die("Không thể kết nối tới MySql");
            }
        }

    }


?>