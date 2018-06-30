
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardPo extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_1/Pasien_model');
        $this->load->model('M_1/M_aprove');
        $this->load->model('M_1/Pendonor_model');
        $this->load->model('M_1/Pesan_model');
        if($this->session->userdata('level') !== "1"){
            redirect('login');
        }

    }
    public function index($x= 'content')
    {
        if ($x === 'content') {
            $data['count'] = $this->M_aprove->count_all();
            $data['foto']  = $this->Pendonor_model->get_Foto();
            $data['pasien'] = $this->Pasien_model->cek_pasiendanrs();

            $datax['a']=$this->Pesan_model->get_pesanA();
            $datax['b']=$this->Pesan_model->get_pesanB();
            $datax['o']=$this->Pesan_model->get_pesanO();
            $datax['ab']=$this->Pesan_model->get_pesanAB();
            $this->load->view('home/header');
            $this->load->view('user/pendonor/menu_pendonor',$data);
            $this->load->view('home/'.$x,$datax);
            $this->load->view('home/footer');
        }
        else {
            echo 'salah';
        }

    }
  
    public function hitungaprove(){
       
        $this->M_aprove->count_all();
    }
    public function get_pasiendanrs(){
        
        $this->Pasien_model->cek_pasiendanrs();
        
    }
    public function profile($x= 'myprofile')
    {
        if ($x === 'myprofile') {
            $this->load->model('Mymodel');

            $query = $this->Mymodel->get_user();
            $data2['count'] = $this->M_aprove->count_all();
            $data2['foto']  = $this->Pendonor_model->get_Foto();
            $data2['pasien'] = $this->Pasien_model->cek_pasiendanrs();
            $data['pendonor'] = $query;
            

            $this->load->view('home/header');
            $this->load->view('user/pendonor/menu_pendonor',$data2);
            $this->load->view('user/pendonor/'.$x,$data);
            $this->load->view('home/footer');
        }
        else {
            echo 'salah';
        }

    }

    public function ubah($x= 'ubahprofile')
    {
        $this->load->model('Mymodel');
        $this->load->model('M_1/User_model');
        $query = $this->Mymodel->get_user();
         $query2= $this->User_model->getById($this->session->userdata('id_user'));
         $data['user'] = $query2;
        $data['pendonor'] = $query;

        if ($x === 'ubahprofile') {
            $data2['count'] = $this->M_aprove->count_all();
            $data2['foto']  = $this->Pendonor_model->get_Foto();
            $data2['pasien'] = $this->Pasien_model->cek_pasiendanrs();
            $this->load->view('home/header');
            $this->load->view('user/pendonor/menu_pendonor',$data2);
            $this->load->view('user/pendonor/'.$x,$data);
            $this->load->view('home/footer');
        }
        else {
            echo 'salah';
        }
        
    }

    public function update_pendonor(){
       // $this->load->model('Pendonor_model');
        $this->load->model('Mymodel');

         $this->load->model('M_1/User_model');

        $nama = $this->input->post('nama');
        $username =$this->input->post('username');
        $jk =$this->input->post('gender');
        $email =$this->input->post('email');
        $kota =$this->input->post('origin');
        $telepon =$this->input->post('phone');
        $umur =$this->input->post('umur');
        $provinsi =$this->input->post('propinsi');
        $kota =$this->input->post('origin');
        
        $gambar=$_FILES['image']['name'];

        if ($gambar='') {}else{
            $config['upload_path']='./assets/images/profil';
            $config['allowed_types']='jpg|gif|png';

            $this->load->library('upload',$config);
            $this->upload->do_upload('image');
         
                $gambar=$this->upload->data('file_name');
            

        $data = array(
            
            // 'username' => $username,
            // 'kota' => $kota,
            'foto'                      => $gambar,
            'telepon'                   => $telepon,
            'umur'                      => $umur,
            'jenis_kelamin'             => $jk,
            'id_kota'              => $kota,
            'id_provinsi'      => $provinsi,
            'user_id_user'              => $this->session->userdata('id_user'),
            'updated'                   => date('Y-m-d H:i:s')
         );

        $data2= array(
                'nama' => $nama
            );

        $data1 = array(
            'username' => $username,
         );
        $this->User_model->update_nama($data2);
        $this->Pendonor_model->update_pendonor($data);
       // $this->Mymodel->update_user($data1);
       
        redirect('Pendonor/DashboardPo');
         echo "<script>  alert('berhasil'); </script>";
        }
    }

    public function update_password(){
        $this->load->model('Pendonor_model');
        $this->load->model('Mymodel');


        $password =$this->input->post('password');
        $password1 = md5($password);

        $data = array(
            'password' => $password1
         );



        
        $this->Mymodel->update_password($data);

        redirect('Pendonor/DashboardPo/ubah');
   
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('welcome');
    }


}


