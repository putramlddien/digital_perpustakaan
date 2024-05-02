<?php
class auth extends CI_Controller{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('model_user');

    }
    
    function login() {
        if (!isset($_POST['submit'])) {
            $this->template->load('template_login', 'form_login');
            return;
        }
    
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Username dan password wajib diisi.');
            redirect('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
    
            $user = $this->model_user->login($username,$password);
    
            if ($user) {
                $this->db->where('username', $username);
                $this->db->update('tb_user', array('last_login' => date('Y-m-d')));
    
                $user_level = $user->level;
                $id_user = $user->id_user;
                $nama_user = $user->nama_user;
    
                $this->session->set_userdata(array(
                    'status_login' => 'oke',
                    'username' => $username,
                    'id_user' => $id_user,
                    'nama_user' => $nama_user,
                    'user_level' => $user_level
                ));
    
                // Panggil fungsi check_session untuk memastikan level yang sesuai
                check_session($user_level);
    
                redirect(base_url($user_level == 'admin' ? 'dashboard_admin' : 'dashboard_user'));
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah.');
                redirect('auth/login');
            }
        }
    }
    
    
    

    function register()
    {
        $this->template->load('template_login', 'form_register');
    }

    function proses_register() 
    {
        $data = [
            'nama_user' => $this->input->post('nama_user'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => 'user',
        ];

        $this->model_user->post($data);
        $this->session->set_flashdata('success', 'Register berhasil!');
        redirect('auth/login');
            
          

        }
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}