<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner_model extends CI_Model{
	function Insert_partner($data){
		$this->db->insert('user_rumahsakit', $data);
	}
	function Insert_user($data){
		$this->db->insert('user', $data);
	}
	function get_count($blood,$id_kota){
		$sql = "SELECT * FROM PENDONOR WHERE golongan_darah = ? AND id_kota = ?";
		$queri = $this->db->query($sql, array($blood, $id_kota));
		return $queri->num_rows();
	}

	public function update_partner($data){
        $id_user = $this->session->userdata('id_user'); // dapatkan id user yg login
        $x= array('user_id_user' => $id_user );
         $this->db->update('user_rumahsakit', $data, $x);
        //return $res;

    }

    public function update_password($data){
        $email = $this->session->userdata('email'); // dapatkan id user yg login
        $email1= array('email' => $email );
        $res = $this->db->update('user_rumahsakit', $data, $email1);
        return $res;
    }  

}


