<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model{
  function insertpasien($data){
    $this->db->insert('pasien', $data);
  }
  function get_idpasien($where){
    $query = $this->db->query('SELECT id_pesien FROM PASIEN LIMIT 1');
    $row = $query->row();
    return $row->id_pesien;
  }
}
