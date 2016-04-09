<?php
class gallery extends CI_Model{
    protected $_gallery_path = "";
    protected $_gallery_url = "";
    public function __construct(){
        parent::__construct();
        //Lấy đường dẫn url của thư mục chứa hình ảnh được upload
        $this->_gallery_url = base_url()."public/images/";
        //Lấy đường dẫn vật lý của thư mục chứa hình ảnh đươc upload
        $this->_gallery_path = realpath(APPPATH. "../public/images");
    }
    
    //hàm thực hiện công việc upload và resize lại hình ảnh
    public function do_upload(){
        $config = array('upload_path'   => $this->_gallery_path,
                        'allowed_types' => '*',
                        'max_size'      => '20000');
        $this->load->library("upload",$config);
        if(!$this->upload->do_upload("img")){
            $error = array($this->upload->display_errors());
        }else{
            $image_data = $this->upload->data();    
        }
		//kết thúc công đoạn upload hình ảnh
        
        $config = array("source_image" => $image_data['full_path'],
                        "new_image" => $this->_gallery_path . "/thumbs",
                        "maintain_ration" => true,
                        "width" => '150',
                        "height" => "100");
        $this->load->library("image_lib",$config);
        $this->image_lib->resize();	
		$file_path=str_replace('/home/myw4be7e/public_html','',$image_data['file_path']);
		return $file_path."thumbs/".$image_data['file_name'];
		//kết thúc công đoạn resize lại hình ảnh                \	

    }
    
    
    //hàm lấy hình ảnh từ thư mục lưu file đã upload
    public function get_images(){
        $file = scandir($this->_gallery_path);
        $file = array_diff($file, array('.', '..', 'thumbs'));
        //tên tất cả các file hình trong thư mục đã được upload lên.
        
        
        $images = array();
        foreach($file as $img){
            $images[] = array("url"        => $this->_gallery_url . $img,
                              "thumb_url" => $this->_gallery_url . "thumbs/" . $img);    
        }
        return $images;
    }
}