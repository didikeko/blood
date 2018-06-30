<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aprove extends CI_Controller {
	function __construct() {
        parent::__construct();
                $this->load->model('Pesan_model');
				$this->load->model('M_1/Pasien_model');
				$this->load->model('M_1/Rs_model');
				$this->load->model('Broadcast_model');
				$this->load->model('M_1/User_model');
                $this->load->model('M_1/M_aprove');
                $this->load->model('M_1/Pendonor_model');
    }
    public function index()
    {
        
            $this->load->view('login/header');
            $this->load->view('login/header_login');
            $this->load->view('partner/v_aprove');
            $this->load->view('home/footer');
        

    }
    function batal(){
            $id_pasien= $_POST['id_aproval'];
            $id_user = $this->session->userdata('id_user');
            $wher= array(
                    'id_aproval' => $id_pasien,
                    'user_id_user' => $id_user
                );
            $data= array(
                    'persetujuan' => 0
                );
            $this->M_aprove->aprove($wher,$data);
    }
    function persetujuan(){
            $id_aproval= $_POST['id_aproval'];
            $id_user = $this->session->userdata('id_user');
            $wher= array(
                    'id_aproval' => $id_aproval,
                    'user_id_user' => $id_user
                );
            $data= array(
                    'persetujuan' => 1
                );
            $this->M_aprove->aprove($wher,$data);
    }
    public function eee(){
        echo "string";
    }
    public function agree(){
        
        $id = $_GET['id'];
        $decrypt_id = $this->encrypt_decrypt('decrypt',$id);
        $data=array(
                'persetujuan'       => 1,
                'updated'           => date('Y-m-d H:i:s')
            );
        $x= $this->M_aprove->agree_byid(array('id_aproval' => $decrypt_id),$data);
        if ($x){
           redirect('pendonor/Aprove'); 
       }else{
         echo "id_aproval salah : ".$decrypt_id;
       }
        

      //   $idbroad = $_GET['idbroad'];
      // //  $idrs = $_GET['idrs'];
      //   $sien = $_GET['sien'];
      //   $idsien = $_GET['idsien'];
      //  $decrypt_id = $this->encrypt_decrypt('decrypt',$id);
      // // echo 'id='.$id.'id broad='.$idbroad.'sien='.$sien.'decrypt='.$decrypt_id.'idsien'.$idsien;

      //           $data = $this->User_model->get_user( array('id_user' => $decrypt_id ));
      //           // print_r($data);
      //           // die();
      //           if ($data->num_rows() == 1 ) {
      //               foreach ($data->result() as $value  ) {
      //                   $gdarah = $this->Pendonor_model->get_Gdarah($value->id_user);
      //                   $datax= array(
      //                       'persetujuan'    => '0', 
      //                       'nama_pendonor'  => $value->username,
      //                       'golongan_darah' => $gdarah,
      //                       'verify'         => 0,
      //                       'user_id_user' => $value->id_user,
      //                       'broadcast_id_broadcast' => $idbroad,  //'user_rumahsakit_id_rumahsakit' => $idrs,
      //                       'pasien_id_pasien' =>  $idsien,
      //                       'created' => date('Y-m-d H:i:s'),
      //                       'updated' => date('Y-m-d H:i:s')
      //                       );
      //                   $this->M_aprove->insertaprove($datax);
      //                   redirect('pendonor/Aprove');
      //               }
      //           }else{
      //               print_r('id user pendonor salah');
      //           }
    }
    public function cancel(){
           redirect('DashbroadPO');
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
    function cobaget(){
        $id=$_GET['id_pasien'];
        echo $id;
    }

}