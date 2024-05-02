<?php
class Model_user extends CI_Model
{
    function login($username, $password)
    {
        $this->db->select('id_user, level');
        $user = $this->db->get_where('tb_user', array
        ('username' => $username, 'password' => $password))->row();

        if ($user) {
            // Login berhasil
            return $user;
        } else {
            // Login gagal
            return false;
        }
    }

    function post($data) {
        $this->db->insert('tb_user', $data);
    }

    function edit($data,$id)
    {
        $this->db->where('id_user',$id);
        $this->db->update('tb_user',$data);
    }
       
    function tampil_data()
    {
        return $this->db->get('tb_user');
    }
    
    function get_one($id)
    {
        $param  =   array('id_user'=>$id);
        return $this->db->get_where('tb_user',$param);
    }
}