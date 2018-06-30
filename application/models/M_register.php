<?php

class M_register extends CI_Model {

    function changeActiveState($key){
       $this->load->database();
       $active = "1";
       
       $data = array(
       'status' => $active
       );

       $key1  = array('md5(id_user)' => $key );

       $this->db->update('user', $data, $key1);

       return true;
      }
    
}