<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$config['mongo_db']['active_config_group'] = 'default';

$config['mongo_db']['default'] = [
	'settings' => [
		'auth'             => FALSE, // gunakan username password (TRUE jika iya) FALSE jika tidak
		'debug'            => TRUE, // aktifkan error report
		'return_as'        => 'array',
		'auto_reset_query' => TRUE
	],

	'connection_string' => '',

	'connection' => [
		'host'          => 'localhost',
		'port'          => '27017',
		'user_name'     => '',
		'user_password' => '',
		'db_name'       => 'vta_mongo',
		'db_options'    => []
	],

	'driver' => []
];

/* End of file mongo_db.php */
/* Location: ./application/config/mongo_db.php */