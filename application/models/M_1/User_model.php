<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
ONPOTIK - Online Apotik
Sistem Informasi Apotik Online
Kelompok 4 - Ardi | Didik | Irsalina | Hasan | Faisal
 */

class User_Model extends CI_Model{
    public function cek_user($data){
        return $this->db->get_where('user', $data);
    }
    public function get_user($data){
        return $this->db->get_where('user', $data);
    }
    public function get_ByEmail($data){
        $this->db->select('email');
        $this->db->from('user');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row()->email;
    }
    public function get_ByNama($data){
        $this->db->select('nama');
        $this->db->from('user');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row()->nama;
    }
    //user.email.user.username,user_rumahsakit.id_kota,user_rumahsakit.id_provinsi,user_rumahsakit.telepon,user_rumahsakit.foto,
    public function getUserByid(){
        $this->db->select(
            'user.nama,user.email,user.username,
             user_rumahsakit.id_kota,user_rumahsakit.id_provinsi,user_rumahsakit.telepon,user_rumahsakit.foto,user_rumahsakit.link_map,user_rumahsakit.alamat');
        $this->db->from('user');
        $this->db->join('user_rumahsakit','user_rumahsakit.user_id_user = user.id_user');
        $this->db->where(array('user.id_user'=>$this->session->userdata('id_user') ));
        $query = $this->db->get();
        return $query->result();
    }

    public function getSemuaUser(){
        return $this->db->get('user')->result();
    }
  

    public function hitungSemuaUser(){
        return $this->db->count_all('user');
    }

    public function tambahUser($data, $table) {
        $this->db->insert($table, $data);
    }

    public function getById($id) {
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('id_user', $id);
        return $this->db->get()->result_array();
    }

    //didik
    function set_status($value, $iduser){
        $data = array(
        'status' => $value,
        );
        $this->db->where('id_user', $iduser);
        $this->db->update('user', $data);
    }
    function get_validasiuser($kode){
        $this->db->select('id_user');
        $this->db->from('user');
        $this->db->where('kode_verifikasi',$kode);
        $query = $this->db->get();
        return $query->row()->id_user;
    }
    function get_kodeverifikasi($email){
        $this->db->select('kode_verifikasi');
        $this->db->from('user');
        $this->db->where('email',$email);
        $query = $this->db->get();
        return $query->row()->kode_verifikasi;
    }

    function get_iduser($email){
        $this->db->select('id_user');
        $this->db->from('user');
        $this->db->where('email',$email);
        $query = $this->db->get();
        return $query->row()->id_user;
    }
    function update_nama($data){
        $id_user = $this->session->userdata('id_user'); // dapatkan id user yg login
        $where= array('id_user' => $id_user );
        $res = $this->db->update('user', $data, $where);
        return $res;

    }

    function Insert_user($data){
        $this->db->insert('user', $data);
          $insert_id = $this->db->insert_id();

        return  $insert_id;
    }
}
