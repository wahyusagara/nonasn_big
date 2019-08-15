<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('xmlrpc');
		$this->load->model('admin');
		
    }
	public function index()
	{
		$this->load->view("part/nav");
		$this->load->view("m/now");			
		$this->load->view("part/footer");
	}
	public function jan()
	{	
		$this->load->view("part/nav");
		$this->load->view("m/jan");			
		$this->load->view("part/footer");
    }
    public function feb()
	{	
		$this->load->view("part/nav");
		$this->load->view("m/feb");			
		$this->load->view("part/footer");
    }
    public function mar()
	{	
		
		$this->load->view("part/nav");
		$this->load->view("m/mar");			
		$this->load->view("part/footer");
    }
    public function apr()
	{	
		$this->load->view("part/nav");
		$this->load->view("m/apr");			
		$this->load->view("part/footer");
    }
    public function mei()
	{	
		$this->load->view("part/nav");
		$this->load->view("m/mei");			
		$this->load->view("part/footer");
    }
    public function jun()
	{	
		$this->load->view("part/nav");
		$this->load->view("m/jun");			
		$this->load->view("part/footer");
    }
    public function jul()
	{	
		$this->load->view("part/nav");
		$this->load->view("m/jul");			
		$this->load->view("part/footer");
    }
    public function agu()
	{	
		$this->load->view("part/nav");
		$this->load->view("m/agu");			
		$this->load->view("part/footer");
    }
    public function sep()
	{	
		$this->load->view("part/nav");
		$this->load->view("m/sep");			
		$this->load->view("part/footer");
    }
    public function okt()
	{	
		$this->load->view("part/nav");
		$this->load->view("m/okt");			
		$this->load->view("part/footer");
    }
    public function nov()
	{	
		$this->load->view("part/nav");
		$this->load->view("m/nov");			
		$this->load->view("part/footer");
    }
    public function des()
	{	
		$this->load->view("part/nav");
		$this->load->view("m/des");			
		$this->load->view("part/footer");
	}

}
