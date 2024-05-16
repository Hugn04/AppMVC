<?php
    class SiteController extends Controller
    {   
        private $taleModel;
        public function __construct(){
            $this->loadModel("TaleModel");
            $this->taleModel = new TaleModel;
        }
        public function index(){
            $list_tale = $this->taleModel->getTitleAll();
            return $this->view("index", [
                "list_tale"=>$list_tale,
            ]);
        }
        public function read($req){
            $id = $req["params"]["id"];
            $chapter = $req["params"]["chapter"];
            $tale = $this->taleModel->getTitleById($id);
            $tale_imgs = $this->taleModel->getImgById($id,$chapter);
            return $this->view("Read.read", [
                "tale"=>$tale,
                "id"=>$id,
                "tale_imgs"=>$tale_imgs,
                "chapter"=>$chapter,    
            ]);
        }
        
    }

?>