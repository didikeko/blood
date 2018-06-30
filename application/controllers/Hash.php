<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hash extends CI_Controller {
	function __construct() {
        parent::__construct();
        // if (!($this->session->userdata('level') === '0')) {
        //     if (!$this->session->userdata('username')){
        //         redirect('login');
        //     }
        //     redirect('login');
        // }
      //  $this->load->model('Pesan');
      $this->load->database();
    }
	public function index($x="formhash")
	{

	 	$this->load->view('vhash/'.$x);

	}
  public function hashmac($x="hashmac")
	{

	 	$this->load->view('vhash/'.$x);

	}
  public function hashmd($x="hashmd")
	{

	 	$this->load->view('vhash/'.$x);

	}


  public function hash_md(){
      $pesan=$this->input->post('pass');
      $hashmd = md5($pesan);
      $data['textnya'] = $this->input->post('pass');
      $data['hashmd'] = $hashmd;
      $this->load->view('vhash/hasilhash2',$data);
  }
  public function hash_mac(){
       $message=$this->input->post('pass');
       $key = $this->input->post('key');
       $hash = hash_hmac('sha256', $message, $key);
       $data['key'] = $key;
       $data['textnya'] = $this->input->post('pass');
       $data['hashmac'] = $hash;
       $this->load->view('vhash/hasilhash',$data);


  }
  // function message(){
  //   $nama=$this->input->post('nama');
  //   $golongan_darah = $this->input->post('blood');
  //   $id_kota = 1;
  //   //$this->Pendonor->getData($golongan_darah,$id_kota);
  //   $data = array(
  //      'nama' => $nama,
  //      'golongan_darah' => $golongan_darah,
  //      'sakit' => $this->input->post('sakit'),
  //      'umur' => $this->input->post('umur'),
  //      'jenis_kelamin' => $this->input->post('gender'),
  //      'user_rumahsakit_id_rumahsakit' => 1     #hanya sebagai percobaan
  //    );
  //  }
}
