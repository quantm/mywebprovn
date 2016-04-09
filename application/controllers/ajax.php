<?php class ajax extends CI_Controller{

function thesis_autocomple_search(){
$db=$this->load->database('admin_education',TRUE);
$r=$db->select('NAME,ID')->from('ebook_index')->like('NAME',$_REQUEST['thesis_name'])->limit(50)->get()->result_array();
$json=array('thesis_name'=>$r);
echo json_encode($json);
}

function get_karaoke_autocomple(){
$db=$this->load->database('default',TRUE);
$r=$db->select('name')->from('karaoke_num_code')
->like('name',$_REQUEST['song_name'])
->or_like('description',$_REQUEST['song_name'])
->limit(10)->get()->result_array();
$json=array('song_name'=>$r);
echo json_encode($json);
}
function get_mobile_karaoke_autocomple(){
$db=$this->load->database('default',TRUE);

$arr_first=array();
for($first_index=1;$first_index<250;$first_index++){
array_push($arr_first,$first_index);
}

$first = rand(0, count($arr_first)-1);

$arr_last=array();
for($last_index=1;$last_index<750;$last_index++){
array_push($arr_last,$last_index);
}

$last = rand(0, count($arr_last)-1);

if($first>$last){
$r=$db->select('name,id')->from('karaoke_num_code')
->where('id <',$first)
->where('id >',$last)
->get()->result_array();
}
else {
$r=$db->select('name')->from('karaoke_num_code')
->where('id >',$first)
->where('id <',$last)
->get()->result_array();
}

$json=array('song_name'=>$r);
echo json_encode($json);
}

function get_zing_media($id){
$media=$this->get_zing_video($id);
if($media!=0){echo $media;}
if($media==0){echo $this->get_zing_audio($id);}
}
function get_zing_video($id){
$media=0;
$api = 'http://api.mp3.zing.vn/api/mobile/video/getvideoinfo?keycode=fafd463e2131914934b73310aa34a23f&requestdata={"id":"'.$id.'"}';
$get = file_get_contents($api);

preg_match('/"240":"(.*)","/U', $get, $mp4_240p);
if($mp4_240p){$media = str_replace('\/', '/', $mp4_240p[1]);}

preg_match('/"360":"(.*)",/U', $get, $mp4_360p);
if($mp4_360p){$media = str_replace('\/', '/', $mp4_360p[1]);}

preg_match('/"480":"(.*)",/U', $get, $mp4_480p);
if($mp4_480p){$media = str_replace('\/', '/', $mp4_480p[1]);}

preg_match('/"720":"(.*)",/U', $get, $mp4_720p);
//if($mp4_720p){$media = str_replace('\/', '/', $mp4_720p[1]);}

preg_match('/"1080":"(.*)"}/U', $get, $mp4_1080p);
//if($mp4_1080p){$media = str_replace('\/', '/', $mp4_1080p[1]);}

if($media) {return $media;}
else {return 0;}
}

function get_zing_audio($id){	
$media=0;
$api = 'http://api.mp3.zing.vn/api/mobile/song/getsonginfo?keycode=fafd463e2131914934b73310aa34a23f&requestdata={"id":"'.$id.'"}';
$get = file_get_contents($api);
preg_match('/"128":"(.*)",/U', $get, $mp3_128k);
if($mp3_128k){$media = str_replace('\/', '/', $mp3_128k[1]);}
preg_match('/"320":"(.*)"}/U', $get, $mp3_320k);
if($mp3_320k){$media = str_replace('\/', '/', $mp3_320k[1]);		}
if($media) {return $media;}
else {return 0;}
}

function Company($path_element_1,$path_element_2){
$url_request="http://websosanh.vn/Ajax/Company/".$path_element_1.'/'.$path_element_2."?callback=".$_REQUEST['callback']."&id=".$_REQUEST['id']."&_=".$_REQUEST['_'];
echo file_get_contents($url_request);
}
function Product($path_element){
$url_request="http://websosanh.vn/Ajax/V1/Product/".$path_element."?callback=".$_REQUEST['callback']."&idproduct=".$_REQUEST['idproduct']."&pageindex=".$_REQUEST['pageindex']."&pagesize=".$_REQUEST['pagesize'].'&OrderPrice='.$_REQUEST['OrderPrice'].'&RegionID='.$_REQUEST['RegionID'].'&CityName='.$_REQUEST['CityName'].'&Curegion='.$_REQUEST['Curegion']."&_=".$_REQUEST['_'];;
echo file_get_contents($url_request);
}

function curl_get_contents(){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.vietsubhd.com/ajaxload');
curl_setopt($ch, CURLOPT_HEADER, true);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/html','charset:UTF-8'));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Requested-With: XMLHttpRequest'));
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, array('EpisodeID' =>$_REQUEST['EpisodeID'],'NextEpisode'=>$_REQUEST['NextEpisode'],"filmID"=>$_REQUEST['filmID']));

$data = curl_exec($ch);
curl_close($ch);
var_dump($data);
}

function get_film_vietsubhd(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://www.vietsubhd.com/ajaxload');
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Requested-With: XMLHttpRequest'));
		//curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('NextEpisode' => '1','EpisodeID'=>$_REQUEST['EpisodeID'],'filmID'=>$_REQUEST['filmID']));

		$data = curl_exec($ch);
}

}