<?php include_once 'include/analyticstracking.php';?>
<meta charset="UTF-8"/>
<title>Xác nhận truy cập</title>
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/story_book.png" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
<script type="text/javascript"  src="http://raovatnhanh.net.co/js/jquery-2.1.0.min.js"></script>
<body>
<style>
	body {
	--background-image:url('http://xahoihoctap.net.vn/images/hcm_university_of_science_my.jpg');
	--background-position: -34px;
	}
	.go_ads {
	position: absolute;
	margin-left: 34%;
	}
	.go_ads * {border:none !important;}
</style>

<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div style="margin-left:-10%" class="517324894" data-ants-zone-id="517324894"></div>

<div style="clear:both;height:25px"></div>

<div style="margin-left:30%;cursor:pointer" class="btn-view-doc btn btn-danger">Click vào đây để chuyển trang nhanh</div> 
	<span style="margin-left:5px;color:black">hoặc</span> 
<div style="margin-left:5px;cursor:pointer" class="btn-read-now btn btn-primary">Đọc ngay</div>

<div style="clear:both;height:25px"></div>

<div class="go_ads">
	<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16563.ads"></script>
</div>

<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div style="margin-top: 20%;margin-left: 1%;" class="517324908" data-ants-zone-id="517324908"></div>

</body>

<script type="text/javascript">
$(document)
.on('click','.btn-read-now,.btn-view-doc',function(){
	$('body').removeAttr('onbeforeunload')
	window.open('http://myweb.pro.vn/mydoc/xahoihoctapnetvn/<?=$id?>','_blank')
})
</script>