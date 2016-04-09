<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- start meta -->
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta property="og:title" content="Tủ sách tham khảo" />
<meta property="og:image" content="http://myweb.pro.vn/images/fb/bookcase.png" />
<meta property="og:type" content="book" />
<meta property="og:description" content="Danh mục sách tham khảo thuộc các ngành  CNTT - Tin học văn phòng, Quản trị-Marketing, Kỹ năng mềm,…" />
<!-- end meta  -->

<title>Tủ sách tham khảo</title>
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
</head>
<body>
<div class="fb-like-box fb_iframe_widget" data-colorscheme="light" data-header="true"  data-width='200px' data-href="https://www.facebook.com/elearningsocialvn?ref=tn_tnmn" data-show-border="true" data-show-faces="true" ></div>
<!-- start social like -->
<div class="social_link">
<div class="fb-share-button" data-layout="button_count" data-width="200px" data-height="100px"   data-href="http://myweb.pro.vn/book/category"></div>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>
<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->

<div class="g-plusone" data-size="medium"></div>
</div>
<!-- end social like -->

<div class="book_category">
<?php foreach($category_names as $key):?>
	<div>
		<a href="/book/category?category=<?=$key['CATEGORY']?>"><?=$key['CATEGORY']?></a>
	</div></br>
<?php endforeach;?>
</div>
<div id="main">
  <div id="leaf_l"></div>
  <div id="leaf_r"></div>
  <div id="outer">
    <div id="top_pad">
      <div id="name_outer">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="name">
          <tr>
            <td id="name_left">&nbsp;</td>
            <td align="center" valign="middle" class="pad"><?=$category_name?></td>
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
        <div class="wrapper">
        
		<?php foreach($book_top_row as $key_top):?>
		<div class="book">
            <div class="title"><?=$key_top['NAME']?></div>
            <div class="cover" style="margin-left:-45px;">
				<a href="/book/detail?id=<?=$key_top['ID']?>" target="_new">
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


<!-- start body -->
<?php $loop = -1; foreach($elib as $key):?>
<?php $loop++; if ($loop % 4 == 0) { ?>
<div class="shelf_container bookcase" id="shelf_container_<?=$loop?>" id_db="<?=$key['ID']?>">
	  <div class="shelf_center column">
        <div class="wrapper">
          <div class="book">
            <div class="title"><?=$key['NAME']?></div>
            <div class="cover" style="margin-left:-45px;">
			<a href="/book/detail?id=<?=$key['ID']?>" target="_new">
				<img src="<?= $key['THUMBS'] ?>" alt="<?=$key['NAME']?>" width="100" height="130" />
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
	<div class="append_container"  style="display:none" id="shelf_container_<?=$loop?>">
      <div class="shelf_center column">
        <div class="wrapper">
          <div class="book">
            <div class="title"><?=$key['NAME']?></div>
            <div class="cover" style="margin-left:-45px;"><a href="/book/detail?id=<?=$key['ID']?>" target="_new"><img src="<?= $key['THUMBS'] ?>" alt="<?=$key['NAME']?>" width="100" height="130" /></a></div>
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
       
		<?php foreach($book_last_row as $key_last):?>
		<div class="book">
            <div class="title"><?=$key_last['NAME']?></div>
            <div class="cover" style="margin-left:-45px;">
				<a href="/book/detail?id=<?=$key_last['ID']?>" target="_new">
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
    <div id="copyright">
	<?$this->load->view('footer')?>
	</div>
</div>
</body>
</html>