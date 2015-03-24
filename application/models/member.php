<?php
class Member extends CI_Model{
    private $table = 'member';
    public function check_password($email, $password){
        $query = $this->db->get_where($this->table, ['email'=>$email],1);
        $row = $query->row_array();
        if(empty($row)){
            return false;
        }
        if(md5($password)==$row['password'])
            return true;
        else 
            return false;
    }
    
    public function check_email($email){
        $query = $this->db->get_where($this->table, ['email'=>$email],1);
        $row = $query->row_array();
        if(empty($row))
            return true;
        else
            return false;
    }
}