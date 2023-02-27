<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = "login";
$route['404_override'] = '';
$route['pengajuan/home'] = 'pengusul/pts/beranda'; 
$route['pengajuan/surat'] = 'pengusul/pts/ajuan'; 
$route['pengajuan/newsurat'] = 'pengusul/pts/ajukan'; 
$route['pengajuan'] = 'pengusul/pts';
$route['pengajuan/data'] = 'pengusul/pts/ambil_data'; 
$route['pengajuan/history/(:any)'] = 'pengusul/pts/riwayat/$1';
$route['pengajuan/detail/(:any)'] = 'pengusul/pts/detail_ajuan/$1';
$route['pengajuan/kirim_ajuan/(:any)'] = 'pengusul/pts/kirim_ajuan/$1';
$route['pengajuan/hapus_ajuan/(:any)'] = 'pengusul/pts/hapus_ajuan/$1';
$route['pengajuan/edit_ajuan/(:any)'] = 'pengusul/pts/edit_ajuan/$1';
$route['pengajuan/hapus_file/(:any)/(:any)'] = 'pengusul/pts/hapus_file/$1/$2';
$route['logout'] = 'pengusul/pts/logout'; 
$route['login'] = 'pengusul/login';  
$route['pengajuan/kirim'] = 'pengusul/pts/sendAjuan';
$route['pengajuan/tanda_terima/(:any)'] = 'pengusul/pts/tanda_terima/$1';
$route['pengajuan/update_ajuan'] = 'pengusul/pts/update_ajuan';
