<?php class nhaccuatui extends CI_Controller{	
function get_zing_audio($link){
$id = explode('/', $link);
$id = explode('.html', $id[5]);
$id=$id[0];
$api = 'http://api.mp3.zing.vn/api/mobile/song/getsonginfo?keycode=fafd463e2131914934b73310aa34a23f&requestdata={"id":"'.$id.'"}';
$get = file_get_contents($api);

preg_match('/"128":"(.*)",/U', $get, $mp3_128k);
if($mp3_128k){$audio = str_replace('\/', '/', $mp3_128k[1]);}

preg_match('/"320":"(.*)"}/U', $get, $mp3_320k);
if($mp3_320k){$audio = str_replace('\/', '/', $mp3_320k[1]);}
else {$audio='0';}
return $audio;
}

// function get_link_keeng_vn
function get_link_keeng_vn($link){
	$get=file_get_contents($link);

	if(strpos($link, 'audio')) {
		preg_match('/var audioPlayerLink = "(.*)";/U', $get, $link);
		$link = base64_decode($link[1]);
	} 

	elseif(strpos($link, 'album')) {
		preg_match("/var albumPlayerXml = '(.*)';/U", $get, $xml);
		$data_xml = file_get_contents('http://www.keeng.vn'.$xml[1]);
		$title = explode('<title>', $data_xml);
		$arr=array();
		foreach($title as $data) {
			$title = explode('</title>', $data);
			preg_match('/<location>(.*)<\/location>/U', $data, $link);
			if($link){
			$link=str_replace('location','',$link[0]);
			$link=str_replace('<>','',$link);
			$link=str_replace('</>','',$link);
			array_push($arr,$link);
			}
		}
		$link=$arr;
	} 
	elseif(strpos($link, 'video')) {
		$data = explode('<p class="wrap-choice _wrap-choice">', $get);
		$data = explode('</p>', $data[1]);
		preg_match_all('/<a class="choice-item(.+?)" value="(.*)">/U', $data[0], $link);
		foreach($link[2] as $links) {
		$link=$links;		
	}
}

return $link; 
}
//end 

function get_zing_video($link){

$id = explode('/', $link);
$id = explode('.html', $id[5]);
$id=$id[0];

$api = 'http://api.mp3.zing.vn/api/mobile/video/getvideoinfo?keycode=fafd463e2131914934b73310aa34a23f&requestdata={"id":"'.$id.'"}';
$get = file_get_contents($api);

//240k
preg_match('/"240":"(.*)","/U', $get, $mp4_240p);
if($mp4_240p){$video_link = str_replace('\/', '/', $mp4_240p[1]);}

//360k	
preg_match('/"360":"(.*)",/U', $get, $mp4_360p);
if($mp4_360p){$video_link = str_replace('\/', '/', $mp4_360p[1]);}

//480k
preg_match('/"480":"(.*)",/U', $get, $mp4_480p);
if($mp4_480p){$video_link = str_replace('\/', '/', $mp4_480p[1]);}

//720k
//preg_match('/"720":"(.*)",/U', $get, $mp4_720p);
//if($mp4_720p){$video_link = str_replace('\/', '/', $mp4_720p[1]);}

//1080k
//preg_match('/"1080":"(.*)"}/U', $get, $mp4_1080p);
//if($mp4_1080p){$video_link = str_replace('\/', '/', $mp4_1080p[1]);}

if(preg_match('/adtimaserver/',$video_link)){
$video_link=explode('},',$video_link);
$video_link=$video_link[0];
$video_link=str_replace('"','',$video_link);	
}
return $video_link;
}
function get_zing_playlist($id){
$get = file_get_contents('compress.zlib://'.$id);
if($get){} else {
die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
}
preg_match_all('/<!-- END .info-top-play -->(.*?)<!-- END .player -->/s',$get,$matches,PREG_SET_ORDER);
return $matches[0];
}
function get_nhaccuatui_link($link){
$link = explode('.', $link);
//Link down chât lượng 128k
$link_128 = 'http://www.nhaccuatui.com/download/song/'.$link[3].'_128';
$get_128 = file_get_contents($link_128);
preg_match('/"stream_url":"(.*)","/U', $get_128, $mp3_128k);
if($mp3_128k){$audio = str_replace('\/', '/', $mp3_128k[1]);}

//Link down chât lượng 320k
$link_320 = 'http://www.nhaccuatui.com/download/song/'.$link[3];
$get_320 = file_get_contents($link_320);
preg_match('/"stream_url":"(.*)","/U', $get_320, $mp3_320k);
if($mp3_320k){$audio = str_replace('\/', '/', $mp3_320k[1]);}				
else {$audio='0';}
return $audio;
}
function get_nhaccuatui_video_link($link,$list){
$get = file_get_contents($link);
preg_match_all('/<a href="(.*)" id="(.*)" index="0" play_key="(.*)" key="(.*)" playlist_key="(.*)" title="(.*)">/U', $get, $xml);

for($i=$list; $i>=0; $i--) {
$get_xml = file_get_contents('http://v.nhaccuatui.com/flash/xml?key='.$xml[3][$i]);
$data = explode('<item>', $get_xml);
foreach($data as $list) {
//Get title
$title = explode('<title><![CDATA[', $list);
$title = explode(']]></title>', $title[1]);
echo $title[0].'<br>';
//Get link mp4
$link = explode('<location><![CDATA[', $list);
$link = explode(']]></location>', $link[1]);
echo $link[0].'<br><hr>';
}
}
}
function get_nhaccuatui_playlist($url)
{
$get = file_get_contents($url);
preg_match('/&amp;file=(.*)" \/>/U', $get, $xml);
$get_xml = file_get_contents($xml[1]);
$title = explode('<title>', $get_xml);
foreach($title as $list) {
$data = explode('</title>', $list);

//Get title
$title = explode('<![CDATA[', $data[0]);
$title = explode(']]>', $title[1]);
echo $title[0].'<br>';

//Get link mp3
$link = explode('<location>', $data[1]);
$link = explode('</location>', $link[1]);
$link_mp3 = explode('<![CDATA[', $link[0]);
$link_mp3 = explode(']]>', $link_mp3[1]);
echo $link_mp3[0].'<br><hr>';
}
}

function baihat($path_element_1,$path_element_2,$referer){
$my_db=$this->load->database('default',TRUE);
if($referer);else{redirect('/');}
switch($referer){
case 'nhaccuatui':
$url='http://www.nhaccuatui.com/'.$path_element_1.'/'.$path_element_2;					

//query the database
$r=$my_db->select('*')->from('music_index')->where('referer','nhaccuatui')->where('fetch_link',$url)->get()->result_array();
if($r){}
else {
	$r[0]=array('id'=>'100','fetch_link'=>'','embed_content'=>'','type'=>'','name'=>'Nghe nhạc Online - myweb.pro.vn');
	$ads_object='';
	$data['vis']='<script type="text/javascript">$(document).ready(function(){$(".btn-danger").remove()})</script>';
	$fb='';
}

//music related
$music_related=$my_db->select('*')->from('music_index')
->where('referer','nhaccuatui')
->where('id >',$r[0]['id'])
->limit(11)
->get()->result_array();	

//media type
if($r[0]['type']=='video'){
	$data['vis']='<script type="text/javascript">$(document).ready(function(){$(".btn-danger").attr("style","margin-top:155px;margin-left:175px;")})</script>';
	$ads_object='';
	$fb='<div id="comment" style="margin-top:75px" class="fb-comments tab-pane  fade in active" data-width="auto" data-numposts="5" data-colorscheme="light"></div>';
}
if($r[0]['type']=='audio') {
	$data['vis']='<script type="text/javascript">$(document).ready(function(){$(".music_content").scroll(function(){var scrollTop=$(this).scrollTop();if(scrollTop !="0"){$("#music_pagination_ajax_loading").hide()}if(scrollTop =="0"){$("#music_pagination_ajax_loading").show("slow")}});$("#music_pagination_ajax_loading").attr("style","margin-left:67%;margin-top:30%;").show("slow");$("#text_ajax_loading").html($("title").html()).attr("style","color:#FFFFFF;margin-top: 100px;margin-left:-400px")})</script>';
	$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/530580154.js"></script><div style="display:none" class="music_bottom_ads"><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16575.ads"></script></div>';//300x250
	$fb='<div id="comment" style="margin-top:75px" class="fb-comments tab-pane  fade in active" data-width="auto" data-numposts="5" data-colorscheme="light"></div>';
}
if($r[0]['type']=='playlist') {
	$data['vis']='<script type="text/javascript">$(document).ready(function(){$(".btn-danger,#comment").remove()})</script>';
	$ads_object='<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/530580154.js"></script>';//300x250
	$fb='';
}

$content=file_get_contents($url);
$content=str_replace('script','div style="display:none"',$content);
$content=str_replace('UA-273986-19','',$content);
$content=str_replace('UA-273986-1','',$content);
$content=str_replace('UA-273986-1','',$content);
$content=str_replace('nhaccuatui.com','myweb.pro.vn/nhaccuatui/baihat',$content);

//render view nhaccuatui
$data['referer']='nhaccuatui';
$data['content']='<div class="music_object"><div class="music_header_ads">'.$ads_object.'</div>'.$r[0]['embed_content'].'<div style="clear:both"></div><div class="below_music_object"><button title="Cho phép trình duyệt mở cửa sổ popup để tải về" onclick=download("nhaccuatui","'.$r[0]['fetch_link'].'")  class="btn btn-danger">Tải về</button></div></div>'.$fb;
$data['music_data']=$content;
break;

case 'nhacsonet':
$url='http://nhacso.net/'.$path_element_1.'/'.$path_element_2;
$r=$my_db->select('*')->from('music_index')->where('referer','nhacsonet')->where('fetch_link',$url)->get()->result_array();

//music related
$music_related=$my_db->select('*')->from('music_index')
->where('referer','nhacsonet')
->where('id >',$r[0]['id'])
->limit(10)
->get()->result_array();	

$config='{"controls":true,"autoplay":true,"preload":true,"loop":true}';

//variable for rendering view
$ads_object='<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script>'; //728x110
$htm5_video='<h3>'.$r[0]['name'].'</h3><div style="clear:both"></div><video width="800" height="600" data-setup='.$config.' class="video-js vjs-default-skin my_htm5_video">
<source src='.$r[0]['embed_content'].' type="video/mp4"/>
<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that 
<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
</p>
</video>';

//render view nhacsonet
$data['vis']='';
$fb='<div id="comment" style="margin-top:75px" class="fb-comments tab-pane  fade in active" data-width="auto" data-numposts="5" data-colorscheme="light"></div>';
$data['referer']='nhacsonet';
$data['music_data']='';
$data['content']='<div class="music_object">'.$htm5_video.'<div style="clear:both"></div><div style="margin-top:630px;margin-left:20px;" class="music_bottom_ads">'.$ads_object.'</div></div>'.$fb;
break;

case 'keeng':
$r=$my_db->select('*')->from('music_index')
->where('referer','www.keeng.vn')
->like('fetch_link',$path_element_2)
->get()->result_array();
//music related
$music_related=$my_db->select('*')->from('music_index')
->where('referer','www.keeng.vn')
->where('id >',$r[0]['id'])
->limit(14)
->get()->result_array();	

if($r[0]['type']=='audio'){
$data['vis']='<script type="text/javascript">$(document).ready(function(){$(".music_content").scroll(function(){var scrollTop=$(this).scrollTop();if(scrollTop !="0"){$("#music_pagination_ajax_loading").hide()}if(scrollTop =="0"){$("#music_pagination_ajax_loading").show("slow")}});$("#music_pagination_ajax_loading").attr("style","margin-left:67%;margin-top:30%;").show("slow");$("#text_ajax_loading").html("").attr("style","margin-top: -300px!important;margin-left: 45px!important;color:azure")})</script>';
$ads_object='<div style="margin-top:485px;" class="music_bottom_ads"><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script>'; 
}
if($r[0]['type']=='video'){
$data['vis']='';
$ads_object='<div style="margin-top:630px;margin-left:30px" class="music_bottom_ads"><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script>'; 
}

$config='{"controls":true,"autoplay":false,"preload":true,"loop":true}';
$media=$this->get_link_keeng_vn($r[0]['fetch_link']);

//variable for rendering view
$fb='<div id="comment" style="margin-top:75px" class="fb-comments tab-pane  fade in active" data-width="auto" data-numposts="5" data-colorscheme="light"></div>';
$htm5_video='<video width="800" height="600" data-setup='.$config.' class="video-js vjs-default-skin my_htm5_audio">
<source src='.$media.' type="video/mp4"/>
<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that 
<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
</p>
</video>';

//render view www.keeng.vn
$data['referer']='keeng';
$data['music_data']='';
$data['content']='<div class="music_object"><h3 class="font-effect-fire media-title">'.$r[0]['name'].'</h3><div style="clear:both"></div>'.$htm5_video.'<div style="clear:both"></div>'.$ads_object.'</div></div>'.$fb;
break;

case 'nhackhongloivn':
$r=$my_db->select('*')->from('music_index')
->where('referer','nhackhongloivn.com')
->like('fetch_link',$path_element_2)
->get()->result_array();
if($r){}else{redirect('/');}
//music related
$music_related=$my_db->select('*')->from('music_index')
->where('referer','nhackhongloivn.com')
->where('id >',$r[0]['id'])
->limit(12)
->get()->result_array();	

$content=file_get_contents($r[0]['fetch_link']);
$content=str_replace('UA-53018733-1','',$content);
$ads_object='<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script>'; //728x110
$fb='<div id="comment" style="margin-top:75px" class="fb-comments tab-pane  fade in active" data-width="auto" data-numposts="5" data-colorscheme="light"></div>';

//render view nhackhongloivn.com
$data['vis']='<script type="text/javascript">$(document).ready(function(){$(".music_content").scroll(function(){var scrollTop=$(this).scrollTop();if(scrollTop !="0"){$("#music_pagination_ajax_loading").hide()}if(scrollTop =="0"){$("#music_pagination_ajax_loading").show("slow")}});$("#music_pagination_ajax_loading").attr("style","margin-left:50%;margin-top:20%;").show("slow");$("#text_ajax_loading").html($("title").html()).attr("style","color:#FFFFFF;margin-top: 100px;margin-left: -275px")})</script>';
$data['referer']='nhackhongloivn';
$data['music_data']=$content;
$data['content']='<div class="music_object"><h3>'.$r[0]['embed_content'].'<div style="clear:both"></div><div class="music_bottom_ads" style="margin-top: 70%;margin-left:30px">'.$ads_object.'</div></div>'.$fb;
break;

case 'youtube':
$r=$my_db->select('*')->from('music_index')
->where('referer','www.muviza.com')
->like('fetch_link',$path_element_2)
->get()->result_array();
//music related
$music_related=$my_db->select('*')->from('music_index')
->where('referer','www.muviza.com')
->where('id >',$r[0]['id'])
->limit(8)
->get()->result_array();	

$config='{"controls":true,"autoplay":true,"preload":"none","techOrder":["youtube"],"src":"'.$r[0]['embed_content'].'"}';
$htm5_youtube_video='<h2 class="video_title_vnhaccuatui font-effect-fire">'.$r[0]['name'].'</h2><video width="800" height="600" data-setup='.$config.' class="video-js vjs-default-skin my_htm5_video"></video>';
$ads_object='<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script>'; //728x110
$fb='<div id="comment" style="margin-top:75px" class="fb-comments tab-pane  fade in active" data-width="auto" data-numposts="5" data-colorscheme="light"></div>';

//render view youtube
$data['vis']='';
$data['referer']='youtube';
$data['music_data']='';
$data['content']='<div class="music_object">'.$htm5_youtube_video.'<div style="clear:both"></div><div class="music_bottom_ads" style="margin-top:630px;margin-left:30px">'.$ads_object.'</div></div>'.$fb;
break;

case 'zing':
$r=$my_db->select('*')->from('music_index')
->where('referer','mp3zing')
->like('fetch_link',$path_element_1.'/'.$path_element_2)
->get()->result_array();

//music related
$music_related=$my_db->select('*')->from('music_index')
->where('referer','mp3zing')
->where('id >',$r[0]['id'])
->limit(11)	
->get()->result_array();	
switch($r[0]['type']){
case 'audio':
$data['vis']='<script type="text/javascript">$(document).ready(function(){$(".music_content").scroll(function(){var scrollTop=$(this).scrollTop();if(scrollTop !="0"){$("#music_pagination_ajax_loading").hide()}if(scrollTop =="0"){$("#music_pagination_ajax_loading").show("slow")}});$("#music_pagination_ajax_loading").attr("style","margin-left:67%;margin-top:30%;").show();$("#text_ajax_loading").html("").attr("style","margin-top: -300px!important;margin-left: 45px!important;color:azure")})</script>';
if(preg_match('/bai-hat/',$r[0]['fetch_link'])){
$download_referer="zing_audio";
$media=$this->get_zing_audio($r[0]['fetch_link']);
}
if(preg_match('/video-clip/',$r[0]['fetch_link'])){
$download_referer="zing_video";
$media=$this->get_zing_video($r[0]['fetch_link']);
}

$config='{"controls":true,"autoplay":true,"preload":true,"loop":true}';
$ads_object='<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script>'; //728x110

//variable for rendering view
$htm5_video='<h3 style="margin-top: 180px;position: absolute;z-index:10000;" class="font-effect-emboss media-title">'.$r[0]['name'].'</h3><div style="clear:both"></div><button style="position:relative!important;margin-left:91%!important;margin-top:-45px!important"  onclick=download("'.$download_referer.'","'.$r[0]['fetch_link'].'")  title="Cho phép trình duyệt mở cửa sổ popup để tải về" class="btn btn-danger btn-download">Tải về</button><video width="800" height="600" data-setup='.$config.' class="video-js vjs-default-skin my_htm5_audio">
<source src='.$media.' type="video/mp4"/>
<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that 
<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
</p>
</video>';
$fb='<div id="comment" style="margin-top:75px" class="fb-comments tab-pane  fade in active" data-width="auto" data-numposts="5" data-colorscheme="light"></div>';
break;

case 'video':
if(preg_match('/bai-hat/',$r[0]['fetch_link'])){
$download_referer="zing_audio";
$media=$this->get_zing_audio($r[0]['fetch_link']);
}
if(preg_match('/video-clip/',$r[0]['fetch_link'])){
$download_referer="zing_video";
$media=$this->get_zing_video($r[0]['fetch_link']);
}
$config='{"controls":true,"autoplay":true,"preload":"true"}';

//variable for rendering view	
$ads_object='<div style="margin-top:630px;margin-left:-30px;"><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script></div>';
$data['vis']='';
$htm5_video='<h3 class="font-effect-fire media-title">'.$r[0]['name'].'</h3><div style="clear:both"></div><button onclick=download("'.$download_referer.'","'.$r[0]['fetch_link'].'") title="Cho phép trình duyệt mở cửa sổ popup để tải về"  class="btn btn-danger btn-download">Tải về</button><video width="800" height="600" data-setup='.$config.' class="video-js vjs-default-skin my_htm5_video">
<source  src='.$media.' type="video/mp4" />
<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that 
<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
</p>
</video>';
$fb='<div id="comment" style="margin-top:75px" class="fb-comments tab-pane  fade in active" data-width="auto" data-numposts="5" data-colorscheme="light"></div>';
break;

case 'playlist':
$media=$this->get_zing_playlist($r[0]['fetch_link']);
$ads_object='';
$data['vis']='';
//variable for rendering view
$htm5_video='<script type="text/javascript" src="http://xahoihoctap.net.vn/js/zing.js"></script><h3 class="font-effect-fire media-title">'.$r[0]['name'].'</h3><div class="videojs_wrapper"></div>'.$media[0];
$fb='';
break;
}

//render view zing
$data['referer']='zing';
$data['music_data']='';
$data['content']='<div class="music_object">'.$htm5_video.'<div style="clear:both"></div><div style="margin-top: 445px;" class="music_bottom_ads">'.$ads_object.'</div></div>'.$fb;
//end
break;

}

//page background
$arr_img=array();
for($img_index=102;$img_index<127;$img_index++){
array_push($arr_img,$img_index);
}
$i = rand(0, count($arr_img)-1); // generate random number size of the array

//render view
$data['id_image'] = "$arr_img[$i]";
$data['name']=$r[0]['name'];
$data['related']=$music_related;
$data['thumb']='http://haivl.top/meme/templates/If_you_know_what_i_mean.jpg';
$data['share_url']='http://myweb.pro.vn/nhaccuatui/baihat/'.$path_element_1.'/'.$path_element_2.'/'.$referer;
$data['csrf_test_name']=$this->security->get_csrf_hash();
$this->load->view('music/template-web-kit-3d',$data);
}
}?>