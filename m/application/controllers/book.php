<?php
require_once 'application/controllers/analytic.php';
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class book extends CI_Controller
{
//start filter_html function
function filter_html($content){
$content=str_replace('<form name="loctailieu" id="loctailieu" action="" method="post">','<form name="loctailieu" id="loctailieu" action="" method="post" style="display:none">',$content);
$content=str_replace("window.onload = activeLink;","",$content);
$content=str_replace('jQuery( "#accordion1" ).accordion({autoHeight: false, collapsible: true,icons:icons, active:0});','jQuery( "#accordion1" ).accordion({autoHeight: false, collapsible: true,icons:icons, active:0,event: "click"});',$content);
$content=str_replace("<a","<span",$content);
$content=str_replace("delete_session(jQuery(this).attr('val'))","",$content);
$content=str_replace("rgb(0, 173, 238)","",$content);
$content=str_replace("onclick=","",$content);
$content=str_replace("Allow pop-ups for tailieuhoctap.vn","myweb.pro.vn",$content);
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

//start search function
function search(){
	$search=$this->input->post('search');
	$search_data=$this->db->select('*')->from('ebook_index')->like('NAME',$search)->get()->result_array();
	$data['search_data']=$search_data;
	$this->load->view('book/search',$data);
}
//end search function

//start audio function
function audio(){
$header = new header();
$header->index("Kho sách nói","/book/audio","Enter để tìm theo tên sách...");
$trans= new web_transfer();
$url='http://audiobox.vn/';
$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("audiobox.vn");
$trans->getcontent($content);	
var_dump($content);
}
//end audio function

function index()
{
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
foreach($matches_pagination as $key_pagination);
preg_match_all('/<div id="ja-left1" class="ja-col  column" style="width:99.5%">(.*?)<div class="ja-moduletable moduletable tag  clearfix" id="Mod52">/s',$content,$matches_left,PREG_SET_ORDER);
preg_match_all('/<div class="blog">(.*?)<div class="pagination clearfix">/s',$content,$matches_main,PREG_SET_ORDER);
if($matches_main){}
else{
	redirect("/news/giaoduc/");
}
if($matches_pagination){}
else{
	redirect("/news/giaoduc/");
}
foreach($matches_left as $key_left);
foreach($matches_main as $main);
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

//load database setting
$db=$this->load->database('thesis_notes',TRUE);

$data['book']=$db->select('*')->from('ebook_index')->limit(0,100)->get()->result_array();

//login pop-up  
if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
}
else{
	$data['type']='0';
}
//end

//start analytic
$analytic = new analytic();
$analytic->myweb('general');
//end analytic

$this->load->view('book/index',$data);
$header = new header();
$header->book("Download tài liệu học tập - Phiên bản mobile");
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

//start detail function
function detail(){
$header_title = '';
$trans= new web_transfer();
//start if
if(!isset($_REQUEST['book_id'])){
	if(!isset($_REQUEST['id'])){
		redirect('/book/index');
	}
	else {
			$book_data='';
			if(isset($_REQUEST['book_title'])){
				$book_data=$this->db->select('*')->from('ebook_index')->where('NAME',$_REQUEST['book_title'])->get()->result_array();			
			}
			else {
				$book_data=$this->db->select('*')->from('ebook_index')->where('ID',$_REQUEST['id'])->get()->result_array();	
			}
		if($book_data){
		foreach($book_data as $key);
		$url="http://tailieuhoctap.vn".$key['path'];
		$data['book_id']=$key['path'];
		$data['book_title']=$key['NAME'];
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

//load database setting
$db=$this->load->database('thesis_notes',TRUE);

$check_exist=$db->select('*')->from('ebook_index')->where('NAME',$book_title)->get()->result_array();
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
		$db->insert('ebook_index',$data);
		$data['share_id']=$this->db->insert_id();
		$book_id_comment=$this->db->insert_id();
}
else {
	$book_data=$db->select('*')->from('ebook_index')->where('NAME',$_REQUEST['book_title'])->get()->result_array();
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
}
//end else

$header = new header();
$header->book($header_title );

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
	$data['content']=$matches_main[0].$related_content;
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
}
else {
	redirect('book/index');
}
//load comment
$data_comment=$db->select('*')->from('fk_user_book_comment')
					  ->join('qtht_users','qtht_users.ID_U=fk_user_book_comment.ID_U','inner')
					  ->where('ID_BOOK',$book_id_comment)
					  ->get()->result_array();
//end

//start analytic
$analytic = new analytic();
$analytic->myweb('book');
//end analytic

$data['data_comment']=$data_comment;

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
else{
	$data['type']='0';
}
//end


//get category
$url_cate='http://tailieuhoctap.vn/tai-lieu-hoc-tap/';
$indexpage_cate='/';
$base_cate='/';
$trans->initiate_news ($url_cate,$indexpage_cate); 
$trans->converturl($url_cate,$base_cate);
$content_category ='';
$trans->start_transfer("tailieuhoctap.vn");
$trans->getcontent($content_category);	
$content_category=$this->filter_html($content_category);

preg_match_all('/<div id="ja-left1" class="ja-col  column" style="width:99.5%">(.*?)<div class="ja-moduletable moduletable tag  clearfix" id="Mod52">/s',$content_category,$matches_left,PREG_SET_ORDER);
foreach($matches_left as $key_left);
$left='<div id="ja-left" class="column sidebar"><div class="ja-colswrap clearfix ja-l1"><div id="ja-left1" class="ja-col  column" style="width:98%">'.$key_left[1].'</div></div></div>';
//end
$data['left_category']=$left;
$this->load->view('/book/detail',$data);
}
//end detail function

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

//start analytic
$analytic = new analytic();
$analytic->myweb('book');
//end analytic

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
				  ->get()->result_array();
if($data_book_check){
	echo "1";
}
else {
	echo "0";
}

}
//end

//start function
function get_book(){
	$data=array('ID_CATEGORY'=>'19',
				'REFERER'=>'luanvannetvn',
				'NAME'=>trim($_REQUEST['name']),
				'DESCRIPTION'=>$_REQUEST['description'],
				'path'=>$_REQUEST['path'],
				'THUMBS'=>$_REQUEST['thumbs']);
	$book_data=$this->db->select('*')->from('ebook_index')->where('path',$_REQUEST['path'])->get()->result_array();		
	if($book_data){
		echo '1';
	}
	else {
			$this->db->insert('ebook_index',$data);
			echo $this->db->insert_id();
	}
}
//hocthuat.vn
//end function

//start function
function get_tl(){
	$data=array('ID_CATEGORY'=>'31',
				'REFERER'=>'luanvannetvn',
				'NAME'=>trim($_REQUEST['name']),
				'DESCRIPTION'=>$_REQUEST['description'],
				'path'=>$_REQUEST['path'],
				'THUMBS'=>$_REQUEST['thumbs']);
	$book_data=$this->db->select('*')->from('ebook_index')->where('path',$_REQUEST['path'])->get()->result_array();		
	if($book_data){
		echo '1';
	}
	else {
			$this->db->insert('ebook_index',$data);
			echo $this->db->insert_id();
	}
}
//hocthuat.vn
//end function


function cse(){
	$header = new header();
	$header->book("Kết quả tìm kiếm");
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
}

function count_book_view () {
	$query = $this->db->select("*")->from("ebook_index")->where("ID",$this->input->get_post('book_id'))->get()->result_array();
	foreach($query as $key){
	$count=$key['VIEW']+1;
	$arr=array('VIEW'=>$count);
	$this->db->where("ID",$this->input->get_post('book_id'));
	$this->db->update("ebook_index", $arr);
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

function all(){
$header = new header();
$header->index("Tủ sách học tập","/book/index","Enter để tìm sách tham khảo, luận văn...");
$data['book']=$this->db->select('*')->from('ebook_index')->limit(0,100)->get()->result_array();

//start analytic
$analytic = new analytic();
$analytic->myweb('general');
//end analytic

$this->load->view('book/all',$data);
$this->output->cache(3);
}

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

function update_link(){;
	$this->db->where('ID',$_REQUEST['id']);
	$this->db->where('REFERER','luanvannetvn');
	$this->db->update('ebook_index',array('direct_link'=>$_REQUEST['direct_link']));
}

function test(){
echo filesize('http://data.tailieuhoctap.vn/books/ngoai-ngu/toefl-ielts-toeic/file_goc_771264.pdf');
exit();
$url_related=file_get_contents('http://tailieuhoctap.vn/chi-tiet-sach/179-nganh-cong-nghe-thong-tin/quan-tri-mang/782424-bai-giang-ccna-goc-cua-cisco-tieng-viet');
$url_related=str_replace('<script>','<div style="display:none">',$url_related);
$url_related=str_replace('</script>','</div>',$url_related);
preg_match_all('/<div class="moduletable">(.*?)<style>/s',$url_related,$matches,PREG_SET_ORDER);
foreach($matches as $key_m);
echo $key_m['0'];
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

}
?>
