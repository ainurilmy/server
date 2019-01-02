<?php
class Master_model extends CI_Model{
    //List
    function list_update($filename){
        $list_id    = $this->input->post('list_id');
        $title      = $this->input->post('title');
        $date       = date('Y-m-d H:i:s');
        $query      = "UPDATE lazday_list SET title='$title', filename='$filename', updated='$date' WHERE list_id='$list_id'";
        return $this->db->query($query);
    }
    function list_detail($list_id){
        $query = "SELECT l.*, v.title AS video_title FROM lazday_list AS l "
                . "LEFT JOIN lazday_video AS v ON l.video_id = v.video_id "
                . "WHERE l.list_id='$list_id'";
        return $this->db->query($query);
    }
    function list_delete(){
        $list_id    = $this->input->post('list_id');
        $query      = "DELETE FROM lazday_list WHERE list_id='$list_id'";
        return $this->db->query($query);
    }
    function list_create($filename){
        $video_id   = $this->input->post('video_id');
        $title      = $this->input->post('title');
        $date       = date('Y-m-d H:i:s');
        $query      = "INSERT INTO lazday_list (video_id, title, filename, created, updated ) values ('$video_id', '$title', '$filename', '$date', '$date')";
        return $this->db->query($query);
    }
    function upload_video(){
        // upload video
        $filename                   = date('dmY');
        $rand                       = uniqid();
        $config['upload_path']      = './assets/video/';
        $config['allowed_types']    = 'mp4';
        $config['max_size']         = '0';
        $config['file_name']        = $filename.$rand; 
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo  $this->upload->display_errors(); die();
        }
        $data = $this->upload->data();
        return $data['file_name'];
    }
    function list_read($video_id){
        $query = "SELECT * FROM lazday_list WHERE video_id='$video_id'";
        return $this->db->query($query);
    }
    //Video
    function video_detail($video_id){
        $query = "SELECT * FROM lazday_video WHERE video_id='$video_id'";
        return $this->db->query($query);
    }
    function upload_cover(){
        $filename                   = date('dmY');
        $rand                       = uniqid();
        $config['upload_path']      = './assets/cover/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['file_name']        = $filename.$rand;
        $this->load->library('upload', $config);
            
        if (!$this->upload->do_upload('userfile')) {
            $errors = $this->upload->display_errors();
            echo  $errors;
        }
        
        $data = $this->upload->data();
        return $data['file_name'];
    }
    function video_update($filename){
        $video_id   = $this->input->post('video_id_edit');
        $title      = $this->input->post('title_edit');
        $summary    = $this->input->post('summary_edit');
        $category   = $this->input->post('category_edit');
        $date       = date('Y-m-d H:i:s');
        $query      = "UPDATE lazday_video SET title='$title', summary='$summary', category='$category', "
                    . "updated='$date' , cover='$filename' WHERE video_id='$video_id'";
        return $this->db->query($query);
    }
    function video_delete(){
        $video_id   = $this->input->post('video_id_del');
        $query      = "DELETE FROM lazday_video WHERE video_id='$video_id'";
        return $this->db->query($query);
    }
    function video_read(){
        $query = "SELECT v.* , COUNT(l.list_id) AS lst, SUM(l.view) AS view FROM lazday_video AS v "
                . "LEFT JOIN lazday_list AS l ON v.video_id = l.video_id GROUP BY v.video_id "
                . "ORDER BY v.video_id DESC";
        return $this->db->query($query);
    }
    function video_create($filename){
        $title      = $this->input->post('title');
        $summary    = $this->input->post('summary');
        $status     = $this->input->post('status');
        $categories = $this->input->post('categories');
        $date       = date('Y-m-d H:i:s');
        $query      = "INSERT INTO lazday_video (title, summary, cover, category, created, updated) values ('$title', '$summary', '$filename', '$categories', '$date', '$date')";
        return $this->db->query($query);
    }
    //Category
    function category_create(){
        $category   = $this->input->post('category_new');
        $query      = "INSERT INTO lazday_cat (category) values ('$category')";
        return $this->db->query($query);
    }
    function category_read(){
        $query = "SELECT * FROM lazday_cat ORDER BY category ASC";
        return $this->db->query($query);
    }
    function category_delete(){
        $cat_id = $this->input->post('cat_id');
        $query  = "DELETE FROM lazday_cat WHERE cat_id='$cat_id'";
        return $this->db->query($query);
    }
    function category_update(){
        $cat_id     = $this->input->post('cat_id');
        $category   = $this->input->post('category');
        $query      = "UPDATE lazday_cat SET category='$category' WHERE cat_id='$cat_id'";
        return $this->db->query($query);
    }
}