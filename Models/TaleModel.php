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

        public function getTruyenSerch($search){
            $table = [];
            $result = mysqli_query($this->conn, "SELECT * FROM Truyen WHERE ten_truyen LIKE '%".$search."%';");
            while($row = mysqli_fetch_assoc($result)){
                array_push($table, $row);
            }
            return $table;

        }
        public function getTruyenById($id){
            $result = mysqli_query($this->conn, "SELECT * FROM Truyen where id='".$id."';");
            $row = mysqli_fetch_assoc($result);
            return $row;
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

        public function getChapterId($id_truyen, $chapter){
            $sql = "(SELECT id FROM Chapter WHERE id_truyen = ".$id_truyen." AND so_chapter = ".$chapter.")";
            $idChapter = mysqli_fetch_assoc(mysqli_query($this->conn, $sql))["id"];
            
            return $idChapter;
        }

        public function deleteChapter($id_truyen, $chapter){
            $idChapter = $this->getChapterId($id_truyen, $chapter);
            mysqli_query($this->conn, "DELETE FROM `anh` WHERE id_chapter = '".$idChapter."'");
            mysqli_query($this->conn, "DELETE FROM Chapter WHERE id='".$idChapter."'");
            
        }
        public function newChapter($id){
            $numChapter = $this->getNumChapter($id);
            $next = $numChapter  + 1;
            $sql ="INSERT INTO Chapter (id_truyen, so_chapter, ten_chapter) VALUES (".$id.", ".$next.", 'Chapter 1.".$next."');";
            mysqli_query($this->conn, $sql);
        }
        public function deleteTale($id_truyen){
            $sql ="DELETE FROM `truyen` WHERE id = '".$id_truyen."'";
            mysqli_query($this->conn, $sql);
        }

        public function getNumChapter($id){
            $sql = "SELECT COUNT(*) AS so_chapter FROM Chapter WHERE id_truyen = ".$id.";";
            $numchapter = mysqli_fetch_assoc(mysqli_query($this->conn, $sql))["so_chapter"];
            return $numchapter;
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