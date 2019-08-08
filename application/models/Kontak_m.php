<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_m extends CI_Model
{
	public function set_file($path,$post){ 
		$upload_data = $this->upload->data(); 
  		$file_name =   $upload_data['file_name'];
		$data = array( 
			'id_pegawai' => $this->input->post('id_pegawai'), 
			'topik' => $this->input->post('topik'), 
			'deskripsi' => $this->input->post('deskripsi'), 
			'path' =>$file_name
		); 
	
		return $this->db->insert('tbl_pertanyaan',$data); 
	}
	
}