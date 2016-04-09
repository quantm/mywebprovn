<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class dulich extends CI_Controller
{
		function index(){
			$header= new header();
			$header->dulich('Du lich');
		}
		

		function blog($path){
			redirect('http://myweb.pro.vn/blog/dulich/'.$path);	
			$path =str_replace('--','/',$path);
			$data_tourism=$this->db->select('*')->from('tourism')->like('link',$path)->get()->result_array();
			$header= new header();
			$header->dulich($data_tourism[0]['name']);
			$content=file_get_contents($data_tourism[0]['link']);
			$content=str_replace('<script','<script async',$content);
			$content=str_replace('dulich.vnexpress.net','dulich.myweb.pro.vn/dulich/blog',$content);
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