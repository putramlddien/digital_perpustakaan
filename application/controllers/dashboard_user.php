<?php
class Dashboard_user extends CI_Controller{
    
    
    function index(){
        check_session('user');
        $this->template->load('template/template_user','user_dashboard');
        
    }
}
