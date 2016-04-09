<?php
	class thesis_notes extends CI_Controller{
		function takenotes(){
			$this->load->model('log_model');
			$idu=$this->log_model->getId();
			$mydb=$this->load->database('default',TRUE);
			if(isset($_REQUEST['save_notes'])){
				$mydb->insert('thesis_notes',array('content'=>$_REQUEST['contents'],'id_thesis'=>$_REQUEST['id_thesis'],'user_id'=>$idu));
			}
			if(isset($_REQUEST['view_notes'])){
				$query=$mydb->select('*')->from('thesis_notes')->where('user_id',$idu)->where('id_thesis',$_REQUEST['id_thesis'])->get()->result_array();
				if($query){
					echo stripslashes($query[0]['content']);
				}
				else {
					echo '0';
				}
			}
		}
	}
?>