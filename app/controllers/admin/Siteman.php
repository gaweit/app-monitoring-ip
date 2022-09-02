<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siteman extends CI_Controller {

	function index()
	{
		
		if (isset($_POST['submit'])) {
			$username = $this->input->post('a');
			$password = md5($this->input->post('b'));
			$cek = $this->model_app->cek_login($username, $password,'t_users');
			$row = $cek->row_array();
			$total = $cek->num_rows();
			if ($total > 0) {
				$array = array(
					'email'   => $row['email'],
					'level'   => $row['id_level'],
					'id' 	  => $row['id_users'],
					'kode' 	  => $row['kode_user'],
					'nama' 	  => $row['nama'],
					'nopeg'   => $row['nopeg'],
					'foto' 	  => $row['foto']
				);
				
				$this->session->set_userdata( $array );
				logAct($this->session->userdata('id'),'Login',$this->session->userdata('nama'));
				redirect('siteman/home');
			}else{
				$data['title'] = 'Username atau Password salah!';
				$this->load->view('backend/login',$data);
			}
		}else{
			if ($this->session->userdata('level')!='') {
				 redirect('siteman/home','refresh');
			}else{
				$this->load->view('backend/login');
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('siteman');
	}

	function home()
	{
		cek_session_user();
		$data['title'] = "Dashboard";
		$data['serv'] = $this->model_app->view('t_blok')->result_array();
		$this->template->load('layout/template','backend/dashboard',$data);
	}

	function log()
	{
		cek_session_user();
		$data['title'] = "Log System";
		$this->template->load('layout/template','backend/mod_log/view',$data);
	}

	function add_logo()
	{
		cek_session_user();
		$level = $this->session->userdata('level');
		cek_session_akses('siteman/identitaswebsite',$level);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/';
			$config['allowed_types'] = 'png|jpg|jpeg|gif';
			$config['max_size']  = '20000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('logo');
			$hasil = $this->upload->data();
			$data = array('logo'=>$hasil['file_name']);
			$where = array('id_identitas'=>1);
			$q = $this->model_app->update('t_identitas', $data, $where);

			if ($q) {
				redirect('siteman/identitaswebsite/berhasil','refresh');
			}else{
				redirect('siteman/identitaswebsite/gagal','refresh');

			}
			
		}
	}

	function identitaswebsite()
	{
		cek_session_user();
		$level = $this->session->userdata('level');
		cek_session_akses('siteman/identitaswebsite',$level);
		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/';
			$config['allowed_types'] = 'gif|jpg|png|ico|jpeg';
			$config['max_size']  = '1000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('g');
			$hasil = $this->upload->data();
			if ($hasil['file_name']=='') {
				$data = array(
								'nama_website'=>$this->db->escape_str($this->input->post('a')),
								'email'=>$this->db->escape_str($this->input->post('b')),
								'key'=>$this->db->escape_str($this->input->post('key')),
								'url'=>$this->db->escape_str($this->input->post('c')),
								'no_telp'=>$this->db->escape_str($this->input->post('d')),
								'meta_deskripsi'=>$this->db->escape_str($this->input->post('e')),
								'meta_keyword'=>$this->db->escape_str($this->input->post('f')),
								'maps'=>$this->db->escape_str($this->input->post('h'))
							  ); 
			}else{
				$data = array(
								'nama_website'=>$this->db->escape_str($this->input->post('a')),
								'email'=>$this->db->escape_str($this->input->post('b')),
								'key'=>$this->db->escape_str($this->input->post('key')),
								'url'=>$this->db->escape_str($this->input->post('c')),
								'no_telp'=>$this->db->escape_str($this->input->post('d')),
								'meta_deskripsi'=>$this->db->escape_str($this->input->post('e')),
								'meta_keyword'=>$this->db->escape_str($this->input->post('f')),
								'favicon'=>$hasil['file_name'],
								'maps'=>$this->db->escape_str($this->input->post('h'))
							  );
			}
			$where = array('id_identitas'=>$this->input->post('id'));
			$q = $this->model_app->update('t_identitas', $data, $where);
			if ($q) {
				redirect('siteman/identitaswebsite/berhasil','refresh');
			}else{
				redirect('siteman/identitaswebsite/gagal','refresh');
			}

		}else{
			$data = array(
							'title'=>'Setting Identitas',
							'row'=>$this->model_app->edit('t_identitas',array('id_identitas'=>1))->row_array()
						);
			$this->template->load('layout/template','backend/mod_master_identitas/identitas',$data);
		}
	}


	function download($file)
	{
		$this->load->helper('download');
		force_download('assets/uploads/'.$file , NULL);
	}


	function icon()
	{
		$data['title'] = 'Dokumentasi Icon';
		$this->template->load('layout/template','backend/dokumentasi',$data);
	}

	function _create_thumbs($file_name){
        // Image resizing config
        $config = array(
            // Image Large
            array(
                'image_library' => 'GD2',
                'source_image'  => 'assets/uploads/images/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 700,
                'height'        => 467,
                'new_image'     => 'assets/thumbnail/large/'.$file_name
                ),
            // image Medium
            array(
                'image_library' => 'GD2',
                'source_image'  => 'assets/uploads/images/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 600,
                'height'        => 400,
                'new_image'     => 'assets/thumbnail/medium/'.$file_name
                ),
            // Image Small
            array(
                'image_library' => 'GD2',
                'source_image'  => 'assets/uploads/images/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 100,
                'height'        => 67,
                'new_image'     => 'assets/thumbnail/small/'.$file_name
            )
        );
 
        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }
    }

    function register()
    {
    	if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/uploads/users';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000'; //Kb
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			$hasil = $this->upload->data();

			$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
	        $config['cacheable']    = true; //boolean, the default is true
	        $config['cachedir']     = 'assets/'; //string, the default is application/cache/
	        $config['errorlog']     = 'assets/'; //string, the default is application/logs/
	        $config['imagedir']     = 'assets/uploads/qrusers/'; //direktori penyimpanan qr code
	        $config['quality']      = true; //boolean, the default is true
	        $config['size']         = '5000'; //interger, the default is 1024
	        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
	        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
	        $this->ciqrcode->initialize($config);
	 
	        $image_name = md5($this->input->post('nopeg')).'.png'; //buat name dari qr code sesuai dengan nim
	 
	        $params['data'] = base_url().'siteman/qr_login_verify/'.$this->input->post('nopeg'); //data yang akan di jadikan QR CODE
	        $params['level'] = 'H'; //H=High
	        $params['size'] = 10;
	        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	        $this->ciqrcode->generate($params);

			if ($hasil['file_name']=='') {
				$data = array(
						'nopeg' => $this->db->escape_str($this->input->post('nopeg')),
						'nama' => $this->db->escape_str($this->input->post('nama')),
						'email' => $this->db->escape_str($this->input->post('email')),
						'password' => md5($this->input->post('password')),
						'nohp' => $this->db->escape_str($this->input->post('nohp')),
						'alamat' => $this->db->escape_str($this->input->post('alamat')),
						'foto' => 'no-image.png',
						'qrcode' => $image_name,
						'level'=> $this->db->escape_str($this->input->post('level')),
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
						'qrcode' => $image_name,
						'level'=> $this->db->escape_str($this->input->post('level')),
						'blokir'=>$this->db->escape_str($this->input->post('blokir'))
					);
			}

			$q = $this->model_app->insert('t_users',$data);
			if ($q) {
				$this->session->set_flashdata('success', 'Data berhasil diproses!');
				logAct($this->session->userdata('id'),'Tambah users',$this->input->post('nama'));
				redirect('users?level='.$this->input->post('level'),'refresh');
			}else{
				$this->session->set_flashdata('error', 'Data gagal diproses!');
				redirect('users?level='.$this->input->post('level'),'refresh');
			}
		}else{
			$data['title'] = 'Tambah Data Users';
			$data['level'] = $this->model_app->view_where('t_user_level',array('option'=>'backend','aktif'=>'Y'))->result_array();
			$this->template->load('layout/template','backend/mod_master_users/add',$data);
		}
    }


	


	
}

/* End of file Siteman.php */
/* Location: ./application/controllers/Siteman.php */