<?php
class Site extends CI_Controller{
    public function index(){
        $s = $this->session->all_userdata();
        print_r($s);
        $data['title'] = "";
        $this->load->view('templates/header',$data);
        $this->load->view('site/index');
        $this->load->view('templates/footer');
    }
}