<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		
        //load model admin
		$this->load->model('admin');
		$sess = $this->session->userdata('absenid');
		// print $sess;
		// die();
		// $this->load->model('profile');
    }

	public function index()
	{
		if($this->admin->logged_id())
		{
			// $query = $this->db->select('*')->from('tb_pegawai')->get();
    		// return $query->result();
			// $this->load->model('bidding_model');
			// $id = $this->uri->segment(3);
			// $data['single_peg'] = $this->admin->show_peg_id($id);
			
			$data['query'] = $this->admin->viewpegawai();  
			$sess = $this->session->userdata('absenid');
			$id = $this->uri->segment(3);
			// $data['students'] = $this->update_model->show_students();
			$data['single_peg'] = $this->admin->show_peg_id($id);
			$this->load->view("part/nav");
			$this->load->view("profile_page", $data,$sess);			
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

	public function add_user()
	{
		$data['query'] = $this->admin->viewpegawai();
		$this->load->view("part/nav");
		$this->load->view("add_user", $data);			
		$this->load->view("part/footer");
	}

	function show_pegawai_id() {
		$sess = $this->session->userdata('absenid');
		$id = $this->uri->segment(3);
		// $data['students'] = $this->update_model->show_students();
		$data['single_peg'] = $this->admin->show_peg_id($id);
		$this->load->view("part/nav");
		$this->load->view("pegawai", $data,$sess);			
		$this->load->view("part/footer");
	}
	
	function update_peg() {
		$sess = $this->session->userdata('user_id');
		$id= $this->input->post('xid');
		$data = array(
		// 'absen_id' => $this->input->post('xid'),
		'nama_pegawai' => $this->input->post('xnama'),
		'email' => $this->input->post('xemail'),
		'no_hp' => $this->input->post('xtlp'),
		'tempat_lahir' => $this->input->post('xtempatlahir'),
		'tgl_lahir' => $this->input->post('xtgllahir'),
		'agama' => $this->input->post('xagama'),
		'alamat' => $this->input->post('xalamat')
		);
		$this->admin->update_pegawai($id,$data,$sess);
		$this->show_pegawai_id();
	}
	
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}
