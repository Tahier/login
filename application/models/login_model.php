<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function cek_username($username, $password){
		$this->db->select('ambil data yang dibuthkan dari tabel');
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$return = $this->db->get('nama tabel');

		if($return->num_rows() > 0){
			return $return;
		}
		else {
			return FALSE;
		}

	}	

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */