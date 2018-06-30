<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Broadcast extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('M_1/Pesan_model');
				$this->load->model('M_1/Pasien_model');
				$this->load->model('M_1/Rs_model');
				$this->load->model('Broadcast_model');
				$this->load->model('M_1/User_model');
				$this->load->model('M_1/M_aprove');
    }
    public function index()
    {
    		$data2['nama']  = $this->Rs_model->get_NamaRS();
        	$id = $this->Rs_model->get_idrs($this->session->userdata('id_user'));
            $data2['aprove']=$this->M_aprove->cek_pasiendanrs($id)->result();
            $data2['jumlah']=$this->M_aprove->cek_pasiendanrs($id)->num_rows();
            $this->load->view('home/header');
            $this->load->view('user/partner/menu',$data2);
            $this->load->view('home/broadcast');
            $this->load->view('home/footer');
        

    }


	function message(){
		$nama=$this->input->post('nama');
		$golongan_darah = $this->input->post('blood');
		//$id_kota = 1;
		$rs=$this->Rs_model->rsdata($this->session->userdata('id_user'));
		//$this->Pendonor->getData($golongan_darah,$id_kota);
		$data = array(
			 'nama' => $nama,
			 'golongan_darah' => $golongan_darah,
			// 'sakit' => $this->input->post('sakit'),
			 'umur' => $this->input->post('umur'),
			 'jenis_kelamin' => $this->input->post('gender'),
			 'user_rumahsakit_id_rumahsakit' => $rs[0]->id_rumahsakit,
			 'created'                   => date('Y-m-d H:i:s'),
			 'updated'                   => date('Y-m-d H:i:s')
		 );
		 $this->Pasien_model->insertpasien($data);
		 $id_pasien = $this->Pasien_model->get_idpasien($nama);
		 $isi_pesan = $this->input->post('pesan');
		 
     //$link_map = $this->Rs_model->get_linkmap(1); ##nanti diganti session id rumah sakit
		 $data2 = array(
			 'subject' => 'Blood Emergency',
			 'isi_pesan' => $isi_pesan,
       'link_map'  => $rs[0]->link_map,
			 'nama_rumahsakit' => $rs[0]->nama,
			 'user_rumahsakit_id_rumahsakit' => $rs[0]->id_rumahsakit,
			 'pasien_id_pasien' => $id_pasien
		 );
		  $this->Pesan_model->insertpesan($data2);

		    $id_pesan = $this->Pesan_model->get_Idpesan(array('pasien_id_pasien' => $id_pasien));
			$kota = $rs[0]->id_kota;
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

						if($key->golongan_darah == strtolower($golongan_darah) && $key->id_kota == $rs[0]->id_kota){
							
						 	 $cr = $key->user_id_user;
						 	 $pend= array('id_user' => $cr, 'level' => 1);
						 	 $mail_penerima= $this->User_model->get_ByEmail($pend);
						 	 $nama_pendonor = $this->User_model->get_ByNama($pend);
							$data3= array(
								'email_pengirim' => 'aryaanggara123456@gmail.com',
								
								'email_penerima' => $mail_penerima,
								'read'					 => 0,
								'pesan_id_pesan' => $id_pesan,
								'user_id_user' => $cr,
								'created'      => date('Y-m-d H:i:s')
							);
							
							$querybroad= $this->Broadcast_model->insertbroadcast($data3);
							$arr1= array('user_id_user' =>  $cr,'pesan_id_pesan' => $id_pesan );
							$get_idbroadcast = $this->Broadcast_model->get_idbroadcast($arr1);
							$data4 =array(
								 'persetujuan'				=> 0,
								 'nama_pendonor'			=> $nama_pendonor,
								 'golongan_darah'			=> $key->golongan_darah,
								 'verify'					=> 0,
								 'user_id_user'				=> $cr,
								 'broadcast_id_broadcast'   => $get_idbroadcast,
								 'pasien_id_pasien'			=> $id_pasien,
								 'created'					=> date('Y-m-d H:i:s')
								);
							$this->M_aprove->insertaprove($data4);
							$id_aprove=$this->M_aprove->get_id(array('broadcast_id_broadcast'=>$get_idbroadcast));
							$this->email->initialize($config);
							$this->email->set_mailtype("html");
							$this->email->set_newline("\r\n");
							$encrypt_id = $this->encrypt_decrypt('encrypt', $id_aprove);
							//Email content
							$htmlContent = '<h1>Seorang Pasien Berdarah'.$golongan_darah.' membutuhkan pertolongan anda</h1>';
							$htmlContent .= '<p>'.$isi_pesan.'</p>';
							$htmlContent .= '<p>'.$rs[0]->link_map.'</p>';
							//$htmlContent .= '<p>'.site_url('aproval/agree/'.$encode_id).'</p>';
							$htmlContent .= '
							<table>
								    <tr>
								        <td style="background-color: #4ecdc4;border-color: #4c5764;border: 2px solid #45b7af;padding: 10px;text-align: center;">
								            <a style="display: block;color: #ffffff;font-size: 12px;text-decoration: none;text-transform: uppercase;" href="'.site_url('pendonor/aprove/agree?id='.$encrypt_id).'">
								                Setuju
								            </a>
								        </td>
								    </tr>
								</table>
							'; 
							/*

								id idbroad idrs sien

							*/
							$this->email->to($mail_penerima);
							$this->email->from('aryaanggara123456@gmail.com','Bloodemergency');
							$this->email->subject('Pasien berdarah'.$golongan_darah.' membutuhkan pertolonganmu');
							$this->email->message($htmlContent);

							//Send email
							if($this->email->send()){
								redirect('partner/broadcast/broadcastfinish');
								//echo $x++.'email : '.$mail_penerima.' id_broadcast :'.$get_idbroadcast.'<br>';

							}
							else{
								echo "error email send";
							}
							
						 }

					}
		}

    function broadcastfinish()
    { 
    		// echo "string";
    		// die();
    		$data2['nama']  = $this->Rs_model->get_NamaRS();
    		$id = $this->Rs_model->get_idrs($this->session->userdata('id_user'));
    		$data2['aprove']=$this->M_aprove->cek_pasiendanrs($id)->result();
            $data2['jumlah']=$this->M_aprove->cek_pasiendanrs($id)->num_rows();		
            $this->load->view('home/header');
            $this->load->view('user/partner/menu',$data2);
            $this->load->view('home/finishbroadcast');
           $this->load->view('home/footer');
        

    }
	function encrypt_decrypt($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'This is my secret key';
        $secret_iv = 'This is my secret iv';
        // hash
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
    
	function coba(){
		// $json = file_get_contents(site_url('api/api_pendonor/user?id='.$kota.'&&blood='.$golongan_darah));
		// 	$obj = json_decode($json);
		//echo "string";
		//  echo $this->Rs_model->get_linkmap(1);
		// $y=$this->Rs_model->rsdata(1);
		// echo $y[0]->link_map;
		$json = file_get_contents(site_url('api/api_pendonor/user?id=419&&blood=%22b-%22'));
		$obj = json_decode($json);
		//print_r($obj);
			//var_dump($obj);
		//echo $obj[0]->email;
		//	echo $obj[0]["email"];
		$x=1;
					foreach($obj as $mydata=>$key)
				{
				    if ($key->golongan_darah == 'b-' && $key->id_kota == '419') {
				    	     $cr = $key->user_id_user;
							 $pend= array('id_user' => $cr, 'level' => 1);
							 $mail_penerima= $this->User_model->get_ByEmail($pend);

							 echo $mail_penerima;
				    }
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

	function coba3(){
		$data= array('id_user' => 1, 'level' => 1);
		$x=$this->User_model->get_ByEmail($data);
		echo $x;
	}

}
