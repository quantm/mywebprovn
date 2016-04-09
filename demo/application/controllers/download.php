<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class download extends CI_Controller {

function index(){
$header = new header();
$header->download("Download");
$content=file_get_contents("https://down.vn/");
preg_match_all('/<div id="content" class="clearfix">(.*?)<div class="clear">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key);
$data['content']=$key['1'];
$this->load->view('file/index',$data);
}


}
?>