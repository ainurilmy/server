<?php
class User_model extends CI_Model{

    function user_read(){
        $this->user_unread();
        $query = "SELECT u.* , COUNT(l.android_id) as likes FROM lazday_user AS u "
                . "LEFT JOIN lazday_like AS l ON u.android_id = l.android_id GROUP BY u.android_id";
        return $this->db->query($query);
    }
    
    function user_unread(){
        $query = "UPDATE lazday_user SET status='read' WHERE status='unread'";
        return $this->db->query($query);
    }
            
    function like_read(){
        $this->like_unread();
        $query = "SELECT lk.*, ls.title AS list_title, v.title AS video_title FROM lazday_like AS lk "
                . "LEFT JOIN lazday_list AS ls ON lk.list_id = ls.list_id "
                . "LEFT JOIN lazday_video AS v ON ls.video_id = v.video_id";
        return $this->db->query($query);
    }
    
    function like_unread(){
        $query = "UPDATE lazday_like SET status='read' WHERE status='unread'";
        return $this->db->query($query);
    }
    
}
