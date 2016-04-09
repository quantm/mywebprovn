<?
    include_once 'include/analyticstracking.php';
    require_once 'application/models/autocomplete_model.php';
    require_once 'application/models/common_model.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title><?= $title ?></title>
    <meta content="text/html"  charset="UTF-8" http-equiv="Content-Type"/>
    <meta name="Author" content="Tran Minh Quan"/>
    <meta name="description" content="SocialGame, SocialEntertaintment, eCommerce, <?=$title?> at myweb.pro.vn" /> 
    <meta name="keywords" content="<?php foreach($keyword as $key):?><?php echo $key['NAME'].','?><?php endforeach;?>"/>
    <meta content="Tran Minh Quan"  property="og:author"/>
	<meta property="fb:app_id" content="1375147869435383"/>
    <meta content="IT PRO CORP"  property="og:publisher "/>
    <meta content="Social Media Ecommerce" property="og:site_name"/>
    <meta content="http://myweb.pro.vn/images/web_my_game.png" property="og:image"/>
    <meta content="http://myweb.pro.vn/images/web_my_game.png" property="og:photo"/>
    <meta content="SocialGame, SocialEntertaintment, eCommerce, <?=$title?> at myweb.pro.vn"  property="og:description" />
    <meta content='<?= $title ?>' property="og:title"/>
    <meta content="<?php foreach($keyword as $key):?><?php echo $key['NAME'].','?><?php endforeach;?>"  property="og:keywords"/>
    <meta name="viewport" content="width=device-width, user-scalable=yes"/>

    <link rel="canonical" href="http://myweb.pro.vn/" />
    <link rel="author" href="https://plus.google.com/+TranKing" />
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
    
    <link rel="stylesheet" href="/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=fire-animation"/>	
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/css/game.css" media="screen"/>
	
	<style>	
	i{
		color: rgba(236, 25, 127, 0.98);
		text-shadow: 1px 1px 1px #756B69;
		font-size:22px;
		font-weight:bold;
	}
	</style>
	
    <script type="text/javascript"  src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript"  src="/js/social/google.js" ></script>
    <script type="text/javascript"  src="/js/game.js"></script>
    <script type="text/javascript"  src="/js/bootstrap.js"></script>
	<script type="text/javascript"  src="/js/AjaxEngine.js" ></script>
	<script type="text/javascript"  src="/js/login.js"></script> 
	<script type="text/javascript"  src="/js/validate.js" ></script>
	<script type="text/javascript"  src="/js/social/facebook.js" ></script>	  
    <script type="text/javascript"  src="/js/game/pagination.js"></script>  
    <script type="text/javascript"  src="/js/swfobject.js"></script>
</head>
<body>
<header class="navbar navbar-fixed-top">
        <div class="navbar-inner navbar-green">
            <div class="nav-collapse account-collapse">
            <div class="container-fluid">
				<div class="language">
                    <span>
                        <a href="/?lang=vn"><img src="/images/vi.png" alt="Vietnamese" title="Vietnamese"/></a>
                        <a href="/?lang=en"><img src="/images/en.png" alt="English" title="English"/></a>
                    </span>
                </div>
                <div class="logo">
                    <a id="header_link" title="Home Page" href="http://myweb.pro.vn/" class="brand animated fadeInDown"><span class="font-effect-fire-animation">myweb.pro.vn</span></a>             
                </div>                
				<form id="game_header_search" class="pull-left navbar-form" action="/game/play/" method="post">  
                    <input type="text" placeholder="Search for Game and eBook" title="Search for Game and eBook" name="search" id="search"/>         	                         
    				<input type="hidden" name="id_category" id="id_category" value="<?=$id_category?>"/>
    				<input type="hidden" name="name_category" id="name_category"/>                    
                    <input type="hidden" name="count_category_item" id="count_category_item" value="<?=$count_category_item?>"/>
                    <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
                    <input type="hidden" name="type" id="type" value="<?=$type?>"/>                   
				</form>                
				<div class="align-right nav-group-right">    				 
                <ul class="nav pull-right">
                    <li class="dropdown" >
                        <a role="button" data-toggle="dropdown" data-target="#" id="cate_music">
                            <i class="fa fa-music"></i> Music
                            <ul id="ul_cate_news" class="dropdown-menu" role="menu" aria-labelledby="cate_music">            				    	
                                <li><a class="a_cate_news" href="/music/symphony">Symphony</a></a></li>                            
                            </ul>    
                        </a> 
                    </li>                    
                    <li class="dropdown" >
                        <a role="button" data-toggle="dropdown" data-target="#" id="cate_news">
                            <i class="fa fa-rss-square"></i> Newspaper
                            <ul id="ul_cate_news" class="dropdown-menu" role="menu" aria-labelledby="cate_news">
								<li><a class="a_cate_news" href="/news/bbc">BBC News</a></a></li>            								                     <li><a class="a_cate_news" href="/news/nytimes">The New York Times</a></a></li>                           
                                <li><a class="a_cate_news" href="/news/saigontimes">The Saigon Times</a></a></li>
                            </ul>    
                        </a> 
                    </li>
					<!--
                     <li class="dropdown" id="li_ebook_category" >
                        <a id="cate_ebook" role="button" data-toggle="dropdown" data-target="#">
                            <i class="fa fa-book"></i> Ebook
                             <ul class="dropdown-menu" role="menu" aria-labelledby="cate_ebook">            				    	
                                <li><a class="a_cate_news"  href="/ebook/">All Ebook<font class="count_by_category">(<?=$count_all_ebook ?>)</font></a></a></li>
                                <?php foreach($category_ebook as $key):?>	
            					<li data-id="<?=$key['ID_CATEGORY']?>" >
                                    <a class="a_cate_news"  href="#"><?=$key['CATEGORY_EBOOK'] ?><font class="count_by_category">(<?=$key['counting']?>)</font></a>
                                    <input type="hidden" value="<?=$key['counting']?>"/>                         
                                </li>
                                <li class="dropdown-divider"></li>                    
            					<?php endforeach;?>	
                            </ul>
                        </a> 
                    </li>
					-->
                    <li class="dropdown" id="li_game_category">                     
                        <a id="dLabel" role="button" data-toggle="dropdown" data-target="#">
                            <i class="fa fa-laptop"></i> Game
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">            				    	
                                <li><a class="a_cate_news"  href="/game/">All Game<font class="count_by_category">(<?=$count_all_game ?>)</font></a></a></li>
                                <li><a class="a_cate_news" data-type="unity3d"  href="/game?type=unity3d">Unity 3D<font class="count_by_category">(<?=$count_unity_game ?>)</font></a></a></li>                                
                                <li><a class="a_cate_news" data-type="flash"  href="/game?type=flash">Flash<font class="count_by_category">(<?=$count_flash_game ?>)</font></a></a></li>
                                <li><a class="a_cate_news" data-type="shockwave" href="/game?type=shockwave">Shockwave<font class="count_by_category">(<?=$count_shockwave_game ?>)</font></a></a></li>
                                <?php foreach($category_game as $key):?>	
            					<li data-id="<?=$key['ID']?>" >
                                    <a class="a_cate_news" href="#"><?=$key['CATEGORY_GAME'] ?><font class="count_by_category">(<?=$key['counting']?>)</font></a>
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
                            <i class="fa fa-sign-in"></i>  Sign in
                        </a>
					</li>
                    
					<li>
                        <a href="#modal_register" data-toggle="modal">
                            <i class="fa fa-check-square-o"></i> Sign up
                        </a>
					</li>					
					<?php endif;?>
					<?php if($user_data != "-1"):?>
					<li class="header_divider">
                        <?php foreach ($user_data as $key):?>
                            <img class="user_avatar" src="https://graph.facebook.com/<?=$key['facebook_id']?>/picture" alt="<?=$key['NAME']?>"/>
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
									<a href="/user/account/">Account</a>		
							   </li>
                               <li>
									<a href="/login/logout/">Logout</a>		
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
    
<!-- login -->
<form id="frmlogin" method="post" name="frmlogin">
<div class="modal hide fade" id="modal_login">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4>Login</h4>
        </div>
        <div id="login_body" class="modal-body">
        <table id="default_login">
            <tr>
                <td>
                    Username or Email
                </td>
                <td>
                    <input style="height:auto" type='text' id='username' name='username'>
                    <div class="clr"></div>
                    <span id="ERRusername" class="box_erro_area"></span>
                </td>
            </tr>
            <tr>
                <td>
                    Password
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
                    <input id="remember_me" type="checkbox" value="0"> <span id="span_remember_me"> Remember me </span>
             </div>
            <button href="#" class="btn btn-facebook" id="header_face_book_login" data-dismiss="modal">Facebook</button>                                
            <button href="#" class="btn btn-twitter" id="header_face_book_login" data-dismiss="modal">Twitter</button>
            <button href="#" class="g-signin btn btn-google" 
                    data-dismiss="modal" 
                    data-scope="https://www.googleapis.com/auth/plus.login"
                    data-requestvisibleactions="http://schemas.google.com/AddActivity"
                    data-clientId="940667944641.apps.googleusercontent.com"
                    data-accesstype="offline"
                    data-callback="onSignInCallback"
                    data-theme="dark"
                    data-cookiepolicy="single_host_origin">Google+</button>        
            <button id="btn_login" type="button" class="btn btn-primary">Login</button>
        </div>
</div>
</form>
<!-- end login -->

<!-- register -->
<div class="modal hide fade" id="modal_register">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
				<iframe src="/user/register?lang=en" ></iframe> 
		</div>       
  </div>
<!-- end register -->	
</body>
</html>