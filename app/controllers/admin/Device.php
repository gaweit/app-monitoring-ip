<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Device extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$lv = $this->session->userdata('level');
		if ($lv=='1' || $lv=='2' || $lv=='8') {
			cekAksesUser($lv, uri_string(),true);
		}else{
			cekAksesUser($lv, uri_string());
		}
	}

	function index()
	{
		redirect('/','refresh');
	}

	function prompt($prompt_msg){
        echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");

        $answer = "<script type='text/javascript'> document.write(answer); </script>";
        return($answer);
    }

	function rute()
	{
		$lv = $this->session->userdata('level');
		if ($lv=='1' || $lv=='2' || $lv=='8' ) {
			$kode = $this->uri->segment(3);
			$qu = $this->model_app->view_join_wheres('t_client','t_blok','kode_blok',array('kode_klient'=>$kode),'id_client','DESC');
			$rows = $qu->row_array();
			$data['title'] = 'Rute Jaringan : '.$rows['nama_client'];
			$data['row'] = $rows;
			$this->template->load('layout/template','backend/mod_map/view',$data);
			// echo 'ada';
		}else{
			echo "<script>alert('Anda belum memiliki akses, silahkan kembali');</script>";

		}
	// echo 'tes';
	}

	public function indeks()
	{
		$data['title'] = 'List device';
		$data['record'] = $this->model_app->view('t_client')->result_array();
		$this->template->load('layout/template','backend/mod_client/view',$data);	
	}

	public function parent()
	{
		$srv = $this->uri->segment(3);
		$data['title'] = 'Daftar Device Server : '.getServer($srv);
		$data['record'] = $this->model_app->view_where('t_client',array('kode_blok'=>$srv))->result_array();
		$this->template->load('layout/template','backend/mod_client/view',$data);	
	}

	public function tambah_device()
	{
		if (isset($_POST['submit'])) {
			$data = array(
						'kode_klient'    => $this->mylibrary->kdauto('t_client','id_client','CLIENT'),
						'kode_blok'      => $this->input->post('a'),
						'kode_user'      => $this->session->userdata('kode'),
						'ip_client'      => $this->input->post('b'),
						'nama_client'    => $this->input->post('c'),
						'lat_client'     => $this->input->post('d'),
						'long_client'    => $this->input->post('e'),
						// 'rute_client'    => $this->input->post('f')
					);

					$temporary_kodeblok = $this->input->post('a');
					$temporary_ip = $this->input->post('b');
					$temporary_nama = $this->input->post('c');
					$temporary_lat = $this->input->post('d');
					$temporary_long = $this->input->post('e');
					// $temporary_rute = $this->input->post('f');
					// //validating
					$req = [$temporary_kodeblok, $temporary_ip, $temporary_nama, $temporary_lat, $temporary_long];
					// echo $req
					$status = true;
					for($i=0; $i<sizeof($req); $i+=1){
						if($req[$i] == NULL){
							$status = false;
							break;
						}
						else{
							$status = true;
						}
					};
			
			if ($status) {
				$q = $this->model_app->insert('t_client',$data);
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'add new client',$this->input->post('a'));
				redirect('device/parent/'.$this->input->post('a'),'refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('device/parent/'.$this->input->post('a'),'refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Client';
			$data['serv'] = $this->model_app->view('t_blok')->result_array();
			$this->template->load('layout/template','backend/mod_client/add',$data);
		}
	}

	public function ubah_device()
	{
		$lv = $this->session->userdata('level');
		if ($lv=='1' || $lv=='2') {
			$id = $this->uri->segment(3);
			if (isset($_POST['submit'])) {
				$data = array(
							'kode_blok'      => $this->input->post('a'),
							'kode_user'      => $this->session->userdata('kode'),
							'ip_client'      => $this->input->post('b'),
							'nama_client'    => $this->input->post('c'),
							'lat_client'     => $this->input->post('d'),
							'long_client'    => $this->input->post('e'),
							// 'rute_client'    => $this->input->post('f')
						);
				$where = array('kode_klient'=>$this->input->post('kode'));
				$q = $this->model_app->update('t_client',$data,$where);
				if ($q) {
					$this->session->set_flashdata('success', 'Data berhasil diproses!');
					logAct($this->session->userdata('id'),'edit client',$this->input->post('a'));
					redirect('device/parent/'.$this->input->post('a'),'refresh');
				}else{
					$this->session->set_flashdata('error', 'Data gagal diproses!');
					redirect('device/parent/'.$this->input->post('a'),'refresh');
				}
			}else{
				$data['title'] = 'Ubah data client';
				$data['row'] = $this->model_app->edit('t_client',array('id_client'=>$id))->row_array();
				$data['serv'] = $this->model_app->view('t_blok')->result_array();
				$this->template->load('layout/template','backend/mod_client/edit',$data);
			}
		} else {
			echo "<script>alert('Anda belum memiliki akses,  silahkan kembali');</script>";
			redirect('/','refresh');
		}
	}

	function hapus_device()
	{
		$lv = $this->session->userdata('level');
		if ($lv=='1' || $lv=='2') {
			$id = $this->uri->segment(3);
			$data = array('id_client'=>$id);
			$q = $this->model_app->delete('t_client',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				redirect('device/parent/'.$this->uri->segment(4),'refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('device/'.$this->uri->segment(4),'refresh');
			}
			$dt = $this->model_app->view_where('t_client',$data)->row_array();
			logAct($this->session->userdata('id'),'Delete Client',$dt['ip_client']);

		} else {
			echo "<script>alert('Anda belum memiliki akses, silahkan kembali);</script>";
			redirect('/'.$this->uri->segment(4),'refresh');
		}
	}

	

}

/* End of file Client.php */
/* Location: .//D/xampp/htdocs/project_ip_monitoring/app/controllers/admin/Client.php */