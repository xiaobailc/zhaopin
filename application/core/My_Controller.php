<?php
class My_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    protected function is_logged_in()
    {
        $user = $this->session->userdata('user_data');
        return isset($user['user_name']);
    }
}