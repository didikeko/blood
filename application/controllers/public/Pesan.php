<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('M_1/Pesan_model');
       // if($this->session->userdata('level') == "1"){
       //      redirect('Pendonor/DashboardPo');
       //  }else if($this->session->userdata('level') == "2"){
       //       redirect('Partner/Dashboard');
       //  }
    }
	function pesan_public(){
		$data['a']=$this->Pesan_model->get_pesanA();
		$data['b']=$this->Pesan_model->get_pesanB();
		$data['c']=$this->Pesan_model->get_pesanC();
		$data['o']=$this->Pesan_model->get_pesanO();
		$data['ab']=$this->Pesan_model->get_pesanAB();
		$data['all']=$this->Pesan_model->get_pesanALL();

		
	}
}
