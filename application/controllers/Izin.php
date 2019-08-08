<?php 
 
class Izin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		
		$this->load->library('session');		
		$this->load->model('Cuti');
		$this->load->helper('url');
		$this->load->database();
	}
 
	function index(){
		$sess = $this->session->userdata('user_name');
		$data['jenis_cuti'] = $this->Cuti->tampil_data()->result();
		$data['pejabat'] = $this->Cuti->tampil_pejabat()->result();
		// $data['cuti'] = $this->Cuti->tampil_cuti()->result();
		$data['cuti'] = $this->Cuti->tampil_cuti($sess);
		// print $data;
		// die();
		$this->load->view("part/nav");
		$this->load->view("izin", $data,$sess);			
		$this->load->view("part/footer");
	}

	function psw(){
		$sess = $this->session->userdata('user_name');
		// $data['jenis_cuti'] = $this->Cuti->tampil_data()->result();
		$data['pejabat'] = $this->Cuti->tampil_pejabat()->result();
		$data['izin_psw'] = $this->Cuti->tampil_izin($sess);
		// print $data;
		// die();
		$this->load->view("part/nav");
		$this->load->view("izin_psw", $data,$sess);			
		$this->load->view("part/footer");
	}

	
	
	function do_insert(){
        $this->load->helper('form');
		$this->load->library('form_validation');
		$d = date("Y-m-d");

        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required');
		$this->form_validation->set_rules('id_cuti', 'id_cuti', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('lama_cuti', 'lama_cuti', 'required');
        $this->form_validation->set_rules('id_atasan', 'id_atasan', 'required');
        $this->form_validation->set_rules('detail', 'detail', 'required');

        if ($this->form_validation->run() === FALSE) {
			// echo "gagal memasukan data, ";
			print_r($this->form_validation->error_array());
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

	function del(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
	
		$data = array(
			'status' => $status
		);
	
		$where = array(
			'id' => $id
		);
	
		$this->Cuti->del_izin($where,$data,'tbl_izin');
		redirect('izin/psw');
	}
	// function do_insert_psw(){
	// 	$config['upload_path']          = './uploads/';
	// 	$config['allowed_types']        = 'gif|jpg|png';
	// 	$config['max_size']             = 100;
	// 	$config['max_width']            = 1024;
	// 	$config['max_height']           = 768;

    //     $this->load->library('upload', $config);
    //     $this->load->helper('form');
	// 	$this->load->library('form_validation');
	// 	$d = date("Y-m-d");

    //     $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required');
	// 	$this->form_validation->set_rules('id_izin', 'id_izin', 'required');
	// 	$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
	// 	$this->form_validation->set_rules('jam_awal', 'jam_awal', 'required');
	// 	$this->form_validation->set_rules('jam_akhir', 'jam_akhir', 'required');
    //     $this->form_validation->set_rules('id_atasan', 'id_atasan', 'required');
    //     $this->form_validation->set_rules('detail', 'detail', 'required');

    //     if ($this->form_validation->run() === FALSE) {
	// 		// echo "gagal memasukan data, ";
	// 		print_r($this->form_validation->error_array());
    //     } else {
    //         //check in the array that it is same as column name in table like 'id_karyawan' will be present on the table        
    //         $datac = array(
    //             'id_karyawan' => $this->input->post('id_karyawan'),
	// 			'id_izin' => $this->input->post('id_izin'),
	// 			'tanggal' => $this->input->post('tanggal'),
	// 			'jam_awal' => $this->input->post('jam_awal'),
	// 			'jam_akhir' => $this->input->post('jam_akhir'),
    //             'id_atasan' => $this->input->post('id_atasan'),
    //             'detail' => $this->input->post('detail'),
    //         );

    //         $this->db->insert('tbl_izin', $datac);
    //         $insert_id = $this->db->insert_id();
    //         if(!empty($insert_id)){
	// 			// $this->load->view('dashboard');
	// 			redirect('izin/psw');
    //         }else{
    //             echo "failed";           
    //         }

    //     }
	// }
	

	public function create_psw(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'required');
		$this->form_validation->set_rules('id_izin', 'id_izin', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('jam_awal', 'jam_awal', 'required');
		$this->form_validation->set_rules('jam_akhir', 'jam_akhir', 'required');
        $this->form_validation->set_rules('id_atasan', 'id_atasan', 'required');
        $this->form_validation->set_rules('detail', 'detail', 'required');
		if ($this->form_validation->run() === FALSE){
			$this->load->view("part/nav");
			$this->load->view("izin_psw", $data,$sess);			
			$this->load->view("part/footer");
		}else{
			// Upload the files then pass data to your model
			// $config['upload_path'] = '/uploads/';
			$config['upload_path'] = 'uploads';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('userfile')){
				// If the upload fails
				echo $this->upload->display_errors('<p>', '</p>');
			}else{
				$this->Cuti->set_file($this->upload->data('full_path'),$this->input->post());
				redirect('izin/psw');
			}
		}
	}

}

?>

