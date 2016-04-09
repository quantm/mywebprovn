<?php
class lntn {
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
		//$url ='http://dantri.com.vn'. ($this->segments['port'] != 80 ? ':' . $this->segments['port'] : '') . $url;                    
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
//if ($url{0} != '#') {$valuereturn = "http://myweb.pro.vn/news/dantri?&id=" . $this->encodeurl($url); } 
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
}
?>