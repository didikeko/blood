<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {
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
        	// $id = $this->Rs_model->get_idrs($this->session->userdata('id_user'));
        	// $data['aprove']=$this->M_aprove->cek_pasiendanrs($id)->result();
            $id = $this->Rs_model->get_idrs($this->session->userdata('id_user'));
            $data2['aprove']=$this->M_aprove->cek_pasiendanrs($id)->result();
            $data2['jumlah']=$this->M_aprove->cek_pasiendanrs($id)->num_rows();
            $data2['nama']  = $this->Rs_model->get_NamaRS();
            $this->load->view('user/partner/header');
            $this->load->view('user/partner/menu',$data2);
            $this->load->view('partner/v_verify',$data2);
            $this->load->view('home/footer');
        

    }
    function verified(){
    	$id_aproval= $_POST['id_aproval'];
        $id_user = $this->session->userdata('id_user');
            $wher= array(
                    'id_aproval' => $id_aproval
                );
            $data= array(
                    'verify' => 1
                );
            $this->M_aprove->aprove($wher,$data);
    }
    function cancel_verified(){
    	$id_aproval= $_POST['id_aproval'];
        $id_user = $this->session->userdata('id_user');
            $wher= array(
                    'id_aproval' => $id_aproval
                );
            $data= array(
                    'verify' => 0
                );
            $this->M_aprove->aprove($wher,$data);
    }
}
