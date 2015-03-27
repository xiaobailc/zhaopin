<?php
class My_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function is_logged_in()
    {
        $user = $this->session->userdata('email');
        return ($user===false||empty($user))?false:true;
    }
}