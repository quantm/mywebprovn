<?php
	class music_model extends CI_Model {

	function SelectAll($limit, $offset, $sort_by, $sort_order) {
        
		//load database config
		$db=$this->load->database('default',TRUE);
        
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('music_index.name');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'music_index.id';
            
        // results query
        $q = $db->select('music_index.*,music_index.name as song_name')
					->from('music_index')
					->limit($limit, $offset)->order_by($sort_by, $sort_order);
		
		if(isset($_REQUEST['id_category'])){
			if($_REQUEST['id_category']){	
			$q->join('music_category','music_category.id=music_index.id_category','inner');
			$q->where('music_category.id', $_REQUEST['id_category']);
			}
		}					

        if(isset($_REQUEST['search'])) {
            if($_REQUEST['search']){
				$q->like('music_index.name', $_REQUEST['search']);
			}
        }
        $ret['rows'] = $q->get()->result_array();         
                                            
        // count query
        $q = $db->select('COUNT(*) as count', FALSE)
					->from('music_index');
		
        if(isset($_REQUEST['search'])) {
			if($_REQUEST['search']){
				$q->like('name', $_REQUEST['search']);
			}
        }

        if(isset($_REQUEST['id_category'])) {
            if($_REQUEST['id_category']){
				$q->like('id_category', $_REQUEST['id_category']);
			}
        }

        $tmp = $q->get()->result();
        $ret['num_rows'] = $tmp[0]->count;       
        if($tmp[0]->count){}else{
			echo 'Không tìm thấy';
			die();
		};
		return $ret;
    }

	}
?>