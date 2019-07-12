<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Model
{
	//fungsi cek session
    function tampil_data(){
		return $this->db->get('cuti');
    }
    
    function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	
}