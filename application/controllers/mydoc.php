<?php
	require_once 'application/controllers/header.php';
	class mydoc extends CI_Controller{
		
		function index(){
			if(!$this->session->userdata('username')){redirect('/');}
			$this->xahoihoctapnetvn($_REQUEST['id']);
		}
		
		//start function
		function xahoihoctapnetvn($id){
		
			$db_init=$this->load->database('admin_education',TRUE);
			$r=$db_init->select('*')->from('ebook_index')->where('ID',$id)->get()->result_array();

			$header = new header();
			$header->luanvan($r[0]['NAME']);

			if($id){
				if($id=='undefined'){redirect('/');}
			}
			else {
					redirect('/');
			}

			//render view
			if(isset($_REQUEST['download_guide'])){
				$data['download_guide']='1';
			}
			if(!isset($_REQUEST['download_guide'])){
				$data['download_guide']='0';
			}
			
			if(isset($_REQUEST['register_login'])){
				$data['register_login']='1';
			}
			if(!isset($_REQUEST['register_login'])){
				$data['register_login']='0';
			}
			if(isset($_REQUEST['show_user_category_input'])){
				$data['show_user_category_input']='1';
			}
			if(!isset($_REQUEST['show_user_category_input'])){
				$data['show_user_category_input']='0';
			}
			
			//mousedown open ads 
			if(isset($_REQUEST['happy_reading'])){
				$data['happy_reading']='1';
				$data['id']=$id.'?happy_reading=1';
			}
			else{
				$data['happy_reading']='0';
				$data['id']=$id.'?happy_reading=0';
			}
			//end

			$data['id_doc']=$id;
			if($r[0]['REFERER']=='vinadoc.net'){
				$path=str_replace('http://vinadoc.net/','',$r[0]['path']);
				$path='http://myweb.pro.vn/tai-lieu-hoc/'.$path.'/view/vinadocnet';
				redirect($path);
			}
			if($r[0]['REFERER']=='rongmotamhonnet'){
				redirect('doc-sach?id='.$id);
			}
			if($r[0]['REFERER']=='tailieuhoctapvn'){redirect('http://myweb.pro.vn/doc-sach-tham-khao?id='.$id);}
			if($r[0]['REFERER']=='user_add_from_url' ||$r[0]['REFERER']=='tailieuhoceduvn' ||$r[0]['REFERER']=='tailieuvn' ||$r[0]['REFERER']=='docs.4share.vn' || $r[0]['REFERER']=='tailieuhay.info'){redirect($r[0]['path']);}
			$this->load->view('luanvan/bridge',$data);
		}
		//end function
		
		
		function reading_object($id){
			$url='http://xahoihoctap.net.vn/bridge/mywebprovn/'.$id.'?happy_reading='.$_REQUEST['happy_reading'];
			echo file_get_contents($url);
		}
		//start function
		function read($id){
			if(isset($_REQUEST['happy_reading'])){
			$data['happy_reading']=$_REQUEST['happy_reading'];
				$url='http://xahoihoctap.net.vn/bridge/mywebprovn/'.$id.'?fullscreen=1?&happy_reading=1';
			}
			if(!isset($_REQUEST['happy_reading'])){
				$url='http://xahoihoctap.net.vn/bridge/mywebprovn/'.$id.'?fullscreen=1?&happy_reading=0';
			}
			echo file_get_contents($url);
		}
		//end function

		function obj_read($id){
		$db_init=$this->load->database('admin_education',TRUE);

		$r=$db_init->select('*')->from('ebook_index')->where('id',$id)->get()->result_array();
		$content=file_get_contents($r[0]['path']);

		//prevent google analytics to call server
		$content=str_replace('//www.google-analytics.com/analytics.js','',$content);
		$content=str_replace('UA-33331621-3','',$content);//luanvan.net.vn
		$content=str_replace('UA-37269087-2','',$content);//doc.edu.vn
		$content=str_replace('UA-33331621-4','',$content);//doan.edu.vn
		$content=str_replace('UA-55851350-3','',$content);//giaoan.com.vn
		$content=str_replace('UA-53513450-1','',$content);//thuviengiaoan.vn
		$content=str_replace('UA-45765526-1','',$content);//thuvientailieu.vn
		$content=str_replace('UA-33331621-1','',$content);//timtailieu.vn
		$content=str_replace('UA-40567487-3','',$content);//tai-lieu.com
		$content=str_replace('UA-40567487-2','',$content);//tailieu.tv
		$content=str_replace('UA-40567487-1','',$content);//luanvan.co
		$content=str_replace('UA-43842669-1','',$content);//luanvan365.com
		$content=str_replace('UA-37269087-3','',$content);//zbook.vn
		$content=str_replace('UA-45765526-3','',$content);//ebook.net.vn
		$content=str_replace('UA-55858407-3','',$content);//monhoc.vn
		$content=str_replace('UA-57804822-1','',$content);//monhoc.vn
		$content=str_replace('UA-37269087-1','',$content);//zun.vn
		//end

		//base link
		if(preg_match('/zun.vn/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://zun.vn/',$content);
		}
		$data['base_link']='http://zun.vn/';
		}
		if(preg_match('/thuvienluanvan.info/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://thuvienluanvan.info/',$content);
		}
		$data['base_link']='http://thuvienluanvan.info/';
		}
		if(preg_match('/monhoc.vn/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://monhoc.vn/',$content);
		}
		$data['base_link']='http://monhoc.vn/';
		}
		if(preg_match('/giaoan.com.vn/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://giaoan.com.vn/',$content);
		}
		$data['base_link']='http://giaoan.com.vn/';
		}
		if(preg_match('/giaoanmau.com/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://giaoanmau.com/',$content);
		}
		$data['base_link']='http://giaoanmau.com/';
		}
		if(preg_match('/thuviengiaoan.vn/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://thuviengiaoan.vn/',$content);
		}
		$data['base_link']='http://thuviengiaoan.vn/';
		}

		if(preg_match('/baigiang.co/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://baigiang.co/',$content);
		}
		$data['base_link']='http://baigiang.co/';
		}

		if(preg_match('/giaoan.co/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://giaoan.co/',$content);
		}
		$data['base_link']='http://giaoan.co/';
		}
		if(preg_match('/www.dethimau.vn/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://dethimau.vn/',$content);
		}
		$data['base_link']='http://www.dethimau.vn/';
		}
		if(preg_match('/baigiangdientu.vn/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://baigiangdientu.vn/',$content);
		}
		$data['base_link']='http://baigiangdientu.vn/';
		}
		if(preg_match('/doan.edu.vn/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://doan.edu.vn/',$content);
		}
		$data['base_link']='http://doan.edu.vn/';
		}
		if(preg_match('/thuvientailieu.vn/',$r[0]['path'])){
		$content=str_replace('relevant-docs-close','dong-lien-quan',$content);
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://thuvientailieu.vn/',$content);
		}
		$data['base_link']='http://thuvientailieu.vn/';
		}

		if(preg_match('/zbook.vn/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://zbook.vn/',$content);
		}
		$data['base_link']='http://zbook.vn/';
		}

		if(preg_match('/luanvan.net.vn/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://luanvan.net.vn/',$content);
		}
		$data['base_link']='http://luanvan.net.vn/';
		}

		if(preg_match('/luanvan365.com/',$r[0]['path'])){
		$content=str_replace('	<span>Thông Tin Khuyến Mãi</span>','<div class="remove"></div>',$content);
		$content=str_replace('/images/thu-vien-luan-van-do-an-tot-nghiep-dai-hoc-thac-si-tien-si.png','http://xahoihoctap.net.vn/images/banner.jpg',$content);
		$content=str_replace('SwfFile=','SwfFile=http://luanvan365.com',$content);
		$content=str_replace('<p></p>','',$content);//fix UI
		$data['base_link']='http://luanvan365.com/';
		}

		if(preg_match('/luanvan.co/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://luanvan.co/',$content);
		}
		$data['base_link']='http://luanvan.co/';
		}

		if(preg_match('/tailieu.tv/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://tailieu.tv/',$content);
		}
		$data['base_link']='http://tailieu.tv/';
		}

		if(preg_match('/doc.edu.vn/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://doc.edu.vn/',$content);
		}
		$data['base_link']='http://doc.edu.vn/';
		}

		if(preg_match('/tai-lieu.com/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://tai-lieu.com/',$content);
		}
		$data['base_link']='http://tai-lieu.com/';
		}
		if(preg_match('/timtailieu.vn/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://timtailieu/',$content);
		}
		$data['base_link']='http://timtailieu.vn/';
		}
		if(preg_match('/ebook.net.vn/',$r[0]['path'])){
		if(preg_match('/SwfFile=http:/',$content)){}
		else {
		$content=str_replace('SwfFile=','SwfFile=http://ebook.net.vn/',$content);
		}
		$data['base_link']='http://ebook.net.vn/';
		}
		///end

		//play game for relaxing
		if(preg_match('/nopreview.swf/',$content)){
		echo '<script>alert("File đã bị người dùng xóa mất, bạn có thể chơi cờ tướng bên dưới");</script>';
		$content=str_replace('/images/nopreview.swf','http://vuigame.vcdn.vn/upload/data/XiangQiII_1372325261.swf',$content);
		}

		//flash FitWidthOnLoad
		$content=str_replace('ZoomTransition=easeOut','FitWidthOnLoad=true',$content);
		$content=str_replace('Scale=0.95','Scale=1.00&FitWidthOnLoad=true',$content);
		$content=str_replace('Scale=1','Scale=1.00&FitWidthOnLoad=true',$content);

		$data['name']=$r[0]['NAME'];
		$data['content']=$content;
		$data['id_doc']=$id;

		if(isset($_REQUEST['happy_reading'])){
		$data['happy_reading']=$_REQUEST['happy_reading'];
		}
		if(!isset($_REQUEST['happy_reading'])){
		$data['happy_reading']='0';
		}
		$data['name']=$r[0]['NAME'];
		$count = $db_init->select('COUNT(*) as count', FALSE)->from('ebook_index')->get()->result();
		if($count){
		$data['count'] = $count[0]->count;
		}
		else {
		$data['count'] = '';
		}
		$data['csrf_test_name'] = $this->security->get_csrf_hash(); 

		if(!isset($_REQUEST['fullscreen'])){
		if(isset($_REQUEST['sem'])){$this->load->view('seo/mydoc_mymoney',$data);}
		if(!isset($_REQUEST['sem'])){$this->load->view('bridge/luanvan',$data);}
		}

		if(isset($_REQUEST['fullscreen'])){$this->load->view('bridge/luanvan_full',$data);}

		}
	}
?>