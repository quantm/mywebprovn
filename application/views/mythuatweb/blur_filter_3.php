<meta charset="UTF-8"/>
<meta name="description" content="Học photoshop - Channel  and Blending Mode"/>
<meta property="og:image" content="http://myweb.pro.vn/images/photoshop/3.1.jpg" />
<style>
.social_shared {
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #0B0000), color-stop(1, #0B0000));
  background: -moz-linear-gradient(top, #0B0000, #0B0000);
  border: 1px solid #ccc;
  float: left;
  padding: 0 0 3px 0;
  position: fixed;
  left: 0;
  z-index: 10;
  border-radius: 2px 2px 2px 2px;
  box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
  width: 100px;
  width: 95px;
  height: 180px;
  margin-left: -6%;
  margin-top: 245px;
}
.huong_dan span {
font-weight:bold;
}

.social_shared  div ,#twitter-widget-0 {
	margin-left: 15px!important;
	margin-top: 5px!important;
}

.show_social_shared {
 margin-left: 0%!important;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #F3EBEB), color-stop(1, #F9F9F9))!important;
  background: -moz-linear-gradient(top, #fff, #F9F9F9)!important;
}
.modal-header-title {
	font-size: 15px;
	margin-left: 15px;
	color: blue;
	font-weight: bold;
}
.ads_micro_vn_header {
position: absolute;
margin-left: 10%;
margin-top: 25px;
}
.content_wrapper {
position: absolute;
margin-top: 13%;
margin-left: 10%;
font-size: 15px;
}
#bai_tap_du_lieu_dau_vao,#bai_tap_du_lieu_dau_ra {
  display: block;
  width: 98%;
  height: 100%;
  margin-left: -49%;
  margin-top: -19%;
  overflow: hidden;
}
.save_as {
color: blue;
cursor: pointer;
float: left;
margin-top: 1%;
font-size: 14px;
height: 35px;
}
.close_as{
margin-top: 0%;
font-size: 14px;
height: 35px;
cursor:pointer;
float:right;
color: red;
z-index: 10000;
}
body{
overflow-x:hidden;
}
#output_data {
  color: blue;
  cursor: pointer;
  float: right;
  margin-top: -4%;
  margin-left: 49%;
  position: absolute;
}
.ads_micro_vn_right {
margin-left:77%;
margin-top: 2%;
position:fixed;
}
.in_modal_ads_right {
float:right;
margin-right: 7px;
}
#modal_video {
display: block;
width: 75%;
margin-left: -37%;
height: 87%;
overflow: hidden;
}
#ads_zone16548 {
  position: absolute!important;;
  margin-left: -19%!important;
}

.tieu_de_huong_dan {
  cursor: pointer;
  position: absolute;
  margin-left: 0%;
  margin-top: -1%;
  width: 100%;
}
.huong_dan {
  max-width: 600px;
  text-align: justify;
}
</style>
<script>
$.fn.flash = function(duration, iterations) {
    duration = duration || 1000; // Default to 1 second
    iterations = iterations || 1; // Default to 1 iteration
    var iterationDuration = Math.floor(duration / iterations);

    for (var i = 0; i < iterations; i++) {
        this.fadeOut(iterationDuration).fadeIn(iterationDuration);
    }
    return this;
}

//ads_micro_right:make notification to the user
var i=0
$(window).scroll(function(){
	i++;
	if(i==1){
	$(".ads_micro_vn_right").flash(1500,3)
	}
})
//end

$(document)
	.ready(function(){
	$(".ads_micro_vn_header").flash(1200,4)
	var ssvzone_16570_index=0;
	
	//set video path and video title
	$('#xem_phim_huong_dan').mouseover(function(){
		$('#modal_video .modal-header-title').html('Photoshop - Hướng dẫn');
		$("#modal_video").find('iframe').attr('src','https://www.youtube.com/embed/BdNW6a-gdu8')
	})
		$('#xem_phim_minh_hoa').mouseover(function(){
		$('#modal_video .modal-header-title').html('Photoshop - Minh họa');
		$("#modal_video").find('iframe').attr('src','https://www.youtube.com/embed/yD4Yp-jCC4g')
	})
	//end
	$('body').mousemove(function(){
		ssvzone_16570_index++
		
		//highlight right advertisement
		if(ssvzone_16570_index=="150"){
			$(".ads_micro_vn_right").flash(1500,3)
		}	
		//end

		//highlight header advertisement
		if(ssvzone_16570_index=="400"){
			$(".ads_micro_vn_header").flash(1200,4)
		}
		//end
	})
	//end
})
.on('mouseover','.social_shared',function(){
	$(this).addClass('show_social_shared')
})
.on('mouseout','.social_shared',function(){
	$(this).removeClass('show_social_shared')
})


</script>

<div class="social_shared">
<div class="fb-like" data-href="http://myweb.pro.vn/photoshop/chanel-blending-mode" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>

<div class="clr"></div>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>
<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->

<div class="g-plusone" data-size="medium"></div>

<div class="clr"></div>

<!-- start twitter shared-->
<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<!-- end twitter shared-->

</div>

<div class="ads_micro_vn_right">
	<!--- Script ANTS - 300x600 -->
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324837.js"></script>
	<!--- end ANTS Script -->
</div>

<div class="ads_micro_vn_header">
<!--- Script ANTS - 1000x200 -->
<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517549245.js"></script>
<!--- end ANTS Script -->
</div>

<!--start content_wrapper-->
<div class='content_wrapper'>`
Ứng dụng các kiến thức đã học, kết hợp Channel và các chế độ Blendinh Mode thực hiện lại theo mẫu.
<div style="clear:both;height:15px"></div>

<a  style="cursor:pointer" id='xem_phim_minh_hoa'  data-toggle='modal' data-target="#modal_video">
	<i class="fa fa-youtube fa-3x"></i> Xem phim minh họa
</a>

<a  id="xem_phim_huong_dan" class='tieu_de_huong_dan' data-toggle='modal' data-target="#modal_video">
	<i style="margin-left: 24%;" class="fa fa-youtube fa-3x"></i> Xem hướng dẫn giải
</a>
<div style="clear:both"></div>
<img src='http://myweb.pro.vn/images/photoshop/3.1.jpg' alt='Photoshop - Channel and Blending Mode'/>

<p style="color:blue;cursor:pointer;margin-top: 1%;">
	<a  href="https://www.mediafire.com/?f23cljnuh2cj0hr" target="_new">Click để lấy file ảnh bài tập</a>
</p>
<p id="output_data" >
	<a href="https://www.mediafire.com/?mo7gnsukv99c4tx" target="_new">Click để lấy file kết quả</a>
</p>

<p style="color:red;font-weight:bold">Yêu cầu:</p>
<div style="clear:both"></div>
Ứng dụng các kỹ thuật
<ul>
<li>Ứng dụng các kỹ thuật đã học </li>
<li>Công cụ cọ vẽ Brush</li>
<li>Các công cụ và lệnh phục chế ảnh</li>
<li>Các lệnh hiệu chỉnh màu</li>
<li>Channel và các chế độ hòa trộn (Blending Mode)</li>
</ul>

<p style="color:red;font-weight:bold">Hướng dẫn:</p>
<div style="clear:both"></div>
<ul class="huong_dan">
<li>Xóa nền trắng, lưu ý phần cuộn giấy trên tay người đàn ông và phần giấy trắng của quyển sách bìa xanh</li>
<li><span>Nền :</span>  Tô chuyển sắc cam - vàng</li>
<li><span>Quyển sách : </span> Dùng chế độ hòa trộn là Multiply</li>
<li><span>Chữ bên dưới tròng kính: </span>Dùng chế độ hòa trộn là Overlay</li>
<li><span>Vòng elip :</span> Sử dụng Mode Color Burn và hiệu ứng Outer Glow.</li>
<li><span>Người:  </span>Hiệu ứng Outer Glow</li>
<li><span>Bốn góc vuông:   </span>Tạo một khung hình chữ nhật (Stroke) quanh chữ -> Xóa bớt phần thừa</li>
</ul>

<p style="color:red;font-weight:bold">Các bài khác:</p>
<div style="clear:both"></div>
<ul class="huong_dan">
<li><a href="/photoshop/phuc-che-anh-trang-den">Phục chế ảnh trắng đen</a></li>
<li><a href="/photoshop/hieu-chinh-anh-mau">Hiệu chỉnh ảnh màu bài 1</a></li>
<li><a href="/photoshop/hieu-chinh-anh-mau?id=2">Hiệu chỉnh ảnh màu bài 2</a></li>
<li><a href="/photoshop/hieu-chinh-anh-mau?id=3">Hiệu chỉnh ảnh màu bài 3</a></li>
<li><a href="/photoshop/hieu-chinh-anh-mau?id=4">Hiệu chỉnh ảnh màu bài 4</a></li>
<li><a href="/photoshop/chanel-blending-mode?id=2">Channel and Blending Mode bài 2</a></li>
</ul>

</div>
<!--//end content_wrapper-->

<!--start modal video huong_dan-->
<div class="modal hide fade" id="modal_video">
	<div class='modal-header'>
		<span class='modal-header-title'></span>
		<span class="close_as" data-dismiss="modal">Đóng</span>
	</div>
<div class="modal-body">
	<iframe width="750" height="500" autoplay  frameborder="0"></iframe>
	
<div class="in_modal_ads_right">
	<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16553.ads"></script>
</div>

</div>


</div>
<!--/end modal video-->


