<?php

class Login_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $email
    * @param string $password
    * @return void
    */

    /*Check Login*/
   	function validate($email, $password)
	{
		$this->db->where('password', $password);
		$this->db->where('email', $email);
		$query = $this->db->get('user');
		return $query->result();	
	}

	/*Get Session values */
		
	function get_id($email, $password)
	{
		
		$this->db->where('password', $password);
		$this->db->where('email', $email);	
		return $this->db->get('user')->result();
				
	}

	public function cek_user($data){
        return $this->db->get_where('user', $data);
    }
		
}