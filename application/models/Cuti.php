<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Model
{
	//fungsi cek session
    function tampil_data(){
		return $this->db->get('cuti');
	}
	function tampil_pejabat(){
		return $this->db->get('tb_pejabat');
	}
	function tampil_cuti(){
		// return $this->db->get('tbl_cuti');
		$this->db->select ( '*' ); 
        $this->db->from ( 'tbl_cuti' );
        $this->db->join ( 'cuti', 'cuti.id = tbl_cuti.id_cuti' , 'left' );
		$cuti = $this->db->get ();
		log_message('debug',print_r($cuti,TRUE));
		return $cuti->result ();
    }
    
    // function tambah() {
    //     $id_karyawan = $this->input->post('id_karyawan');
    //     $id_cuti  = $this->input->post('id_cuti');
    //     $lama_cuti = $this->input->post('lama_cuti');
	// 	$detail = $this->input->post('detail');
	// 	// $tanggal = $this->input->post('tanggal');
    //     $id_atasan = $this->input->post('id_atasan');
    //     $data = array (
    //         'id_karyawan' => $id_karyawan,
    //         'id_cuti'  => $id_cuti,
    //         'lama_cuti'=> $lama_cuti,
	// 		'detail' => $detail,
	// 		// 'tanggal'=> $tanggal,
    //         'id_atasan' => $id_atasan,
    //     );  
    //     $this->db->insert('tbl_cuti',$data);
	// }
	
	function tambah(){
        $id_karyawan = $this->input->post('id_karyawan');
        $id_cuti = $this->input->post('id_cuti');
		$lama_cuti = $this->input->post('lama_cuti');
		$detail = $this->input->post('detail');
        $id_atasan = $this->input->post('id_atasan');
        $data = array(
                'id_karyawan'=>$id_karyawan,
                'id_cuti'=>$id_cuti,
				'lama_cuti'=>$lama_cuti,
				'detail'=>$detail,
                'id_atasan'=>$id_atasan,
                );
        $this->db->insert('tbl_cuti',$data);
    }
	
}