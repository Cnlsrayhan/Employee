<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

 	function login($username, $password) {
 		$this->db->where('username', $username);
 		$checkUsername = $this->db->get('m_users');

 		if ($checkUsername->num_rows() == 0){
 			return '2'; // Username not found
 		} elseif ($checkUsername->num_rows() > 0) {
	 		$this->db->where('username', $username);
	 		$this->db->where('password', $password);
	 		$checkUser = $this->db->get('m_users');

	 		if ($checkUser->num_rows() > 0){
	 			return '1'; // Success
	 		} elseif ($checkUser->num_rows() == 0) {
	 			return '0'; // Wrong username/password
	 		}
 		}
	}

	function checkIdEmployee(){
		return $this->db->query('SELECT max(id) as code FROM m_employees')->row_array()['code'];
	}

	function registerEmployee($data){
		return $this->db->insert('m_employees', $data);
	}
	

}

/* End of file User_Model.php */
/* Location: ./application/models/User_Model.php */