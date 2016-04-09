<?php
    class search extends CI_Controller{
        function game(){
            $data['game']=$this->db->select("*")->from("game_index")
                                                ->like("NAME",$this->input->get_post("game"))
                                                ->get()->result_array();
            $this->load->view('autocomplete/game',$data);
        }
    }
?>