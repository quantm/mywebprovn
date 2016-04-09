<?php
    class header extends CI_Controller {   
	function index($title,$search_frm,$search_placeholder) {    
        
        //kiểm tra đã đăng nhập
        //$this->is_logged_in();
        
        //new model instance
        $this->load->model('game_model');
        $this->load->model('log_model');

		
		//asign model    
    	$per_page  = 36;
    	$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
        $results = $this->game_model->SelectAll($per_page, $sort_by = 'NAME', $sort_order = 'asc', $offset = 0);
                
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
    	$config['base_url'] = "http://myweb.pro.vn/game/";
    	$config['uri_segment'] = 2; 
    	$this->pagination->initialize($config);
    	$pagination = $this->pagination->create_links();
    
    
    	//set variable for view
        $data['fields'] = array( 'ID' => 'ID', 'NAME' => 'Tên');
        $data['game_index'] = $results['rows'];     
    	$data['total_rows']=$results['num_rows'];
    	$data['title'] = $title;
    	$data['pagination'] = $pagination;
    	$data['count_game_quantity'] = $results['num_rows'];
    	$data['count_all_game'] = $this->db->count_all('game_index');
    	if (isset($_REQUEST['name_category'])){
    		$data['cate_name'] = $this->input->get_post('name_category');
    		$data['cate_name_top'] = $this->input->get_post('name_category');
    	}
    	else {
    		$data['cate_name'] = "Tất cả game (cuộn thanh cuộn bên phải màn hình để xem thêm)";
    		$data['cate_name_top'] = "";
    	}
        
        if (isset($_REQUEST['count_category_item'])){
            $data['count_category_item']=$_REQUEST['count_category_item'];
        }  
        else {
            $data['count_category_item'] = "0";
        }
        
        if (isset($_REQUEST['id_category'])){
            $data['id_category']=$_REQUEST['id_category'];
        }  
        else {
            $data['id_category'] = "0";
        }
        
        if (isset($_REQUEST['type'])){
            $data['type']=$_REQUEST['type'];
        }  
        else {
            $data['type'] = "0";
        }
              
        $query_game_category = 'SELECT * FROM (SELECT sho.NAME as CATE_NAME, sho.ID_CATEGORY, count(*) AS counting FROM game_index AS sho GROUP BY sho.ID_CATEGORY ) obj_hash_tag INNER JOIN game_category ON game_category.ID = obj_hash_tag.ID_CATEGORY ORDER BY obj_hash_tag.counting DESC';
    	
        //asign view variable
        $data['csrf_test_name'] = $this->security->get_csrf_hash(); 
		$data['category_game'] = $this->db->query($query_game_category)->result_array();    
        $data['keyword'] = $this->db->select("NAME")->from("game_index")->get()->result_array();         
		
		$user_log = $this->log_model->getIdUserLogin();

        if($this->session->userdata('username')){
            $data['user_data']=$user_log;
        }
        else{
            $data['user_data'] = "-1";
        }
        
        $query_game_category = 'SELECT *, game_category.NAME as CATEGORY_GAME FROM (SELECT sho.NAME as NAME_GAME, sho.ID_CATEGORY, count(*) AS counting FROM game_index AS sho GROUP BY sho.ID_CATEGORY ) obj_hash_tag INNER JOIN game_category ON game_category.ID = obj_hash_tag.ID_CATEGORY ORDER BY obj_hash_tag.counting DESC';
        $query_ebook_category = 'SELECT *, ebook_category.NAME as CATEGORY_EBOOK FROM (SELECT sho.ID, sho.NAME as NAME_EBOOK, sho.ID_CATEGORY, count(*) AS counting FROM ebook_index AS sho GROUP BY sho.ID_CATEGORY ) obj_hash_tag INNER JOIN ebook_category ON ebook_category.ID = obj_hash_tag.ID_CATEGORY ORDER BY obj_hash_tag.counting DESC'; 
        
        $data['count_unity_game'] = count($this->db->select('*')->from('game_index')->where("EMBED_TYPE","unity3d")->get()->result_array()); 
        $data['count_flash_game'] = count($this->db->select('*')->from('game_index')->where("EMBED_TYPE","flash")->get()->result_array()); 
        $data['count_shockwave_game'] = count($this->db->select('*')->from('game_index')->where("EMBED_TYPE","shockwave")->get()->result_array());            		
        $data['category_game'] = $this->db->query($query_game_category)->result_array(); 
        $data['category_ebook'] = $this->db->query($query_ebook_category)->result_array();
        $data['count_all_game'] = $this->db->count_all('game_index');
        $data['count_all_ebook'] = $this->db->count_all('ebook_index');
        $data['search_frm']=$search_frm;
		$data['search_placeholder']=$search_placeholder;
		$is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
        	$data['is_logged'] = "0";
        }
        else{
        		$data['is_logged'] = "1";
        }
        //load view
        $this->load->view('header/default', $data);
    }

//start function
function book($title){	
	//check user login and logout
	$this->load->model('log_model');
	if($this->session->userdata('username')){
	$data['user_data']=$this->log_model->getIdUserLogin();
	}
	else{
	$data['user_data'] = "-1";
	}
	$is_logged_in = $this->session->userdata('is_logged_in');
	if (!isset($is_logged_in) || $is_logged_in != true) {
	$data['is_logged'] = "0";
	}
	else{
	$data['is_logged'] = "1";
	}
	//end
	$data['title']=$title;
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
	$this->load->view('header/book',$data);
}
//end function


//start function
function music($title){	
	//check user login and logout
	$this->load->model('log_model');
	if($this->session->userdata('username')){
	$data['user_data']=$this->log_model->getIdUserLogin();
	}
	else{
	$data['user_data'] = "-1";
	}
	$is_logged_in = $this->session->userdata('is_logged_in');
	if (!isset($is_logged_in) || $is_logged_in != true) {
	$data['is_logged'] = "0";
	}
	else{
	$data['is_logged'] = "1";
	}
	//end
	$data['title']=$title;
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
	$this->load->view('header/music',$data);
}
//end function

//start function
function download($title){	
	//check user login and logout
	$this->load->model('log_model');
	if($this->session->userdata('username')){
	$data['user_data']=$this->log_model->getIdUserLogin();
	}
	else{
	$data['user_data'] = "-1";
	}
	$is_logged_in = $this->session->userdata('is_logged_in');
	if (!isset($is_logged_in) || $is_logged_in != true) {
	$data['is_logged'] = "0";
	}
	else{
	$data['is_logged'] = "1";
	}
	//end
	$data['title']=$title;
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
	$this->load->view('header/download',$data);
}
//end function


//start function
function ebook($title,$lang){	
	//check user login and logout
	$this->load->model('log_model');
	if($this->session->userdata('username')){
	$data['user_data']=$this->log_model->getIdUserLogin();
	}
	else{
	$data['user_data'] = "-1";
	}
	$is_logged_in = $this->session->userdata('is_logged_in');
	if (!isset($is_logged_in) || $is_logged_in != true) {
	$data['is_logged'] = "0";
	}
	else{
	$data['is_logged'] = "1";
	}
	//end
	$data['title']=$title;
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
	if($lang=="en"){
		$this->load->view('header/ebook_en',$data);
	}
}
//end function

//start function
function luanvan($title){	
	//check user login and logout
	$this->load->model('log_model');
	if($this->session->userdata('username')){
	$data['user_data']=$this->log_model->getIdUserLogin();
	}
	else{
	$data['user_data'] = "-1";
	}
	$is_logged_in = $this->session->userdata('is_logged_in');
	if (!isset($is_logged_in) || $is_logged_in != true) {
	$data['is_logged'] = "0";
	}
	else{
	$data['is_logged'] = "1";
	}
	//end
	$data['title']=$title;
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
	$this->load->view('header/luanvan',$data);

}
//end function
}
?>