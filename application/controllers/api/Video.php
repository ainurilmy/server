<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Video extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function auth_post(){
        $id = $this->post('android_id');
        $this->db->where('android_id', $id);
        $users = $this->db->get('lazday_user')->result();
        if ($users){
            $data = array( 'last_login' => date("Y-m-d H:i:s") );
            $this->db->where('android_id', $id);
            $update = $this->db->update('lazday_user', $data);
            if($update){
                $this->response(array('response' => 'success', 'users' => $users ), 201);
            } else {
                $this->response(array('response' => 'fail', 502));
            }
        } else {
            $data = array(
                'android_id'    => $this->post('android_id'),
                'created'       => date("Y-m-d H:i:s"),
                'last_login'    => date("Y-m-d H:i:s")
            );
            $insert = $this->db->insert('lazday_user', $data);
            if($insert){
                $this->db->where('android_id', $id);
                $users = $this->db->get('lazday_user')->result();
                $this->response(array('response' => 'success', 'users' => $users ), 201);
            } else {
                $this->response(array('response' => 'fail', 502));
            }
        }
    }

    function index_get() {
        $video_id   = $this->get('video_id');
        $title      = $this->get('title');
        if ($video_id != null || $video_id != '' ) {
            $list = $this->db->get_where('lazday_list', array('video_id'=> $video_id))->result();
            $videos = $this->db->get_where('lazday_video', array('video_id'=> $video_id))->result();
            $this->response( array( 'videos' => $videos, 'list' => $list ), 200);
        } else if ($title != null || $title != '' ) {
            $this->db->like('title', $title);
            $videos = $this->db->get('lazday_video')->result();
            $this->response( array( 'videos' => $videos), 200);
        } else {
            $videos = $this->db->get('lazday_video')->result();
            $this->response( array( 'videos' => $videos), 200);
        }
    }

    function category_get(){
        $categories = $this->db->get('lazday_cat')->result();
        $this->response( array( 'categories' => $categories), 200);
    }

    function category_post(){
        $category = $this->post('category');
        $this->db->like('category', $category);
        $videos = $this->db->get('lazday_video')->result();
        $this->response( array( 'videos' => $videos), 200);
    }

    function list_get() {
        $id = $this->get('list_id');
        if ($id == '') {
            $list = $this->db->get('lazday_list')->result();
        } else {
            $this->db->where('list_id', $id);
            $list = $this->db->get('lazday_list')->result();
        }
        $this->response( array( 'list' => $list), 200);
    }

    function like_get() {
        $id = $this->get('android_id');
        if ($id == '') {
            $likes = $this->db->get('lazday_like')->result();
        } else {
            $this->db->select('*, lazday_like.created as like_created, lazday_list.created as list_created');
            $this->db->join('lazday_list', 'lazday_list.list_id = lazday_like.list_id');
            $this->db->where('android_id', $id);
            $likes = $this->db->get('lazday_like')->result();
        }
        $this->response( array( 'likes' => $likes), 200);
    }

    function like_post() {
        $android_id = $this->post('android_id');
        $list_id    = $this->post('list_id');
        $this->db->where(array('android_id' => $android_id, 'list_id' => $list_id));
        $likes = $this->db->get('lazday_like')->result();
        if(!$likes){
            $data = array(
                'android_id'    => $this->post('android_id'),
                'list_id'       => $this->post('list_id'),
                'created'       => date("Y-m-d H:i:s")
            );
            $insert = $this->db->insert('lazday_like', $data);
            if ($insert) {
                $this->response( array('response' => 'success' , 200));
            } else {
                $this->response( array('response' => 'fail', 502));
            }
        }
    }

    function unlike_post() {
        $android_id = $this->post('android_id');
        $list_id = $this->post('list_id');
        $this->db->where(array('android_id' => $android_id, 'list_id' => $list_id ));
        $delete = $this->db->delete('lazday_like');
        if ($delete) {
            $this->response(array('response' => 'success'), 201);
        } else {
            $this->response(array('response' => 'fail', 502));
        }
    }

    function view_post(){
        $this->db->set('view', 'view+1', FALSE);
        $this->db->where('list_id', $this->post('list_id'));
        $update = $this->db->update('lazday_list');
        if($update){
            $this->response(array('response' => 'success'), 201);
        } else {
            $this->response(array('response' => 'fail', 502));
        }
    }
}