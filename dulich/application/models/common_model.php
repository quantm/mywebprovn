<?php

class common_model extends CI_Model {

		/* hiển thị danh sách hàng đã xem */
		function todayGoods($arr)
			{
				$this->load->library('session');
				$this->session->set_userdata(array('todayGoods'=>1));
				$max = 10;	
				$goodsno = $arr['id'];
				$div = explode(",",$_COOKIE['todayGoodsIdx']);
				$todayG = unserialize(stripslashes($_COOKIE['todayGoods']));
				if (!is_array($todayG)) $todayG = array();
				if (in_array($goodsno,$div)){
					$key = array_search($goodsno,$div);
					array_splice($div,$key,1);
					array_splice($todayG,$key,1);
				}
				array_unshift($div,$goodsno); array_unshift($todayG,$arr);
				array_splice($todayG,$max); //array_splice($div,$max);
				setcookie('todayGoodsIdx',implode(",",$div),time()+3600*24,'/');
				setcookie('todayGoods',serialize($todayG),time()+3600*24,'/');
			}

	//gõ tiếng Việt - browser ANSI - unicode character
    function convert_ansi($input_comment_data){		
				
				$comment_data = array("%20", "A%CC%81", "A%CC%80", "A%CC%83", "A%CC%89", "%C3%82", "%E1%BA%A0", "E%CC%81", "E%CC%80", "E%CC%83", "E%CC%89", "%C3%8A", "E%CC%A3", "I%CC%81", "I%CC%80", "I%CC%89", "I%CC%83", "I%CC%A3", "O%CC%81", "O%CC%80", "O%CC%89", "O%CC%83", "%C3%94", "O%CC%A3", "U%CC%81", "U%CC%80", "U%CC%83", "U%CC%89", "U%CC%A3", "%C4%82", "Ă%CC%81", "Ă%CC%80", "Ă%CC%89", "Ă%CC%83", "Ă%CC%A3", "Â%CC%81", "Â%CC%80", "Â%CC%83", "Â%CC%89", "Â%CC%A3", "%C6%A0", "Ơ%CC%81", "Ơ%CC%A3", "Ơ%CC%89", "Ơ%CC%83", "Ơ%CC%80", "Y%CC%81", "Y%CC%80", "Y%CC%83", "Y%CC%89", "%C3%8Á", "%C3%8À", "%C3%8Ả", "Ê%CC%A3", "%C3%8Ã", "Ô%CC%81", "Ô%CC%A3", "Ô%CC%83", "Ô%CC%89", "Ô%CC%80", "%C6%AF", "Ư%CC%81", "Ư%CC%80", "Ư%CC%83", "Ư%CC%A3", "Ư%CC%89", "a%CC%81", "a%CC%80", "a%CC%89", "a%CC%83", "a%CC%A3", "%C3%A2", "%C4%83", "e%CC%81", "e%CC%80", "e%CC%83", "e%CC%89", "%C3%AA", "e%CC%A3", "i%CC%81", "i%CC%80", "i%CC%89", "i%CC%83", "i%CC%A3", "o%CC%81", "o%CC%80", "o%CC%89", "o%CC%83", "o%CC%A3", "%C3%B4", "%C6%A1", "u%CC%81", "u%CC%80", "u%CC%83", "u%CC%89", "u%CC%A3", "%C6%B0", "ă%CC%81", "ă%CC%80", "ă%CC%83", "ă%CC%89", "ă%CC%A3", "ơ%CC%81", "ơ%CC%80", "ơ%CC%89", "ơ%CC%83", "ơ%CC%A3", "ư%CC%A3", "ư%CC%81", "ư%CC%80", "ư%CC%83", "ư%CC%89", "%C4%91", "y%CC%81", "y%CC%83", "y%CC%89", "y%CC%A3", "y%CC%80", "Y%CC%A3", "â%CC%A3", "â%CC%80", "â%CC%81", "â%CC%83", "â%CC%89", "%C3%AÁ", "%C3%AÀ", "%C3%AẢ", "ê%CC%A3", "%C3%AÃ", "ô%CC%80", "ô%CC%81", "ô%CC%A3", "ô%CC%89", "ô%CC%83","%C4%90");
			   
				$convert_comment_data = array(" ", "Á", "À", "Ã", "Ả", "Â", "Ạ", "É", "È", "Ẽ", "Ẻ", "Ê", "Ẹ", "Í", "Ì", "Ỉ", "Ĩ", "Ị", "Ó", "Ò", "Ỏ", "Õ", "Ô", "Ọ", "Ú", "Ù", "Ũ", "Ủ", "Ụ", "Ă", "Ắ", "Ằ", "Ẳ", "Ẵ", "Ặ", "Ấ", "Ầ", "Ẫ", "Ẩ", "Ậ", "Ơ", "Ớ", "Ợ", "Ở", "Ỡ", "Ờ", "Ý", "Ỳ", "Ỹ", "Ỷ", "Ế", "Ề", "Ể", "Ệ", "Ễ", "Ố", "Ộ", "Ỗ", "Ổ", "Ồ", "Ư", "Ứ", "Ừ", "Ữ", "Ự", "Ử", "á", "à", "ả", "ã", "ạ", "â", "ă", "é", "è", "ẽ", "ẻ", "ê", "ẹ", "í", "ì", "ỉ", "ĩ", "ị", "ó", "ò", "ỏ", "õ", "ọ", "ô", "ơ", "ú", "ù", "ũ", "ủ", "ụ", "ư", "ắ", "ằ", "ẵ", "ẳ", "ặ", "ớ", "ờ", "ở", "ỡ", "ợ", "ự", "ứ", "ừ", "ữ", "ử", "đ", "ý", "ỹ", "ỷ", "ỵ", "ỳ", "Ỵ", "ậ", "ầ", "ấ", "ẫ", "ẩ", "ế", "ề", "ể", "ệ", "ễ", "ồ", "ố", "ộ", "ổ", "ỗ","Đ");
				$ins_comment = str_replace($comment_data, $convert_comment_data, $input_comment_data);
				return $ins_comment;		
		}


    /** hiện nhanh từ khóa tìm kiếm * */
    static function AutoComplete($data, $fieldid, $fieldname, $field_category, $logo,$controlid, $controltext, $fullcompare, $style, $onokaction, $defaultid, $defaultname, $title) {
//       var_dump($data);
		$html = "
				<script>
					var DATA_$controlid = new Array();
			";
        foreach ($data as $item) {
            if ($item[$fieldid] == $defaultid)
                $defaultname = $item[$fieldname];
                //$defaultname = $item[$logo];
            $html.="DATA_" . $controlid . "[DATA_" . $controlid . ".length]=new Array('" . $item[$fieldid] . "','" . str_replace("'", "\\'", $item[$fieldname]) . "','" . str_replace("'", "\\'", $item[$logo]) . "' ,'" . str_replace("'", "\\'", $item[$field_category]) . "');";
        }
        $html.="	
				</script>
			";
        $html.="<input placeholder='$title'  title='$title' autocomplete=off class=autocombobox value='$defaultname' type=text style='$style' name=$controltext id=$controltext  onfocus=\"at_Load('$controltext','$controlid',DATA_$controlid," . ($fullcompare == true ? "true" : "false") . ",'$onokaction');\">
		<input type=hidden style='$style' name=$controlid id=$controlid value='$defaultid'>";
        return $html;
    }

    /** end AutoComplete * */


/*hight search string*/
static function highlightWords($text, $words, $nohighlight = false) {
        $colors = array('yellow', 'pink', 'gray');
        $i = 0;
        /*         * * the maximum key number ** */
        $num_colors = max(array_keys($colors));

        $words = trim($words);
        $the_count = 0;
        $wordsArray = explode(' ', $words);
        foreach ($wordsArray as $word) {
            if (strlen(trim($word)) != 0) {
                $text = str_ireplace($word, '~' . $i . $word . '^' . $i, $text, $count);
                if ($i == $num_colors) {
                    $i = 0;
                } else {
                    $i++;
                }
                $the_count = $count + $the_count;
            }
        }
        //var_dump($colors);
        for ($i = 0; $i < count($colors); $i++) {
            if ($nohighlight) {
                $text = str_replace('~' . ($i), '<b><font color=red>', $text);
                $text = str_replace('^' . ($i), '</font></b>', $text);
            } else {
                $text = str_replace('~' . ($i), '<b><span style="background-color:' . $colors[$i] . ';display:inline-block">', $text);
                $text = str_replace('^' . ($i), '</span></b>', $text);
            }
        }
        return $text;
    }
	/*end hight search string*/
	
	public function getDistrict($id_district)
	{
		$q=$this->db->select('name')->from('district')->where('id_district',$id_district)->get()->result_array();
		foreach($q as $val);
		echo $val['name'];
	}

		public function getCity($id_city)
	{
		$q=$this->db->select('name')->from('city')->where('id_city',$id_city)->get()->result_array();
		foreach($q as $val);
		echo $val['name'];
	}
}

?>