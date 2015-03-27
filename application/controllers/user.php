<?php
class User extends My_Controller
{
    public function login()
    {
        if($this->is_logged_in()){
            redirect('index');
        }
        $data['title'] = "登陆";
        $data['callback'] = $this->input->get('callback');
        $this->load->view('templates/header',$data);
        $this->load->view('user/login');
    }
    
    public function register()
    {
        $data['title'] = "注册";
        $data['callback'] = $this->input->get('callback');
        $this->load->view('templates/header',$data);
        $this->load->view('user/register');
    }
    
    public function ajaxlogin()
    {
        $post = $this->input->post();
        
        $this->load->model('Member', '', true);
        $res = $this->Member->check_password($post['email'],$post['password']);
        var_dump($res);
        if($res){
            $data['success'] = true;
            $data['content']['loginToUrl'] = $post['callback'];
            $userdata = ['email'=>$post['email']];
            $this->session->set_userdata($userdata);
        }else{
            $data['success'] = false;
            $data['msg'] = '用户名或密码错误';
        }
        echo json_encode($data);
    }
}