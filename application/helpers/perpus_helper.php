<?php

function check_session($required_level = '')
{
    $CI = &get_instance();
    $status_login = $CI->session->userdata('status_login');
    $user_level = $CI->session->userdata('user_level'); // Sesuaikan dengan nama variabel yang di-set di controller

    if ($status_login == 'oke') {
        if ($required_level != '' && $user_level != $required_level) {
            redirect('auth/login');
        }
    } else {
        redirect('auth/login');
    }
}

