<?php
require_once 'application/models/home_menu_model.php';
$date = getdate();
$date_order = $date['wday'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="/js/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="/js/divbox.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/divbox.css" media="screen" />
        <script type="text/javascript">
            $(document).ready(function(){
                $('a.lightbox').divbox({caption: false});
                $('a.lightbox2').divbox({caption: false,skin: 'divbox_facebook', width: 100, height: 100});
                $('a.iframe').divbox({ width: 200, height: 200 , caption: false});
                $('a.ajax').divbox({ type: 'ajax', width: 200, height: 200 , caption: false,api:{
                        afterLoad: function(o){ 
                            $(o).find('a.close').click(function(){
                                o.closed();
                                return false;
                            });
			
                            $(o).find('a.resize').click(function(){
                                o.resize(200,50);
                                return false;
                            });
                        }
                    }});
            });
        </script>	
        <script type="text/javascript" src="/js/Ajax/AjaxEngine.js"></script>
        <script type="text/javascript" src="/js/boxover.js"></script>

        <link href="/css/general.css" rel="Stylesheet">
            <style type="text/css">
                <!--
                .style1 {
                    font-size: 20px;
                    color: #0000FF;
                }
                .style3 {font-size: 18px; color: #CCCCCC; }
                -->
				
	.product {
	background-image:url(../../images/wood_background_home_page.jpg);
	border: solid 1px #d5d5d5;
	width: 95%;
	border-collapse: collapse;
	margin: 8px 0 10px 0;
	margin-bottom: 15px;
	width: 95%;
}
            </style>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('a.lightbox').divbox({caption: false});
                    $('a.lightbox2').divbox({caption: false,skin: 'divbox_facebook', width: 100, height: 100});
                    $('a.iframe').divbox({ width: 200, height: 200 , caption: false});
                    $('a.ajax').divbox({ type: 'ajax', width: 200, height: 200 , caption: false,api:{
                            afterLoad: function(o){ 
                                $(o).find('a.close').click(function(){
                                    o.closed();
                                    return false;
                                });
			
                                $(o).find('a.resize').click(function(){
                                    o.resize(200,50);
                                    return false;
                                });
                            }
                        }});
                });
            </script>
    </head>

    <body onload="update_date(<?= $date_order ?>);">
        <form name="frmHome" id="frmHome" action="" method="post">
            <center>
                <fieldset>
                    <legend><span class="style3">Thực đơn hàng tuần, áp dụng từ ngày <font color=red><?=$date_applied?></font></span></legend>
                    <table class="product">                      
                        <tr>
                            <td colspan="5"><div align="left"></div></td>
                        </tr>
                        <tr>
                            <td class='day'>Thứ hai</td>
                            <td class='day'>Thứ ba</td>
                            <td class='day'>Thứ tư</td>
                            <td class='day'>Thứ năm</td>
                            <td class='day'>Thứ sáu</td>
                        </tr>
                        <tr>
                            <?php
                            if ($menu_com_2 == null || $c22 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a	href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {
                                foreach ($menu_com_2 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr>
                                               <tr><td>Click để xem hình lớn</td></tr></table>]"' href="<?php echo $row['IMAGE'] ?>"> 	
                                                  <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>
                                            <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        </div>

                                        <div style="position:absolute;margin-top:-49px;margin-left:2px;"><img src="../../images/logo_home_transparent.png"/></div>

										<div style="position:absolute;margin-top:-49px;margin-left:245px;"><img src="../../images/logo_home_transparent.png"/></div>

										<div style="position:absolute;margin-top:-49px;margin-left:483px;"><img src="../../images/logo_home_transparent.png"/></div>

										<div style="position:absolute;margin-top:-49px;margin-left:725px;"><img src="../../images/logo_home_transparent.png"/></div>

										<div style="position:absolute;margin-top:-49px;margin-left:965px;"><img src="../../images/logo_home_transparent.png"/></div>

										
                                        <div style="position:absolute;margin-top:130px;margin-left:2px;"><img src="../../images/logo_home_transparent.png"/></div>

										<div style="position:absolute;margin-top:130px;margin-left:245px;"><img src="../../images/logo_home_transparent.png"/></div>

										<div style="position:absolute;margin-top:130px;margin-left:483px;"><img src="../../images/logo_home_transparent.png"/></div>

										<div style="position:absolute;margin-top:130px;margin-left:725px;"><img src="../../images/logo_home_transparent.png"/></div>

										<div style="position:absolute;margin-top:130px;margin-left:965px;"><img src="../../images/logo_home_transparent.png"/></div>

                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ <span id='order1' onmouseover="document.getElementById('order1').style.textDecoration='blink'"  onmouseout="document.getElementById('order1').style.textDecoration='none'" onclick='check_date_order(1);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class="lightbox">
										<!-- div tooltip -->										<!--onmouseover="showToolTip(event,'<?php echo $row['NAME']; echo "<br/>"; echo "Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng" ?>')" onmouseout="hideToolTip()"-->
										<div 
										style='position:absolute;margin-top:-45px;left:260px'><img class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span></div>
                                    </td>
                                    <?php
                                }
                            }
                            ?>

                            <?php
                            if ($menu_com_3 == null || $c23 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'  href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {
                                foreach ($menu_com_3 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"' href="<?php echo $row['IMAGE'] ?>"> 	
                                                  <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ </div><span id='order2' onmouseover="document.getElementById('order2').style.textDecoration='blink'"  onmouseout="document.getElementById('order2').style.textDecoration='none'" onclick='check_date_order(2);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'>
										<div onclick='check_date_order(2);' style='position:absolute;margin-top:-45px;left:497px'>
										<img  class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"'
										onmouseover="init(this);rattleimage();" 
                                        onmouseout="stoprattle(this);top.focus();"
                                        src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span
                                        ></td>
                                    <?php
                                }
                            }
                            ?>

                            <?php
                            if ($menu_com_4 == null || $c24 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {


                                foreach ($menu_com_4 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"'  href="<?php echo $row['IMAGE'] ?>"> 	
                                                  <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order3' onmouseover="document.getElementById('order3').style.textDecoration='blink'"  onmouseout="document.getElementById('order3').style.textDecoration='none'" onclick='check_date_order(3);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'>
										<div onclick='check_date_order(3);' style='position:absolute;margin-top:-45px;left:737px'>
										<img class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span
                                        ></td>
                                    <?php
                                }
                            }
                            ?>

                            <?php
                            if ($menu_com_5 == null || $c25 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {
                                foreach ($menu_com_5 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"'  href="<?php echo $row['IMAGE'] ?>"> 	
                                                  <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order4' onmouseover="document.getElementById('order4').style.textDecoration='blink'"  onmouseout="document.getElementById('order4').style.textDecoration='none'" onclick='check_date_order(4);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'><div onclick='check_date_order(4);' style='position:absolute;margin-top:-45px;left:978px'>
										<img 
										class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span
                                        ></td>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            if ($menu_com_6 == null || $c26 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {


                                foreach ($menu_com_6 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a class='lightbox' href="<?php echo $row['IMAGE'] ?>"> 	
                                                  <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order5' onmouseover="document.getElementById('order5').style.textDecoration='blink'"  onmouseout="document.getElementById('order5').style.textDecoration='none'" onclick='check_date_order(5);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'>
										<div onclick='check_date_order(5);' 
										style='position:absolute;margin-top:-45px;left:1215px'>
										<img class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span
                                        ></td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>

                        <tr>
                            <?php
                            if ($menu_soi_2 == null || $s22 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {


                                foreach ($menu_soi_2 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"'  href="<?php echo $row['IMAGE'] ?>"> 	
                                                   <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order6' onmouseover="document.getElementById('order6').style.textDecoration='blink'"  onmouseout="document.getElementById('order6').style.textDecoration='none'" onclick='check_date_order(1);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'>
										<div 
										style='position:absolute;margin-top:-45px;left:260px'>
										<img class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span
                                        ></td>
                                    <?php
                                }
                            }
                            ?>

                            <?php
                            if ($menu_soi_3 == null || $s23 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {
                                foreach ($menu_soi_3 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"'  href="<?php echo $row['IMAGE'] ?>"> 	
                                                   <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order7' onmouseover="document.getElementById('order7').style.textDecoration='blink'"  onmouseout="document.getElementById('order7').style.textDecoration='none'" onclick='check_date_order(2);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'>
										<div 
										style='position:absolute;margin-top:-45px;left:497px'>
										<img class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span
                                        ></td>
                                    <?php
                                }
                            }
                            ?>

                            <?php
                            if ($menu_soi_4 == null || $s24 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {
                                foreach ($menu_soi_4 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"'  href="<?php echo $row['IMAGE'] ?>"> 	
                                                   <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order8' onmouseover="document.getElementById('order8').style.textDecoration='blink'"  onmouseout="document.getElementById('order8').style.textDecoration='none'" onclick='check_date_order(3);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'><div 
										style='position:absolute;margin-top:-45px;left:737px'>
										<img 
										class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span
                                        ></td>
                                    <?php
                                }
                            }
                            ?>

                            <?php
                            if ($menu_soi_5 == null || $s25 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {
                                foreach ($menu_soi_5 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"'  href="<?php echo $row['IMAGE'] ?>"> 	
                                                   <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order9' onmouseover="document.getElementById('order9').style.textDecoration='blink'"  onmouseout="document.getElementById('order9').style.textDecoration='none'" onclick='check_date_order(4);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'>
										<div 
										style='position:absolute;margin-top:-45px;left:978px'>
										<img class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span
                                        ></td>
                                    <?php
                                }
                            }
                            ?>


                            <?php
                            if ($menu_soi_6 == null || $s26 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {
                                foreach ($menu_soi_6 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"'  href="<?php echo $row['IMAGE'] ?>"> 	
                                                   <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order10' onmouseover="document.getElementById('order10').style.textDecoration='blink'"  onmouseout="document.getElementById('order10').style.textDecoration='none'" onclick='check_date_order(5);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'>
										<div 
										style='position:absolute;margin-top:-45px;left:1215px'>
										<img 
										class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span 
                                        ></td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
						

						<!-- dòng mì ý  -->
						 <tr>
                            <?php
                            if ($menu_spagetti_2 == null || $spagetti22 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {


                                foreach ($menu_spagetti_2 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"'  href="<?php echo $row['IMAGE'] ?>"> 	
                                                <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order6' onmouseover="document.getElementById('order6').style.textDecoration='blink'"  onmouseout="document.getElementById('order6').style.textDecoration='none'" onclick='check_date_order(1);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'>
										<div 
										style='position:absolute;margin-top:-45px;left:260px'>
										<img class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span
                                        ></td>
                                    <?php
                                }
                            }
                            ?>

                            <?php
                            if ($menu_spagetti_3 == null || $spagetti23 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {
                                foreach ($menu_spagetti_3 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"'  href="<?php echo $row['IMAGE'] ?>"> 	
                                                   <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order7' onmouseover="document.getElementById('order7').style.textDecoration='blink'"  onmouseout="document.getElementById('order7').style.textDecoration='none'" onclick='check_date_order(2);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'>
										<div 
										style='position:absolute;margin-top:-45px;left:497px'>
										<img class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span
                                        ></td>
                                    <?php
                                }
                            }
                            ?>

                            <?php
                            if ($menu_spagetti_4 == null || $spagetti24 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {
                                foreach ($menu_spagetti_4 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"'  href="<?php echo $row['IMAGE'] ?>"> 	
                                                   <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order8' onmouseover="document.getElementById('order8').style.textDecoration='blink'"  onmouseout="document.getElementById('order8').style.textDecoration='none'" onclick='check_date_order(3);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'><div 
										style='position:absolute;margin-top:-45px;left:737px'>
										<img 
										class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span
                                        ></td>
                                    <?php
                                }
                            }
                            ?>

                            <?php
                            if ($menu_spagetti_5 == null || $spagetti25 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {
                                foreach ($menu_spagetti_5 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"'  href="<?php echo $row['IMAGE'] ?>"> 	
                                                   <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order9' onmouseover="document.getElementById('order9').style.textDecoration='blink'"  onmouseout="document.getElementById('order9').style.textDecoration='none'" onclick='check_date_order(4);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'>
										<div 
										style='position:absolute;margin-top:-45px;left:978px'>
										<img class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span
                                        ></td>
                                    <?php
                                }
                            }
                            ?>


                            <?php
                            if ($menu_spagetti_6 == null || $spagetti26 == '0') {
                                ?>
                                <td>
                                    <div align="left">
                                        <a class='lightbox'href="/images/echaylogo_web4.png"> 	
                                            <img src="/images/echaylogo_web4.png" width='215px' height='145px'/>                                                </a>                                            </div>                                        </td>
                                <?php
                            } else {
                                foreach ($menu_spagetti_6 as $row) {
                                    ?>
                                    <td>
                                        <div align="left">
                                            <a  class='lightbox' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle><?php echo $row['NAME'] ?></span>] body=[<table><tr><td valign=top><img border=0 src=<?php echo $row['IMAGE'] ?> width=430 border=0></td></tr><tr><td>Mô tả:<font color=red><?= $row['DESCRIPTION'] ?></font> </td></tr><tr><td>Click để xem hình lớn</td></tr></table>]"'  href="<?php echo $row['IMAGE'] ?>"> 	
                                                   <img src="<?php if($row['IMAGE']!='') echo $row['IMAGE']; if($row['IMAGE']=='') echo '/images/echaylogo_web4-update.png'; ?>" width='215px' height='145px'/>                                                    </a>                                                </div>
                                        <div class='divname' align="left"><?php echo $row['NAME'] ?></div>
                                        <div align="left" class='price'>Giá: <?php echo $row['PRICE'] ?> VNĐ</div><span id='order10' onmouseover="document.getElementById('order10').style.textDecoration='blink'"  onmouseout="document.getElementById('order10').style.textDecoration='none'" onclick='check_date_order(5);'><b><font color='#00FF00' size='2px'><a href='/customer/order/<?= $row['ID'] ?>'  class='lightbox'>
										<div 
										style='position:absolute;margin-top:-45px;left:1215px'>
										<img 
										class="shakeimage" 
                                        	title='"cssbody=[dvbdy1] cssheader=[header_product] header=[<img src="../images/echaylogo_web5.png" width="120px" height="90px"></img><span class=toolTipTitle>Tên sản phẩm: <?php echo $row['NAME'] ?></span>] body=[<span>Quí khách hàng vui lòng click vào giỏ hàng để đặt hàng</span>]"' 
										onmouseover="init(this);rattleimage();" 
onmouseout="stoprattle(this);top.focus();"


  src='/images/shopping_cart.png' width='48px' height='48px'></img></div></a></font></b></span 
                                        ></td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
						<!-- kết thúc dòng mì ý -->
                    </table>
                </fieldset>	
            </center>
        </form>
    </body>
</html>

<script>
    function update_date(value)
    {
        var checkAjax = new AjaxEngine();
        var url="/func/update_date/"+value;
        var type_request = "GET";
        sendRequestToServer(url,type_request);                                 
    }
									
    function check_date(msg)
    {
        if(msg=='0')
        {
            alert('Bạn chọn thực đơn không phải  của ngày hôm nay');											
        }
    }
    function check_date_order(value)
    {
        var checkAjax = new AjaxEngine();
        var url="/func/check_date_order/"+value;
        var type_request = "GET";
        CheckDataOnServer(url,type_request,check_date); 
        check_date();
    }
										
</script>

<style type = "text/css">
        #bubble_tooltip{
		width:210px;
                position:absolute;
                display: none;
        }
        #bubble_tooltip .bubble_top{
                position:relative;
                background-image: url(/images/htooltip/bubble_top.gif);
                background-repeat:no-repeat;
                height:18px;
                }
        #bubble_tooltip .bubble_middle{
                position:relative;
                background-image: url(/images/htooltip/bubble_middle.gif);
                background-repeat: repeat-y;
                background-position: bottom left;
        }
        #bubble_tooltip .bubble_middle div{
		padding-left: 12px;
                padding-right: 20px;
                position:relative;
                font-size: 11px;
                font-family: arial, verdana, san-serif;
                text-decoration: none;
                color: red;	
		text-align:justify;	
        }
        #bubble_tooltip .bubble_bottom{
                background-image: url(/images/htooltip/bubble_bottom.gif);
                background-repeat:no-repeat;
                height:65px;
                position:relative;
                top: 0px;
        }
</style>
    
<!-- Script by hscripts.com -->


<script type="text/javascript">


//This is the text to be displayed on the tooltip.

if(document.images){
  pic1= new Image(); 
  pic1.src='/images/htooltip/bubble_top.gif'; 
  pic2= new Image();
  pic2.src='/images/htooltip/bubble_middle.gif'; 
  pic3= new Image(); 
  pic3.src='/images/htooltip/bubble_bottom.gif'; 
}

function showToolTip(e,text){
               if(document.all)e = event;
                var obj = document.getElementById('bubble_tooltip');
                var obj2 = document.getElementById('bubble_tooltip_content');
		obj2.innerHTML = text;
                obj.style.display = 'block';
                var st = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
                if(navigator.userAgent.toLowerCase().indexOf('safari')>=0)st=0; 
                var leftPos = e.clientX-2;
                if(leftPos<0)leftPos = 0;
                obj.style.left = leftPos + 'px';
                obj.style.top = e.clientY-obj.offsetHeight+2+st+ 'px';
        }       
        function hideToolTip()
        {
                document.getElementById('bubble_tooltip').style.display = 'none';
        }

</script>
<!-- Script by hscripts.com -->


<!-- Script by hscripts.com -->

<table id="bubble_tooltip" border=0 cellpadding=0 cellspacing=0>
        <tr class="bubble_top"><td></td></tr>
        <tr class="bubble_middle"><td><div id="bubble_tooltip_content"></div></td></tr>
        <tr class="bubble_bottom"><td colspan=5></td></tr>
</table>
<style>
.shakeimage{
position:relative
}
</style>
<script language="JavaScript1.2">

/*
Image Earthquake script (onMouseover)- 
© Dynamic Drive (www.dynamicdrive.com)
For full source code, usage terms, and 100's more DHTML scripts, visit http://dynamicdrive.com
*/

var stopit=0
var rector=3 
var a=1

function init(which){
stopit=0
shake=which
shake.style.left=0
shake.style.top=0
}

function rattleimage(){
if ((!document.all&&!document.getElementById)||stopit==1)
return
if (a==1){
shake.style.top=parseInt(shake.style.top)+rector
}
else if (a==2){
shake.style.left=parseInt(shake.style.left)+rector
}
else if (a==3){
shake.style.top=parseInt(shake.style.top)-rector
}
else{
shake.style.left=parseInt(shake.style.left)-rector
}
if (a<4)
a++
else
a=1
setTimeout("rattleimage()",50)
}

function stoprattle(which){
stopit=1
which.style.left=0
which.style.top=0
}

</script>