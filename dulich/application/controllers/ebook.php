<?php
    require_once 'application/controllers/header.php';
	class ebook extends CI_Controller{
    function index(){
	redirect('/');
	}
	function list_ebook($sort_by = 'NAME', $sort_order = 'asc', $offset = 0){
        
    //kiểm tra đã đăng nhập
    //$this->is_logged_in();
    
    //new model instance
    $this->load->model('ebook_model');
    $this->load->model('log_model');

    //assign value for model
    $user_data = $this->log_model->getUsernameLogin();
	
	$per_page  = 36;
	$offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2); 
    $results = $this->ebook_model->SelectAll($per_page, $offset, $sort_by, $sort_order);     
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
	$config['base_url'] = "http://myweb.pro.vn/ebook/";
	$config['uri_segment'] = 2; 
	$this->pagination->initialize($config);
	$pagination = $this->pagination->create_links();


	//set variable for view
    $data['fields'] = array( 'ID' => 'ID', 'NAME' => 'Tên');
    $data['ebook_data'] = $results['rows'];     
	$data['total_rows']=$results['num_rows'];
	$data['title'] = 'eBook Library';
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
          
    $query_ebook_category = 'SELECT *, ebook_category.name as CATEGORY_EBOOK FROM (SELECT sho.ID, sho.NAME as NAME_EBOOK, sho.ID_CATEGORY, count(*) AS counting FROM ebook_index AS sho GROUP BY sho.ID_CATEGORY ) obj_hash_tag INNER JOIN ebook_category ON ebook_category.id = obj_hash_tag.ID_CATEGORY ORDER BY obj_hash_tag.counting DESC';
	$query_game_category = 'SELECT *, game_category.NAME as CATEGORY_GAME FROM (SELECT sho.NAME as NAME_GAME, sho.ID_CATEGORY, count(*) AS counting FROM game_index AS sho GROUP BY sho.ID_CATEGORY ) obj_hash_tag INNER JOIN game_category ON game_category.ID = obj_hash_tag.ID_CATEGORY ORDER BY obj_hash_tag.counting DESC';
    
    //asign view variable
    $data['count_all_game'] = $this->db->count_all('game_index');
    $data['count_all_ebook'] = $this->db->count_all('ebook_index');
    $data['csrf_test_name'] = $this->security->get_csrf_hash(); 
    $data['category_ebook'] = $this->db->query($query_ebook_category)->result_array(); 
    $data['category_game'] = $this->db->query($query_game_category)->result_array();   
    $data['keyword'] = $this->db->select("*")->from("game_index")->get()->result_array();    
    
	
    $user_login = $this->db->select('*')->from('qtht_users')
                                           ->where('IS_LOGIN', '1')
                                           ->where('USERNAME', $this->session->userdata('username'))->get()->result_array();
                                           	
    if($user_login != null){
        $data['user_data']=$user_login;
    }
    if($user_login == null){
        $data['user_data'] = "-1";
    }
    
	$is_logged_in = $this->session->userdata('is_logged_in');
	if (!isset($is_logged_in) || $is_logged_in != true) {
		$data['is_log_in'] = "0";
	}
	else{
			$data['is_log_in'] = "1";
	}


    //load view
    $data['count_unity_game'] = count($this->db->select('*')->from('game_index')->where("EMBED_TYPE","unity3d")->get()->result_array()); 
    $data['count_flash_game'] = count($this->db->select('*')->from('game_index')->where("EMBED_TYPE","flash")->get()->result_array());
    $data['count_shockwave_game'] = count($this->db->select('*')->from('game_index')->where("EMBED_TYPE","shockwave")->get()->result_array());
    $data['search_frm']='/ebook/index/';
	$is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
        	$data['is_logged'] = "0";
        }
        else{
        		$data['is_logged'] = "1";
        }
	$this->load->view('header/default', $data);
    $this->load->view('ebook/index', $data);
    }
	function view($id){
	$header = new header();
	$data['w']="100%";
	$result=$this->db->select("*")->from("ebook_index")->where("id",$id)->get()->result_array();
    foreach($result as $key);
	$data['embed_flash']=$key['path'];
	$header->index("System Analysis Design UML Version 2.0, An Object Oreinted Approach");
	$this->load->view('ebook/view',$data);
	}
	
	//start function
	function en(){
	$content="";
	$header = new header();
	if(isset($_REQUEST['id'])){
		$id=str_replace('"','',stripslashes($_REQUEST['id']));
		$header->ebook("Free ebook download","en");
		$url="http://en.bookfi.org/".$id;
		$content=file_get_contents($url);
		$content=str_replace('http://bookre.org/','/ebook/',$content);
		$content=str_replace('Читать','Read online',$content);
		$content=str_replace('<a href="/" class="det_logo">Bookfi.org</a>','<a href="http://myweb.pro.vn/ebook/en" class="det_logo">Free eBook download</a>',$content);
		$content=str_replace('<a class="buttons active" href="howtodonate.php">Donate</a>','',$content);
	}
	else {	
		$header->ebook("Free ebook download","en");
		$content=file_get_contents('http://en.bookfi.org/Arts-%26-Photography-Architecture-cat1');
		$content=str_replace('href=','data-href=',$content);
		$content=str_replace('Читать','Read online',$content);
		$content=str_replace('http://bookfi.org','',$content);
		$content=str_replace('<meta','<meta class="xoa"',$content);
		$content=str_replace('<script','<script class="xoa"',$content);
		$content=str_replace('http://en.bookfi.org/','http://myweb.pro.vn',$content);
		$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
	}
	$data['content']=$content;
	$this->load->view('ebook/en',$data);
	}
	//end function

	//start function
	function get_book(){
	$data=array('name'=>trim($_REQUEST['name']),'link'=>$_REQUEST['link']);
	$book_data=$this->db->select('*')->from('ebook_index_en')->where('link',$_REQUEST['link'])->get()->result_array();		
	if($book_data){
	echo '1';
	}
	else {
		$this->db->insert('ebook_index_en',$data);
		$last_id=$this->db->insert_id();
		echo $last_id;
	}
	}
	//end function
	//http://123doc.org/trang-chu.htm - http://doc.edu.vn/tai-lieu/cong-nghe-thong-tin/ -http://luyenthianhvan.org/2008/11/check-your-vocabulary-for-english-for.html

}
?>