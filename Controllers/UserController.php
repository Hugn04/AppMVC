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
        public function register(){
            return $this->view("account.register");
        }
        public function registerNew($req){
            $data = $req["body"];
            $name = $data["name"];
            $user = $data["user"];
            $password = $data["password"];
            if($this->userModel->isNullUser($user)){
                $this->userModel->newAccount($name, $user, $password);
                return $this->redirect("/");
            }else{
                return $this->view("account.register", [
                    "err"=>"Tài khoản này đã được đăng ký",
                ]);
            }


            
        }
        
    }

?>