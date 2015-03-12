<?php
class Site extends CI_Controller{
    public function index(){
        $data['title'] = "互联网招聘DEMO";
        $this->load->helper('url');
        $this->load->view('templates/header',$data);
        $this->load->view('site/index');
        $this->load->view('templates/footer');
    }
    
    public function login(){
        $data['title'] = "登陆-互联网招聘DEMO";
        $this->load->helper('url');
        $this->load->view('templates/header',$data);
        $this->load->view('site/login');
    }
    
    public function register(){
        $data['title'] = "注册-互联网招聘DEMO";
        $this->load->helper('url');
        $this->load->view('templates/header',$data);
        $this->load->view('site/register');
    }
}