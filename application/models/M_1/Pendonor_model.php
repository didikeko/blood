<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendonor_model extends CI_Model{
  public function __construct() {
       parent::__construct();

       //load database libraryy
       $this->load->database();
   }
public function update_pendonor($data){
        $id_user = $this->session->userdata('id_user'); // dapatkan id user yg login
        $where= array('user_id_user' => $id_user );
        $res = $this->db->update('pendonor', $data, $where);
        return $res;

    }
function get_Gdarah($id){
        $this->db->select('golongan_darah');
        $this->db->from('pendonor');
        $this->db->where(array('user_id_user' => $id));
        $query = $this->db->get();
        return $query->row()->golongan_darah;
  }
function get_Foto(){
        $this->db->select('foto');
        $this->db->from('pendonor');
        $this->db->where(array('user_id_user' => $this->session->userdata('id_user')));
        $query = $this->db->get();
        return $query->row()->foto;
  }
  function pasien($data){
    $this->db->insert('pendonor', $data);
  }
  function get_count($blood,$id_kota){
    $sql = "SELECT * FROM PENDONOR WHERE golongan_darah = ? AND id_kota = ?";
    $queri = $this->db->query($sql, array($blood, $id_kota));
    return $queri->num_rows();
  }
  #web service tabel PENDONOR
  function getRows($idkota,$blood){
    // $query = $this->db->get_where('pendonor', array('kota_id_kota' => $kota,'golongan_darah' => $blood));
    // return $query->row_array();
        if(!empty($kota) && !empty($blood)){
            $query = $this->db->get_where('pendonor', array('kota_id_kota' => $kota,'golongan_darah' => $blood));
            return $query->row_array();
        }else{
            $query = $this->db->get('pendonor');
            return $query->result_array();
          //  return 0;
        }
    }
   function get_allPendonor(){
        $this->db->select('user.id_user,user.nama,user.email,pendonor.telepon,pendonor.foto,pendonor.id_provinsi,pendonor.id_kota,pendonor.golongan_darah');
        $this->db->from('user');
        $this->db->join('pendonor','pendonor.user_id_user=user.id_user');
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
