<?php

class Auth extends Controller{
    public function index(){
        $data['title'] = "Authorization";
        $this->view("templates/header", $data);
        $this->view("auth/login");
        $this->view("templates/footer");       
    }

    public function register(){
        $data['title'] = "Authorization";
        $this->view("templates/header", $data);
        $this->view("auth/register");
        $this->view("templates/footer");
    }

    public function regisUser(){
        if($this->model("Masyarakat_model")->addMasyarakat($_POST) > 0){
            header("Location: " . BASE_URL . "/auth");
        } else{
            header("Location: " . BASE_URL . "/auth/register");
        }
    }

    public function loginUser(){       
        $masyarakat = $this->model("Masyarakat_model")->getDataMasyarakat($_POST);
        if (password_verify($_POST['password'], $masyarakat['password'])) {
            $password = $masyarakat['password'];
            if ($this->model("Masyarakat_model")->loginByNIK($_POST, $password) > 0) {
            var_dump($masyarakat['password']);
                $_SESSION = [
                    'nik' => $masyarakat['nik'],
                    'nama' => $masyarakat['nama'],
                    'username' => $masyarakat['username'],
                    'telp' => $masyarakat['telp'],
                    'status' => 'login'
                ];
                unset($_POST);
                header("Location: " . BASE_URL . "/home");
            } else {
                echo "DOESN'T MATCH"; 
            }
        } else{
            echo "DECRYPT FAILED"; 
        }

    }

    public function logout(){
        session_destroy();
        session_unset();
        header("Location: " . BASE_URL . "/auth");
    }
}