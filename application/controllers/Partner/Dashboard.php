
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->library('session');
        if($this->session->userdata('level') !== "2"){
            redirect('login');
        }
        $this->load->model('M_1/Rs_model');
        $this->load->model('M_1/M_aprove');
        $this->load->model('M_1/User_model');
        $this->load->model('M_1/Pesan_model');
    }
    public function index($x= 'content')
    {
        if ($x === 'content') {
            $id = $this->Rs_model->get_idrs($this->session->userdata('id_user'));
            $data['nama']  = $this->Rs_model->get_NamaRS();
            $data['aprove']=$this->M_aprove->cek_pasiendanrs($id)->result();
            $data['jumlah']=$this->M_aprove->cek_pasiendanrs($id)->num_rows();

            $datax['a']=$this->Pesan_model->get_pesanA();
            $datax['b']=$this->Pesan_model->get_pesanB();
            $datax['o']=$this->Pesan_model->get_pesanO();
            $datax['ab']=$this->Pesan_model->get_pesanAB();
            $this->load->view('user/partner/header');
            $this->load->view('user/partner/menu',$data);
            $this->load->view('home/'.$x,$datax);
            $this->load->view('home/footer');
        }
        else {
            echo 'salah';
        }

    }


    public function profile($x= 'myprofile')
    {
        if ($x === 'myprofile') {
            $this->load->model('Mymodel');
            $id = $this->Rs_model->get_idrs($this->session->userdata('id_user'));
            $data2['nama']  = $this->Rs_model->get_NamaRS();
            $data2['aprove']=$this->M_aprove->cek_pasiendanrs($id)->result();
            $data2['jumlah']=$this->M_aprove->cek_pasiendanrs($id)->num_rows();

            $query = $this->User_model->getUserByid();
            $data['partner'] = $query;

            $this->load->view('user/partner/header');
            $this->load->view('user/partner/menu',$data2);
            $this->load->view('user/partner/'.$x,$data);
            $this->load->view('home/footer');
        }
        else {
            echo 'salah';
        }

    }

    public function ubah()
    {
        $this->load->model('Mymodel');

      //  $data['rs']      = $this->Rs_model->rsdata($this->session->userdata('id_user'));
        $data['partner'] = $this->User_model->getUserByid();
             $id = $this->Rs_model->get_idrs($this->session->userdata('id_user'));
            $data2['nama']  = $this->Rs_model->get_NamaRS();
            $data2['aprove']=$this->M_aprove->cek_pasiendanrs($id)->result();
            $data2['jumlah']=$this->M_aprove->cek_pasiendanrs($id)->num_rows();


            $this->load->view('user/partner/header');
            $this->load->view('user/partner/menu',$data2);
            $this->load->view('user/partner/ubahprofile',$data);
            $this->load->view('home/footer');


        
    }

    public function update_partner(){
        $this->load->model('Partner_model');
        $this->load->model('Mymodel');


        $nama = $this->input->post('nama');
        $username =$this->input->post('username');
        $kota =$this->input->post('origin');
        $alamat =$this->input->post('alamat');
        $telepon =$this->input->post('phone');
        $propinsi =$this->input->post('propinsi');

         $gambar=$_FILES['image']['name'];

        if ($gambar='') {}else{
            $config['upload_path']='./assets/images/profil';
            $config['allowed_types']='jpg|gif|png';

            $this->load->library('upload',$config);
            // $this->upload->do_upload('image');
            // $gambar=$this->upload->data('file_name');
            if (!$this->upload->do_upload('image')) {
                echo "gagal";
            }else{
                $gambar=$this->upload->data('file_name');
            }

        $data = array(
            'nama'          => $nama,
       
            'foto'          => $gambar,
            'telepon'       => $telepon,
            'alamat'        => $alamat,
            'id_kota'       => $kota,
            'id_provinsi'   => $propinsi,
            'updated'       => date('Y-m-d H:i:s')
         );

        $data1 = array(
            'username' => $username,
            'nama'     => $nama
         );



        $this->Partner_model->update_partner($data);
        $this->Mymodel->update_user($data1);
        echo "Berhasil";
        redirect('Partner/Dashboard');

        

        }
    }

    public function update_password(){
        $this->load->model('Partner_model');
        $this->load->model('Mymodel');


        $password =$this->input->post('password');
        $password1 = md5($password);

        $data = array(
            'password' => $password1
         );



        
        $this->Mymodel->update_password($data);

        redirect('Partner/Dashboard/ubah');
   
    }


    public function logout() {
        $this->session->sess_destroy();
        redirect('welcome');
    }


}


