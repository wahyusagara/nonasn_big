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
		$sess = $this->session->userdata('user_name');
		// return $this->db->get('tbl_cuti');
		$this->db->select ( '*' ); 
		$this->db->from ( 'tbl_cuti' );
		$this->db->where('id_karyawan', $sess);
		$this->db->join ( 'cuti', 'cuti.id = tbl_cuti.id_cuti' , 'left' );
		$this->db->order_by("tanggal", "desc");
		$cuti = $this->db->get ();
		log_message('debug',print_r($cuti,TRUE));
		return $cuti->result ();
    }
	
	// function insert() {
	// 	$insert_cuti = array(
	// 	'nama' => $this->input->post('nama'),
	// 	'alamat' => $this->input->post('alamat'),
	// 	'notelp' => $this->input->post('notelp'),
	// 	'email' => $this->input->post('email'),
	// 	'jnskelamin' => $this->input->post('jnskelamin'),
	// 	'agama' => $this->input->post('agama'),
	// 	'tmplahir' => $this->input->post('tmplahir'),
	// 	'tgllahir' => $this->input->post('tgllahir'),
	// 	);
		
	// 	$insert = $this->db->insert('karyawan', $insert_cuti);
	// 	return $insert;
	// }

	
	
}