<?php
    class UserController extends Controller
    {
        private $userModel;
        public function __construct(){
            $this->loadModel("UserModel");
            $this->userModel = new UserModel;
        }
       
        public function loginView(){
            return $this->view("account.index");
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
            if($this->userModel->verify($user, $password)){
                return $this->redirect("/");
            }else{
                return $this->view("account.index", [
                    "err"=>"Tài khoản hoặc mật khẩu không chính xác"
                ]);
            }

            
        }
    }

?>