<?php

class Admin extends Controller{
    public function index(){
        $data = [
            'totalPengaduan' => $this->model("Pengaduan_model")->hitungPengaduan(),
            'totalPengaduanToday' => $this->model("Pengaduan_model")->hitungPengaduanToday(),
            'pengaduanDitanggapi' => $this->model("Pengaduan_model")->hitungPengaduanDitanggapi(),
            'pengaduanBelumDitanggapi' => $this->model("Pengaduan_model")->hitungPengaduanBelumDitanggapi(),
            'title' => 'Dashboard'
        ];
        $this->view("templates/admin/header", $data);
        $this->view("admin/index", $data);
        $this->view("templates/admin/footer");
    }

    public function pengaduan(){
        $data = [
            'totalPengaduan' => $this->model("Pengaduan_model")->hitungPengaduan(),
            'totalPengaduanToday' => $this->model("Pengaduan_model")->hitungPengaduanToday(),
            'totalPengaduanDitanggapi' => $this->model("Pengaduan_model")->hitungPengaduanDitanggapi(),
            'totalPengaduanBelumDitanggapi' => $this->model("Pengaduan_model")->hitungPengaduanBelumDitanggapi(),
            'pengaduan' => $this->model("Pengaduan_model")->getAllPengaduanBelumDitanggapi(),
            'title' => 'Pengaduan',
            'pagePart' => "Belum Ditanggapi"
        ];
        $this->view("templates/admin/header", $data);
        $this->view("admin/pengaduan", $data);
        $this->view("templates/admin/footer");
    }

    public function pengaduanDiproses(){
        $data = [
            'totalPengaduan' => $this->model("Pengaduan_model")->hitungPengaduan(),
            'totalPengaduanToday' => $this->model("Pengaduan_model")->hitungPengaduanToday(),
            'totalPengaduanDitanggapi' => $this->model("Pengaduan_model")->hitungPengaduanDitanggapi(),
            'totalPengaduanBelumDitanggapi' => $this->model("Pengaduan_model")->hitungPengaduanBelumDitanggapi(),
            'pengaduan' => $this->model("Pengaduan_model")->getAllPengaduanDiproses(),
            'title' => 'Pengaduan',
            'pagePart' => "Diproses"
        ];
        $this->view("templates/admin/header", $data);
        $this->view("admin/pengaduan", $data);
        $this->view("templates/admin/footer");
    }

    public function pengaduanDitanggapi(){
        $data = [
            'totalPengaduan' => $this->model("Pengaduan_model")->hitungPengaduan(),
            'totalPengaduanToday' => $this->model("Pengaduan_model")->hitungPengaduanToday(),
            'totalPengaduanDitanggapi' => $this->model("Pengaduan_model")->hitungPengaduanDitanggapi(),
            'totalPengaduanBelumDitanggapi' => $this->model("Pengaduan_model")->hitungPengaduanBelumDitanggapi(),
            'pengaduan' => $this->model("Pengaduan_model")->getAllPengaduanDitanggapi(),
            'title' => 'Pengaduan',
            'pagePart' => "Ditanggapi"
        ];
        $this->view("templates/admin/header", $data);
        $this->view("admin/pengaduan", $data);
        $this->view("templates/admin/footer");
    }

    public function pengaduanProses(){
        if($this->model("Pengaduan_model")->pengaduanProses($_POST) > 0){
            Flasher::setFlash("Pengaduan Berhasil", "Diproses", "success");
            header("Location: " . BASE_URL . "/admin/pengaduanDiproses"); 
        } else{
            Flasher::setFlash("Pengaduan Gagal", "Diproses", "danger");
            header("Location: " . BASE_URL . "/admin/pengaduan");
        }
    }
    
    public function pengaduanSelesai(){
        if($this->model("Pengaduan_model")->pengaduanSelesai($_POST) > 0){
            Flasher::setFlash("Pengaduan Berhasil", "Diselesaikan", "success");
            header("Location: " . BASE_URL . "/admin/pengaduanDitanggapi"); 
        } else{
            Flasher::setFlash("Pengaduan Gagal", "Diselesaikan", "danger");
            header("Location: " . BASE_URL . "/admin/pengaduan");
        }
    }

    public function petugas(){
        $data = [
            'totalPengaduan' => $this->model("Pengaduan_model")->hitungPengaduan(),
            'totalPengaduanToday' => $this->model("Pengaduan_model")->hitungPengaduanToday(),
            'totalPengaduanDitanggapi' => $this->model("Pengaduan_model")->hitungPengaduanDitanggapi(),
            'totalPengaduanBelumDitanggapi' => $this->model("Pengaduan_model")->hitungPengaduanBelumDitanggapi(),
            'title' => 'Petugas',
            'petugas' => $this->model("Petugas_model")->getAllPetugas()
        ];
        $this->view("templates/admin/header", $data);
        $this->view("admin/petugas", $data);
        $this->view("templates/admin/footer");
    }

    public function tambahPetugas(){
        if($this->model("Petugas_model")->tambahPetugas($_POST) > 0){
            Flasher::setFlash("Petugas Berhasil", "Ditambahkan", "success");
            header("Locatikon: " . BASE_URL . "/admin/petugas");
        } else{
            Flasher::setFlash("Petugas Gagal", "Ditambahkan", "danger");
            header("Location: " . BASE_URL . "/admin/petugas");
        }
    }

}