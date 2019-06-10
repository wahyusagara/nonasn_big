<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Model
{
	//fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('user_id');
    }

	
}