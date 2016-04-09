<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class congnghe extends CI_Controller
{		function mydb(){
		return $this->load->database('default',TRUE);
		}
		function index(){
			if(isset($_REQUEST['siteUrl'])){
				if(preg_match('/khoahoc.tv/',$_REQUEST['siteUrl'])){
					$path=$_REQUEST['siteUrl'];
				}
				else {
					$path='http://khoahoc.tv/'.$_REQUEST['siteUrl'];
				}
				$content=file_get_contents($path);
				if($content){
				
				}
				else {
				$content=file_get_contents('http://khoahoc.tv/');	
				}
			}
			else {
				$content=file_get_contents('http://khoahoc.tv/');	
			}
			if(isset($_REQUEST['query'])) {
				$path='http://khoahoc.tv/timkiem/?query='.urlencode($_REQUEST['query']);
				$content=file_get_contents($path);	
				if($content){
				}
				else {
					$content=file_get_contents('http://khoahoc.tv/');	
				}
			}
			
			$content=str_replace('https://www.facebook.com/khoahoc.tivi','https://www.facebook.com/elearningsocialvn?ref=hl',$content);
			$content=str_replace('<a href="/">TRANG CHỦ</a>','<a href="http://myweb.pro.vn/">TRANG CHỦ</a>',$content);
			$content=str_replace('KhoaHoc.tv - ','',$content);
			$content=str_replace('<a href="/today/">','<a href="http://khoahoc.tv/today/">',$content);
			$content=str_replace('KhoaHoc.TV: Khoa học - Công nghệ - Tri Thức - Khám phá','Chuyên mục Khoa học và Công nghệ',$content);
			$content=str_replace('/feeddocs.ashx','http://www.myweb.pro.vn/congnghe/left_doc',$content);
			$data['content']=$content;
			$this->load->view('science/article',$data);
		}
		function left_doc(){
			$content=file_get_contents('http://khoahoc.tv/feeddocs.ashx');
			$content=str_replace('http://vndoc.com/','http://myweb.pro.vn/tai-lieu-pdf/',$content);
			$content=str_replace('/download','/download/vndoccom',$content);
			echo $content;
		}
		function xem($path1,$path2,$path3){
			$path=$path1."/".$path2."/".$path3;
			$mydb=$this->load->database('default',TRUE);
			$db=$mydb->select('path')->from('system_science_data')->like('path',$path)->get()->result_array();
			if($db){
				$content=file_get_contents($db[0]['path']);
			}
			else {
				redirect('/');
			}
			$content=str_replace('https://www.facebook.com/khoahoc.tivi','https://www.facebook.com/elearningsocialvn?ref=hl',$content);
			$content=str_replace('<a href="/">TRANG CHỦ</a>','<a href="http://myweb.pro.vn/congnghe?siteUrl=http://khoahoc.tv/">TRANG CHỦ</a>',$content);
			$content=str_replace('<a href="/today/">','<a href="http://khoahoc.tv/today/">',$content);
			$content=str_replace('KhoaHoc.tv - ','',$content);
			$data['content']=$content;
			$this->load->view('science/article',$data);
		}
		function xem_tour($path1,$path2){
			$header= new header();
			if(isset($_REQUEST['title'])){
					$header->blog($_REQUEST['title']);
			}
			else {
					$header->blog('Thông tin du lịch');
			}
			if(isset($_REQUEST['page'])){
				$path='http://mytour.vn/tour/'.$path1.'/'.$path2."?page=".$_REQUEST['page'];
			}
			else {
				$path='http://mytour.vn/tour/'.$path1.'/'.$path2;
			}
			$content=file_get_contents($path);
			$content=str_replace('http://mytour.vn/tour','http://myweb.pro.vn/register-tour',$content);
			$data['content']=$content;
			$this->load->view('tourism/fetch_tourism_data',$data);
		}

		function register_tour($path){
			$header= new header();
			$header->blog($_REQUEST['title']);
			$content=file_get_contents('http://mytour.vn/tour/'.$path);
			$content=str_replace('href','data-href',$content);
			$content=str_replace('themes/js','js',$content);
			$data['content']=$content;
			$this->load->view('tourism/fetch_tourism_data',$data);
		}
		
		function dulich($path){
			$path =str_replace('--','/',$path);
			$data_tourism=$this->db->select('*')->from('tourism')->like('link',$path)->get()->result_array();
			$header= new header();
			$header->blog($data_tourism[0]['name']);
			$content=file_get_contents($data_tourism[0]['link']);
			if($content){
			//do nothing
			}
			else {
				redirect('/tour-du-lich-blog');
			}

			$content=str_replace('<script','<script async',$content);
			$content=str_replace('dulich.vnexpress.net','myweb.pro.vn/blog/dulich',$content);
			$content=str_replace('tuc/','tuc--',$content);
			$content=str_replace('dong/','dong--',$content);
			$content=str_replace('van/','van--',$content);
			$content=str_replace('photo/','photo--',$content);
			$content=str_replace('video/','video--',$content);
			$data['content']=$content;
			$this->load->view('tourism/fetch_tourism_data',$data);
		}
		function seo_blog_tourism(){
		$data['seo']=$this->db->select('*')->from('tourism')->get()->result_array();
		$this->load->view('tourism/seo',$data);
		}
}
?>