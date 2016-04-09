<?php
	class mobile_model extends CI_Model {

	function SelectAll_Karaoke($limit, $offset, $sort_by, $sort_order) {
        
		//load database config
		$db=$this->load->database('default',TRUE);
        
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('karaoke_num_code.name');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'karaoke_num_code.id';
            
        // results query
        $q = $db->select('*')
					->from('karaoke_num_code')
					->limit($limit, $offset)->order_by($sort_by, $sort_order);

        if(isset($_REQUEST['search'])) {
				$q->like('karaoke_num_code.name', $_REQUEST['search']);
        }

		if(isset($_REQUEST['song'])) {
				$song=str_replace('-',' ',$_REQUEST['song']);
				$q->like('karaoke_num_code.name', $song);
        }
        $ret['rows'] = $q->get()->result_array();         
                                            
        // count query
        $q = $db->select('COUNT(*) as count', FALSE)
					->from('karaoke_num_code');
		
        if(isset($_REQUEST['search'])) {
				$q->like('name', $_REQUEST['search']);
        }
		
		if(isset($_REQUEST['song'])) {
				$song=str_replace('-',' ',$_REQUEST['song']);
				$q->like('karaoke_num_code.name', $song);
        }

        $tmp = $q->get()->result();
        $ret['num_rows'] = $tmp[0]->count;       
        if($tmp[0]->count){}else{
			redirect('http://myweb.pro.vn/mobile/karaoke');
		};
	
		return $ret;
    }

	}
?>