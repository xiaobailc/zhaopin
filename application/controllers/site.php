<?php
class Site extends CI_Controller{
    public function index(){
        $this->load->view('templates/header');
        $this->load->view('site/index');
        $this->load->view('templates/footer');
    }
}