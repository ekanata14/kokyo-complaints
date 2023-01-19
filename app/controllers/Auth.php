<?php

class Auth extends Controller{
    public function index(){
        $this->view("templates/header");
        $this->view("auth/login");
        $this->view("templates/footer");       
    }

    public function register(){
        $this->view("templates/header");
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
        if($this->model("Masyarakat_model")->loginByNIK($_POST) > 0){
            $masyarakat = $this->model("Masyarakat_model")->getDataMasyarakat($_POST);
            $_SESSION = [
                'nik' => $masyarakat['nik'],
                'nama' => $masyarakat['nama'],
                'username' => $masyarakat['username'],
                'telp' => $masyarakat['telp'],
                'status' => 'login'
            ];
            header("Location: " . BASE_URL . "/home");
        } else{
            header("Location: " . BASE_URL . "/auth");
        }
    }

    public function logout(){
        session_destroy();
        session_unset();
        header("Location: " . BASE_URL . "/auth");
    }
}