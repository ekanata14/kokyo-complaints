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
}