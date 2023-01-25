<?php

class Petugas_model{
    private $table = "petugas";
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllPetugas(){
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultAll();
    }

    public function getDataPetugas($data){
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username");
        $this->db->bind("username", $data['nik']);
        return $this->db->result();
    }

    public function loginPetugas($data, $password){
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username AND password = :password");
        $this->db->bind("username", $data['nik']);
        $this->db->bind("password", $password);
        return $this->db->rowCount();
    }

    public function tambahPetugas($data){
        $this->db->query("INSERT INTO {$this->table} VALUES(NULL, :nama_petugas, :username, :password, :telp, ':level'");
        $this->db->bind("nama_petugas", $data['nama_petugas']);
        $this->db->bind("username", $data['username']);
        $this->db->bind("password", password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind("telp", $data['telp']);
        $this->db->bind("level", $data['level']);
        return $this->db->rowCount();
    }
}