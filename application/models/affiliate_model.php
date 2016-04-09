<?php
	class affiliate_model extends CI_Model{
		function SelectAll($limit, $offset, $sort_by, $sort_order) {
		$mydb=$this->load->database('lazada',TRUE);

		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('price');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'price';
            
        // results query
		if(isset($_REQUEST['id_cate'])){
			$q = $mydb->select('*')
				->from('lazada_vn')
				->where('id_cate',$_REQUEST['id_cate'])
				->limit($limit, $offset)
				->order_by($sort_by, $sort_order);
		}

		if(isset($_REQUEST['brand'])){
			$q = $mydb->select('*')
				->from('lazada_vn')
				->like('brand',$_REQUEST['brand'])
				->limit($limit, $offset)
				->order_by($sort_by, $sort_order);
		}

		if(isset($_REQUEST['id'])){
			$q = $mydb->select('*')
				->from('lazada_vn')
				->where('id',$_REQUEST['id']);
		}

		if(isset($_REQUEST['q'])){
			$q = $mydb->select('*')
				->from('lazada_vn')
				->like('product_name',$_REQUEST['q'])
				->limit($limit, $offset)
				->order_by($sort_by, $sort_order);
		}
		if(!isset($_REQUEST['brand']) && !isset($_REQUEST['id']) && !isset($_REQUEST['q']) && !isset($_REQUEST['id_cate'])) {
			$q = $mydb->select('*')
				  ->from('lazada_vn')
				  ->limit($limit, $offset)
				  ->order_by($sort_by, $sort_order);
		}
                                                
        $ret['rows'] = $q->get()->result_array();  
        
		 // count query
        if(isset($_REQUEST['id_cate'])){
		$q = $mydb->select('COUNT(*) as count', FALSE)
		          ->where('id_cate',$_REQUEST['id_cate']) 
				  ->from('lazada_vn');
		}
        
		if(isset($_REQUEST['q'])){
		$q = $mydb->select('COUNT(*) as count', FALSE)
		          ->like('product_name',$_REQUEST['q']) 
				  ->from('lazada_vn');
		}

		if(isset($_REQUEST['id'])){
		$q = $mydb->select('COUNT(*) as count', FALSE)
		          ->where('id',$_REQUEST['id']) 
				  ->from('lazada_vn');
		}
		if(isset($_REQUEST['brand'])){
		$q = $mydb->select('COUNT(*) as count', FALSE)
		          ->like('brand',$_REQUEST['brand']) 
				  ->from('lazada_vn');
		}

		if(!isset($_REQUEST['brand'])&& !isset($_REQUEST['id']) && !isset($_REQUEST['q']) && !isset($_REQUEST['id_cate'])) {
		$q = $mydb->select('COUNT(*) as count',FALSE)
				  ->from('lazada_vn')
				  ->limit($limit, $offset)
				  ->order_by($sort_by, $sort_order);
		}
		$tmp = $q->get()->result();
		if($tmp){
			$ret['num_rows'] = $tmp[0]->count;    
			return $ret;
		}
		else {
			redirect('http://ho.lazada.vn/SHAh0Q?url=http%3A%2F%2Fwww.lazada.vn%2Fdong-ho-nam-day-da-verygood-den-998862.html%3Foffer_id%3D%7Boffer_id%7D%26affiliate_id%3D%7Baffiliate_id%7D%26offer_name%3D%7Boffer_name%7D_%7Boffer_file_id%7D%26affiliate_name%3D%7Baffiliate_name%7D%26transaction_id%3D%7Btransaction_id%7D');
		}
    }
}
?>