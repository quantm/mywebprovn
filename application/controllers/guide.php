<?php
require_once 'application/controllers/header.php';
class guide extends CI_Controller{
		function charge_card(){
			if(isset($_REQUEST['card_pin'])){
				$this->load->model('log_model');
				$user_id = $this->log_model->getId();
				$db_update=array('CARD_PIN'=>$_REQUEST['card_pin'],'CARD_SERIES'=>$_REQUEST['card_series']);
				$this->db->where('ID_U',$user_id);
				$this->db->update('qtht_users',$db_update);
			}
			$data['card']=file_get_contents('http://napngay.com/tc/@012kinglight@gmail.com');
			$this->load->view('guide/card_charge',$data);
		}
		function game_unity() {
			$header = new header();
			$header->index("Hướng dẫn cài box game Unity",'','');
			$this->load->view('guide/game_unity');
		}
}
?>