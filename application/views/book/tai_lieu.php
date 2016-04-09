<meta property="og:title" content="<?=$book_title?>" />
<meta property="og:type" content="book" />
<meta property="og:description" content="<?=$book_description?>" />
<meta property="og:url" content="<?=$share_url?>" />
<meta name="description" content="<?=$book_description?>" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|3d-float" type="text/css">
<style>
.general_category {
	cursor:pointer;
}
.book_category {
	display:none;
	float: left;
	padding: 0 0 3px 0;
	position: fixed;
	left: 0;
	z-index: 10000;
	border-radius: 2px 2px 2px 2px;
	width: 180px;
	margin-top: 115px;
	margin-left: 40%;
	line-height: 20px;
	font-size: 14px;
	color: rgb(241, 241, 241);
	background-color: rgb(18, 1, 1);	
}
.book_category div{
  margin-left: 7px;
}
.book_category a:link {
	color: #52915C;
	text-decoration: none;
	font-weight:bold;
}
#book_title_read_online {
	color:blue;
	height: 0px;
	margin-left: 1%;
	font-size: 15px;
	margin-top: 2px;
	font-weight: bold;
}
#book_lookup_word {
	float:left;
	color: rgb(0, 112, 255);
	margin-left: 15px;
	margin-top: 3px;
	width:95%;
}
.book-thumbs{
	margin-left: 2%;
	position:absolute;
	width:140px;
	height:180px;
}
.tb_dang_ky {
	float: right;
	position: fixed;
	width: 100%;
	margin-top: -15px;
	margin-left: 15px;
	font-size: 14px;
}
.book_name {
	margin-top: 5px;
	font-size: 15px;
	margin-left: 25px;
	line-height: 17px;
	max-width: 900px;
}
.book_description {
	margin-left: 25px;
	font-size: 15px;
	text-align: justify;
	max-width: 75%;
	max-height:75px;
	position: absolute;
}
.social_link div{
margin-left:10px !important;
}
.social_link {
	height: 30px;
	float: left;
	padding: 0 0 3px 0;
	position: absolute;
	left: 0;
	z-index: 10;
	width: 229px;
	margin-left: 62%;
	margin-top: 32px;
}
.book_header {
  background-color: #FFFFFF;
  position: absolute;
  margin-top: 25px;
  width: 69.5%;
  margin-left: 11%;
  height: 35px;
}
body {
	background-image: linear-gradient(to bottom, #B09494, #000000);
	overflow:hidden;
}
#btn-read-online {
	margin-left: 25px;
	position: absolute;
	margin-top:185px;
}
#modal_read_online{
	margin-top: -21.6%;
	display: block;
	width: 99%;
	margin-left: -49.5%;
	height: 98%;
	overflow-y: hidden;
}
#modal_read_online h1 {
	height:4px;
}
.embed_book{
	width: 98%;
	height: 90%;
	margin-top: 25px;
}
#book_load_and_share {
	width: 400px;
	height: 20px;
	float: right;
	margin-left: 70%;
	position: absolute;
	margin-top: 4px;
	color: red;
}
.modal_book_name{
	float: left;
	margin-top: 7px;
	margin-left: 300px;
	font-size: 14px;
}
.tai_lieu_viewer {
  width: 945px;
  height: 600px;
  margin-top: 65px;
  margin-left: 11%;
}
.ads_micro_left {
  width: 250px;
  height: 600px;
  position: absolute;
  float: left;
  margin-left: 81.5%;
  margin-top: 1.8%;
}
.ads_micro_right {
  width: 120px;
  height: 600px;
  position: absolute;
  float: left;
  margin-left: 1.5%;
  margin-top: 1.8%;
  background-color: white
}
#close_category{
  float: right;
  margin-top: -1px;
  font-size: 25px;
  float:right;
  cursor:pointer;
}
</style>
<script type="text/javascript">
$.fn.flash = function(duration, iterations) {
duration = duration || 1000; // Default to 1 second
iterations = iterations || 1; // Default to 1 iteration
var iterationDuration = Math.floor(duration / iterations);

for (var i = 0; i < iterations; i++) {
this.fadeOut(iterationDuration).fadeIn(iterationDuration);
}
return this;
}
$(document)
//start ready function
.ready(function(){

//ads_micro_left:make notification to the user
var book_pdf_html_index=0
$('.tai_lieu_viewer').mouseover(function(){
book_pdf_html_index++
if(book_pdf_html_index==1){
$("#ads_zone16553").flash(1200,5)
}
})
//end
})
//end ready function

//show general category
.on('mouseover','.general_category',function(){
	$('.book_category').show('slow')
})
.on('click','#close_category',function(){
	$('.book_category').hide('slow')	
})
//end
</script>

<!-- 120-600-->
<div class='ads_micro_right'>
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17687.ads"></script>
</div>
<!---//-->

<!-- 220-600-->
<div class='ads_micro_left'>
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16623.ads"></script>
</div>
<!---//-->

<div class="book_category">
<span title="Đóng" id="close_category">×</span>
<?php foreach($category_names as $key):?>
<div><a href="/book/category?category=<?=$key['CATEGORY']?>" target="_new"><?=$key['CATEGORY']?></a></div>
<?php endforeach;?>
</div>

<div class="book_header">
<h2 class='book_name font-effect-putting-green'>
<span  class="general_category">Danh mục tổng quát</span> <i class='fa fa-long-arrow-right'></i>
<a title='<?=$cate_name?>' href='/book/category/?id_category=<?=$id_cate?>' target='_new'><?=$cate_name?></a> <i class='fa fa-long-arrow-right'></i> <?=$book_title?>
</h2>
</div>

<iframe src="<?=$embed_url?>" class='tai_lieu_viewer'></iframe>
