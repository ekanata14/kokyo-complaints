<?php

class Masyarakat_model{
    private $table = "masyarakat";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllMasyarakat(){
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultAll();
    }

    public function getDataMasyarakat($data){
        $this->db->query("SELECT * FROM {$this->table} WHERE nik = :nik");
        $this->db->bind("nik", $data['nik']);
        return $this->db->result();
    }

    public function loginByNIK($data){
        $this->db->query("SELECT nik, password FROM {$this->table} WHERE nik = :nik AND password = :password");
        $this->db->bind("nik", $data['nik']);
        $this->db->bind("password", $data['password']);
        return $this->db->rowCount();
    }

    public function addMasyarakat($data){
        // var_dump($data);
        $this->db->query("INSERT INTO {$this->table} VALUES(:nik, :nama,  :username, :password, :telp)");
        $this->db->bind("nik", $data['nik']);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("username", $data['username']);
        $this->db->bind("password", $data['password']);
        $this->db->bind("telp", $data['telp']);
        return $this->db->rowCount();
    }
}