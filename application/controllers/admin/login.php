<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
        parent::__construct();
       			$this->load->model('M_1/M_admin');
    }
    public function index()
    {
            $this->load->view('admin/login');
    }
    function cek_login(){

        
        // echo md5($this->input->post('password'));
        // die();

        $data = array('username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );

        $hasil = $this->M_admin->cek_user($data);
        // var_dump($hasil);
        // die();

        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['logged_in'] = 'Sudah Loggin';
                $sess_data['id_superuser'] = $sess->id_superuser;
                $sess_data['username'] = $sess->username;
                $this->session->set_userdata($sess_data);                 
                redirect('admin/pendonor');
            }
        }
        else {
            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
        }
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('admin/login/index');
    }

}
