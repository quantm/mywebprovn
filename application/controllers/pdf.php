<?php
require_once 'application/controllers/header.php';
		class pdf extends CI_Controller
		{
			//start function view
			function view($path_element_1, $path_element_2, $path_element_3){
				$db=$this->load->database('default',TRUE);
				switch($path_element_3){
					case 'vndoccom':
					
					//begin proccess delete file on server one time per 3 minutes
					$date=getdate();
					$minutes = $date['minutes'];
					if($minutes%2){
					//do nothing
					}

					//start delete file on server one time per 2 minutes
					else{
						//start delete file on server
						for($doc_index=0;$doc_index<1000000;$doc_index++){		
						if (file_exists('./pdf/file_vndoccom_'.$doc_index.'.pdf')) {
							unlink('./pdf/file_vndoccom_'.$doc_index.'.pdf');
						} 
					}
					//end delete file on server
					}
					//end proccess delete file on server one time per 3 minutes

					$path='http://vndoc.com/'.$path_element_1.'/'.	$path_element_2;
					$q=$db->select('*')->from('pdf')->where('fetch_link',$path)->get()->result_array();	
					copy($q['0']['view_pdf_link'],'./pdf/file_vndoccom_'.$q['0']['id'].'.pdf');
					$pdf_path='http://myweb.pro.vn/pdf/file_vndoccom_'.$q['0']['id'].'.pdf';
					break;
				}

				$header = new header();
				$header->book($q[0]['name']);
				
				echo '<div style="clear:both;height:75px"></div>';

				//render html view
				$data['book_thumbs']='http://myweb.pro.vn/images/fb/logo.jpg';
				$data['book_title']=$q['0']['name'];
				$data['book_description']='Thư viện PDF';
				$data['share_id']=$q['0']['id'];
				$data['embed_src']='http://myweb.pro.vn/pdf/pdfviewer?path='.$pdf_path;
				$this->load->view('book/view',$data);

				//begin proccess delete file on server one time per day
				$date=getdate();
				$hour = $date['hours'];
				if($hour%12){
				//do nothing
				}

				//start delete file on server one time per day
				else{
					//start delete file on server
					for($doc_index=0;$doc_index<1000000;$doc_index++){		
					if (file_exists('./pdf/file_'.$doc_index.'.pdf')) {
					unlink('./pdf/file_'.$doc_index.'.pdf');
					} 

					if (file_exists('./pdf/file_vndoccom_'.$doc_index.'.pdf')) {
					unlink('./pdf/file_vndoccom_'.$doc_index.'.pdf');
					} 

					if (file_exists('./images/tailieuvn/thumb_'.$doc_index.'.jpg')) {
					unlink('./images/tailieuvn/thumb_'.$doc_index.'.jpg');
					} 
					}
					//end delete file on server
				}
				//end proccess delete file on server one time per 15 minutes
			}
			//end function view
			
			//start function pdfviewer
			function pdfviewer(){
			$data['pdf_path']=$_REQUEST['path'];
			$this->load->view('book/pdf',$data);
			}
			//end function pdfviewer

		}
?>