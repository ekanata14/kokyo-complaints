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
            Flasher::setFlash("Register", "Berhasil", "success");
            header("Location: " . BASE_URL . "/auth");
        } else{
            Flasher::setFlash("Register", "Gagal", "danger");
            header("Location: " . BASE_URL . "/auth/register");
        }
    }

    public function loginUser(){
        $masyarakat = $this->model("Masyarakat_model")->getDataMasyarakat($_POST);
        $petugas = $this->model("Petugas_model")->getDataPetugas($_POST);
        if (password_verify($_POST['password'], $masyarakat['password']) || password_verify($_POST['password'], $petugas['password'])) {
            $passwordMasyarakat = $masyarakat['password'];
            $passwordPetugas = $petugas['password'];
            if ($this->model("Masyarakat_model")->loginByNIK($_POST, $passwordMasyarakat) > 0) {
                $_SESSION = [
                    'nik' => $masyarakat['nik'],
                    'nama' => $masyarakat['nama'],
                    'username' => $masyarakat['username'],
                    'telp' => $masyarakat['telp'],
                    'login' => true
                ];
                unset($_POST);
                header("Location: " . BASE_URL . "/home");
            } else if($this->model("Petugas_model")->loginPetugas($_POST, $passwordPetugas) > 0){
                $_SESSION['petugas'] = [
                    'name' => $petugas['nama_petugas'],
                    'username' => $petugas['username'],
                    'telp' => $petugas['telp'],
                    'login' => true
                ];
                unset($_POST);
                header("Location: " . BASE_URL . "/admin");
            } else {
                Flasher::setFlash("Login", "Gagal", "danger");
                header("Location: " . BASE_URL . "/auth");
            }
        } else{
            Flasher::setFlash("Login", "Gagal", "danger");
        }

    }

    public function logout(){
        session_destroy();
        session_unset();
        header("Location: " . BASE_URL . "/auth");
    }
}