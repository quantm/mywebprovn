<html>
<head>  
    <title><?=$title?></title>
	<link  rel="stylesheet" type="text/css" href="/css/game.css"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">       
	<link  rel="stylesheet" type="text/css" href="/css/game/game_item.css"/>  
	<link  rel="stylesheet" type="text/css" href="/css/game/in_game_css.css"/>
</head> 
<body>
<div class="modal">
   <div class="modal-header">
    <?=$title?>
   </div>
    <div class="modal-body">
    
<object classid="clsid:233C1507-6A77-46A4-9443-F871F945D258" width="<?=$w?>" height="<?=$h?>" codebase="http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=11,5,7,609">
<param name="src" value="<?=$embed_shockwave?>" />
<param name="playerVersion" value="11" />
<param name="quality" value="high" />
<param name="swStretchStyle" value="meet" />
<param name="allowScriptAccess" value="sameDomain" />
<!--[if !IE]>-->
<object type="application/x-director" data="<?=$embed_shockwave?>"  width="<?=$w?>" height="<?=$h?>" codebase="http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=11,5,7,609">
<!--<![endif]-->
<p>Please install Adobe Shockwave.</p>
<!--[if !IE]>-->
<param name="playerVersion" value="11" />
<param name="quality" value="high" />
<param name="swStretchStyle" value="meet" />
<param name="allowScriptAccess" value="sameDomain" />        
</object>
<!--<![endif]-->    
</object>
</div>
    <div class="modal-footer"></div>
</div> 
 <body>  
</html>