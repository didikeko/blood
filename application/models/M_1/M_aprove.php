<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_aprove extends CI_Model{
  function insertaprove($data){
    $this->db->insert('aproval', $data);
  }
  function get_idaprove($nama){
          $this->db->select('id_pasien');
          $this->db->where('nama',$nama);
          $query=$this->db->get('pasien');
          $row = $query->row();
          return $row->id_pasien;
  }
  function get_id($idbroad){
          $this->db->select('id_aproval');
          $this->db->where($idbroad);
          $query=$this->db->get('aproval');
          $row = $query->row();
          return $row->id_aproval;
  }
  function count_all(){
     $arr = array('persetujuan' => 0 , 'user_id_user' => $this->session->userdata('id_user') );
     $this->db->select('id_aproval');
     $this->db->where($arr);
     $query = $this->db->get('aproval');
     return $query->num_rows();
  }
  function aprove($wher,$data){
      $this->db->where($wher);
      $this->db->update('aproval', $data);
}
  function agree_byid($wher,$data){
        $this->db->where($wher);
        return $this->db->update('aproval', $data);
  }
  public function cek_pasiendanrs($idrs){
         $arr = array('ap.persetujuan' =>1,'ap.verify' =>0,'user_rumahsakit.id_rumahsakit' => $idrs);
         $this->db->select('ap.nama_pendonor,user.email,pasien.id_pasien,pasien.nama,ap.id_aproval,user_rumahsakit.link_map,ap.golongan_darah,pendonor.foto');
         $this->db->from('aproval as ap');

         $this->db->join('user','user.id_user=ap.user_id_user');
         $this->db->join('pasien','pasien.id_pasien=ap.pasien_id_pasien');
         $this->db->join('user_rumahsakit','user_rumahsakit.id_rumahsakit=pasien.user_rumahsakit_id_rumahsakit');
         $this->db->join('pendonor','pendonor.user_id_user=ap.user_id_user');
         //$this->db->join('user','user.id_user=aproval.user_id_user');
        // $this->db->join('user_rumahsakit','user_rumahsakit.id_rumahsakit=user.id_user');
         $this->db->where($arr);
         $query = $this->db->get();
         return $query;
    }
    public function count_pendonorrs($idrs){
         $arr = array('ap.persetujuan' =>1,'ap.verify' =>0,'user_rumahsakit.id_rumahsakit' => $idrs);
         $this->db->select('ap.nama_pendonor,user.email,pasien.id_pasien,pasien.nama,ap.id_aproval,user_rumahsakit.link_map,ap.golongan_darah');
         $this->db->from('aproval as ap');

         $this->db->join('user','user.id_user=ap.user_id_user');
         $this->db->join('pasien','pasien.id_pasien=ap.pasien_id_pasien');
         $this->db->join('user_rumahsakit','user_rumahsakit.id_rumahsakit=pasien.user_rumahsakit_id_rumahsakit');
         //$this->db->join('user','user.id_user=aproval.user_id_user');
        // $this->db->join('user_rumahsakit','user_rumahsakit.id_rumahsakit=user.id_user');
         $this->db->where($arr);
         $query = $this->db->get();
         return $query->num_rows();
    }
    function get_fotoPendonor(){
        $arr = array('ap.persetujuan' =>1,'ap.verify' =>0,'user_rumahsakit.id_rumahsakit' => $idrs);
        $this->db->select('ap.nama_pendonor,user.email,pasien.id_pasien,pasien.nama,ap.id_aproval,user_rumahsakit.link_map,ap.golongan_darah');
         $this->db->from('aproval as ap');

         $this->db->join('user','user.id_user=ap.user_id_user');
         $this->db->join('pasien','pasien.id_pasien=ap.pasien_id_pasien');
         $this->db->join('user_rumahsakit','user_rumahsakit.id_rumahsakit=pasien.user_rumahsakit_id_rumahsakit');
         $this->db->join('pendonor','pendonor.user_id_user=ap.user_id_user');
         $this->db->where($arr);
         $query = $this->db->get();
         return $query->num_rows();
    }
  
  

}
