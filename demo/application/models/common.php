<?php

class ProjectCommon extends CI_Model {

    static function chucvuBox($data, $sel) {
        $html = "";
        $html .= "<option value='0'>-Chọn chức vụ-</option>";
        foreach ($data as $row) {
            $html .= "<option value='" . $row["NAME"] . "' " . ($row["ID_CV"] == $sel ? "selected" : "") . ">" . $row["NAME"] . "</option>";
        }
        return $html;
    }
    
   function GetTree($tree,$tablename,$fieldid,$fieldidparent,$parentvalue,$level){
			
			$r = $this->db->query("SELECT *,$level as LEVEL from $tablename where $fieldidparent=?",array($parentvalue));
			$rows = $r->result_array();
			$r->closeCursor();
			
			for($i=0;$i<$r->rowCount();$i++){
				$tree[count($tree)] = $rows[$i];
				ProjectCommon::GetTree(&$tree,$tablename,$fieldid,$fieldidparent,$rows[$i][$fieldid],$level+1);
			}
		}

    static function userBox($data, $sel) {
        $html = "";
        $html .= "<option value='0'>-Chọn người-</option>";
        foreach ($data as $row) {
            $html .= "<option value='" . $row["EMP_NAME"] . "' " . ($row["ID_U"] == $sel ? "selected" : "") . ">" . $row["EMP_NAME"] . "</option>";
        }
        return $html;
    }

    static function departmentBox($data, $sel) {
        $html = "";
        $html .= "<option value='0'>-Chọn phòng ban-</option>";
        foreach ($data as $row) {
            $html .= "<option value='" . $row["NAME"] . "' " . ($row["ID_DEP"] == $sel ? "selected" : "") . ">" . $row["NAME"] . "</option>";
        }
        return $html;
    }

    /** Kiểm tra dữ liệu trước khi submit * */
    static function useDlgConfirm() {

        $html = '<div id="confirm_dlg" >';
        $html.= '<div>';
        $html.= '<p id=content_confirm>Content you want the user to see goes here.</p>';
        $html.= '<input type="button" class=input_button style="width:50px;background-color:white" name=YES id=DLG_YES_BUTTON value="Có" onclick=\'overlay("YES")\' >';
        $html.= '<input type="button" class=input_button style="width:50px;background-color:white" name=CANCEL id=DLG_CANCEL_BUTTON value="Không" onclick=\'overlay("CAMCEL")\' >';
        $html.= '</div>';
        $html.= '</div>';
        return $html;
    }

    static function alertConfirm() {

        $html = '<div id="confirm_dlg" >';
        $html.= '<div>';
        $html.= '<p id=content_confirm>Content you want the user to see goes here.</p>';
        $html.= '<input type="button" class=input_button style="width:75px;background-color:white" name=YES id=DLG_YES_BUTTON value="Có" onclick=\'overlay("YES")\' >';
        $html.= '<input type="button" class=input_button style="width:75px;background-color:white" name=CANCEL id=DLG_CANCEL_BUTTON value="Không" onclick=\'overlay("CAMCEL")\' >';

        $html.= '</div>';
        $html.= '</div>';
        return $html;
    }
    
        static function alertUpdate() {

        $html = '<div id="confirm_dlg" >';
        $html.= '<div>';
        $html.= '<p id=content_confirm>Content you want the user to see goes here.</p>';
        $html.= '<input type="button" class=input_button style="width:150px;background-color:white" name=YES id=DLG_YES_BUTTON value="Có" onclick=\'overlay("YES")\' >';
        $html.= '</div>';
        $html.= '</div>';
        return $html;
    }

    /* kết thúc hàm kiểm tra dữ liệu */


    /**
     * Build menu with <li class="node"><a href="">Menu level 1</a><ul></li> formal;
     * 
     * @param  array $menuData
     * @return echo menu
     */
    static function buildMenuUL_LI($menuData) {
        $result = '';
        $temp = array();
        for ($pos = 0; $pos < count($menuData); $pos++) {
            if (ProjectCommon::checkChild($menuData, $pos)) {
                $temp[] = $menuData[$pos];
            }
        }
        $menuData = $temp;
        for ($pos = 0; $pos < count($menuData); $pos++) {
            if ($menuData[$pos + 1]["LEVEL"] > $menuData[$pos]["LEVEL"]) {
                $html = "
						<li class='node'>
							<a href='" . ($menuData[$pos]["URL"] == "" ? $menuData[$pos]["URL_ACTION"] : $menuData[$pos]["URL"]) . "'>" . $menuData[$pos]["NAME"] . "</a>
							<ul>
					";
                $result .= $html;
            } else if ($menuData[$pos + 1]["LEVEL"] == $menuData[$pos]["LEVEL"]) {
                $html = "
						<li>
							<a href='" . ($menuData[$pos]["URL"] == "" ? $menuData[$pos]["URL_ACTION"] : $menuData[$pos]["URL"]) . "'>" . $menuData[$pos]["NAME"] . "</a>
						</li>
					";
                $result .= $html;
            } else {
                $html = "
						<li>
							<a href='" . ($menuData[$pos]["URL"] == "" ? $menuData[$pos]["URL_ACTION"] : $menuData[$pos]["URL"]) . "'>" . $menuData[$pos]["NAME"] . "</a>
						</li>
					";

                if ($pos == count($menuData) - 1) {
                    for ($j = 1; $j <= $menuData[$pos]["LEVEL"] - 1; $j++) {
                        $html .= "</ul></li>";
                    }
                } else {
                    for ($j = 1; $j <= $menuData[$pos]["LEVEL"] - $menuData[$pos + 1]["LEVEL"]; $j++) {
                        $html .= "</ul></li>";
                    }
                }
                $result .= $html;
            }
        }
        return $result;
    }

    /** kết thúc hàm dropdown menu * */
    /* highlight chuỗi kết quả tìm kiếm */
    static function highlightString($string, $words) {
        $string = mb_strtolower($string, "UTF-8");
        $chars = preg_split("/[.,:]/", $string);
        $words = trim(mb_strtolower($words, "UTF-8"));
        $wordsArray = explode(' ', $words);
        $mark = array();
        $i = 0;
        foreach ($chars as $char) {
            foreach ($wordsArray as $word) {
                $mark[$i . "a"] += substr_count($char, $word);
            }
            $i++;
        }
        arsort($mark);
        $r = "";
        $i = 0;
        //var_dump($mark);
        foreach ($mark as $k => $v) {
            if ($v > 0) {
                $r .= "..." . $chars[(int) $k];
                $i++;
            }
            if ($i == 3)
                break;
        }
        return ProjectCommon::highlightWords(substr($r, 0, 256), $words, true);
    }

    static function highlightWords($text, $words, $nohighlight = false) {
        if (is_null($colors) || !is_array($colors)) {
            $colors = array('yellow', 'pink', 'gray');
        }

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
                $text = str_replace('~' . ($i), '<b><span style="background-color:' . $colors[$i] . '">', $text);
                $text = str_replace('^' . ($i), '</span></b>', $text);
            }
        }
        return $text;
    }

    /** end hightlight function * */

    /** hiện nhanh từ khóa tìm kiếm * */
    static function AutoComplete($data, $fieldid, $fieldname, $controlid, $controltext, $fullcompare, $style, $onokaction, $defaultid, $defaultname, $title) {        
        $html = "
				<script>
					var DATA_$controlid = new Array();
			";
        foreach ($data as $item) {
            if ($item[$fieldid] == $defaultid)
                $defaultname = $item[$fieldname];
            $html.="DATA_" . $controlid . "[DATA_" . $controlid . ".length]=new Array('" . $item[$fieldid] . "','" . str_replace("'", "\\'", $item[$fieldname]) . "');";
        }
        $html.="
				</script>
			";
        $html.="
				<input title='$title' autocomplete=off onclick='cancelEvent(event)' class=autocombobox value='$defaultname' type=text style='$style' name=$controltext id=$controltext  onkeydown='at_KeyDown(event)' onkeyup='at_Display(event)' onfocus=\"at_Load('$controltext','$controlid',DATA_$controlid," . ($fullcompare == true ? "true" : "false") . ",'$onokaction');\">
				<input type=hidden style='$style' name=$controlid id=$controlid value='$defaultid'>
			";
        return $html;
    }

    /** end AutoComplete * */

    static function checkChild($data, $pos) {
        $curlevel = $data[$pos]['LEVEL'];
        $curactid = $data[$pos]['ACTID'];
        $pos++;
        if ($pos >= count($data)) {
            if ($curactid == 0)
                return false;
            return true;
        }
        while ($curlevel < $data[$pos]['LEVEL']) {
            if ($data[$pos]['ACTID'] != 0)
                return true;
            if ($pos >= count($data)) {
                if ($curactid == 0)
                    return false;
                return true;
            }
            $pos++;
        }
        if ($curactid == 0)
            return false;
        return true;
    }


    function returnMIMEType($filename) {
        preg_match("|\.([a-z0-9]{2,4})$|i", $filename, $fileSuffix);

        switch (strtolower($fileSuffix[1])) {
            case "js" :
                return "application/x-javascript";

            case "json" :
                return "application/json";

            case "jpg" :
            case "jpeg" :
            case "jpe" :
                return "image/jpg";

            case "png" :
            case "gif" :
            case "bmp" :
            case "tiff" :
                return "image/" . strtolower($fileSuffix[1]);

            case "css" :
                return "text/css";

            case "xml" :
                return "application/xml";

            case "doc" :
            case "docx" :
                return "application/msword";

            case "xls" :
            case "xlt" :
            case "xlm" :
            case "xld" :
            case "xla" :
            case "xlc" :
            case "xlw" :
            case "xll" :
                return "application/vnd.ms-excel";

            case "ppt" :
            case "pps" :
                return "application/vnd.ms-powerpoint";

            case "rtf" :
                return "application/rtf";

            case "pdf" :
                return "application/pdf";

            case "html" :
            case "htm" :
            case "php" :
                return "text/html";

            case "txt" :
                return "text/plain";

            case "mpeg" :
            case "mpg" :
            case "mpe" :
                return "video/mpeg";

            case "mp3" :
                return "audio/mpeg3";

            case "wav" :
                return "audio/wav";

            case "aiff" :
            case "aif" :
                return "audio/aiff";

            case "avi" :
                return "video/msvideo";

            case "wmv" :
                return "video/x-ms-wmv";

            case "mov" :
                return "video/quicktime";

            case "zip" :
                return "application/zip";

            case "tar" :
                return "application/x-tar";

            case "swf" :
                return "application/x-shockwave-flash";

            default :
                if (function_exists("mime_content_type")) {
                    $fileSuffix = mime_content_type($filename);
                }

                return "unknown/" . trim($fileSuffix[0], ".");
        }
    }

    /**
     * Tạo select user từ select department
     * 
     * @param int $DName tên combobox chứa danh sách department
     * @param int $UName tên combobox chứa danh sách user thuộc department trên
     * @return html code
     */
    static function writeSelectDepartmentUser($DName, $UName) {
        global $db;

        $arr_user = 'ARR_' . $UName;
        $department = array();
        ProjectCommon::GetTree(&$department, "QTHT_DEPARTMENTS", "ID_DEP", "ID_DEP_PARENT", 1, 1);
        $r = $db->query("
				SELECT
					DEP.ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
					INNER JOIN QTHT_DEPARTMENTS DEP ON E.ID_DEP=DEP.ID_DEP
				ORDER BY
					U.ORDERS, E.LASTNAME
			");
        $user = $r->fetchAll();
        $r->closeCursor();

        $html.="    	<select name=$DName id=$DName onchange='FillComboByComboExp(this,document.getElementById(\"$UName\"),$arr_user,arr_user);'>";
        $html.="        	<option value=0>--Chọn phòng--</option>";
        for ($i = 0; $i < count($department); $i++) {
            $html.="        <option value=" . $department[$i]["ID_DEP"] . ">" . str_repeat("--", $department[$i]['LEVEL']) . $department[$i]["NAME"] . "</option>";
        }
        $html.="        </select>";

        $html.="<select name=$UName id=$UName></select>";

        $html.="<script>";
        $html.="	var $arr_user = new Array();";
        for ($i = 0; $i < count($user); $i++)
            $html.=$arr_user . "[" . $i . "] = new Array('" . $user[$i]['ID_DEP'] . "','" . $user[$i]['ID_U'] . "','" . $user[$i]['NAME'] . "');";
        $html.="	FillComboByComboExp(document.getElementById(\"$DName\"),document.getElementById(\"$UName\"),$arr_user,null);";
        $html.="</script>";

        return $html;
    }

    /**
     * Tạo select user từ select department
     * 
     * @param int $DName tên combobox chứa danh sách department
     * @param int $UName tên combobox chứa danh sách user thuộc department trên
     * @return html code
     */
    static function writeSelectDepartmentMultiUser($DName, $UName) {
        global $db;

        $arr_user = 'ARR_' . $UName;
        $department = array();
        ProjectCommon::GetTree(&$department, "QTHT_DEPARTMENTS", "ID_DEP", "ID_DEP_PARENT", 1, 1);
        $r = $db->query("
				SELECT
					DEP.ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME,U.USERNAME AS USERNAME
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
					INNER JOIN QTHT_DEPARTMENTS DEP ON E.ID_DEP=DEP.ID_DEP
				ORDER BY
					U.ORDERS, E.LASTNAME
			");
        $user = $r->fetchAll();
        $r->closeCursor();

        $html.="    	<div style='float:left'><select name=$DName id=$DName onchange='FillComboByComboExp(this,document.getElementById(\"$UName\"),$arr_user,arr_user);'>";
        $html.="        	<option value=0>--Chọn phòng--</option>";
        for ($i = 0; $i < count($department); $i++) {
            $html.="        <option value=" . $department[$i]["ID_DEP"] . ">" . str_repeat("--", $department[$i]['LEVEL']) . $department[$i]["NAME"] . "</option>";
        }
        $html.="        </select></div>";

        $html.="<div style='float:left'><select name=$UName id=$UName multiple size=5 ondblclick=\"if(typeof(InsertIntoArr)=='function')eval('InsertIntoArr()');\"></select></div>";

        $html.="<script>";
        $html.="	var $arr_user = new Array();";
        for ($i = 0; $i < count($user); $i++)
            $html.=$arr_user . "[" . $i . "] = new Array('" . $user[$i]['ID_DEP'] . "','" . $user[$i]['USERNAME'] . "','" . $user[$i]['NAME'] . "');";
        $html.="	FillComboByComboExp(document.getElementById(\"$DName\"),document.getElementById(\"$UName\"),$arr_user,null);";
        $html.="</script>";

        return $html;
    }

    static function writeSelectDepartmentMultiUserH($DName, $UName) {
        global $db;

        $arr_user = 'ARR_' . $UName;
        $department = array();
        ProjectCommon::GetTree(&$department, "QTHT_DEPARTMENTS", "ID_DEP", "ID_DEP_PARENT", 1, 1);
        $r = $db->query("
				SELECT
					DEP.ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME,U.USERNAME AS USERNAME
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
					INNER JOIN QTHT_DEPARTMENTS DEP ON E.ID_DEP=DEP.ID_DEP
				ORDER BY
					U.ORDERS, E.LASTNAME
			");
        $user = $r->fetchAll();
        $r->closeCursor();

        $html.="    	<div style='float:left'><select name=$DName id=$DName onchange='FillComboByComboExp(this,document.getElementById(\"$UName\"),$arr_user,arr_user);'>";
        $html.="        	<option value=0>--Chọn phòng--</option>";
        for ($i = 0; $i < count($department); $i++) {
            $html.="        <option value=" . $department[$i]["ID_DEP"] . ">" . str_repeat("--", $department[$i]['LEVEL']) . $department[$i]["NAME"] . "</option>";
        }
        $html.="        </select><br><select name=$UName id=$UName multiple size=5 ondblclick=\"if(typeof(InsertIntoArr)=='function')eval('InsertIntoArr()');\"></select></div>";

        $html.="<script>";
        $html.="	var $arr_user = new Array();";
        for ($i = 0; $i < count($user); $i++)
            $html.=$arr_user . "[" . $i . "] = new Array('" . $user[$i]['ID_DEP'] . "','" . $user[$i]['USERNAME'] . "','" . $user[$i]['NAME'] . "');";
        $html.="	FillComboByComboExp(document.getElementById(\"$DName\"),document.getElementById(\"$UName\"),$arr_user,null);";
        $html.="</script>";

        return $html;
    }

    static function writeSelectDepartmentMultiUserHWithSelDep($DName, $UName, $sel, $func_insert = 'InsertIntoArr') {
        global $db;

        $arr_user = 'ARR_' . $UName;
        $department = array();
        ProjectCommon::GetTree(&$department, "QTHT_DEPARTMENTS", "ID_DEP", "ID_DEP_PARENT", 1, 1);
        $r = $db->query("
				SELECT
					DEP.ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME,U.USERNAME AS USERNAME
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
					INNER JOIN QTHT_DEPARTMENTS DEP ON E.ID_DEP=DEP.ID_DEP
				ORDER BY
					U.ORDERS, E.LASTNAME
			");
        $user = $r->fetchAll();
        $r->closeCursor();

        $html.="    	<div style='float:left'><select name=$DName id=$DName onchange='FillComboByComboExp(this,document.getElementById(\"$UName\"),$arr_user,arr_user);'>";
        $html.="        	<option value=0>--Chọn phòng--</option>";
        for ($i = 0; $i < count($department); $i++) {
            if ($department[$i]["ID_DEP"] == $sel) {
                $html.="        <option value=" . $department[$i]["ID_DEP"] . " selected>" . str_repeat("--", $department[$i]['LEVEL']) . $department[$i]["NAME"] . "</option>";
            } else {
                $html.="        <option value=" . $department[$i]["ID_DEP"] . ">" . str_repeat("--", $department[$i]['LEVEL']) . $department[$i]["NAME"] . "</option>";
            }
        }
        $html.="        </select><br><select name=$UName id=$UName multiple size=5 ondblclick=\"if(typeof($func_insert)=='function')eval('$func_insert()');\"></select></div>";

        $html.="<script>";
        $html.="	var $arr_user = new Array();";
        for ($i = 0; $i < count($user); $i++)
            $html.=$arr_user . "[" . $i . "] = new Array('" . $user[$i]['ID_DEP'] . "','" . $user[$i]['USERNAME'] . "','" . $user[$i]['NAME'] . "');";
        $html.="	FillComboByComboExp(document.getElementById(\"$DName\"),document.getElementById(\"$UName\"),$arr_user,null);";
        $html.="</script>";

        return $html;
    }

    static function writeSelectDepartmentUserWithSelreport($DName, $UName) {
        global $db;
        $userauth = Zend_Registry::get('auth')->getIdentity();
        $arr_user = 'ARR_' . $UName;
        $department = array();
        ProjectCommon::GetTree(&$department, "QTHT_DEPARTMENTS", "ID_DEP", "ID_DEP_PARENT", 1, 1);
        $r = $db->query("
				SELECT
					DEP.ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME,U.USERNAME AS USERNAME
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
					INNER JOIN QTHT_DEPARTMENTS DEP ON E.ID_DEP=DEP.ID_DEP
				ORDER BY
					U.ORDERS, E.LASTNAME
			");
        $user = $r->fetchAll();
        $r->closeCursor();
        $m = $db->query("
				SELECT
					DEP.ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME,U.USERNAME AS USERNAME
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
					INNER JOIN QTHT_DEPARTMENTS DEP ON E.ID_DEP=DEP.ID_DEP
					WHERE u.ID_U= ?
							", array($userauth->ID_U));
        $id_dep = $m->fetch();
        $m->closeCursor();
        $html.="    	<div style='float:left'><select name=$DName id=$DName onchange='FillComboByComboExp1(this,document.getElementById(\"$UName\"),$arr_user,arr_user);'>";
        if ($userauth->DEPLEADER == 1) {
            $html.=" <option value=0>--Chọn phòng--</option>";
            for ($i = 0; $i < count($department); $i++) {
                $html.="<option value=" . $department[$i]["ID_DEP"] . ">" . str_repeat("--", $department[$i]['LEVEL']) . $department[$i]["NAME"] . "</option>";
            }
        } else {
            for ($i = 0; $i < count($department); $i++) {
                if ($id_dep["ID_DEP"] == $department[$i]["ID_DEP"]) {
                    $html.=" <option value=" . $department[$i]["ID_DEP"] . ">" . str_repeat("--", $department[$i]['LEVEL']) . $department[$i]["NAME"] . "</option>";
                }
            }
        }
        $html.="        </select></div>";

        $html.="<div style='float:left'><select name=$UName" . "[]" . " id=$UName multiple size=5 ondblclick=\"if(typeof(InsertIntoArr)=='function')eval('InsertIntoArr()');\"></select></div>";

        $html.="<script>";
        $html.="	var $arr_user = new Array();";
        for ($i = 0; $i < count($user); $i++)
            $html.=$arr_user . "[" . $i . "] = new Array('" . $user[$i]['ID_DEP'] . "','" . $user[$i]['USERNAME'] . "','" . $user[$i]['NAME'] . "');";
        $html.="	FillComboByComboExp1(document.getElementById(\"$DName\"),document.getElementById(\"$UName\"),$arr_user,null);";
        $html.="</script>";
        return $html;
    }

    static function getDepList($data, $parent) {
        $result = array();
        foreach ($data as $item) {
            $result[] = $item['ID_DEP'];
        }
        $result[] = $parent;
        return $result;
    }

    /**
     * Tạo select user từ select department
     * 
     * @param int $DName tên combobox chứa danh sách department
     * @param int $UName tên combobox chứa danh sách user thuộc department trên
     * @return html code
     */
    static function writeSelectDepartmentUserWithSel($DName, $UName, $sel, $depparent) {
        global $db;

        $arr_user = 'ARR_' . $UName;
        $department = array();
        ProjectCommon::GetTree(&$department, "QTHT_DEPARTMENTS", "ID_DEP", "ID_DEP_PARENT", $depparent, 1);
        $iddep = implode(",", ProjectCommon::getDepList($department, $depparent));
        $r = $db->query("
				SELECT
					DEP.ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
					INNER JOIN QTHT_DEPARTMENTS DEP ON E.ID_DEP=DEP.ID_DEP
				" . ($depparent > 1 ? "WHERE
					DEP.ID_DEP in ($iddep)" : "") . "
				ORDER BY
					U.ORDERS, E.LASTNAME
			");
        $user = $r->fetchAll();
        $r->closeCursor();

        $html.="    	<select name=$DName id=$DName onchange='FillComboByComboWithSel(this,document.getElementById(\"$UName\"),$arr_user,\"$sel\");'>";
        $html.="        	<option value=0>--Chọn phòng--</option>";
        for ($i = 0; $i < count($department); $i++) {
            $html.="        <option value=" . $department[$i]["ID_DEP"] . ">" . str_repeat("--", $department[$i]['LEVEL']) . $department[$i]["NAME"] . "</option>";
        }
        $html.="        </select>";

        $html.="<select name=$UName id=$UName>
				
			</select>";

        $html.="<script>";
        $html.="	var $arr_user = new Array();";
        $html.=$arr_user . "[" . "0" . "] = new Array('" . "" . "','" . "0" . "','" . "-- Chọn người --" . "');";
        for ($i = 1; $i < count($user); $i++)
            $html.=$arr_user . "[" . $i . "] = new Array('" . $user[$i]['ID_DEP'] . "','" . $user[$i]['ID_U'] . "','" . $user[$i]['NAME'] . "');";
        $html.="	FillComboByComboWithSel(document.getElementById(\"$DName\"),document.getElementById(\"$UName\"),$arr_user,\"$sel\");";
        $html.="</script>";

        return $html;
    }

    static function getFullUserByDepId($return, $iddep) {
        global $db;

        $dep = array();
        $dep[] = 0;
        ProjectCommon::getAllDepChild(&$dep, $iddep);
        //lấy danh sách user của phòng
        $r = $db->query("
				SELECT
					$iddep as ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
					INNER JOIN QTHT_DEPARTMENTS DEP ON E.ID_DEP=DEP.ID_DEP
				WHERE
					DEP.ID_DEP in ($iddep," . implode(",", $dep) . ")
				ORDER BY
					U.ORDERS, E.LASTNAME
			");
        $user = $r->fetchAll();
        foreach ($user as $item) {
            $return[] = $item;
        }

        //Lấy các phòng con
        $r = $db->query("
				SELECT
					ID_DEP
				FROM				
					QTHT_DEPARTMENTS
				WHERE
					ID_DEP_PARENT in ($iddep)
			");
        $dep = $r->fetchAll();
        foreach ($dep as $item) {
            //ProjectCommon::getFullUserByDepId(&$return,$iddepparent,$item['ID_DEP']);
            ProjectCommon::getFullUserByDepId(&$return, $item['ID_DEP']);
        }
    }

    static function getFullUserByDepIdWithNoGroup($return, $iddep) {
        global $db;

        $dep = array();
        $dep[] = 0;
        ProjectCommon::getAllDepChild(&$dep, $iddep);
        //lấy danh sách user của phòng
        $r = $db->query("
				SELECT
					-1 as ID_G,$iddep as ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME,U.USERNAME
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
					INNER JOIN QTHT_DEPARTMENTS DEP ON E.ID_DEP=DEP.ID_DEP
				WHERE
					DEP.ID_DEP in ($iddep," . implode(",", $dep) . ")
				ORDER BY
					U.ORDERS, E.LASTNAME
			");
        $user = $r->fetchAll();
        foreach ($user as $item) {
            $return[] = $item;
        }

        //Lấy các phòng con
        $r = $db->query("
				SELECT
					ID_DEP
				FROM				
					QTHT_DEPARTMENTS
				WHERE
					ID_DEP_PARENT in ($iddep)
			");
        $dep = $r->fetchAll();
        foreach ($dep as $item) {
            //ProjectCommon::getFullUserByDepId(&$return,$iddepparent,$item['ID_DEP']);
            ProjectCommon::getFullUserByDepIdWithNoGroup(&$return, $item['ID_DEP']);
        }
    }

    static function getAllDepChild($return, $iddep) {
        global $db;
        $r = $db->query("
				SELECT
					ID_DEP
				FROM				
					QTHT_DEPARTMENTS
				WHERE
					ID_DEP_PARENT in ($iddep)
			");
        $dep = $r->fetchAll();
        foreach ($dep as $item) {
            $return[] = $item["ID_DEP"];
            ProjectCommon::getAllDepChild(&$return, $item["ID_DEP"]);
        }
    }

    static function writeSelectDepartmentUserWithSelAndAction($DName, $UName, $sel, $depparent, $action) {
        global $db;

        $arr_user = 'ARR_' . $UName;
        $department = array();
        ProjectCommon::GetTree(&$department, "QTHT_DEPARTMENTS", "ID_DEP", "ID_DEP_PARENT", $depparent, 1);
        $iddep = implode(",", ProjectCommon::getDepList($department, $depparent));
        /*
          $r = $db->query("
          SELECT
          DEP.ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME
          FROM
          QTHT_USERS U
          INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
          INNER JOIN QTHT_DEPARTMENTS DEP ON E.ID_DEP=DEP.ID_DEP
          ".($depparent>1?"WHERE
          DEP.ID_DEP in ($iddep)":"")."
          ORDER BY
          U.ORDERS, E.LASTNAME
          ");
          $user = $r->fetchAll();
          $r->closeCursor();
         */
        $user = Array();
        ProjectCommon::getFullUserByDepId(&$user, $depparent, $depparent);

        $html.="    	<select name=$DName id=$DName onchange='FillComboByComboWithSel(this,document.getElementById(\"$UName\"),$arr_user,$sel);'>";
        $html.="        	<option value=1>--Chọn phòng--</option>";
        for ($i = 0; $i < count($department); $i++) {
            $html.="        <option value=" . $department[$i]["ID_DEP"] . ">" . str_repeat("--", $department[$i]['LEVEL']) . $department[$i]["NAME"] . "</option>";
        }
        $html.="        </select>";

        $html.="<select name=$UName id=$UName onchange='$action'></select>";

        $html.="<script>";
        $html.="	var $arr_user = new Array();";
        for ($i = 0; $i < count($user); $i++)
            $html.=$arr_user . "[" . $i . "] = new Array('" . $user[$i]['ID_DEP'] . "','" . $user[$i]['ID_U'] . "','" . $user[$i]['NAME'] . "');";
        $html.="	FillComboByComboWithSel(document.getElementById(\"$DName\"),document.getElementById(\"$UName\"),$arr_user,\"$sel\");";
        $html.="</script>";

        return $html;
    }
    
    static function MysqlDateToVnDate($mysqldate){
	    	if($mysqldate!=""){
	    	$d = explode(" ",$mysqldate);
	    	$d = explode("-",$d[0]);
	    	return (int)$d[2]."/".(int)$d[1]."/".(int)$d[0];
	    	}
	    }
            

    /**
     * Tạo select user từ select department
     * 
     * @param int $DName tên combobox chứa danh sách department
     * @param int $UName tên combobox chứa danh sách user thuộc department trên
     * @return html code
     */
    static function writeMultiSelectDepartmentUser($DName, $UName, $includesmsemail = false) {
        global $db;

        $arr_user = 'ARR_' . $UName;
        $department = array();
        ProjectCommon::GetTree(&$department, "QTHT_DEPARTMENTS", "ID_DEP", "ID_DEP_PARENT", 1, 1);
        $r = $db->query("
				SELECT
					ID_G,NAME
				FROM				
					QTHT_GROUPS			
			");
        $group = $r->fetchAll();
        $r->closeCursor();
        $r = $db->query("
				SELECT
					G.ID_G,DEP.ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME, U.ORDERS, E.LASTNAME,U.USERNAME,E.PHONE,E.EMAIL
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
					INNER JOIN QTHT_DEPARTMENTS DEP ON E.ID_DEP=DEP.ID_DEP
					INNER JOIN FK_USERS_GROUPS G ON G.ID_U=U.ID_U
				
				UNION ALL

				SELECT
					G.ID_G,-1 as ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME, U.ORDERS, E.LASTNAME,U.USERNAME,E.PHONE,E.EMAIL
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
					INNER JOIN FK_USERS_GROUPS G ON G.ID_U=U.ID_U
				
				UNION ALL

				SELECT
					-1 as ID_G,-1 as ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME, U.ORDERS, E.LASTNAME,U.USERNAME,E.PHONE,E.EMAIL
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
				ORDER BY ORDERS, LASTNAME, NAME
			");
        $user = $r->fetchAll();
        $r->closeCursor();

        ProjectCommon::getFullUserByDepIdWithNoGroup(&$user, 1);

        for ($i = 0; $i < count($user); $i++) {
            try {
                if ($user[$i]['PHONE']) {
                    if ($user[$i]['EMAIL']) {
                        $user[$i]['SMSEMAIL'] = 3;
                    } else {
                        $user[$i]['SMSEMAIL'] = 1;
                    }
                } else {
                    if ($user[$i]['EMAIL']) {
                        $user[$i]['SMSEMAIL'] = 2;
                    } else {
                        $user[$i]['SMSEMAIL'] = 0;
                    }
                }
            } catch (Exception $ex) {
                //echo $ex->__tostring();
                $user[$i]['SMSEMAIL'] = 0;
            }
        }

        //check idu
        /* $actsmsid = ResourceUserModel::getActionByUrl('qtht','danhmucnguoidung','sms');
          $actemailid = ResourceUserModel::getActionByUrl('qtht','danhmucnguoidung','email');
          for($i=0;$i<count($user);$i++){
          try{
          if(ResourceUserModel::isAcionAlowed($user[$i]['USERNAME'],$actsmsid[0])){
          if(ResourceUserModel::isAcionAlowed($user[$i]['USERNAME'],$actemailid[0])){
          $user[$i]['SMSEMAIL'] = 3;
          }else{
          $user[$i]['SMSEMAIL'] = 1;
          }
          }else{
          if(ResourceUserModel::isAcionAlowed($user[$i]['USERNAME'],$actemailid[0])){
          $user[$i]['SMSEMAIL'] = 2;
          }else{
          $user[$i]['SMSEMAIL'] = 0;
          }
          }
          }catch(Exception $ex){
          //echo $ex->__tostring();
          $user[$i]['SMSEMAIL'] = 0;
          }
          } */

        $html.="
				<table>
					<tr><td style='width:130px;'><b>Nhóm</b></td><td>
			";
        $html.="<select name=G$DName id=G$DName onchange='FillComboBy2Combo(this,document.getElementById(\"$DName\"),document.getElementById(\"$UName\"),$arr_user,arr_user_temp);'>";
        $html.="        	<option value=-1>--Chọn nhóm--</option>";
        for ($i = 0; $i < count($group); $i++) {
            $html.="        <option value=" . $group[$i]["ID_G"] . ">" . $group[$i]["NAME"] . "</option>";
        }
        $html.="        </select>";
        $html.="</td></tr>
					<tr><td style='width:130px;'><b>Phòng</b></td><td>
			";
        $html.="<select name=$DName id=$DName onchange='FillComboBy2Combo(document.getElementById(\"G$DName\"),this,document.getElementById(\"$UName\"),$arr_user,arr_user_temp);'>";
        $html.="        	<option value=-1>--Chọn phòng--</option>";
        for ($i = 0; $i < count($department); $i++) {
            $html.="        <option value=" . $department[$i]["ID_DEP"] . ">" . str_repeat("--", $department[$i]['LEVEL']) . $department[$i]["NAME"] . "</option>";
        }
        $html.="        </select>";
        $html.="</td></tr>
					<tr><td style='width:130px;'><b>Người</b></td><td>
			";
        $html.="<select name=$UName id=$UName size=5 multiple ondblclick=\"if(typeof(InsertIntoArr)=='function')eval('InsertIntoArr()');\"></select>";
        $html.='
			
			</td>
			</tr>
				</table>
			';

        $html.="<script>";
        $html.="	var $arr_user = new Array();";
        $html.="	var $arr_user" . "smsemail" . " = new Array();";
        for ($i = 0; $i < count($user); $i++) {
            $html.=$arr_user . "[" . $i . "] = new Array('" . $user[$i]['ID_G'] . "','" . $user[$i]['ID_DEP'] . "','" . $user[$i]['ID_U'] . "','" . $user[$i]['NAME'] . "');";
            $html.=$arr_user . "smsemail[" . $i . "] = new Array('" . $user[$i]['SMSEMAIL'] . "');";
        }

        $html.="	FillComboBy2Combo(document.getElementById(\"G$DName\"),document.getElementById(\"$DName\"),document.getElementById(\"$UName\"),$arr_user,null);";
        $html.="</script>";

        return $html;
    }

    /**
     * Tạo select user từ select department
     * 
     * @param int $DName tên combobox chứa danh sách department
     * @param int $UName tên combobox chứa danh sách user thuộc department trên
     * @return html code
     */
    static function writeSelectDepartment($DName, $UName) {
        global $db;

        $arr_user = 'ARR_' . $UName;
        $department = array();
        ProjectCommon::GetTree(&$department, "QTHT_DEPARTMENTS", "ID_DEP", "ID_DEP_PARENT", 1, 1);
        $r = $db->query("
				SELECT
					DEP.ID_DEP,U.ID_U,CONCAT(E.FIRSTNAME , ' ' , E.LASTNAME) as NAME
				FROM				
					QTHT_USERS U 
					INNER JOIN QTHT_EMPLOYEES E ON E.ID_EMP = U.ID_EMP
					INNER JOIN QTHT_DEPARTMENTS DEP ON E.ID_DEP=DEP.ID_DEP
				ORDER BY
					U.ORDERS, E.LASTNAME
			");
        $user = $r->fetchAll();
        $r->closeCursor();

        $html.="    	<select name=$DName id=$DName onchange='FillComboByCombo(this,document.getElementById(\"$UName\"),$arr_user);'>";
        $html.="        	<option value=0>--Chọn phòng--</option>";
        for ($i = 0; $i < count($department); $i++) {
            $html.="        <option value=" . $department[$i]["ID_DEP"] . ">" . str_repeat("--", $department[$i]["LEVEL"]) . ($department[$i]["LEVEL"] > 1 ? "-> " : "") . $department[$i]["NAME"] . "</option>";
        }
        $html.="        </select>";

        $html.="<script>";
        $html.="	var $arr_user = new Array();";
        for ($i = 0; $i < count($user); $i++)
            $html.=$arr_user . "[" . $i . "] = new Array('" . $user[$i]['ID_DEP'] . "','" . $user[$i]['ID_U'] . "','" . $user[$i]['NAME'] . "');";
        $html.="</script>";
        return $html;
    }

    /** calendar * */
    static function calendarFull($value, $name, $id) {
        return '
				<input type="text" size=10 name="' . $name . '" id="' . $id . '" value="' . $value . '" onblur="getFullDate(this);if(typeof(ChangeDate)==\'function\')eval(\'ChangeDate()\');"><img src="/images/calendar.png" onclick="document.getElementById(\'' . $id . '\').focus();var dp_cal_' . $id . ' = null;
					dp_cal_' . $id . '  = new Epoch(\'epoch_popup\',\'popup\',document.getElementById(\'' . $id . '\'),false,"2012",\'d/m/Y\');
					dp_cal_' . $id . '.show();HasEvent=true;"></img>
			';
    }

}