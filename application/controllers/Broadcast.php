<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Broadcast extends CI_Controller {
	function __construct() {
        parent::__construct();
        // if (!($this->session->userdata('level') === '0')) {
        //     if (!$this->session->userdata('username')){
        //         redirect('login');
        //     }
        //     redirect('login');
        // }
        $this->load->model('Pesan_model');
				$this->load->model('Pasien_model');
				$this->load->model('Rs_model');
				$this->load->model('Broadcast_model');
    }
	function coba(){
		//echo "string";
		//  echo $this->Rs_model->get_linkmap(1);
		// $y=$this->Rs_model->rsdata(1);
		// echo $y[0]->link_map;
		$json = file_get_contents(site_url('api/api_pendonor/user?id=1&&blood=%22B+%22'));
		$obj = json_decode($json);
		//print_r($obj);
		//	var_dump($obj);
		//echo $obj[0]->email;
		//	echo $obj[0]["email"];
		$x=1;
					foreach($obj as $mydata=>$key)
				{
				    echo $key->email;
						 $x++;
				}

	}
	function coba2(){
		$data3= array(
			'email_pengirim' => 'aryaanggara123456@gmail.com',
			'email_penerima' => '15650051@student.uin-suka.ac.id',
			'read'					 => 0,
			'pesan_id_pesan' => 5,
			'pendonor_id_pendonor' => 2
		);
	 $query=	$this->Broadcast_model->insertbroadcast($data3);
	 if(!query){
		 echo 'error model database broadcast';
	 }
	}
	function message(){
		$nama=$this->input->post('nama');
		$golongan_darah = $this->input->post('blood');
		$id_kota = 1;
		//$this->Pendonor->getData($golongan_darah,$id_kota);
		$data = array(
			 'nama' => $nama,
			 'golongan_darah' => $golongan_darah,
			 'sakit' => $this->input->post('sakit'),
			 'umur' => $this->input->post('umur'),
			 'jenis_kelamin' => $this->input->post('gender'),
			 'user_rumahsakit_id_rumahsakit' => 1     #hanya sebagai percobaan
		 );
		 $this->Pasien_model->insertpasien($data);
		 $id_pasien = $this->Pasien_model->get_idpasien($nama);
		 $isi_pesan = $this->input->post('pesan');
		 $rs=$this->Rs_model->rsdata(1);
     //$link_map = $this->Rs_model->get_linkmap(1); ##nanti diganti session id rumah sakit
		 $data2 = array(
			 'subject' => 'Blood Emergency',
			 'isi_pesan' => $isi_pesan,
       'link_map'  => $rs[0]->link_map,
			 'nama_rumahsakit' => $rs[0]->nama,
			 'user_rumahsakit_id_rumahsakit' => 1,
			 'pasien_id_pasien' => $id_pasien
		 );
		  $this->Pesan_model->insertpesan($data2);
			$kota = $rs[0]->kota_id_kota;
			$json = file_get_contents(site_url('api/api_pendonor/user?id='.$kota.'&&blood='.$golongan_darah));
			$obj = json_decode($json);
			//Mulai kodingan smtp foreach
			//Load email library
			$this->load->library('email');

			//SMTP & mail configuration
			$config = array(
				'protocol'  => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'aryaanggara123456@gmail.com',
				'smtp_pass' => 'alquranhidupku',
				'mailtype'  => 'html',
				'charset'   => 'utf-8'
			);
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$x=1;
		 foreach($obj as $mydata=>$key)
					{

						if($key->golongan_darah == $golongan_darah && $key->kota_id_kota == $id_kota){
							$data3= array(
								'email_pengirim' => 'aryaanggara123456@gmail.com',
								//$pend= array('id_user' => $key->id_user, 'level' => 1);
								'email_penerima' => $key->email, //$this->User_model->get_ByEmail($key->id_user,1);
								'read'					 => 0,
								'pesan_id_pesan' => $id_pasien,
								'pendonor_id_pendonor' => $key->id_pendonor
							);
							$querybroad= $this->Broadcast_model->insertbroadcast($data3);

							$this->email->initialize($config);
							$this->email->set_mailtype("html");
							$this->email->set_newline("\r\n");

							//Email content
							$htmlContent = '<h1>Seorang Pasien Berdarah'.$golongan_darah.' membutuhkan pertolongan anda</h1>';
							$htmlContent .= '<p>'.$isi_pesan.'</p>';

							$this->email->to($key->email);
							$this->email->from('aryaanggara123456@gmail.com','Bloodemergency');
							$this->email->subject('Pasien berdarah'.$golongan_darah.' membutuhkan pertolonganmu');
							$this->email->message($htmlContent);

							//Send email
							$this->email->send();
						}

					}
		}





}
