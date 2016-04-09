<?php
require_once 'application/controllers/header.php';
class affiliate extends CI_Controller{
	function lazada(){

		$this->load->model('affiliate_model');
		$sort_by = 'price';
		$sort_order = 'desc';
		$offset = 0;
		$per_page  = 24;

		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
		$results = $this->affiliate_model->SelectAll($per_page, $offset, $sort_by, $sort_order);

		//pagination
		$this->load->library('pagination'); 
		$config['total_rows'] = $results['num_rows'];
		$config['per_page'] = $per_page; 
		$config['next_link'] = 'Tiếp »'; 
		$config['prev_link'] = '« Sau'; 
		$config['num_tag_open'] = ''; 
		$config['num_tag_close'] = ''; 
		$config['num_links'] = 10; 
		$config['cur_tag_open'] = '<a class="currentpage">'; 
		$config['cur_tag_close'] = '</a>';
		$config['last_link'] = 'Cuối';
		$config['base_url'] = "http://www.myweb.pro.vn/lazada-mua-sam/";
		$config['uri_segment'] = 2; 
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		
		$header = new header();
		$header->affiliate('lazada','vn');
		
		if(isset($_REQUEST['id_cate'])){
			$data['id_category']=$_REQUEST['id_cate'];
		}
		else {
			$data['id_category']='1';
		}
		if($results['rows']){
			$data['lazada']=$results['rows'];
			$data['total_rows']=$results['num_rows'];
		}
		else {redirect('/');}
		if(isset($_REQUEST['id'])){
			$data['id_product']=$_REQUEST['id'];
			$this->load->view('affiliate/lazada_detail_page',$data);
		}

		if(!isset($_REQUEST['id'])){
			$this->load->view('affiliate/lazada',$data);
		}
		
	}

	function pagination() {	
		//new model instance
		$this->load->model('affiliate_model');

		$sort_by = 'price';
		$sort_order = 'desc';
		$per_page  = $this->input->get('offset');
		$offset = 0;

		$results = $this->affiliate_model->SelectAll($per_page, $offset, $sort_by, $sort_order);
		$data['lazada'] = $results['rows'];
		$data['num_row_per_page'] = count($results['rows']);
		$this->load->view('ajax/lazada', $data);
	}

	function sell_traffic_lazada_vn($path){
	$mydb=$this->load->database('lazada',TRUE);
	$r=$mydb->select('*')->from('lazada_vn')->like('URL',$path)->get()->result_array();
	
	$header = new header();
	$header->affiliate('lazada','vn');

	//render view
	$data['id_product']=$r[0]['id'];
	$data['lazada']=$r;
	$data['total_rows']='1';
	$this->load->view('affiliate/lazada_detail_page',$data);
	}
}
?>