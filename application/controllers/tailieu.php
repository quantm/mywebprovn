<?php
include_once 'application/controllers/header.php';
class tailieu extends CI_Controller{
	//*tai-lieu.com, doan.edu.vn, luanvan.net.vn,tailieu.tv
	function thamkhao($path){

	//text notes
	if(isset($_REQUEST['textnotes'])){
		echo '<input type="hidden" id="is_textnotes" value="1">';
	}
	if(!isset($_REQUEST['textnotes'])){
		echo '<input type="hidden" id="is_textnotes" value="0">';
	}
	//end
	
	$db_free_host=$this->load->database('admin_education',TRUE);

	$path =str_replace('--','/',$path);
	$book_data=$db_free_host->select('*')->from('ebook_index')	
									->like('path',$path)
									->get()->result_array();
	if($book_data){
			redirect('http://myweb.pro.vn/mydoc/xahoihoctapnetvn/'.$book_data[0]['ID']);	
	}
	else {
			$redirect_path='http://xahoihoctap.net.vn?referer=1&referer_search='.$path;
			redirect($redirect_path);
	}

	$header = new header();
	$header->luanvan($book_data[0]['NAME']);
	$data['book_title']=$book_data[0]['NAME'];
	$data['book_description']=$book_data[0]['DESCRIPTION'];
	$data['book_thumbs']=$book_data[0]['THUMBS'];
	$data['share_id']=$book_data[0]['ID'];

	$content=file_get_contents($book_data[0]['path']);
	
	$content=str_replace('Luận văn liên quan','Luận văn liên quan<span class="relevant-docs-close">Đóng</span>',$content);
	$content=str_replace('Tài liệu liên quan','Tài liệu liên quan<span class="relevant-docs-close">Đóng</span>',$content);
	$content=str_replace('Giáo án liên quan','Giáo án liên quan<span class="relevant-docs-close">Đóng</span>',$content);
	
	$content=str_replace('Click Like Website luanvan365.com nhé bạn!','',$content);
	$content=str_replace('/images/banner.jpg','http://xahoihoctap.net.vn/images/banner.jpg',$content);
	$content=str_replace('Vui Lòng click vào','',$content);
	$content=str_replace('bên dưới để tải tài liệu :','',$content);
	
	//prevent google analytics to call server
	$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
	//end

	//prevent google ads code to call server
	$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
	//end

	//jquery conflict
	$content=str_replace('//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js?ver=1.7.1','',$content);
	//end
	
	//play game for relaxing
	if(preg_match('/nopreview.swf/',$content)){
		echo '<script>alert("File đã bị người dùng xóa, Bạn có thể chơi game Line bên dưới để giải trí một tý");</script>';
		$content=str_replace('/images/nopreview.swf','http://files.vuongquocgame.com/swf/Line98.swf?1435053269.4817',$content);
	}
	//end

	//reset path
	$content=str_replace('http://thuviengiaoan.vn/giao-an/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
	$content=str_replace('/luan-van/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
	$content=str_replace('/do-an/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
	$content=str_replace('/giao-an/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
	$content=str_replace('/tai-lieu/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
	//end

	if(preg_match('/thuviengiaoan.vn/',$book_data[0]['path'])){
		$content=str_replace('<div class="sidebar-right-adv">','<div class="remove" style="display:none">',$content);
		$content=str_replace('<div class="post-adv">','<div class="remove" style="display:none">',$content);
	}

	if(preg_match('/tailieu.tv/',$book_data[0]['path'])){
		$content=str_replace('</object>','</object><base href="http://tailieu.tv/">',$content);
	}
	
	if(preg_match('/timtailieu.vn/',$book_data[0]['path'])){
		$content=str_replace('</object>','</object><base href="http://timtailieu.vn/">',$content);
	}
	
	if(preg_match('/luanvan365.com/',$book_data[0]['path'])){
		$content=str_replace('</object>','</object><base href="http://luanvan365.com/">',$content);
	}
	
	if(preg_match('/luanvan.net.vn/',$book_data[0]['path'])){
		$content=str_replace('</object>','</object><base href="http://luanvan.net.vn/">',$content);
	}
	
	if(preg_match('/tai-lieu.com/',$book_data[0]['path'])){
		$content=str_replace('</object>','</object><base href="http://tai-lieu.com/">',$content);
	}
	
	if(preg_match('/doan.edu.vn/',$book_data[0]['path'])){
		$content=str_replace('</object>','</object><base href="http://doan.edu.vn/">',$content);
	}
	
	if(preg_match('/doc.edu.vn/',$book_data[0]['path'])){$content=str_replace('</object>','</object><base href="http://doc.edu.vn/">',$content);}
	
	$data['content']=str_replace('Scale=0.95','Scale=1.00&FitWidthOnLoad=true',$content);
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 

	//login pop-up  
	if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
	}
	else{
	$data['type']='0';
	}
	//end
	$data['like']=$book_data[0]['LIKE_COUNT'];
	$data['shared_url']='http://myweb.pro.vn/tailieu/thamkhao/'.$path;
	
	//bottom ads
	$str_ads="</object><div class='bottom_ads'>
	<div class='sponsor_link_wrapper'>
	<img width='24px' height='24px' src='http://xahoihoctap.net.vn/images/announceIcon.png'/>
	<h4 class='sponsor_link'>Liên kết của nhà tài trợ sẽ đóng sau <span class='close_sponsor_link'></span></h4>
	</div>
	<script type='text/javascript' src='//e-vcdn.anthill.vn/delivery-ants/zone/522972114.js'></script>
	</div>";
	$content=str_replace('</object>',$str_ads,$content);
	//end

	$content=str_replace('ZoomTransition=easeOut','FitWidthOnLoad=true',$content);
	$content=str_replace('Scale=0.95','Scale=1.00&FitWidthOnLoad=true',$content);
	$content=str_replace('Scale=1','Scale=1.00&FitWidthOnLoad=true',$content);
	if($book_data[0]['direct_link']){
		$data['is_update']='0';
	}
	else {
		$data['is_update']='1';
	}
	//modal download guide and modal related thesis
	if(isset($_REQUEST['is_modal_download_guide'])){
		$data['is_modal_download_guide']='1';
	}
	if(!isset($_REQUEST['is_modal_download_guide'])) {
		$data['is_modal_download_guide']='0';
	}
	//end

	$data['content']=$content;
	$this->load->view('/luanvan/tailieu-luanvan',$data);
	}
	//end function thamkhao

	//*tai-lieu.com, doan.edu.vn, luanvan.net.vn,tailieu.tv
	function giao_an($path){
	
	$db_free_host=$this->load->database('admin_education',TRUE);
	$path =str_replace('--','/',$path);
	$book_data=$db_free_host->select('*')->from('ebook_index')	
									->like('path',$path)
									->get()->result_array();
	
	if($book_data){} else {
			echo '<script type="text/javascript" src="/js/ga.js"></script>';
			echo '<meta charset="UTF-8"/>';
			echo '<h2 style="color:red">Website đang nâng cấp</h2>';
			die('<title>Website đang nâng cấp</title><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/521621655.js"></script>');
		}


	$header = new header();
	$header->giaoan($book_data[0]['NAME']);
	$data['book_title']=$book_data[0]['NAME'];
	$data['book_description']=$book_data[0]['DESCRIPTION'];
	$data['book_thumbs']=$book_data[0]['THUMBS'];
	$data['share_id']=$book_data[0]['ID'];

	$content=file_get_contents($book_data[0]['path']);
	$content=str_replace('Giáo án liên quan','Giáo án liên quan<span class="relevant-docs-close">Đóng</span>',$content);
	$content=str_replace('http://thuviengiaoan.vn/giao-an/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
	$content=str_replace('/luan-van/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
	$content=str_replace('/do-an/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
	$content=str_replace('/tai-lieu/','http://myweb.pro.vn/tailieu/thamkhao/',$content);
	
	if(preg_match('/thuviengiaoan.vn/',$book_data[0]['path'])){
		$content=str_replace('<div class="sidebar-right-adv">','<div class="remove" style="display:none">',$content);
		$content=str_replace('<div class="post-adv">','<div class="remove" style="display:none">',$content);
	}
	if(preg_match('/giaoan.com.vn/',$book_data[0]['path'])){
		$content=str_replace('<div class="sidebar-right-adv">','<div class="remove" style="display:none">',$content);
		$content=str_replace('<div class="post-adv">','<div class="remove" style="display:none">',$content);
		$content=str_replace('<div class="adv-post">','<div class="remove" style="display:none">',$content);
	}
	
	if(preg_match('/luanvan365.com/',$book_data[0]['path'])){
		$content=str_replace('</object>','</object><base href="http://luanvan365.com/">',$content);
	}
	
	if(preg_match('/luanvan.net.vn/',$book_data[0]['path'])){
		$content=str_replace('</object>','</object><base href="http://luanvan.net.vn/">',$content);
	}
	
	if(preg_match('/tai-lieu.com/',$book_data[0]['path'])){
		$content=str_replace('</object>','</object><base href="http://tai-lieu.com/">',$content);
	}
	
	if(preg_match('/tailieu.tv/',$book_data[0]['path'])){
		$content=str_replace('</object>','</object><base href="http://tailieu.tv/">',$content);
	}
		
	if(preg_match('/doan.edu.vn/',$book_data[0]['path'])){
		$content=str_replace('</object>','</object><base href="http://doan.edu.vn/">',$content);
	}
	//filter video variable

	
	//add bottom advertisement
	$str_adv_obj1='name="obj1" width="878" height="700"><div style="margin-left:-45px;position:absolute"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div>';
	$content=str_replace('name="obj1" width="878" height="700">',$str_adv_obj1,$content);

	$str_adv_obj2='name="flashvars"></object><div class="adv_ants_header"><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script></div>';
	$content=str_replace('name="flashvars"></object>',$str_adv_obj2,$content);
	//end

	//top advertisement
	$str_replace='<div class="doc-preview"><div class="ads_micro_top"><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16598.ads"></script></div>';
	$content=str_replace('<div class="doc-preview">',$str_replace,$content);
	//end top advertisement

	//prevent google analytics to call server
	$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
	//end

	//prevent google ads code to call server
	$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);
	//end

	//jquery conflict
	$content=str_replace('//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js?ver=1.7.1','',$content);
	//end
	
	//bottom ads
	$str_ads="</object><div class='bottom_ads'>
	<div class='sponsor_link_wrapper'>
	<img width='24px' height='24px' src='http://xahoihoctap.net.vn/images/announceIcon.png'/>
	<h4 class='sponsor_link'>Liên kết của nhà tài trợ sẽ đóng sau <span class='close_sponsor_link'></span></h4>
	</div>
	<script type='text/javascript' src='//e-vcdn.anthill.vn/delivery-ants/zone/522972114.js'></script>
	</div>";
	$content=str_replace('</object>',$str_ads,$content);
	//end

	$content=str_replace('/images/banner.jpg','http://xahoihoctap.net.vn/images/banner.jpg',$content);
	$content=str_replace('Click Like Website luanvan365.com nhé bạn!','',$content);
	$content=str_replace('Vui Lòng click vào','',$content);
	$content=str_replace('bên dưới để tải tài liệu :','',$content);	
	$data['content']=str_replace('Scale=0.95','Scale=1.00',$content);
	//end

	
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 

	//login pop-up  
	if(isset($_REQUEST['type'])){
	$data['type']=$_REQUEST['type'];
	}
	else{
	$data['type']='0';
	}
	//end
	$data['like']=$book_data[0]['LIKE_COUNT'];
	$data['shared_url']='http://myweb.pro.vn/giao-an/'.$path;
	$this->load->view('giaoan/tailieu-luanvan',$data);
	}
	//end function giaoan
	
//start function pdf
function pdf($path_element_1, $path_element_2, $path_element_3){

switch($path_element_3){
	
	case 'vndoccom':
	$path='http://vndoc.com/'.$path_element_1.'/'.	$path_element_2;
	$q=$this->db->select('*')->from('pdf')->where('fetch_link',$path)->get()->result_array();
	copy($q['0']['view_pdf_link'],'./pdf/file_vndoccom_'.$q['0']['id'].'.pdf');
	$pdf_path='http://xahoihoctap.net.vn'.'/pdf/file_vndoccom_'.$q['0']['id'].'.pdf';

	//begin proccess delete file on server five time per one hour
	$date=getdate();
	$minutes = $date['minutes'];
	if($minutes%12){
		//do nothing
	}

	//start delete file on server five time per one hour
	else{
		//start delete file on server
		for($doc_index=0;$doc_index<100000;$doc_index++){		
			if (file_exists('./pdf/file_vndoccom_'.$doc_index.'.pdf')) {
				unlink('./pdf/file_vndoccom_'.$doc_index.'.pdf');
			} 
		}
		//end delete file on server
	}
	//end proccess delete file on server five time per one hour

	break;

	case 'vinadocnet':	
	$path='http://vinadoc.net/'.$path_element_1.'/';
	$content=file_get_contents($path);
	$content=str_replace('UA-62826214-1','',$content);
		$content=str_replace('<a class="name navbar-brand" href="/" title="Nhà">VinaDoc.net</a>','<a class="name navbar-brand" href="/" title="Nhà">myweb.pro.vn</a>',$content);
	$content=str_replace('http://vinadoc.net/sites/all/themes/banana/favicon.ico','http://xahoihoctap.net.vn/images/icons/graduate_hat.png',$content);
	$content=str_replace('//www.google-analytics.com/analytics.js','http://raovatnhanh.net.co/js/jquery-2.1.0.min.js',$content);
	$content=str_replace('//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js','',$content);

	//reset advertisement
	$str_ads_728='<div class="ads_redirect"><script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script><div class="517324894" data-ants-zone-id="517324894"></div></div>';
	$content=str_replace('<!-- vinadoc_728x90 -->',$str_ads_728,$content);
	$str_ads_250=	'<div class="ads_redirect"><script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script><div class="528921829" data-ants-zone-id="528921829"></div></div>';
	$content=str_replace('<!-- h2l_336x280 -->',$str_ads_250,$content);
	echo $content;
	exit();
}
//end switch

$header = new header();
$header->book($q[0]['name']);

//render html view
$data['book_thumbs']='http://myweb.pro.vn/images/fb/logo.jpg';
$data['book_title']=$q['0']['name'];
$data['book_description']='Thư viện PDF';
$data['share_id']=$q['0']['id'];
$data['embed_src']='http://xahoihoctap.net.vn/tailieu/pdfviewer?path='.$pdf_path;
$this->load->view('book/view',$data);
}
//end function pdf

}
?>