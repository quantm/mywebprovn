<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thư viện đề thi và giáo án điện tử</title>
<link href="/css/elib/reset.css" rel="stylesheet" type="text/css" />
<link href="/css/elib/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"  src="/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="/js/elib/cufon-yui.js"></script>
<script type="text/javascript" src="/js/elib/cufon-replace.js"></script>
<script type="text/javascript" src="/js/elib/segoeui_400.font.js"></script>
<!--[if IE ]> <link href="/css/elib/ie.css" rel="stylesheet" type="text/css" /><![endif]-->
<script type="text/javascript">
$(document).ready(function(){
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
		
	}
})
</script>
</head>
<body>
<div class="social_like">
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
            <td align="center" valign="middle" class="pad">Thư viện đề thi và giáo án điện tử</td>
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
          <div class="book">
            <div class="title">Twilight</div>
            <div class="cover" style="margin-left:-45px;"><a href="#"><img src="/images/elib/Thumbs/bbbe21a1-97ae-43f5-aab7-bc4ef69d7640.jpg" alt="Twilight" height="130" /></a></div>
</div><div class="book">
            <div class="title">Alice In Wonderland</div>
            <div class="cover" style="margin-left:-45px;"><a href="#"><img src="/images/elib/Thumbs/a6f662e5-c5e7-4df1-9174-5d905609bfe4.jpg" alt="Alice In Wonderland" height="130" /></a></div>
</div><div class="book">
            <div class="title">Jaws</div>
            <div class="cover" style="margin-left:-45px;"><a href="#"><img src="/images/elib/Thumbs/d4b10470-a166-4315-a173-2b2dec1abf8a.jpg" alt="Jaws" height="130" /></a></div>
</div><div class="book">
            <div class="title">Gone with the Wind</div>
            <div class="cover" style="margin-left:-45px;"><a href="#"><img src="/images/elib/Thumbs/9603560f-63e5-456f-bdb9-7c125177e62f.jpg" alt="Gone with the Wind" height="130" /></a></div>
</div>
        </div>
      </div>
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
            <div class="cover" style="margin-left:-45px;"><a href="#"><img src="<?= $key['THUMBS'] ?>" alt="Funky Business" width="100" height="130" /></a></div>
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
            <div class="cover" style="margin-left:-45px;"><a href="#"><img src="<?= $key['THUMBS'] ?>" alt="Funky Business" width="100" height="130" /></a></div>
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
          <div class="book">
            <div class="title">The Alchemist</div>
            <div class="cover" style="margin-left:-45px;"><a href="#"><img src="/images/elib/Thumbs/d64032e8-3e10-4a72-b40b-db56be336b8d.jpg" alt="The Alchemist" height="130" /></a></div>
</div><div class="book">
            <div class="title">The Hitchhiker's Guide to the Galaxy</div>
            <div class="cover" style="margin-left:-45px;"><a href="#"><img src="/images/elib/Thumbs/89f60070-c4f2-4c1a-94a6-bd79c5c1ade8.jpg" alt="The Hitchhiker's Guide to the Galaxy" height="130" /></a></div>
</div><div class="book">
            <div class="title">Beginning PHP and MySQL 5</div>
            <div class="cover" style="margin-left:-45px;"><a href="#"><img src="/images/elib/Thumbs/ca5d4da2-0e5f-48dc-ac5f-82588bedbf86.jpg" alt="Beginning PHP and MySQL 5" height="130" /></a></div>
</div>
        </div>
      </div>
      <div class="shelf_left column">&nbsp;</div>
      <div class="shelf_right column">&nbsp;</div>
</div>
<!--  last row end  -->    

<!--  row begin  -->   
<!--  row end  -->    
<!--  last row begin  -->    
<!--  last row begin  -->    
    <div id="bottom">
      <div class="center column">
        <div class="corner">&nbsp;</div>
      </div>
      <div class="left column">&nbsp;</div>
      <div class="right column">
        <div class="pad">Total: 15 Books<br />
          Created: 1/6/2015 2:13:32 AM</div>
      </div>
    </div>
  </div>
    <div id="copyright"><a href="http://www.alfaebooks.com">Created by Alfa Ebooks Manager</a></div>
</div>
</body>
</html>