<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	
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
		$data['title'] = 'Data users';
		$data['record'] = $this->model_app->view_ordering('t_users','id_users','DESC');
		$this->template->load('layout/template','backend/mod_users/view',$data);
	}

	function change_password()
	{
		if (isset($_POST['submit'])) {
			$data = array(
						'password' => md5($this->input->post('a'))
					);
			$where = array('id_users'=>$this->session->userdata('id'));
			$q = $this->model_app->update('t_users',$data,$where);
			if ($q) {
				$this->session->sess_destroy();
				redirect('siteman');
			}else{
				$this->session->set_flashdata('error', 'password gagal diubah.');
				redirect('password','refresh');
			}
		}else{
			$data['title'] = 'Ganti Password';
			$this->template->load('layout/template','backend/mod_users/change',$data);
		}
	}

	function tambah_users()
	{
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/users';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();

			if ($hasil['file_name']=='') {
				$data = array(
						'kode_user' => $this->mylibrary->kdauto('t_users','id_users','USR'),
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => 'no-image.png',
						'id_level'=> $this->db->escape_str($this->input->post('level')),
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					); 
			}else{
				$data = array(
						'kode_user' => $this->mylibrary->kdauto('t_users','id_users','USR'),
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => $hasil['file_name'],
						'id_level'=> $this->db->escape_str($this->input->post('level')),
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					);
			}

			$q = $this->model_app->insert('t_users',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah users',$this->input->post('nama'));
				redirect('users/indeks','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('users/indeks','refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Users';
			$data['level'] = $this->model_app->view_where('t_level',array('option'=>'backend','aktif'=>'Y'))->result_array();
			$this->template->load('layout/template','backend/mod_users/add',$data);
		}
		

	}

	function ubah_users()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/users';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();

			if ($hasil['file_name']=='') {
				$data = array(
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'id_level'=> $this->db->escape_str($this->input->post('level')),
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					); 
			}else{
				$data = array(
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => $hasil['file_name'],
						'id_level'=> $this->db->escape_str($this->input->post('level')),
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					);
			}
			$where = array('id_users'=>$this->input->post('id'));
			$q = $this->model_app->update('t_users',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah users',$this->input->post('nama'));
				redirect('users/indeks','refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('users/indeks','refresh');
			}
		}else{
			$data['title'] = 'Ubah Data users';
			$data['row'] = $this->model_app->edit('t_users',array('id_users'=>$id))->row_array();
			$data['userss'] = $this->model_app->view_where_order('t_users',array('blokir'=>'N'),'id_users','DESC');
			$data['level'] = $this->model_app->view_where('t_level',array('option'=>'backend','aktif'=>'Y'))->result_array();
			$this->template->load('layout/template','backend/mod_users/edit',$data);
		}
		

	}

	function hapus_users()
	{
		$id = $this->uri->segment(3);
		$data = array('id_users'=>$id);
		$q = $this->model_app->delete('t_users',$data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('users/indeks','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('users/indeks','refresh');
		}
		$dt = $this->model_app->view_where('t_users',$data)->row_array();
		logAct($this->session->userdata('id'),'Hapus users',$dt['nama']);
	}

	function aktifkan_users()
	{
		$id = $this->uri->segment(3);
		$where = array('id_users'=>$id,'blokir'=>'N');
		$data = array('blokir'=>'Y');
		$q = $this->model_app->update('t_users',$data,$where);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('siteman/home','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('siteman/home','refresh');	
		}
	}

	function nonaktifkan_users()
	{
		$id = $this->uri->segment(3);
		$where = array('id_users'=>$id,'blokir'=>'Y');
		$data = array('blokir'=>'N');
		$q = $this->model_app->update('t_users',$data,$where);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('siteman/home','refresh');
		}else{
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('siteman/home','refresh');
		}
	}


	function profile()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/users';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();
			
			if ($hasil['file_name']=='') {
				$data = array(
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat'))
					); 
			}else{
				$data = array(
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => $hasil['file_name']
					);
			}
			$where = array('id_users'=>$this->input->post('id'));
			$q = $this->model_app->update('t_users',$data,$where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Ubah users',$this->input->post('nama'));
				redirect('users/'.$this->uri->segment(4),'refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('users/'.$this->uri->segment(4),'refresh');
			}
		}else{
			$data['title'] = 'Profile Saya';
			$data['row'] = $this->model_app->edit('t_users',array('nopeg'=>$id))->row_array();
			$data['userss'] = $this->model_app->view_where_order('t_users',array('blokir'=>'N'),'id_users','DESC');
			$this->template->load('layout/template','backend/mod_users/profile',$data);
		}
		

	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */