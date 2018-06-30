<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendonor_model extends CI_Model{
  function Insert_pendonor($data){
    $this->db->insert('pendonor', $data);
  }

  
  function get_count($blood,$id_kota){
    $sql = "SELECT * FROM PENDONOR WHERE golongan_darah = ? AND id_kota = ?";
    $queri = $this->db->query($sql, array($blood, $id_kota));
    return $queri->num_rows();
  }

  public function update_pendonor($data){
        $id_user = $this->session->userdata('id_user'); // dapatkan id user yg login
        $where= array('user_id_user' => $id_user );
        $res = $this->db->update('pendonor', $data, $where);
        return $res;

    }

  public function update_password($data){
        $email = $this->session->userdata('email'); // dapatkan id user yg login
        $email1= array('email' => $email );
        $res = $this->db->update('pendonor', $data, $email1);
        return $res;
    }  

  
}
