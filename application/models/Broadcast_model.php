<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Broadcast_model extends CI_Model{
  function insertbroadcast($data){
    $this->db->insert('broadcast', $data);
  }
  function get_idbroadcast($arr){
        $this->db->select('id_broadcast');
        $this->db->from('broadcast');
        $this->db->where($arr);
        $query = $this->db->get();
        return $query->row()->id_broadcast;
    }
}
