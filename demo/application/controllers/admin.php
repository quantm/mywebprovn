<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/mail.php';
require_once('phpmailer/class.phpmailer.php');

class admin extends CI_Controller {

    function is_logged_in() {
        parent::__construct();
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            echo '<html><title>Quyền truy cập</title><meta charset="utf-8"><font color=red>Bạn không có quyền truy cập vào trang này</font><br><font color=blue><a href=/index.php/login/>Trở về trang đăng nhập</a></font><div style=position:absolute; left:330px; top:135px><img width=105 height=105 src=/images/key_login.png></div><html>';
            die();
        }
    }

    function __construct() {

        parent::__construct(CI_Controller::get_instance());
        $this->is_logged_in();
    }

	function product_related($id_category){
		$data['product_relation']=$this->db->select('*')->from('product')->where('id_category',$id_category)->get()->result_array();
		$this->load->view('/admin/product/related',$data);
	}

    function category(){
        //load header
        $header = new header();
		$header->admin('Quản trị Danh mục sản phẩm');	
		$data['data']=$this->db->select('*')->from('product_category')->where('name',$this->input->post('name'))->get()->result_array();		
		$this->load->view('/admin/category/index',$data);
    }
	
	  
    function save()
	{
		$mode=$this->input->post('mode');

		switch($mode)
		{
			case "brand":
			$this->db->insert('product_brand',array('name'=>$this->input->post('name')));	
			redirect('/admin/brand/');
			break;

			case "category":
			$this->db->insert('product_category',array('name'=>$this->input->post('name')));	
			redirect('/admin/category/');
			break;
		}
	}
	
	function update()
	{
	$mode =$this->input->post('mode');
	$id=$this->input->post('id');
	$id_update=$this->input->post('id_');		
		switch($mode)
		{
			case "brand":
			$this->db->where('id',$id);
			$this->db->update('product_brand',array('name'=>$this->input->post('name')));
			redirect('/index.php/admin/brand/');
			break;

			case "category":
			$this->db->where('id',$id_update);
			$this->db->update('product_category',array('name'=>$this->input->post('name')));				
			redirect('/index.php/admin/category/');
			break;
		}
	}
	
	function delete()
    {  
		$mode =$this->input->post('mode');
		$del_array=$this->input->get_post('DEL');
		$id=$this->input->post('id_');
		switch($mode)
		{
			case "customer":
			$counter = 0;
				while ($counter < count($del_array)) {
					if ($del_array[$counter] > 0) {
						try {
							$where = 'id_u = ' . $del_array[$counter];
							$this->db->delete('user', $where);
						} catch (Exception $er) {
							$adderror = $adderror . $del_array[$counter] . ' ; ';
						};
					}
					$counter++;
				}
			redirect('/index.php/admin/customer/');
			break;

			case "manufacturer":		
			$this->db->delete('product_manufacturer',array('id'=>$id));
			redirect('/admin/manufacturer/');
			break;
		
			case "category":
				$this->db->delete('product_category',array('id'=>$id));
				redirect('/admin/category/');
			break;	

			case "brand":
			$idarray = $this->input->post('DEL');
				$counter = 0;
				while ($counter < count($idarray)) {
					if ($idarray[$counter] > 0) {
						try {
							$where = 'id = ' . $idarray[$counter];
							$this->db->delete('product_brand', $where);
						} catch (Exception $er) {
							$adderror = $adderror . $idarray[$counter] . ' ; ';
						};
					}
					$counter++;
				}
			redirect('/index.php/admin/brand/');
			break;

			case "order":
			foreach($del_array as $key)
			{
				$query="delete from `order` where id =$key";
				$this->db->query($query);			
			}
			redirect('/admin/order/');
			break;

		}
    }

	function delete_vid()
    {
        $vid_type=$this->input->post('vid_type');
        
        $id=$this->input->post('id_vid');
        $this->db->delete('home_link',array('id'=>$id));
        if($vid_type==1){redirect('/admin/h_vid/');}
        if($vid_type==2){redirect('/admin/c_vid/');}
    }

	function brand()
	{
			//load header
            $header = new header();
            $header->admin('Quản trị Thương Hiệu');
			
			//get post
			$name=$this->input->post('name');

			//sql
			$query='select br.* from `product_brand` br';		

			if(strlen($name)){$query=$query." where br.`name` like '%".$name."%'";}

			$data['brand']=$this->db->query($query)->result_array();
			
			$this->load->view('/admin/brand/index',$data);
	}
    function manufacturer()
    {
		  //load header
            $header = new header();
            $header->admin('Quản trị Nhà sản xuất');
            
			//get post
			$name=$this->input->post('name');

			//sql
			$query='select br.* from `product_manufacturer` br';		

			if(strlen($name)){$query=$query." where br.`name` like '%".$name."%'";}
			
			$data['data']=$this->db->query($query)->result_array();

            $update=$this->input->post('update');
           if($update==1)
           {
            $data['add_update']='Cập nhật';
            $id=$this->input->post('id_');
            $update=$this->db->select('*')->from('product_manufacturer')->where('id',$id)->get()->result_array();
            foreach($update as $key);
            $data['name']=$key['name'];
            $data['link']=$key['image'];
            $data['url']=$key['url'];
           }
           if($update==0)
           {
            $data['add_update']='Thêm mới';
            $data['name']='';
            $data['link']='/images/manufacturer_blank.png';
            $data['url']='';
           }
           
           $data['id_']=$this->input->post('id_');
			$data['update']=$update;
		$this->load->view('/admin/manufacturer',$data);	
	}
	function addlink()
    {
        $update=$this->input->post('update');
        $id=$this->input->post('id_vid');
		$type=$this->input->post('type');
		$data=array('name'=>$this->input->post('vid_name'),'url'=>$this->input->post('vid_link'),'type'=>$type,'view'=>1);
		
        if($update==0)
        {
          $this->db->insert('home_link',$data);
          if($type==1){redirect('/index.php/admin/h_vid/');}
          if($type==2){redirect('/index.php/admin/c_vid/');}
        }
        
        if($update==1)
        {
         $query=$this->db->update('home_link',$data,array('id'=>$id));
		  if($type==1){redirect('/index.php/admin/h_vid/');}
          if($type==2){redirect('/index.php/admin/c_vid/');}
        }
                          
    }
  function s_partner()
    {

	    //get parameter
         $id=$this->input->post('id_');
		 $update=$this->input->post('update');
         $type=$this->input->post('type');   
		

        if($update==1)
		{
		 if ($_FILES['partner_logo']['name'] != null) {
            $temp_path = 'images/logo_manufacturer/';

			$filepath = $temp_path . $_FILES['partner_logo']['name'];
            if (!move_uploaded_file($_FILES['partner_logo']['tmp_name'], $filepath)) {
                return -1;
            }
				$slash='/';	
				$filepath=$slash.$filepath;
				 $data=array('name'=>$this->input->post('partner_name'),'url'=>$this->input->post('partner_website'),'image'=>$filepath);		
		 }		
			if($_FILES['partner_logo']['name'] == null){
			$data=array('name'=>$this->input->post('partner_name'),'url'=>$this->input->post('partner_website'));		
			}

		 $query=$this->db->update('product_manufacturer',$data,array('id'=>$id));
         redirect('/admin/manufacturer/');

		}

		if($update==null)
		{
            $up_file=$this->input->post('partner_logo');
            $temp_path = 'images/logo_partner/';
			if($type=="up_img"){$temp_path = 'images/intro_img/';}
            $filepath = $temp_path . $_FILES['partner_logo']['name'];
            if (!move_uploaded_file($_FILES['partner_logo']['tmp_name'], $filepath)) {
                return -1;
            }
		
            if($type!="up_img")
            {
          	     $slash='/';	
			     $filepath=$slash.$filepath;
			     $data=array('name'=>$this->input->post('partner_name'),'url'=>$this->input->post('partner_website'),'image'=>$filepath,'view'=>1);
			     $this->db->insert('product_manufacturer',$data);
			     redirect('/index.php/admin/manufacturer//');
            }
            if($type=="up_img")
            {
                $selAlignment=$this->input->post('selAlignment');
                $partner_logo=$_FILES['partner_logo']['name'];
                $txtBorder=$this->input->post('txtBorder');
                $txtHorizontal=$this->input->post('txtHorizontal');
                $txtVertical=$this->input->post('txtVertical');
                
                $path="/images/intro_img/".$partner_logo;
                //$img = "<img src='$path'>";
                $img = "<img src='/images/intro_img/1.jpg'>";
                
                echo "<script>window.returnValue='<img src=/images/intro_img/$partner_logo>';window.focus();window.close();</script>";        
            }
		}
              
    }
    

    function index() {
        //load header
        $header = new header();
        $header->admin('Quản trị hệ thống');
    }

    function news_detail($id) {
        $data['detail'] = $this->db->select('*')
                        ->from('news')
                        ->where('id', $id)
                        ->get()->result_array();                        
        $this->load->view('/admin/news/detail', $data);
    }
    
    
    function intro_detail($id) {
        $data['detail'] = $this->db->select('*')
                        ->from('intro')
                        ->where('id', $id)
                        ->get()->result_array();                        
        $this->load->view('/admin/intro/detail', $data);
    }

    function intro($offset = 0) {
        $limit = 10;
        //new model
        $this->load->model('admin_model');
        $this->load->model('intro_model');

        //load header
        $header = new header();
        $header->admin('Giới thiệu');

        //asign model value
        $result = $this->intro_model->SelectAll($limit, $offset);

        // pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("/admin/intro/");
        $config['total_rows'] = $result['num_rows'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //asign view value
        $data['intro'] = $result['rows'];
        $data['total_rows'] = $result['num_rows'];
        $this->load->view('/admin/intro/index', $data);
    }

    function intro_input() {
        //load header
        $header = new header();
        $header->admin('Thêm mới bài viết giới thiệu');
        $this->load->view('admin/intro/input');
    }

	function category_input(){
		//load header
        $header = new header();
        $header->admin('Thêm mới danh mục sản phẩm');
        
		$this->load->view('admin/category/input');
	}
	function brand_input()
	{
		//load header
        $header = new header();
        $header->admin('Thêm mới thương hiệu');
        $this->load->view('admin/brand/input');
	}

    function news($offset = 0) {
        $limit = 10;
        //new model
        $this->load->model('admin_model');
        $this->load->model('news_model');

        //load header
        $header = new header();
        $header->admin('Quản trị tin tức');

        //asign model value
        $result = $this->news_model->SelectAll($limit, $offset);

        // pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("/admin/news/");
        $config['total_rows'] = $result['num_rows'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //asign view value
        $data['news'] = $result['rows'];
        $data['total_rows'] = $result['num_rows'];
        $this->load->view('/admin/news/index', $data);
    }

    function product_comment($offset = 0) {
        $limit = 10;
        //new model
        $this->load->model('admin_model');

        //load header
        $header = new header();
        $header->admin('Quản lý bình luận');

        //asign model value
        $result = $this->admin_model->comment_product($limit, $offset);

        // pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("/admin/product/comment/");
        $config['total_rows'] = $result['num_rows'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //asign view value
        $data['product'] = $result['rows'];
        $data['total_rows'] = $result['num_rows'];
        $data['fields'] = array('name' => 'Tên', 'price' => 'Giá', 'color_pad' => 'Màu sắc', 'images' => 'Hình ảnh');
        $this->load->view('/admin/product/comment', $data);
    }

    function news_comment($offset = 0) {
        $limit = 10;
        //new model
        $this->load->model('admin_model');

        //load header
        $header = new header();
        $header->admin('Quản lý bình luận');

        //asign model value
        $result = $this->admin_model->news_comment($limit, $offset);

        // pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("/admin/news_comment/");
        $config['total_rows'] = $result['num_rows'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //asign view value
        $data['comment'] = $result['rows'];
        $data['total_rows'] = $result['num_rows'];
        $data['fields'] = array('name' => 'Tên', 'price' => 'Giá', 'color_pad' => 'Màu sắc', 'images' => 'Hình ảnh');
        $this->load->view('/admin/news/comment', $data);
    }

    function delete_comment() {
        $idarray = $this->input->post('DEL');
        $counter = 0;
        while ($counter < count($idarray)) {
            if ($idarray[$counter] > 0) {
                try {
                    $where = 'id = ' . $idarray[$counter];
                    $this->db->delete('comment', $where);
                } catch (Exception $er) {
                    $adderror = $adderror . $idarray[$counter] . ' ; ';
                };
            }
            $counter++;
        }

        redirect('/admin/news_comment/');
    }

	 function set_product_comment() {
        $idarray = $this->input->post('DEL');
        $counter = 0;
        while ($counter < count($idarray)) {
            if ($idarray[$counter] > 0) {
                    $this->db->where('id',$idarray[$counter]);
                    $this->db->update('comment', array('view'=>1));
            $counter++;
        }
		echo 1;
    }
 }

	 function set_news_comment() {
        $idarray = $this->input->post('DEL');
        $counter = 0;
        while ($counter < count($idarray)) {
            if ($idarray[$counter] > 0) {
                    $this->db->where('id',$idarray[$counter]);
                    $this->db->update('comment', array('view'=>1));
            $counter++;
        }
		echo 1;
    }
 }



    function product($offset = 0) {
        $limit = 10;
        //new model
        $this->load->model('admin_model');

        //load header
        $header = new header();
        $header->admin('Quản trị sản phẩm');

        //asign model value
        $result = $this->admin_model->product($limit, $offset);

        // pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("/admin/product/");
        $config['total_rows'] = $result['num_rows'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //asign view value
        $data['product'] = $result['rows'];
        $data['total_rows'] = $result['num_rows'];
        $data['fields'] = array('name' => 'Tên', 'price' => 'Giá', 'color_pad' => 'Màu sắc', 'images' => 'Hình ảnh');
        $this->load->view('/admin/product/index', $data);
    }

    function intro_update($id) {

        //load header
        $header = new header();
        $header->admin('Cập nhật bài viết giới thiệu');

        $update = $this->db->select('*')->from('intro')->where('id', $id)->get()->result_array();
        foreach ($update as $news);

        $data['update'] = $update;
        $data['id_intro'] = $id;
        $this->load->view('/admin/intro/update', $data);
    }
    
	 function brand_update($id) {

        //load header
        $header = new header();
        $header->admin('Cập nhật Thương hiệu');

        $update = $this->db->select('*')->from('product_brand')->where('id', $id)->get()->result_array();
        foreach ($update as $news);

        $data['update'] = $update;
        $data['id_intro'] = $id;
        $this->load->view('/admin/brand/update', $data);
    }
    
	

    function news_update($id) {

        //load header
        $header = new header();
        $header->admin('Cập nhật bài viết');

        $update = $this->db->select('*')->from('news')->where('id', $id)->get()->result_array();
        foreach ($update as $news)
            ;

        if ($news['is_latest'] == 0) {
            $data['latest'] = '';
        } else if ($news['is_latest'] == 1) {
            $data['latest'] = 'checked value=1';
        }

        if ($news['is_promotion'] == 0) {
            $data['promotion'] = '';
        } else if ($news['is_promotion'] == 1) {
            $data['promotion'] = 'checked value=1';
        }


        $data['update'] = $update;
        $data['id_news'] = $id;
        $this->load->view('/admin/news/update', $data);
    }

    function customer($offset = 0) {
        $limit = 10;
        //new model
        $this->load->model('user_model');

        //load header
        $header = new header();
        $header->admin('Quản trị khách hàng');

        //asign model value
        $result = $this->user_model->selectall($limit, $offset);

        // pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("/admin/order/");
        $config['total_rows'] = $result['num_rows'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //asign view value
        $data['customer'] = $result['rows'];
        $data['total_rows'] = $result['num_rows'];
        $data['district'] = $this->db->select('*')->from('district')->get()->result_array();
        $data['user'] = $this->db->select('*')->from('user')->get()->result_array();
        $data['fields'] = array('name' => 'Tên', 'price' => 'Giá', 'color_pad' => 'Màu sắc', 'images' => 'Hình ảnh');
        $this->load->view('/admin/customer/index', $data);
    }

    function contact($offset = 0) {
        $limit = 10;
        //new model
        $this->load->model('admin_model');

        //load header
        $header = new header();
        $header->admin('Liên hệ');

        //asign model value
        $result = $this->admin_model->contact($limit, $offset);

        // pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("/admin/contact/");
        $config['total_rows'] = $result['num_rows'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //asign view value
        $data['customer'] = $result['rows'];
        $data['total_rows'] = $result['num_rows'];
        $data['district'] = $this->db->select('*')->from('district')->get()->result_array();
        $data['user'] = $this->db->select('*')->from('user')->get()->result_array();
        $this->load->view('/admin/contact/index', $data);
    }

    function order($offset = 0) {
       
	   $post=$this->input->post();

		$limit = 10;
        //new model
        $this->load->model('admin_model');

        //load header
        $header = new header();
        $header->admin('Quản trị đơn hàng');

        //asign model value
        $result = $this->admin_model->order($limit, $offset);

        // pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("/admin/order/");
        $config['total_rows'] =count($result);
        $config['per_page'] = $limit;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        //asign view value
		$data['order_stat']=$this->db->select('*')->from('order_status')->get()->result_array();
        $data['order'] = $result;
        $data['total_rows'] =count($result);
        $data['user'] = $this->db->select('*')->from('order_info')->get()->result_array();
        $this->load->view('/admin/order/index', $data);
    }

    function sendmail() {
        $mail = new PHPMailer();
        $arrParam = $this->input->post();
        /*
          $attach = $_FILES['attach'];
          $dirUpload = 'files/';
          @copy($attach['tmp_name'], $dirUpload . $attach['name']);
         */


        $mail->IsSMTP(); // Gọi đến class xử lý SMTP
        $mail->Host = "smtp.gmail.com";     // tên SMTP server
        $mail->SMTPDebug = 2;                    // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        $mail->SMTPAuth = true;                  // Sử dụng đăng nhập vào account
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";         // Thiết lập thông tin của SMPT
        $mail->Port = 465;                            // Thiết lập cổng gửi email của máy
        $mail->Username = "012kinglight@gmail.com";     // SMTP account username
        $mail->Password = "012tmqnhtd";                // SMTP account password

        /* =====================================
         * DUA THONG TIN TU FORM GUI EMAIL VAO
         * ===================================== */
        //Thiet lap thong tin nguoi gui va email nguoi gui
        $mail->SetFrom($mail->Username, "Trần Minh Quân");

        //Thiết lập thông tin người nhận
        $mail->AddAddress('012minhquan.tran@gmail.com', "Nguyễn Quang Triết");

        //Thiết lập email nhận email hồi đáp
        //nếu người nhận nhấn nút Reply
        $mail->AddReplyTo($arrParam['email'], $arrParam['name']);

        /* =====================================
         * THIET LAP NOI DUNG EMAIL
         * ===================================== */

        //Thiết lập tiêu đề
        $mail->Subject = $arrParam['title'];

        //Thiết lập định dạng font chữ
        $mail->CharSet = "utf-8";

        $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

        //Thiết lập nội dung chính của email
        $body = $arrParam['message'];
        $body = eregi_replace("[\]", '', $body);
        $mail->MsgHTML($body);
        /*
          $mail->AddAttachment($dirUpload . $attach['name']);
         */
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
            unlink($dirUpload . $attach['name']);
        }
    }

    function mail() {

        $this->load->view('admin/mail');
    }

}

?>