<?php
	class video_model extends CI_Model {

	function SelectAll($limit, $offset, $sort_by, $sort_order) {
        //load database config
		$db=$this->load->database('default',TRUE);
        
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('film.name');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'film.id';
            
        // results query
        $q = $db->select('film.*,film.name as film_name')
					->from('film')
					->where('referer !=','memevn')
					->limit($limit, $offset)->order_by($sort_by, $sort_order);
		
		if(isset($_REQUEST['id_category'])){
			if(!isset($_REQUEST['search'])){
				$q->join('film_category','film_category.id=film.id_category','inner');
				$q->where('film_category.id', $_REQUEST['id_category']);
			}
		}					
		if(isset($_REQUEST['id_sub_category'])){
			if(!isset($_REQUEST['search'])){
				$q->join('film_sub_category','film_sub_category.id=film.id_sub_category','inner');
				$q->where('film_sub_category.id', $_REQUEST['id_sub_category']);
			}
		}					

        if(isset($_REQUEST['search'])) {
            $q->like('film.name', $_REQUEST['search']);
        }
        $ret['rows'] = $q->get()->result_array();         
                                            
        // count query
        $q = $db->select('COUNT(*) as count', FALSE)
                    ->from('film');
		
        if(isset($_REQUEST['search'])) {
            $q->like('name', $_REQUEST['search']);
        }

        if(isset($_REQUEST['id_category'])) {
            $q->like('id_category', $_REQUEST['id_category']);
        }
        if(isset($_REQUEST['id_sub_category'])) {
            $q->like('id_sub_category', $_REQUEST['id_sub_category']);
        }

        $tmp = $q->get()->result();
        $ret['num_rows'] = $tmp[0]->count;       
        return $ret;
    }

	}
?>