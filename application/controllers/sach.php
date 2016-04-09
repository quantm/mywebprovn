<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class sach extends CI_Controller{
function index($path){
$trans= new web_transfer();
$path =str_replace('--','/',$path);
$db=$this->load->database('thesis_notes',TRUE);
$book_data=$db->select('ebook_category.id as ID_CATEGORY,ebook_category.NAME as CATEGORY,ebook_index.*')->from('ebook_index')		
									->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
									->where('ebook_index.path',$path)
									->get()->result_array();

if($book_data){
	foreach($book_data as $key);
}
else {
	echo '<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>';
}


$data['book_id']=$key['path'];
$data['book_title']=$key['NAME'];
$data['category']=$key['CATEGORY'];
$data['category_id']=$key['ID_CATEGORY'];
$data['book_description']=strip_tags($key['DESCRIPTION']);
$data['book_thumbs']=$key['THUMBS'];
$data['mime']=$key['MIME'];
$data['file_extension']=$key['FILE_EXTENSION'];		
$data['share_id']=$key['ID'];
$data['share']='http://myweb.pro.vn/doc-sach-tham-khao?id='.$key['ID'];

//start get site tailieuhoctap.vn data
$url="http://tailieuhoctap.vn".$key['path'];
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
$content=str_replace('style="color:','style="display:none;color:',$content);
$content=str_replace("display: block","display:none",$content);
$content=str_replace("noi-dung-huongdan","noi-dung-huongdan modal hide fade",$content);
$content=str_replace('onclick="huongdandown()"','',$content);
$content=str_replace('<script type="text/javascript">var addthis_config = {"data_track_addressbar":true}; var addthis_share = {description:test code};</script>','',$content);
preg_match_all('/<div class="item-page">(.*?)<div class="them">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $matches_main);
if($matches){
	//$data['content']=$matches_main[0].$related_content;
	$data['content']=$matches_main[0];
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
}
else {
	redirect('book/index');
}
//end get tailieuhoctap.vn data


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

$header= new header();
$header->book($key['NAME']);

$data['embed_url']='http://myweb.pro.vn/book/pdfviewer?id='.$key['ID'];
$data['cate_name']=$key['CATEGORY'];
$data['id_cate']=$key['ID_CATEGORY'];
$data['category_names']=array();
$this->load->view('book/detail',$data);
}

function tusach($sort_by = 'NAME', $sort_order = 'asc', $offset = 0){

//new model instance
$this->load->model('bookcase_model');

$per_page  = 25;
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

//top-bottom book and left category
		if(isset($_REQUEST['id_category'])){
			foreach($this->db->select('*')->from('ebook_category')->where('id',$_REQUEST['id_category'])->get()->result_array() as $key);			
			$data['id_category']=$_REQUEST['id_category'];
			$data['category_name']=$key['name'];
			$top_row=$this->db->select('*')->from('ebook_index')
						  ->where('ID_CATEGORY',$_REQUEST['id_category'])
						  ->where('VIEW !=','')
				          ->order_by('VIEW','desc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_top_row']=$top_row;

			$last_row=$this->db->select('*')->from('ebook_index')
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
			$top_row=$this->db->select('*')->from('ebook_index')
						  ->where('VIEW !=','')
				          ->order_by('VIEW','desc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_top_row']=$top_row;

			$last_row=$this->db->select('*')->from('ebook_index')
						  ->where('VIEW !=','')
				          ->order_by('VIEW','asc')
						  ->limit(4)
				          ->get()->result_array();
			$data['book_last_row']=$last_row;
		}
		
		if(isset($_REQUEST['category'])){
			foreach($this->db->select('*')->from('ebook_category')->where('name',$_REQUEST['category'])->get()->result_array() as $key);
			redirect('/book/?id_category='.$key['id']);
		}

//end

$data['elib'] = $results['rows'];     
$data['count_elib']=$results['num_rows'];
$data['pagination'] = $pagination;
$data['category_names']=$this->db->query("select DISTINCT ebook_category.`name` as CATEGORY from ebook_index INNER JOIN ebook_category on ebook_category.id=ebook_index.ID_CATEGORY where ebook_index.REFERER='tailieuhoctapvn' order by ebook_category.name asc")->result_array();
$header= new header();
$header->book('Danh mục sách tham khảo');

$this->load->view('book/category',$data);
}

function voereduvn_m($path1,$path2){
$path1='m/'.$path1;
$this->tailieu_luanvan_doan($path1,$path2);
}

function voereduvn_c($path1,$path2){
$path1='c/'.$path1;
$this->tailieu_luanvan_doan($path1,$path2);
}

function tailieuluanvandoan($path1){
$path2='';
$this->tailieu_luanvan_doan($path1,$path2);
}
//start function
function tailieu_luanvan_doan($path1,$path2){

	$path=$path1.'/'.$path2;
	$db=$this->load->database('thesis_notes',TRUE);
	$book_data=$db->select('ebook_category.id as ID_CATEGORY,ebook_category.NAME as CATE_NAME,ebook_index.*')->from('ebook_index')	
									->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
									->like('ebook_index.path',$path)
									->get()->result_array();
	
	if($book_data){}
	else {
	$book_data=$db->select('ebook_category.id as ID_CATEGORY,ebook_category.NAME as CATE_NAME,ebook_index.*')->from('ebook_index')	
									->join('ebook_category','ebook_category.id=ebook_index.ID_CATEGORY','inner')
									->like('ebook_index.path',$path)
									->get()->result_array();
		if($book_data){}
		else {
				echo '<title>Website đang nâng cấp</title>';
				echo '<meta charset="UTF-8"/>';
				echo '<style type="text/css">#ads_zone16604{margin-top:-600px;margin-left:-599px}</style>';
				echo '<h3>Website đang tạm thời nâng cấp. Bạn vui lòng trở lại sau để đọc nhiều tài liệu hữu ích nhé.</h3>';
				echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17760.ads"></script>';
				echo '<div style="margin-top:-600px;margin-left:598px;"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script></div>';
				echo '<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16604.ads"></script>';
				die();
		}
	}
	$header = new header();
	$header->luanvan($book_data[0]['NAME']);
	$data['book_title']=$book_data[0]['NAME'];
	$data['book_description']=$book_data[0]['DESCRIPTION'];
	$data['book_thumbs']=$book_data[0]['THUMBS'];
	$data['share_id']=$book_data[0]['ID'];
	$data['cate_name']=$book_data[0]['CATE_NAME'];
	$data['id_cate']=$book_data[0]['ID_CATEGORY'];

	$content=file_get_contents($book_data[0]['path']);
	$content=str_replace('Luận văn liên quan','Quảng cáo',$content);
	$content=str_replace('http://thuviengiaoan.vn/giao-an/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
	$content=str_replace('/luan-van/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
	$content=str_replace('/do-an/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
	$content=str_replace('/tai-lieu/','http://myweb.pro.vn/tailieu/thamkhao/',$content);

	//play game for relaxing
	if(preg_match('/nopreview.swf/',$content)){
		echo '<script>alert("File đã bị người dùng xóa, Bạn có thể chơi game Line bên dưới để giải trí một tý");</script>';
		$content=str_replace('/images/nopreview.swf','http://files.vuongquocgame.com/swf/Line98.swf?1435053269.4817',$content);
	}
	//end

	//insert my ads
	$content=str_replace('<div class="doc-preview">','<div style="margin-top: -65px;margin-left: 311px;" class="ants_380x90 below_thesis_description"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/518907464.js"></script></div><div class="doc-preview">',$content);//top_header_adv
	//end
	
	//jquery conflict
	$content=str_replace('//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js?ver=1.7.1','',$content);
	$content=str_replace('jquery.min.js?ver=1.7.1','',$content);

	//filter referer html soucre 
	if(preg_match('/thuviengiaoan.vn/',$book_data[0]['path'])){
		$data['base_link']='http://thuviengiaoan.vn/';
		$content=str_replace('/images/Logo.png','http://myweb.pro.vn/images/banner.jpg',$content);
		$content=str_replace('<div class="sidebar-right-adv">','<div class="remove" style="display:none">',$content);
		$content=str_replace('<div class="post-adv">','<div class="remove" style="display:none">',$content);
	}

	if(preg_match('/giaoan.com.vn/',$book_data[0]['path'])){
		echo '<style type="text/css">.cs95E872D0{margin-left:0px!important}</style>';
		$content=str_replace('/images/Logo.png','http://myweb.pro.vn/images/banner.jpg',$content);
		$data['base_link']='http://giaoan.com.vn/';
		$content=str_replace('<div class="sidebar-right-adv">','<div class="remove" style="display:none">',$content);
		$content=str_replace('<div class="post-adv">','<div class="remove" style="display:none">',$content);
	}
	
	if(preg_match('/doc.edu.vn/',$book_data[0]['path'])){
		$data['base_link']='http://doc.edu.vn/';
		$content=str_replace("ga('create', 'UA-37269087-2', 'doc.edu.vn')",'',$content);
		$content=str_replace('<div class="sidebar-right-adv">','<div class="remove" style="display:none">',$content);
		$content=str_replace('<div class="post-adv">','<div class="remove" style="display:none">',$content);
	}

	if(preg_match('/tailieu.tv/',$book_data[0]['path'])){
		$data['base_link']='http://tailieu.tv/';
		$content=str_replace('Scale=0.95','Scale=0.95&FitWidthOnLoad=true',$content);
		}
	
	if(preg_match('/luanvan365.com/',$book_data[0]['path'])){
		$data['base_link']='http://luanvan365.com/';
	}
	
	if(preg_match('/luanvan.net.vn/',$book_data[0]['path'])){
		$data['base_link']='http://luanvan.net.vn/';
	}

	if(preg_match('/tai-lieu.com/',$book_data[0]['path'])){
		$data['base_link']='http://tai-lieu.com/';
		$content=str_replace('Scale=0.95','Scale=0.95&FitWidthOnLoad=true',$content);
	}
	
	if(preg_match('/doan.edu.vn/',$book_data[0]['path'])){
		$data['base_link']='http://doan.edu.vn/';
	}
	if(preg_match('/doko.vn/',$book_data[0]['path'])){
		$content=str_replace('<div class="page-advertise">','<div class="adv_header_no_border" ><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16658.ads"></script></div><div class="remove" style="display:none">',$content);
		preg_match_all('/<div class="container">(.*?)<div class="doc-reference">/s',$content,$matches,PREG_SET_ORDER);
		foreach($matches as $key);
		$content=$key['0'];
	}
	
	if(preg_match('/voer.edu.vn/',$book_data[0]['path'])){
		$data['base_link']='http://voer.edu.vn/';
		$content=str_replace('</head>','</head>',$content);
		$content=str_replace('class="footer left"','style="display:none" class="remove"',$content);
		$content=str_replace('class="footer"','style="display:none" class="remove"',$content);
		$content=str_replace('with-100','remove',$content);
		$content=str_replace('module-content-comment','remove',$content);
		$content=str_replace('padding-bottom-10','remove',$content);
		$content=str_replace('right-row','remove',$content);
		$content=str_replace('navbar-header','remove',$content);
	}

	
	if(preg_match('/zbook.vn/',$book_data[0]['path'])){
		$data['base_link']='http://zbook.vn/';
	}

	
	//filter view variable
	$str_to_replace='Tài liệu liên quan<span title="Click để đóng" class="relevant-docs-close">Đóng</span>';
	$content=str_replace('Click Like Website luanvan365.com nhé bạn!','',$content);
	$content=str_replace('Vui Lòng click vào','',$content);
	$content=str_replace('/images/banner.jpg','http://myweb.pro.vn/images/banner.jpg',$content);
	$content=str_replace('Luận văn liên quan',$str_to_replace,$content);
	$content=str_replace('Tài liệu liên quan',$str_to_replace,$content);
	$content=str_replace('bên dưới để tải tài liệu :','',$content);
	//end
	
	//prevent google analytics to call server
	$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
	//end

	$data['content']=str_replace('Scale=0.95','FitWidthOnLoad=true',$content);
	$data['content']=str_replace('Scale=1','FitWidthOnLoad=true',$content);
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
	
	//login pop-up  
	if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
	}
	else{
	$data['type']='0';
	}
	//end

	if($book_data[0]['direct_link']){
		$data['is_update']='0';
	}
	else {
		$data['is_update']='1';
	}

	//modal download guide and modal related thesis
	if(isset($_REQUEST['is_modal_download_guide'])){
		$data['is_modal_download_guide']='1';
	}
	if(!isset($_REQUEST['is_modal_download_guide'])) {
		$data['is_modal_download_guide']='0';
	}
	//end

	$data['like']=$book_data[0]['LIKE_COUNT'];
	$data['shared_url']='http://myweb.pro.vn/tailieu-luanvan-doan'.$path;
	$this->load->view('luanvan/tailieu-luanvan-doan',$data);
}
//end function

}

?>