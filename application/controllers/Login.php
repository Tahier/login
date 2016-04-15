<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('form_validation');
		$this->load->model('login_model');
	}

	function index()
	{
		//rule untuk form bisa dibaca di user guide codeigniter
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'requiredcallback_check_password');

		//jika data yang diinputkan belum sesuai dengan rule yang dibuat
		if ($this->form_validation->run() == FALSE) {
				$this->load->view('load view login disi', $data);
			} 
		else { //jika data yg diinput sudah benar
				redirect(base_url().'home','refresh');
	}


	function check_password(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');//sesuaikan encrypt dengan proses input
		$login 	  = $this->login_model->cek_username($username, $password);// ambil data dari db

		if($login){ //jika return dari database true
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('password', $password);
			//sesuaikan dengan session yg dibutuhkan
			return TRUE;
		}
		else {
			$this->form_validation->set_message('check_password', 'Invalid username or password');
			return FALSE;
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */