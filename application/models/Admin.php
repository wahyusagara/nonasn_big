<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{
    //fungsi cek session
    
    function logged_id()
    {
        return $this->session->userdata('user_id');
    }

	//fungsi check login
    // function check_login($table, $field1, $field2)
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        // $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function viewpegawai()
    {
        // $query = $this->db->select('*')->from('tb_pegawai')->get();
        // return $query->result();
        $this->db->select ( '*' ); 
        $this->db->from ( 'tb_pegawai' );
        $this->db->join ( 'jabatan', 'jabatan.id_jabatan = tb_pegawai.jabatan' , 'left' );
        $this->db->join ( 'unit_kerja_es_2 es2', 'es2.id_unit_kerja_es_2 = tb_pegawai.id_unit_kerja' , 'left' );
        $this->db->join ( 'unit_kerja_es_1 es1', 'es1.id_unit_kerja_es_1 = es2.id_unit_kerja_es_2' , 'left' );
        $this->db->order_by("id_jabatan", "asc");
        $query = $this->db->get ();
        log_message('debug',print_r($query,TRUE));
        return $query->result ();
        
    }

    function show_peg_id($data){
        $sess = $this->session->userdata('user_id');
        // print $sess;
        // die();
		$this->db->select('*');
		$this->db->from('tb_pegawai');
		$this->db->where('id_data_pegawai', $sess);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

    function update_pegawai($id,$data){
        $sess = $this->session->userdata('user_id');
        // $this->db->where('absen_id', $id);
        $this->db->where('id_data_pegawai',  $sess);
        $this->db->update('tb_pegawai', $data);
    }
}