<?php
	include_once 'server/chat_include.php';
	require_once 'application/models/common_model.php';
	require_once 'application/models/autocomplete_model.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title><?= $title ?></title>
        <meta name="Generator" content="" charset='utf-8'>
        	<link type="text/css" rel="stylesheet" media="all" href="/css/chat.css" />
        <link rel="stylesheet" type="text/css" href="/css/admin.css" />
        <style type="text/css">
        #name_login {
	position: absolute;
	width:auto;
	height: 49px;
	z-index: 1;
	left:975px;
	top: 25px;
	color: rgb(255,255,255);
	font-weight: bold;
}
        </style>

    </head>
	<script type="text/javascript" src="/js/jquery-chat.js"></script>
	<script type="text/javascript" src="/js/chat.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="/js/ddsmoothmenu.js"></script>
<script type="text/javascript">
//<![CDATA[
ddsmoothmenu.init({
arrowimages: {down: ['downarrowclass', '/themes/admin_full/images/menu_down.png', 23], right: ['rightarrowclass', '/themes/admin_full/images/menu_right.png']},
mainmenuid: "smoothmenu1", //Menu DIV id
orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
classname: 'ddsmoothmenu', //class added to menu's outer DIV
//customtheme: ["#804000", "#482400"],
contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
// click hide menu
function clickHide(type){
if (type == 1){
$('td.colum_left_lage').hide({ direction: "horizontal" }, 500);
$('td.colum_left_small').show({ direction: "horizontal" }, 500);
nv_setCookie( 'colum_left_lage', '0', 86400000);
}
else {
if (type == 2){
$('td.colum_left_small').hide(0);
$('td.colum_left_lage').show({ direction: "horizontal" }, 500);
nv_setCookie( 'colum_left_lage', '1', 86400000);
}
}
}
// show or hide menu
function show_menu(){
var showmenu = ( nv_getCookie( 'colum_left_lage' ) ) ? ( nv_getCookie('colum_left_lage')) : '1';
if (showmenu == '1') {
$('td.colum_left_small').hide();
$('td.colum_left_lage').show();
}else {
$('td.colum_left_small').show();
$('td.colum_left_lage').hide();
}
}
//]]>
</script>

    <body>
        <div id="name_login">
        <?=$name_login?>
        </div>
        <div id="header">
            <div class="logo">
                <img width="240" height="50" src="/images/admin/logo.png"></a>
            </div>
            <div class="logout">
                <a  HREF="#" onclick="window.open('/','_blank')"  class="bthome" ><span>Trang chủ site</span></a>
                <a href="/index.php/login/logout/" class="bthome"><span class="iconexit">Thoát</span></a>
            </div>

        </div>


        <div  id="smoothmenu1" class="ddsmoothmenu">
            <ul>

                <li>
                    <a href="" style="padding-right: 23px;" ><span>Quản trị</span><img style="border:0;" class="downarrowclass" src="/../images/admin/menu_down.png"></a>
					<ul>
							            <li><a href="/index.php/admin/brand/" style="padding-right: 23px;" ><span>Thương hiệu</span></a></li>
										<li><a href="/index.php/admin/manufacturer/" style="padding-right: 23px;" ><span>Nhà sản xuất</span></a></li>
										<li><a href="/index.php/admin/category/" style="padding-right: 23px;" ><span>Danh mục sản phẩm</span></a></li>
					</ul>
                </li>
      
            
            
                <li>
                    <a href="/index.php/admin/intro/0" style="padding-right: 23px;" >
							<span>Giới thiệu</span>
							<img style="border:0;" class="downarrowclass" src="/../images/admin/menu_down.png">
					</a>
                    
					<ul>
                            <li><a href="/index.php/admin/intro/0">Danh sách bài viết</a></li>
                            <li><a href="/index.php/admin/intro_input/">Thêm mới bài viết</a></li>
                    </ul>
                </li>
                
                
                <li>
												<a href="/index.php/admin/news/" style="padding-right: 23px;" ><span>Tin tức</span></a>
												<ul style="to	p: 30px; box-shadow: 5px 5px 5px rgb(170, 170, 170); left: 0px; width: 182px; display: none;">
													<!--<li><a href="/index.php/admin/news/">Danh sách bài viết</a></li>-->
													<li><a href="/index.php/news/input/">Thêm bài viết</a></li>
													<li><a href="/index.php/admin/news_comment/">Quản lý bình luận</a></li>
												</ul>
                </li>


                <li>
                    <a href="/index.php/admin/order/" style="padding-right: 23px;" >
                    <span>Đơn hàng</span>
                    <img style="border:0;" class="downarrowclass" src="/../images/admin/menu_down.png">
                    </a>				
                </li>

				   <li>
                    <a href="/index.php/admin/customer/" style="padding-right: 23px;" >
                    <span>Khách hàng</span>
                    <img style="border:0;" class="downarrowclass" src="/../images/admin/menu_down.png">
                    </a>
                </li>

                <li>
                    <a href="/index.php/admin/contact/" style="padding-right: 23px;" >
                    <span>Liên hệ</span>
                    <img style="border:0;" class="downarrowclass" src="/../images/admin/menu_down.png">
                    </a>
                </li>
				
                <li>
                    <a href="/index.php/admin/product/" style="padding-right: 23px;" >
                    <span>Kho hàng</span><img style="border:0;" class="downarrowclass" src="/../images/admin/menu_down.png"></a>
					<ul>
									<li><a href="/index.php/product/input/">Nhập kho</a></li>
									<!--<li><a href="/index.php/product/input/">Xuất kho</a></li>-->
					</ul>
                </li>

            </ul>
            <div class="clear"></div>
        </div>
    </body>
</html>
