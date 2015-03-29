<?php
class Site extends My_Controller
{
    public function index()
    {
        $data['title'] = "首页";
        $data['login'] = $this->is_logged_in();
        $data['user_data'] = $this->session->userdata('user_data');
        //print_r($this->session->all_userdata());
        //var_dump($data);
        $this->load->view('templates/header',$data);
        $this->load->view('site/index');
        $this->load->view('templates/footer');
    }
}