<?php

require_once 'application/controllers/header.php';
require_once 'application/controllers/sessions.php';

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
TR?N MINH QUÂN */

class product extends CI_Controller {

function is_logged_in() {
$is_logged_in = $this->session->userdata('is_logged_in');
if (!isset($is_logged_in) || $is_logged_in != true) {
echo 0;
}

if (!isset($is_logged_in) || $is_logged_in == true) {
echo 1;
}
}

function search(){

$query_product="select pr.*,left (pr.`name`,15) as _name from `product` pr ";
if (isset($_REQUEST['price_to'])) {
$query_product=$query_product."where pr.`price_out` <=".$_REQUEST["price_to"]." and ";
}

if (isset($_REQUEST['price_from'])) {
$query_product=$query_product."pr.`price_out`>=".$_REQUEST["price_from"];
}

$ResultSet=$this->db->query($query_product)->result_array();	
header('Content-Type: application/json', true);
echo json_encode(array('SearchData'=>$ResultSet));
}

function home_detail($id) {
$product = $this->db->select('*')->from('product')->where('id', $id)->get()->result_array();
$all = $this->db->select('*')->from('product')->get()->result_array();
//var_dump($product);
$data['product'] = $product;
$data['all'] = $all;
$this->load->view('/product/home_detail', $data);
}

function write_comment($id_product, $comment, $commenter) {

//get user id
$this->load->model('log_model');
$id_u = $this->log_model->getId();

$date = getdate();
$time = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];

//g? ti?ng Vi?t - browser ANSI - unicode character
$comment_data = array("%20", "%C3%81", "%C3%80", "%C3%83", "%E1%BA%A2", "%C3%82", "%E1%BA%A0", "%C3%89", "%C3%88", "%E1%BA%BC", "%E1%BA%BA", "%C3%8A", "%E1%BA%B8", "%C3%8D", "%C3%8C", "%E1%BB%88", "%C4%A8", "%E1%BB%8A", "%C3%93", "%C3%92", "%E1%BB%8E", "%C3%95", "%C3%94", "%E1%BB%8C", "%C3%9A", "%C3%99", "%C5%A8", "%E1%BB%A6", "%E1%BB%A4", "%C4%82", "%E1%BA%AE", "%E1%BA%B0", "%E1%BA%B2", "%E1%BA%B4", "%E1%BA%B6", "%E1%BA%A4", "%E1%BA%A6", "%E1%BA%AA", "%E1%BA%A8", "%E1%BA%AC", "%C6%A0", "%E1%BB%9A", "%E1%BB%A2", "%E1%BB%9E", "%E1%BB%A0", "%E1%BB%9C", "%C3%9D", "%E1%BB%B2", "%E1%BB%B8", "%E1%BB%B6", "%E1%BA%BE", "%E1%BB%80", "%E1%BB%82", "%E1%BB%86", "%E1%BB%84", "%E1%BB%90", "%E1%BB%98", "%E1%BB%96", "%E1%BB%94", "%E1%BB%92", "%C6%AF", "%E1%BB%A8", "%E1%BB%AA", "%E1%BB%AE", "%E1%BB%B0", "%E1%BB%AC", "%C3%A1", "%C3%A0", "%E1%BA%A3", "%C3%A3", "%E1%BA%A1", "%C3%A2", "%C4%83", "%C3%A9", "%C3%A8", "%E1%BA%BD", "%E1%BA%BB", "%C3%AA", "%E1%BA%B9", "%C3%AD", "%C3%AC", "%E1%BB%89", "%C4%A9", "%E1%BB%8B ", "%C3%B3", "%C3%B2", "%E1%BB%8F", "%C3%B5", "%E1%BB%8D", "%C3%B4", "%C6%A1", "%C3%BA", "%C3%B9", "%C5%A9", "%E1%BB%A7", "%E1%BB%A5", "%C6%B0", "%E1%BA%AF", "%E1%BA%B1", "%E1%BA%B5", "%E1%BA%B3", "%E1%BA%B7", "%E1%BB%9B", "%E1%BB%9D", "%E1%BB%9F", "%E1%BB%A1", "%E1%BB%A3", "%E1%BB%B1", "%E1%BB%A9", "%E1%BB%AB", "%E1%BB%AF", "%E1%BB%AD", "%C4%91", "%C3%BD", "%E1%BB%B9", "%E1%BB%B7", "%E1%BB%B5", "%E1%BB%B3", "%E1%BB%B4", "%E1%BA%AD", "%E1%BA%A7", "%E1%BA%A5", "%E1%BA%AB", "%E1%BA%A9", "%E1%BB%99");
$convert_data = array(" ", "Á", "À", "?", "?", "Â", "?", "É", "È", "?", "?", "Ê", "?", "Í", "?", "?", "?", "?", "Ó", "?", "?", "?", "Ô", "?", "Ú", "Ù", "?", "?", "?", "Ă", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "Ơ", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "Ư", "?", "?", "?", "?", "?", "á", "à", "?", "?", "?", "â", "ă", "é", "è", "?", "?", "ê", "?", "í", "?", "?", "?", "?", "ó", "?", "?", "?", "?", "ô", "ơ", "ú", "ù", "?", "?", "?", "ư", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "đ", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?", "?");
$content = str_replace($comment_data, $convert_data, $comment);
$nbl = str_replace($comment_data, $convert_data, $commenter);

$data = array('id_product' => $id_product, 'commenter' => $nbl, 'content' => $content, 'date' => $time, 'view' => '0');

$this->db->insert('comment', $data);
$data['comment'] = $this->db->select('product.*,comment.*,comment.content as comment,user.*,user.name as commenter')
->from('comment')
->join('product', 'comment.id_product=product.id', 'inner')
->join('user', 'comment.id_u=user.id_u', 'inner')
->where('product.id', $id_product)
->get()->result_array();

$data['detail'] = $this->db->select('*')->from('product')->where('id', $id_product)->get()->result_array();
echo 2;
//$this->load->view('/product/comment', $data);
}

function update($id_product) {
//load header
$header = new header();
$header->admin('C?p nh?t s?n ph?m');

$result= $this->db->select('*')->from('product')->where('id', $id_product)->get()->result_array();
foreach($result as $val);
$data['cate']=$this->db->select('*')->from('product_category')->get()->result_array();
$data['update']=$result;
$data['id_cat']=$val['id_category'];
$data['id_product'] = $id_product;
$this->load->view('/admin/product/update', $data);
}

function save_update() {

$id_product = $this->input->post('id_product');
$data = array();

if ($_FILES['userfile']['name'] == null) {
$data = array('name' => $this->input->post('name'),
'price_out' => $this->input->post('price_out'),
'price_in   ' => $this->input->post('price_in'),
'is_promotion' => $this->input->post('is_promotion'),
'is_best' => $this->input->post('is_best'),
'is_new' => $this->input->post('is_new'),
'description' => $this->input->post('description'),
'id_category' => $this->input->post('category'),
'size' => $this->input->post('size'),
'description' => $this->input->post('contents'),
'quantity' => $this->input->post('quantity'),
'type_price' => 'vnd');
}
if ($_FILES['userfile']['name'] != null) {
$temp_path = 'Upload/product/';
$filepath = $temp_path . $_FILES['userfile']['name'];
if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $filepath)) {
return -1;
}

$data = array('name' => $this->input->post('name'),
'price_in' => $this->input->post('price_in'),
'price_out' => $this->input->post('price_out'),
'image' => $filepath,
'is_promotion' => $this->input->post('is_promotion'),
'is_best' => $this->input->post('is_best'),
'id_category' => $this->input->post('category'),
'is_new' => $this->input->post('is_new'),
'is_popular' => $this->input->post('is_popular'),
'size' => $this->input->post('size'),
'description' => $this->input->post('description'),
'type_price' => 'vnd');
}

$this->db->where('id', $id_product);
$this->db->update('product', $data);
redirect('/admin/product/');
}

function check_order_user_login_stat() {
$this->is_logged_in();
}

function index($offset = 0) {
        
        $limit = 12;
        $view = 'grid';
        
        if (isset($_REQUEST['view'])) {
        if ($_REQUEST['view'])
        $view = $_REQUEST['view'];
        }
        
        /* one order more product
        $is_post=$this->input->get_post('is_post');
        if($is_post==0) {$data['is_post']=0;}
        if($is_post == null) {$data['is_post']=1;}
        */
        
        //new model
        $this->load->model('product_model');
        $this->load->model('log_model');
        
        
        //load header
        $header = new header();
        $header->index('', '0');
        
        //asign model value
        $result = $this->product_model->selectall($limit, $offset);
        
        $data['product'] = $result['all'];
        if (isset($_REQUEST['price_value_to'])) {$data['price_from']=$result['price_from'];}
        if (isset($_REQUEST['price_value_from'])) {$data['price_to']=	$result['price_to'];}
        
        $min=$this->db->query('select MIN(product.price_out) as min from product')->result_array();
        foreach($min as $key_min);
        if (!isset($_REQUEST['price_value_from'])) {$data['price_from']=$key_min['min'];}
        
        $max=$this->db->query('select MAX(product.price_out) as max from product')->result_array();
        foreach($max as $key_max);
        if (!isset($_REQUEST['price_value_to'])) {$data['price_to']=$key_max['max'];}		
        
        $data['price_range']=$this->db->query('select DISTINCT(product.price_out) from product ORDER BY price_out ASC')->result_array();
        
        $cate=$this->db->select('*')->from('product_category')->where('id',$this->input->get_post('id_category'))->get()->result_array();
        foreach($cate as $cate_name);
        if (!isset($_REQUEST['id_category'])){$data['name_cate']='';}
        if (isset($_REQUEST['id_category'])){$data['name_cate']=$cate_name['name'];}
        
        /*
        // pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("/product/index/");
        $config['total_rows'] = $result['num_rows'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        */
        
        $data['price_result']=count($result['all']);
        if (!isset($_REQUEST['price_value_to'])||!isset($_REQUEST['price_value_from'])){$data['str_result']="Kho hàng";}
        if (isset($_REQUEST['price_value_to'])||isset($_REQUEST['price_value_from'])){$data['str_result']="K?t qu? t?m ki?m";}
        
        /* md5 encryption
        $this->load->library('session');
        $md5_time = $this->session->userdata('md5_time');
        */
        
        $sessions = new sessions();
        $p_session = $sessions->getSession();
        $md5_time = $p_session['s_home'];
        $data['is_post'] = $p_session['is_post'];
        
        $data['md5_time'] = $md5_time;
        $data['auto'] = '';
        $data['price'] = 'Giá';
        $data['header'] = '';
        
        if ($view == 'list') {
        $this->load->view('product/list_view', $data);
        }
        if ($view == 'grid') {
        $this->load->view('product/grid_view', $data);
        }
        $this->load->view('footer');
}

function detail($id_product) {

$url = '/index.php/order/getOrderData/';
//post variable
$order_panel = $this->input->post('dispatch');

//new model
$this->load->model('product_model');

//captcha
$this->load->helper('captcha');
$vals = array(
'img_path' => './captcha/',
'img_url' => 'http://khanlen.vn/captcha/',
'font_patht' => './captcha/fonts/Heineken.ttf',
'expiration' => 7200,
'img_width' => '200',
'img_height' => 30
);

$cap = create_captcha($vals);

$data = array(
'captcha_time' => $cap['time'],
'ip_address' => $this->input->ip_address(),
'word' => $cap['word']
);

$query = $this->db->insert_string('captcha', $data);
$this->db->query($query);

$expiration = time() - 7200; // Two hour limit
$this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);
$data['captcha'] = $cap;

//new model
$this->load->model('order_model');



$order_data = $this->order_model->SelectAll($encryption);
$data['encrypt'] = $encryption;
$data['ordered'] = $order_data['rows_order'];
$data['paid_row'] = $order_data['paid_row'];
$data['total_quantity'] = $order_data['total_quantity'];

$data['row_product'] = '';

//load header
$header = new header();
$header->loadheader('Chi ti?t s?n ph?m');

//sql
$district = $this->db->select('*')->from('district')->get()->result_array();
if ($order_panel == 1) {
$data['order_panel'] = "<script>loadDivFromUrl('order','$url" . "',1); </script>";
}
if ($order_panel == null) {
$data['order_panel'] = "";
}

$result = $this->product_model->get_comment($id_product);
$height = 715 + $result['num_rows'] * 15;
$data['comment'] = $result['data_rows'];
$data['footer_height'] = 980 + $result['num_rows'] * 15;
$data['num_rows'] = $result['num_rows'];
$data['height'] = $height;
$data['datadistrict'] = $district;
$data['err'] = '';
$data['detail'] = $this->product_model->get_detail($id_product);
$data['city'] = $this->db->select('*')->from('city')->get()->result_array();
$data['id_product'] = $id_product;

//session
$this->load->library('session');
$encryption = $this->session->userdata('md5_time');
$data['encrypt'] = $encryption;

$this->load->view('product/detail', $data);
}

function input() {
//load header
$header = new header();
$header->admin('Thêm m?i s?n ph?m');
$data['manufacturer'] = $this->db->select('*')->from('product_manufacturer')->get()->result_array();
$data['brand'] = $this->db->select('*')->from('product_brand')->get()->result_array();
$data['cate'] = $this->db->select('*')->from('product_category')->get()->result_array();
$this->load->view('/admin/product/input', $data);
}

function md5update($username) {
$q = $this->db->select('*')->from('user')->where('username', $username)->get()->result_array();
$last_id_u = $this->db->select_max('id_u')->from('user')->get()->result_array();

foreach ($q as $md5);

foreach ($last_id_u as $user);
$this->db->where('id_u', $user['id_u']);
$this->db->update('order', array('md5' => $md5['md5'], 'id_u' => $md5['id_u']));
}

function checkout() {
//session
$this->load->library('session');
$encryption = $this->session->userdata('md5_time');

//new model
$this->load->model('order_model');

$order_data = $this->order_model->SelectAll($encryption);

$data['encrypt'] = $encryption;
$data['ordered'] = $order_data['rows_order'];
$data['paid_row'] = $order_data['paid_row'];
$data['total_quantity'] = $order_data['total_quantity'];
$data['row_product'] = '';
$data['md5_time'] = $encryption;
$data['function'] = "";
$this->load->view('/order/checkout_detail', $data);
}

function checkout_finished($md5) {
$this->db->where('md5', $md5);
$this->db->update('order', array('is_finished' => '1'));

$is_logged_in = $this->session->userdata('is_logged_in');
if (!isset($is_logged_in) || $is_logged_in != true) {
echo 0;
}

if (!isset($is_logged_in) || $is_logged_in == true) {
echo 1;
}
}

function comment() {
$this->is_logged_in();
}

function save() {

//$gallery_path = realpath(APPPATH . '/Upload/product');

$gallery_path = '/Upload/product';

//var_dump($gallery_path);
$config = array(
'allowed_types' => 'jpg|jpeg|gif|png',
'upload_path' => $gallery_path,
'max_size' => 5000
);

$this->load->library('upload', $config);
$this->upload->do_upload();
$image_data = $this->upload->data();

$config = array(
'source_image' => $image_data['full_path'],
'new_image' => $gallery_path . '/thumbs',
'maintain_ration' => true,
'width' => 320,
'height' => 240
);

//var_dump($config['new_image']);
$img_name = $image_data['file_name'];
$thumb = '/Upload/product/thumbs/' . $img_name;

//var_dump($thumb);

$this->load->library('image_lib', $config);
$this->image_lib->resize();


$date = getdate();
$date_input = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
$temp_path = 'Upload/product/';
$filepath = $temp_path . $_FILES['userfile']['name'];
if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $filepath)) {
return -1;
}


$data = array('name' => $this->input->post('name'),
'date' => $date_input,
'price_in' => $this->input->post('price_in_'),
'price_out' => $this->input->post('price_out_'),
'quantity' => $this->input->post('quantity'),
'image' => $filepath,
'size' => $this->input->post('size'),
'is_promotion' => $this->input->post('is_promotion'),
'is_best' => $this->input->post('is_best'),
'is_new' => $this->input->post('is_new'),
'image_thumb' => $thumb,
'id_brand' => $this->input->post('brand'),
'id_producer' => $this->input->post('manufacturer'),
'original' => $this->input->post('original'),
'view_home' => 1,
'description' => $this->input->post('contents'),
'type_price' => 'VNĐ');
$this->db->insert('product', $data);
$last_id_product = $this->db->insert_id();

$idarray = $this->input->post('RELATED');
$counter = 0;
while ($counter < count($idarray)) {
if ($idarray[$counter] > 0) {
try {
$this->db->insert('product_relation',array('id'=>$last_id_product,'id_related'=>$idarray[$counter]	));
} catch (Exception $er) {
$adderror = $adderror . $idarray[$counter] . ' ; ';
};
}
$counter++;
}
redirect('/admin/product/');
}


function related($id_product){
$query="select product.*,product_relation.* from product INNER JOIN product_relation on product.id=product_relation.id_related WHERE product_relation.id=".$id_product."";
$result=$this->db->query($query)->result_array();
$data['product_relation']=$result;
$this->load->view('/product/related',$data);
}

function delete() {
$idarray = $this->input->post('DEL');
$counter = 0;
while ($counter < count($idarray)) {
if ($idarray[$counter] > 0) {
try {
$where = 'id = ' . $idarray[$counter];
$this->db->delete('product', $where);
} catch (Exception $er) {
$adderror = $adderror . $idarray[$counter] . ' ; ';
};
}
$counter++;
}

redirect('/index.php/admin/product');
}

}

?>
