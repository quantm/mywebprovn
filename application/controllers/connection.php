<?php class connection extends CI_Controller{
		function helihost(){
			$db_helihost=$this->load->database('helihost',TRUE);
		}
}?>