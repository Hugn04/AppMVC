<?php
    class SiteController extends Controller
    {   
        private $taleModel;
        public function __construct(){
            $this->loadModel("TaleModel");
            $this->taleModel = new TaleModel;
        }
        public function index(){
            $truyen = $this->taleModel->getTruyenAll();
            return $this->view("home", [
                "tales"=>$truyen,
            ]);
        }
        public function test($req){
            include("./Views/trangchu.css");
        }
        
    }

?>