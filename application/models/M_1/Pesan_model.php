<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_model extends CI_Model{
  function insertpesan($data){
    $this->db->insert('pesan', $data);
	}
  function get_Idpesan($where){
    $this->db->select('id_pesan');
    $this->db->where($where);
    $query=$this->db->get('pesan');
    $row = $query->row();
    return $row->id_pesan;
  }

  function get_pesanA(){
    $arr1 = array('A-','A+','a-','a+');
    // $arr2 = array('pasien.golongan_darah => A')
    $this->db->select('psn.isi_pesan,psn.nama_rumahsakit,psn.link_map,pasien.nama,pasien.golongan_darah');
    $this->db->from('pesan as psn');
    $this->db->join('pasien','pasien.id_pasien=psn.pasien_id_pasien');
    $this->db->join('aproval','aproval.pasien_id_pasien=pasien.id_pasien');
    $this->db->where_in('pasien.golongan_darah',$arr1);
    // $this->db->where($arr2);
    $query = $this->db->get();
    return $query->result();
  }
  function get_pesanB(){
    $arr1 = array('B-','B+','b-','b+');
    // $arr2 = array('pasien.golongan_darah => A')
    $this->db->select('psn.isi_pesan,psn.nama_rumahsakit,psn.link_map,pasien.nama,pasien.golongan_darah');
    $this->db->from('pesan as psn');
    $this->db->join('pasien','pasien.id_pasien=psn.pasien_id_pasien');
    $this->db->join('aproval','aproval.pasien_id_pasien=pasien.id_pasien');
    $this->db->where_in('pasien.golongan_darah',$arr1);
    // $this->db->where($arr2);
    $query = $this->db->get();
    return $query->result();   
  }
  function get_pesanAB(){
    $arr1 = array('AB-','AB+','ab-','ab+');
    // $arr2 = array('pasien.golongan_darah => A')
    $this->db->select('psn.isi_pesan,psn.nama_rumahsakit,psn.link_map,pasien.nama,pasien.golongan_darah');
    $this->db->from('pesan as psn');
    $this->db->join('pasien','pasien.id_pasien=psn.pasien_id_pasien');
    $this->db->join('aproval','aproval.pasien_id_pasien=pasien.id_pasien');
    $this->db->where_in('pasien.golongan_darah',$arr1);
    // $this->db->where($arr2);
    $query = $this->db->get();
    return $query->result();   
  }
  // function get_pesanC(){
  //   $arr1 = array('C-','C+','c-','c+');
  //   // $arr2 = array('pasien.golongan_darah => A')
  //   $this->db->select('psn.isi_pesan,psn.nama_rumahsakit,psn.link_map,pasien.nama,pasien.golongan_darah');
  //   $this->db->from('pesan as psn');
  //   $this->db->join('pasien','pasien.id_pasien=psn.pasien_id_pasien');
  //   $this->db->join('aproval','aproval.pasien_id_pasien=pasien.id_pasien');
  //   $this->db->where_in('pasien.golongan_darah',$arr1);
  //   // $this->db->where($arr2);
  //   $query = $this->db->get();
  //   return $query->result();
  // }
  function get_pesanO(){
    $arr1 = array('O-','O+','o-','o+');
    // $arr2 = array('pasien.golongan_darah => A')
    $this->db->select('psn.isi_pesan,psn.nama_rumahsakit,psn.link_map,pasien.nama,pasien.golongan_darah');
    $this->db->from('pesan as psn');
    $this->db->join('pasien','pasien.id_pasien=psn.pasien_id_pasien');
    $this->db->join('aproval','aproval.pasien_id_pasien=pasien.id_pasien');
    $this->db->where_in('pasien.golongan_darah',$arr1);
    // $this->db->where($arr2);
    $query = $this->db->get();
    return $query->result();
  }
  function get_pesanALL(){
    // $arr1 = array('A-','A+','a-','a+');
    // $arr2 = array('pasien.golongan_darah => A')
    $this->db->select('psn.isi_pesan,psn.nama_rumah_sakit,psn.link_map,pasien.nama,pasien.golongan_darah');
    $this->db->from('pesan as psn');
    $this->db->join('pasien','pasien.id_pasien=psn.pasien_id_pasien');
    $this->db->join('aproval','aproval.pasien_id_pasien=pasien.id_pasien');
    $this->db->limit(6);
    //$this->db->where_in('pasien.golongan_darah',$arr1);
    // $this->db->where($arr2);
    $query = $this->db->get();
    return $query->result();
  }
  // function get_fotoPendonor(){
  //       $arr = array('ap.persetujuan' =>1,'ap.verify' =>0,'user_rumahsakit.id_rumahsakit' => $idrs);
  //       $this->db->select('ap.nama_pendonor,user.email,pasien.id_pasien,pasien.nama,ap.id_aproval,user_rumahsakit.link_map,ap.golongan_darah');
  //        $this->db->from('aproval as ap');

  //        $this->db->join('user','user.id_user=ap.user_id_user');
  //        $this->db->join('pasien','pasien.id_pasien=ap.pasien_id_pasien');
  //        $this->db->join('user_rumahsakit','user_rumahsakit.id_rumahsakit=pasien.user_rumahsakit_id_rumahsakit');
  //        $this->db->join('pendonor','pendonor.user_id_user=ap.user_id_user');
  //        $this->db->where($arr);
  //        $query = $this->db->get();
  //        return $query->num_rows();
  //   }
}
