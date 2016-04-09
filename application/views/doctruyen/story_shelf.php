<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- start meta -->
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta property="og:title" content="Tủ truyện của tui" />
<meta property="og:image" content="http://xahoihoctap.net.vn/images/fb/bookcase.png" />
<meta property="og:type" content="book" />
<meta property="og:description" content="Tủ truyện của tui" />
<!-- end meta  -->

<title>Tủ truyện</title>
<link href="http://xahoihoctap.net.vn/css/elib/reset.css" rel="stylesheet" type="text/css" />
<link href="http://xahoihoctap.net.vn/css/elib/style.css" rel="stylesheet" type="text/css" />
<!--[if IE ]> <link href="/css/elib/ie.css" rel="stylesheet" type="text/css" /><![endif]-->

<script type="text/javascript" async src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" async src="http://xahoihoctap.net.vn/js/elib/cufon-yui.js"></script>
<script type="text/javascript" async src="http://xahoihoctap.net.vn/js/elib/cufon-replace.js"></script>
<script type="text/javascript" async src="http://xahoihoctap.net.vn/js/elib/segoeui_400.font.js"></script>
<script type="text/javascript">
$(document)
//header cse
.on('mouseover','.header_text_search',function(){
	$('#cse-search-box').show('slow')
	$(this).hide()
})
.on('click','#header_cse_close',function(){
	$('#cse-search-box').hide('slow')
	$('.header_text_search').show()
})
//end

.ready(function(){

//disable flex context menu
	$("body,object,embed").bind("contextmenu",function(){
       return false;
    }); 
//end
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

</head>
<body>

<div class="book_category">
<?php foreach($category_names as $key):?>
	<div>
		<a href="/doctruyen/danhmuc?id_category=<?=$key['id']?>">Tủ truyện <?=$key['name']?></a>
	</div></br>
<?php endforeach;?>
</div>
<div id="main">

<div style="position:fixed;margin-left:88%;margin-top:15.5%" class="ads_right">
<!--- Script ANTS - 160x600 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="519993167" data-ants-zone-id="519993167"></div>
<!--- end ANTS Script -->
</div>

<!--  <div id="leaf_l"></div>
  <div id="leaf_r"></div>
 -->
  <div id="outer" style="margin-top:-165px;z-index:1">
    <div id="top_pad">
      <div id="name_outer">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="name">
          <tr>
            <td id="name_left">&nbsp;</td>
            <td align="center" valign="middle" class="pad">Tủ truyện <?=$category_name?></td>
            <td id="name_right">&nbsp;</td>
          </tr>
        </table>
      </div>
    </div>
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
        <div class="wrapper" style="margin-top:6%">
        	<!--- Script ANTS - 728x90 -->
			<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script>
			<!--- end ANTS Script -->
        </div><!--/wrapper -->
      </div><!--/shelf_center column -->
      <div class="shelf_left column">&nbsp;</div>
      <div class="shelf_right column">&nbsp;</div>
</div>
<!-- end first row -->


<!-- start body -->
<?php $loop = -1; foreach($elib as $key):?>
<?php $loop++; if ($loop % 4 == 0) { ?>
<?
	$path=str_replace('webtruyen.com','myweb.pro.vn/xem-truyen-online?referer=webtruyencom&fetchItem=',$key['path']);
	$path=str_replace('truyendich.com','myweb.pro.vn/xem-truyen-online?fetchItem=',$path);
	$path=str_replace('truyendich.com','myweb.pro.vn/xem-truyen-online?fetchItem=',$path);
	$path=str_replace('www.doctruyen360.com','myweb.pro.vn/xem-truyen-online?fetchItem=',$path);
?>
<div class="shelf_container bookcase" id="shelf_container_<?=$loop?>" id_db="<?=$key['id']?>">
	  <div class="shelf_center column">
        <div class="wrapper">
          <div class="book">
            <div class="title"><?=$key['name']?></div>
            <div class="cover" style="margin-left:-45px;">
			<a href="<?=$path?>" title='<?=$key['name']?>'>
				<img onerror="this.src='http://xahoihoctap.net.vn/images/Story_Book.png'" src="<?=$key['thumb']?>" alt="<?=$key['name']?>" width="100" height="130" />
			</a>
			</div>
		  </div>
        </div>
      </div>
      <div class="shelf_left column">&nbsp;</div>
      <div class="shelf_right column">&nbsp;</div>
</div>
<?php } ?>

	<?php if ($loop % 4 != 0) { ?>
	<?
		$path=str_replace('webtruyen.com','myweb.pro.vn/xem-truyen-online?referer=webtruyencom&fetchItem=',$key['path']);
		$path=str_replace('truyendich.com','myweb.pro.vn/xem-truyen-online?fetchItem=',$path);
		$path=str_replace('truyendich.com','myweb.pro.vn/xem-truyen-online?fetchItem=',$path);
		$path=str_replace('www.doctruyen360.com','myweb.pro.vn/xem-truyen-online?fetchItem=',$path);
	?>
	<div class="append_container"  style="display:none" id="shelf_container_<?=$loop?>">
      <div class="shelf_center column">
        <div class="wrapper">
          <div class="book">
            <div class="title"><?=$key['name']?></div>
            <div class="cover" style="margin-left:-45px;">
			<a href="<?=$path?>" title='<?=$key['name']?>'>
			<img onerror="this.src='http://xahoihoctap.net.vn/images/Story_Book.png'" src="<?=$key['thumb']?>" alt="<?=$key['name']?>" width="100" height="130" /></a>
			</div>
		  </div>
        </div>
      </div>
      <div class="shelf_left column">&nbsp;</div>
      <div class="shelf_right column">&nbsp;</div>
	</div>
	<?php } ?>

<?php endforeach;?>
<!-- end body -->

<!--last row-->
<div class="shelf_container last">
      <div class="shelf_center column">
       <div class="wrapper">
		<div class="adv_bottom">	
			<!--- Script ANTS - 380x90 --> 
			<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
			<div class="518907464" data-ants-zone-id="518907464"></div>
			<!--- end ANTS Script -->
		</div>
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
        <div class="pad">Tổng số: <?=$count_elib?></div>
      </div>
    </div>
  </div>
    <div id="copyright">
	<?$this->load->view('footer')?>
	</div>
</div>

</body>
</html>