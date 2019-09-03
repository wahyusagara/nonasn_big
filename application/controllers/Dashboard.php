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
			$data['jml_pegawai'] = $this->admin->viewpegawai();  
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
		$data['jabatan'] = $this->admin->viewjabatan();
		$data['unit'] = $this->admin->viewunit();
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

	function insert_pegawai(){
        $this->load->helper('form');
		$this->load->library('form_validation');
		$d = date("Y-m-d");

        $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'required');
		$this->form_validation->set_rules('absenid', 'absenid', 'required');
		$this->form_validation->set_rules('tgl_registrasi', 'tgl_registrasi', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('tgl_registrasi', 'tgl_registrasi', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$this->form_validation->set_rules('no_ktp', 'no_ktp', 'required');
        $this->form_validation->set_rules('agama', 'agama', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        $this->form_validation->set_rules('id_unit_kerja', 'id_unit_kerja', 'required');
        // $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() === FALSE) {
			// echo "gagal memasukan data, ";
			print_r($this->form_validation->error_array());
        } else {
            //check in the array that it is same as column name in table like 'id_karyawan' will be present on the table        
            $datac = array(
                'nama_pegawai' => $this->input->post('nama_pegawai'),
				'absenid' => $this->input->post('absenid'),
				'tgl_registrasi' => $this->input->post('tgl_registrasi'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
				'email' => $this->input->post('email'),
				'tgl_registrasi' => $this->input->post('tgl_registrasi'),
				'jabatan' => $this->input->post('jabatan'),
				'no_ktp' => $this->input->post('no_ktp'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_hp' => $this->input->post('no_hp'),
				'id_unit_kerja' => $this->input->post('id_unit_kerja'),
				// 'status' => $this->input->post('status'),
            );

            $this->db->insert('tb_pegawai', $datac);
            $insert_id = $this->db->insert_id();
            if(!empty($insert_id)){
				// $this->load->view('dashboard');
				redirect('dashboard/add_user');
            }else{
                echo "failed";           
            }

        }
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
