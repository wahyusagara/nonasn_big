<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('xmlrpc');
		// $this->load->library('xmlrpcs');
		// 	$this->refcode = $this->session->userdata('refcode');
		// }
        //load model admin
        $this->load->model('admin');
    }
	public function index()
	{
		$data['query'] = $this->admin->viewpegawai();
		$this->load->view("part/nav");
		$this->load->view("dashboard2", $data);			
		$this->load->view("part/footer");
	}
	public function absen()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://10.10.160.189/sinkron/konek.php",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"postman-token: a9eb45ca-e4bf-bc8b-803c-73f276fe4032"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		
		// print $response;
		// die();

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			
			echo "<script>console.log('" . json_encode($response) . "');</script>";
			
		// echo "<pre>";
		// echo $response;
		
		}
		
		
		$this->load->view("part/nav");
		$this->load->view("absen", $response);			
		$this->load->view("part/footer");
	}

}
