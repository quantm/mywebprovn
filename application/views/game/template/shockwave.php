<html>
<head>  
    <title><?=$title?></title>
	<link  rel="stylesheet" type="text/css" href="/css/game.css"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">       
	<link  rel="stylesheet" type="text/css" href="/css/game/game_item.css"/>  
	<link  rel="stylesheet" type="text/css" href="/css/game/in_game_css.css"/>
	<!-- start meta -->
	<meta property="og:title" content="<?=$title?>" />
	<meta property="og:image" content="http://myweb.pro.vn<?=$thumbs?>" />
	<meta property="og:type" content="game" />
	<meta property="og:url" content="http://myweb.pro.vn/choi-game?id=<?=$id?>" />
	<meta property="og:description" content="<?=$description?>" />
	<meta name="description" content="<?=$description?>" />
	<!-- end meta  -->
</head> 
<body>
<div class="modal">
   <div class="modal-header">
        <?=$title?>
   </div>
    <div class="modal-body">
    <object id="progbar" height="<?=$h?>" width="<?=$w?>" codebase="http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=11,6,5,635" classid="clsid:233C1507-6A77-46A4-9443-F871F945D258">
            <param value="<?=$embed_shockwave?>" name="sw1">
            <param value="fn=<?=$file_name?>" name="sw2">
            <param value="#000000" name="bgColor">
            <param value="false" name="progress">
            <param value="false" name="logo">
            <param value="false" name="menu">
            <param value="#000000" name="background">
            <param value="true" name="swLiveConnect">
            <param value="100%" name="width">
            <param value="100%" name="height">
            <param value="<?=$pre_load?>" name="src">
            <param value="11" name="playerVersion">
            <param value="stage" name="swStretchStyle">
            <param value="swSaveEnabled='true' swVolume='false' swRestart='false' swPausePlay='false' swFastForward='false'" name="swRemote">
            <embed width="100%" height="100%" pluginspage="http://www.macromedia.com/shockwave/download/" type="application/x-director" 
            swremote="swSaveEnabled='true' swVolume='false' swRestart='false' swPausePlay='false' swFastForward='false'" 
            swstretchstyle="stage" playerversion="11" swliveconnect="true" background="#000000" menu="false" logo="false" progress="false" bgcolor="#000000"
            sw2="fn=<?=$file_name?>" sw1="<?=$embed_shockwave?>" src="<?=$pre_load?>">
    </object>
    </div>
    <div class="modal-footer"></div>
</div> 
 <body>  
</html>