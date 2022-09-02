<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

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

	function indeks()
	{
		$data['title'] = 'User Group';
		$data['record']   = $this->model_app->view_where('t_level',['option'=>'backend'])->result_array();
		$this->template->load('layout/template','backend/mod_level/view',$data);
	}

	function tambah_level()
	{
		if (isset($_POST['submit'])) {
			$data = array(
						'nama_level' => $this->input->post('a'),
						'option'	 => $this->input->post('b'),
						'aktif'		 => $this->input->post('c'),
					);
			$q = $this->model_app->insert('t_level',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah user group',$this->input->post('a'));
				redirect('level','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('level','refresh');
			}
		}else{
			$data['title'] = 'Tambah User Group';
			$this->template->load('layout/template','backend/mod_level/add',$data);
		}
	}

	function ubah_level()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'nama_level' => $this->input->post('a'),
						'option'	 => $this->input->post('b'),
						'aktif'		 => $this->input->post('c'),
					);
			$where = array('id_level'=>$this->input->post('id'));
			$q = $this->model_app->update('t_level',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah user group',$this->input->post('a'));
				redirect('level','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('level','refresh');
			}
		}else{
			$data['title'] = 'Ubah User Group';
			$data['row']   = $this->model_app->edit('t_level',array('id_level'=>$id))->row_array();
			$this->template->load('layout/template','backend/mod_level/edit',$data);
		}
	}

	function hapus_level()
	{
		$id = $this->uri->segment(3);
		$data = array('id_level'=>$id);
		$q = $this->model_app->delete('t_level',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('level','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('level','refresh');
		}
		$dt = $this->model_app->view_where('t_level',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus user group',$dt['nama_level']);
	}

}

/* End of file Level.php */
/* Location: .//D/xampp/htdocs/project_integration_monitoring/app/controllers/admin/Level.php */