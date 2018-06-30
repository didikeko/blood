<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
  public function getUser($email,$password,$table)
	{
			$array = array('email' => $email, 'password' => $password);
			$this->db->select('username,password,id_user_id');
			$this->db->get($table);
			$query=$this->db->where($array);
            return $query->result();
	}  
}
