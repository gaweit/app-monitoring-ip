<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Server extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$lv = $this->session->userdata('level');
		if ($lv == '1' || $lv == '2') {
			cekAksesUser($lv, uri_string(), true);
		} else {
			cekAksesUser($lv, uri_string());
		}
	}

	function index()
	{
		redirect('/', 'refresh');
	}

	public function indeks()
	{
		$data['title'] = 'List Server';
		$data['record'] = $this->model_app->view('t_blok')->result_array();
		$this->template->load('layout/template', 'backend/mod_server/view', $data);
	}

	public function tambah_server()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'kode_blok'	   => $this->mylibrary->kdauto('t_blok', 'kode_blok', 'SVR'),
				'kode_user'    => $this->session->userdata('kode'),
				// 'ip_blok'      => str_replace('_', '', $this->input->post('a')),
				'nama_blok'    => $this->input->post('b'),
				'alamat_blok'  => $this->input->post('c'),
				// 'pusat_blok'   => $this->input->post('d'),
				'lat_blok'     => $this->input->post('e'),
				'long_blok'    => $this->input->post('f'),
				'create_at'    => date('Y-m-d H:i:s'),
				'create_by'    => $this->session->userdata('nama'),
			);
			// $temporary_ip = $this->input->post('a');
			$temporary_nama = $this->input->post('b');
			$temporary_alamat = $this->input->post('c');
			$temporary_lat = $this->input->post('e');
			$temporary_long = $this->input->post('f');
			// //validating
			$req = [$temporary_nama, $temporary_alamat, $temporary_lat, $temporary_long];
			// echo $req
			$status = true;
			for ($i = 0; $i < sizeof($req); $i += 1) {
				if ($req[$i] == NULL) {
					$status = false;
					break;
				} else {
					$status = true;
				}
			};
			if ($status) {
				$q = $this->model_app->insert('t_blok', $data);
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'), 'add new server', $this->input->post('a'));
				redirect('server/indeks', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('server/indeks', 'refresh');
			}
		} else {
			$data['title'] = 'Tambah Data Server';
			$this->template->load('layout/template', 'backend/mod_server/add', $data);
		}
	}

	public function ubah_server()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$data = array(
				'kode_user'    => $this->session->userdata('kode'),
				// 'ip_blok'      => str_replace('_', '', $this->input->post('a')),
				'nama_blok'    => $this->input->post('b'),
				'alamat_blok'  => $this->input->post('c'),
				// 'pusat_blok'   => $this->input->post('d'),
				'lat_blok'     => $this->input->post('e'),
				'long_blok'    => $this->input->post('f'),
				'modify_at'    => date('Y-m-d H:i:s'),
				'modify_by'    => $this->session->userdata('nama'),
			);
			$where = array('kode_blok' => $this->input->post('kode'));
			$q = $this->model_app->update('t_blok', $data, $where);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'), 'edit server', $this->input->post('a'));
				redirect('server/indeks', 'refresh');
			} else {
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('server/indeks', 'refresh');
			}
		} else {
			$data['title'] = 'Ubah data server';
			$data['row'] = $this->model_app->edit('t_blok', array('kode_blok' => $id))->row_array();
			$this->template->load('layout/template', 'backend/mod_server/edit', $data);
		}
	}

	function hapus_server()
	{
		$id = $this->uri->segment(3);
		$data = array('kode_blok' => $id);
		$q = $this->model_app->delete('t_blok', $data);
		if ($q) {
			$this->session->set_flashdata('success', 'Data berhasil diproses!');
			redirect('server/indeks', 'refresh');
		} else {
			$this->session->set_flashdata('error', 'Data gagal diproses!');
			redirect('server/indeks', 'refresh');
		}
		$dt = $this->model_app->view_where('t_blok', $data)->row_array();
		logAct($this->session->userdata('id'), 'Hapus Server', $dt['nama']);
	}
}

/* End of file Server.php */
/* Location: .//D/xampp/htdocs/project_ip_monitoring/app/controllers/admin/Server.php */