<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Model
{
	//fungsi cek session
    function tampil_data(){
		return $this->db->get('cuti');
	}
	function tampil_pejabat(){
		$this->db->where('eselon', 'II');
		return $this->db->get('pejabat');
		
	}
	function tampil_cuti(){
		$sess = $this->session->userdata('user_id');
		// return $this->db->get('tbl_cuti');
		$this->db->select ( '*' ); 
		$this->db->from ( 'tbl_cuti' );
		$this->db->where('status', '0');
		$this->db->where('id_karyawan', $sess);
		$this->db->join ( 'cuti', 'cuti.id = tbl_cuti.id_cuti' , 'left' );
		$this->db->order_by("tanggal", "desc");
		$cuti = $this->db->get ();
		log_message('debug',print_r($cuti,TRUE));
		return $cuti->result ();
    }
	
	function tampil_izin(){
		$sess = $this->session->userdata('user_id');
		// return $this->db->get('tbl_cuti');
		$this->db->select ( '*' ); 
		$this->db->from ( 'tbl_izin' );
		$this->db->where('status', '0');
		$this->db->where('id_karyawan', $sess);
		// $this->db->join ( 'cuti', 'cuti.id = tbl_cuti.id_cuti' , 'left' );
		$this->db->order_by("tanggal", "desc");
		$izin_psw = $this->db->get ();
		log_message('debug',print_r($izin_psw,TRUE));
		return $izin_psw->result ();
	}
	function hitung_cuti(){
		$sess = $this->session->userdata('user_id');
		$query = $this->db->select_sum('lama_cuti', 'Amount');
		$query = $this->db->where('id_karyawan', $sess);
		$query = $this->db->get('tbl_cuti');
		$sisa_cuti = $query->result();
		
		return $sisa_cuti[0]->Amount;
	}

	function del_izin($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
	
	public function set_file($path,$post){ 
		$upload_data = $this->upload->data(); 
  		$file_name =   $upload_data['file_name'];
		$data = array( 
			// 'id_karyawan' => $this->input->post('id_karyawan'),
			// 'id_izin' => $this->input->post('id_izin'),
			// 'tanggal' => $this->input->post('tanggal'),
			// 'jam_awal' => $this->input->post('jam_awal'),
			// 'jam_akhir' => $this->input->post('jam_akhir'),
			// 'id_atasan' => $this->input->post('id_atasan'),
			// 'detail' => $this->input->post('detail'),
			'id_karyawan' => $this->input->post('id_karyawan'), 
			'id_izin' => $this->input->post('id_izin'), 
			'tanggal' => $this->input->post('tanggal'), 
			'jam_awal' => $this->input->post('jam_awal'), 
			'jam_akhir' => $this->input->post('jam_akhir'), 
			'id_atasan' => $this->input->post('id_atasan'), 
			'detail' => $this->input->post('detail'), 
			// 'path'=>$path ,
			'path' =>$file_name
		); 
	
		return $this->db->insert('tbl_izin',$data); 
	}
	
}