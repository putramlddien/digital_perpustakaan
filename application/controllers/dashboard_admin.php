<?php
class Dashboard_admin extends CI_Controller{
    
    
    function index(){
        check_session('admin');
        $this->template->load('template/template_admin','admin_dashboard');
    }
}

// $CI = &get_instance();
//                     $user_info = array(
//                         'username' => $CI->session->userdata('username'),
//                         'level' => $CI->session->userdata('user_level'),
//                         // tambahkan informasi sesuai kebutuhan lainnya
//                     );
                
//                     var_dump($user_info);
//                     die();