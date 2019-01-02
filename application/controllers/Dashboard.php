<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        check_session();
        $this->load->model( array( 'Dashboard_model' ));
    }
    
    public function index(){ 
        // echo $this->session->userdata('pass_adm'); die; 
        $data['dashboard']  = TRUE;
        $data['new_user']   = $this->Dashboard_model->user()->row_array();
        $data['new_like']   = $this->Dashboard_model->like()->row_array();
        $this->template->load('template', 'dashboard_view', $data);
    }
}