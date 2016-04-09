<?php

class gallery_model extends CI_Model {

    var $gallery_path;
    var $gallery_path_url;

    function gallery_model() {

        parent::__construct();

        $this->gallery_path = realpath(APPPATH . '../Upload');
        $this->gallery_path_url = base_url() . 'Upload/';
    }

    function do_upload() {
        //new model instance
        $this->load->model('vbden_model');
        $id_u = $this->vbden_model->getIdNguoitao();

        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path,
            'max_size' => 5000
        );
	var_dump($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $image_data = $this->upload->data();

        $id_album = $this->input->post('id_album');
        $name = $this->input->post('name');
		$description=$this->input->post('description');
        $ins_data = array('id_u_creator' => $id_u,'description'=>$description, 'id_album' => $id_album,'name'=>$name);
        $image = array_merge($image_data, $ins_data);
        //var_dump($image);
		$this->db->insert('gallery_images', $image);

        $config = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $this->gallery_path . '/thumbs',
            'maintain_ration' => true,
            'width' => 150,
            'height' => 100
        );
var_dump($config);
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    function SelectAll() {
			
        $data = array(
					  'album' => $this->input->post('album'),
					  'image_name' => $this->input->post('image_name')
					 );

        // results query
        $q = $this->db->select('*')
                ->from('gallery_images');

        if (strlen($data['album'])) {
            $q->like('id_album', $data['album']);
        }
		
		
		if (strlen($data['image_name'])) {
            $q->like('name', $data['image_name']);
        }

        $ret['rows'] = $q->get()->result_array();
  
        // count query
        $q = $this->db->select('COUNT(*) as count', FALSE)->from('gallery_images');

           if (strlen($data['album'])) {
            $q->like('id_album', $data['album']);
        }

        if (strlen($data['image_name'])) {
            $q->like('name', $data['image_name']);
        }


        $tmp = $q->get()->result();

        $ret['num_rows'] = $tmp[0]->count;
        //var_dump($ret['num_rows']);
        return $ret;
    }

    function album_combo($data, $sel) {
        $html = "";
        $html .= "<option value='0'> - Chọn album -</option>";
        foreach ($data as $row) {
            $html .= "<option value='" . $row["ID"] . "' " . ($row["ID"] == $sel ? "selected" : "") . ">" . $row["NAME"] . "</option>";
        }
        return $html;
    }

    function delete_album() {
        $idarray = $this->input->post('DEL');

        $counter = 0;
        while ($counter < count($idarray)) {
            if ($idarray[$counter] > 0) {
                try {
                    $where = 'ID = ' . $idarray[$counter];
                    $this->db->delete('gallery_album', $where);
                } catch (Exception $er) {
                    $adderror = $adderror . $idarray[$counter] . ' ; ';
                };
            }
            $counter++;
        }
    }

}

