<?php

class Upload extends CI_Controller {
	
	   public function __construct(){    
        parent::__construct();
        $this->load->helper("url");    
    }

    function index() {
		$this->load->model("gallery");
		if($this->input->post('ok')){
		$f='"';
		$l='"';
		$data['src']=$f.$this->gallery->do_upload().$l;
		$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
		$this->load->view('upload/index',$data);
		}
		else {
		$data['src'] ="window.parent.document.getElementsByClassName('user_avatar')[0].getAttribute('src')";
		$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
		$this->load->view('upload/index',$data);
		}
		
    }

}

?>