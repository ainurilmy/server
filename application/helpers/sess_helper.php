<?php
    function check_session(){
        $CI =& get_instance();
        $session = $CI->session->userdata('logged_in');
        if ($session != TRUE) { 
            redirect('login'); 
        }
    }
    function is_login(){
        $CI =& get_instance();
        $session = $CI->session->userdata('logged_in'); 
        if ($session == TRUE) { 
            redirect('dashboard'); 
        }
    }

