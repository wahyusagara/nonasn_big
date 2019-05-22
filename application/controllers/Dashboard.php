<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
    }

	public function index()
	{
		if($this->admin->logged_id())
		{
			// $query = $this->db->select('*')->from('tb_pegawai')->get();
    		// return $query->result();
			// $this->load->model('bidding_model');
			$data['query'] = $this->admin->viewpegawai();  
			$this->load->view("part/nav");
			$this->load->view("dashboard", $data);			
			$this->load->view("part/footer");
		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");
		}
	}

	public function list_pegawai()
	{
		$data['query'] = $this->admin->viewpegawai();
		$this->load->view("part/nav");
		$this->load->view("dashboard2", $data);			
		$this->load->view("part/footer");
	}
	
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}
