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
        if($res===false){
            $data['success'] = false;
            $data['msg'] = '用户名不存在或密码错误';
        }else{
            $data['success'] = true;
            $data['content']['loginToUrl'] = $post['callback'];
            $userdata['email'] = $res['email'];
            $userdata['user_name'] = $res['email'];
            $userdata['user_type'] = $res['usertype'];
            $this->session->set_userdata('user_data',$userdata);
        }
        echo json_encode($data);
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('index');
    }
    
    public function ajaxregister(){
        $post = $this->input->post();
        $this->load->model('Member', '', true);
        $user = [
            'username'=>$post['email'],
            'email'=>$post['email'],
            'usertype'=>$post['type'],
            'password'=>md5($post['password']),
        ];
        $res = $this->Member->register($user);
        if($res===false){
            $error_num = $this->db->_error_number();
            $error_msg = $this->db->_error_message();
            $data['success'] = false;
            switch ($error_num){
                case '1062':
                    $data['msg'] = '该邮箱已被注册，请重新输入或直接登录';
                    break;
                case '':
                    
                default:
                    $data['msg'] = '网络错误';
                    break;
            }
        }else{
            $data['success'] = true;
            $data['content']['loginToUrl'] = $post['callback'];
            $userdata['email'] = $user['email'];
            $userdata['user_name'] = $user['email'];
            $userdata['user_type'] = $user['usertype'];
            $this->session->set_userdata('user_data',$userdata);
        }
        echo json_encode($data);
    }
}