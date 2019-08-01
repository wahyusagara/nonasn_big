<?php 
 
class Izin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		
		$this->load->library('session');		
		$this->load->model('Cuti');
        $this->load->helper('url');
	}
 
	function index(){
		
		$data['jenis_cuti'] = $this->Cuti->tampil_data()->result();
		$data['pejabat'] = $this->Cuti->tampil_pejabat()->result();
		// $data['cuti'] = $this->Cuti->tampil_cuti()->result();
		$data['cuti'] = $this->Cuti->tampil_cuti();
		// print $data;
		// die();
		$this->load->view("part/nav");
		$this->load->view("izin", $data);			
		$this->load->view("part/footer");
	}

	// function tambah(){
	// 	$this->load->view('v_input');
	// }
 
	// function tambah_aksi(){
	// 	$jenis_cuti = $this->input->post('jenis_cuti');
	// 	$tanggal = $this->input->post('tanggal');
	// 	$lama = $this->input->post('lama');
	// 	$detail = $this->input->post('detail');
	// 	$id_karyawan = $this->input->post('id_karyawan');
	// 	$id_atasan = $this->input->post('id_atasan');
 
	// 	$data = array(
	// 		'id_cuti' => $jenis_cuti,
	// 		'tanggal' => $tanggal,
	// 		'lama_cuti' => $lama,
	// 		'detail' => $detail,
	// 		'id_karyawan' => $id_karyawan,
	// 		// 'id_atasan' => $id_atasan,
	// 		);
	// 	$this->Cuti->input_data($data,'tbl_cuti');
	// 	redirect('Izin/index');
	// }
	
	// function tambahdata() {
    //     if($this->input->post('submit')){
    //         $this->Cuti->tambah();
    //         redirect('izin');
    //     }
	// }
	
	function do_insert(){
        $this->load->helper('form');
		$this->load->library('form_validation');
		$tanggal= date('Y-m-d',strtotime($tanggal));

        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required');
		$this->form_validation->set_rules('id_cuti', 'id_cuti', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('lama_cuti', 'lama_cuti', 'required');
        $this->form_validation->set_rules('id_atasan', 'id_atasan', 'required');
        $this->form_validation->set_rules('detail', 'detail', 'required');

        if ($this->form_validation->run() === FALSE) {
            echo "gagal diinsert";
        } else {
            //check in the array that it is same as column name in table like 'id_karyawan' will be present on the table        
            $datac = array(
                'id_karyawan' => $this->input->post('id_karyawan'),
				'id_cuti' => $this->input->post('id_cuti'),
				'tanggal' => $this->input->post('tanggal'),
                'lama_cuti' => $this->input->post('lama_cuti'),
                'id_atasan' => $this->input->post('id_atasan'),
                'detail' => $this->input->post('detail'),
            );

            $this->db->insert('tbl_cuti', $datac);
            $insert_id = $this->db->insert_id();
            if(!empty($insert_id)){
				// $this->load->view('dashboard');
				redirect('izin');
            }else{
                echo "failed";           
            }

        }
    }

}

?>

