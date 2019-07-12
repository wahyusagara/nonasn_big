<?php 
 
class Izin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->library('session');		
		$this->load->model('Cuti');
        $this->load->helper('url');
	}
 
	function index(){
		
		$data['user'] = $this->Cuti->tampil_data()->result();
		// print $data;
		// die();
		$this->load->view("part/nav");
		$this->load->view("izin", $data);			
		$this->load->view("part/footer");
	}

	// function tambah(){
	// 	$this->load->view('v_input');
	// }
 
	function tambah_aksi(){
		$jenis_cuti = $this->input->post('jenis_cuti');
		$tanggal = $this->input->post('tanggal');
		$lama = $this->input->post('lama');
		$detail = $this->input->post('detail');
		$id_karyawan = $this->input->post('id_karyawan');
		$id_atasan = $this->input->post('id_atasan');
 
		$data = array(
			'id_cuti' => $jenis_cuti,
			'tanggal' => $tanggal,
			'lama_cuti' => $lama,
			'detail' => $detail,
			'id_karyawan' => $id_karyawan,
			'id_atasan' => $id_atasan,
			);
		$this->Cuti->input_data($data,'tbl_cuti');
		redirect('Izin/index');
	}
}

?>

