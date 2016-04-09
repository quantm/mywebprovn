<?php
require_once 'application/models/user_model.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title><?= $title ?></title>
        <meta lang="vn" charset="UTF-8" name="Generator" content="EditPlus"/>
        <link rel="stylesheet" type="text/css" href="/css/general.css" />
        <link rel="stylesheet" href="/css/multizoom.css" type="text/css" />
        <script type="text/javascript" src="/js/AjaxEngine.js"></script>
        <script type="text/javascript" src="/js/validate.js"></script>
        <script type="text/javascript" src="/js/common.js"></script>
        <script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script>
        <script src="/js/jquery-1.8.2.js"></script>
        <script src="/js/jquery-ui.js"></script>
        <script type="text/javascript" src="/js/multizoom.js">
            // Featured Image Zoomer (w/ optional multizoom and adjustable power)- By Dynamic Drive DHTML code library (www.dynamicdrive.com)
            // Multi-Zoom code (c)2012 John Davenport Scheuer
            // as first seen in http://www.dynamicdrive.com/forums/
            // username: jscheuer1 - This Notice Must Remain for Legal Use
            // Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more

        </script>

        <script type="text/javascript">

            jQuery(document).ready(function($){
<?php foreach ($detail as $pro): ?>
            $('#<?= $pro['id'] ?>').addimagezoom({ // single image zoom
                zoomrange: [3, 10],
                magnifiersize: [500,300],
                magnifierpos: 'right',
                cursorshade: true,
                largeimage: '/<?= $pro['image'] ?>' //<-- No comma after last option!
            })
<?php endforeach; ?>
    })

        </script>
        <?= $order_panel ?>
    </head>


    <body>
        <form id="frm" method="post" name="frm" action="">
            <div id="order" style="position: absolute;
                 width: 520px;
                 height: 305px;
                 left:432px;
                 top: 365px;
                 border: 1px none #000000;
                 background-color: rgb(255,255,255);
                 layer-background-color: rgb(255,255,255);
                 z-index:1;display:none">
            </div>
            <div style="position:absolute;height:auto;width:100%;background-color: rgb(255,255,255);">
                <div id="comment" style="position: absolute; width: 915px; height:auto; left: 234px; top: 756px; z-index: 1;">
                    <fieldset>
                        <legend><font color="#FFFFFF" size="+2" style="font-weight:bold">Nhận xét sản phẩm</font></legend>
                        <table style="color:#FFF;padding:15px;width:775px;">
                            <tr style="text-transform:uppercase;font-weight:bold;">
                                <td>Tên</td>
                                <td>Nội dung </td>
                                <td>Ngày gửi</td>
                            </tr>
                            <?php foreach ($comment as $com): ?>
                                <tr>
                                    <td width="17%"><?= $com['commenter'] ?></td>
                                    <td width="63%"><?= $com['content'] ?></td>
                                    <td width="20%"><?= $com['date_comment'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <br>
                            <tr>
                                <td>Tên của bạn</td>
                                <td colspan="2">
                                    <textarea  style="width: 599px; height: 14px;"  id="commenter" name="commenter"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Nội dung nhận xét</td>
                                <td colspan="2">
                                    <textarea  style="width: 599px; height: 42px;"  id="binhluan" name="binhluan"></textarea>
                                    <input type="hidden" id="temp"/>
                                </td>
                            </tr
                            <tr>
                                <td colspan="3"><span id="announce_comment"></span></td>
                            </tr>
                            <tr>
                                <td colspan="3"><input type="button"  onClick="send_comment(<?= $id_product ?>);"   value="Gửi nhận xét" class="input_button"></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
            </div>
            <div id="main" style=" 
                 position: absolute; 
                 background: rgb(27,188,47);
                 width:954px;
                 height:<?= $height ?>px; 
                 left: 200px;
                 top:295px;">
            </div>
            <?php foreach ($detail as $key): ?>
                <div style="position: absolute; left: 234px; top: 678px; z-index: 1">
                    <a href="http://www.facebook.com/share.php?u=http://khanlen.vn/product/detail/<?= $key['id'] ?>"><img src="../../../images/Transparent-Facebook-Logo-Icon.png" width="30" height="30"></a><a href="http://twitter.com/home?status=http://khanlen.vn/product/detail/<?= $key['id'] ?>"><img src="../../../images/twitter_icon4.jpg" width="30" height="30"> </a>
                    <!-- Place this tag where you want the +1 button to render. -->
                    <div class="g-plusone" data-annotation="none"></div>

                    <!-- Place this tag after the last +1 button tag. -->
                    <script type="text/javascript">
                        (function() {
                            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                            po.src = 'https://apis.google.com/js/plusone.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                        })();
                    </script>
                    <img src="../../../images/mail.png" width="30" height="30">
                </div>
            <?php endforeach; ?>
            <div id="product_detail">
                <?php foreach ($detail as $val): ?>
                    <div id="des"><span style="text-transform:uppercase;color:#FFF">Tên sản phẩm :<?= $val['name'] ?></span><br><br><span style="color:#FFF"><?= $val['description'] ?></span></div>
                    
                    <div id="price"> 
                        Giá:<div style="text-transform:uppercase;font-weight: bold;position: absolute;margin-right: 120px;right:-115px"><h3><?= $val['price'] ?> <?= $val['type_price'] ?></h3></div>
                    </div>
                    <div  id=groupicon1_<?= $val['id'] ?> class='thumb'>
                        <img  onclick="document.getElementById('id_image').value=<?= $val['id'] ?>" id="<?= $val['id'] ?>" width="200" height="300"   src="/<?php echo $val['image']; ?>" />	<br/>
                        <br/>
                        </a>
                    </div>
                    <div id="zoom-tip" style="left: 208px;position: absolute;top: 290px;width: 300px;z-index: 1;color:#ffffff">
                        Rê chuột vào hình sản phẩm để phóng to hình
                    </div> 
                    <div style="position: absolute; background: #FFF; border: #FFF medium; width: 125px; height: 47px; left: 735px; top: 105px;z-index:1">
                        <a onclick="loadDivFromUrl('order','/order/getOrderData?id_product=<?= $val['id'] ?>','1')"><img title="Click để đặt hàng" src="../../../images/cart.png" width="178" height="53"/></a></div>
                    <input type=hidden id=id_product value="<?= $val['id'] ?>">
                    <div id="reg_log" style="display:none">
                        Bạn cần đăng nhập hoặc đăng ký tài khoản để <span id="thanhtoan"></span><br><br>
                        <input type="button" class="input_button" onclick="document.getElementById('dispatch').value='1';document.getElementById('product').value='<?= $val['id'] ?>';document.getElementById('login').style.display='';document.getElementById('reg_log').style.display='none';"  value="Đăng nhập">
                        <input type="button" class="input_button" onclick="document.getElementById('register').style.display='';document.getElementById('reg_log').style.display='none';" value="Đăng ký">
                    </div>
                <?php endforeach; ?>
            </div>
            <div style="position: absolute; background: rgb(240,240,240); border: #FFF medium; width: 165px; height: 49px; left: 969px; top: 537px; z-index: 1">Quí khách có thể gọi số<br><img src="../../../images/tele_cart.png"/><font color="#FFCC33">(08) 6 288 5678</font>để đặt hàng</div>
            <div id="order"></div>
            <div id="popupmonan" style="display:none">
                <div class="popupimg"><img onclick="closePopup()" src="/images/xoa.jpg" alt="close popup"></div> 
                <h2 class="hoakhai">khanlen.vn</h2>
                <iframe id="iframecontentpopup" src="/order/checkout/" frameborder="0"> </iframe>

            </div>
            <div style="width:400px;right:715px;position:absolute;top:<?= $footer_height ?>px;"><font color="#FFFFFF">Copyright @ Zing<br>Đơn vị chủ quản: CÔNG TY CHỦ QUẢN VNG<br>Giấy phép MXH	số 01-GXN-TTDT</font></div>
        </form>
        
    </body>
</html>

<script type="text/javascript">
    function popupMonan(){
        jQuery('#popupmonan').css('display','block');
    }
    function closePopup()
    {
        jQuery('#popupmonan').css('display','none');
        if(jQuery('#iframecontentpopup').contents().find('#view_giohang').val()=='giaohang' || jQuery('#iframecontentpopup').contents().find('#success-order').val()=='ok'){
            window.location.href=window.location.href;
        }
    }

    
    function check()
    {
        var url="/product/comment/";
        var type_request="POST";
        sendRequestToServer(url,type_request,success);
    }
    function success(msg)
    {
        if(msg==0)
        {
            document.getElementById('reg_log').style.display="";
            document.getElementById('thanhtoan').innerHTML="bình luận";
        }
    }
    function instance_order()
    {
        /*
        var url="/product/check_order_user_login_stat/";
        var type_request="POST";
        sendRequestToServer(url,type_request,order_stat);
         */
        loadDivFromUrl('order','/order/getOrderData?id_product=<?= $id_product ?>','1');
    }
    function check_out()
    {
        /*
        var url="/product/check_order_user_login_stat/";
        var type_request="POST";
        sendRequestToServer(url,type_request,thongbao);
                document.frm.action="/product/checkout/";
                document.frm.submit();
         */
        var type_request='POST';
        var url='/product/checkout_finished/<?= $encrypt ?>/';
        sendRequestToServer(url,type_request,ret);
    }
	
    function ret(msg)
    {
        if(msg == 1)
        {
            window.location.href='/order/u_checkout/';
        }
        if(msg == 0)
        {
            popupMonan();
        }
    }

    function order_stat(msg)
    {
        if(msg == 0)
        {
            var id=document.getElementById('id_product').value;
            var url="/order/index/"+id;
            var type_request="POST";
            sendRequestToServer(url,type_request,thongbao);
            document.getElementById('reg_log').style.display="";
            document.getElementById('thanhtoan').innerHTML="mua hàng";
        }
        if(msg == 1)
        {
            loadDivFromUrl('order','/order/getOrderData?id_product=<?= $id_product ?>','1');
        }

    }

    function send_comment(id)
    {
        /*
                var comment=document.getElementById('temp').value;
                loadDivFromUrl('comment','/product/write_comment/'+id+'/'+comment,1);
         */
        var type_request="POST";
        var comment=document.getElementById('binhluan').value;
        var commenter=document.getElementById('commenter').value;
        var url='/product/write_comment/'+id+'/'+comment+'/'+commenter;
        sendRequestToServer(url,type_request,thongbao);
    }

    function thongbao(msg)
    {
        if(msg == 0)
        {
            document.getElementById('reg_log').style.display="";
            document.getElementById('thanhtoan').innerHTML="thanh toán";
        }
        if(msg == 1)
        {
            document.frm.action="/product/checkout/";
            document.frm.submit();
        }

        if(msg == 2)
        {
            document.getElementById('announce_comment').innerHTML="<font color=#660000>bình luận của bạn đã được ghi nhận tuy nhiên chúng tôi cần phải kiểm duyệt nội dung bình luận của bạn mới được hiển thị</font>";
        }

    }


</script>