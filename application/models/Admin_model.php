<?php
class Admin_model extends CI_Model{
    
    function login($username, $password){
        $check = $this->db->get_where('lazday_admin', array('username'=>$username, 'password'=>md5($password) ));
        // echo $check->num_rows(); $this->db->last_query();
        if ( $check->num_rows() > 0 ) { 
            return 1;   
        } else {    
            return 0;
        }
    }
    
    function last_login(){
        $date   = date('Y-m-d H:i:s');
        $query  = "UPDATE lazday_admin SET last_login='$date'";
        return $this->db->query($query);
    }
    
    function password_update($password){
        $this->session->set_userdata(   array( 'pass_adm' => $password )  );
        $date   = date('Y-m-d H:i:s');
        $query  = "UPDATE lazday_admin SET password='".md5($password) ."', updated='$date'";
        return $this->db->query($query);
    }
    
}
