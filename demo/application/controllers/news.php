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
$content=str_replace("<object","<object class='meta'",$content);
$content=str_replace("<meta","<meta class='meta'",$content);
$content=str_replace("<iframe","<iframe class='meta'",$content);
$content=str_replace("Poly_showads","Poly_showads_exit",$content);
$content=str_replace('<img','<img alt="Đọc báo Vnexpress Online" ',$content);
//end

$data['content']=$content;
$this->load->view('news/vnexpress',$data);

$header = new header();
$header->index("Vnexpress","","");
} 

function dantri(){

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
$header->index("Dân trí",'','');
} 


function giaoduc(){
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
$header->index("Báo Giáo Dục TP Hồ Chí Minh","","");
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


function test(){
echo file_get_contents('http://docbo.360game.vn/play-game?dwa_src=other&_svid=29');
}
}

?>