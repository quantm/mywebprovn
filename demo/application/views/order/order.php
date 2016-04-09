<?php $date=getdate();  $wday = $date['wday']; $mday = $date['mday'] ;  $mon=$date['mon'] ;?>
<HTML>
    <head>
        <title><?= $title ?></title>
        <link type='text/css' href='/css/general.css' rel='Stylesheet'> 
        <script src="/js/Ajax/AjaxEngine.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/boxover.js"></script>    
		<script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script> 

    </head>
    <body>

        <form method="post" name="frm" id='frm' action='/customer/update/'>
            <br>
            <fieldset>
                <legend> <img src='/images/customerlist.png' alt="Danh sách khách hàng">Danh sách đặt hàng ngày thứ <?=$wday+1?> <?=$mday?> tháng <?=$mon?> </legend>	
                      
                </div>
                <div style="float: right;margin-right:21px;margin-top:18px">
                    <center>
                        <img onClick="DeleteButtonClick();" src="/images/icon-32-delete.png" /></br>
                        <span>Xóa</span>
                    </center>
                </div>

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
                        <tr></tr>
                        <?php
                        foreach ($order as $row) {
                
                            ?>
                            <tr>
                                <td><?= $row['ID_U'] ?></td> 
                                <td><?= $row['DATE_TIME'] ?></td>
                                <td><a href='#' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle>Khách hàng <?php echo $row['LASTNAME'] ?> <?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top>Email: <?php echo $row['EMAIL'] ?></td></tr><tr><td valign=top>Trai kỳ: <?php echo $row['VEGETARIAN_TYPE'] ?></td></tr><tr><td valign=top>Cách thanh toán: <?php echo $row['PAID_METHOD'] ?></td></tr></table>]"'><?php echo $row['LASTNAME']; echo ''; echo $row['NAME'] ?></a></td>
                                <td><?= $row['ADDRESS'] ?></td>
                                <td><select id='driver' name='driver>'
								  <?=order_model::comboBox($district)?>
								  </select></td>
                                <td><?= $row['PHONE'] ?></td>
                                <td><?= $row['DELIVERY_TIME'] ?></td>
                                <td>
								<select id='receiver' name='receiver'>
									<option value='kh'>Khách hàng</option>
									<option value='bv'>Bảo vệ</option>
									<option value='tt'>Tiếp tân</option>
								</select>
								</td>
                               <td >
									<select id='receiver' name='receiver'>
									<option value='tm'>Tiền mặt</option>
									<option value='dt'>Đã trả</option>
								</select>                              
								</td>
								  <td>
									<select id='driver' name='driver>'
								  <?=order_model::comboBox($driver)?>
								  </select>
								  </td>	
                                 <td><?= $row['GHICHU'] ?></td>
								<td>
								<input type='button' value='Thêm' class='input_button' ></input>
								<input type='button' value='Hủy' class='input_button'></input>
								</td>
								<!--
								<td nowrap align="center">
                                    <input type=checkbox name=DEL[] value='<?php echo $row['ID_U'] ?>'>
                                </td>
								-->
                            </tr>
                            <tr id=groupcontent<?= $row['ID_U'] ?> style="display:none;"><td colspan="">  <div style="display:none;background: #ffffff" id=groupcontent<?= $row['ID_U'] ?> class="project"></div></td>

                            </tr>

                            <?php
                   
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
                                <span style="float:right">Danh sách có <font color=red><?php echo $num_lists; ?></font> đơn đặt hàng</span>
                            </td>

                        </tr>

                    </tfoot>	
                </table>
            </fieldset>
        </form>
    </body>
</html>

<script>
function setvalueDateD(value_from,value_to){
	document.frm.fromdate.value = value_from;
	document.frm.todate.value = value_to;
}
	
    function SwapDiv(id,url,tab){
         
        for(var i=1;i<11;i++){
            if(document.getElementById("groupicon"+i+"_"+id)){
                if(tab!=i){
                    if(document.getElementById("groupicon"+i+"_"+id).className=="groupiconopen"){
                        document.getElementById("groupcontent"+id).style.display="none";
                        document.getElementById("groupicon"+i+"_"+id).className = "groupicon";
                        break;
                    }
                }
            }
        }
        if(document.getElementById("groupcontent"+id).style.display==""){
            document.getElementById("groupcontent"+id).style.display="none";
            document.getElementById("groupicon"+tab+"_"+id).className = "groupicon";
        }else{
            document.getElementById("groupcontent"+id).style.display="";
            document.getElementById("groupicon"+tab+"_"+id).className = "groupiconopen";
            document.getElementById("groupcontent"+id).innerHTML="<img src='/images/loading.gif' width='16' height='16' border='0'></img>";
            loadDivFromUrl("groupcontent"+id,url,1);

        }
    }
</script>						
