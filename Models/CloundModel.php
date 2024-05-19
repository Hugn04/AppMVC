<?php
    include("config.php");
    require('./Api/Cloudinary/autoload.php');

    class Clound extends Model{
        private $public_id = 'unique_public_id';
        private $default_upload_options = array('tags' => 'chapter1');

        public function __construct(){
            parent::__construct();
            \Cloudinary::config(array(
                'cloud_name' => getenv("cloud_name"),
                'api_key' => getenv("api_key"),
                'api_secret' => getenv("api_secret")
            ));
        }
        public function upload($img){
            $result = \Cloudinary\Uploader::upload($img,array_merge(
                $this->default_upload_options,
            ));
            return $result;
        }
        public function uploadFile($files, $id_truyen, $chapter){
            $chaptersql = "(SELECT id FROM Chapter WHERE id_truyen = ".$id_truyen." AND so_chapter = ".$chapter.")";
            
            $values = "";
            $sql = "INSERT INTO Anh (id_chapter, url_anh, so_thu_tu)
                    VALUES ";
            $so_anh = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT COUNT(*) as count FROM Anh WHERE id_chapter = ".$chaptersql))["count"];
            foreach($files["tmp_name"] as $index=>$value){
                

                $result = $this->upload($value);
                $so_anh += 1;
                $values .="(
                            ".$chaptersql.", 
                            '".$result["url"]."', 
                            ".$so_anh."
                        ),";
            }
            $values = substr($values, 0, -1);
            $sql .= $values;
            mysqli_query($this->conn, $sql);
            return;
                
        }
        function delete($publicId) {
            try {
                $result = \Cloudinary\Uploader::destroy($publicId);
                if ($result['result'] == 'ok') {
                    echo "Xóa ảnh thành công";
                } else {
                    echo "Xóa ảnh không thành công";
                }
            } catch (Exception $e) {
                echo "Lỗi khi xóa ảnh: " . $e->getMessage();
            }
        }
    }

?>