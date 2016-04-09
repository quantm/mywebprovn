<?php
require_once 'application/controllers/web_transfer.php';
require_once 'application/controllers/header.php';
class news extends CI_Controller{
var $url, $indexpage, $segments, $content;

function initiate_news ($url,$indexpage = "") 
{    
   // fix for continue reading 
   $this->indexpage = $indexpage; 
   $find = array (" ","&"); 
   $replace = array ("+","&"); 
   $url = str_replace($find,$replace,$url); 
   $this->url = $url;    
   $this->converturl($this->url,$this->segments); 
} 

function modify_urls() 
    { 
        $tags = array 
        ( 
            'a'          => array('href'), 
            'img'        => array('src', 'longdesc'), 
            'image'      => array('src', 'longdesc'), 
            'frame'      => array('src', 'longdesc'), 
            'iframe'     => array('src', 'longdesc'), 
            'object'     => array('usermap', 'codebase', 'classid', 'archive', 'data'), 
            'script'     => array('src'),            
            'table'      => array('background'), 
            'tr'         => array('background'), 
            'th'         => array('background'), 
            'td'         => array('background'), 
            'embed'      => array('src'), 
        ); 
        preg_match_all("#<\s*([a-zA-Z]+)([^>]+)>#", $this->content, $matches); 

        for ($i = 0, $count_i = count($matches[0]); $i < $count_i; $i++) 
        { 
            $tag = strtolower($matches[1][$i]); 

            if (!isset($tags[$tag]) || !preg_match_all("#([a-zA-Z\-\/]+)\s*(?:=\s*(?:\"([^\">]*)\"?|'([^'>]*)'?|([^'\"\s]*)))?#", $matches[2][$i], $m, PREG_SET_ORDER)) 
            { 
                continue; 
            } 

            $rebuild    = false; 
            $extra_html = $temp = ''; 
            $attrs      = array(); 

            for ($j = 0, $count_j = count($m); $j < $count_j; $attrs[strtolower($m[$j][1])] = (isset($m[$j][4]) ? $m[$j][4] : (isset($m[$j][3]) ? $m[$j][3] : (isset($m[$j][2]) ? $m[$j][2] : false))), $j++); 

            switch ($tag) 
            {                
                case 'object': 
                    if (isset($attrs['usemap'])) 
                    { 
                        $rebuild = true; 
                        $attrs['usemap'] = $this->changeurl($attrs['usemap']); 
                    } 
                    if (isset($attrs['codebase'])) 
                    { 
                        $rebuild = true; 
                        $temp = $this->segments; 
                        $this->converturl($this->changeurl(rtrim($attrs['codebase'], '/') . '/', false), $this->segments); 
                        unset($attrs['codebase']); 
                    } 
                    if (isset($attrs['data'])) 
                    { 
                        $rebuild = true; 
                        $attrs['data'] = $this->changeurl($attrs['data']); 
                    } 
                    if (isset($attrs['classid']) && !preg_match('#^clsid:#i', $attrs['classid'])) 
                    { 
                        $rebuild = true; 
                        $attrs['classid'] = $this->changeurl($attrs['classid']); 
                    } 
                    if (isset($attrs['archive'])) 
                    { 
                        $rebuild = true; 
                        $attrs['archive'] = implode(' ', array_map(array(&$this, 'changeurl'), explode(' ', $attrs['archive']))); 
                    } 
                    if (!empty($temp)) 
                    { 
                        $this->segments = $temp; 
                    } 
                    break; 
                case 'param': 
                    if (isset($attrs['valuetype'], $attrs['value']) && strtolower($attrs['valuetype']) == 'ref' && preg_match('#^[\w.+-]+://#', $attrs['value'])) 
                    { 
                        $rebuild = true; 
                        $attrs['value'] = $this->changeurl($attrs['value']); 
                    } 
                    break;                
            case 'a': 
               if (isset($attrs['href'])) 
               { 
                  $rebuild = true; 
                  $attrs['href'] = $this->changeurl($attrs['href'],false); 
               } 
               break; 
                default: 
                    foreach ($tags[$tag] as $attr) 
                    { 
                        if (isset($attrs[$attr])) 
                        { 
                            $rebuild = true; 
                            $attrs[$attr] = $this->changeurl($attrs[$attr]); 
                        } 
                    } 
                    break; 
            } 

            if ($rebuild) 
            { 
                $new_tag = "<$tag"; 
                foreach ($attrs as $name => $value) 
                { 
                    $delim = strpos($value, '"') && !strpos($value, "'") ? "'" : '"'; 
                    $new_tag .= ' ' . $name . ($value !== false ? '=' . $delim . $value . $delim : ''); 
                } 

                $this->content = str_replace($matches[0][$i], $new_tag . '>' . $extra_html, $this->content); 
            } 
        } 
    } 


 function changeurl($url, $proxify = true)    { 
      $url = trim($url); 
      
	  $fragment = ($hash_pos = strpos($url, '#') !== false) ? '#' . substr($url, $hash_pos) : ''; 
      if (!preg_match('#^[a-zA-Z]+://#', $url)) 
        { 
			$url{0} = empty($url{0}) ? "" : $url{0};
			switch ($url{0}) 
            { 
                case '/': 
                    $url = $this->segments['scheme'] . '://' . $this->segments['host'] . ($this->segments['port'] != 80 ? ':' . $this->segments['port'] : '') . $url;                   
					break; 
                case '?': 
                    $url = $this->segments['base'] . '/' . $this->segments['file'] . $url; 
                    break; 
                case '#': 
                    $proxify = false; 
                    break; 
                case 'm': 
                     if (substr($url, 0, 7) == 'mailto:') 
                     { 
                         $proxify = false; 
                         break; 
                     } 
                default: 
                    $url = $this->segments['base'] . '/' . $url; 
            } 
        } 
      if ($proxify) { 
         $valuereturn = $url; 
      } else { 
          if ($url{0} != '#') {$valuereturn = $this->indexpage . "&id=" . $this->encodeurl($url); } 
      } 
	 
      return $valuereturn; 
} 

function encodeurl(& $url) { 
   $url = rawurlencode($url); 
   return $url; 
} 

function converturl($url, & $container) 
    { 
        $temp = @parse_url($url); 

        if (!empty($temp)) 
        { 
            $temp['port']     = isset($temp['port']) ? $temp['port'] : 80; 
            $temp['path']     = isset($temp['path']) ? $temp['path'] : '/'; 
            $temp['file']     = substr($temp['path'], strrpos($temp['path'], '/')+1); 
            $temp['dir']      = substr($temp['path'], 0, strrpos($temp['path'], '/')); 
            $temp['base']     = $temp['scheme'] . '://' . $temp['host'] . ($temp['port'] != 80 ?  ':' . $temp['port'] : '') . $temp['dir']; 
            $temp['prev_dir'] = $temp['path'] != '/' ? substr($temp['base'], 0, strrpos($temp['base'], '/')+1) : $temp['base'] . '/'; 
            $container = $temp; 

            return true; 
        } 

        return false; 
    } 

function updatecontent($content) { 
   $this->content = $content; 
} 

function getcontent (& $content) { 
   $content = $this->content; 
} 

function start_transfer($url) 
{ 
$this->segments['query'] = empty ($this->segments['query']) ? "" : $this->segments['query'];
$destination = $this->segments['path']."?".$this->segments['query'] ;
$headers = "GET $destination HTTP/1.0\r\n";
$headers .= "Host:".$url."\r\n";
$headers .= "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1\r\n";
$headers .= "Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*\/*;q=0.5\r\n";
$headers .= "Referer: http://".$url."\r\n";
$headers .= "Connection: close\r\n\r\n";
$fp = fsockopen($url,80, $err_no, $err_str, 10);
fwrite($fp,$headers);
$body = empty($body) ? "" : $body;
do   {
$data = fread($fp, 4096);
$body .= $data;
}
while (strlen($data) != 0);
fclose($fp);
$this->content = $body;
}

function vnexpress(){
redirect('/');
if(isset($_REQUEST['id'])){
	$url=$_REQUEST['id'];
	$data['url']="http://myweb.pro.vn/news/vnexpress/?id=".$_REQUEST['id'];
}
if(!isset($_REQUEST['id']))
{
	$url="http://vnexpress.net";
	$data['url']="http://myweb.pro.vn/news/vnexpress/";

}

//filter content
$content=file_get_contents($url);
if($content){}
else {
redirect('/');
}
$content=str_replace("<object","<object class='meta'",$content);
$content=str_replace("<meta","<meta class='meta'",$content);
$content=str_replace("<iframe","<iframe class='meta'",$content);
$content=str_replace("Poly_showads","Poly_showads_exit",$content);
$content=str_replace('<img','<img alt="Đọc báo Vnexpress Online" ',$content);
//end

$data['content']=$content;
$this->load->view('news/vnexpress',$data);

$header = new header();
$header->news("Vnexpress");
} 
function cse(){
$header = new header();
$header->news("Kết quả tìm kiếm tin tức");
$this->load->view('google/cse');
}
function dantri(){
redirect('/');
if(isset($_REQUEST['id'])){
$data['popup']="hide";
$path=str_replace('http://dantri.com.vn','',$_REQUEST['id']);
$url=$_REQUEST['id'];
}

else {
$data['popup']="show";
$path = "/";
$url="http://dantri.com.vn";
}

$indexpage = "?dantri"; 
$this->initiate_news ($url,$indexpage); 
$this->converturl($url,$base);

$content ='';
$this->start_transfer("dantri.com.vn");
$this->getcontent($content);
if ( substr_count($path,"/") == 1 ) { //( strpos($path,"news") > 0 ) {
// index page
preg_match_all('/<div class="fl wid470">(.*?)<div class="fl wid310 box5 admicro">/s',$content,$matches,PREG_SET_ORDER);
// preg_match_all('/<div id="neo-maincontainer" class="clearfix">(.*?)<div class="fl wid310 box5 admicro">/s',$content,$matches,PREG_SET_ORDER);
$match[1] = empty($match[1]) ? "" : $match[1];
$content = '';//'</tr>';
foreach ( $matches as $match ) {
$content .= '<div class="fl wid470">'.$match[1].'<div id="inset-col" class="inset-col">';
//$content .= '</div></div>';


}
$content = preg_replace('/<div id\="neo-maincontainer" class\="clearfix">/s','',$content);
$content = preg_replace('/<div class\="cc-content">/s','',$content);
$content = preg_replace('/<div id\="content-col">/s','',$content);
// ----------------------------------------
} elseif ( strpos($url,"/s") > 0 ) {
// article
// preg_match_all('/<div class="container-bg">(.*?)Quay lại<\/a> \]<\/div>/s',$content,$matches,PREG_SET_ORDER);
preg_match_all('/<div class="fl wid470" >(.*?)<div style="text-align:center; padding-top:5px">/s',$content,$matches,PREG_SET_ORDER);
preg_match_all('/<div id="ctl00_IDContent_divTinMoi">(.*?)<div class="fl wid310 box5 admicro">/s',$content,$matches1,PREG_SET_ORDER);
$match[1] = empty($match[1]) ? "" : $match[1];
foreach ( $matches as $match) {
$content ='<div class="fl wid470" >'.$match[1].'<div style="text-align:center; padding-top:5px">';
}
$content .='<div align="left">';
foreach ( $matches1 as $match) {
$content .='<div id="ctl00_IDContent_divTinMoi">' .$match[1].'<div class="fl wid310 box5 admicro">';
}
$content = preg_replace('/<div class\="fl wid310 box5 admicro">/s','',$content);
// ----------------------------------------
} 

else {
// channel
preg_match_all('/<div class="fl wid470">(.*?)<div class="fl wid310 box5 admicro">/s',$content,$matches,PREG_SET_ORDER);
$content = '';
$match[1] = empty($match[1]) ? "" : $match[1];
foreach ($matches as $match) {
$content .= '<div class="fl wid470">'.$match[1].'<div class="fl wid310 box5 admicro">';
}
$content = preg_replace('/<div class\="fl wid310 box5 admicro">/s','',$content);
}
// ----------------------------------------
//$content .= '<br>Nguon tin: ' .$copy_right.'123';
$this->updatecontent($content);
$this->modify_urls();
$this->getcontent($content);
$data['content']=$content;
$this->load->view("/news/dantri",$data);

//for web crawler
$header = new header();
$header->news("Dân trí");
} 


function giaoduc(){
redirect('/');
if(isset($_REQUEST['id'])){
$data['popup']="hide";
$url=$_REQUEST['id'];
}

else {
$data['popup']="show";
$url="http://www.giaoduc.edu.vn/";
}

$indexpage = "?giaoduc"; 
$this->initiate_news ($url,$indexpage); 
$this->converturl($url,$base);

$content ='';
$this->start_transfer("www.giaoduc.edu.vn");
$this->getcontent($content);
if ( substr_count($url,"/") == 3) {
   // index page 
   preg_match_all('@<div id="r1" class="bodymiddle">(.*?)<div id="p3" class="bodycenter-cols">@s',$content,$matches,PREG_SET_ORDER);   
   $content = '';
   foreach ( $matches as $match ) {
      $content .= '<div id="r1" class="bodymiddle">'.$match[1].'<div id="p3" class="bodycenter-cols">';
   }
 $content = preg_replace('@<div id="p3" class="bodycenter-cols">@s','</div>',$content);
// ----------------------------------------
} 
elseif ( substr_count($url,"/") > 4 )  {
   // article
   preg_match_all('@_UpdatePanel1">(.*?)<div id="searchbydate">@s',$content,$matches1,PREG_SET_ORDER);
   $content = '';
   foreach ( $matches1 as $match) {
      $content .='_UpdatePanel1">' . $match[1] .'<div id="searchbydate">';
   }
  $content = preg_replace('@_UpdatePanel1">@s','',$content);
  $content = preg_replace('@<div id="searchbydate">@s','</div>',$content);
// ----------------------------------------
} 

else {
   // channel
   preg_match_all('@_UpdatePanel1">(.*?)<div id="searchbydate">@s',$content,$matches,PREG_SET_ORDER);
   $content = '';
   foreach ($matches as $match) {
      $content .= '_UpdatePanel1">'.$match[1].'<div id="searchbydate">';
   }
  $content = preg_replace('@_UpdatePanel1">@s','',$content);
  $content = preg_replace('@<div id="searchbydate">@s','</div>',$content);
}
$content=str_replace('<img','<img alt="Đọc báo Giáo Dục Online" ',$content);
// ----------------------------------------
$this->updatecontent($content);
$this->modify_urls();
$this->getcontent($content);
$data['content']=$content;
$this->load->view('/news/giaoduc',$data);
$header = new header();
$header->news("Báo Giáo Dục TP Hồ Chí Minh");
}


function tuoitre(){
$header = new header();
$header->index("Báo Tuổi Trẻ");
$this->load->view('news/tuoitre');
}

function saigontimes(){
$header = new header();
$header->index("SaiGon Times Daily");
$this->load->view('news/saigontimes');
}

//start function general
function general($path,$ref){
	$link='';
	switch($ref){
		case '13':
		$link='http://kenh13.info/'.$path;
		break;
	}
	switch($path){
		case 'c':
		$link='http://kenh13.info/c/'.$ref;
		if(isset($_REQUEST['page'])){
		$link='http://kenh13.info/c/'.$ref.'/page/'.$_REQUEST['page'];
		}
		break;
		case 't':
		$link='http://kenh13.info/t/'.$ref;
		if(isset($_REQUEST['page'])){
		$link='http://kenh13.info/t/'.$ref.'/page/'.$_REQUEST['page'];
		}
		break;
	}
	

	$content=file_get_contents($link);
	if($content) {
	//do nothing
	}
	else {
		redirect('http://myweb.pro.vn/tin-tuc/c/xa-hoi/13');
	}
	$content=str_replace('http://cdn.kenh13.info/v1/images/favicon-kenh13.ico','/images/favicon.ico',$content);
	$content=str_replace('UA-42327122-1','/',$content); //break google analytic tracking code


	//reset advertisement
	$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
	$content=str_replace('<div class="ads">','<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script>',$content);//header adv
	$content=str_replace('<div id="div-ads">','<div class="div-ads"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324875.js"></script>',$content);//bottom adv
	$content=str_replace('<div id="footer-wrap13">','<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324908.js"></script><div id="footer-wrap13" style="display:none">',$content);//bottom adv
	//end

	//prevent google analytics to call server
	$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
	//end
	
	//reset javascript
	$content=str_replace('http://cdn.kenh13.info/v1/js/recent_ajax.js','',$content);
	$content=str_replace('http://cdn.kenh13.info/v1/js/viewsite_ajax.js','',$content);
	//end

	//reset html
	$content=str_replace('<meta name="author" content="kenh13.info">','<meta name="author" content="myweb.pro.vn">',$content);
	$content=str_replace('content="http://kenh13.info/','content="http://myweb.pro.vn/tin-tuc/',$content);
	$content=str_replace('rel="canonical" href="http://kenh13.info/','rel="canonical" href="http://myweb.pro.vn/tin-tuc/',$content);
	$content=str_replace('ket-qua-tim-kiem','ket-qua-tim-kiem-tin-tuc',$content);
	$content=str_replace('id="searchsubmit">','id="searchsubmit"><input type="hidden" name="cx" value="partner-pub-1996742103012878:5084803489" />',$content);
	//end
	
	$data['content']=$content;
	$this->load->view('news/kenh13',$data);
}
//end function general

//start function
function baomoisocom($path){
	$url='http://baomoiso.com/'.$path;
	$content=file_get_contents($url);
	$content=str_replace('UA-64572424-1','',$content);
	$content=str_replace('http://baomoiso.com/wp-content/uploads/2015/06/logo-bao.png','http://raovatnhanh.net.co/images/header/my_news.png',$content);
	$content=str_replace('http://baomoiso.com/wp-content/uploads/2015/06/icon-top.png','http://raovatnhanh.net.co/images/icon/news.png',$content);
	$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js',$content);
	$content=str_replace('<!-- BM - 728x90 - phuhop -->','<div class="517324894" style="position: fixed;" data-ants-zone-id="517324894"></div>',$content);
	$content=str_replace('<!-- BM - 160x600 -->','<div class="517324811" style="position:fixed" data-ants-zone-id="517324811"></div>',$content);
	$data['content']=$content;
	$this->load->view('news/baomoiso',$data);
}
//end function

//start function
function xembaomoicom($path_element_1,$path_element_2,$path_element_3){
	$url='http://xembaomoi.com/'.$path_element_1.'/'.$path_element_2.'/'.$path_element_3;
	$content=file_get_contents($url);
	$content=str_replace('UA-32176555-1','',$content);
	$content=str_replace('<a href="http://xembaomoi.com/">','<a href="http://myweb.pro.vn/doc-bao-online/giai-tri/ngam-sao/">',$content);
	$content=str_replace('http://xembaomoi.com/favicon.ico','http://raovatnhanh.net.co/images/icon/news.png',$content);
	$content=str_replace('http://xembaomoi.com/images/logo.png','http://raovatnhanh.net.co/images/header/my_news.png',$content);
	$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js',$content);
	$content=str_replace('<div align="center">','<div class="530580154" style="position: fixed;" data-ants-zone-id="530580154"></div>',$content);
	$content=str_replace('div id="adv" class="div_viewban">','div id="adv" class="div_viewban"><div class="534383851" style="position:fixed" data-ants-zone-id="534383851"></div>',$content);
	$content=str_replace('http://xembaomoi.com/themes/xbm_extra/js/txsite.js','',$content);
	$data['content']=$content;
	$this->load->view('news/xembaomoi',$data);
}
//end function

//start function
function phunutoday($path_element_1,$path_element_2){
	$url='http://phunutoday.vn/'.$path_element_1.'/'.$path_element_2;
	if($path_element_1=='home'){$url='http://phunutoday.vn/'.$path_element_2;}
	$content=file_get_contents($url);
	
	//reset social shared
	$content=str_replace('UA-46944054-1','',$content);
	$content=str_replace('https%3A%2F%2Fwww.facebook.com%2Fphunutoday.vn','https://www.facebook.com/elearningsocialvn/?ref=hl',$content);
	
	//reset ads
	$content=str_replace('googletag.cmd.push','',$content);
	$content=str_replace('googletag.display','',$content);
	$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js',$content);
	$content=str_replace('https://pagead2.googlesyndication.com/pub-config/ca-pub-1554526196591746.js','//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js',$content);
	$content=str_replace('http://pagead2.googlesyndication.com/pub-config/ca-pub-1554526196591746.js','//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js',$content);
	$content=str_replace('<!-- PNTD - Floating Left -->','<div class="517324793" data-ants-zone-id="517324793"></div>',$content);
	$content=str_replace('<!-- PNTD - Article Right 1 -->','<div class="517324811" data-ants-zone-id="517324811"></div>',$content);
	$content=str_replace('<!-- PNTD - Article Right Sticky -->','<div class="519993167" data-ants-zone-id="519993167"></div>',$content);
	$content=str_replace('<!-- PNTD_XaHoi_Hot1 -->','<div class="517324837" style="position:absolute" data-ants-zone-id="517324837"></div>',$content);
	$content=str_replace('<!-- PNTD - Article 1 -->','<div class="517324859" data-ants-zone-id="517324859"></div>',$content);
	$content=str_replace('<!-- PNTD_KhamPha_Hot2 -->','<div class="522972114" data-ants-zone-id="522972114"></div>',$content);
	$content=str_replace('<!-- PNTD_LamDep_Hot2 -->','<div class="517324837" data-ants-zone-id="517324837"></div>',$content);
	$content=str_replace('<!-- PNTD - Backup LAVA -->','<div class="522972114" data-ants-zone-id="522972114"></div>',$content);
	$content=str_replace('<!-- PNTD_Homepage_Hot2 -->','<div class="522972114" data-ants-zone-id="522972114"></div>',$content);
	$content=str_replace('http://e.eclick.vn/delivery/zone/935.js','//admicro1.vcmedia.vn/ads_codes/ads_box_16604.ads',$content);
	$content=str_replace('<img','<img onerror=this.src="http://raovatnhanh.net.co/images/header/my_news.png"',$content);
	$data['content']=$content;
	$this->load->view('news/phunutoday',$data);
}
//end function

//start function
function emdep($path_element_1,$path_element_2){
	$url='http://emdep.vn/'.$path_element_1.'/'.$path_element_2;
	if($path_element_1=='home'){$url='http://emdep.vn/'.$path_element_2;}
	$content=file_get_contents($url);
	$content=str_replace('UA-51856235-3','',$content);
	$content=str_replace('http://emdep.vn/Images/logo.png','http://raovatnhanh.net.co/images/header/blank.png',$content);

	//reset ads
	$content=str_replace('<div class="ads right">','<div class="ads right"><div class="517324894" data-ants-zone-id="517324894"></div>',$content);
	$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js',$content);
	$content=str_replace('//pagead2.googlesyndication.com/pagead/show_ads.js','//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js',$content);
	$str_ants='<div style="margin-left:-31%"><div class="522972114" data-ants-zone-id="522972114"></div><div style="position: absolute;margin-top:-250px;margin-left:588px;" class="517324859" data-ants-zone-id="517324859"></div></div>';
	$content=str_replace('<!-- emdep_336_280 -->',$str_ants,$content);
	$content=str_replace('<div class="ads1">','<div class="ads1"><div class="521621655" data-ants-zone-id="521621655"></div>',$content);
	//end reset ads
	
	$content=str_replace('<img','<img onerror=this.src="http://raovatnhanh.net.co/images/header/blank.png"',$content);
	
	//render view
	$data['content']=$content;
	$this->load->view('news/emdepvn',$data);
}
//end function
}


?>