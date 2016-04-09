<? class mylibrary extends CI_Controller{
	function add($sort_by = 'NAME', $sort_order = 'desc', $offset = 0){
		//new model instance
		$this->load->model('mylibrary_model');

		$per_page  = 22;
		$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
		$results = $this->mylibrary_model->user_add_book_to_lib($per_page, $offset, $sort_by, $sort_order);     
		
		//pagination
		$this->load->library('pagination'); 
		$config['total_rows'] = $results['num_rows'];
		$config['per_page'] = $per_page; 
		$config['next_link'] = 'Trang tiếp »'; 
		$config['prev_link'] = '« Trang sau'; 
		$config['num_tag_open'] = ''; 
		$config['num_tag_close'] = ''; 
		$config['num_links'] = 5; 
		$config['cur_tag_open'] = '<a class="currentpage">'; 
		$config['cur_tag_close'] = '</a>';
		$config['first_link'] = 'Trang đầu';
		$config['last_link'] = 'Trang cuối';
		$config['base_url'] = "http://myweb.pro.vn/user-book-category/";
		$config['uri_segment'] = 2; 
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();

		//render view
		$data['pagination'] = $pagination;
		$data['search']=$results['rows'];
		$data['total_rows'] = $results['num_rows'];
		$data['search_key']=$_REQUEST['q_lib'];
		$this->load->view('ajax/user_library_search_book',$data);
	}

	//start function addcategory
	function addcategory(){
		$this->load->model('log_model');
		$id_user_login=$this->log_model->getId();
		
		//database initiation
		$db_init=$this->load->database('admin_education',TRUE);
		
		//new user category
		if(isset($_REQUEST['user_custom_category'])){
			$data_user_category=array('id_u'=>$id_user_login,'name'=>$_REQUEST['user_custom_category']);
			$db_init->insert('user_ebook_category',$data_user_category);
			$user_id_category=$db_init->insert_id();
			$data_fk_user_category=array('ID_U'=>$id_user_login,'ID_BOOK'=>$_REQUEST['id_doc'],'ID_CATEGORY'=>$user_id_category);
			echo $user_id_category; 
		}
		
		//exist user category
		if(!isset($_REQUEST['user_custom_category'])&&isset($_REQUEST['user_id_category'])){
			$data_fk_user_category=array('ID_U'=>$id_user_login,'ID_BOOK'=>$_REQUEST['id_doc'],'ID_CATEGORY'=>$_REQUEST['user_id_category']);
		}

		switch($_REQUEST['type']){
				case 'add':
				$db_init->insert('fk_user_book',$data_fk_user_category);
				break;
				case 'delete':
				$db_init->delete('fk_user_book',$data_fk_user_category);
				break;
		}

	}
	//end function

	function get_title_news(){
		$db_init=$this->load->database('admin_education',TRUE);
		$content=file_get_contents($_REQUEST['url']);
		preg_match_all('/<title>(.*?)</s',$content,$match,PREG_SET_ORDER);
		foreach($match as $key);
		$title=str_replace('<title>','',$key[0]);
		$title=str_replace('</title>','',$title);
		$title=str_replace('<','',$title);
		if($title){$db_init->insert('ebook_index',array('NAME'=>$title,'path'=>$_REQUEST['url'],'REFERER'=>'user_add_from_url'));$last_id=$db_init->insert_id();}
		echo $title.'<input type="hidden" id="id_doc_from_url" value="'.$last_id.'"/>';
	}

}?>