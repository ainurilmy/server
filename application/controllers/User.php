<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_session();
        $this->load->model( array( 'Admin_model', 'User_model' ));
    }
    
    public function index(){
        $data['pengguna'] = TRUE;
        $data['users'] = $this->User_model->user_read();
        $this->template->load('template', 'user_view', $data);
    }
    
    public function like(){
        $data['suka']   = TRUE;
        $data['likes']  = $this->User_model->like_read();
        $this->template->load('template', 'like_view', $data);
    }
}
