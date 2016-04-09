<?php
require_once 'application/controllers/header.php';
class toefl extends CI_Controller{

function is_logged_in() {
$is_logged_in = $this->session->userdata('is_logged_in');
if (!isset($is_logged_in) || $is_logged_in != true) {
return false;
}    
else {
return true;
}
}

//start function
function index(){
	$submit_arr=$this->input->get();
	$arr_true=$this->db->select('*')->from('toefl_reading')->get()->result_array();
	$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
	$return_array=array();
	foreach($arr_true as $key){
		array_push($return_array,$key['id_sentence']."_".$key['id_true']);		
	}
	$data['arr_true']=$return_array;

	if(isset($submit_arr['reading'])){
		switch($submit_arr['reading']){
			
			case 1:									
			$this->load->view('/toefl/reading/reading_1_1',$data);			
			break;
			case 2:
			$this->load->view('/toefl/reading/reading_1_2',$data);			
			break;
			case 3:
			$this->load->view('/toefl/reading/reading_1_3',$data);			
			break;
		}
		
	}
	else{
		$data['type']=$submit_arr['type'];
		$this->load->view('/toefl/index',$data);
		$header = new header();
		$header->index('Làm bài test TOELF','/toefl/index/','Tìm kiếm bài test');
	}	
}
//end function

// start function
function lesson (){
	$header = new header();
	$get=$this->input->get();
	$data['title']='';
	switch($get['id']){
				
				case 1:
				$header->index('Làm quen với phần thi reading','/toefl/index/','Tìm kiếm bài test');
				$this->load->view('/toefl/lesson/reading_1_1',$data);			
				break;
				case 2:
				$header->index('Làm quen với phần thi reading','/toefl/index/','Tìm kiếm bài test');
				$this->load->view('/toefl/lesson/reading_1_2',$data);			
				break;
				case 3:
				$this->load->view('/toefl/lesson/reading_1_3',$data);				
				break;
	}
}
// end function
//start function
function compare_answer(){
	$val=$this->input->get();
	$check=$this->db->select('*')->from('toefl_reading')->where('id_true',$val['id_choice'])->where('id_sentence',$val['id_sentence'])->get()->result_array();
	if(count($check) != '0'){
		foreach($check as $key);
		echo "true_".$key['id_sentence']."_".$key['id_true'];
	}
	else{
		echo "false_".$val['id_sentence']."_".$val['id_choice'];
	}
}
//end function

//start function
function get_content_true(){
$content=$this->db->select('true_contents')->from('toefl_reading')->where('id_sentence',$this->input->get('id_sentence'))->get()->result_array();
foreach($content as $key)
echo $key['true_contents'];
}
//end function

//start function do_exam
function do_exam(){
	$header = new header();
	$header->index('Làm bài tập TOEFL reading','/toefl/index/','Tìm kiếm bài test');
	$this->load->view('toefl/exam/index');
	$exam = $this->input->post();
	$arr_true=$this->db->select('*')->from('toefl_reading')->get()->result_array();
	$return_array=array();
	foreach($arr_true as $key){
		array_push($return_array,$key['id_sentence']."_".$key['id_true']);		
	}
	$data['arr_true']=$return_array;
	
	//start if
	if($exam['type']=='reading'){
		switch($exam['id']){
			case '1_1':
			$data['title']='';
			$this->load->view('toefl/exam/reading_1_1',$data);
			break;
		}
	}
	//end if

	if($exam['type']=='default_login'){
	redirect('/');
	}

}
//end function do_exam

//start function
function fetch_child_question(){
$get=$this->input->get();
	switch($get['id']){
		case "2":
		$this->load->view('toefl/exam/model_01/reading/1_2');
		break;

		case "3":
		$this->load->view('toefl/exam/model_01/reading/1_3');
		break;
		
		case "4":
		$this->load->view('toefl/exam/model_01/reading/1_4');
		break;

		case "5":
		$this->load->view('toefl/exam/model_01/reading/1_5');
		break;

		case "6":
		$this->load->view('toefl/exam/model_01/reading/1_6');
		break;

		case "7":
		$this->load->view('toefl/exam/model_01/reading/1_7');
		break;

		case "8":
		$this->load->view('toefl/exam/model_01/reading/1_8');
		break;

		case "9":
		$this->load->view('toefl/exam/model_01/reading/1_9');
		break;

		case "10":
		$this->load->view('toefl/exam/model_01/reading/1_10');
		break;

		case "11":
		$this->load->view('toefl/exam/model_01/reading/1_11');
		break;

		case "12":
		$this->load->view('toefl/exam/model_01/reading/1_12');
		break;

		case "13":
		$this->load->view('toefl/exam/model_01/reading/1_13');
		break;
	}
}
//end function

}
?>