<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	function index()
	{
		redirect('siteman', 'refresh');
	}
}

/* End of file Siteman.php */
/* Location: ./application/controllers/Siteman.php */