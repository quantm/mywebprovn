<? include_once 'include/analyticstracking.php';?>
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/compare_vn_redirect.css" />
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/dollar_icon.png" type="image/x-icon"/>
<meta charset="UTF-8"/>
<title>Tới shop bán sản phẩm... </title>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
$(document)
.ready(function(){

})

.on('click','.home',function(){
	window.open('http://myweb.pro.vn/so-sanh-gia','_parent')
})

//hightlight advertisement onmouseover
.on('mouseover','.adv_items, .adv_item',function(){
	$(this).addClass('advertisement_hightlight')
})
.on('mouseout','.adv_items, .adv_item',function(){
	$(this).removeClass('advertisement_hightlight')
})
//end
.on('contextmenu',function(){
	return false;	
})

</script>

<form id="cse-search-box" class="pull-left navbar-form" method="post" action="http://myweb.pro.vn/product/search">
  <div>
    <input type="text" required class="cse_box" name="q" size="115" placeholder="Nhập sản phẩm và nhấn Enter để tìm giá rẻ nhất...">
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
  </div>
  <input type="submit" value="Tìm" class="btn btn-danger search"></input>
  <input type="button" value="Trang chủ" class="btn btn-primary home"></input>
</form>   

<div class="lazada_left">
	<!--- Script ANTS - 120x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="517324793" data-ants-zone-id="517324793"></div>
	<!--- end ANTS Script -->
</div>

<iframe id="shop_redirected" src="<?=$url?>">