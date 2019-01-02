<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model( array( 'Admin_model' ));
    }

    function index(){
        is_login();
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $auth     = $this->Admin_model->login($username, $password);
            if ($auth > 0) {  
                $this->Admin_model->last_login();
                $this->session->set_userdata( array( 'logged_in' => TRUE, 'pass_adm' => $password ) );
                redirect('dashboard');
            } else {
                $this->load->view('login_view');
            }
        }
        $this->load->view('login_view');
    }
    
    function logout(){
        session_destroy();
        redirect('login');
    }
}