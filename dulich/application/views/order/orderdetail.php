<html>
    <head>
        <meta charset="UTF-8"/>
        <link type='text/css' href='/css/general.css' rel='Stylesheet'/>
        <script src="/js/Ajax/AjaxEngine.js" type="text/javascript"></script>
        <script src="/js/SwapDiv.js" type="text/javascript"></script>
       <script>
       function getprice(msg)
        {
            document.frm.getElementById('price').value=msg;
        }
       </script>
            
    </head>
</head>

<body>
    <br/>

<div style="display:none;background: #ffffff" id=order_line1 class="project"></div>

<div id="order">
    <h3 style="color: blue;">Chi tiết đặt hàng (<?=$ho_kh?> <?=$ten_kh?>)</h3>
    <table class="adminlist">
        <thead>
        <th>Mã ĐH</th>
        <th>Mã chi tiết ĐH</th>
        <th>Món ăn</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Trạng thái</th>
        <th>Thành tiền</th>
        <th></th>
        <th></th>
        </thead>        
        <tbody>
            <?php foreach ($detail as $value): ?>
                <tr>
                    <td><?= $id_order ?></td>
                    <td><?= $value['ID'] ?></td>
                    <td><?= $value['ITEM'] ?></td>
                    <td><?php $price = $value['PRICE'];
            echo number_format($price, 2) ?> VNĐ</td>
                    <td><?= $value['QUANTITY'] ?></td>
                    <td><?= $value['STATUS'] ?></td>
                    <td><?php $paid = $value['PAID'];
            echo number_format($paid, 2) ?> VNĐ</td>
                    <td>
                        <a href='javascript:
                                       {	SwapDivOrderLine(<?= $value['ID_ORDER_LINE'] ?>,"/order/view_order_line_detail/<?= $value['ID_ORDER_LINE'] ?>",1);
                                       }
                                       ' title='Cập nhật'>
                                        <input class='input_button' value='Sửa' type='button'></input>
                        </a>
                    </td>
                    <td>
                        <input type='button' class='input_button' value='Xóa'></input>
                    </td>

                </tr>
				 <tr id=group-order-line1_<?= $value['ID_ORDER_LINE']?> style="display:none;">
					<div style="display:none;background-color:#CCC" id=grouporderline<?= $value['ID_ORDER_LINE'] ?>></div>
				</tr>
<?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"</td>
                <td>
                    <select id='item' name='item' onchange='var checkAjax = new AjaxEngine();
                        var url_price="/order/getprice/"+this.value;
                        var type_request = "GET";
                        sendRequestToServer(url_price,type_request,getprice);
                        '>>
<?= order_model::comboBox($item, $sel) ?>
                    </select>
                </td>
                <td><input type='text'  disabled name='price' id='price'></td>
                <td><input type='text' name='quantity' id='quantity' onBlur="document.getElementById('order_line_paid').value=this.value*document.getElementById('price').value;">
                </td>
                <td>
                    <select id='status' name='status' >
<?= order_model::comboBox($stat, $sel) ?>
                    </select>
                </td>
                <td>
                    <input id='order_line_paid' name='order_line_paid'  disabled ></input>
                </td>
                <td colspan="2">
                    <input type='button' class='input_button' onclick='var checkAjax = new AjaxEngine();
                        var item=document.getElementById("item").value;
                        var price=document.getElementById("price").value;
                        var quantity=document.getElementById("quantity").value;
                        var status=document.getElementById("status").value;
                        var paid_row=document.getElementById("order_line_paid").value;
                        var id_order="<?= $id_order ?>";
                        var md5_id="<?= $md5 ?>";
                        var ho_kh="<?=$ho_kh?>";
                        var ten_kh="<?=$ten_kh?>";
                        var url="/order/order_line_save/"+item+"/"+price+"/"+quantity+"/"+status+"/"+paid_row+"/"+md5_id+"/"+id_order+"/"+ho_kh+"/"+ten_kh;
                        var type_request = "GET";
                        loadDivFromUrl("order_line"+1,url,1);
                        document.getElementById("order").style.display="none";
                        '
                           value='Thêm chi tiết đặt hàng'>
                    </input>
                </td>
            </tr>
        </tfoot>
    </table>
    </div>
    <input type="hidden" id='id_order' name='id_order' value='<?= $id_order ?>'/>
    <input type='hidden' id='md5' name='md5' value='<?= $md5 ?>'>
    <input type='hidden' id='paid_row' name='paid_row'/>
    </body>
    </html>
    
    
