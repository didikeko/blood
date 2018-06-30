<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
        parent::__construct();
       if($this->session->userdata('level') == "1"){
            redirect('Pendonor/DashboardPo');
        }else if($this->session->userdata('level') == "2"){
             redirect('Partner/Dashboard');
        }
        $this->load->model('M_1/Pesan_model');
    }
	public function index($x= 'content')
	{

		$data['a']=$this->Pesan_model->get_pesanA();
		$data['b']=$this->Pesan_model->get_pesanB();
		$data['o']=$this->Pesan_model->get_pesanO();
		$data['ab']=$this->Pesan_model->get_pesanAB();

		$this->load->view('home/header');
        $this->load->view('home/menulogin');
	 	$this->load->view('home/'.$x,$data);
		$this->load->view('home/footer');
	}
	// function broadcast(){ 
	// 	$nama=$this->input->post('nama');
	// 	$golongan_darah = $this->input->post('blood');
	// 	$id_kota = 1;
	// 	$this->Pendonor->getData($golongan_darah,$id_kota);
	// 	$data = array(
	// 		 'nama' => $nama,
	// 		 'golongan_darah' => $golongan_darah,
	// 		 'sakit' => $this->input->post('sakit'),
	// 		 'umur' => $this->input->post('umur'),
	// 		 'jenis_kelamin' => $this->input->post('gender'),
	// 		 'user_rumahsakit_id_rumahsakit' => 1
	// 	 );
	// 	 $this->Pasien_model->insertpasien($data);
	// 	 $id_pasien = $this->Pasien_model->get_idpasien($nama);
	//
	// 	 $data2 = array(
	// 		 'subject' => 'Blood Emergency'
	// 		 'isi_pesan' => $this->input->post('pesan'),
	// 		 'user_rumahsakit_id_rumahsakit' => 1,
	// 		 'id_pasien' => $id_pasien
	// 	 );
	// 	  $this->Pesan_model->pesan($data2);
	// 		//mencari jumlah pendonor,email_pendonor yg berdarah ...
	// 		$n_record= $this->Pendonor_model->get_count($golongan_darah,$id_kota);
	// 	 	$data3 = array(
	// 		  	'email_pengirim'		  => 'aryaanggara123456@gmail.com'
	// 				'email_penerima' 			=> '',
	// 				'read'								=> 0,
	// 				'pesan_id_pesan' 			=> $this->Pesan_model->get_Idpesan($nama);
	// 				'pendonor_id_pendonor'=>
	//  	}
	//
  //  ##Broadcast Email Menggunakan SMTP
	// 	$config = array(
	// 			 'protocol' => 'smtp',
	// 			 'smtp_host' => 'ssl://smtp.googlemail.com',
	// 			 'smtp_port' => 465,
	// 			 'smtp_user' => '@gmail.com',
	// 			 'smtp_pass' => '',
	// 			 'mailtype'  => 'html',
	// 			 'charset'	=> 'iso-8859-1',
	// 			 'wordwrap'  => TRUE
	//
	// 		 );
	// 		 $message = 'didikhalo';
	//  		 $ci = get_instance();
	//  		 $ci->load->library('email', $config);
	//  		 $this->email->set_newline("\r\n");
	//  		 $this->email->from('didikeko1997@gmail.com','Onpotik Yogyakarta');
	//  		 $this->email->to('aryaanggara123456@gmail.com');
	//  		 $this->email->subject('Verifikasi Code Onpotik');
	//  		 $this->email->message($message);
	//  		 $this->email->send();
	//
	//
	// }
}
