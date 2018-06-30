<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_model extends CI_Model{
  function pesan($data){
    $this->db->insert('pesan', $data);
	}
  function get_Idpesan($where){
    $query = $this->db->query('SELECT id_pesan FROM PESAN LIMIT 1');
    $row = $query->row();
    return $row->id_pesan;
  }
}
