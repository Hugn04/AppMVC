<?php
    class UserController extends Controller
    {
        private $userModel;
        public function __construct(){
            $this->loadModel("UserModel");
            $this->userModel = new UserModel;
        }
       
        public function loginView(){
            return $this->view("login");
        }
        public function logout(){
            unset($_COOKIE['PHPSESSID']);
            setcookie("PHPSESSID", '', time() - 3600);
            session_destroy();
            return $this->redirect("/");
        }
        public function login($req){
            $user = $req["body"]["user"];
            $password = $req["body"]["password"];
            if($user == "" or $password == ""){
                return $this->view("login", [
                    "err"=>"Không được để trông tên tài khoản hoặc mật khẩu !"
                ]);
            }
            if($this->userModel->verify($user, $password)){
                return $this->redirect("/");
            }else{
                return $this->view("login", [
                    "err"=>"Tài khoản hoặc mật khẩu không chính xác"
                ]);
            }

            
        }
    }

?>