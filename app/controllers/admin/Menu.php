<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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
		$data['title'] = 'Data menu backend';
		$data['record'] = $this->model_app->view_ordering('t_menu','id_menu','DESC');
		$this->template->load('layout/template','backend/mod_menu/view',$data);
	}

	function tambah_menu()
	{
		if (isset($_POST['submit'])) {
			$data = array(
						'id_parent' => $this->db->escape_str($this->input->post('id_parent')),
						'nama_menu' => $this->db->escape_str($this->input->post('nama_menu')),
						'link' => $this->db->escape_str($this->input->post('link')),
						'icon' => $this->db->escape_str($this->input->post('icon')),
						'aktif' => $this->db->escape_str($this->input->post('aktif')),
						'position' => $this->db->escape_str($this->input->post('position')),
						'urutan' => $this->db->escape_str($this->input->post('urutan')),
						'level_akses' => $this->db->escape_str($this->input->post('level_akses'))

					);
			$q = $this->model_app->insert('t_menu',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah menu',$this->input->post('nama_menu'));
				redirect('menu','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('menu','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data menu';
			$data['menus'] = $this->model_app->view_where_order('t_menu',array('id_parent'=>0,'position'=>'Side','aktif'=>'Ya'),'id_menu','DESC');
			$this->template->load('layout/template','backend/mod_menu/add',$data);
		}
		

	}

	function ubah_menu()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
						'id_parent' => $this->db->escape_str($this->input->post('id_parent')),
						'nama_menu' => $this->db->escape_str($this->input->post('nama_menu')),
						'link' => $this->db->escape_str($this->input->post('link')),
						'icon' => $this->db->escape_str($this->input->post('icon')),
						'aktif' => $this->db->escape_str($this->input->post('aktif')),
						'position' => $this->db->escape_str($this->input->post('position')),
						'urutan' => $this->db->escape_str($this->input->post('urutan')),
						'level_akses' => $this->db->escape_str($this->input->post('level_akses'))
						
					);
			$where = array('id_menu'=>$this->input->post('id'));
			$q = $this->model_app->update('t_menu',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah menu',$this->input->post('nama_menu'));
				redirect('menu','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('menu','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data menu';
			$data['row'] = $this->model_app->edit('t_menu',array('id_menu'=>$id))->row_array();
			$data['menus'] = $this->model_app->view_where_order('t_menu',array('id_parent'=>0,'position'=>'Side','aktif'=>'Ya'),'id_menu','DESC');
			$this->template->load('layout/template','backend/mod_menu/edit',$data);
		}
		

	}

	function hapus_menu()
	{
		$id = $this->uri->segment(3);
		$data = array('id_menu'=>$id);
		$q = $this->model_app->delete('t_menu',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('menu','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('menu','refresh');
		}
		$dt = $this->model_app->view_where('t_menu',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus menu',$dt['nama_menu']);
	}

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */