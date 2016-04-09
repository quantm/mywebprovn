<HTML>
    <head>
        <title><?= $title ?></title>
        <link type='text/css' href='/css/general.css' rel='Stylesheet'> 
        <script src="/js/Ajax/AjaxEngine.js" type="text/javascript"></script>
         <script src="/js/validate.js"></script>
        <script type="text/javascript" src="/js/boxover.js"></script>    
        <script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script> 

    </head>
    <body>

        <form method="post" name="frm" id='frm' action='/customer/update/'>
            <br>
            <fieldset>
                <legend> <img src='/images/customerlist.png' alt="Danh sách khách hàng">Danh sách đặt hàng                </legend>	
                <div style="float:left">
                    <label><b>Từ ngày</b></label>
                    <input type="text" value="" id="fromdate" name="fromdate">
                    <img height="17" alt="" onClick="popCalendar.show(this, 'fromdate', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;" src="/images/calendar.jpg">
                    đến ngày
                    <input type="text" value="" id="todate" name="todate">
                    <img height="17" alt="" onClick="popCalendar.show(this, 'todate', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;" src="/images/calendar.jpg">
                    <div>
                        <label><b>Tháng:</b></label>
                        <input type="radio" name='sel_timedis' onclick="setvalueDateD('1/1','31/1')">1
                        <input type="radio" name='sel_timedis' onclick="setvalueDateD('1/2','31/2')" >2
                        <input type="radio" name='sel_timedis' onclick="setvalueDateD('1/3','31/3')">3
                        <input type="radio" name='sel_timedis'onclick="setvalueDateD('1/4','30/4')" >4
                        <input type="radio" name='sel_timedis'onclick="setvalueDateD('1/5','31/5')">5
                        <input type="radio" name='sel_timedis' onclick="setvalueDateD('1/6','30/6')">6
                        <input type="radio" name='sel_timedis'onclick="setvalueDateD('1/7','31/7')" >7
                        <input type="radio" name='sel_timedis'onclick="setvalueDateD('1/8','31/8')" >8
                        <input type="radio" name='sel_timedis'onclick="setvalueDateD('1/9','30/9')">9
                        <input type="radio" name='sel_timedis'onclick="setvalueDateD('1/10','31/10')">10
                        <input type="radio" name='sel_timedis'onclick="setvalueDateD('1/11','30/11')">11
                        <input type="radio" name='sel_timedis'onclick="setvalueDateD('1/12','31/12')">12
                    </div>
                    <div class=clr></div>
                    <div>
                        <label><b>Quí:</b></label>
                        <input type="radio" name='sel_timedis' onclick="setvalueDateD('1/1','31/3')">I
                        <input type="radio" name='sel_timedis' onclick="setvalueDateD('1/4','30/6')">II
                        <input type="radio" name='sel_timedis'onclick="setvalueDateD('1/7','30/9')">III
                        <input type="radio" name='sel_timedis'onclick="setvalueDateD('1/10','31/12')">IV
                    </div>
                    <div class=clr></div>
                    <div>
                        <label><b>Năm:</b></label>
                        <input type="radio" name='sel_timedis' onclick="setvalueDateD('1/1','31/12')">
                    </div>

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
                    <th></th>
                    <th nowrap style="text-align: center;"><input type=checkbox name=DELALL onClick="SelectAll(this,'DEL')"></th>

                    <tbody>
                        <tr></tr>
                        <?php
                        foreach ($cust as $row) {
                            $stt++;
                            ?>
                            <tr id=groupicon6_<?= $row['ID_U'] ?> align='center' class="row<?php echo $i; ?>"  width='1px'>
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
                                <td  id=groupicon6_<?= $row['ID_U'] ?>> <a href='javascript:
                                                                           {	SwapDiv(<?= $row['ID_U'] ?>,"/customer/view_update/<?= $row['ID_U'] ?>",6);
                                                                           }
                                                                           ' title='Click để xem chi tiết'>Cập nhật</a></td>
                                <td nowrap align="center">
                                    <input type=checkbox name=DEL[] value='<?php echo $row['ID_U'] ?>'>
                                </td>

                            </tr>
                            <tr id=groupcontent<?= $row['ID_U'] ?> style="display:none;"><td colspan="">  <div style="display:none;background: #ffffff" id=groupcontent<?= $row['ID_U'] ?> class="project"></div></td>

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
