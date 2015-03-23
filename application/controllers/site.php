<?php
class Site extends CI_Controller{
    public function index(){
        $this->load->helper('url');
        $data['title'] = "";
        $this->load->view('templates/header',$data);
        $this->load->view('site/index');
        $this->load->view('templates/footer');
    }
    
    public function login(){
        $this->load->helper('url');
        $data['title'] = "登陆";
        $data['register_url'] = site_url('site/register');
        $this->load->view('templates/header',$data);
        $this->load->view('site/login');
    }
    
    public function register(){
        $this->load->helper('url');
        $data['title'] = "注册";
        $this->load->view('templates/header',$data);
        $this->load->view('site/register');
    }
}