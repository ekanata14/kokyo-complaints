<?php

class Pengaduan_model{
    private $table = "pengaduan";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengaduan(){
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultAll();
    }
    public function getAllPengaduanBelumDitanggapi(){
        $this->db->query("SELECT * FROM {$this->table} WHERE status = '0' ORDER BY tgl_pengaduan DESC");
        return $this->db->resultAll();
    }

    public function getAllPengaduanDiproses(){
        $this->db->query("SELECT * FROM {$this->table} WHERE status = 'proses' ORDER BY tgl_pengaduan DESC");
        return $this->db->resultAll();
    }

    public function getAllPengaduanDitanggapi(){
        $this->db->query("SELECT * FROM {$this->table} WHERE status = 'selesai' ORDER BY tgl_pengaduan DESC");
        return $this->db->resultAll();
    }

    public function hitungPengaduan(){
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->rowCount();
    }

    public function hitungPengaduanToday(){
        $date = date("Y-m-d");
        $this->db->query("SELECT * FROM {$this->table} WHERE date(tgl_pengaduan) = '$date'");
        return $this->db->rowCount();
    }

    public function hitungPengaduanBelumDitanggapi(){
        $this->db->query("SELECT * FROM {$this->table} WHERE status = '0'");
        return $this->db->rowCount();
    }

    public function hitungPengaduanProses(){
        $this->db->query("SELECT * FROM {$this->table} WHERE status = 'proses'");
        return $this->db->rowCount();
    }

    public function hitungPengaduanDitanggapi(){
        $this->db->query("SELECT * FROM {$this->table} WHERE status = 'selesai'");
        return $this->db->rowCount();
    }

    public function addPengaduan($data, $image){
        // var_dump($data, $image);
        $date = date("Y-m-d/h:i:s");  
        $this->db->query("INSERT INTO {$this->table} VALUES(NULL, :tgl_pengaduan, :nik, :nama, :email, :telp, :isi_laporan, :foto, :status)");
        $this->db->bind("tgl_pengaduan", $date);
        $this->db->bind("nik", $data['nik']);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("telp", $data['telp']);
        $this->db->bind("isi_laporan", $data['isi_laporan']);
        $this->db->bind("foto", $image);
        $this->db->bind("status", '0');

        return $this->db->rowCount();
       }

    public function pengaduanBatal($data){
        $this->db->query("UPDATE {$this->table} SET status = '0' WHERE id_pengaduan = :id_pengaduan");
        $this->db->bind("id_pengaduan", $data['id_pengaduan']);
        return $this->db->rowCount();
    }

    public function pengaduanProses($data){
        $this->db->query("UPDATE {$this->table} SET status = 'proses' WHERE id_pengaduan = :id_pengaduan");
        $this->db->bind("id_pengaduan", $data['id_pengaduan']);
        return $this->db->rowCount();
    }
    public function pengaduanSelesai($data){
        $this->db->query("UPDATE {$this->table} SET status = 'selesai' WHERE id_pengaduan = :id_pengaduan");
        $this->db->bind("id_pengaduan", $data['id_pengaduan']);
        return $this->db->rowCount();
    }
}