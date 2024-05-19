<?php
    class TaleModel extends Model
    {
        
        public function getTruyenAll(){
            $table = [];
            $result = mysqli_query($this->conn, "SELECT * FROM Truyen;");
            while($row = mysqli_fetch_assoc($result)){
                array_push($table, $row);
            }
            return $table;
        }
        public function getChapterByid($id){
            $sql = "SELECT * FROM Chapter WHERE id_truyen = ".$id.";";
            $table = [];
            $result = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                array_push($table, $row);
            }
            return $table;
        }
        public function HandelChapterById($id, $action){
            $sql1 = "SELECT COUNT(*) AS so_chapter FROM Chapter WHERE id_truyen = ".$id.";";
            $result = mysqli_query($this->conn, $sql1);
            $numChapter = mysqli_fetch_assoc($result)["so_chapter"];
            if($action == "new"){
                $next = $numChapter  + 1;
                $sql ="INSERT INTO Chapter (id_truyen, so_chapter, ten_chapter) VALUES (".$id.", ".$next.", 'Chapter 1.".$next."');";
                mysqli_query($this->conn, $sql);
            }else{
                mysqli_query($this->conn, "DELETE FROM Chapter WHERE id_truyen = ".$id." AND so_chapter = ".$numChapter.";");
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
        public function newTale($ten_truyen, $url_img){
            $sql = "INSERT INTO `truyen`(`id`, `ten_truyen`, `anh_nen`) VALUES ('','".$ten_truyen."','".$url_img."')";
            
            mysqli_query($this->conn, $sql);
           
        }

        public function getImgUrl($id_truyen, $chapter){
            $table = [];
            $sql = "SELECT Anh.url_anh FROM Truyen JOIN Chapter ON Truyen.id = Chapter.id_truyen JOIN Anh ON Chapter.id = Anh.id_chapter WHERE Truyen.id = ".$id_truyen." AND Chapter.so_chapter = ".$chapter." ORDER BY Anh.so_thu_tu;";
            
            $result = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                array_push($table,$row);
            }
            return $table;
        }

        public function deleteImg($imgUrl, $id_truyen, $chapter){
            $sql = "DELETE FROM Anh WHERE url_anh = '".$imgUrl."';";
            mysqli_query($this->conn, $sql);
            $imgs = $this->getImgUrl($id_truyen,$chapter);
            $this->sortImg($imgs);

        }

        public function sortImg($imgs){
            foreach($imgs as $index=>$value){
                mysqli_query($this->conn, "UPDATE `anh` SET `so_thu_tu`=".($index + 1)." WHERE url_anh = '".$value["url_anh"]."'");
            }
        }


        
        
    }
    

?>