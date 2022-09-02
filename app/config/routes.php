<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] 			= 'main'; 
$route['siteman']  	 					= 'admin/siteman';
$route['log/indeks']  	 				= 'admin/siteman/log';
$route['siteman/(:any)']  	 			= 'admin/siteman/$1';
$route['siteman/(:any)/(:num)']  	 	= 'admin/siteman/$1/$2';
$route['users/indeks']  	 			= 'admin/users/indeks';
$route['users/(:any)']  	 			= 'admin/users/$1';
$route['users/(:any)/(:num)']  	 		= 'admin/users/$1/$2';

$route['server/indeks']  	 			= 'admin/server/indeks';
$route['server/(:any)']  	 			= 'admin/server/$1';
$route['server/(:any)/(:num)']  	 	= 'admin/server/$1/$2';

$route['device/indeks']  	 			= 'admin/device/indeks';
$route['device/(:any)']  	 			= 'admin/device/$1';
$route['device/(:any)/(:any)']  	    = 'admin/device/$1/$2';

$route['level/indeks']  	 			= 'admin/level/indeks';
$route['level/(:any)']  	 			= 'admin/level/$1';
$route['level/(:any)/(:num)']  	 		= 'admin/level/$1/$2';
$route['role/indeks']  	 				= 'admin/role/indeks';
$route['role/(:any)']  	 				= 'admin/role/$1';
$route['role/(:any)/(:num)']  	 		= 'admin/role/$1/$2';
$route['password']  	 				= 'admin/users/change_password';


$route['404_override'] 					= '';
$route['translate_uri_dashes'] 			= FALSE;
