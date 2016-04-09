<?php
require_once 'application/models/common.php';
require_once 'application/models/autocomplete_model.php';
echo ProjectCommon::useDlgConfirm();
?>
<HTML>
    <head>
        <title><?= $title ?></title>
        <link type='text/css' href='/css/general.css' rel='Stylesheet'>
        <script type="text/javascript" src="/js/boxover.js"></script>
        <script type="text/javascript" src="/js/SwapDiv.js"></script>
        <script src="/js/autocomplete.js" type="text/javascript"></script> 
        <script src="/js/Ajax/AjaxEngine.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/validate.js"></script>	
        <script type="text/javascript" src="/js/dlg_confirm.js"></script>
        <script type="text/javascript" src="/js/common.js"></script>      
    </head>

    <body>

        <form method="post" name="frm" id='frm' action='/customer/update/'>
            <br>
            <fieldset>
                <legend> <img src='/images/customerlist.png' alt="Danh sách khách hàng">Danh sách khách hàng 
                </legend>	

                <div style="float: right;margin-top:18px;margin-left:12px;">
                    <center>
                        <a href="#" onClick="document.getElementById('input').style.display=''" title="Thêm mới khách hàng">
                            <img src="/images/sms-icon.png" width="48" height="48"/></br>
                            <span>SMS</span>
                        </a>
                    </center>
                </div>


                <div style="float: right;margin-top:18px">
                    <center>
                        <a href="#" onClick="document.getElementById('input').style.display=''" title="Thêm mới khách hàng">
                            <img src="/images/add_customer_48.png"/></br>
                            <span>Thêm mới</span>
                        </a>
                    </center>
                </div>

                <div style="float:left">
                    <table>
                        <tr>
                            <td>Tìm kiếm theo tên khách hàng</td>
                            <td>
                                <input type='text' name='NAME' id='NAME' title='Tìm theo tên khách hàng'/>
                            </td>
                        </tr>

                        <tr>
                            <td>Tìm kiếm theo tên công ty</td>
                            <td>
                                <input type='text' name='COMPANY' id='COMPANY' title='Tìm theo tên công ty'/>	
                                <input type='button' onClick="document.frm.action='/customer/index/';document.frm.submit();" value='Tìm kiếm khách hàng' class='input_button'/>
                            </td>
                        </tr>	
                        <tr>
                            <td>	Hiển thị nhanh thông tin khách hàng</td>
                            <td><?php
echo ProjectCommon::AutoComplete(
        autocomplete_model::getAllUser(), "ID_U", "NAME", "ID_U", "FASTVIEW", true, "width:400px", "ID_SEARCH", "SEARCH_STRING", $auto, "");
?></td>
                        </tr>
                    </table>

                </div>
                <div style="float: right;margin-right:21px;margin-top:18px">
                    <center>
                        <img onClick="DeleteButtonClick();" src="/images/delete_customer_48.png" /></br>
                        <span>Xóa</span>
                    </center>
                </div>

                <table class="adminlist">
                    <thead>
                        <?php foreach ($fields as $field_name => $field_display): ?>
                        <th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
                            <?php
                            echo anchor("customer/index/$field_name/" .
                                    (($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'), $field_display, 'title="Click to sort"');
                            ?>
                        </th>
                    <?php endforeach; ?>
                    <th>Hành động</th>
                    <th nowrap style="text-align: center;"><input type=checkbox name=DELALL onClick="SelectAll(this,'DEL')"></th>

                    <tbody>
                        <tr></tr>
                        <tr id='input' style='display:none'>
                            <td nowrap="nowrap"></td>
                            <td>
                                <select id='sex' name='sex'>
                                    <option value='0'>Anh</option>
                                    <option value='1'>Chị</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="lastname" id="lastname" style="width:55px;border-color:#f7df09"></input>
                            </td>
                            <td>
                                <input type="text" name="name" id="name" style="width:75px;border-color:#f7df09"></input>
                            </td>
                            <td>
                                <input type="text" name="cty" id="cty" style="width:125px;border-color:#f7df09"></input>
                            </td>
                            <td>
                                <input type="text" name="address" id="address" style="width:115px;border-color:#f7df09"></input>
                            </td>
                            <td>
                                <select id='district' name='district'>
                                    <?= customer_model::comboBox($district) ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="tel" id="tel" style="width:85px;border-color:#f7df09"></input>
                            </td>
                            <td>
                                <input type="text" name="delivery_time" id="delivery_time" style="width:60px;border-color:#f7df09"></input>
                            </td>

                            <td>
                                <select id='customer_type' name='customer_type'>
                                    <?= customer_model::comboBox($type) ?>
                                </select>
                            </td>

                            <td colspan='3'>
                                <input type="text" name="notes" id="notes" style="width:125px;border-color:#f7df09"></input>
                                <input type="button" class='input_button' value="Lưu" onClick="document.frm.action='/customer/save/';document.frm.submit();"/>
                                <input type="button" class='input_button' value="Hủy" onClick="window.location.href='/customer/index/'"/>
                            </td>

                        </tr>
                        <?php
                        if ($cust == null) {
                            echo "<tr><td colspan='13'><font color=red>Không tìm thấy khách hàng</font></td></tr>";
                        }
                        $stt = 0;
                        $i = 0;
                        foreach ($cust as $row) {
                            $stt++;
                            ?>
                            <tr id=groupicon6_<?= $row['ID_U'] ?> align='center' class="row<?= $row_idu == $row['ID_U'] ? "2" : $i ?>"   width='1px'>
                                <td><?= $row['ID_U'] ?></td> 
                                <td><?php if ($row['SEX'] == '1') echo 'Chị'; if ($row['SEX'] == '0') echo 'Anh'; ?></td>
                                <td><?= $row['LASTNAME'] ?></td>
                                <td><a href='#' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle>Khách hàng <?php echo $row['LASTNAME'] ?> <?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top>Email: <?php echo $row['EMAIL'] ?></td></tr><tr><td valign=top>Trai kỳ: <?php echo $row['VEGETARIAN_TYPE'] ?></td></tr><tr><td valign=top>Cách thanh toán: <?php echo $row['PAID_METHOD'] ?></td></tr></table>]"'><?= $row['NAME'] ?></a></td>
                                <td><?= $row['COMPANY'] ?></td>
                                <td><?= $row['ADDRESS'] ?></td>
                                <td><?= $row['DISTRICT'] ?></td>
                                <td><?= $row['PHONE'] ?></td>
                                <td><?= $row['DELIVERY_TIME'] ?></td>
                                <td><?= $row['CUST_TYPE'] ?></td>
                                <td><?= $row['NOTES'] ?></td>
                                <td> <a href='javascript:
                                        {	SwapDiv(<?= $row['ID_U'] ?>,"/customer/view_update/<?= $row['ID_U'] ?>",6);
                                        }
                                        ' title='Cập nhật thông tin khách hàng <?= $row['LASTNAME'] ?> <?= $row['NAME'] ?>' >Cập nhật</a><br>
                                    <a href="#" onclick="order(<?= $row['ID_U'] ?>);" title='Đặt hàng cho khách hàng <?= $row['LASTNAME'] ?> <?= $row['NAME'] ?>'>Order</a></td>
                                <td nowrap align="center">
                                    <input type=checkbox name=DEL[] value='<?php echo $row['ID_U'] ?>'>
                                </td>

                            </tr>
                            <tr id=groupcontent<?= $row['ID_U'] ?> style="display:none;">
                                <td colspan="">  <div style="display:none;background: #ffffff" id=groupcontent<?= $row['ID_U'] ?> class="project"></div></td>
                            </tr>     
                            <?php
                            $i = (-1 + $i) * -1;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr >
                            <td colspan='13'>
                                <?php if (strlen($pagination)): ?>
                                    <div id="container">
                                        Trang: <?php echo $pagination; ?>
                                    </div>
                                <?php endif; ?>
                                <span style="float:right">Danh sách có <font color=red><?php echo $num_lists; ?></font> khách hàng</span>
                            </td>

                        </tr>

                    </tfoot>
                </table>
            </fieldset>
            <input type='hidden' name='idu' id='idu'></input>
        </form>
    </body>
</html>
<script>
    
    function order(id)
    {
        document.frm.action='/order/input/';
        document.getElementById("idu").value=id;
        document.frm.submit();
    }
  
</script>						
