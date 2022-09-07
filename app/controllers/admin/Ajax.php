<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

	public function index()
	{
		redirect('siteman/index', 'refresh');
	}

	//===================================================================
	// Ajax manage log
	//===================================================================

	public function getHistory()
	{
		$this->load->model('model_ajax');
		if ($this->input->is_ajax_request()) {
			$datatables  = $_POST;
			$datatables['table']    = 't_histori';
			$datatables['id-table'] = 'id_histori';
			$datatables['col-display'] = array(
				"id_histori",
				"kode_user",
				"kegiatan",
				"data",
				"tgl",
				"jam",
				"browser",
			);
			$this->model_ajax->get_Datatables($datatables);
		}
		return;
	}

	//===================================================================
	// Ajax manage role
	//===================================================================

	function roleSave()
	{
		$data = array(
			'id_level' 	=> $this->input->post('level'),
			'module'   	=> $this->input->post('module'),
			'akses' 	=> $this->input->post('akses001'),
		);
		$q = $this->model_app->insert('t_role', $data);
		if ($q) {
			$id = $this->db->insert_id();
			$dt = $this->model_app->view_where('t_role', array('id_role' => $id))->row_array();
			$json = array(
				'feed' => 1,
				'id_level' 	=> getLevel($dt['id_level']),
				'module'   	=> $dt['module'],
				'akses' 	=> $dt['akses']
			);
			echo json_encode($json);
		} else {
			$json = array('feed' => 0);
			echo json_encode($json);
		}
	}

	function getRoles()
	{
		$json = array();
		$dt = $this->model_app->view('t_role')->result_array();
		foreach ($dt as $key => $j) {
			$json[] = array(
				'id_role' 	=> $j['id_role'],
				'id_level' 	=> getLevel($j['id_level']),
				'module'   	=> $j['module'],
				'akses' 	=> $j['akses']
			);
		}
		echo json_encode($json);
	}

	function updateRoles()
	{
		$id 		= $this->input->post('id');
		$field 		= $this->input->post('field');
		$n 		    = $this->input->post('n');
		if ($n == '0') {
			$up = '1';
			$q = $this->model_app->update('t_role', array($field => $up), array($field => '0', 'id_role' => $id));
		} else {
			$up = '0';
			$q = $this->model_app->update('t_role', array($field => $up), array($field => '1', 'id_role' => $id));
		}
		if ($q) {
			echo 1;
		} else {
			echo 0;
		}
	}


	function deleteRoles()
	{
		$id 		= $this->input->post('id');
		$q = $this->model_app->delete('t_role', array('id_role' => $id));
		if ($q) {
			echo 1;
		} else {
			echo 0;
		}
	}

	//===================================================================
	// Ajax manage role end!!
	//===================================================================

	function pingIp()
	{
		$srv = $this->input->get('srv');
		$record = $this->model_app->view_where('t_client', array('kode_blok' => $srv))->result_array();
		echo $no = 1;
		foreach ($record as $row) {
			echo "<tr>
            <td><center>" . $no . "</center></td>
            <td>" . $row['nama_client'] . "</td>
            <td>" . $row['ip_client'] . "</td>
            <td>";
			$ttl = 128;
			$timeout = 3;
			$host = $row['ip_client'];
			$ping = new \JJG\Ping($host, $ttl, $timeout);
			$latency = $ping->ping();
			if ($latency === false) {
				$this->model_app->update('t_client', array('status_client' => 0), array('kode_klient' => $row['kode_klient']));
				echo '<small class="text-danger"><button class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i></button> Disconnected</small>';
			} else {
				$this->model_app->update('t_client', array('status_client' => 1), array('kode_klient' => $row['kode_klient']));
				echo '<small class="text-success"><button class="btn btn-success btn-sm"><i class="fa fa-power-off"></i></button> Connected</small>';
			}

			echo "</td>
            <td>
                <center>
                    <a href='" . base_url() . "device/rute/$row[kode_klient]' class='badge badge-warning' title='Rute'>
                        <i class=\"fas fa-map\">		Rute</i>
                    </a>
                    <a href='" . base_url() . "device/ubah_device/$row[kode_klient]' class=\"badge badge-success\" title='Edit'>
                        <i class=\"far fa-edit\">		Edit</i>
                    </a>
                    <a href='" . base_url() . "device/hapus_device/$row[kode_klient]' class=\"badge badge-danger\" onClick=\"javascript: return confirm('Anda yakin ingin menghapusnya ?');\" title='Hapus'>
                        <i class=\"far fa-trash-alt\">		Delete</i>
                    </a>
                </center>
            </td>
        </tr>";
			echo $no++;
		};
	}

	function notifDc()
	{
		$record = $this->model_app->view_join_wheres('t_client', 't_blok', 'kode_blok', array('status_client' => 0), 'id_client', 'DESC');
		$cek = $record->num_rows();
		if ($cek > 0) {
			$ntf = "<div class=\"notify\"> <span class=\"heartbit\"></span> <span class=\"point\"></span> </div>";
			$ls = "<div class='message-center'>";
			foreach ($record->result_array() as $k => $v) {
				$ls .= "<a href='" . base_url() . "device/parent/" . $v['kode_blok'] . "'>
						<div class='btn btn-danger btn-circle'><i class='fa fa-power-off'></i></div>
						<div class='mail-contnet'>
						<h5>Client : " . $v['nama_client'] . "</h5> <span class='mail-desc text-danger'>Disconected</br><small class='text-muted'>Server " . $v['nama_blok'] . "</small></span> 
						</div>
						</a>";
			}
			$ls .= "</div>";
			$data['notif'] = $ntf;
			$data['list']  = $ls;
			echo json_encode($data);
		}
	}
}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */