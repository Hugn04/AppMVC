<?php
    class TaleModel extends Model
    {
        
        public function getTitleAll(){
            $table = [];
            $result = mysqli_query($this->conn, "SELECT * FROM `title_tale`");
            while($row = mysqli_fetch_assoc($result)){
                array_push($table, $row);
            }
            return $table;
        }
        public function getTitleById($id){
            
            $sql = "select * FROM `title_tale` WHERE id = ".$id.";";
            $result = mysqli_query($this->conn, $sql);
            if($row = mysqli_fetch_assoc($result)){
                return $row;
            }
            
        }
        public function getImgById($id, $chapter){
            $table = [];
            $sql = "SELECT * FROM `tale` WHERE taleID = '".$id."' and chapter = '".$chapter."';";
            
            $result = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                array_push($table,$row);
            }
            return $table;
        }
        
        
    }
    

?>