<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('xmlrpc');
        $this->load->model('admin');
        $this->load->model('Kontak_m');
    }
	public function index()
	{
		$data['query'] = $this->admin->viewpegawai();
		$this->load->view("part/nav");
		$this->load->view("pertanyaan", $data);			
		$this->load->view("part/footer");
    }
    
    public function create_pertanyaan(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
		$this->form_validation->set_rules('topik', 'topik', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		if ($this->form_validation->run() === FALSE){
			$this->load->view("part/nav");
            $this->load->view("pertanyaan", $data);			
            $this->load->view("part/footer");
		}else{
			$config['upload_path'] = 'uploads/pertanyaan';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('userfile')){
				// If the upload fails
				echo $this->upload->display_errors('<p>', '</p>');
			}else{
				$this->Kontak_m->set_file($this->upload->data('full_path'),$this->input->post());
				redirect('kontak/index');
			}
		}
	}
	

}
