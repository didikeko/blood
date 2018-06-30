<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Api_provinsi extends REST_Controller {

    public function __construct() {
        parent::__construct();

        //load user model
        $this->load->model('Pendonor_model');
    }

    public function user_get($id = 0) {
        $id_prov= $GET['id'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: e01523bc558bbc1262bdfa71ae84af51"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
            $x= $data['rajaongkir']['results'][$id_prov]['province'];

            $array['name'] = "$x";
            if(!empty($array['name'])){
            $this->response($array, REST_Controller::HTTP_OK);
                }else{
                    $this->response([
                        'status' => FALSE,
                        'message' => 'No pendonor were found.'
                    ], REST_Controller::HTTP_NOT_FOUND);
                }
        }
       
    }

}

?>
