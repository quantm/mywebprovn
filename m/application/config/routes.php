<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "/book/index/";
$route['tai-lieu'] = 'book/tai_lieu';
$route['english-book'] = 'book/english_book';
$route['read-book'] = 'book/read_book';
$route['doc-tai-lieu'] = 'book/doc_tai_lieu';
$route['luanvan'] = '/luanvan/index/';
$route['game'] = '/game/play/';
$route['book'] = '/book/category/';
$route['choi-game'] = 'play';
$route['nghe-nhac'] = 'music/song/';
$route['doc-sach'] = '/book/doc_sach/';
$route['tu-sach-tham-khao'] = '/book/bookcase/';
$route['xem-phim'] = '/video/view';
$route['xem-phim-online'] = '/video/index';
$route['doc-sach-tham-khao'] = '/book/doc_sach_tham_khao';
$route['download-tai-lieu'] = '/book/download_tai_lieu';
$route['doc-luan-van'] = '/luanvan/doc_luan_van/';
$route['rong-mo-tam-hon'] = '/book/rong_mo_tam_hon/';
$route['game/([0-9\-]+)'] = "game/play/$1";
$route['book/([0-9\-]+)'] = "book/category/$1";
$route['tu-sach-tham-khao/([0-9\-]+)'] = "book/bookcase/$1";
$route['rong-mo-tam-hon/([0-9\-]+)'] = "/book/rong_mo_tam_hon/$1";
$route['luanvan/([0-9\-]+)'] = "luanvan/index/$1";
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */