<?
    include_once 'include/analyticstracking.php';
    require_once 'application/models/autocomplete_model.php';
    require_once 'application/models/common_model.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8" />
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta name="Author" content="Tran Minh Quan"/>
    
    <meta name="description" content="SocialGame, SocialEntertaintment, eCommerce, <?=$title?> at myweb.pro.vn" /> 
	<meta name="robots" content="noodp;SocialGame, SocialEntertaintment, eCommerce,myweb.pro.vn " />
	<meta name="googlebot" content="noodp;SocialGame, SocialEntertaintment, eCommerce " />
    <meta name="keywords" content="<?php foreach($keyword as $key):?><?php echo $key['NAME'].','?><?php endforeach;?>"/>
    <meta content="Tran Minh Quan"  property="og:author"/></meta>
    <meta content="IT PRO CORP"  property="og:publisher "/></meta>
    <meta content="Social Media Ecommerce" property="og:site_name"/></meta>
    <meta content="http://myweb.pro.vn/images/web_my_game.png" property="og:image"></meta>
    <meta content="http://myweb.pro.vn/images/web_my_game.png" property="og:photo"></meta>
    <meta content="SocialGame, SocialEntertaintment, eCommerce, <?=$title?> at myweb.pro.vn"  property="og:description" /></meta>
    <meta content='<?= $title ?>' property="og:title"/></meta>
    <meta content="<?php foreach($keyword as $key):?><?php echo $key['NAME'].','?><?php endforeach;?>"  property="og:keywords"/></meta>
	
    <!-- mobile -->
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="canonical" href="http://myweb.pro.vn/" />
    <link rel="author" href="https://plus.google.com/+TranKing" />
	<link href="/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link href="/css/divbox.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="/css/system.css" type="text/css"  rel="stylesheet"/>
	<link href="/css/rounded.css" type="text/css" rel="stylesheet"/>
	<link  media="print"  href="/css/general.css" type="text/css" rel="stylesheet"/>
	<link href="/css/template.css" type="text/css" rel="stylesheet"/>
	<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/css/menu.css" type="text/css" rel="stylesheet"/>
	<link href="/css/jquery-textntags.css" type="text/css" rel="stylesheet"/>	
    
    <!-- google data highlighter -->
	<script type="text/javascript" src="/js/underscore-min.js" ></script>
	<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.js"></script>
	<script type="text/javascript" src="/js/AjaxEngine.js" ></script>
	<script type="text/javascript" src="/js/login.js"></script> 
    <script type="text/javascript" src="/js/analytic.js"></script>
	<script type="text/javascript" src="/js/validate.js" ></script>
	<script type="text/javascript" src="/js/social/facebook.js" ></script>
	<script type="text/javascript" src="/js/header.js" ></script>
	<script type="text/javascript" src="/js/textntags.js" ></script>
	<script type="text/javascript" src="/js/jquery_autocomplete.js" ></script>
    <script type="text/javascript" src="/js/thumbs_autocomplete.js" ></script>
    <script type="text/javascript" src="/js/game/UnityObject2.js"></script>  
    <script type="text/javascript" src="/js/game.js"></script>
    <script type="text/javascript" src="/js/game/game_item.js"></script>  
    <script type="text/javascript" src="/js/game/pagination.js"></script>  
    <script type="text/javascript" src="/js/swfobject.js"></script>
    <script type="text/javascript" src="/js/ebook.js"></script>
    
    <!--- google adsense push --->
    <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body>
<header class="navbar navbar-fixed-top">
        <div class="navbar-inner navbar-green">
            <div class="nav-collapse account-collapse">
            <div class="container-fluid">
				<div class="logo">
                    <a title="Trang Chủ" href="http://myweb.pro.vn/" class="brand animated fadeInDown">myweb.pro.vn</a>             
                </div>
				<form id="game_header_search" class="pull-left navbar-form" action="/game/play/" method="post">  
    				<?php echo common_model::AutoComplete(autocomplete_model::getGameData(), "ID", "NAME", "NAME_GAME", "THUMBS", "ID_CONTROL", "search", true, "with:475px", "", "search", '', "Tìm kiếm trò chơi và ebook");?>                    
                    <!--<button type="submit" class="btn">Tìm game</button>-->
    				<input type="hidden" name="id_category" id="id_category" value="<?=$id_category?>"/>
    				<input type="hidden" name="name_category" id="name_category"/>                    
                    <input type="hidden" name="count_category_item" id="count_category_item" value="<?=$count_category_item?>"/>
                    <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>                    
				</form>                
				<div class="align-right nav-group-right">    				 
                <ul class="nav pull-right">
					 <li>
                        <a href="#">
                            <i class="icon-ok-sign icon-large"></i> Đọc báo
                        </a> 
                    </li>
                     <li class="dropdown" id="li_ebook_category" >
                        <a id="cate_ebook" role="button" data-toggle="dropdown" data-target="#" href="#">
                            <i class="icon-ok-sign icon-large"></i> Ebook
                            <ul class="dropdown-menu" role="menu" aria-labelledby="cate_ebook">            				    	
                                <li><a href="/ebook/">Tất cả ebook<font class="count_by_category">(<?=$count_all_ebook ?>)</font></a></a></li>
                                <?php foreach($category_ebook as $key):?>	
            					<li data-id="<?=$key['ID_CATEGORY']?>" >
                                    <a href="#"><?=$key['CATEGORY_EBOOK'] ?><font class="count_by_category">(<?=$key['counting']?>)</font></a>
                                    <input type="hidden" value="<?=$key['counting']?>"/>                         
                                </li>
                                <li class="dropdown-divider"></li>                    
            					<?php endforeach;?>	
                            </ul>
                        </a> 
                    </li>
                    <li class="dropdown" id="li_game_category">                     
                        <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                            <i class="icon-ok-sign icon-large"></i> Game
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">            				    	
                                <li><a href="/game/">Tất cả game<font class="count_by_category">(<?=$count_all_game ?>)</font></a></a></li>
                                <?php foreach($category_game as $key):?>	
            					<li data-id="<?=$key['ID']?>" >
                                    <a href="#"><?=$key['CATEGORY_GAME'] ?><font class="count_by_category">(<?=$key['counting']?>)</font></a>
                                    <input type="hidden" value="<?=$key['counting']?>"/>                         
                                </li>
                                <li class="dropdown-divider"></li>                    
            					<?php endforeach;?>	
                            </ul> 
                        </a>                                                                                                        
                     </li>                                                                                                   				
					<?php if($user_data == "-1"):?>	
                    <li class="dropdown">						
						<a data-toggle="modal" href="#modal_login" id="show">
                            <i class="icon-signin"></i>  Đăng Nhập
                        </a>
					</li>
                    
					<li>
                        <a href="#modal_register" data-toggle="modal">
                            <i class="icon-signin"></i> Đăng Ký
                        </a>
					</li>					
					<?php endif;?>
					<?php if($user_data != "-1"):?>
					<li class="header_divider">
                        <?php foreach ($user_data as $key):?>
                            <img class="user_avatar" src="https://graph.facebook.com/<?=$key['USER_IMAGE']?>/picture" alt="<?=$key['NAME']?>"/>
                        <?php endforeach;?>
                    </li>
                    <li>	
						<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">						   
						   <?php foreach ($user_data as $key):?>						   
                           <?=$key['NAME']?>
                           <span class="label label-important">1</span>
						   <?php endforeach;?>
						   <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							   <li class="dropdown-divider"></li>                    
							   <li>
									<a href="/user/account/">Tài khoản</a>		
							   </li>
                               <li>
									<a href="/login/logout/">Thoát</a>		
							   </li>
							   <li class="dropdown-divider"></li>                    
						   </ul>
						</a>
					</li>
					<?php endif;?>
					
					<li><!--Mua bán--> </li>
                   </ul> 
				</div>                
            </div>
        </div>
        </div>
    </header>
<div style="display:none" id="atAutoComplete"></div>
<form id="frmlogin" method="post" name="frmlogin">
<!-- login -->
<div class="modal hide fade" id="modal_login">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Đăng nhập</h3>
        </div>
        <div id="login_body" class="modal-body">
        <table id="default_login">
            <tr>
                <td>
                    Tên đăng nhập hoặc Email
                </td>
                <td>
                    <input style="height:auto" type='text' id='username' name='username'>
                    <div class="clr"></div>
                    <span id="ERRusername" class="box_erro_area"></span>
                </td>
            </tr>
            <tr>
                <td>
                    Mật khẩu
                </td>
                <td>
                    <input style="height:auto" type='password' name='password' id='password'>
                    <div class="clr"></div>
                    <span class="box_erro_area" id="ERRpassword"></span>
                    <div class="clr"></div>
                    <span class="box_erro_area" id="ERRlogin"></span>
                </td>
            </tr>
        </table>
        </div>
        <div class="modal-footer">
            <div style="float: left;display: inline-block;">
                    <input id="remember_me" type="checkbox" value="0"> <span id="span_remember_me"> Ghi nhớ tôi </span>
             </div>
            <button href="#" class="btn btn-facebook" id="header_face_book_login" data-dismiss="modal">Facebook</button>
            <!--
            <button href="#" class="btn btn-facebook" id="header_face_book_login" data-dismiss="modal">Twitter</button>
            <button href="#" class="btn btn-facebook" id="header_face_book_login" data-dismiss="modal">Google +</button>
            -->
            <button id="btn_login" type="button" class="btn btn-primary">Đăng nhập</button>
        </div>
</div>
<!-- end login -->
</form>
<!-- register -->
<div class="modal hide fade" id="modal_register">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
				<iframe src="/user/register/" ></iframe> 
		</div>       
  </div>
<!-- end register -->	
</body>
</html>