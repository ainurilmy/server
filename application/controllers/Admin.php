<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_session();
        $this->load->model( array( 'Admin_model'));
    }
    
    public function index(){
        $data['pengaturan'] = TRUE;
        $this->template->load('template', 'pengaturan_view', $data);
    }
    
    public function password_update(){
        $password = $_GET['password']; //echo $passowrd; die();
        $this->Admin_model->password_update( $password  );
    }
}
