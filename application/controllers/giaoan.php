<?php
require_once 'application/controllers/header.php';
class giaoan extends CI_Controller
{

function index($sort_by = 'NAME', $sort_order = 'desc', $offset = 0)
{

//die('<title>Website đang nâng cấp</title><h1>Website đang nâng cấp</h1><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');

//new model instance
 $this->load->model('giaoan_model');

$per_page  = 12;
$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
$results = $this->giaoan_model->SelectAll($per_page, $offset, $sort_by, $sort_order);     
//pagination
$this->load->library('pagination'); 
$config['total_rows'] = $results['num_rows'];
$config['per_page'] = $per_page; 
$config['next_link'] = 'Trang tiếp »'; 
$config['prev_link'] = '« Trang sau'; 
$config['num_tag_open'] = ''; 
$config['num_tag_close'] = ''; 
$config['num_links'] = 5; 
$config['cur_tag_open'] = '<a class="currentpage">'; 
$config['cur_tag_close'] = '</a>';
$config['first_link'] = 'Trang đầu';
$config['last_link'] = 'Trang cuối';
$config['base_url'] = "http://myweb.pro.vn/giaoan/";
$config['uri_segment'] = 2; 
$this->pagination->initialize($config);
$pagination = $this->pagination->create_links();


//render view
$data['ebook_data'] = $results['rows'];     
$data['total_rows']=$results['num_rows'];
$data['pagination'] = $pagination;
$data['count_all_ebook'] = $results['num_rows'];
$data['csrf_test_name'] = $this->security->get_csrf_hash();
$data['category_ebook'] = array();

$header = new header();
$header->giaoan("Thư viện giáo án");

$this->load->view('giaoan/index',$data);
}


//start doc_giao_an function
function doc_giao_an($path){

//die('<title>Website đang nâng cấp</title><h1>Website đang nâng cấp</h1><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');

//load the database setting
$mydb=$this->load->database('admin_education',TRUE);
//end


$header_title = '';

if($path) {
	$book_data=$mydb->select('*')->from('system_lesson_plan')->like('path',$path)->get()->result_array();	
		if($book_data){
			foreach($book_data as $key);
			$data['google_link']='0';
			$data['book_title']=$key['name'];
			$data['book_description']='';
			$data['book_thumbs']=$key['thumb'];
			$data['share_id']=$key['id'];
			$data['id_cate']=$key['id_category'];
			$header_title = $key['name'];	
		}
		else{
			$redirect_path='http://xahoihoctap.net.vn/giaoan?referer=1&referer_search='.$path;
			redirect($redirect_path);
		
			/*
			echo '<script type="text/javascript" src="/js/ga.js"></script>';
			echo '<meta charset="UTF-8"/>';
			echo '<h1 style="color:red">Website đang nâng cấp</h1>';
			die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
			*/
		}
}
//end if

if(!isset($_REQUEST['id'])){
	if($path){

	}
	else {
			echo '<script type="text/javascript" src="/js/ga.js"></script>';
			echo '<meta charset="UTF-8"/>';
			echo '<h1 style="color:red">Website đang nâng cấp</h1>';
			die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
	}
}
else{
	//case id exist in the database then render to html
	if($_REQUEST['id']!="-1"){			
		$book_data=$mydb->select('*')->from('system_lesson_plan')->where('id',$_REQUEST['id'])->get()->result_array();	
		if($book_data){
			foreach($book_data as $key);
			$data['google_link']='0';
			$data['book_title']=$key['name'];
			$data['book_description']='';
			$data['book_thumbs']=$key['thumb'];
			$data['share_id']=$key['id'];
			$data['id_cate']=$key['id_category'];
			$header_title = $key['name'];	
		}
		else{
			$redirect_path='http://xahoihoctap.net.vn/tham-khao-giao-an?id='.$_REQUEST['id'];
			redirect($redirect_path);
			/*
			echo '<script type="text/javascript" src="/js/ga.js"></script>';
			echo '<meta charset="UTF-8"/>';
			echo '<h1 style="color:red">Website đang nâng cấp</h1>';
			die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
			*/
		}
	}
	//end

	//start if
	if($_REQUEST['id']=="-1"){
		$book_data=$mydb->select('*')->from('system_lesson_plan')->where('name',$_REQUEST['book_title'])->get()->result_array();	
		if($book_data){
			foreach($book_data as $key);
			$data['book_title']=$key['name'];
			$data['book_description']='';
			$data['book_thumbs']=$key['thumb'];
			$data['cate_name']=$key['CATE_NAME'];
			$data['id_cate']=$key['id_category'];
			$data['share_id']=$key['id'];
			$header_title = $key['name'];	
		}
		else{
			$data=array('REFERER'=>'luanvannetvn',
						'NAME'=>strip_tags(trim($_REQUEST['book_title'])),
						'DESCRIPTION'=>'',
						'ID_CATEGORY'=>'8',
						'path'=>'http://luanvan.net.vn'.$_REQUEST['path'],
						'THUMBS'=>$_REQUEST['book_thumbs']);
			$this->db->insert('ebook_index',$data);
			$header_title = $_REQUEST['book_title'];
			$data['book_title']=$_REQUEST['book_title'];
			$data['book_description']='';
			$data['cate_name']='Chưa phân loại';
			$data['id_cate']='8';
			$data['book_thumbs']=$_REQUEST['book_thumbs'];
			$data['share_id']=$this->db->insert_id();	
		}
	}
	//end if
}


$header = new header();
$header_title=$header_title.' -Thư viện giáo án www.myweb.pro.vn';
$header->giaoan($header_title );

$content=file_get_contents($key['path']);
$content=str_replace('Click Like Website luanvan365.com nhé bạn!','',$content);
$content=str_replace('Vui Lòng click vào','',$content);
$content=str_replace('/images/banner.jpg','http://xahoihoctap.net.vn/images/banner.jpg',$content);
$content=str_replace('Luận văn liên quan','Luận văn liên quan<span title="Click để đóng" class="relevant-docs-close">Đóng</span>',$content);
$content=str_replace('Giáo án liên quan','Giáo án liên quan<span title="Click để đóng" class="relevant-docs-close">Đóng</span>',$content);
$content=str_replace('bên dưới để tải tài liệu :','',$content);

//jquery conflict
	$content=str_replace('//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js?ver=1.7.1','',$content);
//end

//prevent google analytics to call server
	$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
//end

//remove google ads 
	$content=str_replace('<div class="post-adv">','<div class="remove" style="display:none">',$content);
	$content=str_replace('<div class="adv-post">','<div class="remove" style="display:none">',$content);
	$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
//end

//filter elib
	$content=str_replace('strURL1 +','strURL1.replace("elib.vn","myweb.pro.vn/tham-khao-giao-an") +',$content);
	$content=str_replace('<div id="divPopupAd">','<div class="remove"',$content);
	$content=str_replace('<div class="colshare marginleft10">','<div class="remove"',$content);
	$content=str_replace('<div id="header">','<div id="header remove" style="display:none">',$content);
	$content=str_replace('<div class="footer">','<div id="footer remove" style="display:none">',$content);
	$content=str_replace('http://www.elib.vn/tai-khoan/dang-nhap.html','javascript:download()',$content);
	
	//reset advertisement object
	$ants_right='<div style="margin:10px 0px 10px 0px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324837.js"></script>';
	$ants_right_top='<div style="margin:0px 0 10px 0px;float:left;background:#FFF;height:245px"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324859.js"></script>';
	$content=str_replace('<!-- eLib_Middle_728x90 -->','<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script>',$content);
	$content=str_replace('//e-vcdn.anthill.vn/delivery-ants/zone/514771266.js','//admicro1.vcmedia.vn/ads_codes/ads_box_16575.ads',$content);	

	$content=str_replace('http://static.gammaplatform.com/js/ad-exchange.js','',$content);//ambient ads code
	$content=str_replace('<!-- eLib_Righ_300x250 -->','<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324875.js"></script>',$content);
	$content=str_replace('<div style="margin:10px 0px 10px 0px;">',$ants_right,$content);//right advertisement
	$content=str_replace('<div style="margin:0px 0 10px 0px;float:left;background:#FFF;">',$ants_right_top,$content);//right top advertisement

//end filter elib

//reset path
$content=str_replace('/luan-van/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
$content=str_replace('/tai-lieu/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
$content=str_replace('/do-an/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
$content=str_replace('http://thuviengiaoan.vn/giao-an/','http://myweb.pro.vn/tham-khao-giao-an/',$content);
$content=str_replace('http://ebook.net.vn/ebook/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
//end

//login pop-up  
if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
}
else{
	$data['type']='0';
}
//end

//base link
if(preg_match('/doan.edu.vn/',$key['path'])){
	$data['base_link']='http://doan.edu.vn/';
}

if(preg_match('/giaoanmau.com/',$key['path'])){
	$data['base_link']='http://giaoanmau.com/';
}

if(preg_match('/giaoan.co/',$key['path'])){
	$data['base_link']='http://giaoan.co/';
}

if(preg_match('/baigiang.co/',$key['path'])){
	$data['base_link']='http://baigiang.co/';
}

if(preg_match('/thuviengiaoan.vn/',$key['path'])){
	$content=str_replace('<div class="sidebar-right-adv">','<div class="remove" style="display:none">',$content);
	$content=str_replace('<div class="post-adv">','<div class="remove" style="display:none">',$content);
	$data['base_link']='http://thuviengiaoan.vn/';
}

if(preg_match('/luanvan.net.vn/',$key['path'])){
	$data['base_link']='http://luanvan.net.vn/';
}

if(preg_match('/luanvan365.com/',$key['path'])){
	$data['base_link']='http://luanvan365.com/';
	$content=str_replace('	<span>Thông Tin Khuyến Mãi</span>','<div class="remove"></div>',$content);
	$content=str_replace('/images/thu-vien-luan-van-do-an-tot-nghiep-dai-hoc-thac-si-tien-si.png','http://xahoihoctap.net.vn/images/banner.jpg',$content);
	$content=str_replace('SwfFile=','SwfFile=http://luanvan365.com',$content);
}

if(preg_match('/luanvan.co/',$key['path'])){
	$data['base_link']='http://luanvan.co/';
}

if(preg_match('/tailieu.tv/',$key['path'])){
	$data['base_link']='http://tailieu.tv/';
}

if(preg_match('/doc.edu.vn/',$key['path'])){
	$data['base_link']='http://doc.edu.vn/';
}
///end

//render view
$data['content']=str_replace('Scale=0.95','Scale=1.00&FitWidthOnLoad=true',$content);
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$data['shared_url']='http://myweb.pro.vn/tham-khao-giao-an/'.$path;

if(preg_match('/elibvn/',$key['refererUrl'])){
$this->load->view('/giaoan/fetch_eblib_vn',$data);
}
else {
$this->load->view('/giaoan/tailieu-luanvan',$data);
}

}
//end doc_giao_an function

//start view function
function view(){
die('<title>Website đang nâng cấp</title><h1>Website đang nâng cấp</h1><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');

if(!isset($_REQUEST['book_id'])){
redirect('/book/index/');
}
$data_book=$this->db->select('*')->from('ebook_index')->where('path',$_REQUEST['book_id'])->or_where('id',$_REQUEST['book_id'])->get()->result_array();
foreach($data_book as $key);
$header = new header();
$header->index($key['NAME'],"/book/index","Enter để tìm sách tham khảo, luận văn...");
$data['book_title']=$key['NAME'];
$data['book_thumbs']=$key['THUMBS'];
$data['embed_src']=$key['path'];
$data['book_description']=$key['DESCRIPTION'];
$data['share_id']=$key['ID'];
$this->load->view('book/view',$data);
}
//end view function


//start function comment
function comment(){
	$this->load->model('log_model');
	$id_u=$this->log_model->getId();
	$date = getdate();
	$comment_date = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
	foreach($this->db->select('*')->from('qtht_users')->where('ID_U',$id_u)->get()->result_array() as $user);
	$data=array("ID_U"=>$id_u,"ID_BOOK"=>$_REQUEST['id_book'],"COMMENT"=>$_REQUEST['content'],"DATE"=>$comment_date);
	$this->db->insert('fk_user_book_comment',$data);
	
	if($user['facebook_id']!=''&& $user['USER_IMAGE'] ==''){$user_avatar='https://graph.facebook.com/'.$user['facebook_id'].'/picture';}
	if($user['facebook_id']=='' && $user['USER_IMAGE'] !='' &&  $user['facebook_id'] != $user['USER_IMAGE']) {$user_avatar=$user['USER_IMAGE'];}
	if($user['facebook_id']=='' && $user['USER_IMAGE'] =='') {$user_avatar='/images/no_avatar.png';}
	if($user['facebook_id']!='' && $user['USER_IMAGE'] !='' &&  $user['facebook_id'] != $user['USER_IMAGE']){$user_avatar=$user['USER_IMAGE'];}
	if($user['facebook_id'] == $user['USER_IMAGE'] && $user['USER_IMAGE'] !=''){$user_avatar='https://graph.facebook.com/'.$user['facebook_id'].'/picture';}

	echo '<div class="book_user_comment"><img style="width: 32px!important;" class="user_avatar" src="'.$user_avatar.'" alt="'.$user['NAME'].'"><span class="user_comment">'.$user['NAME'].'</span><span class="comment_content">'.$_REQUEST['content'].'</span></div>';
}
//end function comment

function download(){
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header( "Content-type:application/pdf"); 
header( 'Content-Disposition: attachment; filename=myweb.pro.vn - '.$_REQUEST['name'].'.pdf');
echo file_get_contents($_REQUEST['link']);
}


}
?>