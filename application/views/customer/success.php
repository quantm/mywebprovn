<html>
    <meta charset='UTF-8'/>
    <link type='text/css' href='/css/general.css' rel='Stylesheet'>
    <style type="text/css">
        <!--
        #Layer1 {
            position:absolute;
            width:327px;
            height:25px;
            z-index:1;
            left: 691px;
            top: 34px;
        }
        .style1 {color: #FF0000}
        -->
    </style>
    <div class="style1" id="Layer1">Để tiếp tục đặt hàng xin vui lòng <a href='#' onClick="parent.Shadowbox.close();">click chuột vào đây</a></div>
    <font color='red' size='3'><span onclick='parent.Shadowbox.close();'>Đã đặt hàng thành công</span></font><br/><br/></br>
    <table width="507" class='orderdetail'>
        <caption>
            <font color='blue' size='4'><b>CHI TIẾT ĐẶT HÀNG</b></font> 
        </caption>

        <thead>
        <th width="201" scope="col"><div align="left"><font color='blue'>Tên</font></div></th>
    <th width="72" scope="col"><div align="left"><font color='blue'>Số lượng</font></div></th>
<th width="104" scope="col"><div align="left"><font color='blue'>Đơn giá</font></div></th>
<th width="102" scope="col"><div align="left"><font color='blue'>Thành tiền</font></div></th>
</thead>
<?php
foreach ($detail as $row) {
    ?>
    <tr  align='left' >
        <td><font color='blue'><?php echo $row['NAME'] ?></font></td> 	
        <td><font color='blue'><?= $row['QUANTITY'] ?></font></td>
        <td><font color='blue'><?= $row['PRICE'] ?> VNĐ</font></td>
        <td><font color='blue'><? echo bcmul($row['QUANTITY'], $row['PRICE']) ?> VNĐ</font></td>

    </tr>

    <?php
}
?>
<tr>
    <td colspan="3"><font color='green'><b>Tổng tiền phải trả</b></font></td>
    <td>
        <font color=red>
        <?php
        foreach ($total_paid as $row)
            echo $row['PAID_ROW']; echo '  ';
        echo 'VNĐ';
        ?>
        </font>
    </td>
</tr>
</table>

   <div style="position:absolute;top:30px;margin-right:40px ">
                            <center>
                                <a href="/order/printo/" target="_new" title="In hóa đơn" >
                                    <img src="/images/icon-48-print.png" width=32 height=32 /></br>
                                    <span>In hóa đơn</span>
                                </a>
                            </center>
                        </div>

</html>