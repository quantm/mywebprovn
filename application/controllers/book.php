<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class book extends CI_Controller
{
function is_logged_in() {
$is_logged_in = $this->session->userdata('is_logged_in');
	if (!isset($is_logged_in) || $is_logged_in != true) {redirect('/');}    
}


//like
function like(){
$like=$this->db->select('*')->from('ebook_index')->where('ID',$_REQUEST['id'])->get()->result_array();
$count=$like[0]['LIKE_COUNT']+1;
$this->db->where('ID',$_REQUEST['id']);
$this->db->update('ebook_index',array('LIKE_COUNT'=>$count));
echo $count;
}
//end

//like
function update_thesis_link(){
//$this->db->where('ID',$_REQUEST['id']);
//$this->db->update('ebook_index',array('direct_link'=>$_REQUEST['path']));
}
//end

//start filter_html function
function filter_html($content){
$content=str_replace('<form name="loctailieu" id="loctailieu" action="" method="post">','<form name="loctailieu" id="loctailieu" action="" method="post" style="display:none">',$content);
$content=str_replace("window.onload = activeLink;","",$content);
$content=str_replace('jQuery( "#accordion1" ).accordion({autoHeight: false, collapsible: true,icons:icons, active:0});','jQuery( "#accordion1" ).accordion({autoHeight: false, collapsible: true,icons:icons, active:0,event: "click"});',$content);
$content=str_replace("http://tailieuhoctap.vn/images/bia_sach/dethi.jpg","http://myweb.pro.vn/images/tailieu/student_graduate.jpg",$content);
$content=str_replace("delete_session(jQuery(this).attr('val'))","",$content);
$content=str_replace("rgb(0, 173, 238)","",$content);
$content=str_replace("onclick=","",$content);
$content=str_replace("Allow pop-ups for tailieuhoctap.vn","myweb.pro.vn",$content);
$content=str_replace('<a href="#"></a>','',$content);
$content=str_replace('<a','<a target="_new"',$content);
$content=str_replace("extravote-container","remove",$content);
$content=str_replace("extravote-stars","remove",$content);
$content=str_replace("extravote-count","remove",$content);
//$content=str_replace('Xem chi tiết ...','<div style="margin-top:75px;margin-left:-715px;display:block;position:absolute"><input style="display:inline-block;margin-top:1%;margin-left:10px;position:absolute" type="button" class="btn btn-detail btn-success" value="Xem chi tiết" class="btn_view_book_detail"/><input style="display:inline-block;margin-top:1%;margin-left:125px" type="button" class="btn btn-add-book btn-success" value="Thêm vào thư viện của tôi" id="btn_add_to_my_library"/></div>',$content);

//$content=str_replace('Xem chi tiết ...','<p class="btn btn-add-book btn-success">Thêm vào thư viện của tôi</p><p class="btn btn_view_book_detail btn-success">Xem chi tiết</p>',$content);
$content=str_replace('Xem chi tiết ...','<p class="btn btn_view_book_detail btn-success">Xem chi tiết</p>',$content);
$content=str_replace("googletag.cmd.push(function() { googletag.display('div-gpt-ad-1412821717996-1'); });","",$content);
$content=str_replace("googletag.cmd.push(function() {","",$content);
$content=str_replace("googletag.defineSlot('/2627062/tailieuhoctap.vn_ROS_300x250b', [300, 250], 'div-gpt-ad-1412821717996-1').addService(googletag.pubads()).setTargeting('passback_b', 'false');","",$content);
$content=str_replace("googletag.pubads().enableSingleRequest();","",$content);
$content=str_replace("googletag.enableServices();","",$content);
$content=str_replace('<script type="text/javascript" src="http://static.novanet.vn/embed.js"></script>','',$content);
$content=str_replace('Danh mục tài liệu','<img style="margin-left:7px;margin-top:5px" src="/images/background/book_header_category.png"',$content);
return $content;
}
//end filter_html function

//start chi_tiet_sach function
function chi_tiet_sach($path_1,$path_2,$path_3){

//die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');

//if user session
if($this->session->userdata('username')){
	$this->load->model('log_model');
	$user_data=$this->log_model->getIdUserLogin();

	//check if download time per charge is expires
	if($user_data[0]['DOWNLOADED_PER_CHARGED']==$user_data[0]['BOOK_DOWNLOADED_COUNT']){
		$data['time_per_charge_expires']='0';
	}
	else {
		$data['time_per_charge_expires']='1';
	}
	//end	

	//check if the user charged card
	if($user_data[0]['CARD_PIN']=='0'){
		$data['card']	='0';
	}
	if($user_data[0]['CARD_PIN']!='0'){
		$data['card']	='1';
	}
	//end
}
//end if user session

else {
		$data['card']	='not_login';
		$data['time_per_charge_expires']='not_login';
}


$path ='/chi-tiet-sach/'.$path_1.'/'.$path_2.'/'.$path_3;

$fpt_db_host=$this->load->database('admin_education',TRUE);

$book_data=$fpt_db_host->select('ebook_category.id as ID_CATEGORY,ebook_category.NAME as CATEGORY,ebook_index.*')
				->from('ebook_index')
				->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
				->like('ebook_index.path',$path)
				->where('REFERER','tailieuhoctapvn')
				->get()->result_array();	
if($book_data){
	if(isset($_REQUEST['download'])){
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header( "Content-type:".$book_data[0]['MIME']); 
		header( 'Content-Disposition: attachment; filename='.$book_data[0]['NAME'].'.'.$book_data[0]['FILE_EXTENSION']);
		echo file_get_contents($book_data[0]['direct_link']);
	}
	else {
	$url="http://tailieuhoctap.vn".$book_data[0]['path'];
	$data['book_id']=$book_data[0]['path'];
	$data['book_title']=$book_data[0]['NAME'];
	$data['category']=$book_data[0]['CATEGORY'];
	$data['category_id']=$book_data[0]['ID_CATEGORY'];
	$data['book_description']=strip_tags($book_data[0]['DESCRIPTION']);
	$data['book_thumbs']=$book_data[0]['THUMBS'];
	$data['mime']=$book_data[0]['MIME'];
	$data['file_extension']=$book_data[0]['FILE_EXTENSION'];		
	$data['share_id']=$book_data[0]['ID'];
	$book_id_comment=$book_data[0]['ID'];
	$header_title = $book_data[0]['NAME'];	
	}
}
else {
	die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
}
$header = new header();
$header->book($header_title);

if(!isset($_REQUEST['is_download'])){
	$data['is_download']="0";
}
else{
	$data['is_download']="1";
}


//login pop-up  
if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
}
if(!isset($_REQUEST['type'])){
	$data['type']='0';
}
//end
$data['share']='http://myweb.pro.vn/doc-sach-tham-khao?id='.$book_data[0]['ID'];
$data['embed_url']='http://myweb.pro.vn/book/pdfviewer?id='.$book_data[0]['ID'];
$data['cate_name']=$book_data[0]['CATEGORY'];
$data['id_cate']=$book_data[0]['ID_CATEGORY'];
$data['category_names']=$this->db->query("select DISTINCT ebook_category.`name` as CATEGORY from ebook_index INNER JOIN ebook_category on ebook_category.id=ebook_index.ID_CATEGORY where ebook_index.REFERER='tailieuhoctapvn' order by ebook_category.name asc")->result_array();
$this->load->view('/book/detail',$data);

}
//end chi_tiet_sach function

function mybook($sort_by = 'NAME', $sort_order = 'asc', $offset = 0){
		
		if(!isset($_REQUEST['user_id'])){
			$this->is_logged_in();
		}

		//new model instance
		$this->load->model('mybook_model');
		$this->load->model('log_model');
		$id_user_login=$this->log_model->getId();
		$per_page  = 8;
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
		$results = $this->mybook_model->SelectAll($per_page, $offset, $sort_by, $sort_order,$id_user_login);     
		
		//load database
		$db_init=$this->load->database('admin_education',TRUE);

		//pagination
		$this->load->library('pagination'); 
		$config['total_rows'] = $results['num_rows'];
		$config['per_page'] = $per_page; 
		$config['next_link'] = 'Trang tiếp »'; 
		$config['prev_link'] = '« Trang sau'; 
		$config['num_tag_open'] = ''; 
		$config['num_tag_close'] = ''; 
		$config['num_links'] = 10; 
		$config['cur_tag_open'] = '<a class="currentpage">'; 
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'Trang đầu';
		$config['last_link'] = 'Trang cuối';
		$config['base_url'] = "http://myweb.pro.vn/my-book/";
		$config['uri_segment'] = 2; 
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		
		if(isset($_REQUEST['category'])){
			foreach($db_init->select('*')->from('user_ebook_category')->where('id_u',$id_user_login)->where('name',$_REQUEST['category'])->get()->result_array() as $key);
			redirect('/book/mybook?id_category='.$key['id']);
		}
		$user=$this->db->select('*')->from('qtht_users')->where('ID_U',$id_user_login)->get()->result_array();
		foreach($user as $u);
		
		//render view
		$data['book_last_row']=array();
		$data['book_top_row']=array();
		if(isset($_REQUEST['id_category'])){
			$data['id_category']=$_REQUEST['id_category'];
			$query_result=$db_init->select('*')->from('user_ebook_category')->where('id',$_REQUEST['id_category'])->get()->result_array();
			$data['cate']=$query_result[0]['name'];
		}
		if(!isset($_REQUEST['id_category'])){
			$data['id_category']='0';
			$data['cate']='';
		}
		$data['user_name']=$u['NAME'];
		$data['user_id']=$id_user_login;
		$data['elib'] = $results['rows'];     
		$data['count_elib']=$results['num_rows'];
		$data['pagination'] = $pagination;
		$data['category_names']=$db_init->select('*')->from('user_ebook_category')->where('id_u',$id_user_login)->get()->result_array();
		$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
		$header= new header();
		$header->mybook('Tủ sách của	'. $u['NAME']);
		$this->load->view('book/user',$data);
}

function doc_sach(){
	
	//die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
	
	
	$fpt_db_host=$this->load->database('admin_education',TRUE);

	$view=$fpt_db_host->select('*')->from('ebook_index')->where('id',$_REQUEST['id'])->get()->result_array();
	foreach($view as $key);
	copy($key['direct_link'],'./pdf/file_'.$_REQUEST['id'].'.pdf');
	$header= new header();
	$header->rong_mo_tam_hon($key['NAME']);
	$data['share_id']=$_REQUEST['id'];
	$data['book_thumbs']=$key['THUMBS'];
	$data['pdf_path']='./pdf/file_'.$_REQUEST['id'].'.pdf';
	$data['book_title']=$key['NAME'];
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
	$this->load->view('book/book-soul-view',$data);
}

function pdfviewer(){
	$fpt_db_host=$this->load->database('admin_education',TRUE);
	$view=$fpt_db_host->select('*')->from('ebook_index')->where('id',$_REQUEST['id'])->get()->result_array();
	if($view){
		foreach($view as $key);
		$direct_link=str_replace('http://data','http://dulieu',$key['direct_link']);
		copy($direct_link,'./pdf/file_'.$_REQUEST['id'].'.pdf');
		$data['pdf_path']='http://myweb.pro.vn/pdf/file_'.$_REQUEST['id'].'.pdf';
		$this->load->view('book/pdf',$data);
	}
	else {
		redirect('http://xahoihoctap.net.vn/book/pdfviewer?id='.$_REQUEST['id']);
	}
	
	//xóa file trên server
	$date=getdate();
	$hour = $date['hours'];
	if($hour%12){
		//do nothing
	}

	//start delete file on server one time per day
	else{
		//start delete file on server
		for($doc_index=0;$doc_index<1000000;$doc_index++){		
		if (file_exists('./pdf/file_'.$doc_index.'.pdf')) {
			unlink('./pdf/file_'.$doc_index.'.pdf');
		} 
		
		if (file_exists('./pdf/file_vndoccom_'.$doc_index.'.pdf')) {
			unlink('./pdf/file_vndoccom_'.$doc_index.'.pdf');
		} 

		if (file_exists('./images/tailieuvn/thumb_'.$doc_index.'.jpg')) {
			unlink('./images/tailieuvn/thumb_'.$doc_index.'.jpg');
		} 
		}
		//end delete file on server
	}
	//end proccess delete file on server one time per 15 minutes

}

function embed_pdf(){
	$fpt_db_host=$this->load->database('admin_education',TRUE);

	$view=$fpt_db_host->select('*')->from('ebook_index_en')->where('id',$_REQUEST['id'])->get()->result_array();
	foreach($view as $key);
	copy($key['direct_link'],'./pdf/en/file_'.$_REQUEST['id'].'.pdf');
	$data['pdf_path']='../pdf/en/file_'.$_REQUEST['id'].'.pdf';
	$this->load->view('book/pdf',$data);
}

function rong_mo_tam_hon($sort_by = 'NAME', $sort_order = 'asc', $offset = 0){
		
		//die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');

		if(isset($_REQUEST['id'])){
			redirect('/doc-sach?id='.$_REQUEST['id']);
		}
		//new model instance
		$this->load->model('soul_model');
		$this->load->model('log_model');
		$id_user_login=$this->log_model->getId();
		
		$per_page  = 4;
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
		$results = $this->soul_model->SelectAll($per_page, $offset, $sort_by, $sort_order);     
		
		//pagination
		$this->load->library('pagination'); 
		$config['total_rows'] = $results['num_rows'];
		$config['per_page'] = $per_page; 
		$config['next_link'] = 'Trang tiếp »'; 
		$config['prev_link'] = '« Trang sau'; 
		$config['num_tag_open'] = ''; 
		$config['num_tag_close'] = ''; 
		$config['num_links'] = 10; 
		$config['cur_tag_open'] = '<a class="currentpage">'; 
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'Trang đầu';
		$config['last_link'] = 'Trang cuối';
		$config['base_url'] = "http://myweb.pro.vn/rong-mo-tam-hon";
		$config['uri_segment'] = 2; 
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		$db=$this->load->database('admin_education',TRUE);

		if(isset($_REQUEST['id_category'])){
			foreach($db->select('*')->from('ebook_category')->where('id',$_REQUEST['id_category'])->get()->result_array() as $key);			
			$data['id_category']=$_REQUEST['id_category'];
			$data['category_name']=$key['name'];
			$top_row=$db->select('*')->from('ebook_index')
						  ->where('ID_CATEGORY',$_REQUEST['id_category'])
						  ->where('REFERER','rongmotamhonnet')
						  ->where('VIEW !=','')
				          ->order_by('VIEW','desc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_top_row']=$top_row;

			$last_row=$db->select('*')->from('ebook_index')
						  ->where('ID_CATEGORY',$_REQUEST['id_category'])
						  ->where('REFERER','rongmotamhonnet')
						  ->where('VIEW !=','')
				          ->order_by('VIEW','asc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_last_row']=$last_row;
		}
		else{
			$data['id_category']='0';
			$data['category_name']='Tủ sách rộng mở tâm hồn';
			$top_row=$db->select('*')->from('ebook_index')
						  ->where('VIEW !=','')
				          ->order_by('VIEW','desc')
						  ->where('REFERER','rongmotamhonnet')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_top_row']=$top_row;

			$last_row=$db->select('*')->from('ebook_index')
						  ->where('VIEW !=','')
				          ->order_by('VIEW','asc')
						  ->where('REFERER','rongmotamhonnet')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_last_row']=$last_row;
		}
		
		if(isset($_REQUEST['category'])){
			foreach($db->select('*')->from('ebook_category')->where('name',$_REQUEST['category'])->get()->result_array() as $key);
			redirect('/book/?id_category='.$key['id']);
		}
		
		//render view
		$data['elib'] = $results['rows'];     
		$data['count_elib']=$results['num_rows'];
		$data['pagination'] = $pagination;

		$header= new header();
		$header->rong_mo_tam_hon('Tủ sách mở rộng tâm hồn');

		$this->load->view('book/book-soul',$data);
}

function category($sort_by = 'NAME', $sort_order = 'asc', $offset = 0){			
		
		//new model instance
		$this->load->model('book_model');

		$per_page  = 8;
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
		$results = $this->book_model->SelectAll($per_page, $offset, $sort_by, $sort_order);     
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
		$config['base_url'] = "http://myweb.pro.vn/book/";
		$config['uri_segment'] = 2; 
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();

		//load matbao vps database
		$fpt_db_host=$this->load->database('admin_education',TRUE);
		if(isset($_REQUEST['id_category'])){
			foreach($fpt_db_host->select('*')->from('ebook_category')->where('id',$_REQUEST['id_category'])->get()->result_array() as $key);			
			$data['id_category']=$_REQUEST['id_category'];
			$data['category_name']=$key['name'];
			$top_row=$fpt_db_host->select('*')->from('ebook_index')
						  ->where('ID_CATEGORY',$_REQUEST['id_category'])
						  ->where('VIEW !=','')
						  ->where('REFERER !=','rongmotamhonnet')
						  ->where('REFERER !=','luanvannetvn')
				          ->order_by('VIEW','desc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_top_row']=$top_row;

			$last_row=$fpt_db_host->select('*')->from('ebook_index')
						  ->where('ID_CATEGORY',$_REQUEST['id_category'])
						  ->where('VIEW !=','')
						  ->where('REFERER !=','rongmotamhonnet')
				          ->order_by('VIEW','asc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_last_row']=$last_row;
		}
		else{
			$data['id_category']='0';
			$data['category_name']='Danh mục sách tham khảo';
			$top_row=$fpt_db_host->select('*')->from('ebook_index')
						  ->where('VIEW !=','')
				          ->order_by('VIEW','desc')
						  ->where('REFERER !=','rongmotamhonnet')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_top_row']=$top_row;

			$last_row=$fpt_db_host->select('*')->from('ebook_index')
						  ->where('VIEW !=','')
				          ->order_by('VIEW','asc')
						  ->where('REFERER','luanvannetvn')
						  ->where('REFERER !=','rongmotamhonnet')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_last_row']=$last_row;
		}
		
		if(isset($_REQUEST['category'])){
			foreach($fpt_db_host->select('*')->from('ebook_category')->where('name',$_REQUEST['category'])->get()->result_array() as $key);
			redirect('/book/?id_category='.$key['id']);
		}

		$data['elib'] = $results['rows'];     
		$data['count_elib']=$results['num_rows'];
		$data['pagination'] = $pagination;
		$data['category_names']=$fpt_db_host->query("select DISTINCT ebook_category.`name` as CATEGORY from ebook_index INNER JOIN ebook_category on ebook_category.id=ebook_index.ID_CATEGORY where ebook_index.REFERER='tailieuhoctapvn' order by ebook_category.name asc")->result_array();
		$header= new header();
		$header->book('Danh mục sách tham khảo');

		$this->load->view('book/category',$data);
}
function english_book($sort_by = 'NAME', $sort_order = 'asc', $offset = 0){
	
		die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');

		//new model instance
		$this->load->model('englishbook_model');

		$per_page  = 12;
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
		$results = $this->englishbook_model->SelectAll($per_page, $offset, $sort_by, $sort_order);     
		//pagination
		$this->load->library('pagination'); 
		$config['total_rows'] = $results['num_rows'];
		$config['per_page'] = $per_page; 
		$config['next_link'] = 'Trang tiếp »'; 
		$config['prev_link'] = '« Trang sau'; 
		$config['num_tag_open'] = ''; 
		$config['num_tag_close'] = ''; 
		$config['num_links'] = 10; 
		$config['cur_tag_open'] = '<a class="currentpage">'; 
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'Trang đầu';
		$config['last_link'] = 'Trang cuối';
		$config['base_url'] = "http://myweb.pro.vn/book/";
		$config['uri_segment'] = 2; 
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		
		if(isset($_REQUEST['id_category'])){
			foreach($this->db->select('*')->from('ebook_category_en')->where('id',$_REQUEST['id_category'])->get()->result_array() as $key);			
			$data['id_category']=$_REQUEST['id_category'];
			$data['category_name']=$key['name'];
			$top_row=$this->db->select('*')->from('ebook_index_en')
						  ->where('ID_CATEGORY',$_REQUEST['id_category'])
						  ->where('VIEW !=','')
				          ->order_by('VIEW','desc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_top_row']=$top_row;

			$last_row=$this->db->select('*')->from('ebook_index_en')
						  ->where('ID_CATEGORY',$_REQUEST['id_category'])
						  ->where('VIEW !=','')
				          ->order_by('VIEW','asc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_last_row']=$last_row;
		}
		else{
			$data['id_category']='0';
			$data['category_name']='English book';
			$top_row=$this->db->select('*')->from('ebook_index_en')
						  ->where('VIEW !=','')
				          ->order_by('VIEW','desc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_top_row']=$top_row;

			$last_row=$this->db->select('*')->from('ebook_index_en')
						  ->where('VIEW !=','')
				          ->order_by('VIEW','asc')
						  ->limit(4)
				          ->get()->result_array();
			//$data['book_last_row']=$last_row;
		}
		
		if(isset($_REQUEST['category'])){
			foreach($this->db->select('*')->from('ebook_category')->where('name',$_REQUEST['category'])->get()->result_array() as $key);
			redirect('/book/?id_category='.$key['id']);
		}

		$data['elib'] = $results['rows'];     
		$data['count_elib']=$results['num_rows'];
		$data['pagination'] = $pagination;
		$data['category_names']=$this->db->query("select DISTINCT ebook_category.`name` as CATEGORY from ebook_index INNER JOIN ebook_category on ebook_category.id=ebook_index.ID_CATEGORY where ebook_index.REFERER='tailieuhoctapvn' order by ebook_category.name asc")->result_array();
		$header= new header();
		$header->book('English book');

		$this->load->view('book/english_book',$data);
}

function index()
{

die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');

$trans= new web_transfer();
$url='http://tailieuhoctap.vn/tai-lieu-hoc-tap/';
$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("tailieuhoctap.vn");
$trans->getcontent($content);	
$content=$this->filter_html($content);
preg_match_all('/<div class="pagination clearfix">(.*?)<li class="pagination-end">/s',$content,$matches_pagination,PREG_SET_ORDER);
preg_match_all('/<div id="ja-left1" class="ja-col  column" style="width:99.5%">(.*?)<div class="ja-moduletable moduletable tag  clearfix" id="Mod52">/s',$content,$matches_left,PREG_SET_ORDER);
preg_match_all('/<div class="blog">(.*?)<div class="pagination clearfix">/s',$content,$matches_main,PREG_SET_ORDER);
if($matches_main){
	foreach($matches_main as $main);
}
else{
	redirect("/book/category/");
}

if($matches_pagination){
	foreach($matches_pagination as $key_pagination);
}
else{
	redirect("/book/category/");
}

foreach($matches_left as $key_left);

$left='<div id="ja-left" class="column sidebar"><div class="ja-colswrap clearfix ja-l1"><div id="ja-left1" class="ja-col  column" style="width:98%">'.$key_left[1].'</div></div></div>';
$main='<div id="ja-content-main" class="ja-content-main clearfix"><div class="blog">'.$main[1].'</div></div>';


$pagination=$key_pagination[1];
$pagination=str_replace('<div class="pagination clearfix">','<div class="row">',$pagination);
$pagination=str_replace("<span","<a",$pagination);
//assign variable for view
$data['pagination']=$pagination;

$data['left']=$left;
$data['main']=$main;
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$data['book']=$this->db->select('*')->from('ebook_index')->limit(0,100)->get()->result_array();

//login pop-up  
if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
}
else{
	$data['type']='0';
}
//end


$this->load->view('book/index',$data);
$header = new header();
$header->book("Download tài liệu học tập");
}


//start main function
function main(){
$trans= new web_transfer();
$url='http://tailieuhoctap.vn'.$_REQUEST['book_category'];
$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("tailieuhoctap.vn");
$trans->getcontent($content);	
$content=$this->filter_html($content);

//start main content filter
preg_match_all('/<div class="blog">(.*?)<div class="pagination clearfix">/s',$content,$matches_main,PREG_SET_ORDER);
foreach($matches_main as $main);
$main='<div id="ja-content-main" class="ja-content-main clearfix"><div class="blog">'.$main[1].'</div></div>';
//end main content filter

//start pagination filter
preg_match_all('/<div class="pagination clearfix">(.*?)<li class="pagination-end">/s',$content,$matches_pagination,PREG_SET_ORDER);
foreach($matches_pagination as $key_pagination);
$pagination=$key_pagination[1];
$pagination=str_replace('<div class="pagination clearfix">','<div class="row">',$pagination);
$pagination=str_replace("<span","<a",$pagination);
$pagination=str_replace("target","",$pagination);
//end pagination filter

if(!isset($_REQUEST['current_page_id'])){
	echo $main.$pagination;
}
else {
$current_page_id=$_REQUEST['current_page_id'];
$current_page_html="<input type='hidden' id='current_page_id' value='".$current_page_id."'/	>";
echo $main.$pagination.$current_page_html;
} 

}
//end main function

//start function
function get_content_related($url_content_related){
$content_related='';
$url_related=file_get_contents($url_content_related);
$url_related=str_replace('http://tailieuhoctap.vn/images/filetype','http://myweb.pro.vn/images/icon',$url_related);
$url_related=str_replace('href','data-href',$url_related);
preg_match_all('/<div class="moduletable">(.*?)<script>/s',$url_related,$matches,PREG_SET_ORDER);
	if($matches){
		foreach($matches as $key_related);
		$content_related=$key_related['0'];
	}
	else {
		$content_related='';
	}
	return $content_related;
}
//end function

//redirect from google search result
function detail(){
	redirect('/doc-sach-tham-khao?id='.$_REQUEST['id']);
}
//end function

//start _detail function
function _detail(){

die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');

$header_title = '';
$trans= new web_transfer();
//start if
if(!isset($_REQUEST['book_id'])){
	if(!isset($_REQUEST['id'])){
		redirect('/book/index');
	}
	else {
			if(isset($_REQUEST['is_download'])){
			
			}
			if(!isset($_REQUEST['is_download'])){
				//redirect from google search result
				redirect('/doc-sach-tham-khao?id='.$_REQUEST['id']);
		
			}
			$book_data='';
			if(isset($_REQUEST['book_title'])){
				$book_data=$this->db->select('ebook_category.id as ID_CATEGORY,ebook_category.NAME as CATEGORY,ebook_index.*')->from('ebook_index')				
									->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
									->where('ebook_index.NAME',$_REQUEST['book_title'])
									->get()->result_array();			
			}
			else {
				$book_data=$this->db->select('ebook_category.id as ID_CATEGORY,ebook_category.NAME as CATEGORY,ebook_index.*')
									->from('ebook_index')
									->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
									->where('ebook_index.ID',$_REQUEST['id'])
									->get()->result_array();	
			}
		if($book_data){
		foreach($book_data as $key);
		
		if($key['REFERER']=='tailieuvn' || $key['REFERER']=='tailieuhoceduvn'){
			if(!isset($_REQUEST['is_download'])){
				redirect('/download-tai-lieu?id='.$_REQUEST['id']);
			}
		}
		if(isset($_REQUEST['download'])){
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header( "Content-type:".$key['MIME']); 
			header( 'Content-Disposition: attachment; filename='.$key['NAME'].'.'.$key['FILE_EXTENSION']);
			echo file_get_contents($key['direct_link']);
		}

		$url="http://tailieuhoctap.vn".$key['path'];
		$data['book_id']=$key['path'];
		$data['book_title']=$key['NAME'];
		$data['category']=$key['CATEGORY'];
		$data['file_extension']=$key['MIME'];
		$data['category_id']=$key['ID_CATEGORY'];
		$data['book_description']=strip_tags($key['DESCRIPTION']);
		$data['book_thumbs']=$key['THUMBS'];
		
		$data['share_id']=$key['ID'];
		$book_id_comment=$key['ID'];
		$header_title = $key['NAME'];	
		}
		else{
			redirect("/book/index/");
		}
	
	}

}
//end if

//start else
else {
$book_id=$this->input->get_post('book_id');
$book_title=$this->input->get_post('book_title');
$book_description=$this->input->get_post('book_description');
$book_thumbs=$this->input->get_post('book_thumbs');
$check_exist=$this->db->select('*')->from('ebook_index')->where('NAME',$book_title)->get()->result_array();
$header_title = $book_title;

//start check where the book exist in db
$count_check=count($check_exist);
$data=array(
			'NAME'=>strip_tags($book_title),
			'DESCRIPTION'=>strip_tags($book_title),
			'THUMBS'=>$book_thumbs,
			'REFERER'=>'tailieuhoctapvn',
			'path'=>$book_id
		);
if($count_check==0){
		$this->db->insert('ebook_index',$data);
		$data['share_id']=$this->db->insert_id();
		$book_id_comment=$this->db->insert_id();
}
else {
	$book_data=$this->db->select('*')->from('ebook_index')->where('NAME',$_REQUEST['book_title'])->get()->result_array();
	foreach($book_data as $key);
	$data['share_id']=$key['ID'];
	$data['file_extension']=$key['FILE_EXTENSION'];
	$book_id_comment=$key['ID'];
}
//end check where the book exist in db

$url="http://tailieuhoctap.vn".$book_id;
$data['book_id']=$book_id;
$data['book_title']=$book_title;
$data['book_description']=$book_description;
$data['book_thumbs']=$book_thumbs;
$data['category']='';
$data['category_id']='';
}
//end else

$header = new header();
$header->book($header_title);

$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("tailieuhoctap.vn");
$trans->getcontent($content);	
$content=str_replace(" -  ","",$content);
$content=str_replace(" - ","",$content);
$content=str_replace('style="color:','style="display:none;color:',$content);
$content=str_replace("display: block","display:none",$content);
$content=str_replace("noi-dung-huongdan","noi-dung-huongdan modal hide fade",$content);
$content=str_replace('onclick="huongdandown()"','',$content);
$content=str_replace('<script type="text/javascript">var addthis_config = {"data_track_addressbar":true}; var addthis_share = {description:test code};</script>','',$content);
preg_match_all('/<div class="item-page">(.*?)<div class="them">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $matches_main);
if($matches){
	$related_content=$this->get_content_related($url);
	//$data['content']=$matches_main[0].$related_content;
	$data['content']=$matches_main[0];
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
}
else {
	redirect('book/index');
}


if(!isset($_REQUEST['is_download'])){
	$data['is_download']="0";
}
else{
	$data['is_download']="1";
}


//login pop-up  
if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
}
if(!isset($_REQUEST['type'])){
	$data['type']='0';
}
//end

$data['share']='http://myweb.pro.vn/book/detail?id='.$key['ID'];

$this->load->view('book/detail',$data);
}
//end detail function

//start tai_lieu function
function tai_lieu(){

die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');

$book_data=$this->db->select('ebook_index.*,ebook_category.NAME as CATE_NAME')
							->from('ebook_index')
						   ->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
						   ->where('ebook_index.ID',$_REQUEST['id'])->get()->result_array();
foreach($book_data as $key);
$header= new header();
$header->book($key['NAME']);




//start varriable for render view
$data['category_names']=$this->db->query("select DISTINCT ebook_category.`name` as CATEGORY from ebook_index INNER JOIN ebook_category on ebook_category.id=ebook_index.ID_CATEGORY where ebook_index.REFERER='tailieuhoctapvn' order by ebook_category.name asc")->result_array();
$data['book_title']=$key['NAME'];
$data['cate_name']=$key['CATE_NAME'];
$data['id_cate']=$key['ID_CATEGORY'];
$data['book_description']=str_replace('TailLieu.VN','<em>website myweb.pro.vn</em>',$key['DESCRIPTION']);
copy($key['THUMBS'],'./images/tailieuvn/thumb_'.$_REQUEST['id'].'.jpg');
$data['book_thumb']='http://myweb.pro.vn/images/tailieuvn/thumb_'.$_REQUEST['id'].'.jpg';
$data['share_url']='http://myweb.pro.vn/tai-lieu?id='.$_REQUEST['id'];
$data['btn_read']='Đọc ngay';
$data['embed_url']='http://myweb.pro.vn/book/pdfviewer?id='.$_REQUEST['id'];
//end varriable for render view

$this->load->view('book/tai_lieu',$data);
}
//end tai_lieu function

//start fuction tai_lieu_hoc_tap
function tai_lieu_hoc_tap($path_element_2,$path_element_3,$path_element_4){

//die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');

$path='/chi-tiet-sach/'.$path_element_2.'/'.$path_element_3.'/'.$path_element_4;

$fpt_db_host=$this->load->database('admin_education',TRUE);

$book_data=$fpt_db_host->select('*')->from('ebook_index')
								 ->where('ebook_index.path',$path)
								 ->get()->result_array();

$url="http://tailieuhoctap.vn".$book_data[0]['path'];
$header = new header();
$header->book($book_data[0]['NAME']);

$trans= new web_transfer();
$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("tailieuhoctap.vn");
$trans->getcontent($content);
$content=str_replace('http://tailieuhoctap.vn/images/filetype','http://myweb.pro.vn/images/icon',$content);
$content=str_replace("Tailieuhoctap.vn","website myweb.pro.vn",$content);
$content=str_replace(" -  ","",$content);
$content=str_replace(" - ","",$content);

//prevent google analytics to call server
$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
$content=str_replace('UA-41493823-2','',$content);
//end

$content=str_replace('style="color:','style="display:none;color:',$content);
$content=str_replace("display: block","display:none",$content);
$content=str_replace("noi-dung-huongdan","noi-dung-huongdan modal hide fade",$content);
$content=str_replace('onclick="huongdandown()"','',$content);
$content=str_replace('<script type="text/javascript">var addthis_config = {"data_track_addressbar":true}; var addthis_share = {description:test code};</script>','',$content);
preg_match_all('/<div class="item-page">(.*?)<div class="them">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $matches_main);
if($matches){
	$related_content=$this->get_content_related($url);
	//$data['content']=$matches_main[0].$related_content;
	$data['content']=$matches_main[0];
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
}
else {
	//redirect('book/index');
}

$data['book_id']=$book_data[0]['path'];
$data['book_title']=$book_data[0]['NAME'];
$data['category']='Danh mục';
$data['category_id']='1';
$data['book_description']=strip_tags($book_data[0]['DESCRIPTION']);
$data['book_thumbs']=$book_data[0]['THUMBS'];
$data['mime']=$book_data[0]['MIME'];
$data['file_extension']=$book_data[0]['FILE_EXTENSION'];		
$data['share_id']=$book_data[0]['ID'];

if(!isset($_REQUEST['is_download'])){
	$data['is_download']="0";
}
else{
	$data['is_download']="1";
}


//login pop-up  
if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
}
if(!isset($_REQUEST['type'])){
	$data['type']='0';
}
//end
$data['share']='http://myweb.pro.vn/tai-lieu-hoc-tap/'.$path_element_2.'/'.$path_element_3.'/'.$path_element_4;
$data['embed_url']='http://myweb.pro.vn/book/pdfviewer?id='.$book_data[0]['ID'];
$data['cate_name']='Danh mục';
$data['id_cate']='1';
$data['category_names']=$fpt_db_host->query("select DISTINCT ebook_category.`name` as CATEGORY from ebook_index INNER JOIN ebook_category on ebook_category.id=ebook_index.ID_CATEGORY where ebook_index.REFERER='tailieuhoctapvn' order by ebook_category.name asc")->result_array();
$this->load->view('/book/detail',$data);
}
//end function tai_lieu_hoc_tap

//start doc_sach_tham_khao function
function doc_sach_tham_khao(){

$header_title = '';
$trans= new web_transfer();
	$fpt_db_host=$this->load->database('admin_education',TRUE);
	if(!isset($_REQUEST['id'])){
		redirect('/book/index');
	}
	else {
			$book_data='';
			if(isset($_REQUEST['book_title'])){
				$book_data=$fpt_db_host->select('ebook_category.id as ID_CATEGORY,ebook_category.NAME as CATEGORY,ebook_index.*')->from('ebook_index')				
									->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
									->where('ebook_index.NAME',$_REQUEST['book_title'])
									->get()->result_array();			
			}
			else {
				$book_data=$fpt_db_host->select('ebook_category.id as ID_CATEGORY,ebook_category.NAME as CATEGORY,ebook_index.*')
									->from('ebook_index')
									->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
									->where('ebook_index.ID',$_REQUEST['id'])
									->get()->result_array();	
			}
		if($book_data){
		foreach($book_data as $key);
		if($key['REFERER']=='tailieuvn' || $key['REFERER']=='tailieuhoceduvn'){
			//redirect('/download-tai-lieu?id='.$_REQUEST['id']);
		}
		if(isset($_REQUEST['download'])){
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header( "Content-type:".$key['MIME']); 
			header( 'Content-Disposition: attachment; filename='.$key['NAME'].'.'.$key['FILE_EXTENSION']);
			echo file_get_contents($key['direct_link']);
		}
		$url="http://tailieuhoctap.vn".$key['path'];
		$data['book_id']=$key['path'];
		$data['book_title']=$key['NAME'];
		$data['category']=$key['CATEGORY'];
		$data['category_id']=$key['ID_CATEGORY'];
		$data['book_description']=strip_tags($key['DESCRIPTION']);
		$data['book_thumbs']=$key['THUMBS'];
		$data['mime']=$key['MIME'];
		$data['file_extension']=$key['FILE_EXTENSION'];		
		$data['share_id']=$key['ID'];
		$book_id_comment=$key['ID'];
		$header_title = $key['NAME'];	
		}
		else{
			die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
		}
	
	}

$header = new header();
$header->book($header_title);

$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("tailieuhoctap.vn");
$trans->getcontent($content);
$content=str_replace('http://tailieuhoctap.vn/images/filetype','http://myweb.pro.vn/images/icon',$content);
$content=str_replace("Tailieuhoctap.vn","website myweb.pro.vn",$content);
$content=str_replace(" -  ","",$content);
$content=str_replace(" - ","",$content);

//prevent google analytics to call server
$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
$content=str_replace('UA-41493823-2','',$content);
//end

$content=str_replace('style="color:','style="display:none;color:',$content);
$content=str_replace("display: block","display:none",$content);
$content=str_replace("noi-dung-huongdan","noi-dung-huongdan modal hide fade",$content);
$content=str_replace('onclick="huongdandown()"','',$content);
$content=str_replace('<script type="text/javascript">var addthis_config = {"data_track_addressbar":true}; var addthis_share = {description:test code};</script>','',$content);
preg_match_all('/<div class="item-page">(.*?)<div class="them">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $matches_main);
if($matches){
	$related_content=$this->get_content_related($url);
	//$data['content']=$matches_main[0].$related_content;
	$data['content']=$matches_main[0];
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
}
else {
	//redirect('book/index');
}


if(!isset($_REQUEST['is_download'])){
	$data['is_download']="0";
}
else{
	$data['is_download']="1";
}


//login pop-up  
if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
}
if(!isset($_REQUEST['type'])){
	$data['type']='0';
}
//end
$data['share']='http://myweb.pro.vn/doc-sach-tham-khao?id='.$key['ID'];
$data['embed_url']='http://myweb.pro.vn/book/pdfviewer?id='.$_REQUEST['id'];
$data['cate_name']=$key['CATEGORY'];
$data['id_cate']=$key['ID_CATEGORY'];
$data['category_names']=array();
$this->load->view('/book/detail',$data);
}
//end doc_sach_tham_khao function

//start read_book function
function read_book(){
$book_data=$this->db->select('ebook_index_en.*,ebook_category_en.name as CATE_NAME')
							->from('ebook_index_en')
							->join('ebook_category_en','ebook_category_en.id=ebook_index_en.id','inner')
							->where('ebook_index_en.id',$_REQUEST['id'])->get()->result_array();
foreach($book_data as $key);
$header = new header();
$header->book($key['name']);
$data['book_title']=$key['name'];
$data['category_id']='';
$data['type']='';
$data['cate_name']=$key['CATE_NAME'];
$data['share_id']=$_REQUEST['id'];
$data['book_thumb']=$key['THUMBS'];
$data['embed_url']='http://myweb.pro.vn/book/embed_pdf?id='.$_REQUEST['id'];
$data['book_description']=$key['description'];
$data['btn_read']='Read Now';
$data['share_url']='http://myweb.pro.vn/read-book?id='.$key['id'];
$this->load->view('/book/tai_lieu',$data);
}
//end doc_sach_tham_khao function


//start update_direct_link function
function update_direct_link(){
$header_title = '';
$trans= new web_transfer();
//start if
if(!isset($_REQUEST['book_id'])){
	if(!isset($_REQUEST['id'])){
		//redirect('/book/index');
	}
	else {
			$book_data='';
			if(isset($_REQUEST['book_title'])){
				$book_data=$this->db->select('ebook_category.id as ID_CATEGORY,ebook_category.NAME as CATEGORY,ebook_index.*')->from('ebook_index')				
									->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
									->where('ebook_index.NAME',$_REQUEST['book_title'])
									->get()->result_array();			
			}
			else {
				$book_data=$this->db->select('ebook_category.id as ID_CATEGORY,ebook_category.NAME as CATEGORY,ebook_index.*')
									->from('ebook_index')
									->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
									->where('ebook_index.ID',$_REQUEST['id'])
									->get()->result_array();	
			}
		if($book_data){
		foreach($book_data as $key);
		$url="http://tailieuhoctap.vn".$key['path'];
		$data['book_id']=$key['path'];
		$data['book_title']=$key['NAME'];
		$data['category']=$key['CATEGORY'];
		$data['category_id']=$key['ID_CATEGORY'];
		$data['book_description']=strip_tags($key['DESCRIPTION']);
		if(file_exists ($key['THUMBS'])){
			$data['book_thumbs']=$key['THUMBS'];
		}
		else {
			$data['book_thumbs']='/images/ebook/book_cover_default.png';
		}
		
		$data['share_id']=$key['ID'];
		$book_id_comment=$key['ID'];
		$header_title = $key['NAME'];	
		}
		else{
			$next_id=$_REQUEST['id']+1;
			$url_re='http://myweb.pro.vn/book/update_direct_link/?id='.$next_id;
			redirect($url_re);
		}
	
	}

}
//end if

//start else
else {
$book_id=$this->input->get_post('book_id');
$book_title=$this->input->get_post('book_title');
$book_description=$this->input->get_post('book_description');
$book_thumbs=$this->input->get_post('book_thumbs');
$check_exist=$this->db->select('*')->from('ebook_index')->where('NAME',$book_title)->get()->result_array();
$header_title = $book_title;

//start check where the book exist in db
$count_check=count($check_exist);
$data=array(
			'NAME'=>strip_tags($book_title),
			'DESCRIPTION'=>strip_tags($book_title),
			'THUMBS'=>$book_thumbs,
			'REFERER'=>'tailieuhoctapvn',
			'path'=>$book_id,
			'ID_CATEGORY'=>'8'
		);
if($count_check==0){
		$this->db->insert('ebook_index',$data);
		$data['share_id']=$this->db->insert_id();
		$book_id_comment=$this->db->insert_id();
}
else {
	$book_data=$this->db->select('*')->from('ebook_index')->where('NAME',$_REQUEST['book_title'])->get()->result_array();
	foreach($book_data as $key);
	$data['share_id']=$key['ID'];
	$book_id_comment=$key['ID'];
}
//end check where the book exist in db

$url="http://tailieuhoctap.vn".$book_id;
$data['book_id']=$book_id;
$data['book_title']=$book_title;
$data['book_description']=$book_description;
$data['book_thumbs']=$book_thumbs;
$data['category']='';
$data['category_id']='';
}
//end else

$header = new header();
$header->book($header_title);

$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("tailieuhoctap.vn");
$trans->getcontent($content);	
$content=str_replace("Tailieuhoctap.vn","myweb.pro.vn",$content);
$content=str_replace(" -  ","",$content);
$content=str_replace(" - ","",$content);
$content=str_replace('style="color:','style="display:none;color:',$content);
$content=str_replace("display: block","display:none",$content);
$content=str_replace("noi-dung-huongdan","noi-dung-huongdan modal hide fade",$content);
$content=str_replace('onclick="huongdandown()"','',$content);
$content=str_replace('<script type="text/javascript">var addthis_config = {"data_track_addressbar":true}; var addthis_share = {description:test code};</script>','',$content);
preg_match_all('/<div class="item-page">(.*?)<div class="them">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $matches_main);
if($matches){
	$related_content=$this->get_content_related($url);
	$data['content']=$matches_main[0].$related_content;
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
}
else {
		$next_id=$_REQUEST['id']+1;
		$url_re='http://myweb.pro.vn/book/update_direct_link/?id='.$next_id;
		redirect($url_re);
}


if(!isset($_REQUEST['is_download'])){
	$data['is_download']="0";
}
else{
	$data['is_download']="1";
}


//login pop-up  
if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
}
if(!isset($_REQUEST['type'])){
	$data['type']='0';
}
//end
$data['share']='http://myweb.pro.vn/doc-sach-tham-khao?id='.$key['ID'];
$data['id_next']=$_REQUEST['id']+1;
if($_REQUEST['id']=='14571'){
	$data['id_next']='170743';
}
	
$this->load->view('/book/update_link',$data);
}
//end update_direct_link function

function count_book_view () {

}


//start view function
function view(){
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

//start function mylib
function mylib(){
$this->load->model('log_model');
$id_u=$this->log_model->getId();
$data_mylib=$this->db->select('*')
		 ->from('ebook_index')
	     ->join('fk_user_book','fk_user_book.ID_BOOK=ebook_index.ID','inner')
	     ->where('ID_U',$id_u)
		 ->get()->result_array();
	
	if($data_mylib){
		$data['mylib']=$data_mylib;
	}

	else{
		$data_mylib=$this->db->select('*')
		 ->from('ebook_index')
	     ->join('fk_user_book','fk_user_book.ID_BOOK=ebook_index.ID','inner')
	     ->where('ID_U','83')
		 ->get()->result_array();
		$data['mylib']=$data_mylib;
	}

$this->load->view('/book/mylib',$data);
}

function mylibcheckexist(){
$this->load->model('log_model');
$id_u=$this->log_model->getId();
$data_book_check=$this->db->select('*')->from('fk_user_book')
				  ->where('ID_U',$id_u)
				  ->where('ID_BOOK',$_REQUEST['book_to_add'])
				  ->where('ID_CATEGORY',$_REQUEST['id_category'])
				  ->get()->result_array();
if($data_book_check){
	echo "1";
}
else {
	echo "0";
}

}
//end

function update_link(){
	$next=$_REQUEST['id']+1;
	$this->db->where('ID',$_REQUEST['id']);
	$this->db->where('REFERER','luanvannetvn');
	$this->db->update('ebook_index',array('direct_link'=>$_REQUEST['direct_link']));
	echo $next;
}

function cse(){
	$header = new header();
	$header->luanvan("Kết quả tìm kiếm");
	$this->load->view('google/cse');
}

function count_book_download () {
	$query = $this->db->select("*")->from("ebook_index")->where("ID",$this->input->get_post('book_id'))->get()->result_array();
	foreach($query as $key){
		$count=$key['DOWNLOADED']+1;
		$arr=array('DOWNLOADED'=>$count);
		$this->db->where("ID",$this->input->get_post('book_id'));
		$this->db->update("ebook_index", $arr);
	}
	if($this->session->userdata('username')){
		$this->load->model('log_model');
		$id_u=$this->log_model->getId();
		$query = $this->db->select("*")->from("qtht_users")->where("ID_U",$id_u)->get()->result_array();
		foreach($query as $key){
			$count=$key['BOOK_DOWNLOADED_COUNT']+1;
			$arr=array('BOOK_DOWNLOADED_COUNT'=>$count);
			$this->db->where("ID_U",$id_u);
			$this->db->update("qtht_users", $arr);
		}
	}
	else {
		echo 'not_login';	
	}
}

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

function check_file_path(){
	$file = file_get_contents($_REQUEST['path'], true);
	echo $file;
	exit();
	preg_match('/Not Found/',$file, $matches, PREG_OFFSET_CAPTURE);
	if($matches){
		echo "false";
	}
	else {
		echo "true";
	}
}

function google_3d_bookcase(){
$header = new header();
$header->luanvan('Kệ sách 3D');
$this->load->view('book/google_book_case_3d.php');
}

//start
function remote_filesize() {
    $url=$_REQUEST['url_read_online'];
	static $regex = '/^Content-Length: *+\K\d++$/im';
    if (!$fp = @fopen($url, 'rb')) {
        return false;
    }
    if (
        isset($http_response_header) &&
        preg_match($regex, implode("\n", $http_response_header), $matches)
    ) {
        return (int)$matches[0];
    }
    echo strlen(stream_get_contents($fp));
}
//end


function in_tai_lieu(){
$data=$this->db->select('*')->from('ebook_index')->where('id',$_REQUEST['id'])->get()->result_array();
foreach($data as $key);
$count_print=$key['PAPER_PRINT']+1;
$this->db->where('ID',$_REQUEST['id']);
$this->db->update('ebook_index',array('PAPER_PRINT'=>$count_print));
$data['print_path']=$_REQUEST['print_path'];
$data['print_name']=$key['NAME'];
$this->load->view('book/print',$data);
}

function bookcase($sort_by = 'NAME', $sort_order = 'asc', $offset = 0){

		//new model instance
		$this->load->model('bookcase_model');

		$per_page  = 30;
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
		$results = $this->bookcase_model->SelectAll($per_page, $offset, $sort_by, $sort_order);     
		//pagination
		$this->load->library('pagination'); 
		$config['total_rows'] = $results['num_rows'];
		$config['per_page'] = $per_page; 
		$config['next_link'] = 'Trang tiếp »'; 
		$config['prev_link'] = '« Trang sau'; 
		$config['num_tag_open'] = ''; 
		$config['num_tag_close'] = ''; 
		$config['num_links'] = 10; 
		$config['cur_tag_open'] = '<a class="currentpage">'; 
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'Trang đầu';
		$config['last_link'] = 'Trang cuối';
		$config['base_url'] = "http://myweb.pro.vn/tu-sach-tham-khao/";
		$config['uri_segment'] = 2; 
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		$mydb=$this->load->database('admin_education',TRUE);
		if(isset($_REQUEST['id_category'])){
			foreach($mydb->select('*')->from('ebook_category')->where('id',$_REQUEST['id_category'])->get()->result_array() as $key);			
			$data['id_category']=$_REQUEST['id_category'];
			$data['category_name']=$key['name'];
			$top_row=$mydb->select('*')->from('ebook_index')
						  ->where('ID_CATEGORY',$_REQUEST['id_category'])
						  ->where('VIEW !=','')
				          ->order_by('VIEW','desc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_top_row']=$top_row;

			$last_row=$mydb->select('*')->from('ebook_index')
						  ->where('ID_CATEGORY',$_REQUEST['id_category'])
						  ->where('VIEW !=','')
				          ->order_by('VIEW','asc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_last_row']=$last_row;
		}
		else{
			$data['id_category']='0';
			$data['category_name']='Danh mục sách tham khảo';
			$top_row=$mydb->select('*')->from('ebook_index')
						  ->where('VIEW !=','')
				          ->order_by('VIEW','desc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_top_row']=$top_row;

			$last_row=$mydb->select('*')->from('ebook_index')
						  ->where('VIEW !=','')
				          ->order_by('VIEW','asc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_last_row']=$last_row;
		}
		
		if(isset($_REQUEST['category'])){
			foreach($mydb->select('*')->from('ebook_category')->where('name',$_REQUEST['category'])->get()->result_array() as $key);
			redirect('/book/?id_category='.$key['id']);
		}

		$data['elib'] = $results['rows'];     
		$data['count_elib']=$results['num_rows'];
		$data['pagination'] = $pagination;
		$data['category_names']=$mydb->query("select DISTINCT ebook_category.`name` as CATEGORY from ebook_index INNER JOIN ebook_category on ebook_category.id=ebook_index.ID_CATEGORY where ebook_index.REFERER='tailieuhoctapvn' order by ebook_category.name asc")->result_array();
		$header= new header();
		$header->book('Danh mục sách tham khảo');

		$this->load->view('book/bookcase',$data);
}

//start function
function download_tai_lieu(){

	if(isset($_REQUEST['download'])){
		if($_REQUEST['pc_doc_download_link'] !='0'){
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header( "Content-type:application/pdf"); 
			header( 'Content-Disposition: attachment; filename=myweb.pro.vn - '.$_REQUEST['doc_name'].'.pdf');
			echo file_get_contents($_REQUEST['pc_doc_download_link']);
		}
		else {
			echo "<script>alert('File này đã bị người dùng xóa')</script>";
		}
	}
	if(!isset($_REQUEST['id'])) {
		redirect('/');
	}
	else {
		$mydb=$this->load->database('admin_education',TRUE);
		$data=$mydb->select('*')->from('ebook_index')								
									->where('ebook_index.ID',$_REQUEST['id'])
									->get()->result_array();
		if($data){foreach($data as $key);}
		else {
			echo file_get_contents('http://www.xahoihoctap.net.vn/download-tai-lieu?referer=1&id='.$_REQUEST['id']);
		}

	}

	$header = new header();
	$header->book($key['NAME']);
	if(isset($_REQUEST['type'])){
		$data['type_login']=$_REQUEST['type'];
	}
	else {
		$data['type_login']='';
	}
	$data['content']='';
	$data['book_id']='';
	$data['is_download']='';
	$data['id']=$_REQUEST['id'];
	$data['name']=$key['NAME'];
	$data['link']=$key['direct_link'];
	$data['description']=strip_tags($key['DESCRIPTION']);
	$data['book_thumbs']=str_replace('http://myweb.pro.vn/images/tailieu/','http://quantmbook.net46.net/tailieu/',$key['THUMBS']);
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 

	//pdf
	if($key['REFERER']=='tailieuhoctapvn' || $key['REFERER']=='tailieuvn' ){
		$data['type']='pdf';
		if($key['direct_link']=='' || $key['direct_link']=='0'){
			$data['error']='1';
		}
		else {
			$data['error']='0';
		}
		$data['embed_url']='http://myweb.pro.vn/book/pdfviewer?id='.$_REQUEST['id'];
	}
	//end

	//flash
	if($key['REFERER']=='luanvannetvn' || $key['REFERER']=='thuviengiaoanvn' || $key['REFERER']=='giaoancomvn'){
		$data['error']='0';
		$data['type']='flash';
		$data['doc_view']='http://xahoihoctap.net.vn/bridge/mywebprovn/'.$_REQUEST['id'];
	}
	//end flash

	//start html
	if($key['REFERER']=='voereduvn'){	
				$data['doc_view']=file_get_contents($key['path']).'<base href="http://voer.edu.vn">';
				$data['type']='html';
				$data['error']='0';
	}

	if($key['REFERER']=='dokovn'){
				$content=file_get_contents($key['path']);
				$content=str_replace('<div class="page-advertise">','<div class="adv_header_no_border" ><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16658.ads"></script></div><div class="remove" style="display:none">',$content);
				preg_match_all('/<div class="container">(.*?)<div class="doc-reference">/s',$content,$matches_doko,PREG_SET_ORDER);
				if($matches_doko){
					foreach($matches_doko as $key_doko);
				}
				else {
					redirect('/luanvan/index/');
				}
				//render view
				$referer_id=end(explode('-',$key['path']));
				$str_ouput='<input type="hidden" id="referer_id" value='.$referer_id.'>';
				$data['doc_view']=$key_doko['0'].$str_ouput;
				$data['type']='html';
				$data['error']='0';
	}
	//end html

	//start pdf window open download
	if($key['REFERER']=='tailieuhoceduvn'){	
				$data['doc_view']='';
				$data['type']='tailieuhoceduvn';
	}
	//end

	$data['share']='http://myweb.pro.vn/download-tai-lieu?id='.$_REQUEST['id'];
	$this->load->view('ebook/file_download',$data);
}
//end function

//book:url('ebook.edu.vn,IDoc.Vn,http://timtailieu.vn/,http://tailieu.tv/')
}
?>
