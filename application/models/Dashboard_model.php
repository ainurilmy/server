<?php
class Dashboard_model extends CI_Model{
    
    function user(){
        $query = "SELECT COUNT(user_id) AS total FROM lazday_user WHERE status='unread' ";
        return $this->db->query($query);
    }
    
    function like(){
        $query = "SELECT COUNT(like_id) AS total FROM lazday_like WHERE status='unread' ";
        return $this->db->query($query);
    }
}