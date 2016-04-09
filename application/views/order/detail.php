<?php
$date = getdate();
$wday = $date['wday'];
$mday = $date['mday'];
$mon = $date['mon'];
$date = getdate();
?>
<html>
    <head>
        <title><?= $title ?></title>
        <link type='text/css' href='/css/general.css' rel='Stylesheet'>
        <script src="/js/Ajax/AjaxEngine.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/boxover.js"></script>
        <script type="text/javascript" src="/js/SwapDiv.js"></script>
        <script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script>
    </head>
    <body>

        <form method="post" name="frm" id='frm' action='/order/details/'>
            <br>
            <fieldset>
                <legend> <img src='/images/customerlist.png' alt="Danh sách khách hàng">Danh sách đặt hàng ngày thứ <?= $wday + 1 ?> <?= $mday ?> tháng <?= $mon ?> </legend>


                <table class="adminlist">
                    <thead>
                        <?php foreach ($fields as $field_name => $field_display): ?>
                        <th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
                            <?php
                            echo anchor("order/index/$field_name/" .
                                    (($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'), $field_display, 'title="Click to sort"');
                            ?>
                        </th>
                    <?php endforeach; ?>
                    <th>Hành động</th>
                    <!--
                                        <th nowrap style="text-align: center;"><input type=checkbox name=DELALL onClick="SelectAll(this,'DEL')"></th>
                    -->
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($ordered as $row) {
                            ?>
                            <tr id=groupicon6_<?= $row['ID_ORDER'] ?>  class="row<?= $row_order == $row['ID_ORDER'] ? "2" : $i ?>">
                                <td><?= $row['ID_ORDER'] ?><?php echo $row_order ?></td>
                                <td style="vertical-align: middle;width:75px;"><?= $row['DATE_TIME'] ?></td>
                                <td style="vertical-align: middle;width:100px;"><a href='#' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle>Khách hàng <?php echo $row['LASTNAME'] ?> <?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top>Email: <?php echo $row['EMAIL'] ?></td></tr><tr><td valign=top>Trai kỳ: <?php echo $row['VEGETARIAN_TYPE'] ?></td></tr><tr><td valign=top>Cách thanh toán: <?php echo $row['PAID_METHOD'] ?></td></tr></table>]"'><?php
                        echo $row['LASTNAME'];
                        echo ' ';
                        echo $row['NAME']
                            ?></a></td>
                                <td><?= $row['PHONE'] ?></td>
                                <td style="vertical-align: middle;width:120px;"><?= $row['DELIVERY_ADDRESS'] ?></td>
                                <td>
                                    <?= $row['DISTRICT'] ?>
                                </td>
                                <!--
                                                                <td>
                                                                    <input type="text" value="<?= $row['ORDER_DATE'] ?>" id="delivery_date"  name="delivery_date" onClick="popCalendar.show(this, 'delivery_date', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;width: 70px;" >
                                                                </td>
                                -->

                                <td style="vertical-align: middle;width: 55px;">
                                    <?= $row['DELIVERY_TIME'] ?>
                                </td>

                                <td>
                                    <?php echo $row['RECEIVER'] ?>
                                </td>
                                <td>
                                    <?php echo $row['PAID_METHOD'] ?>
                                </td>

                                <td>
                                    <?= $row['DRIVER'] ?>
                                </td>

                                <td>
                                    <?= $row['NOTES'] ?>
                                </td>

                                <td>
                                    <a href='javascript:
                                       {	SwapDiv2(<?= $row['ID_ORDER'] ?>,"/order/view_update_order/<?= $row['ID_ORDER'] ?>",6);
                                       }
                                       ' title='Cập nhật'>
                                        <input class='input_button' value='Sửa' type='button'></input>
                                    </a>
                                    <a onmouseover="document.getElementById('md5_id').value='<?= $row['MD5'] ?>'" href='javascript:
                                       {	SwapDiv(<?= $row['ID_ORDER'] ?>,"/order/viewdetail/<?= $row['ID_ORDER'] ?>/<?= $row['MD5'] ?>/<?= $row['CUSTOMER_NAME']?>/<?= $row['CUSTOMER_LASTNAME']?>/",6);
                                       }
                                       ' title='Chi tiết đặt hàng'><input  class='input_button' value='CTiếtĐH' type='button'></input></a>
                                    <input class='input_button' value='Xóa' type='button'></input>
                                </td>
                        <input type='hidden' value='<?= $row['MD5'] ?>' name='md5' id='md5'></input>
                        <input type='hidden' value='<?= $row['ID_U'] ?>' name='id_u' id='id_u'></input>
                        <input type='hidden' name="md5_id" id='md5_id'>
                        
                        <tr id=group<?= $row['ID_ORDER'] ?> style="display:none;">
                        <td colspan="">  
                            <div style="display:none;background: #ffffff" id=group<?= $row['ID_ORDER'] ?> class="project"></div>
                        </td>
                        </tr> 
                        
                        </tr>
                            
                        <tr id=groupcontent2<?= $row['ID_ORDER'] ?> style="display:none;">

                        <div style="display:none;background: #ffffff" id=groupcontent2<?= $row['ID_ORDER'] ?> class="project">
                        </div>

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
                                    <div>
                                        Trang: <?php echo $pagination; ?>
                                    </div>
                                <?php endif; ?>
                                <span style="float:right">Danh sách có <font color=red><?php echo $num_lists_ordered; ?></font> đơn đặt hàng</span>
                            </td>

                        </tr>
                    </tfoot>

                </table>
                <?php foreach ($ordered as $row): ?>
                    <tr id=groupcontent<?= $row['ID_ORDER'] ?> style="display:none;">
                    <div style="display:none;background: #ffffff" id=groupcontent<?= $row['ID_ORDER'] ?> class="project">
                    </div>
                    <input type="hidden" id='id_order' name='id_order'/>
                    </tr>
                <? endforeach; ?>
            
    <input type="hidden" id='id_order' name='id_order' value='<?= $id_order ?>'/>
    <input type='hidden' id='md5' name='md5' value='<?= $md5 ?>'>
    
            </fieldset>
        </form>
        
        

    </body>
</html>

<script>

    function getprice(msg)
    {
        document.frm.getElementById('price').value=msg;
    }
    
    function get_order_code(msg)
    {
        document.frm.getElementById('mdh').value=msg;		
    }	
	
    function get_item_name(msg)
    {	
        document.frm.getElementById('item_name').value=msg;	
    }
				
    function add()
    {
        document.frm.action='/order/details/';
        document.frm.submit();
    }
    function cancel()
    {
        document.frm.action='/order/cancel/';
        document.frm.submit();
    }
    
 
    function setvalueDateD(value_from,value_to){
        document.frm.fromdate.value = value_from;
        document.frm.todate.value = value_to;
    }
</script>
