<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model{
  function insertpasien($data){
    $this->db->insert('pasien', $data);
  }
  function get_idpasien($nama){
          $this->db->select('id_pasien');
          $this->db->where('nama',$nama);
          $query=$this->db->get('pasien');
          $row = $query->row();
          return $row->id_pasien;
  }
  public function cek_pasien(){
        $arr = array('persetujuan' => 0 , 'user_id_user' => $this->session->userdata('id_user') );
         $this->db->select('aproval.persetujuan,pasien.nama,user.level');
         $this->db->from('aproval');
         $this->db->join('pasien','pasien.id_pasien=aproval.pasien_id_pasien');
         $this->db->join('user','user.id_user=aproval.user_id_user');
        // $this->db->join('user_rumahsakit','user_rumahsakit.id_rumahsakit=user.id_user');
         $this->db->where($arr);
         $query = $this->db->get();
         return $query->result();
    }
    public function cek_pasiendanrs(){
         $arr = array('ap.persetujuan' =>0,'ap.user_id_user' => $this->session->userdata('id_user'));
         $this->db->select('pasien.id_pasien,pasien.nama,user_rumahsakit.link_map,ap.id_aproval,ap.golongan_darah,user_rumahsakit.nama as nm');
         $this->db->from('aproval as ap');
         $this->db->join('pasien','pasien.id_pasien=ap.pasien_id_pasien');
         $this->db->join('user_rumahsakit','user_rumahsakit.id_rumahsakit=pasien.user_rumahsakit_id_rumahsakit');
         //$this->db->join('user','user.id_user=aproval.user_id_user');
        // $this->db->join('user_rumahsakit','user_rumahsakit.id_rumahsakit=user.id_user');
         $this->db->where($arr);
         $query = $this->db->get();
         return $query->result();
    }
    function get_pasienbyidrs($id){
        $this->db->select('pasien.nama,pasien.golongan_darah,pasien.umur,pasien.jenis_kelamin');
        $this->db->from('pasien');
        $this->db->join('user_rumahsakit','user_rumahsakit.id_rumahsakit=pasien.user_rumahsakit_id_rumahsakit');
        $this->db->where(array('user_rumahsakit.user_id_user' => $id));
        $query = $this->db->get();
        return $query->result();
  }

}
