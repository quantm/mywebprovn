<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class download extends CI_Controller {

function index(){
$header = new header();

if(isset($_REQUEST['path'])){
	if(isset($_REQUEST['name'])){
		$header->download($_REQUEST['name']);
	}
	else {
		$header->download("Tải phần mềm, ứng dụng, iOS, Android,tài liệu");
	}

	$content=file_get_contents("https://down.vn".$_REQUEST['path']);
	$content=str_replace('href="http://down.vn','href="http://myweb.pro.vn/download/index?path=',$content);
	$content=str_replace('href="https://down.vn','href="http://myweb.pro.vn/download/index?path=',$content);

	//reset path
	$content=str_replace('<a href="','<a href="/download',$content);	
	//end
	
	//google analytic and google ads
	$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
	$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
	//end

	//reset advertisement
	$content=str_replace('<div id="addetailfirst" class="adbox">','<div style="position:relative;z-index:10000;margin-left:-6px" class="middle_advertisement"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div><div style="display:none" class="remove">',$content);
	$content=str_replace('<!-- Down.vn - 336x280 - chi tiet -->','<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/530052041.js"></script>',$content);	
	$content=str_replace('<div id="addetailsecond" class="adbox">','<div style="position:relative;z-index:10000;margin-left:0px" class="bottom_advertisement"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/519011620.js"></script></div><div style="display:none" class="remove">',$content);
	//end
	}
else {
	$header->download("Tải phần mềm, ứng dụng, iOS, Android,tài liệu");
	$content=file_get_contents("https://down.vn/");
	//reset advertisement
	$content=str_replace('<div id="adindexfirst" class="adbox">','<div style="position:relative;z-index:10000;margin-left:45px" class="middle_advertisement"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div><div style="display:none" class="remove">',$content);
	//end
}

preg_match_all('/<div id="content" class="clearfix">(.*?)<div class="clear">/s',$content,$matches,PREG_SET_ORDER);
if($matches){}
else {
	redirect('/download/index/');
}
foreach($matches as $key);
$content=str_replace('href="http://down.vn','href="http://myweb.pro.vn/download/index?path=',$key['1']);
$content=str_replace('href="https://down.vn','href="http://myweb.pro.vn/download/index?path=',$key['1']);
$data['content']=$content;
$this->load->view('file/index',$data);

}

function templates($path1,$path2){
$path=$path1.'/'.$path2;
$header = new header();
$header->download("Download");

$content=file_get_contents("https://down.vn/".$path);
//reset path
$content=str_replace('<a href="','<a href="/download',$content);	
//end
preg_match_all('/<div id="content" class="clearfix">(.*?)<div class="clear">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key);
$content=str_replace('href="http://down.vn','href="http://myweb.pro.vn/download/index?path=',$key['1']);
$content=str_replace('href="https://down.vn','href="http://myweb.pro.vn/download/index?path=',$key['1']);
$data['content']=$content;
$this->load->view('file/index',$data);
}

function chat_nhan_tin($path2){
	$this->templates('chat-nhan-tin',$path2);
}

function chuyen_doi_audio_video($path2){
	$this->templates('chuyen-doi-audio-video',$path2);
}

function du_lieu_file($path2){
	$this->templates('du-lieu-file',$path2);
}

function template($path2){
	$this->templates('template',$path2);
}

function email($path2){
	$this->templates('email',$path2);
}

function drivers($path2){
	$this->templates('drivers',$path2);
}

function diet_virus($path2){
	$this->templates('diet-virus',$path2);
}
function mang_internet($path2){
	$this->templates('mang-internet',$path2);
}

function xem_phim_nghe_nhac($path2){
	$this->templates('xem-phim-nghe-nhac',$path2);
}

function ho_tro_download_upload($path2){
	$this->templates('ho-tro-download-upload',$path2);
}

function doanh_nghiep($path2){
	$this->templates('doanh-nghiep',$path2);
}

function van_phong($path2){
	$this->templates('van-phong',$path2);
}

function do_hoa_thiet_ke($path2){
	$this->templates('do-hoa-thiet-ke',$path2);
}

function giao_duc_hoc_tap($path2){
	$this->templates('giao-duc-hoc-tap',$path2);
}

function tien_ich_he_thong($path2){
	$this->templates('tien-ich-he-thong',$path2);
}

function tang_toc_may_tinh($path2){
	$this->templates('tang-toc-may-tinh',$path2);
}

function cong_cu_ho_tro($path2){
	$this->templates('cong-cu-ho-tro',$path2);
}

function trinh_duyet($path2){
	$this->templates('trinh-duyet',$path2);
}

function chinh_sua_anh($path2){
	$this->templates('chinh-sua-anh',$path2);
}

function bao_mat($path2){
	$this->templates('bao-mat',$path2);
}

function game($path){
$header = new header();
$mydb=$this->load->database('helihost',TRUE);
$query=$mydb->select('*')->from('system_download')->like('path',$path)->get()->result_array();

if($query){
	$header->download("Download game ".$query[0]['name']);
	//$content=file_get_contents($query[0]['path']);
	redirect('http://myweb.pro.vn/download/index/');
}
else {
	$header->download("Download game");
	$content=file_get_contents('http://down.vn/game/'.$path);
}


//reset path
	//$content=str_replace('<a href="','<a href="/download',$content);	
//end

preg_match_all('/<div id="content" class="clearfix">(.*?)<div class="clear">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key);
//$content=str_replace('href="http://down.vn','href="http://myweb.pro.vn/game',$key['1']);
//$content=str_replace('href="https://down.vn','href="http://myweb.pro.vn/game',$key['1']);
$data['content']=$content;
$this->load->view('file/index',$data);
}

function seo(){
$mydb=$this->load->database('helihost',TRUE);
$data['download']=$mydb->select('*')->from('system_download')
									->where('id >','29469')
									->get()->result_array();
$this->load->view('file/seo',$data);
}

//start function
function pdf(){
if(!isset($_REQUEST['id'])&&!isset($_REQUEST['csrf_test_name'])){
	redirect('/');
}
$book_data=$this->db->select('*')->from('ebook_index')->where('ID',$_REQUEST['id'])->get()->result_array();
//kiểm tra đã nạp card và đã đăng nhập
	redirect($book_data[0]['DRIVE_GOOGLE_LINK']);
	//echo '<script>window.open("'.$book_data[0]['DRIVE_GOOGLE_LINK'].'")</script>';
}
//end function

//start function
function tai_tai_lieu(){
if(!isset($_REQUEST['id'])&&!isset($_REQUEST['csrf_test_name'])){
	redirect('/');
}
$db=$this->load->database('thesis_notes',TRUE);
$book_data=$db->select('*')->from('ebook_index')->where('ID',$_REQUEST['id'])->get()->result_array();
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header( "Content-type:".$book_data[0]['MIME']); 
header( 'Content-Disposition: attachment; filename=myweb.pro.vn - '.$book_data[0]['NAME'].'.'.$book_data[0]['FILE_EXTENSION']);
$direct_link=str_replace('http://data','http://dulieu',$book_data[0]['direct_link']);
echo file_get_contents($direct_link);
}
//end function

//start function
function music(){
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header( "Content-type:mp4"); 
	header( 'Content-Disposition: attachment; filename='.$_REQUEST['song_name'].'_myweb.pro.vn_.mp4');
	echo file_get_contents($_REQUEST['song_link']);
}
//end function

//start function
function photoshop($path){
if($path){
}
else {
	redirect('/');
}
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header( "Content-type:image/jpg"); 
header( 'Content-Disposition: attachment; filename=myweb.pro.vn - Dữ liệu đính kèm.jpg');
echo file_get_contents($path);
}
//end function

function FontItem($path){
	$url="http://www.freefontsdownload.net/data/".$path;
	$data['content']=file_get_contents($url);
	$this->load->view('download/FontItem',$data);
}

function FontCategory(){
	$url="http://www.freefontsdownload.net/category.php";
	$content=file_get_contents($url);
	
	//break google analytics
	$content=str_replace('UA-50410523-29','',$content);
	
	//social sharing
	$content=str_replace('content="http://www.freefontsdownload.net/','content="http://myweb.pro.vn/download/font/',$content);
	$content=str_replace('<meta name="author" content="downloadfontsfree.net">','<meta name="author" content="myweb.pro.vn">',$content);

	$content=str_replace('href="http://www.freefontsdownload.net/data/','href="http://www.myweb.pro.vn/download/FontItem/',$content);
	$data['content']=$content;
	$this->load->view('download/FontCategory',$data);
}

//start function
function font($path){
	$content="http://www.freefontsdownload.net/".$path;
	$content=file_get_contents($content);
	
	//reset link
	$content=str_replace('href="http://www.freefontsdownload.net/data/','href="http://www.myweb.pro.vn/download/FontItem/',$content);
	$content=str_replace('<a href="http://freefontsdownload.net" target="_blank">Free Fonts Download</a>','<a href="http://www.myweb.pro.vn" target="_blank">Kênh học tập giải trí</a>',$content);
	$content=str_replace('<a href="http://freefontsdownload.net" target="_blank">www.freefontsdownload.net</a>','<a href="http://www.myweb.pro.vn" target="_blank">www.myweb.pro.vn</a>',$content);
	
	//social sharing
	$content=str_replace('content="http://www.freefontsdownload.net/','content="http://myweb.pro.vn/download/font/',$content);
	$content=str_replace('<meta name="author" content="downloadfontsfree.net">','<meta name="author" content="myweb.pro.vn">',$content);

	//reset advertisement
	$obj_ads='<div class="viewdetail"><div class="ads_ants_header"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/534383851.js"></script></div>';
	$obj_ads_bottom='<div class="copyright"><div class="bottom_ads_redirect"><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16619.ads"></script></div>';
	$content=str_replace('<div class="viewdetail">',$obj_ads,$content);
	$content=str_replace('<div class="copyright">',$obj_ads_bottom,$content);

	//break  google analytic
	$content=str_replace('UA-50410523-29','',$content);
	$data['content']=$content;
	$this->load->view('download/font',$data);
}
//end function

//start function
function count_download_per_charged(){
//new model instance
$this->load->model('log_model');
$id=$this->log_model->getId();
$user=$this->db->select('*')->from('qtht_users')->where('ID_U',$id)->get()->result_array();
$count=$user[0]['DOWNLOADED_PER_CHARGED']-1;
$this->db->where('ID_U',$id);
$this->db->update('qtht_users',array('DOWNLOADED_PER_CHARGED'=>$count));
echo $user[0]['DOWNLOADED_PER_CHARGED'];
}
//end function


}
?>