<?php

class customer extends CI_Controller {

    function __construct() {

        parent::__construct(CI_Controller::get_instance());
        $this->is_logged_in();
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            echo '<html><title>Người dùng</title><meta charset="utf-8"><link type="text/css" href="/css/general.css" rel="Stylesheet"><font size="3" color=red>Bạn cần đăng nhập để sử dụng chức năng đặt hàng</font><br/><font color=red size="3">Nểu chưa tạo tài khoản trên hệ thống của chúng tôi xin vui lòng<a href=/user/register/> đăng ký tài khoản </a></font><br/></form><html>';
            die();
        }
    }

    function check() {
        $this->load->model('log_model');
        $uid = $this->log_model->getIdUserLogin();
        foreach ($uid as $id)
            ;
        if ($id['TYPE'] != '12')
            redirect('/actions/check');
    }

    function index($sort_by = 'ID_U', $sort_order = 'asc', $offset = 0) {

        $this->check();

        //new model instance
        $this->load->model('customer_model');
        $this->load->model('log_model');
        
        ///assign value for model 
        $uid = $this->log_model->getIdUserLogin();
        $limit = 10;
        $result = $this->customer_model->SelectAll($limit, $offset, $sort_by, $sort_order);
        $data ['num_lists'] = $result['num_rows'];

        //phân trang
        $this->load->library('pagination');
        $config = array();
        $config ['base_url'] = site_url("/customer/index/");
        $config ['total_rows'] = $data ['num_lists'];
        $config ['per_page'] = $limit;
        $config ['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data ['pagination'] = $this->pagination->create_links();

        $data ['sort_by'] = $sort_by;
        $data ['sort_order'] = $sort_order;


        //set variable for view
        $data ['fields'] = array('ID_U' => 'Mã KH', 'Sex' => 'Dx', 'LASTNAME' => 'Họ', 'NAME' => 'Tên', 'COMPANY' => 'Cty', 'Address' => 'Địa chỉ', 'ID_DISTRICT' => 'Quận', 'PHONE' => 'TEL', 'DILEVERY_TIME' => 'Giờ giao', 'CUSTOMER_TYPE' => 'Loại', 'NOTES' => 'Ghi chú');
        $data['uid'] = $uid;
        $data['cust'] = $result['rows'];
        $data['title'] = 'Danh sách khách hàng';
        $data['auto'] = '';
        $data['district'] = $this->customer_model->getDistrict();
        $data['type'] = $this->customer_model->getCustType();
        $data['row_idu']=$this->input->post('idu');
        
        //view 
        $this->load->view('header/header', $data);
        $this->load->view('customer/index', $data);
        $this->load->view('footer');
    }

    function save_order() {
        //new model instance
        $this->load->model('customer_model');
        $this->load->model('user_model');
        $this->load->model('log_model');
        $this->customer_model->save_order();

        $max_id_order = $this->user_model->getMaxIdUserOrder();
        foreach ($max_id_order as $max)
            ;
        $id_max = $max['ID_ORDER'];

        $id_user_order = $this->log_model->getIdUserLogin();
        foreach ($id_user_order as $user)
            ;
        $id_u = $user['ID_U'];


        $data['detail'] = $this->customer_model->order_detail($id_u);
        $data['total_paid'] = $this->customer_model->total_paid();
        $data['id'] = $max['ID_ORDER'];

        $this->load->view('customer/success', $data);
    }

    function order($id_query = 0) {

        //load menu header
        $data['title'] = 'Form đặt hàng';
        $this->input->loadbyId($id_query);

        //new model
        $this->load->model('customer_model');
        $this->load->model('user_model');
        $this->load->model('func_model');

        $data['order'] = $this->customer_model->vieworder($id_query);
        $data['user'] = $this->user_model->getUserDataLogin();
        $this->load->view('customer/order', $data);
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

    function update($id_query = 0) {
        $id_query = $this->input->post('id');
        //var_dump($id_query);
        $this->load->model('customer_model');
        $this->customer_model->save_update($id_query);
    }

    function detail($query_id = 0) {
        $this->input->loadbyId($query_id);
        $this->load->model('customer_model');
        $data ['emp'] = $this->customer_model->selectDepByCoquan($query_id);
        $data ['emp_caption'] = $this->customer_model->selectCoquanCaption($query_id);
        $data['id'] = $query_id;
        //$this->load->view ( '/customer/detail', $data );
        $this->load->view('/customer/detail', $data);
    }

    function save() {
        $this->load->model('customer_model');
        $this->customer_model->save();
        echo '<html>
		 		<meta charset="utf-8">
                <body onload="success();">
                </body>
                <script>
                                function success()
                                {
                                    alert("Đã thêm mới khách hàng");
                                    if(confirm)
                                    document.location.href="/customer/index/";
                                }
                </script>
            </html>';
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