<?php
    class AdminController extends Controller
    {
        private $taleModel;
        public function __construct(){
            $this->loadModel("TaleModel");
            $this->taleModel = new TaleModel;
        }
        public function chapter($req){
            $id = $req["params"]["id_truyen"];
            $chapters = $this->taleModel->getChapterByid($id);

            return $this->view("admin.chapter",[
                "chapters"=>$chapters,
                "id"=>$id,
            ]);
        }
        public function newDelChapter($req){
            $action = $req["body"]["action"];
            $id = $req["params"]["id_truyen"];
            $this->taleModel->HandelChapterById($id, $action);
        }
        public function index(){
            $tales = $this->taleModel->getTruyenAll();
            return $this->view("admin.index",[
                "tales"=>$tales,
            ]);
        }
        public function newTale($req){
            $ten_truyen = $req["body"]["ten_truyen"];
            $url_img = "https://th.bing.com/th?id=OIP.G85MhuE2u1HGbMl1kiY18QHaHa&w=250&h=250&c=8&rs=1&qlt=90&o=6&dpr=1.4&pid=3.1&rm=2";
            $this->taleModel->newTale($ten_truyen, $url_img);
            return $this->redirect("/admin");
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
            $this->loadModel("CloundModel");
            $Clound = new Clound();
            $Clound->uploadFile($files, $id_truyen, $chapter);
            $this->redirect("/admin/editchapter?id_truyen=".$id_truyen."&chapter=".$chapter);
        }

        public function deleteImg($req){
            $id = $req["body"]["id"];
            $imgUrl = $req["body"]["imgURL"];
            $id_truyen = $req["body"]["id_truyen"];
            $chapter = $req["body"]["chapter"];
            $this->loadModel("CloundModel");
            $Clound = new Clound();
            $Clound->delete($id);
            $this->taleModel->deleteImg($imgUrl, $id_truyen, $chapter);

        }

        public function sortImg($req){
            $anhs = $req["body"]["url_anh"];
            $this->taleModel->sortImg($anhs);

        }
    }

?>