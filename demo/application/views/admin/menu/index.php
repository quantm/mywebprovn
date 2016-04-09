<?php
require_once 'application/models/common.php';
require_once 'application/models/autocomplete_model.php';
echo ProjectCommon::useDlgConfirm();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
    <HEAD>
        <META NAME="Generator" CONTENT="EditPlus">
        <META NAME="Author" CONTENT="">
        <META charset='utf-8'>
        <link href="/css/general.css" rel="Stylesheet">
        <link href="/css/menu.css" rel="Stylesheet">
        <script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script> 
        <script type="text/javascript" src="/js/Ajax/AjaxEngine.js"></script> 
        <script type="text/javascript" src="/js/validate.js"></script>
        <script type="text/javascript" src="/js/dlg_confirm.js"></script>
        <script type="text/javascript" src="/js/common.js"></script>
        <script type="text/javascript" src="/js/autocomplete.js"></script>
    </HEAD>

    <BODY>

        <form method='post' action='/admin/menu/' id='frmmenu' name='frmmenu'>
            <br>
            <br>
            <fieldset>
                <legend>Quản trị thực đơn - Danh sách</legend>
                <br>


                <div style="float: left;">
                    <center>
                        <img src="/images/calendar_menu_applied.png"/>
                        <span><strong><font color="#FF0000">Ngày áp dụng</font></strong></span> 
                        <input type="text" onClick="popCalendar.show(this, 'date_applied', 'dd-mm-yyyy', true);" style="cursor: pointer; vertical-align: middle;" src="/images/calendar.jpg" value="" id="date_applied" name="date_applied">
                        <input type='button' value='Chọn ngày' class='input_button' onclick="
                                                            var axjax = new AjaxEngine();  
                                                            var date_applied=document.frmmenu.getElementById('date_applied').value; 
                                                            var url='/func/date_object/'+date_applied+'/'+1;
                                                            var date='Đã chọn ngày';
                                                            var type_request='POST'; 
                                                            document.getElementById('div_date_applied').style.display='';
                                                            if(date_applied!='')
                                                            {    
                                                                document.getElementById('row_date_applied').value=date+ ' ' +date_applied;
                                                                sendRequestToServer(url,type_request);
                                                            } 
                                                            else if(date_applied=='')
                                                            {
                                                                    document.getElementById('row_date_applied').value='Bạn chưa chọn ngày';
                                                            }
                                                                                                                               ">
                        <div id="div_date_applied" style="position: absolute;display:none;margin-left:350px;margin-top: -25px">
                            <font color="#ff0000"><input type=text style="width:150px;border:inherit;color:#ff0000" name="row_date_applied" id="row_date_applied"></font>
                        </div>  
                    </center>
                </div>

                <div style="float: right;">
                    <center>
                        <a class='toolbar' href="/admin/input_menu/" title="Thêm mới thực đơn">
                            <img src="/images/module_header/icon-32-new.png" /></br>
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

                <div style="float: right;padding-right:30px;">
                    <center>
                        <a onClick="set_view_yes();" class='toolbar' href="#" title="Xóa">
                            <img src="/images/menu_visible.jpg" width='32' height='32' /></br>
                            <span>Hiển thị</span>
                        </a>
                    </center>
                </div>


                <div style="float: right;padding-right:30px;">
                    <center>
                        <a onClick="set_view_no();" class='toolbar' href="#" title="Xóa">
                            <img src="/images/home_menu_invisible.png" width='32' height='32' /></br>
                            <span>Không hiển thị</span>
                        </a>
                    </center>
                </div>


                <table width="98%" class='adminlist'>
                    <thead>

                        <tr>
                            <th  align='center' width='1px'>#</th>
                            <?php foreach ($fields as $field_name => $field_display): ?>
                                <th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
                                    <?php
                                    echo anchor("admin/menu/index/$field_name/" .
                                            (($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'), $field_display, 'title="Click to sort"');
                                    ?>
                                </th>
                            <?php endforeach; ?>
                            <th width='60px' ><div align="center">Cập nhật</div></th>
                            <th nowrap width='1px' style="text-align: center;">
                                <input type=checkbox name=DELALL onClick="SelectAll(this,'DEL')">
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $stt = 0;
                        $i = 0;
                        foreach ($donvi as $row) {
                            $stt++;
                            ?>
                            <tr align=center class="row<?php echo $i; ?>"  width='1px'>
                                <td nowrap>
                                    <?php echo $stt ?>
                                </td>
                                <td><?= $row['NAME'] ?></td>
                                <td><?= $row['DESCRIPTION'] ?></td>
                                <td width='75px'><?php if ($row['TYPE'] == '1') echo 'Cơm'; else if ($row['TYPE'] == '2') echo 'Sợi'; else if ($row['TYPE'] == '3') echo 'Mì ý';?></td>
                                <td><?= $row['PRICE'] ?> VNĐ</td>
                                <td>Thứ <?= $row['DATE'] + 1 ?></td>
                                <td width='75px'><?php if ($row['VIEW'] == '1') echo 'Có'; else if ($row['VIEW'] == '0') echo 'Không'; ?></td>
                                <td nowrap align='center'>
                                    <a href='#' onclick='ItemClick(<?= $row['ID'] ?>)'><img src='/images/icon-32-edit.png' title='Cập nhật thực đơn: <?= $row['NAME'] ?> '></a>
                                </td>

                                <td nowrap align="center"><input type=checkbox name=DEL[] value='<?php echo $row['ID'] ?>'>

                                </td>
                            </tr>
                            <?php
                            $i = (-1 + $i) * -1;
                        }
                        ?>
                    </tbody>


                    <tfoot>
                        <tr >
                            <td colspan='9'>
                                <?php if (strlen($pagination)): ?>
                                    <div>
                                        Trang: <?php echo $pagination; ?>
                                    </div>
                                <?php endif; ?>
                                <span style="float:right">Danh sách có <font color=red><?php echo $num_lists; ?></font> thực đơn </span>
                            </td>

                        </tr>

                </table>
            </fieldset>
        </form>
        <input type=hidden name='id' value='id' value='<?= $row['ID'] ?>'/>

    </BODY>
</HTML>

<script>
    function ItemClick(id)
    {
        document.frmmenu.action = "/admin/update/"+id;
        document.frmmenu.submit();
    }
   
    function set_view_yes()
    {
        document.frmmenu.action = '/admin/set_menu_yes';
        document.frmmenu.submit();
    }


    function set_view_no()
    {
        document.frmmenu.action = '/admin/set_menu_no';
        document.frmmenu.submit();
    }

    function DeleteButtonClick(){
        var mess = true;
        mess = validateInput("selone_check","DEL[]","Chọn ít nhất một thực đơn để xóa");
        if(mess){
            var func_ok = "document.frmmenu.action = '/admin/delete_menu';document.frmmenu.submit();";
            var func_cancel = "";
            displayConfirm("Bạn có muốn xóa thực đơn này không không?","","",func_ok,func_cancel);

            /*if(confirm("<?= MSG11012001 ?>")){

                }*/
        }else{
            alert("Chọn ít nhất một thực đơn để xóa");
        }
    }
</script>
