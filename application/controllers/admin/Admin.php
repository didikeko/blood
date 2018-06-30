<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
        parent::__construct();
                $this->load->library('session');
                if($this->session->userdata('logged_in') !== 'Sudah Loggin'){
                    redirect('admin/login/index');
                }
       			$this->load->model('M_1/Pesan_model');
				$this->load->model('M_1/Pasien_model');
				$this->load->model('M_1/Rs_model');
				$this->load->model('Broadcast_model');
				$this->load->model('M_1/User_model');
				$this->load->model('M_1/M_aprove');
                $this->load->model('M_1/Pendonor_model');
    }
    public function index($content='dashboard')
    {
           
           
            

            if ($content=='rumah_sakit') {
                 $data2['judul'] = 'Rumah Sakit';
                 $data['rs']=$this->Rs_model->get_rsdanpasien();
                 $this->load->view('admin/header',$data2);
                 $this->load->view('admin/'.$content,$data);
            }else if($content=='pendonor'){
                 $data2['judul'] = 'Pendonor';
                 $data['pendonor']=$this->Pendonor_model->get_allPendonor();
                 $this->load->view('admin/header',$data2);
                 $this->load->view('admin/'.$content,$data);
            }else if($content=='pasien'){
                 $id= $_GET['id'];
                 $data2['judul'] = 'Pasien';
                 $data['pasien']=$this->Pasien_model->get_pasienbyidrs($id);
                 $this->load->view('admin/header',$data2);
                 $this->load->view('admin/'.$content,$data);
            }else{
                $data2['judul'] = 'dashboard';
                 
                $this->load->view('admin/header',$data2);
                 //$this->load->view('admin/dashboard');
            }

            
           
            $this->load->view('admin/footer');
    }

}
