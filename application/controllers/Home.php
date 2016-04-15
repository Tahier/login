<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//validasi jika username atau orang tidak login coba akses halaman ini
		if($this->session->userdata('username') == "" OR $this->session->userdata('username') == NULL){
			redirect(base_url().'login','refresh');
		}
	}

	public function index()
	{
		
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */