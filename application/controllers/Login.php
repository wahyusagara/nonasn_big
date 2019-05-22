<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('admin');
    }

	public function index()
	{
		
			if($this->admin->logged_id())
			{
				//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
				redirect("dashboard");

			}else{

				//jika session belum terdaftar

				//set form validation
	            $this->form_validation->set_rules('username', 'username', 'required');
	            $this->form_validation->set_rules('password', 'Password', 'required');

	            //set message form validation
	            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
	                <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

	            //cek validasi
				if ($this->form_validation->run() == TRUE) {

				//get data dari FORM
				$email = $this->input->post("username", TRUE);
				$absenid = $this->input->post("password", TRUE);
				$password = MD5($this->input->post('password', TRUE));
				// $pwd = $this->input->post("password",'12345');
				
				// $checking = $this->admin->check_login('tbl_users', array('absenid' => $absenid), array('password'  => $password));
				$checking = $this->admin->check_login('tb_pegawai', array('absenid' => $absenid), array('email'  => $email));
				
	            //jika ditemukan, maka create session
	            if ($checking != FALSE) {
	                foreach ($checking as $apps) {

	                    // $session_data = array(
	                    //     'user_id'   => $apps->id_user,
	                    //     'user_name' => $apps->absenid,
	                    //     'user_pass' => $apps->password,
	                    //     'user_nama' => $apps->nama_user
						// );
						$session_data = array(
	                        'user_id'   => $apps->id_data_pegawai,
	                        'user_name' => $apps->absenid,
							'user_nama' => $apps->nama_pegawai,
							'user_tl' => $apps->tempat_lahir,
							'tgl_reg' => $apps->tgl_registrasii,
	                        'tgl_lahir' => $apps->tgl_lahir,
							'email' => $apps->email,
							'tgl_masuk' => $apps->tgl_masuk,

							'jabatan'   => $apps->jabatan,
	                        'no_ktp' => $apps->no_ktp,
							'agama' => $apps->agama,
							'alamat' => $apps->alamat,
							'jk' => $apps->jenis_kelamin,
	                        'no_hp' => $apps->no_hp,
	                    );
	                    //set session userdata
	                    $this->session->set_userdata($session_data);

	                    redirect('dashboard/');

	                }
	            }else{

	            	$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> absenid atau password salah!</div></div>';
	            	$this->load->view('login', $data);
	            }

	        }else{

	            $this->load->view('login');
	        }

		}

	}
}
