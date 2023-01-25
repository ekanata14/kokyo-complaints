<?php

class Admin extends Controller{
    public function index(){
        Middleware::auth();
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
        Middleware::auth();
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
        Middleware::auth();
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
        Middleware::auth();
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
   
    public function pengaduanBatal(){
        if($this->model("Pengaduan_model")->pengaduanBatal($_POST) > 0){
            Flasher::setFlash("Pengaduan Berhasil", "Dibatalkan", "success", "start");
            Redirect::to("admin/pengaduan");
        } else{
            Flasher::setFlash("Pengaduan Gagal", "Dibatalkan", "danger", "start");
            Redirect::to("admin/pengaduan");
        }
    }

    public function pengaduanProses(){
        if($this->model("Pengaduan_model")->pengaduanProses($_POST) > 0){
            Flasher::setFlash("Pengaduan Berhasil", "Diproses", "success", "start");
            Redirect::to("admin/pengaduanDiproses");
        } else{
            Flasher::setFlash("Pengaduan Gagal", "Diproses", "danger", "start");
            Redirect::to("admin/pengaduan");
        }
    }
    
    public function pengaduanSelesai(){
        if($this->model("Pengaduan_model")->pengaduanSelesai($_POST) > 0){
            Flasher::setFlash("Pengaduan Berhasil", "Diselesaikan", "success", "start");
            Redirect::to("admin/pengaduanDitanggapi");
        } else{
            Flasher::setFlash("Pengaduan Gagal", "Diselesaikan", "danger", "start");
            Redirect::to("admin/pengaduan");
        }
    }

    public function petugas(){
        Middleware::auth();
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
            Flasher::setFlash("Petugas Berhasil", "Ditambahkan", "success", "start");
            Redirect::to("admin/petugas");
        } else{
            Flasher::setFlash("Petugas Gagal", "Ditambahkan", "danger", "start");
            Redirect::to("admin/petugas");
        }
    }

    public function editPetugas(){
        if($this->model("Petugas_model")->editPetugas($_POST) > 0){
            Flasher::setFlash("Petugas Berhasil", "Diedit", "success", "start");
            Redirect::to("admin/petugas");
        } else{
            Flasher::setFlash("Petugas Gagal", "Diedit", "danger", "start");
            Redirect::to("admin/petugas");
        }
    }

    public function hapusPetugas(){
        if($this->model("Petugas_model")->hapusPetugas($_POST) > 0){
            Flasher::setFlash("Petugas Berhasil", "Dihapus", "success", "start");
            Redirect::to("admin/petugas");
        } else{
            Flasher::setFlash("Petugas Gagal", "Dihapus", "danger", "start");
            Redirect::to("admin/petugas");
        }
    }

}