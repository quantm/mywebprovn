<?class chongiadung extends CI_Controller{
	function index($path_element_1,$path_element_2){
		$url='http://www.chongiadung.com/'.$path_element_1.'/'.$path_element_2;
		$raovat_db=$this->load->database('admin_raovatnhanh',TRUE);
		$r=$raovat_db->select('*')->from('so_sanh_gia')->where('link',$url)->get()->result_array();
		$data['name']=$r[0]['name'];
		$this->load->view('ads/ready_redirect',$data);
	}
}?>