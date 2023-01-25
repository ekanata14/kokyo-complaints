<?php

class Complaints extends Controller{
    public function index(){
        $data['title'] = "Complaints";
        $this->view("templates/header", $data); 
        $this->view("complaints/index");
        $this->view("templates/footer");
    }

    public function addComplaints(){
        $data = [
            'foto' => $_FILES['foto']['name']
        ];

        $file_name = $data['foto'];
        $foto = DIR_FOLDER . $file_name;
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
        if($this->model("Pengaduan_model")->addPengaduan($_POST, $data['foto']) > 0){
            Flasher::setFlash("Pengaduan Berhasil", "Dikirimkan", "success", "center");
            Redirect::to("home#report");
        } else{
            Flasher::setFlash("Pengaduan Gagal", "Dikirimkan", "danger", "center");
            Redirect::to("home#report");
        }
    }
}