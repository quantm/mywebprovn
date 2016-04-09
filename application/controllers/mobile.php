<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
require_once 'application/controllers/nhaccuatui.php';
class mobile extends CI_Controller {

function baihat($path_element_1,$path_element_2,$referer){

//player background
$arr_img=array();
for($img_index=102;$img_index<127;$img_index++){
	array_push($arr_img,$img_index);
}
$i = rand(0, count($arr_img)-1); // generate random number size of the array
$player="http://xahoihoctap.net.vn/images/background/music/slide".$arr_img[$i].".jpg";
//end

$my_db=$this->load->database('default',TRUE);

$link = new nhaccuatui();
if($referer);else{redirect('/');}
switch($referer){
case 'nhaccuatui':
$url='http://www.nhaccuatui.com/'.$path_element_1.'/'.$path_element_2;

//query the database
$r=$my_db->select('*')->from('music_index')->where('referer','nhaccuatui')->where('fetch_link',$url)->get()->result_array();

if($r){}
else {
	$r[0]=array('id'=>'100','fetch_link'=>'','embed_content'=>'','type'=>'','name'=>'Nghe nhạc Online - myweb.pro.vn');
	$media=$link->get_nhaccuatui_link($url);
	$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/523499233.js"></script><div style="clear:both;height:15px"></div>';//mobile ads 320x50
	$html5_audio='<div><span class="font-effect-fire">'.$r[0]['name'].'</span><audio style="width:90%" autoplay controls loop><source src='.$media.'></source</audio></div>';
	$data['vis']='<script type="text/javascript">$(document).ready(function(){$(".btn-danger").remove()})</script>';
	$data['content']='<div class="music_object"><div class="music_header_ads">'.$ads_object.'</div>'.$html5_audio.'<div style="clear:both"></div></div>';
	$fb='';
}

//music related
$music_related=$my_db->select('*')->from('music_index')
->where('referer','nhaccuatui')
->where('id >',$r[0]['id'])
->limit(3)
->get()->result_array();	

switch($r[0]['type']){
	case 'video':
	$ads_object='<div style="margin-left: 622px !important"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/523499233.js"></script></div>';//mobile ads 320x50
	$url='http://m.nhaccuatui.com/'.$path_element_1.'/'.$path_element_2;
	$content=file_get_contents($url);
	$mp4=explode('<a',$content);
	for($i=0;$i<count($mp4);$i++){
		if(preg_match('/.mp4/',	$mp4[$i])){
			$link=str_replace('">','',$mp4[$i]);
			$link=explode('href=',$link);
			$link=explode('.mp4',$link[1]);
			$link=$link[0].'.mp4';
			$link=str_replace('"','',$link);
		}
	}
	$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/523499233.js"></script><div style="clear:both;height:15px"></div>';//mobile ads 320x50
	$html5_video='<div><span class="font-effect-fire">'.$r[0]['name'].'</span><video poster="'.$player.'" style="width:90%" autoplay controls loop><source src='.$link.'></source</video></div>';
	$data['content']='<div class="music_object"><div class="music_header_ads">'.$ads_object.'</div>'.$html5_video.'<div style="clear:both"></div></div>';
	break;

	case 'audio':
	$media=$link->get_nhaccuatui_link($url);

	$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/523499233.js"></script><div style="clear:both;height:15px"></div>';//mobile ads 320x50
	$html5_audio='<div><span class="font-effect-fire">'.$r[0]['name'].'</span><audio style="width:90%" autoplay controls loop><source src='.$media.'></source</audio></div>';
	$data['content']='<div class="music_object"><div class="music_header_ads">'.$ads_object.'</div>'.$html5_audio.'<div style="clear:both"></div></div>';
	break;

	case 'playlist':
	$url='http://m.nhaccuatui.com/'.$path_element_1.'/'.$path_element_2;
	$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/530052041.js"></script><div style="clear:both;height:15px"></div>';//mobile ads 300x250
	$swf_audio='<div><span class="font-effect-fire">'.$r[0]['name'].'</span>'.$r[0]['embed_content'].'</div>';
	$data['content']='<div class="music_object"><div class="music_header_ads" style="position:absolute;margin-left:0px;margin-top:20px;">'.$ads_object.'</div>'.$swf_audio.'<div style="clear:both"></div></div>';
	break;
}

$content=file_get_contents($url);
$content=str_replace('UA-273986-19','',$content);
$content=str_replace('UA-273986-1','',$content);
$content=str_replace('UA-273986-1','',$content);
$content=str_replace('nhaccuatui.com','myweb.pro.vn/nhaccuatui/baihat',$content);

//render view nhaccuatui
$data['referer']='nhaccuatui';
$data['music_data']='';
break;

case 'nhacsonet':
$url='http://nhacso.net/'.$path_element_1.'/'.$path_element_2;
$r=$my_db->select('*')->from('music_index')->where('referer','nhacsonet')->where('fetch_link',$url)->get()->result_array();

//music related
$music_related=$my_db->select('*')->from('music_index')
->where('referer','nhacsonet')
->where('id >',$r[0]['id']-3)
->where('id <',$r[0]['id']+3)
->get()->result_array();	

//$ads_object='<div style="margin-left: 622px !important"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/519993167.js"></script></div>';//160x600

$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/523499233.js"></script>'; //mobile ads 320x50
$htm5_video='<h3>'.$r[0]['name'].'</h3><div style="clear:both"></div><video id="html_5_video" autoplay preload="auto" poster="'.$player.'" controls><source src='.$r[0]['embed_content'].'></source></video>';

//render view nhacsonet
$data['referer']='nhacsonet';
$data['music_data']='';
$data['content']='<div class="music_object">'.$htm5_video.'<div style="clear:both"></div><div style="margin-top:15px;" class="music_bottom_ads">'.$ads_object.'</div></div>';
break;

case 'keeng':
$r=$my_db->select('*')->from('music_index')
	   ->where('referer','www.keeng.vn')
	   ->like('fetch_link',$path_element_2)
	   ->get()->result_array();
//music related
$music_related=$my_db->select('*')->from('music_index')
->where('referer','www.keeng.vn')
->where('id >',$r[0]['id']-3)
->where('id <',$r[0]['id']+3)
->get()->result_array();	

$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/523499233.js"></script>';//mobile ads 320x50
//render view www.keeng.vn
$data['referer']='keeng';
$data['music_data']='';
$data['content']='<div class="music_object keeng"><h5>'.$r[0]['name'].'</h5><div style="clear:both"></div>'.$r[0]['embed_content'].'<div style="clear:both"></div><div class="music_bottom_ads">'.$ads_object.'</div></div>';
break;
case 'nhackhongloivn':
$r=$my_db->select('*')->from('music_index')
	   ->where('referer','nhackhongloivn.com')
	   ->like('fetch_link',$path_element_2)
	   ->get()->result_array();
//music related
$music_related=$my_db->select('*')->from('music_index')
->where('referer','nhackhongloivn.com')
->where('id >',$r[0]['id']-3)
->where('id <',$r[0]['id']+3)
->get()->result_array();	

$content=file_get_contents($r[0]['fetch_link']);

$content=str_replace('UA-53018733-1','',$content);

$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/523499233.js"></script>';//mobile ads 320x50

//render view nhackhongloivn.com
$data['referer']='nhackhongloivn';
$data['music_data']=$content;
$data['content']='<div class="music_object"><h3>'.$r[0]['name'].'</h3>'.$r[0]['embed_content'].'<div style="clear:both"></div><div class="nhackhong_wrapper"></div><div class="music_bottom_ads" style="margin-top: 65%;">'.$ads_object.'</div></div>';
break;

case 'youtube':
$r=$my_db->select('*')->from('music_index')
	   ->where('referer','www.muviza.com')
	   ->like('fetch_link',$path_element_2)
	   ->get()->result_array();
//music related
$music_related=$my_db->select('*')->from('music_index')
->where('referer','www.muviza.com')
->where('id >',$r[0]['id']-3)
->where('id <',$r[0]['id']+3)
->get()->result_array();	

$htm5_youtube_video='	<iframe width="300" height="300" id="htm5_youtube_video_muviza" style="margin-left:-7px;" src="https://www.youtube.com/'.$r[0]['embed_content'].'?autoplay=1" frameborder="0" allowfullscreen></iframe>';

$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/523499233.js"></script>';//mobile ads 320x50

//render view youtube
$data['referer']='youtube';
$data['music_data']='';
$data['content']='<div class="music_object">'.$htm5_youtube_video.'<div style="clear:both"></div><div class="music_bottom_ads" style="margin-top:1%;">'.$ads_object.'</div></div>';
break;

case 'zing':
$r=$my_db->select('*')->from('music_index')
	   ->where('referer','mp3zing')
	   ->like('fetch_link',$path_element_1.'/'.$path_element_2)
	   ->get()->result_array();

//music related
$music_related=$my_db->select('*')->from('music_index')
->where('referer','mp3zing')
->where('id >',$r[0]['id']-3)
->where('id <',$r[0]['id']+3)	
->get()->result_array();	

switch($r[0]['type']){
case 'audio':
if(preg_match('/bai-hat/',$r[0]['fetch_link'])){
$media=$link->get_zing_audio($r[0]['fetch_link']);
}
if(preg_match('/video-clip/',$r[0]['fetch_link'])){
$media=$link->get_zing_video($r[0]['fetch_link']);
}

//variable for rendering view
$htm5_video='<h5>'.$r[0]['name'].'</h5><div style="clear:both"></div><video id="html_5_video"  src='.$media.' autoplay loop poster="'.$player.'"  controls></video>';
break;

case 'video':
if(preg_match('/bai-hat/',$r[0]['fetch_link'])){
$media=$link->get_zing_audio($r[0]['fetch_link']);
}
if(preg_match('/video-clip/',$r[0]['fetch_link'])){
$media=$link->get_zing_video($r[0]['fetch_link']);
}
//variable for rendering view	
$htm5_video='<h5>'.$r[0]['name'].'</h5><div style="clear:both"></div><video id="html_5_video" src='.$media.' autoplay poster="'.$player.'" controls ></video>';
break;

case 'playlist':
$media=$link->get_zing_playlist($r[0]['fetch_link']);

//variable for rendering view
$htm5_video='<script type="text/javascript" src="http://xahoihoctap.net.vn/js/zing.js"></script><h5>'.$r[0]['name'].'</h5><div style="clear:both"></div><video id="html_5_video" autoplay preload="auto" poster="'.$player.'" controls></video>'.$media[0];
break;
}

$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/523499233.js"></script>'; //320x50

//render view zing
$data['referer']='zing';
$data['music_data']='';
$data['content']='<div class="music_object">'.$htm5_video.'<div style="clear:both"></div><div style="margin-top: 15px;" class="music_bottom_ads">'.$ads_object.'</div></div>';
//end
break;

}			
$data['name']=$r[0]['name'];
$data['related']=$music_related;
$data['thumb']='http://haivl.top/meme/templates/If_you_know_what_i_mean.jpg';
$data['share_url']='http://myweb.pro.vn/nhaccuaui/baihat/'.$path_element_1.'/'.$path_element_2.'/'.$referer;
$data['csrf_test_name']=$this->security->get_csrf_hash();
$this->load->view('mobile/template-web-kit-3d',$data);
}
//end function

function symphonny_video(){

if(isset($_REQUEST['id'])){
$path=str_replace('http://nhackhongloi.org','',$_REQUEST['id']);
$url=$_REQUEST['id'];
}

else {
$path = "/";
$url="http://www.nhackhongloi.org/xem-video-mobile.html";
}
$indexpage = "?nhackhongloi"; 

$trans= new web_transfer();
$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("www.nhackhongloi.org");
$trans->getcontent($content);

//start social plugin
$content=str_replace('<div id="controls">','<div class="social"><a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a><div  data-size="medium" class="g-plusone"></div><div class="fb-like" data-href="http://myweb.pro.vn/music/nhackhongloi/" data-layout="button_count" data-action="recommend" data-show-faces="true" data-share="true"></div></div>',$content);
//end social plugin

$content=str_replace('/xem-video-mobile.html','http://myweb.pro.vn/mobile/symphonny_video/',$content);

$content=str_replace('upload/duk/icon//logo.png','http://myweb.pro.vn/images/mobile/mobile_header.gif',$content);
$content=str_replace('<div id="social">','<div id="social" style="display:none">',$content);
$content=str_replace('style="width:100%;display:inline-block;"','id="fb_album_remove" style="display:none"',$content);
$content=str_replace('http://www.facebook.com/nhackhongloi','https://www.facebook.com/elearningsocialvn?ref=hl',$content);

//start change the url
$content=str_replace('www.nhacthien.net','myweb.pro.vn/music/meditation/',$content);
$content=str_replace('nhackhongloi.org','myweb.pro.vn/music/nhackhongloi/',$content);
$content=str_replace('www.tinhkhucbathu.com','myweb.pro.vn/music/tinhkhucbathu/',$content);
$content=str_replace('www.nhacphap.com','myweb.pro.vn/music/nhacphap/',$content);
//end change the url

$content=str_replace('/skins','http://www.nhackhongloi.org/skins/',$content);
$content=str_replace('</body>','<p class="append_footer_iframe"><p/></body>',$content);
preg_match_all('/<body>(.*?)<p class="append_footer_iframe">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key_music);
$data['content']=$key_music[0];
$this->load->view('mobile/nhackhongloi',$data);
}


function nhackhongloi(){

if(isset($_REQUEST['id'])){
$path=str_replace('http://nhackhongloi.org','',$_REQUEST['id']);
$url=$_REQUEST['id'];
}

else {
$path = "/";
$url="http://www.nhackhongloi.org/trang-chu-mobile.html";
}
$indexpage = "?nhackhongloi"; 

$trans= new web_transfer();
$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("www.nhackhongloi.org");
$trans->getcontent($content);

//start social plugin
$content=str_replace('<div id="controls">','<div class="social"><a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a><div  data-size="medium" class="g-plusone"></div><div class="fb-like" data-href="http://myweb.pro.vn/music/nhackhongloi/" data-layout="button_count" data-action="recommend" data-show-faces="true" data-share="true"></div></div>',$content);
//end social plugin

$content=str_replace('/xem-video-mobile.html','http://myweb.pro.vn/mobile/symphonny_video/',$content);
$content=str_replace('trang-chu-mobile.html','http://myweb.pro.vn/mobile/nhackhongloi/',$content);

$content=str_replace('upload/duk/icon//logo.png','http://myweb.pro.vn/images/mobile/mobile_header.gif',$content);
$content=str_replace('<div id="social">','<div id="social" style="display:none">',$content);
$content=str_replace('style="width:100%;display:inline-block;"','id="fb_album_remove" style="display:none"',$content);
$content=str_replace('http://www.facebook.com/nhackhongloi','https://www.facebook.com/elearningsocialvn?ref=hl',$content);

//start change the url
$content=str_replace('www.nhacthien.net','myweb.pro.vn/music/meditation/',$content);
$content=str_replace('nhackhongloi.org','myweb.pro.vn/music/nhackhongloi/',$content);
$content=str_replace('www.tinhkhucbathu.com','myweb.pro.vn/music/tinhkhucbathu/',$content);
$content=str_replace('www.nhacphap.com','myweb.pro.vn/music/nhacphap/',$content);
//end change the url

$content=str_replace('/skins','http://www.nhackhongloi.org/skins/',$content);
$content=str_replace('</body>','<p class="append_footer_iframe"><p/></body>',$content);
preg_match_all('/<body>(.*?)<p class="append_footer_iframe">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key_music);
$data['content']=$key_music[0];
$this->load->view('mobile/nhackhongloi',$data);
}

function karaoke($sort_by = 'name', $sort_order = 'asc', $offset = 0){

		//new model instance
		$this->load->model('mobile_model');

		$per_page  = 3;
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
		$results = $this->mobile_model->SelectAll_Karaoke($per_page, $offset, $sort_by, $sort_order);     

		//pagination
		$this->load->library('pagination'); 
		$config['total_rows'] = $results['num_rows'];
		$config['per_page'] = $per_page; 
		$config['next_link'] = '-»'; 
		$config['prev_link'] = '«-'; 
		$config['num_tag_open'] = ''; 
		$config['num_tag_close'] = ''; 
		$config['num_links'] = 5; 
		$config['cur_tag_open'] = '<a class="currentpage">'; 
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['base_url'] = 'http://myweb.pro.vn/ma-so-karaoke';
		$config['uri_segment'] = 2; 
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		
		//render view
		$data['content'] = $results['rows'];     
		$data['total_rows']=$results['num_rows'];
		$data['pagination'] = $pagination;
		$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
		$this->load->view('mobile/karaoke',$data);	
}
function karaoke_view_search($path1,$path2){
$this->template_masokaraokenet($path1,$path2);
}

function karaoke_view_cate($path){
$this->template_masokaraokenet($path,'cate_view');
}

}
?>