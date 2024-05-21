<?php
    class AdminController extends Controller
    {
        private $taleModel;
        private $Clound;
        public function __construct(){
            $this->loadModel("TaleModel");
            $this->taleModel = new TaleModel;
            $this->loadModel("CloundModel");
            $this->Clound =new Clound();
        }
        public function chapter($req){
            $id = $req["params"]["id_truyen"];
            $chapters = $this->taleModel->getChapterByid($id);
            return $this->view("admin.chapter",[
                "chapters"=>$chapters,
                "id"=>$id,
            ]);
        }
        public function newChapter($req){
            $id = $req["params"]["id_truyen"];
            $this->taleModel->newChapter($id);
        }

        public function deleteChapter($req){
            $id_truyen = $req["params"]["id_truyen"];
            $chapter = $this->taleModel->getNumChapter($id_truyen);
            $this->deleteImgByChapterId($id_truyen, $chapter);
            $this->taleModel->deleteChapter($id_truyen, $chapter);
            echo json_encode(array('status' => 'success'));
            return;
        }
        private function deleteImgByChapterId($id_truyen, $chapter){
            $url_imgs = $this->taleModel->getImgUrl($id_truyen, $chapter);
            $this->Clound->deleteListImg($url_imgs);
            return;
        }
        public function index($req){
            if(isset($req["params"]["name"])){
                $tales = $this->taleModel->getTruyenSerch($req["params"]["name"]);
                return $this->view("admin.index", [
                    "tales"=>$tales,
                ]);
            }else{
                $tales = $this->taleModel->getTruyenAll();
                return $this->view("admin.index",[
                    "tales"=>$tales,
                ]);
            }
            
        }
        public function newTale($req){
            $ten_truyen = $req["body"]["ten_truyen"];
            $url_img = "";
            $file = $req["files"]["file"];
            if($file["error"] == 0){
                $result = $this->Clound->upload($file["tmp_name"]);
                $url_img = $result["url"];
            }
            $this->taleModel->newTale($ten_truyen, $url_img);
            return $this->redirect("/admin");
        }
        public function deleteTale($req){
            $id_truyen =  $req["params"]["id_truyen"];
            $numchapter = $this->taleModel->getNumChapter($id_truyen);
            for($chapter=1;$chapter<=$numchapter;$chapter++){
                $this->deleteChapter($req);
            }
            $anh_nen = $this->taleModel->getTruyenById($id_truyen)["anh_nen"];
            $this->Clound->delete($this->Clound->getIdImgByUrl($anh_nen));

            $this->taleModel->deleteTale($id_truyen);

            echo json_encode(array('status' => 'success'));

        }

        public function editchapter($req){
            $id_truyen = $req["params"]["id_truyen"];
            $chapter = $req["params"]["chapter"];
            $anhs = $this->taleModel->getImgUrl($id_truyen, $chapter);
            return $this->view("admin.editchapter",[
                "anhs"=>$anhs,
                "id_truyen"=>$id_truyen,
                "chapter"=>$chapter,
            ]);
        }

        public function uploadImg($req){
            $id_truyen = $req["params"]["id_truyen"];
            $chapter = $req["params"]["chapter"];
            $files = $req["files"]["files"];
            $this->Clound->uploadFile($files, $id_truyen, $chapter);
            $this->redirect("/admin/editchapter?id_truyen=".$id_truyen."&chapter=".$chapter);
        }

        public function deleteImg($req){
            $id = $req["body"]["id"];
            $imgUrl = $req["body"]["imgURL"];
            $id_truyen = $req["body"]["id_truyen"];
            $chapter = $req["body"]["chapter"];
            $this->Clound->delete($id);
            $this->taleModel->deleteImg($imgUrl, $id_truyen, $chapter);

        }

        public function sortImg($req){
            $anhs = $req["body"]["url_anh"];
            $this->taleModel->sortImg($anhs);

        }
    }

?>