<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class V_login extends CI_Controller {

	function __construct() {
		parent::__construct();
	}


	public function index() {
		$this->load->view('home/header');
		$this->load->view('home/menulogin');
		$this->load->view('home/vlogin');
		$this->load->view('home/footer');

	}

	public function activation() {
        $this->load->view('home/header');
		$this->load->view('home/menulogin');
		$this->load->view('home/home');
		$this->load->view('home/footer');

    }

    public function verified() {
        $this->load->view('home/header');
		$this->load->view('home/menulogin');
		$this->load->view('home/verified');
		$this->load->view('home/footer');

    }


}
