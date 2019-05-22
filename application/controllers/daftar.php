<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
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
		$data['query'] = $this->admin->viewpegawai();
		$this->load->view("part/nav");
		$this->load->view("absen", $data);			
		$this->load->view("part/footer");
	}

}
