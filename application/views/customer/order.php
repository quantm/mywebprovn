<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once 'application/models/common.php';
echo ProjectCommon::alertConfirm();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $title ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link href='/css/general.css' rel='Stylesheet'>
                <link rel="cssheet" type="text/css" href="/js/shadowbox/jquery.css" />
                <script src="/js/common.js" type="text/javascript" language="javascript"></script>
                <script src="/js/shadowbox/jquery.js" type="text/javascript"></script>    
                <script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script>
                <script type="text/javascript" src="/js/validate.js"></script>
                <script type="text/javascript" src="/js/Ajax/AjaxEngine.js"></script>
                <script type="text/javascript" src="/js/dlg_confirm.js"></script>
                <style type="text/css">
                    <!--
                    #Layer1 {
                        position:absolute;
                        width:313px;
                        height:41px;
                        z-index:5;
                        left: 261px;
                        font-size:16px;
                        top: 28px;
                        color:#00FF66;
                        text-transform:uppercase;
                    }
                    -->
                </style>
                </head>

                <BODY>

                    <?php foreach ($order as $food): ?>
                        <div id="Layer1"><?php echo 'Món ăn của thực đơn ngày thứ';
                    echo ' ';
                    echo $food['DATE'] + 1 ?></div>
<?php endforeach ?>	

                    <form id=frm name=frm method='post' action='/customer/save_order/'>
                        <fieldset>
                            <legend>Đặt hàng</legend>  	
                            <table class='admintable'>
                                <tr>
                                    <td class='key'>Tên</td>
                                    <td>
                                        <?php foreach ($order as $food): ?>
                                        <input type='text' id='food' disabled name='food' value='<?= $food['NAME'] ?>' size="35" style="background:#FFFFCC" />
                                        <?php endforeach ?>			</td>
                                    <td rowspan="7" valign="top">
                                        <?php foreach ($order as $food): ?>
                                            <img src='<?= $food['IMAGE'] ?>' width="339" height="221"/>
<?php endforeach ?>
                                        <div style="position:absolute; width:172px; height:22px; z-index:4; left:465px; top: 298px;" >
                                            <span style="color:#0099FF;font-size:14px;">Chia sẻ:  <a title="Share on Facebook" href="javascript:;" onclick="share_facebook();">
                                                    <img border="0" src="/images/facebook-icon.png" alt="Share on Facebook">
                                                </a>
                                                <a title="Share on Twitter" href="javascript:;" onclick="share_twitter();">
                                                    <img border="0" src="/images/twitter.png" width='20' height='20' alt="Share on Twitter">
                                                </a></span>                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class='key'>Số lượng</td>
                                    <td>
                                        <input id='quantity' name='quantity' type="text" maxlength="100" size="35" value="" class="inputbox"/></br> 
                                        <span id="ERRquantity" class="box_erro_area"></span>					</td>
                                </tr>

                                <tr>
                                    <td class='key'>Đơn giá</td>
                                    <td>
                                        <?php foreach ($order as $food): ?>
                                            <input type='text'  disabled value='<?= $food['PRICE'] ?>' size="35" style="background:#FFFFCC" />
<?php endforeach ?>							
                                    </td>
                                </tr>

                                <tr>
                                    <td class='key'>Giờ giao</td>
                                    <td>
                                        <input type='text' id='delivery_time'  name='delivery_time' value='' size="35"/><br />	
                                        <span id="ERRdelivery_time" class="box_erro_area"></span>					
                                    </td>
                                </tr>

                                <tr>
                                    <td class='key'>Địa chỉ giao hàng</td>
                                    <td>
                                        <?php foreach ($user as $data): ?>
                                            <input type='text' id='delivery_address'  disabled name='delivery_address' value='<?= $data['ADDRESS'] ?>-<?= $data['DISTRICT'] ?>'  style="background:#FFFFCC" size="35"/>
<?php endforeach ?>							
                                    </td>
                                </tr>

                                <tr>
                                    <td class='key'>Số điện thoại liên hệ</td>
                                    <td>
                                        <?php foreach ($user as $data): ?>
                                            <input type='text' id='phone'   disabled name='phone' value='<?= $data['PHONE'] ?>' style="background:#FFFFCC" size="35"/>
<?php endforeach ?>							
                                    </td>
                                </tr>


                                <tr>
                                    <td height="57" class='key'>Ghi chú</td>
                                    <td>
                                        <textarea  id='notes' name='notes' style="width: 225px; height: 45px;"></textarea>					</td>
                                </tr>
                            </table>
                            <input type='button' onclick="SaveButtonClick();" class='input_button' value='Đặt hàng'/>
                            <?php foreach ($user as $id): ?>
                                <input type='hidden' id='id_u' name='id_u' value='<?= $id['ID_U'] ?>'/>
                            <?php endforeach ?>

                            <?php foreach ($order as $id): ?>
                                <input type='hidden' id='id_food' name='id_food' value='<?= $id['ID'] ?>'/>
                        <?php endforeach ?>
                        </fieldset>
                        <?php foreach ($order as $food): ?>
                            <input type='hidden' id='price' name='price' value='<?= $food['PRICE'] ?>' size="35" style="background:#FFFFCC" />
<?php endforeach ?>							
                    </form>
                </BODY>
                </HTML>
                <script>
	

                    function SaveButtonClick()
                    {
                        var err_quantity=document.getElementById("ERRquantity");
                        var err_delivery=document.getElementById("ERRdelivery_time");
							   			
                        err_quantity.innerHTML="";
                        err_delivery.innerHTML="";
							   
                        var err = true;
                        err = err & validateInput("req",document.frm.quantity,"Bạn chưa nhập số lượng hàng");
                        err = err & validateInput("req",document.frm.delivery_time,"Bạn chưa nhập thời gian giao");
                        //parent.Shadowbox.close();
                        if(err == true)
                        {  
                            document.frm.submit();
										
                        }
                    }

                </script>

