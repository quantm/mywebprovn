<?php
header('Content-Type: text/html; charset=utf-8');
define('CORE_API_HTTP_USR', 'merchant_16606');
define('CORE_API_HTTP_PWD', '16606sXx164V1tiy4LEFuopRa9QhmjIKTHk');

class plugin extends CI_Controller {
	function autocomplete() {
			$this->load->view('plugin/autocomplete');
	}
	
	function get_game_auto_complete(){
		$data['game']=$this->db->select('*')->from('game_index')->get()->result_array();
		$this->load->view('plugin/game',$data);
	}
	function get_user_auto_complete(){
		$data['user']=$this->db->select('*')->from('qtht_users')->get()->result_array();
		$this->load->view('plugin/user',$data);
	}

	function baokim($type){
		
		//security hash
		$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
		
		//new model instance
		$this->load->model('log_model');
		$id_u=$this->log_model->getId();
		$username=$this->db->select('*')->from('qtht_users')->where('ID_U',$id_u)->get()->result_array();
		$data['username']=$username[0]['EMAIL'];
		switch($type){
			case 'tailieu':
			$this->load->view('exchange/baokim_tailieu',$data);	
			break;

			case 'luanvan':
			$this->load->view('exchange/baokim_luanvan',$data);
			break;

			case 'account':
			$this->load->view('exchange/baokim_account',$data);
			break;
		}
	}

	function transaction(){	

	if(!isset($_REQUEST['csrf_test_name'])){
		redirect('/');
	}
	$bk = 'https://www.baokim.vn/the-cao/restFul/send';
	$seri = isset($_POST['txtseri']) ? $_POST['txtseri'] : '';
	$sopin = isset($_POST['txtpin']) ? $_POST['txtpin'] : '';
	//Loai the cao (VINA, MOBI, VIETEL, VTC, GATE)
	$mang = isset($_POST['chonmang']) ? $_POST['chonmang'] : '';
	$user = $_POST['txtuser'];


	if($mang=='MOBI'){
	$ten = "Mobifone";
	}
	else if($mang=='VIETEL'){
	$ten = "Vietel";
	}
	else if($mang=='GATE'){
	$ten = "Gate";
	}
	else if($mang=='VTC'){
	$ten = "VTC";
	}
	else $ten ="Vinaphone";

	//Mã MerchantID dang kí trên Bảo Kim
	$merchant_id = '16606';
	//Api username 
	$api_username = 'mywebprovn';
	//Api Pwd d
	$api_password = 'mywebprovnmdbg76TADf';
	//Mã TransactionId 
	$transaction_id = time();
	//mat khau di kem ma website dang kí trên B?o Kim
	$secure_code = '9dbf002e9717649b';

	$arrayPost = array(
	'merchant_id'=>$merchant_id,
	'api_username'=>$api_username,
	'api_password'=>$api_password,
	'transaction_id'=>$transaction_id,
	'card_id'=>$mang,
	'pin_field'=>$sopin,
	'seri_field'=>$seri,
	'algo_mode'=>'hmac'
	);

	ksort($arrayPost);

	$data_sign = hash_hmac('SHA1',implode('',$arrayPost),$secure_code);

	$arrayPost['data_sign'] = $data_sign;

	$curl = curl_init($bk);

	curl_setopt_array($curl, array(
	CURLOPT_POST=>true,
	CURLOPT_HEADER=>false,
	CURLINFO_HEADER_OUT=>true,
	CURLOPT_TIMEOUT=>30,
	CURLOPT_RETURNTRANSFER=>true,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_HTTPAUTH=>CURLAUTH_DIGEST|CURLAUTH_BASIC,
	CURLOPT_USERPWD=>CORE_API_HTTP_USR.':'.CORE_API_HTTP_PWD,
	CURLOPT_POSTFIELDS=>http_build_query($arrayPost)
	));

	$data = curl_exec($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

	$result = json_decode($data,true);
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$time = time();
	//$time = time();

//card charged success
if($status==200){
	$amount = $result['amount'];
	$data=$this->db->select('*')->from('qtht_users')->where('EMAIL',$_REQUEST['txtuser'])->get()->result_array();
	switch($amount) {
	case 10000: 
	$xu = 10000;
	$card=array('BOOK_DOWNLOADED_COUNT'=>'0','CARD_PIN'=>$_REQUEST['txtpin'],'CARD_SERIES'=>$_REQUEST['txtseri'],
				'CARD_VALUE'=>$xu,'DOWNLOADED_PER_CHARGED'=>'5');
	$this->db->where('EMAIL',$_REQUEST['txtuser']);
	$this->db->update('qtht_users',$card);
	break;
	
	case 20000: 
	$xu = 20000; 
	$card=array('BOOK_DOWNLOADED_COUNT'=>'0','CARD_PIN'=>$_REQUEST['txtpin'],'CARD_SERIES'=>$_REQUEST['txtseri'],
				'CARD_VALUE'=>$xu,'DOWNLOADED_PER_CHARGED'=>'10');
	$this->db->where('EMAIL',$_REQUEST['txtuser']);
	$this->db->update('qtht_users',$card);
	break;
	
	case 30000: 
	$xu = 30000;
	break;

	case 50000: 
	$xu= 50000; 
	$card=array('BOOK_DOWNLOADED_COUNT'=>'0','CARD_PIN'=>$_REQUEST['txtpin'],'CARD_SERIES'=>$_REQUEST['txtseri'],
				'CARD_VALUE'=>$xu,'DOWNLOADED_PER_CHARGED'=>'50');
	$this->db->where('EMAIL',$_REQUEST['txtuser']);
	$this->db->update('qtht_users',$card);
	break;
	
	case 100000: 
	$xu = 100000; 
	$card=array('BOOK_DOWNLOADED_COUNT'=>'0','CARD_PIN'=>$_REQUEST['txtpin'],'CARD_SERIES'=>$_REQUEST['txtseri'],
				'CARD_VALUE'=>$xu,'DOWNLOADED_PER_CHARGED'=>'150');
	$this->db->where('EMAIL',$_REQUEST['txtuser']);
	$this->db->update('qtht_users',$card);
	break;
	
	case 200000: 
	$xu = 200000; 
	break;
	
	case 300000: 
	$xu = 300000; 
	break;
	
	case 500000: 
	$xu = 500000; 
	break;
	
	case 1000000: 
	$xu = 1000000; 
	break;
	}
	// xử lý cộng tiền ảo cho member

	// Xu ly thong tin tai day
	$file = "carddung.log";
	$fh = fopen($file,'a') or die("cant open file");
	fwrite($fh,"Tai khoan: ".$user.", Loai the: ".$ten.", Menh gia: ".$amount.", Thoi gian: ".$time);
	fwrite($fh,"\r\n");
	fclose($fh);
	
		$book_data=$this->db->select('*')->from('ebook_index')->where('ID',$_REQUEST['ebook_id'])->get()->result_array();
		$chuoi_thongbao='Bạn đã thanh toán thành công thẻ '.$ten.' mệnh giá '.$amount.' click OK để tải về';
		$chuoi_thongbao_account='Bạn đã thanh toán thành công thẻ '.$ten.' mệnh giá '.$amount;
		switch($_REQUEST['download_type']){
				case 'tailieu':
				foreach($book_data as $key);
				header("Pragma: public");
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header( "Content-type:".$key['MIME']); 
				header( 'Content-Disposition: attachment; filename='.$key['NAME'].'.'.$key['FILE_EXTENSION']);
				echo file_get_contents($key['direct_link']);		
				break;
				
				case 'luanvan':
				echo '<script>alert("'.$chuoi_thongbao.'");window.parent.location.href ="'.$book_data[0]['DRIVE_GOOGLE_LINK'].'";window.parent.document.getElementById("nap_the_cao").style.display="none";window.parent.document.getElementById("download_notification").style.display="block";</script>';
				break;

				case 'account':
				echo '<script>alert("'.$chuoi_thongbao_account.'");window.parent.location.reload();</script>';
				break;
		}
		
	}
	//end card charged success

	//card charged error
	else{ 			
			echo 'Status Code:' . $status . '<hr >';   
			$error = $result['errorMessage'];
			echo $error;
			$file = "cardsai.log";
			$fh = fopen($file,'a') or die("cant open file");
			fwrite($fh,"Tai khoan: ".$user.", Ma the: ".$sopin.", Seri: ".$seri.", Noi dung loi: ".$error.", Thoi gian: ".$time);
			fwrite($fh,"\r\n");
			fclose($fh);		
			echo '<script>alert("Thông tin thẻ cào không hợp lệ!");window.location.href ="http://myweb.pro.vn/plugin/baokim/'.$_REQUEST['download_type'].'";</script>';		
		}
		//end card charge error
	}
	//end function
}
//end class
?>