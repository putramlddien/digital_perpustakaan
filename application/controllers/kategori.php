<?php
class kategori extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_kategori');
        check_session();
    }
    
    function tampil_kategori_admin(){
        check_session('admin');
        $data['record'] = $this->model_kategori->tampil_data();
        $this->template->load('template/template_admin','kategori/tampil_data',$data);
    }
    
    function post()
    {
        check_session('admin');
        if(isset($_POST['submit'])){
            $this->model_kategori->post();
            redirect('kategori/tampil_kategori_admin');
        }
        else{
            $this->template->load('template/template_admin','kategori/form_input');
        }
    }
    
    function edit()
    {
        check_session('admin');
        if(isset($_POST['submit'])){
            $this->model_kategori->edit();
            redirect('kategori/tampil_kategori_admin');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_kategori->get_one($id)->row_array();
            $this->template->load('template/template_admin','kategori/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        check_session('admin');
        $id=  $this->uri->segment(3);
        $this->model_kategori->delete($id);
        redirect('kategori/tampil_kategori_admin');
    }

    function tampil_kategori_user()
    {
        check_session('user');
        $data['record'] = $this->model_kategori->tampil_data();
        $this->template->load('template/template_user','user/tampil_kategori_user',$data);
    }
}