<?php
    class SiteController extends Controller
    {   
        private $taleModel;
        public function __construct(){
            $this->loadModel("TaleModel");
            $this->taleModel = new TaleModel;
        }
        public function index($req){
            if(isset($req["params"]["name"])){
                $truyen = $this->taleModel->getTruyenSerch($req["params"]["name"]);
                return $this->view("home", [
                    "tales"=>$truyen,
                ]);
            }else{
                $truyen = $this->taleModel->getTruyenAll();
                return $this->view("home", [
                    "tales"=>$truyen,
                ]);
            }
            
        }
        public function read($req){
            $id_truyen = $req["params"]["id_truyen"];
            $chapter = $req["params"]["chapter"];
            $numchapter = $this->taleModel->getNumChapter($id_truyen);
            $tale = $this->taleModel->getTruyenById($id_truyen);
            $imgs = $this->taleModel->getImgUrl($id_truyen, $chapter);
            return $this->view("Read.index",[
                "numchapter"=>$numchapter,
                "id_truyen"=>$id_truyen,
                "tale"=>$tale,
                "imgs"=>$imgs,
                "chapter"=>$chapter,


            ]);
        }
        
    }

?>