<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['home'] = 'c_project/home';
$route['index'] = 'c_project/index';
$route['not_permission'] = 'c_project/not_permission';
$route['rieut'] = 'c_project/rieut';

$route['index_pegawai/(:any)'] = 'c_project/index_pegawai/$1';
$route['index_pegawai'] = 'c_project/index_pegawai';


$route['index_history/(:any)'] = 'c_project/index_history/$1';
$route['index_history'] = 'c_project/index_history';
// $route['edit_users/(:any)'] = 'c_project/edit_users/$1';
$route['index_users'] = 'c_project/index_users';
$route['register'] = 'c_project/register';

$route['index_point'] = 'c_project/index_point';

$route['tambah_excel'] = 'c_project/tambah_excel';

$route['rules_point/(:any)'] = 'c_project/rules_point/$1';
$route['rules_point'] = 'c_project/rules_point';
$route['rules_point/add'] = 'c_project/rules_point/add';

$route['report'] = 'c_project/report';



$default_controller = 'c_project'; // default controller name
$route['default_controller'] = $default_controller;
$route['404_override'] = '';
