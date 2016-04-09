<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- start meta -->
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta property="og:title" content="Tủ sách mở rộng tâm hồn" />
<meta property="og:image" content="http://myweb.pro.vn/images/lotus-pink.png" />
<meta property="og:type" content="book" />
<meta property="og:url" content="http://myweb.pro.vn/rong-mo-tam-hon" />
<meta property="og:description" content="Tủ sách mở rộng tâm hồn" />
<!-- end meta  -->

<title>Tủ sách mở rộng tâm hồn</title>
<link href="/css/elib/reset.css" rel="stylesheet" type="text/css" />
<link href="/css/elib/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"  src="/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="/js/elib/cufon-yui.js"></script>
<script type="text/javascript" src="/js/elib/cufon-replace.js"></script>
<script type="text/javascript" src="/js/elib/segoeui_400.font.js"></script>
<!--[if IE ]> <link href="/css/elib/ie.css" rel="stylesheet" type="text/css" /><![endif]-->
<script type="text/javascript">
$(document)
.ready(function(){

$("#shelf_container_0 .wrapper").append($("#shelf_container_0").next().find('.wrapper').html())
$("#shelf_container_0 .wrapper").append($("#shelf_container_0").next().next().find('.wrapper').html())
$("#shelf_container_0 .wrapper").append($("#shelf_container_0").next().next().next().find('.wrapper').html())
	
	for(var i=1;i<"<?=$count_elib?>";i++){
		var k=i%4
		if(k==0){
			$("#shelf_container_"+i+ " .wrapper").append($("#shelf_container_"+i).next().find('.wrapper').html())
			$("#shelf_container_"+i+ " .wrapper").append($("#shelf_container_"+i).next().next().find('.wrapper').html())
			$("#shelf_container_"+i+ " .wrapper").append($("#shelf_container_"+i).next().next().next().find('.wrapper').html())
		}
		2
	}
})
.on("click",".footer_pagination a",function(){
	var href=$(this).attr('href'),id_category="<?=$id_category?>"
	if(id_category!='0'){
		$(this).attr('href',href+"?id_category=<?=$id_category?>")
	}
})
</script>
<style type="text/css">
	body {overflow:hidden}
	#main{margin-top: -20px !important;}
</style>
</head>
<body>

<img style="width:10%;height:15%;" src="/images/lotus-pink.png" class="header_lotus_left">
<img style="width:10%;height:15%;" src="/images/lotus-pink.png" class="header_lotus_right">

<img id="hinh_phat_quan_am" style="display:none" src="http://myweb.pro.vn/images/background/phat_quan_am.png" alt="NAM MÔ QUÁN THẾ ÂM BỒ TÁT MA HA TÁT"/>

<div id="main">
<div id="outer">
<div id="top">
      <div id="top_r_bg">
        <div class="center column">
          <div class="corner">
            <div id="letters"></div>
          </div>
        </div>
              </div>
</div>

<!--  first row begin  -->    
<div class="shelf_container first">
      <div class="shelf_center column">
        <div class="wrapper">
        
		<?php foreach($elib as $key_top):?>
		<div class="book">
            <div class="title"><?=$key_top['NAME']?></div>
            <div class="cover" style="margin-left:-45px;">
				<a href="/rong-mo-tam-hon?id=<?=$key_top['ID']?>" target="_new">
					<img src="<?=$key_top['THUMBS']?>" alt="<?=$key_top['NAME']?>" height="130" width="100" />
				</a>
			</div>
		</div>
		<?php endforeach;?>

        </div><!--/wrapper -->
      </div><!--/shelf_center column -->
      <div class="shelf_left column">&nbsp;</div>
      <div class="shelf_right column">&nbsp;</div>
</div>
<!-- end first row -->

<!--last row-->
<div class="shelf_container last">
      <div class="shelf_center column">
       <div class="wrapper">
       
		<?php foreach($book_last_row as $key_last):?>
		<div class="book">
            <div class="title"><?=$key_last['NAME']?></div>
            <div class="cover" style="margin-left:-45px;">
				<a href="rong-mo-tam-hon?id=<?=$key_last['ID']?>" target="_new">
					<img src="<?=$key_last['THUMBS']?>" alt="<?=$key_last['NAME']?>" height="130" width="100" />
				</a>
			</div>
		</div>
		<?php endforeach;?>

      </div><!--/ wrapper -->
      </div><!--/shelf_center column-->
      <div class="shelf_left column">&nbsp;</div>
      <div class="shelf_right column">&nbsp;</div>
</div>
<!--  last row end  -->    
     
	<div id="bottom">
      <div class="center column">
        <div class="corner">&nbsp;</div>
      </div>
      <div class="left column"> 
		<ul class="breadcrumb">
			<li class="active footer_pagination"><?=$pagination?></li>
		</ul>
		</div>
      <div class="right column">
        <div class="pad">Tổng số: <?=$count_elib?> ebook</div>
      </div>
    </div>
  </div>
    
</div>
</body>
</html>