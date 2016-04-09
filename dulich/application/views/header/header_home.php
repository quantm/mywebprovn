<?php
require_once 'application/models/user_model.php';
?>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta name="Author" content="Tran Minh Quan"/>
    <meta content="Tran Minh Quan"  property="og:author"/>
    <meta content="IT PRO CORP"  property="og:publisher "/>
    <meta content="SocialGame, SocialEntertaintment, eCommerce, myweb.pro.vn"  property="og:description" />
    <meta content='<?= $title ?>' property="og:title"/>
    <meta content="game,social,entertainment,learning, myweb.pro.vn"  property="og:keywords"/>
    <meta content="" property="og:image"/>
    <meta content="Social Media Ecommerce" property="og:site_name">
	<meta name="description" content="SocialGame, SocialEntertaintment, eCommerce, myweb.pro.vn" /> 
	<meta name="robots" content="noodp;SocialGame, SocialEntertaintment, eCommerce,myweb.pro.vn " />
	<meta name="googlebot" content="noodp;SocialGame, SocialEntertaintment, eCommerce " />
    <meta name="keywords" content="game,social,entertainment,learning, myweb.pro.vn"/>
    <title><?= $title ?></title>
    <script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>    
    
    <link href="/css/menu.css" type="text/css" rel="stylesheet">
    <link type="text/css" href="/css/system.css" rel="stylesheet">
    <link href="/css/rounded.css" type="text/css" rel="stylesheet">
    <link href="/css/general.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
</head>
     
<div class="navbar navbar-static-top accounts" id="top_page">
    <div class="navbar-inner">       
        <a data-target=".account-collapse" data-toggle="collapse" class="btn btn-navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="nav-collapse account-collapse collapse">
            <div class="container-fluid">                
                <ul class="nav pull-right">                    
                        <li><a href="/accounts/login/"><i class="icon-signin"></i> Login or register</a></li>                    
                </ul>
            </div>
        </div>
    </div>
</div>

<!--
<form id=frm name=frm action='/home/logout/' method='post'>
    <div align="center"><img  id="header_default_image"  src="../../images/default_header.png"/></div>     
    <div class="mainNavigator">
        <ul id="menu">              
            <li class="node">
                <a href="admin/feedback">Trang chủ</a>
            </li>               
            <li class="node">
                <a href="/game/index">Game</a>
            </li>                
    </div>
</form>
-->
  