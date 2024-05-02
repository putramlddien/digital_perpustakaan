<?php
class user extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_user');
        check_session();
    }
    
    function tampil_user_admin(){
        check_session('admin');
        $data['record'] = $this->model_user->tampil_data();
        $this->template->load('template/template_admin','data_user/tampil_data',$data);
    }
    
    
    function post()
    {
        check_session('admin');
        if(isset($_POST['submit'])){
            $nama_user =  $this->input->post('nama_user',true);
            $no_hp     =  $this->input->post('no_hp',true);
            $alamat    =  $this->input->post('alamat',true);
            $username  =  $this->input->post('username',true);
            $password  =  $this->input->post('password',true);
            $level     =  $this->input->post('level',true);

            $data      =  array('nama_user'=>$nama_user,
                                'no_hp' => $no_hp,
                                'alamat' => $alamat,
                                'username' => $username,
                                'password' => md5($password),
                                'level' => 'user');

            $this->db->insert('tb_user',$data);
            redirect('user/tampil_user_admin');
        }
        else{
            $this->template->load('template/template_admin','data_user/form_input');
        }
    }
    
    function edit()
    {
        check_session('admin');
        if(isset($_POST['submit'])){
            $id         =  $this->input->post('id',true);
            $nama       =  $this->input->post('nama_user',true);
            $no_hp       =  $this->input->post('no_hp',true);
            $alamat       =  $this->input->post('alamat',true);
            $username   =  $this->input->post('username',true);
            $password   =  $this->input->post('password',true);
            if(empty($password)){
                 $data  =  array(   'nama_user'=>$nama,
                                    'no_hp'=>$no_hp,
                                    'alamat'=>$alamat,
                                    'username'=>$username);
            }
            else{
                  $data =  array(   'nama_user'=>$nama,
                                    'no_hp'=>$no_hp,
                                    'alamat'=>$alamat,
                                    'username'=>$username,
                                    'password'=>$password);
            }
             $this->db->where('id_user',$id);
             $this->db->update('tb_user',$data);
             redirect('user/tampil_user_admin');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_user->get_one($id)->row_array();
            $this->template->load('template/template_admin','data_user/form_edit',$data);
        }
    }
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->db->where('id_user',$id);
        $this->db->delete('tb_user');
        redirect('user/tampil_user_admin');
    }

    function tampil_kategori_user()
    {
        check_session('user');
        $data['record'] = $this->model_kategori->tampil_data();
        $this->template->load('template/template_user','user/tampil_kategori_user',$data);
    }
}