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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['pupuk'] = 'PupukController';
$route['pupuk/tambah'] = 'PupukController/tambah';
$route['pupuk/edit/(:any)'] = 'PupukController/edit/$1';
$route['pupuk/hapus/(:any)'] = 'PupukController/hapus/$1';

$route['kategori'] = 'KategoriController';
$route['kategori/tambah'] = 'KategoriController/tambah';
$route['kategori/edit/(:any)'] = 'KategoriController/edit/$1';
$route['kategori/hapus/(:any)'] = 'KategoriController/hapus/$1';

$route['supplier'] = 'SupplierController';
$route['supplier/tambah'] = 'SupplierController/tambah';
$route['supplier/edit/(:any)'] = 'SupplierController/edit/$1';
$route['supplier/hapus/(:any)'] = 'SupplierController/hapus/$1';

$route['masuk'] = 'MasukController';
$route['masuk/tambah'] = 'MasukController/tambah';
$route['masuk/hapus/(:any)'] = 'MasukController/hapus/$1';

$route['keluar'] = 'KeluarController';
$route['keluar/supplier'] = 'KeluarController/supplier';
$route['keluar/tambah/(:any)'] = 'KeluarController/tambah/$1';
$route['keluar/selesai'] = 'KeluarController/selesai';
$route['keluar/lihat/(:any)'] = 'KeluarController/lihat/$1';
$route['keluar/valid-kepala/(:any)'] = 'KeluarController/validKepala/$1';
$route['keluar/valid-sekretaris/(:any)'] = 'KeluarController/validSekretaris/$1';
$route['keluar/valid-supplier/(:any)'] = 'KeluarController/validSupplier/$1';

$route['pengguna'] = 'AuthController/index';
$route['pengguna/tambah'] = 'AuthController/tambah';
$route['pengguna/hapus/(:any)'] = 'AuthController/hapus/$1';

$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';
