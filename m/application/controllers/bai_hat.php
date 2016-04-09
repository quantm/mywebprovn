<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class bai_hat extends CI_Controller {

function index(){
$header = new header();
$page_link = $this->input->post('paging_link');
if($page_link=='0')
{
	if(isset($_REQUEST['search'])){
	$search=str_replace(" ","+",$_REQUEST['search']);
	$url="http://mp3.zing.vn/tim-kiem/bai-hat.html?q=".$search;
	$header->index($search,"/music/index/","Enter để tìm bài hát, album, video...");
	if(isset($_REQUEST['is_header_search'])){
		$data['style_ads']="margin-top: 6%!important;margin-left: 38%!important;";	
	}
	else {
		$data['style_ads']="margin-top: 15%!important;margin-left: 35%!important";
	}

	}
	else {
			$url='http://mp3.zing.vn/tim-kiem/bai-hat.html?q=Nhạc+trẻ';
				$header->index("Nhạc trẻ","/music/index/","Enter để tìm bài hát, album, video...");
			$data['style_ads']="";
		}

}
else {
	$header->index("Âm nhạc","/music/index/","Enter để tìm bài hát, album, video...");
	$url='http://mp3.zing.vn'.$page_link;
}
$zing_data=file_get_contents($url);
$zing_data=str_replace("<a","<span",$zing_data);
$zing_data=str_replace("Đăng bởi: ","",$zing_data);
preg_match_all('/<div class="content" id="_content">(.*?)<div class="footer">/s',$zing_data,$matches,PREG_SET_ORDER);
foreach($matches as $key);
$data['content']=$key[1];
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$data['music']=$this->db->select('*')->from('music_index')->get()->result_array();
$this->load->view('music/index',$data);
}

function general(){
$header = new header();
$header->index("Tổng hợp","","");
}

function dance(){
$header = new header();
$header->index("Tuyển tập nhạc dance","","");
$data['title']='';
$this->load->view('music/dance',$data);
}


function hoatau(){
$header = new header();
$header->index("Tổng hợp","","");
echo file_get_contents("http://www.nhachoatau.info/");
}

function song(){
if(!isset($_REQUEST['song_id'])) {
	redirect('/music/index/');
}
$header = new header();
$song_id=$this->input->post('song_id');
$song_name=rtrim($this->input->post('song_name'));
$header->index($song_name,"/music/index/","Tìm kiếm bài hát, video");
$data['url']='http://mp3.zing.vn'.$song_id;
$data['song_link']=$this->input->post('song_link');
$data['song_name']=$song_name;
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$this->load->view('music/song',$data);
}

function ins_db(){
$data= array('name'=>strip_tags($_REQUEST['name']),'referer'=>$_REQUEST['referer']);
if($this->db->select('*')->from('music_index')->where('referer',$_REQUEST['referer'])->get()->result_array()){
}
else {
$this->db->insert('music_index',$data);
} 
}

function giangsinh(){
$header = new header();
$header->index('Nhạc giáng sinh',"","");
$data['title']='';
$this->load->view('music/nhac_giang_sinh',$data);
}

function album(){
$header = new header();
$song_name="Nghe nhạc tại website học tập và giải trí myweb.pro.vn";
$song_id=$this->input->post('song_id');
$header->index($song_name,"/music/index/","Tìm kiếm bài hát, video");
$data['url']='http://mp3.zing.vn'.$song_id;
$data['song_link']=$this->input->post('song_link');
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$this->load->view('music/album',$data);
}

//start function
function nhackhongloi() {
$header = new header();

//start filter client variable
if(isset($_REQUEST['tag'])){
$url="http://nhackhongloi.org/trang-chu.html?tag=".$_REQUEST['tag'];
$data['url']="http://myweb.pro.vn/music/nhackhongloi?tag=".$_REQUEST['tag'];
}
if(isset($_REQUEST['in_id'])){
$url="http://nhackhongloi.org/trang-chu.html?in_id=".$_REQUEST['in_id'];
$data['url']="http://myweb.pro.vn/music/nhackhongloi?in_id=".$_REQUEST['in_id'];
}

if(isset($_REQUEST['order'])){
$url="http://nhackhongloi.org/trang-chu.html?order=".$_REQUEST['order'];
$data['url']="http://myweb.pro.vn/music/nhackhongloi?order=".$_REQUEST['order'];
}
if(isset($_REQUEST['sort'])){
$url="http://nhackhongloi.org/trang-chu.html?sort=".$_REQUEST['sort'];
$data['url']="http://myweb.pro.vn/music/nhackhongloi?sort=".$_REQUEST['sort'];
}

if(isset($_REQUEST['keyword'])){
$url="http://nhackhongloi.org/tim-kiem.html?keyword=".$_REQUEST['keyword'];
$data['url']="http://myweb.pro.vn/music/nhackhongloi?keyword=".$_REQUEST['keyword'];
}

if(isset($_REQUEST['id'])){
	$url="http://nhackhongloi.org/nghe-nhac.html?id=".$_REQUEST['id'];
	if(isset($_REQUEST['title'])){
		$data['url']="http://myweb.pro.vn/music/nhackhongloi?id=".$_REQUEST['id']."&title=".$_REQUEST['title'];
	}
	else {
	$data['url']="http://myweb.pro.vn/music/nhackhongloi?id=".$_REQUEST['id'];
	}
}

if(isset($_REQUEST['slide'])){
$url="http://www.nhackhongloi.org/trang-chu.html?slide=".$_REQUEST['slide'];
$data['url']="http://myweb.pro.vn/music/nhackhongloi?slide=".$_REQUEST['slide'];
}

if(isset($_REQUEST['title'])){
	$header->index($_REQUEST['title'],'','');
	$data['title']=$_REQUEST['title'];
}


if(!isset($_REQUEST['title'])){
	$header->index('Nhạc không lời','','');
	$data['title']='Tuyển tập nhạc không lời';
}

if(!isset($_REQUEST['tag']) && !isset($_REQUEST['tag']) && !isset($_REQUEST['sort']) && !isset($_REQUEST['id']) && !isset($_REQUEST['keyword']) && !isset($_REQUEST['slide']) && !isset($_REQUEST['in_id'])) {
	$path = "/";
	$url="http://nhackhongloi.org";
	$data['url']="http://myweb.pro.vn/music/nhackhongloi";
	$data['fb_thumb']='http://wallpaperest.com/wallpapers/abstract-other-rose-on-the-piano-keys_073914.jpg';
}
else {
	$rand=mt_rand(1,149);
	$data['fb_thumb']='http://nhackhongloi.org/upload/gallery/slide'.$rand.'.jpg';
}
//end

$indexpage = "?nhackhongloi"; 

$trans= new web_transfer();
$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("nhackhongloi.org");
$trans->getcontent($content);

//start social plugin
$content=str_replace('<div id="controls">','<div class="social"><a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a><div  data-size="medium" class="g-plusone"></div><div class="fb-like" data-href="http://myweb.pro.vn/music/nhackhongloi/" data-layout="button_count" data-action="recommend" data-show-faces="true" data-share="true"></div></div>',$content);
$content=str_replace('https://www.facebook.com/nhackhongloi','https://www.facebook.com/elearningsocialvn?ref=hl',$content);
//end social plugin

//hide right element
$content=str_replace('<a href="" class="music-button">','<a style="display:none" href="http://myweb.pro.vn/music/nhackhongloi/" class="music-button">',$content);
$content=str_replace('<a href="xem-video.html" class="video-button">','<a href="xem-video.html" style="display:none" class="video-button">',$content);
//end

$content=str_replace('chon-slide-img.html','http://myweb.pro.vn/music/music_bg',$content);
$content=str_replace('danh-sach-nhac.html','http://myweb.pro.vn/music/music_temp_list',$content);
$content=str_replace('danh-sach-nhac-cu.html','http://myweb.pro.vn/music/music_temp_equip',$content);

$content=str_replace('NKL FANPAGE','<i>HỌC TẬP VÀ GIẢI TRÍ</i>',$content);
$content=str_replace('name="keyword"','name="keyword" required',$content);
$content=str_replace('action="tim-kiem.html"','action="http://myweb.pro.vn/music/nhackhongloi"',$content);
$content=str_replace('trang-chu.html?order=1','http://myweb.pro.vn/music/nhackhongloi?order=1',$content);
$content=str_replace('trang-chu.html?order=2','http://myweb.pro.vn/music/nhackhongloi?order=2',$content);
$content=str_replace('<div id="social">','<div id="social" style="display:none">',$content);
$content=str_replace('style="width:100%;display:inline-block;"','id="fb_album_remove" style="display:none"',$content);
$content=str_replace('http://www.facebook.com/nhackhongloi','https://www.facebook.com/elearningsocialvn?ref=hl',$content);

//start change the url
$content=str_replace('<a href="http://www.mangamnhac.net">MẠNG ÂM NHẠC</a>','<a href="http://myweb.pro.vn/music/index/">NHẠC TRẺ</a>',$content);
$content=str_replace('trang-chu-mobile.html','http://myweb.pro.vn/mobile/nhackhongloi',$content);
$content=str_replace('www.nhacthien.net','myweb.pro.vn/music/meditation',$content);
$content=str_replace('www.nhacdance.net','myweb.pro.vn/music/dance',$content);
$content=str_replace('nhackhongloi.org','myweb.pro.vn/music/nhackhongloi',$content);
$content=str_replace('www.tinhkhucbathu.com','myweb.pro.vn/music/tinhkhucbathu',$content);
$content=str_replace('www.nhacphap.com','myweb.pro.vn/music/nhacphap',$content);
//end change the url

//$content=str_replace('<span class="text-button">Slide</span>','<span class="text-button">Hình nền</span>',$content);
$content=str_replace('</body>','<p class="append_footer_iframe"><p/></body>',$content);
preg_match_all('/<body>(.*?)<p class="append_footer_iframe">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key_music);
$data['content']=$key_music[0];
$this->load->view('/music/nhackhongloi',$data);
}
//end function

function meditation() {
$header = new header();
$header->index("Nhạc thiền","","");

if(isset($_REQUEST['id'])){
	if($_REQUEST['id']=='nhacphat')
	{
		$url='http://nhacthien.net/nhacphat.htm';
	}
}

else {
$path = "/";
$url="http://www.nhacthien.net/";
}
$indexpage = "?nhacthien"; 

$trans= new web_transfer();
$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("www.nhacthien.net");
$trans->getcontent($content);

//start social plugin
$content=str_replace('<div id="controls">','<div class="social"><a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a><div  data-size="medium" class="g-plusone"></div><div class="fb-like" data-href="http://myweb.pro.vn/music/meditation/" data-layout="button_count" data-action="recommend" data-show-faces="true" data-share="true"></div></div>',$content);
//end social plugin

//hide right element
$content=str_replace('<a href="" class="music-button">','<a href="http://myweb.pro.vn/music/meditation/" class="music-button">',$content);
$content=str_replace('<a href="xem-video.html" class="video-button">','<a href="xem-video.html" style="display:none" class="video-button">',$content);
//end

$content=str_replace('<li><a href="http://www.cakhucbathu.com">CA KHÚC BẤT HỦ</a></li>','<li style="dislay:none" id="cakhucbathu"><a href="http://www.cakhucbathu.com">CA KHÚC BẤT HỦ</a></li><script>document.getElementById("cakhucbathu").remove();</script>',$content);
$content=str_replace('<li><a href="http://www.petalia.org">PETALIA NETWORK</a>','<a style="display:none" id="petalia_temp_remove" href="http://www.petalia.org">PETALIA NETWORK</a></li><script>document.getElementById("petalia_temp_remove").remove();</script>',$content);
$content=str_replace('<div id="social">','<div id="social" style="display:none">',$content);
$content=str_replace('style="width:100%;display:inline-block;"','id="fb_album_remove" style="display:none"',$content);
$content=str_replace('http://www.facebook.com/nhackhongloi','https://www.facebook.com/elearningsocialvn?ref=hl',$content);

//start change the url
$content=str_replace('<a href="http://www.nhacthien.net">TRỞ LẠI NHẠC THIỀN</a>','<a href="http://myweb.pro.vn/music/meditation/">TRỞ LẠI NHẠC THIỀN</a>',$content);
$content=str_replace('<a href="http://www.mangamnhac.net">MẠNG ÂM NHẠC</a>','<a href="http://myweb.pro.vn/music/general/">TỔNG HỢP</a>',$content);
$content=str_replace('Nhạc thiền trên Facebook','Học tập và giải trí',$content);
$content=str_replace('data-href="http://nhacthien.net"','data-href="http://myweb.pro.vn/music/meditation/"',$content);
$content=str_replace('www.facebook.com/nhacthien','www.facebook.com/elearningsocialvn?ref=hl',$content);
$content=str_replace('nhackhongloi.org','myweb.pro.vn/music/nhackhongloi',$content);
$content=str_replace('www.tinhkhucbathu.com','myweb.pro.vn/music/tinhkhucbathu',$content);
$content=str_replace('www.nhacphap.com','myweb.pro.vn/music/nhacphap',$content);
$content=str_replace('http://nhacthien.net/nhacphat.htm','http://myweb.pro.vn/music/meditation?id=nhacphat',$content);
$content=str_replace('www.nhacdance.net','myweb.pro.vn/music/dance/',$content);
//end change the url

$content=str_replace('/skins','http://www.nhackhongloi.org/skins/',$content);
$content=str_replace('</body>','<p class="append_footer_iframe"><p/></body>',$content);
preg_match_all('/<body>(.*?)<p class="append_footer_iframe">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key_music);
$data['content']=$key_music[0];
$this->load->view('/music/nhacthien',$data);
}
function music_bg(){
$content=file_get_contents('http://www.nhackhongloi.org/chon-slide-img.html');
$content=str_replace('<a href="chon-slide.html">','<div style="cursor:pointer"',$content);
$func="parent.document.getElementsByClassName('cboxIframe')[0].remove()";
$content=str_replace('XEM TẤT CẢ </a>','onclick='.$func.'>ĐÓNG</div>',$content);
$replace_str='onclick=parent.window.open("http://myweb.pro.vn/music/nhackhongloi?"+this.getAttribute("href").split("?")[1],"_parent");this.setAttribute("href","#")';
echo str_replace('target="_parent"',$replace_str,$content);
}

//danh sách nhạc
function music_temp_list(){
$content=file_get_contents('http://www.nhackhongloi.org/danh-sach-nhac.html');
$content=str_replace('danh-sach-nhac-cu.html','http://myweb.pro.vn/music/music_temp_equip',$content);
$content=str_replace('danh-sach-tags.html','http://myweb.pro.vn/music/music_temp_tag',$content);
$content=str_replace('danh-sach-nhac.html','http://myweb.pro.vn/music/music_temp_list',$content);
$content=str_replace('xem-tat-ca.html','http://myweb.pro.vn/music/music_temp_all',$content);
$content=str_replace('<a href="chon-slide.html">','<div style="cursor:pointer"',$content);
$func="parent.document.getElementsByClassName('cboxIframe')[0].remove()";
$content=str_replace('XEM TẤT CẢ </a>','onclick='.$func.'>ĐÓNG</div>',$content);
$replace_str='onclick=parent.window.open("http://myweb.pro.vn/music/nhackhongloi?"+this.getAttribute("href").split("?")[1],"_parent");'.$func;
echo str_replace('target="_parent"',$replace_str,$content);
}

//phân loại theo nhạc cụ
function music_temp_equip(){
$content=file_get_contents('http://www.nhackhongloi.org/danh-sach-nhac-cu.html');
$content=str_replace('<a href="chon-slide.html">','<div style="cursor:pointer"',$content);
$func="parent.document.getElementsByClassName('cboxIframe')[0].remove()";
$content=str_replace('XEM TẤT CẢ </a>','onclick='.$func.'>ĐÓNG</div>',$content);
$replace_str='onclick=parent.window.open("http://myweb.pro.vn/music/nhackhongloi?"+this.getAttribute("href").split("?")[1],"_parent");'.$func;
echo str_replace('target="_parent"',$replace_str,$content);
}


//tất cả
function music_temp_all(){
$content=file_get_contents('http://www.nhackhongloi.org/xem-tat-ca.html');
$content=str_replace('<a href="chon-slide.html">','<div style="cursor:pointer"',$content);
$func="parent.document.getElementsByClassName('cboxIframe')[0].remove()";
$content=str_replace('XEM TẤT CẢ </a>','onclick='.$func.'>ĐÓNG</div>',$content);
$replace_str='onclick=parent.window.open("http://myweb.pro.vn/music/nhackhongloi?"+this.getAttribute("href").split("?")[1],"_parent");'.$func;
echo str_replace('target="_parent"',$replace_str,$content);
}

//phân loại theo tag
function music_temp_tag(){
$content=file_get_contents('http://www.nhackhongloi.org/danh-sach-tags.html');
$content=str_replace('<a href="chon-slide.html">','<div style="cursor:pointer"',$content);
$func="parent.document.getElementsByClassName('cboxIframe')[0].remove()";
$content=str_replace('XEM TẤT CẢ </a>','onclick='.$func.'>ĐÓNG</div>',$content);
$replace_str='onclick=parent.window.open("http://myweb.pro.vn/music/nhackhongloi?"+this.getAttribute("href").split("?")[1],"_parent");'.$func;
echo str_replace('target="_parent"',$replace_str,$content);
}

function nhacphap() {
$header = new header();
$header->index("Nhạc Pháp","/music/index/","Tìm kiếm bài hát");
$this->load->view('/music/nhacphap');
//$this->output->cache(3);
}

function tinhkhucbathu() {
$header = new header();
$header->index("Tình khúc bất hủ","/music/index/","Tìm kiếm bài hát");
$this->load->view('/music/tinhkhucbathu');
//$this->output->cache(3);
}

function quehuong(){
$header = new header();
$header->index("Nhạc quê hương","/music/index/","Tìm kiếm bài hát");

if(isset($_REQUEST['id'])){
$path=str_replace('http://www.nhachaynhat.net/','',$_REQUEST['id']);
$url=$_REQUEST['id'];
}

else {
$path = "/";
$url="http://www.nhachaynhat.net/2013/11/lien-khuc-nhac-que-huong-hay-nhat.html";
}

$indexpage = "?quehuong"; 

$trans= new web_transfer();
$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("www.nhachaynhat.net");
$trans->getcontent($content);
$data['content']=$content;
$this->load->view('music/quehuong',$data);
}

function karaoke(){
$header = new header();
$header->index("Tra mã số karaoke","/music/karaoke/","Nhập tên, lời đầu bài hát hoặc ca sỹ");
$content ='';

if(isset($_REQUEST['search'])){
$url="http://webzone.vn/karaoke/tim-kiem.html?keyword=".$_REQUEST['search'];
}

if(!isset($_REQUEST['search'])) {
$url="http://webzone.vn/karaoke/";
}
$indexpage = "?karaoke"; 
$trans= new web_transfer();
$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$trans->start_transfer("webzone.vn");
$trans->getcontent($content);
if(!isset($_REQUEST['search'])) {
	for($i=1;$i<809;$i++){
		$content=str_replace('webzone.vn/karaoke/page/'.$i,'myweb.pro.vn/music/karaoke?search=A',$content);
	}
}
$content=str_replace('http://webzone.vn/karaoke/tim-kiem.html?keyword','/music/karaoke?search',$content);
$content=str_replace('Kết quả tìm được','',$content);
$content=str_replace('Hiển thị kết quả trang thứ','Trang',$content);
$content=str_replace('class="adsence"','class="adsence" style="display: none;',$content);
$content=str_replace('glyphicon glyphicon-thumbs-up','fa fa-hand-o-up fa-2x',$content);
preg_match_all('/<div class="main-content">(.*?)<footer class="footer">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key);
$data['content']=$key[1];
$this->load->view('music/karaoke',$data);
}
function test(){
echo file_get_contents("https://www.khanacademy.org/");
}

}
?>