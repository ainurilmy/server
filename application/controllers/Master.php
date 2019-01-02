<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        check_session();
        $this->load->model( array( 'Admin_model', 'Master_model' ));
    }
    
    function index(){
        $data['video'] = TRUE;
        if (isset($_POST['submit_create'])) { 
            $cover_name = $this->Master_model->upload_cover();
            $this->Master_model->video_create($cover_name);
            redirect('master');
        }
        
        if (isset($_POST['submit_edit'])) {   
            $filename = $this->input->post('cover_edit'); //die($filename);

            if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '' ) {
                $cover_name = $this->Master_model->upload_cover();
                $this->Master_model->video_update($cover_name);

                if ( file_exists("./assets/cover/".$filename)) {
                    unlink("./assets/cover/".$filename);
                }
                
            } else {
                $this->Master_model->video_update($filename);
            }
            redirect('master');
        }
        
        if (isset($_POST['submit_delete'])) {
            $filename = $this->input->post('cover_del');

            if ( file_exists("./assets/cover/".$filename)) {
                unlink("./assets/cover/".$filename);
            }
            $this->Master_model->video_delete();
            redirect('master');
        }

        $data['videos'] = $this->Master_model->video_read();
        $this->template->load('template', 'master/video_view', $data);
    }
    
    function video(){
        $data['video'] = TRUE;
        if (isset($_POST['submit_delete'])) {
            $link = $this->input->post('filename');
            if ( file_exists("./assets/video/".$link)) {
                unlink("./assets/video/".$link);
            }
            $this->Master_model->list_delete();
            redirect('master/video/' . $this->input->post('video_id'));
        }
        $data['video_id']   = $this->uri->segment(3);
        $data['videos']     = $this->Master_model->video_detail($data['video_id'])->row_array();
        $data['lists']      = $this->Master_model->list_read($data['video_id']);
        $this->template->load('template', 'master/list_view', $data);
    }
    
    function upload(){
        $data['video']      = TRUE;
        $data['video_id']   = $this->uri->segment(3); //die( $data['video_id']);
        $data['videos']     = $this->Master_model->video_detail($data['video_id'])->row_array();
        
        if (isset($_POST['submit'])) {
            $video_name = $this->Master_model->upload_video();
            $this->Master_model->list_create( $video_name );            
            redirect( 'master/video/' . $this->input->post('video_id') );
        } else {
            $this->template->load('template', 'master/upload_view', $data);
        }
    }
    
    function edit(){
        $data['video']      = TRUE;
        $data['list_id']    = $this->uri->segment(3); 
        if (isset($_POST['submit'])) { 
            $link = $this->input->post('filename');

            if (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] != '' ) {    
                $video_name = $this->Master_model->upload_video();
                $this->Master_model->list_update( $video_name );
                
                if ( file_exists("./assets/video/".$link)) {
                    unlink("./assets/video/".$link);
                }
                
            } else {
                $this->Master_model->list_update($link);
            }
            redirect( 'master/video/' . $this->input->post('video_id') );
            
        } else {   
            $data['detail'] = $this->Master_model->list_detail($data['list_id'])->row_array();
            $this->template->load('template', 'master/edit_view', $data);
        }
    }

    function category(){
        $data['category'] = TRUE;
        if (isset($_POST['submit_create'])) {
            $this->Master_model->category_create();
            redirect('master/category');
        }
        
        if (isset($_POST['submit_update'])) {
            $this->Master_model->category_update();
            redirect('master/category');
        }
        
        if (isset($_POST['submit_delete'])) {
            $this->Master_model->category_delete();
            redirect('master/category');
        }
        
        $data['categories'] = $this->Master_model->category_read();
        $this->template->load('template', 'master/category_view', $data);
    }
}
