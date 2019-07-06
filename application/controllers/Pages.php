<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


	public function view($page = NULL)
	{
		if ($page === NULL){
			// Validation user
			if ($this->session->userdata('user')){
				$page = 'dashboard/index';
			} else {
				$page = 'login';
			}
		} else {
			if ($this->session->userdata('user')){
				$page = 'dashboard/'.$page;
			} else {
				$page = 'login';
			}
		}

		// Checking files by parameter is exists
		// if (!file_exists(APPPATH.'views/pages/'.$page.'.php'))
		// {
		// 	show_404();
		// }

		$data['title'] = ucfirst($page);

		// Scope for passing data
		// Employee_create
		if ($page == 'dashboard/employee_create'){
			$this->db->from("m_provinces");
			$this->db->order_by("name", "asc");
			$data['provinces'] = $this->db->get();
		}
		// echo $page;
		// Employee_index
		if ($page == 'dashboard/employee'){
			$data['employees'] = $query = $this->db->get('m_employees');
		}

		// Scope for passing data
		// Employee_create
		if ($page == 'dashboard/project_create'){
			$this->db->from("m_provinces");
			$this->db->order_by("name", "asc");
			$data['provinces'] = $this->db->get();
		}
		// echo $page;
		// Employee_index
		if ($page == 'dashboard/projects'){
			$query = "SELECT *,
			`projects`.`id` AS `id_project`,
			`m_content`.`id` AS `id_content`,
			`m_content`.`description` AS `description_content`, `projects`.`description` AS `description_produk`
			FROM `projects`
			LEFT JOIN `m_content` ON `m_content`.`produk_id` = `projects`.`id`";
			$data['project'] = $query = $this->db->query($query);
		}

		// Scope for passing data
		// Employee_create
		if ($page == 'dashboard/project_create'){
			$this->db->from("m_provinces");
			$this->db->order_by("name", "asc");
			$data['provinces'] = $this->db->get();
		}
		// echo $page;
		// Employee_index
		if ($page == 'dashboard/research'){
			$data['project'] = $query = $this->db->get('projects');
		}

		// echo $page;
		// Employee_index
		if ($page == 'dashboard/content'){
			$query = "SELECT *,
			`m_content`.`id` AS `id_content`,
			`projects`.`id` AS `id_project`,
			`m_content`.`description` AS `description_content`, `projects`.`description` AS `description_produk`
			FROM `m_content`
			LEFT JOIN `projects` ON `projects`.`id` = `m_content`.`produk_id`";
			$data['content'] = $query = $this->db->query($query);
		}

		// Scope for passing data
		// Employee_create
		if ($page == 'dashboard/content_create'){
			$this->db->from("m_provinces");
			$this->db->order_by("name", "asc");
			$data['provinces'] = $this->db->get();
		}

		// Employee_index
		if ($page == 'dashboard/customer'){
			$query = "SELECT * FROM `m_customer`";
			$data['customer'] = $query = $this->db->query($query);
		}

		// Scope for passing data
		// Employee_create
		if ($page == 'dashboard/customer_create'){
			$this->db->from("m_provinces");
			$this->db->order_by("name", "asc");
			$data['provinces'] = $this->db->get();
		}

		// echo $page;
		// Employee_index
		if ($page == 'dashboard/design'){
			$query = "SELECT *,
			`m_design`.`id` AS `id_design`,
			`m_content`.`id` AS `id_content`,
			`m_design`.`file` AS `file_design`,
			`m_content`.`file` AS `file_content`,
			`m_design`.`kategori` AS `kategori_design`,
			`m_content`.`kategori` AS `kategori_content`,
			`m_design`.`description` AS `description_design`, `m_content`.`description` AS `description_content`
			FROM `m_design`
			LEFT JOIN `m_content` ON `m_content`.`id` = `m_design`.`content_id`";
			$data['content'] = $query = $this->db->query($query);
		}

		// Scope for passing data
		// Employee_create
		if ($page == 'dashboard/design_create'){
			$this->db->from("m_provinces");
			$this->db->order_by("name", "asc");
			$data['provinces'] = $this->db->get();
		}

		$this->load->view('templates/header');
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer');

	}
}
