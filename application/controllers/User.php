<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
  		$this->load->model('user_model');
  	}

	function tryLogin(){
		if ($this->input->post()){
			$username = $this->input->post('username');
			$password = sha1($this->input->post('password'));
			$checkUserPass = $this->user_model->login($username, $password);

			// If successfully for signin
			if($checkUserPass == '1'){
	          	$this->session->set_userdata('user', $username);	
			}

			echo $checkUserPass; exit;
		}
	}

	function tryLogout(){
		if ($this->session->userdata('user')){
			$this->session->unset_userdata('user');
			redirect(BASE_URL());
		} else {
			show_404();
		}
	}

	function getRegencyByProvince(){
		$province_id = $this->input->post('province_id', TRUE);
		
		if ($province_id == ''){
			echo '<option value="">Waiting province...</option>';
			exit;
		} 
		$this->db->from("m_regences");
		$this->db->where('province_id', $province_id);
		$this->db->order_by("name", "asc");
		$resGet = $this->db->get();

		foreach ($resGet->result() as $row)
		{
		    echo '<option value="'.$row->id.'">'.$row->name.'</option>';
		}
	}

	function addEmployee(){
		error_reporting(E_ALL & ~E_NOTICE);

		// Check ID_Employee by system
		$checkCode = $this->user_model->checkIdEmployee();
		$code = $checkCode;

		if ($code === null){
			$code = 'EMP'.date('y').'0000001';
		} else {
			$cleanMetadata = substr($code, 5);
			$length = strlen($cleanMetadata+1);

			if ($length == 1){
				$code = 'EMP'.date('y').'000000'.($cleanMetadata+1);
			} elseif ($length == 2){
				$code = 'EMP'.date('y').'00000'.($cleanMetadata+1);
			} elseif ($length == 3){
				$code = 'EMP'.date('y').'0000'.($cleanMetadata+1);
			} elseif ($length == 4){
				$code = 'EMP'.date('y').'000'.($cleanMetadata+1);
			} elseif ($length == 5) {
				$code = 'EMP'.date('y').'00'.($cleanMetadata+1);
			} elseif ($length == 6) {
				$code = 'EMP'.date('y').'0'.($cleanMetadata+1);
			} elseif ($length == 7) {
				$code = 'EMP'.date('y').($cleanMetadata+1);
			}
		}

		$data = array(
		        'id' 				=> $code,
		        'fullname' 			=> $this->input->post('iName', TRUE),
		        'number_card' 		=> $this->input->post('iNoCard', TRUE),
		        'nip_current'		=> $this->input->post('iNipCurrent', TRUE),
		        'nip_old'			=> $this->input->post('iNipOld', TRUE),
		        'birthday'			=> $this->input->post('cRegency', TRUE).'#'.$this->input->post('birthday', TRUE)['day'].'.'.$this->input->post('birthday', TRUE)['month'].'.'.$this->input->post('birthday', TRUE)['year'],
		        'gender'			=> $this->input->post('iGender', TRUE),
		        'religion'			=> $this->input->post('iReligion', TRUE),
		        'photo'				=> $code.'.'.end((explode(".", $_FILES["photo"]["name"]))),
		        'address'			=> $this->input->post('iAddress', TRUE),
		        'number_npwp'		=> $this->input->post('iNoNPWP', TRUE),
		        'number_askes'		=> $this->input->post('iNoAskes', TRUE),
		        'location_work' 	=> $this->input->post('iLocationWork', TRUE),
		        'status'			=> $this->input->post('iStatus', TRUE),
		        'date_registered' 	=> date('Y-m-d H:i:s'),
		        'activication'		=> '1' // Active
			    );

		$tryRegister = $this->user_model->registerEmployee($data);
		if ($tryRegister){
			if ($_FILES["photo"]["name"] != ''){
				$config = [
							'file_name' 	=> $code.'.'.end((explode(".", $_FILES["photo"]["name"]))),
							'upload_path' 	=> './assets/images/employees/',
							'allowed_types' => 'jpg|png',
							'max_size'		=> '20000'
						  ];

			  	$this->load->library('upload', $config);
			  	$this->upload->initialize($config);

			  	if(!$this->upload->do_upload('photo')){
					echo $this->upload->display_errors();
				}
			}
			redirect(BASE_URL('account/employees'));
		}
	}

}
