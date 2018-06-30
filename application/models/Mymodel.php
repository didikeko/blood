<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model{
    public function GetData($table){
        $res=$this->db->get($table); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }

    public function Insert($table,$data){
        $res = $this->db->insert($table, $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $res; // Kode ini digunakan untuk mengembalikan hasil $res
    }

    public function GetWhere($table, $data){
        $res=$this->db->get_where($table, $data);
        return $res->result_array();
    }


    public function Update($table, $data, $where){
        $res = $this->db->update($table, $data, $where); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        return $res;
    }

    public function Delete($table, $where){
        $res = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
        return $res;
    }

    public function get_user(){
        $id_user = $this->session->userdata('id_user'); // dapatkan id user yg login
        $this->db->select('*');
        $this->db->where('user_id_user', $id_user);//
        $this->db->from('pendonor');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user1(){
        $id_user = $this->session->userdata('id_user'); // dapatkan id user yg login
        $this->db->select('nama,telepon,alamat');
        $this->db->where('user_id_user', $id_user);//
        $this->db->from('user_rumahsakit');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_user($data){
        $id_user = $this->session->userdata('id_user'); // dapatkan id user yg login
        $x= array('id_user' => $id_user );
        $this->db->update('user', $data, $x);
        //return $res;
    }

    public function update_password($data){
        $email = $this->session->userdata('email'); // dapatkan id user yg login
        $email1= array('email' => $email );
        $res = $this->db->update('user', $data, $email1);
        return $res;
    }

    function Insert_jajal($data){
        $this->db->insert('jajal', $data);
    }
}
?>