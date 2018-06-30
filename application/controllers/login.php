
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('Mymodel');  

    }
    public function index($x= 'login')
    {
        if ($x === 'login') {
            $this->load->view('login/header');
            $this->load->view('login/header_login');
            $this->load->view('login/'.$x);
            $this->load->view('login/footer');
        }
        else {
            echo 'salah';
        }

    }

    
    public function cek_login() {
        $this->load->model('Login_model');

        $data = array('email' => $this->input->post('email', TRUE),
            'password' => md5($this->input->post('password', TRUE))
        );

        $hasil = $this->Login_model->cek_user($data);

        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['logged_in'] = 'Sudah Loggin';
                $sess_data['id_user'] = $sess->id_user;
                $sess_data['email'] = $sess->email;
                $sess_data['username'] = $sess->username;
                $sess_data['active'] = $sess->status;
                $sess_data['level'] = $sess->level;
                $this->session->set_userdata($sess_data);
            }

            if ($this->session->userdata('level') == "1") {

                if($this->session->userdata('active') == "1"){
                $email = $this->session->userdata('email');                   
                redirect('Pendonor/DashboardPo');
                }

                else{
                    redirect('V_login/activation');
                }
                
            } else if ($this->session->userdata('level') == "2") {
            
                if($this->session->userdata('active') == "1"){
                $email = $this->session->userdata('email');                   
                redirect('Partner/Dashboard');
                }

                else{
                    redirect('V_login/activation');
                }
                
            }      
        }
        else {
            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
        }
    }



}


