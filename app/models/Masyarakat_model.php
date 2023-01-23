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

    public function loginByNIK($data, $password){
        $this->db->query("SELECT * FROM {$this->table} WHERE nik = :nik AND password = :password");
        $this->db->bind("nik", $data['nik']);
        $this->db->bind("password", $password);
        return $this->db->rowCount();
    }

    public function addMasyarakat($data){
        $this->db->query("INSERT INTO {$this->table} VALUES(:nik, :nama,  :username, :password, :telp)");
        $this->db->bind("nik", $data['nik']);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("username", $data['username']);
        $this->db->bind("password", password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind("telp", $data['telp']);
        return $this->db->rowCount();
    }
}