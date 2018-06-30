<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{
  public function cek_user($data){
        return $this->db->get_where('super_user', $data);
    }
}
