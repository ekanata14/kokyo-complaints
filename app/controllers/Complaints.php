<?php

class Complaints extends Controller{
    public function index(){
        $this->view("templates/header");
        $this->view("complaints/index");
        $this->view("templates/footer");
    }
}