<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta content="text/html; charset=utf-8">      
        <script type="text/javascript" src="/js/jquery-chat.js"></script>
        <script type="text/javascript" src="/js/chat.js"></script>
        <script type="text/javascript" src="/js/shadowbox.js"></script>    
		<script type="text/javascript">Shadowbox.init();</script>
		 <link rel="stylesheet" type="text/css" href="/css/shadowbox.css">
		 <script type="text/javascript" src="/js/order.js"></script>   
		 <script type="text/javascript" src="/js/jquery.min.js"></script>   
        <link rel="stylesheet" type="text/css" href="/css/general.css">
        <!--
        <link type="text/css" rel="stylesheet" media="all" href="/css/chat.css" />
        <link type="text/css" rel="stylesheet" media="all" href="/css/screen.css" />
        <link type="text/css" rel="stylesheet" media="all" href="/css/screen_ie.css" />
        -->
        <link type="text/css" rel="stylesheet" media="all" href="/css/chat.css" />
        <style>
		
		#wrapper{
		width: 500px;
		margin: 0 auto;
		}
		
		.des{
		--background: #fff;
		background:url('../images/bg_subtle_dots.png');
		height:auto;
		padding-left:5px;
		}

		.related{
		--background: #fff;
		background:url('../images/bg_subtle_dots.png');
		padding-left:15px;
		}

		.boxholder{
		clear: both;
		padding: 5px;
		background: #8DC70A;
		height:auto;
		}
		.ProductOverlay{
		background:url('../images/overlay.png');
		}
		.tab{
		float: left;
		height: 32px;
		width: 175px;
		margin: 0 1px 0 0;
		text-align: center;
		background: #8DC70A url(../images/greentab.jpg) no-repeat;
		}

		.tabtxt{
		margin: 0;
		color: #fff;
		font-size: 12px;
		font-weight: bold;
		padding: 9px 0 0 0;
		}

		th{
		padding: 5px 0px 5px 15px; 
        color: rgb(139, 134, 133); 
        font-size: 15px; 
        font-weight: normal; 
        width: 145px; 
        text-align: left;            
        }	
            
        #comment{
         width:95%;
         height:100%;
         left: 15px;
         position: absolute;
         z-index: 3000;
         display: none;
         }

         table{
         width: 100%;
         margin-bottom: 0px;            
         }

          td{
          padding: 5px 0px; 
		  color: rgb(139, 134, 133); 
		  font-size: 12px; 
		  font-weight: bold; 
		  text-align: left;
          }

          #goods_spec{
            color: rgb(51, 51, 51); 
            font-family:!important;  
            font-size: 12px; 
            font-style: normal; 
            font-variant: normal; 
            font-weight: normal; 
            letter-spacing: normal; 
            line-height: normal; 
            orphans: auto; 
            text-align: start;
            text-indent: 0px;
            text-transform: none; 
            white-space: normal; 
            widows: auto; 
            word-spacing: 0px; 
            -webkit-text-stroke-width: 0px; 
             width: 372.390625px; 
             float: left;
            }

            #product_image{
              color: rgb(51, 51, 51); 
              font-family: dotum; 
              font-size: 12px; 
              font-style: normal;
              font-variant: normal;
              font-weight: normal; 
              letter-spacing: normal; 
              line-height: normal; 
              orphans: auto; 
              text-align: start; 
              text-indent: 0px; 
              text-transform: none; 
              white-space: normal; 
              widows: auto; 
              word-spacing: 0px; 
              -webkit-text-stroke-width: 0px; 
              width: 342px; 
              float: left; 
              padding-left: 20px;
            }

            #th_price{
             padding: 9px 0px 9px 15px; 
             color: rgb(139, 134, 133); 
             font-size: 12px; 
             font-weight: normal; 
             width: 125px; 
             text-align: left; 
             background-color: rgb(246, 246, 246); 
             background-position: initial initial; 
             background-repeat: initial initial;
            }

			th{
			color:black;
			}

            #td_price{
             padding: 9px 0px; color: rgb(52, 52, 52); 
             font-size: 15px; 
             font-weight: bold; 
             text-align: left; 
             background-color: rgb(246, 246, 246); 
             background-position: initial initial; 
             background-repeat: initial initial;
            }

            #product_name{
               padding: 14px 0px 14px 5px; 
               border-bottom-width: 2px; 
               border-bottom-style: solid; 
               border-bottom-color: rgb(52, 52, 52);
            }
			
			a, a:visited, a:hover, a:active {
			color: #FFFFFF;
			text-decoration: none;
			}
        </style>
    </head>
    <?php foreach ($product as $key): ?>
    
    <body class='' id="BodyMain" onload="<?php echo $onload ?>">      
            <div style="width:73%;margin-top:315px;margin-left:191px;">
                <div style="margin:20px auto 0px auto">
                    <div style="width:45%;float:left;padding-left:20px;">
                        <table width="320" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td align="left">
                                        <div style="padding-bottom:10">
                                            <span  style="cursor:pointer">
                                                <img src="/<?= $key['image'] ?>" width="300" id="objImg" onerror="this.src='/shop/data/skin/season3_ori_C/img/common/noimg_300.gif'">
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom:10;text-align:left;">
                                        <a rel="shadowbox[miss]"  href='/<?= $key['image'] ?>' title='<?= $key['name'] ?>'> <img src="/images/zoom_SH.png" style="cursor:pointer" align="absmiddle"></a> 
                                    </td>
                                </tr>
                            </tbody></table>
                    </div>
                    <div style="display:none;background: #ffffff;position:absolute;margin-right:200px" id=groupcontent<?= $key['id'] ?> class="project"></div>
                    <!--
                    <div id="comment">
                        <iframe width="100%" height="100%" src="/index.php/comment/view/<?=$key['id']?>/1"></iframe>
                    </div>
                    -->
                    <div id="goods_spec" style="width:49%;float:left;">
                        <form name="frmView" method="post" onsubmit="return false">
                            <input type="hidden" name="mode" value="addItem">
                            <input type="hidden" name="goodsno" value="6871">
                            <input type="hidden" name="goodsCoupon" value="0">
                            <input type="hidden" name="preview" value="y">
                            <input type="hidden" name="totstock" value="29997">
                            <div style="padding:14px 0 14px 5px;border-bottom:2px solid #343434;" align="left">
                                <b style="font:bold;font-size: 18px; color:292625;">
                                    <?php echo $key['name'] ?>
                                </b>
                            </div>
                            <div style="padding:0 0 10px 5px;color:#666666"></div>
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tbody>

                                    <tr height="">
                                        <th>Giá</th>
                                        <td><?php echo number_format($key['price_out']); ?> VNĐ</td>
                                    </tr>
                                    <!--
                                       <tr height="">
                                        <th>Giá giảm cho thành viên</th>
                                        <td><?php echo $key['price_out'] ?> VND</td>
                                    </tr>
                                    
                                       <tr height="">
                                        <th>Giá bán</th>
                                        <td><?php echo $key['price_out'] ?> VND</td>
                                    </tr>
                                    -->
                                    <!--
                                        <tr height="">
                                            <th>Mã sản phẩm</th>
                                            <td>1164933</td>
                                        </tr>
                                    -->


                                    <tr>
                                        <th>Nơi xuất xứ </th>
                                        <td><?= $key['original'] ?></td>
                                    </tr>

                                    <tr>
                                        <th>Nhà sản xuất </th>
                                        <td><?= $manufacturer ?></td>
                                    </tr>
                                    <tr>
                                        <th>Thương hiệu </th>
                                        <td style="cursor:pointer;" onclick="window.location.href='#'">
                                            <?= $brand ?>
                                        </td>
                                    </tr>
									<div id="order_quantity_select" style="position: absolute;margin-right: -100px;margin-left: 285px;margin-top: 110px;display:none">
									<img src="/images/select_quantity.png">
									</div>
                                    <tr>
                                        <th>Chọn số lượng</th>
                                        <td>
                                            <select name="order_quantity" id="order_quantity">
                                                <option value=""> - Chọn số lượng - </option>
												<?php
                                                for ($int = 1; $int <= $key['quantity']; $int++) {
                                                    echo "<option  value=$int>$int</option>";
                                                }
                                                ?>
												
                                            </select>
                                        </td>
                                    </tr>

                                <input type="hidden" name="ea" value="1">
                                </tbody></table>

                            <!--
                            <table border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                <tr>
                                    <th valign="top">Màu </th>
                                    <td>
                                            <div>
                                               <select name="opt[]" onchange="chkOption(this);chkOptimg();nsGodo_MultiOption.set();" required="" msgr="color">
                                                    <option value="">---</option>
                                                            <option value="mint">nguyên do 	</option>
                                                            <option value="품절-cream">Ra-kem 	</option>
                                                            <option value="pink">màu hồng 	</option>
                                                            </select>
                                                    </div>
                                    </td>
                                    </tr>
                            </tbody></table>
                            -->
                            <table style="clear:both" border="0" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                        <th>Chia sẻ mạng xã hội</th>
                                        <td>
                                            <!-- twriter --><a href="http://twitter.com/home?status=" target="_blank"><img src="/images/icon_t3.gif"></a>
                                            <!-- facebook --><a href="http://www.facebook.com/sharer.php?u=" target="_blank"><img src="/images/icon_f3.gif"></a>
                                        </td>
                                    </tr>
                                </tbody></table>

                            <table style="clear:both" border="0" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                        <th>Chat với nhân viên sale</th>
                                        <td>
                                            <a href="javascript:void(0)" onClick="javascript:chatWith('sale');">
                                                <span onclick="chat(<?= $username ?>)" style="cursor:pointer">
                                                    <img src="/images/chat_<?php if ($online == 0) echo 'off'; if ($online == 1) echo 'on'; ?>line.png"/>
                                                </span>
                                            </a>	
                                            <script>
                                                function chat(id)
                                                {
                                                    if(id==1){
                                                        alert("Bạn chưa đăng nhập hoặc đăng ký tài khoản, vui lòng trỏ chuột vào menu thành viên để đăng ký.");
                                                        if(confirm)
                                                        {
                                                            window.location.href='/';
                                                        }
                                                    }
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                </tbody></table>
<a name="order_quantity_check">
                            <div style="position:relative;width:500px;padding-top:5px;margin-top:5px;">
                                <!-- đặt hàng --> <a  onclick="check_out('<?php if($is_post==1) 
			                     echo "/order/checkout?quantity=1&re=1&id_product=".$key['id']."";
			                     if($is_post==0) 
				                echo "/order/input_order_line?redirect=checkout&quantity=1&md5_time=".$md5_time."&id_product=".$key['id']."" ?>',<?=$is_post?>,<?=$key['id']?>,'order');" href="#"><img src="/images/detail_btn01.png"></a>
                                <!-- giỏ hàng --><a onclick="check_out('<?php if($is_post==1) 
			                     echo "/cart?re=1&id_product=".$key['id']."";
			                     if($is_post==0) 
				                echo "/order/input_order_line?redirect=cart&md5_time=".$md5_time."&id_product=".$key['id']."" ?>',<?=$is_post?>,<?=$key['id']?>,'cart');"  href="#"><img src="/images/detail_btn02.png"></a>
                                <!-- danh sách mặt hàng yêu thích --><a href="javascript:act('goods_cart')"><img src="/images/detail_btn03.png"></a>
                            </div>								
                        </form>
                    </div>
                </div>

                <p>
                <table style="clear:both" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
					<tr>
                            <td style="padding-top:15px;">	
<div id="content" style="width:100%;padding:10 10 10 10;overflow:hidden;">
									<h3 class="tab" title="first"><div class="tabtxt"><a id="a1">Mô tả sản phẩm</a></div></h3>
	<div class="tab"><h3 class="tabtxt" title="second"><a id="a2"><span onclick='loadDivFromUrl("relation_product","/index.php/product/related/<?=$key['id']?>/",1);'>Sản phẩm liên quan</span></a></h3></div>
	<div class="tab"><h3 class="tabtxt" title="second"><a onclick="SwapDiv(<?= $key['id'] ?>,'/comment/view/<?= $key['id'] ?>/1',1)" id="a3">Bình luận</a></h3></div>
	<div class="boxholder">
		<div class="des">
			<p><?=$key['description']?></p>
		</div>
		<div class="related" id="relation_product"></div>
	</div>
</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </p>
        </div>
    </body>
<?php endforeach; ?>
</html>
<?php $this->load->view('footer'); ?>
<script>
    function SwapDiv(id,url,tab){
		var check=<?=$check?>;
		switch(check)
		{
			case 0:
			alert('Bạn cần đăng nhập để bình luận');
			document.getElementById('login').style.display='';
			break;
			case 1:
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
            document.getElementById("groupicon"+tab+"_"+id).className = "groupicon";
        }
		else{
            document.getElementById("groupcontent"+id).style.display="";
            document.getElementById("groupcontent"+id).innerHTML="<div style='position:absolute;margin-left:575px;margin-top: 400px;height:100%'><img src='/images/ajax-loader.gif' border='0'></img></div>";
            loadDivFromUrl("groupcontent"+id,url,1);
			}
		}			
}

	$(document).ready(function(){
	
	$('.related').hide();
	});

	$('#a3').click(function(){
	$('#BodyMain').css("background","url('../images/overlay.png')");	
	});

	$('#a2').click(function(){
		$('.related').show(500);
		$('.des').hide(500);
	});

	$('#a1').click(function(){
		$('.related').hide(500);
		$('.des').show(500);
	});
</script>