<?php

class product_model extends CI_Model {

    function selectall($limit, $offset) {

        $data = array(
			'name' => $this->input->post('n'), 
			'color' => $this->input->post('color'), 
			'price' => $this->input->post('price'), 
			'promotion' => $this->input->get('promotion'), 
			'is_new' => $this->input->get('new')
			);
		$order=$this->input->post('order_product');		
      	
        //query data
		$id_category=$this->input->get('id_category');
        $query_product="select pr.*,left (pr.`name`,35) as _name from `product` pr ";
        $query_home="select pr.*,left (pr.`name`,35) as _name from `product` pr ";
		$new=$this->db->query('select pro.*,left (pro.`name`,15) as _name from product pro where is_new=1;')->result_array();
        $best=$this->db->query('select pro.*,left (pro.`name`,15) as _name from product pro where is_best=1;')->result_array();
        $promotion=$this->db->query('select pro.*,left (pro.`name`,15) as _name from product pro where is_promotion=1;')->result_array();
        //$all=$this->db->query($query_product)->result_array();		 
        //$q = $this->db->select('*')->from('product')->limit($limit, $offset);
        		
		
		if (isset($_REQUEST['id_category'])) {
		        $query_product="select pr.*,left (pr.`name`,15) as _name from `product` pr where pr.id_category=".$id_category." order by pr.price_out ";
		}

        if (isset($_REQUEST['name'])) {
		$query_product=$query_product."pr.`name` like '%".$data['name']."%' and";
        }

        if (isset($_REQUEST['promotion'])) {
			$query_product=$query_product."pr.`name` like '%".$data['promotion']."%' and";
        }

		if (isset($_REQUEST['price_value_to'])) {
						$query_product=$query_product."where pr.`price_out` <=".$_REQUEST["price_value_to"]." and ";
						$result['price_to']=$_REQUEST['price_value_to'];
        }
		
		if (isset($_REQUEST['price_value_from'])) {
						$query_product=$query_product."pr.`price_out`>=".$_REQUEST["price_value_from"]." order by pr.price_out ".$order;
						$result['price_from']=$_REQUEST['price_value_from'];
        }

        if (isset($_REQUEST['is_new'])) {
		$query_product=$query_product."pr.`name` like '%".$_REQUEST["is_new"]."%'"."and";
        }
        
		$all=$this->db->query($query_product)->result_array();
		$home=$this->db->query($query_home)->result_array();
			
		$result['new']=$new;   
        $result['promotion']=$promotion;
        $result['best']=$best;
        $result['all']=$all;
        $result['home']=$home;
      
		
        //count result
        $count = $this->db->select('count(*) as count')->from('product');


        $tmp = $count->get()->result();
        $result['num_rows'] = $tmp[0]->count;
		return $result;
    }

    function get_detail($id_product) {
        $query = $this->db->select('*')->from('product')->where('id', $id_product)->get()->result_array();
        return $query;
    }

    function get_comment($id) {
        $query = $this->db->select('comment.*,comment.date as date_comment ,product.*')->from('comment')
                ->join('product', 'product.id=comment.id_product', 'inner')
                ->where('comment.id_product', $id)
                ->where('comment.view', 1);

        $result['data_rows'] = $query->get()->result_array();

        $query_count = $this->db->select('count(*) as count')->from('comment');

        $count = $query_count->get()->result();

        $result['num_rows'] = $count[0]->count;

        return $result;
    }

}

?>
