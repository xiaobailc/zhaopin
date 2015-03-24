<?php
class Site extends CI_Controller{
    public function index(){
        $this->load->helper('url');
        $data['title'] = "";
        $this->load->view('templates/header',$data);
        $this->load->view('site/index');
        $this->load->view('templates/footer');
    }
}