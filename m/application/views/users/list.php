<?php
require_once 'application/models/common.php';
require_once 'application/models/autocomplete_model.php';
echo ProjectCommon::useDlgConfirm();
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title>Quản trị người dùng</title>
        <meta charset="UTF-8">
        <link href="/css/general.css" rel="Stylesheet">
        <link href="/css/menu.css" rel="Stylesheet">
        <link href="/css/arrowsidemenu.css" rel="stylesheet" type="text/css" >
        <script type="text/javascript" src='/js/AjaxEngine.js'></script>	 
        <script type="text/javascript" src="/js/validate.js"></script>	
        <script type="text/javascript" src="/js/dlg_confirm.js"></script>
        <script type="text/javascript" src="/js/common.js"></script>
        <script type="text/javascript" src="/js/autocomplete.js"></script>
        <script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script>

    </head>
    <body>
        <br><br>
        <form id="frm" name="frm" action="/user/index/" method="POST">

            <fieldset>
                <legend>Quản lý nhân sự<img src='/images/employee.png'></img></legend>

                <table>
                    <tr>
                        <td  align="left" width='100%'>
                            Từ khóa tìm kiếm :  
                            <?php
                            echo ProjectCommon::AutoComplete(
                                    autocomplete_model::getKeyword(), "ID_U", "EMP_NAME", "ID_U", "SEARCH_STRING", true, "width:200px", "ID_SEARCH", "SEARCH_STRING", $auto, "Auto Suggestion Textbox - Gõ vào textbox tìm kiếm này sẽ hiển thị tên của cán bộ cần tìm kiếm - Arrow Key Up and Arrow Key Down để duyệt - Bấm Tab hoặc trỏ chuột để chọn");
                            ?>                                           
                            <input type=hidden name=advanced>
                            <input type="submit"  value="Tìm kiếm" class="input_button"/>
                            <input type="submit"  value="Làm lại" class="input_button"/>
                            <input type=hidden name=ADVANCEDVALUE value='<?= $this->ADVANCED ?>'>
                        </td>
                    <div style='position:absolute; left: 500px; top: 265px;'>
                        <b>Xem theo phòng ban</b>
						<select id='dep' name='dep' onchange="document.frm.submit();document.frm.action='/user/index'">
							<option  value=> - Chọn phòng ban - </option>
							<?=user_model::departmentBox($department,$department)?>
						</select>
						<input type=button class='input_button' value='Chọn tất cả phòng ban' onclick="document.frm.submit();document.frm.action='/user/index'" >
                    </div>

                    <div style="float: right;">
                        <center>
                            <a href="/user/input/" title="Thêm mới người dùng" >
                                <img src="/images/add-user-icon.jpg" width=32 height=32 /></br>
                                <span>Thêm mới</span>
                            </a>
                        </center>
                    </div>
                    <div style="float: right;padding-right:30px;">
                        <center>	
                            <a onClick="DeleteButtonClick();" class='toolbar' href="#" title="Xóa">
                                <img src="/images/module_header/icon-32-delete.png" /></br>
                                <span>Xóa</span>
                            </a>
                        </center>
                    </div>
                    </tr>
                    <tr>
                        <td>
                            <input type='checkbox' onClick='showdetails();'/>Tìm kiếm chi tiết
                        </td>
                    </tr>
                </table>
                <br/>
                <table id='TableSearch'>
                    <tr>
                        <td width='100'; align="left">
                            Tên đăng nhập:
                    </td> 
                    <td align="left" nowrap>
						<input type='text' name='username' id='username'>
                    </td> 

                </tr>

                <tr>
                    <td width='100'; align="left">
                        Họ tên: 
                </td>
                <td align="left" width='100'>
                        	<input type='text' name='name' id='name'>
                </td> 

            </tr>

            <tr>
                <td width='100' align="left">
                    <font color=black>Giới tính</font> 
                </td>
                <td align="left" width='100'>
                    <input type='checkbox' value='Nam' id='sex' name='sex'/>Nam	
                    <input type='checkbox' value='Nữ' id='sex' name='sex'/>Nữ
                </td> 
            </tr>

            <tr>
                <td align="left" width='100'>Cơ quan - Đơn vị</td>
				
                <td>
                    <select name='coquan' id='coquan'>
						<option value=>* Chọn cơ quan *</option>
                        <?= user_model::coquanBox($coquan, $coquan); ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td align="left" width='100'>Chức vụ</td>
                <td>
				<select id='chucvu' name='chucvu'>
					<option value=>* Chọn chức vụ *</option>
					<?=user_model::chucvuBox($chucvu,$chucvu)?>
				</select>
				</td>
            </tr>
            <tr>
                <td align="left" width='100'>
                    Ngày tạo
                </td>
                <td>
                    <input type="text" maxlength="100" size="10" title='từ ngày' value="" id='fromdate' name='fromdate' class="inputbox">
                    <img height="17" alt="" onclick="popCalendar.show(this, 'fromdate', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;" src="/images/calendar.jpg">

                    <img src='/images/todate.png'/>

                    <input type="text" maxlength="100" size="10" title='đến ngày' value="" id='todate' name='todate' class="inputbox">
                    <img height="17" alt="" onclick="popCalendar.show(this, 'todate', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;" src="/images/calendar.jpg">


                </td>
            </tr>

            <tr>
                <td align="left" width='75'>
                    <input type='submit'  value='Tìm kiếm' class='input_button'>
                </td> 
                <td align='left' width='125'>
                    <input type="button" value="Làm lại" onClick="document.getElementById('username').value='';document.getElementById('name').value='';document.frm.submit();" class="input_button"></input>
                </td>
            </tr>
        </table>

<input type=hidden name="id" id="id" >

</form>

<table align="right" class="adminlist">

    <thead>
<?php foreach ($fields as $field_name => $field_display): ?>
        <th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
    <?php
    echo anchor("user/index/$field_name/" .
            (($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'), $field_display, 'title="Click to sort"');
    ?>
        </th>
<?php endforeach; ?>
    <th colspan='2' width='75px'><center>Chức năng</center></th>
    <th nowrap style="text-align: center;"><input type=checkbox name=DELALL onclick="SelectAll(this,'DEL')"></th>
</thead>


<tbody>

    <?php
    $stt = 0;
    $i = 0;
    foreach ($emp as $row) {
        $stt++;
        ?>
        <tr class="row<?php echo $i; ?>" id=user1_<?= $row['ID_U'] ?> >
            <td nowrap align="center"> 
                <a href='javascript:
                   {	SwapDiv(<?php echo $row['ID_U'] ?>,"/user/detail/<?php echo $row['ID_U'] ?>",1);
                   }
                   ' title='Click để xem chi tiết'>

                    <font color=brown> <font color=brown><?php echo $stt ?></font>
                </a>
            </td> 	
            <td>
                <a href='javascript:
                   {	SwapDiv(<?php echo $row['ID_U'] ?>,"/user/detail/<?php echo $row['ID_U'] ?>",1);
                   }
                   ' title='Click để xem chi tiết'>

                    <font color=brown>
    <?php echo $row['USERNAME'] ?>
                    </font>
                </a>
            </td>

            <td>
                <a href='javascript:
                   {	SwapDiv(<?php echo $row['ID_U'] ?>,"/user/detail/<?php echo $row['ID_U'] ?>",1);
                   }
                   ' title='Click để xem chi tiết'>

                    <font color=brown>
    <?php echo $row['SEX'] ?>
                    </font>
                </a>
            </td>	

            <td>
                <a href='#' onclick='set_right(<?=$row['ID_U']?>)'>

                    <font color=brown>
    <?php echo $row['EMP_NAME'] ?>
                    </font>
                </a>
            </td>

            <td>
                <a href='javascript:
                   {	SwapDiv(<?php echo $row['ID_U'] ?>,"/user/detail/<?php echo $row['ID_U'] ?>",1);
                   }
                   ' title='Click để xem chi tiết'>

                    <font color=brown>
    <?php echo $row['EMAIL'] ?>
                    </font>
                </a>
            </td>	
            <td>
                <a href='javascript:
                   {	SwapDiv(<?php echo $row['ID_U'] ?>,"/user/detail/<?php echo $row['ID_U'] ?>",1);
                   }
                   ' title='Click để xem chi tiết'>

                    <font color=brown>
    <?php echo $row['CHUCVU_NAME'] ?>
                    </font>
                </a>
            </td>	

            <td>
                <a href='javascript:
                   {	SwapDiv(<?php echo $row['ID_U'] ?>,"/user/detail/<?php echo $row['ID_U'] ?>",1);
                   }
                   ' title='Click để xem chi tiết'>

                    <font color=brown>
    <?php echo $row['DEP_NAME'] ?>
                    </font>
                </a>
            </td>

            <td>
                <a href='javascript:
                   {	SwapDiv(<?php echo $row['ID_U'] ?>,"/user/detail/<?php echo $row['ID_U'] ?>",1);
                   }
                   ' title='Click để xem chi tiết'>

                    <font color=brown>
    <?php echo $row['TEN_DONVI_COQUAN'] ?>
                    </font>
                </a>
            </td>
            <td width='60px' align='center'>
                <a href='javascript:
                   {	SwapDiv(<?php echo $row['ID_U'] ?>,"/user/detail/<?php echo $row['ID_U'] ?>",1);
                   }
                   ' title='Cập nhật thông tin nhân viên này'>Chi tiết</a>
            </td>
			    <td width='60px' align='center'>
                <a href='javascript:
                   {	SwapDiv(<?php echo $row['ID_U'] ?>,"/user/viewupdate/<?php echo $row['ID_U'] ?>",1);
                   }
                   ' title='Cập nhật thông tin nhân viên này'>Cập nhật</a>
            </td>
            <td nowrap align="center">
    <?php if ($row['USERNAME'] != "" && $row['USERNAME'] != "administrator") { ?>
                    <input type=checkbox name=DEL[] value='<?php echo $row['ID_U'] ?>'>
    <?php } ?>
            </td>


    <div class='groupcontent' id=viewuser<?= $row['ID_U'] ?> style="display:none"></div>		
    </tr>
    <?php
    $i = (-1 + $i) * -1;
}
    ?>

</tbody>

<tfoot>
    <tr >
        <td colspan='11'>
<?php if (strlen($pagination)): ?>
                <div>
                    Trang: <?php echo $pagination; ?>
                </div>
<?php endif; ?>
            <span style="float:right">Danh sách có <font color=red><?php echo $num_lists; ?></font> người dùng</span>
        </td>

    </tr>

</tfoot>


</table>


</fieldset>
</body>
<script>

    function DeleteButtonClick(){
        var mess = true;
        mess = validateInput("selone_check","DEL[]","Chọn ít nhất một người dùng để xóa");
        if(mess){
            var func_ok = "document.frm.action = '/user/delete';document.frm.submit();";
            var func_cancel = "";
            displayConfirm("Bạn có muốn xóa người dùng không?","","",func_ok,func_cancel);
			
            /*if(confirm("<?= MSG11012001 ?>")){
			
                }*/
        }else{
            alert("Chọn ít nhất một người dùng để xóa");
        }
    }

	function set_right(id)
	{
		document.frm.action='/user/user_right/';
		document.getElementById('id').value=id;
		document.frm.submit();
    }

    function showdetails(){
        if(document.getElementById("TableSearch")){
            if(document.getElementById("TableSearch").style.display==""){
                document.getElementById("TableSearch").style.display="none";
                document.frm.advanced.value="Nâng cao";
                document.frm.ADVANCEDVALUE.value=0;

            }else{
                document.getElementById("TableSearch").style.display="";
                document.frm.advanced.value="Cơ bản";
                document.frm.ADVANCEDVALUE.value=1;
            }
        }
    }
<?php
if ($this->ADVANCED == 0) {
    echo ';showdetails();';
}
?>
	

            function SwapDiv(id,url,tab){
                for(var i=1;i<11;i++){
                    if(document.getElementById("user"+i+"_"+id)){
                        if(tab!=i){
                            if(document.getElementById("user"+i+"_"+id).className=="useropen"){
                                document.getElementById("viewuser"+id).style.display="none";
                                document.getElementById("user"+i+"_"+id).className = "user";
                                break;
                            }
                        }
                    }
                }
                if(document.getElementById("viewuser"+id).style.display==""){
                    document.getElementById("viewuser"+id).style.display="none";
                    document.getElementById("user"+tab+"_"+id).className = "user";
                }else{
                    document.getElementById("viewuser"+id).style.display="";
                    document.getElementById("user"+tab+"_"+id).className = "useropen";
                    document.getElementById("viewuser"+id).innerHTML="<img src='/images/ajax-loader.gif' width='30' height='30' border='0'></img><img src='/images/ajax-loader.gif' width='30' height='30' border='0'></img><img src='/images/ajax-loader.gif' width='30' height='30' border='0'></img>";
                    loadDivFromUrl("viewuser"+id,url,1);

                }
            }


</script>
</html>

