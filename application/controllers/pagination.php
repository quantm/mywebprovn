<?php class pagination extends CI_Controller{
		
		function video() {	
		//new model instance
		$this->load->model('video_model');

		$sort_by = 'name';
		$sort_order = 'desc';
		$per_page  = 12;
		$offset = $_REQUEST['offset'];

		$results = $this->video_model->SelectAll($per_page, $offset, $sort_by, $sort_order);
		$data['content'] = $results['rows'];
		$data['num_row_per_page'] = count($results['rows']);
		$this->load->view('ajax/film-web-kit-3d', $data);
		}

		function music($sort_by = 'name', $sort_order = 'desc', $offset = 0){

		//new model instance
		$this->load->model('music_model');

		$per_page  = 24;
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
		$results = $this->music_model->SelectAll($per_page, $offset, $sort_by, $sort_order);     

		if(isset($_REQUETS['id_category'])){
			$data['id_category_pagination'] =$_REQUETS['id_category']; 
		}
		if(!isset($_REQUETS['id_category'])){
			$data['id_category_pagination'] ='9'; 
		}

		//pagination
		$this->load->library('pagination'); 
		$config['total_rows'] = $results['num_rows'];
		$config['per_page'] = $per_page; 
		$config['next_link'] = '-»'; 
		$config['prev_link'] = '«-'; 
		$config['num_tag_open'] = ''; 
		$config['num_tag_close'] = ''; 
		$config['num_links'] = 10; 
		$config['cur_tag_open'] = '<a class="currentpage">'; 
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['base_url'] = 'http://www.myweb.pro.vn/paging-music-online/';
		$config['uri_segment'] = 2; 
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		
		//render view
		$data['content'] = $results['rows'];     
		$data['total_rows']=$results['num_rows'];
		$data['pagination'] = $pagination;
		if(isset($_REQUEST['id_category'])){$data['id_category']=$_REQUEST['id_category'];}
		if(!isset($_REQUEST['id_category'])){$data['id_category']='0';}
		$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
		if(isset($_REQUEST['is_mobile'])){$this->load->view('mobile/pagination_music.php',$data);} //pagination mobile
		if(!isset($_REQUEST['is_mobile'])){$this->load->view('pagination/music',$data);} //pagination desktop
	}

}?>