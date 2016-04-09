<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class mobile extends CI_Controller {


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

function karaoke(){
if(isset($_REQUEST['csrf_test_name'])){
	
	if(isset($_REQUEST['keyword'])){
		$url='http://m.masokaraoke.net/bai-hat/-/'.$_REQUEST['keyword'].'/avn/Title/';
		$content=file_get_contents($url);
		$str_replace='<ins id="remove_older_ads" style="display:none;margin-top:-2px;"><script>document.getElementById("remove_older_ads").remove()</script>';
		$content=str_replace('<ins class="adsbygoogle"',$str_replace,$content);
		$content=str_replace('m.masokaraoke.net','myweb.pro.vn',$content);
		$content=str_replace("'create', 'UA-41272260-1', 'masokaraoke.net'","'create', 'UA-50476937-1', 'myweb.pro.vn'",$content);
		$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js', '',$content);
		$content=str_replace('(adsbygoogle = window.adsbygoogle || []).push({});', '',$content);
		$content=str_replace('<script async','<ins',$content);
		$content=str_replace('<strong>Mã số karaoke trực tuyến số 1 Việt Nam</strong>','',$content);
		$content=str_replace('<form',$str_replace,$content);
		$content=str_replace('<meta','<metas',$content);
		$content=str_replace('<div id="nav_show22"',$str_replace,$content);
		$content=str_replace('<a href="mailto:info@masokaraoke.net">info@masokaraoke.net</a>','<a href="mailto:012kinglight@gmail.com">012kinglight@gmail.com</a>',$content);
		$content=str_replace('<div id="header"',$str_replace,$content);
		$content=str_replace('<a href="http://www.masokaraoke.net" title="ma so karaoke">www.masokaraoke.net</a>','<a href="http://myweb.pro.vn/" title="Website học tập và giải trí">Học tập và giải trí</a>',$content);
		echo $content;
	}
	if(isset($_REQUEST['category'])){
		$url='http://m.masokaraoke.net/'.$_REQUEST['category'];
		$content=file_get_contents($url);
		$str_replace='<ins id="remove_older_ads" style="display:none;margin-top:-2px;"><script>document.getElementById("remove_older_ads").remove()</script>';
		$content=str_replace('<ins class="adsbygoogle"',$str_replace,$content);
		$content=str_replace('<div id="footer">','<div style="display:none" id="footer">',$content);
		$content=str_replace('m.masokaraoke.net','myweb.pro.vn',$content);
		$content=str_replace('<strong>Mã số karaoke trực tuyến số 1 Việt Nam</strong>','',$content);
		$content=str_replace("'create', 'UA-41272260-1', 'masokaraoke.net'","'create', 'UA-50476937-1', 'myweb.pro.vn'",$content);
		$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js', '',$content);
		$content=str_replace('(adsbygoogle = window.adsbygoogle || []).push({});', '',$content);
		$content=str_replace('<script async','<ins',$content);
		$content=str_replace('<form',$str_replace,$content);
		$content=str_replace('<meta','<metas',$content);
		$content=str_replace('<div id="nav_show22"',$str_replace,$content);
		$content=str_replace('<a href="mailto:info@masokaraoke.net">info@masokaraoke.net</a>','<a href="mailto:012kinglight@gmail.com">012kinglight@gmail.com</a>',$content);
		$content=str_replace('<div id="header"',$str_replace,$content);
		$content=str_replace('<a href="http://www.masokaraoke.net" title="ma so karaoke">www.masokaraoke.net</a>','<a href="http://myweb.pro.vn/" title="Website học tập và giải trí">Học tập và giải trí</a>',$content);
		echo $content;
	}
}
$content=file_get_contents('http://m.masokaraoke.net/');
$str_replace='<div class="remove" style="display:none;margin-top:-2px;">';
$content=str_replace('<form','<div',$content);
$content=str_replace('<input','<input required',$content);
$content=str_replace("'create', 'UA-41272260-1', 'masokaraoke.net'","'create', 'UA-50476937-1', 'myweb.pro.vn'",$content);
$content=str_replace('<script async','<ins',$content);
$content=str_replace('<a href="">Trang Chủ</a>','<a href="/mobile/karaoke/">Trang Chủ</a>',$content);
$content=str_replace('m.masokaraoke.net','myweb.pro.vn',$content);
$content=str_replace('template/Default/images/more.png','/images/mobile/mobile_karaoke_header.gif',$content);
$content=str_replace('<meta','<metas',$content);
$content=str_replace('w3GvPzMjakFLEKflvxV_FWAWkLE','',$content);
$content=str_replace('<div class="song ads_ct" style="margin-top:-2px;">',$str_replace,$content);
$content=str_replace('<div class="song2 ads_ct" style="margin-top:-2px;">',$str_replace,$content,$content);
$data['content']=$content;
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$this->load->view('mobile/karaoke',$data);
}

function test(){
$content=file_get_contents('http://m.masokaraoke.net/bai-hat/-/a+time+for+us/avn/Title/');
preg_match_all('/<div id="resultSong">(.*?)<script/s',$content,$matches,PREG_SET_ORDER);
}
}
?>