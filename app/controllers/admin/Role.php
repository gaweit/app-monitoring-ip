<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$lv = $this->session->userdata('level');
		if ($lv=='1') {
			cekAksesUser($lv, uri_string(),true);
		}else{
			cekAksesUser($lv, uri_string());
		}
	}

	function index()
	{
		redirect('/','refresh');
	}

	public function indeks()
	{
		$data['title'] = 'Data menu backend';
		$data['level'] = $this->model_app->view_where('t_level',array('option'=>'backend','aktif'=>'Y'))->result_array();
		$this->template->load('layout/template','backend/mod_role/view',$data);	
	}

}

/* End of file Role.php */
/* Location: .//D/xampp/htdocs/project_integration_monitoring/app/controllers/admin/Role.php */