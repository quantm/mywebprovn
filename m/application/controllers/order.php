<?php

class order extends CI_Controller {

    function __construct() {

        parent::__construct(CI_Controller::get_instance());
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            echo '<html><title>Người dùng</title><meta charset="utf-8"><link type="text/css" href="/css/general.css" rel="Stylesheet"><font size="3" color=red>Bạn cần đăng nhập để sử dụng chức năng đặt hàng</font><br/><font color=red size="3">Nểu chưa tạo tài khoản trên hệ thống của chúng tôi xin vui lòng<a href=/user/register/> đăng ký tài khoản </a></font><br/></form><html>';
            die();
        }
    }

    function check() {
        $this->load->model('user_model');
        $uid = $this->user_model->getUserIdLogin();
        foreach ($uid as $id)
            ;
        if ($id['TYPE'] != '12')
            redirect('/actions/check');
    }

    function index($sort_by = 'ID_U', $sort_order = 'asc', $offset = 0) {

        //$this->check();
        //new model instance
        $this->load->model('order_model');
        $this->load->model('log_model');
        $uid = $this->log_model->getIdUserLogin();
        $limit = 10;
        $result = $this->order_model->SelectAll($limit, $offset, $sort_by, $sort_order);
        $data ['num_lists'] = $result['num_rows'];

        //phân trang
        $this->load->library('pagination');
        $config = array();
        $config ['base_url'] = site_url("/order/index/");
        $config ['total_rows'] = $data ['num_lists'];
        $config ['per_page'] = $limit;
        $config ['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data ['pagination'] = $this->pagination->create_links();

        $data ['sort_by'] = $sort_by;
        $data ['sort_order'] = $sort_order;

        //set variable for view
        $data ['fields'] = array('ID_ORDER' => 'Mã ĐH', '' => 'KH', '' => 'Tên', '' => 'ĐC giao hàng', 'COMPANY' => 'Quận', 'Address' => 'Ngày giao', 'ID_DISTRICT' => 'Giờ giao', 'PHONE' => 'Người nhận', 'DILEVERY_TIME' => 'Cách T.Toán', 'CUSTOMER_TYPE' => 'Driver', 'NOTES' => 'Ghi chú');
        $data['uid'] = $uid;
        $data['cust'] = $result['rows'];
        $data['auto'] = '';

        $data['title'] = 'Danh sách đặt hàng';


        //view
        $this->load->view('header/header', $data);
        $this->load->view('order/index', $data);
        $this->load->view('footer');
    }

    function cancel() {
        $param = $this->input->post('md5');
        $this->load->model('order_model');
        $this->order_model->cancel($param);
        redirect('/order/day/');
    }

    function input($sort_by = 'ID_ORDER', $sort_order = 'asc', $offset = 0) {


        $id_u = $this->input->post('idu');

        //new model instance
        $this->load->model('order_model');
        $this->order_model->input($id_u);
        $this->load->model('log_model');
        $this->load->model('user_model');
        $uid = $this->log_model->getIdUserLogin();

        $limit = 10;
        $result = $this->order_model->SelectOrder($limit, $offset, $sort_by, $sort_order);
        $result_ordered = $this->order_model->SelectOrderOneDay($limit, $offset, $sort_by, $sort_order);
        $data ['num_lists'] = $result['num_rows'];
        $data ['num_lists_ordered'] = $result_ordered['num_rows_ordered'];

        //phân trang
        $this->load->library('pagination');
        $config = array();
        $config ['base_url'] = site_url("/order/index/");
        $config ['total_rows'] = $data ['num_lists'];
        $config ['per_page'] = $limit;
        $config ['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data ['pagination'] = $this->pagination->create_links();

        //set variable for view
        $data ['fields'] = array('ID_ORDER' => 'Mã ĐH', 'DATE_TIME ' => 'Ngày ĐH', 'LASTNAME' => 'KH', 'PHONE' => 'Tel', 'DELIVERY_ADDRESS' => 'ĐC giao hàng',
            'ID_DISTRICT' => 'Quận', 'DELIVERY_TIME' => 'Giờ giao', 'ID_RECEIVER' => 'Người nhận', 'DILEVERY_TIME' => 'Cách T.Toán',
            'CUSTOMER_TYPE' => 'Driver', 'GHICHU' => 'Ghi chú');
        $data['uid'] = $uid;
        $data['order'] = $result['rows'];
        $data['ordered'] = $result_ordered['rows_ordered'];
        $data['auto'] = '';
        $data['driver'] = $this->user_model->getDriver();
        $data['district'] = $this->user_model->getDistrict();
        $data['paid_method'] = $this->order_model->getPaidMethod();
        $data['receiver'] = $this->order_model->getReceiver();
        $data ['sort_by'] = $sort_by;
        $data ['sort_order'] = $sort_order;
        //view
        $data['title'] = 'Đặt hàng';
        $this->load->view('header/header', $data);
        $this->load->view('order/day');
        $this->load->view('footer');
    }

	function update_order_line($id_order_line)
	{

	}

    function day($sort_by = 'ID_ORDER', $sort_order = 'asc', $offset = 0) {
       
        //new model instance
        $this->load->model('order_model');
        $this->load->model('user_model');
        $this->load->model('log_model');

        //assign variable for model
        $uid = $this->log_model->getIdUserLogin();
        $limit = 10;
        $result_ordered = $this->order_model->SelectOrderOneDay($limit, $offset, $sort_by, $sort_order);
        $data ['num_lists_ordered'] = $result_ordered['num_rows_ordered'];



        //phân trang
        $this->load->library('pagination');
        $config = array();
        $config ['base_url'] = site_url("/order/day/");
        $config ['total_rows'] = $data ['num_lists_ordered'];
        $config ['per_page'] = $limit;
        $config ['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data ['pagination'] = $this->pagination->create_links();

        //set variable for view
        $data ['fields'] = array('ID_ORDER' => 'Mã ĐH', 'DATE_TIME ' => 'Ngày ĐH', 'LASTNAME' => 'KH', 'PHONE' => 'Tel', 'DELIVERY_ADDRESS' => 'ĐC giao hàng',
            'ID_DISTRICT' => 'Quận', 'DELIVERY_TIME' => 'Giờ giao', 'ID_RECEIVER' => 'Người nhận', 'DILEVERY_TIME' => 'Cách T.Toán',
            'CUSTOMER_TYPE' => 'Driver', 'GHICHU' => 'Ghi chú');
        $data['uid'] = $uid;
        $data['ordered'] = $result_ordered['rows_ordered'];
        $data['auto'] = '';
        $data ['sort_by'] = $sort_by;
        $data ['sort_order'] = $sort_order;
        $data['item'] = $this->order_model->getItem();
        $data['stat'] = $this->order_model->getOrderStatus();
        $data['row_order'] = $this->input->post('id_order');
        $data['title'] = 'Đặt hàng';

        //view
        $this->load->view('header/header', $data);
        $this->load->view('order/detail', $data);
        $this->load->view('footer');
    }

    function update_id_order($md5) {
        echo $md5;
    }

    function save_order() {
        //new model instance
        $this->load->model('customer_model');
        $this->load->model('user_model');
        $this->customer_model->save_order();

        $max_id_order = $this->user_model->getMaxIdUserOrder();
        foreach ($max_id_order as $max)
            ;
        $id_max = $max['ID_ORDER'];

        $id_user_order = $this->user_model->getUserIdLogin();
        foreach ($id_user_order as $user)
            ;
        $id_u = $user['ID_U'];


        $data['detail'] = $this->customer_model->order_detail($id_u);
        $data['total_paid'] = $this->customer_model->total_paid();
        $data['id'] = $max['ID_ORDER'];
        $this->load->view('customer/success', $data);
    }

    function getprice($param) {
        $q = $this->db->select('*')->from('admin_menu')
                        ->where('ID', $param)
                        ->get()->result_array();
        foreach ($q as $price)
            ;
        echo $price['PRICE'];
    }

     function getstatus($param) {
        $q = $this->db->select('*')->from('order_status')
                        ->where('ID', $param)
                        ->get()->result_array();
        foreach ($q as $price)
            ;
        echo $price['NAME'];
    }
    
    function get_item_name($param) {
        $q = $this->db->select('*')->from('admin_menu')
                        ->where('ID', $param)
                        ->get()->result_array();
        foreach ($q as $item)
            ;
        echo $item['NAME'];
    }

    function order_line_save($param1, $param2, $param3, $param4, $param5, $param6, $param7,$param8,$param9) {


        $result=$this->db->select('*')->from('order_status')->where('ID',$param4)->get()->result_array();
        foreach($result as $status);

        $data = array('ID_ITEM' => $param1, 'PRICE' => $param2, 'QUANTITY' => $param3, 'ID_STATUS' => $param4, 'PAID' => $param5, 'MD5' => $param6);
        $this->db->insert('order_line', $data);

        /*
          $query=$this->db->select('order_line.*,admin_menu.NAME as ITEM')->from('order_line')
          ->join('admin_menu','admin_menu.ID=order_line.ID_ITEM','inner')
          ->where('MD5',$param6)
          ->get()->result_array();
          foreach($query as $ajaxdata);
          //echo $ajaxdata['ITEM'];
         */
         
         
         //new model instance
         $this->load->model('order_model');
          
          
          $url_chat_data = array("%20","%C3%81","%C3%80","%C3%83","%E1%BA%A2","%C3%82","%E1%BA%A0","%C3%89","%C3%88","%E1%BA%BC","%E1%BA%BA","%C3%8A","%E1%BA%B8","%C3%8D","%C3%8C","%E1%BB%88","%C4%A8","%E1%BB%8A","%C3%93","%C3%92","%E1%BB%8E","%C3%95","%C3%94","%E1%BB%8C","%C3%9A","%C3%99","%C5%A8","%E1%BB%A6","%E1%BB%A4","%C4%82","%E1%BA%AE","%E1%BA%B0","%E1%BA%B2","%E1%BA%B4","%E1%BA%B6","%E1%BA%A4","%E1%BA%A6","%E1%BA%AA","%E1%BA%A8","%E1%BA%AC","%C6%A0","%E1%BB%9A","%E1%BB%A2","%E1%BB%9E","%E1%BB%A0","%E1%BB%9C","%C3%9D","%E1%BB%B2","%E1%BB%B8","%E1%BB%B6","%E1%BA%BE","%E1%BB%80","%E1%BB%82","%E1%BB%86","%E1%BB%84","%E1%BB%90","%E1%BB%98","%E1%BB%96","%E1%BB%94","%E1%BB%92","%C6%AF","%E1%BB%A8","%E1%BB%AA","%E1%BB%AE","%E1%BB%B0","%E1%BB%AC","%C3%A1","%C3%A0","%E1%BA%A3","%C3%A3","%E1%BA%A1","%C3%A2","%C4%83","%C3%A9","%C3%A8","%E1%BA%BD","%E1%BA%BB","%C3%AA","%E1%BA%B9","%C3%AD","%C3%AC","%E1%BB%89","%C4%A9","%E1%BB%8B ","%C3%B3","%C3%B2","%E1%BB%8F","%C3%B5","%E1%BB%8D","%C3%B4","%C6%A1","%C3%BA","%C3%B9","%C5%A9","%E1%BB%A7","%E1%BB%A5","%C6%B0","%E1%BA%AF","%E1%BA%B1","%E1%BA%B5","%E1%BA%B3","%E1%BA%B7","%E1%BB%9B","%E1%BB%9D","%E1%BB%9F","%E1%BB%A1","%E1%BB%A3","%E1%BB%B1","%E1%BB%A9","%E1%BB%AB","%E1%BB%AF","%E1%BB%AD","%C4%91","%C3%BD","%E1%BB%B9","%E1%BB%B7","%E1%BB%B5","%E1%BB%B3","%E1%BB%B4","%E1%BA%AD","%E1%BA%A7","%E1%BA%A5","%E1%BA%AB","%E1%BA%A9","%E1%BA%BF","%E1%BB%81","%E1%BB%83","%E1%BB%85","%E1%BB%87","%E1%BB%95"," %E1%BB%91","%E1%BB%93","%E1%BB%97","%E1%BB%99");
          $convert_chat_data=array(" ","Á","À","Ã","Ả","Â","Ạ","É","È","Ẽ","Ẻ","Ê","Ẹ","Í","Ì","Ỉ","Ĩ","Ị","Ó","Ò","Ỏ","Õ","Ô","Ọ","Ú","Ù","Ũ","Ủ","Ụ","Ă","Ắ","Ằ","Ẳ","Ẵ","Ặ","Ấ","Ầ","Ẫ","Ẩ","Ậ","Ơ","Ớ","Ợ","Ở","Ỡ","Ờ","Ý","Ỳ","Ỹ","Ỷ","Ế","Ề","Ể","Ệ","Ễ","Ố","Ộ","Ỗ","Ổ","Ồ","Ư","Ứ","Ừ","Ữ","Ự","Ử","á","à","ả","ã","ạ","â","ă","é","è","ẽ","ẻ","ê","ẹ","í","ì","ỉ","ĩ","ị","ó","ò","ỏ","õ","ọ","ô","ơ","ú","ù","ũ","ủ","ụ","ư","ắ","ằ","ẵ","ẳ","ặ","ớ","ờ","ở","ỡ","ợ","ự","ứ","ừ","ữ","ử","đ","ý","ỹ","ỷ","ỵ","ỳ","Ỵ","ậ","ầ","ấ","ẫ","ẩ","ế","ề","ể","ễ","ệ","ổ","ố","ồ","ỗ","ộ");
          $ten_kh=str_replace($url_chat_data,$convert_chat_data,$param9);
          $ho_kh=str_replace($url_chat_data,$convert_chat_data,$param8);
      
         
         //view
         $data['detail'] = $this->order_model->getOrderLineDetail($param6);
         $data['id_order'] = $param1;
         $data['ten_kh']=$ten_kh;
         $data['ho_kh']=$ho_kh; 
        $data['item'] = $this->order_model->getItem();
        $data['stat'] = $this->order_model->getOrderStatus();
        $data['md5']=$param6;         
         $this->load->view('/order/orderdetail',$data);
    }

    function view_update($id_query = 0) {
        //load menu header
        $data['title'] = 'Cập nhật khách hàng';
        $this->load->model('home_menu_model');

        //load data by id
        $this->input->loadbyId($id_query);

        //new model
        $this->load->model('customer_model');
        $update = $this->customer_model->viewupdate($id_query);
        foreach ($update as $district)
            ;
        $data['user_update'] = $update;
        $data['sel'] = $district['ID_DISTRICT'];
        $data['sel_type'] = $district['ID_CUSTOMER_TYPE'];
        $data['district'] = $this->customer_model->getDistrict();
        $data['type'] = $this->customer_model->getCustType();
        $this->load->view('customer/update', $data);
    }

    function view_order_update($id) {
        $this->load->model('order_model');
        $this->load->model('user_model');
        $data['driver'] = $this->user_model->getDriver();
        $data['district'] = $this->user_model->getDistrict();
        $data['update'] = $this->order_model->view_order_update($id);
        $data['paid_method'] = $this->order_model->getPaidMethod();
        $data['receiver'] = $this->order_model->getReceiver();
        $data['title'] = 'Cập nhật';
        $this->load->view('/order/update_order', $data);
    }

    function update_order($id) {
        $this->load->model('order_model');
        $this->order_model->update_order($id);
    }

    function update($id_query = 0) {
        $id_query = $this->input->post('id');
        //var_dump($id_query);
        $this->load->model('customer_model');
        $this->customer_model->save_update($id_query);
    }

    function save_order_line() {
        $data = array('ID_ITEM' => $this->input->post('item'), 'PRICE' => $this->input->post('price'),
            'QUANTITY' => $this->input->post('quantity'), 'PAID' => $this->input->post('paid_row'),
            'ID_STATUS' => $this->input->post('status'), 'MD5' => $this->input->post('md5_id'),
        );
        $this->db->insert('order_line', $data);
    }

    function savedetail($id) {
        $this->load->model('order_model');
        $this->order_model->orderdetail($id);
    }

    function detail($sort_by = 'ID_ORDER', $sort_order = 'asc', $offset = 0) {

        //post
        $md5 = $this->input->post('md5');
        $idu = $this->input->post('id_u');

        //new model instance
        $this->load->model('order_model');
        $this->load->model('user_model');
        $this->load->model('log_model');
        $uid = $this->log_model->getIdUserLogin();
        $this->order_model->details($md5, $idu);

        $limit = 10;
        $result = $this->order_model->SelectOrder($limit, $offset, $sort_by, $sort_order);
        $result_ordered = $this->order_model->SelectOrderOneDay($limit, $offset, $sort_by, $sort_order);
        $data ['num_lists'] = $result['num_rows'];
        $data ['num_lists_ordered'] = $result_ordered['num_rows_ordered'];

        //phân trang
        $this->load->library('pagination');
        $config = array();
        $config ['base_url'] = site_url("/order/detail/");
        $config ['total_rows'] = $data ['num_lists'];
        $config ['per_page'] = $limit;
        $config ['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data ['pagination'] = $this->pagination->create_links();

        //set variable for view
        $data ['fields'] = array('ID_ORDER' => 'Mã ĐH', 'DATE_TIME ' => 'Ngày ĐH', 'LASTNAME' => 'KH', 'PHONE' => 'Tel', 'DELIVERY_ADDRESS' => 'ĐC giao hàng',
            'ID_DISTRICT' => 'Quận', 'DELIVERY_TIME' => 'Giờ giao', 'ID_RECEIVER' => 'Người nhận', 'DILEVERY_TIME' => 'Cách T.Toán',
            'CUSTOMER_TYPE' => 'Driver', 'GHICHU' => 'Ghi chú');
        $data['uid'] = $uid;
        $data['order'] = $result['rows'];
        $data['ordered'] = $result_ordered['rows_ordered'];
        $data['auto'] = '';
        $data['driver'] = $this->user_model->getDriver();
        $data['district'] = $this->user_model->getDistrict();
        $data ['sort_by'] = $sort_by;
        $data ['sort_order'] = $sort_order;
        $data['item'] = $this->order_model->getItem();
        $data['stat'] = $this->order_model->getOrderStatus();
        $data['row_order'] = $this->input->post('id_order');
        $data['title'] = 'Đặt hàng';

        //view
        $this->load->view('header/header', $data);
        $this->load->view('order/detail', $data);
        $this->load->view('footer');
    }

	function view_order_line_detail($id_order_line)
    {
        //new model instance
        $this->load->model('order_model');
        
        //assign model value
        $order_line=$this->order_model->order_line_select($id_order_line);
        foreach($order_line as $order);

         //var_dump($order_line);    
         $this->input->loadbyId($id_order_line);
        

		//view
        $data['update_order_line']=$order_line;
		$data['stat'] = $this->order_model->getOrderStatus();
		$data['sel']=$order['ID_STAT'];
		$data['selected_item']=$order['ID_ITEM'];
		$data['item'] = $this->order_model->getItem();
		$this->load->view('/order/update_order_line',$data);
    }
    
    function viewdetail($id_order, $md5,$customer_name,$customer_lastname) {
        
		//new model instance
        $this->load->model('order_model');
        /*
          $md5=$this->db->select('*')->from('order')->where('ID_ORDER',$id_order);
          foreach($md5 as $md5_id);
          $md5_update=$md5_id['MD5'];
          $this->db->where('MD5',$md5_update);
          $this->db->update('order_line',array('ID_ORDER'=>$id_order));
         */

      $url_chat_data = array("%20","%C3%81","%C3%80","%C3%83","%E1%BA%A2","%C3%82","%E1%BA%A0","%C3%89","%C3%88","%E1%BA%BC","%E1%BA%BA","%C3%8A","%E1%BA%B8","%C3%8D","%C3%8C","%E1%BB%88","%C4%A8","%E1%BB%8A","%C3%93","%C3%92","%E1%BB%8E","%C3%95","%C3%94","%E1%BB%8C","%C3%9A","%C3%99","%C5%A8","%E1%BB%A6","%E1%BB%A4","%C4%82","%E1%BA%AE","%E1%BA%B0","%E1%BA%B2","%E1%BA%B4","%E1%BA%B6","%E1%BA%A4","%E1%BA%A6","%E1%BA%AA","%E1%BA%A8","%E1%BA%AC","%C6%A0","%E1%BB%9A","%E1%BB%A2","%E1%BB%9E","%E1%BB%A0","%E1%BB%9C","%C3%9D","%E1%BB%B2","%E1%BB%B8","%E1%BB%B6","%E1%BA%BE","%E1%BB%80","%E1%BB%82","%E1%BB%86","%E1%BB%84","%E1%BB%90","%E1%BB%98","%E1%BB%96","%E1%BB%94","%E1%BB%92","%C6%AF","%E1%BB%A8","%E1%BB%AA","%E1%BB%AE","%E1%BB%B0","%E1%BB%AC","%C3%A1","%C3%A0","%E1%BA%A3","%C3%A3","%E1%BA%A1","%C3%A2","%C4%83","%C3%A9","%C3%A8","%E1%BA%BD","%E1%BA%BB","%C3%AA","%E1%BA%B9","%C3%AD","%C3%AC","%E1%BB%89","%C4%A9","%E1%BB%8B ","%C3%B3","%C3%B2","%E1%BB%8F","%C3%B5","%E1%BB%8D","%C3%B4","%C6%A1","%C3%BA","%C3%B9","%C5%A9","%E1%BB%A7","%E1%BB%A5","%C6%B0","%E1%BA%AF","%E1%BA%B1","%E1%BA%B5","%E1%BA%B3","%E1%BA%B7","%E1%BB%9B","%E1%BB%9D","%E1%BB%9F","%E1%BB%A1","%E1%BB%A3","%E1%BB%B1","%E1%BB%A9","%E1%BB%AB","%E1%BB%AF","%E1%BB%AD","%C4%91","%C3%BD","%E1%BB%B9","%E1%BB%B7","%E1%BB%B5","%E1%BB%B3","%E1%BB%B4","%E1%BA%AD","%E1%BA%A7","%E1%BA%A5","%E1%BA%AB","%E1%BA%A9","%E1%BA%BF","%E1%BB%81","%E1%BB%83","%E1%BB%85","%E1%BB%87","%E1%BB%95"," %E1%BB%91","%E1%BB%93","%E1%BB%97","%E1%BB%99");
      $convert_chat_data=array(" ","Á","À","Ã","Ả","Â","Ạ","É","È","Ẽ","Ẻ","Ê","Ẹ","Í","Ì","Ỉ","Ĩ","Ị","Ó","Ò","Ỏ","Õ","Ô","Ọ","Ú","Ù","Ũ","Ủ","Ụ","Ă","Ắ","Ằ","Ẳ","Ẵ","Ặ","Ấ","Ầ","Ẫ","Ẩ","Ậ","Ơ","Ớ","Ợ","Ở","Ỡ","Ờ","Ý","Ỳ","Ỹ","Ỷ","Ế","Ề","Ể","Ệ","Ễ","Ố","Ộ","Ỗ","Ổ","Ồ","Ư","Ứ","Ừ","Ữ","Ự","Ử","á","à","ả","ã","ạ","â","ă","é","è","ẽ","ẻ","ê","ẹ","í","ì","ỉ","ĩ","ị","ó","ò","ỏ","õ","ọ","ô","ơ","ú","ù","ũ","ủ","ụ","ư","ắ","ằ","ẵ","ẳ","ặ","ớ","ờ","ở","ỡ","ợ","ự","ứ","ừ","ữ","ử","đ","ý","ỹ","ỷ","ỵ","ỳ","Ỵ","ậ","ầ","ấ","ẫ","ẩ","ế","ề","ể","ễ","ệ","ổ","ố","ồ","ỗ","ộ");
      $ten_kh=str_replace($url_chat_data,$convert_chat_data,$customer_name);
      $ho_kh=str_replace($url_chat_data,$convert_chat_data,$customer_lastname);
      
        // view
        $data['detail'] = $this->order_model->getOrderLineDetail($md5);
        $data['ten_kh']=$ten_kh;
        $data['ho_kh']=$ho_kh;
        $data['id_order'] = $id_order;
        $data['md5'] = $md5;
        $data['item'] = $this->order_model->getItem();
        $data['stat'] = $this->order_model->getOrderStatus();
        $this->load->view('/order/orderdetail', $data);
    }


     function view_update_order($id_query = 0) {
        //load menu header
        $data['title'] = 'Cập nhật';
        //load data by id
        $this->input->loadbyId($id_query);

        //new model
        $this->load->model('order_model');
        $this->load->model('home_menu_model');
        $this->load->model('customer_model');
        $this->load->model('user_model');
        
        //assign value for model
        $update = $this->order_model->view_order_update($id_query);
        $data['row_order'] = $this->input->post('id_order');
        $data['update'] = $update;
        $data['district'] = $this->customer_model->getDistrict();
        $data['receiver'] = $this->order_model->getReceiver();
        $data['driver'] = $this->user_model->getDriver();
        $data['paid'] = $this->order_model->getPaidMethod();
        $this->load->view('order/update', $data);
    }
    

    function save() {
        $this->load->model('customer_model');
        $this->customer_model->save();
        redirect('customer/index/');
    }

    function delete() {

        $idarray = $this->input->post('DEL');
        $counter = 0;
        while ($counter < count($idarray)) {
            if ($idarray[$counter] > 0) {
                var_dump($idarray[$counter]);
            }
            $counter++;
        }

        $this->load->model('customer_model');
        $this->customer_model->delete();
        redirect('/customer/index');
    }

}

?>