<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rs_model extends CI_Model{
  public function __construct() {
       parent::__construct();

       //load database library
       $this->load->database();
   }
   function insertRS($data){
       $this->db->insert('user_rumahsakit',$data);
   }
   function get_linkmap($id){

     $this->db->select('link_map');
       $this->db->where('id_rumahsakit',$id);
       $query=$this->db->get('user_rumahsakit');
       $row = $query->row();
       return $row->link_map;
       //return $query->result();

   }
   function rsdata($id){

     $this->db->select('*');
       $this->db->where('user_id_user',$id);
       $query=$this->db->get('user_rumahsakit');
       return $query->result();

   }

  #web service tabel PENDONOR
  function getRows($id = ""){
        if(!empty($id)){
            $query = $this->db->get_where('user_rumahsakit', array('id_rumahsakit' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('user_rumahsakit');
            return $query->result_array();
        }
    }

  function get_idrs($id){
          $this->db->select('id_rumahsakit');
          $this->db->where('user_id_user',$id);
          $query=$this->db->get('user_rumahsakit');
          $row = $query->row();
          return $row->id_rumahsakit;
  }
  function get_NamaRS(){
        $this->db->select('nama');
        $this->db->from('user_rumahsakit');
        $this->db->where(array('user_id_user' => $this->session->userdata('id_user')));
        $query = $this->db->get();
        return $query->row()->nama;
  }
  function get_rsdanpasien(){
        $this->db->select('user.id_user,user.nama,user.email,user_rumahsakit.telepon,user_rumahsakit.foto,user_rumahsakit.id_provinsi,user_rumahsakit.id_kota');
        $this->db->from('user');
        $this->db->join('user_rumahsakit','user_rumahsakit.user_id_user=user.id_user');
        $query = $this->db->get();
        return $query->result();
  }

    /*
     * Insert user data
     */
    // public function insert($data = array()) {
    //     if(!array_key_exists('created', $data)){
    //         $data['created'] = date("Y-m-d H:i:s");
    //     }
    //     if(!array_key_exists('modified', $data)){
    //         $data['modified'] = date("Y-m-d H:i:s");
    //     }
    //     $insert = $this->db->insert('pendonor', $data);
    //     if($insert){
    //         return $this->db->insert_id();
    //     }else{
    //         return false;
    //     }
    // }
    //
    // /*
    //  * Update user data
    //  */
    // public function update($data, $id) {
    //     if(!empty($data) && !empty($id)){
    //         if(!array_key_exists('modified', $data)){
    //             $data['modified'] = date("Y-m-d H:i:s");
    //         }
    //         $update = $this->db->update('pendonor', $data, array('id'=>$id));
    //         return $update?true:false;
    //     }else{
    //         return false;
    //     }
    // }
    //
    // /*
    //  * Delete user data
    //  */
    // public function delete($id){
    //     $delete = $this->db->delete('pendonor',array('id'=>$id));
    //     return $delete?true:false;
    // }

//}
}
