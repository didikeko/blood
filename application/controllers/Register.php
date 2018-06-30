<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Pendonor_model');
        $this->load->model('Partner_model');
        $this->load->model('M_1/User_model');
        $this->load->model('M_1/M_aprove');
        $this->load->model('M_1/Rs_model');
        
    }
    public function index($x= 'register')
    {
        if ($x === 'register') {
            $this->load->view('home/header');
            $this->load->view('home/menulogin');
            $this->load->view('home/'.$x);
            $this->load->view('home/footer');
        }
        else {
            echo 'salah';
        }

    }

    public function Partner($x='partner'){
         if ($x === 'partner') {
            $this->load->view('home/header');
            $this->load->view('home/menulogin');
            $this->load->view('home/'.$x);
            $this->load->view('home/footer');
        }
        else {
            echo 'salah';
        } 
    }

    public function Pendonor_Insert(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password1 = md5($password);
        $level = "1";
        $status = "0";
        $email = $this->input->post('email');
        $gdarah = $this->input->post('goldarah');

       

        $data2 = array(
            'username'=> $username,
            'password'=> $password1,
            'nama'    => $nama,
            'email' => $email,
            'status' => $status,
            'level'   =>$level,
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')

        );
        
       $this->User_model->Insert_user($data2);
       $id_user= $this->User_model->get_iduser($email);
         $data = array(
            'user_id_user' => $id_user,
            'golongan_darah' => strtolower($gdarah),
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')

        );
        $this->Pendonor_model->Insert_pendonor($data);
        $encrypted_id = md5($id_user);
  
        $this->load->library('email');
        $config = array();
        $config['charset'] = 'utf-8';
        $config['useragent'] = 'Codeigniter';
        $config['protocol']= "smtp";
        $config['mailtype']= "html";
        $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
        $config['smtp_port']= "465";
        $config['smtp_timeout']= "400";
        $config['smtp_user']= "bloodemergencyid@gmail.com"; // isi dengan email kamu
        $config['smtp_pass']= "Bloode2018"; // isi dengan password kamu
        $config['crlf']="\r\n"; 
        $config['newline']="\r\n"; 
        $config['wordwrap'] = TRUE;
        //memanggil library email dan set konfigurasi untuk pengiriman email
       
        $this->email->initialize($config);
        //konfigurasi pengiriman
        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject("Verifikasi Akun");
        $this->email->message(
         "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
          site_url("register/verification/$encrypted_id")
        );
      
        if($this->email->send())
        {
            redirect('V_login');
        
          
        }else
        {
           echo "Berhasil melakukan registrasi, namu gagal mengirim verifikasi email";
        }
      
        echo "<br><br><a href='".site_url('login')."'>Kembali ke Menu Login</a>";
    
    }

    public function verification($key){

         $this->load->helper('url');
         $this->load->model('m_register');

         $this->m_register->changeActiveState($key);
         redirect('V_login/verified');
        }


    public function Partner_Insert(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password1 = md5($password);
        $level = "2";
        $active = "0";
        $email = $this->input->post('email');
        $kverifikasi = $this->input->post('kverifikasi');

        $data2 = array(
            'username'=> $username,
            'email' => $email,
            'nama' => $nama,
            'password'=> $password1,
            'level'=>$level,
            'status' => $active,
            'kode_verfikasi' => $kverifikasi, 
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')

        );
        $id_user = $this->User_model->Insert_user($data2);
         $iduser=$this->User_model->get_iduser($email);
        $data3= array('user_id_user'=> $iduser,'nama' => $nama, 'created' => date('Y-m-d H:i:s'),'updated' => date('Y-m-d H:i:s') );
       
       // $this->Partner_model->Insert_partner($data);
        
        $this->Rs_model->insertRS($data3);
        
        $encrypted_id = md5($id_user);
  
        $this->load->library('email');
        $config = array();
        $config['charset'] = 'utf-8';
        $config['useragent'] = 'Codeigniter';
        $config['protocol']= "smtp";
        $config['mailtype']= "html";
        $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
        $config['smtp_port']= "465";
        $config['smtp_timeout']= "400";
        $config['smtp_user']= "bloodemergencyid@gmail.com"; // isi dengan email kamu
        $config['smtp_pass']= "Bloode2018"; // isi dengan password kamu
        $config['crlf']="\r\n"; 
        $config['newline']="\r\n"; 
        $config['wordwrap'] = TRUE;
        //memanggil library email dan set konfigurasi untuk pengiriman email
       
        $this->email->initialize($config);
        //konfigurasi pengiriman
        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject("Verifikasi Akun");
        $this->email->message(
         "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
          site_url("register/verification/$encrypted_id")
        );
      
        if($this->email->send())
        {
            redirect('V_login');
        
          
        }else
        {
           echo "Berhasil melakukan registrasi, namu gagal mengirim verifikasi email";
        }
      
        echo "<br><br><a href='".site_url('login')."'>Kembali ke Menu Login</a>";

    }

     /**
     * Cek apakah $email valid, agar tidak ganda
     */
        function valid_email($email)
    {
        if ($this->Mymodel->valid_email($email) == TRUE)
        {
            $this->form_validation->set_message('email', "email sudah terdaftar");
            return FALSE;
        }
        else
        {           
            return TRUE;
        }
    }

}


