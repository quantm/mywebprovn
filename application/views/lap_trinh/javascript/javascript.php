<meta name="description" content="Tổng quan JavaScript">
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/programming.css"/>	
<script type="text/javascript">
$(document)
.ready(function(){
	$('#return').val(document.location.href)
})
.on('click','.btn-try-it-yourself',function(){
	$('.code_editor,#edit_html_below,.btn-render').show()
	$('.code_editor a')
		.html('Xem kết quả')
		.addClass('btn-render')
	$('.code_editor h3').html('Soạn thảo tài liệu HTML bên dưới')
})
.on('click','.btn-render',function(){
	$('#render').val($('.code_editor').val())
	$('#frm_render')
		.attr('action','http://myweb.pro.vn/javascript/index')
		.submit()
})
</script>

<? include_once 'include/javascript_left_panel.php';?>

<form id="frm_render" method="post">
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
	<input type="hidden" name="render" id="render"/>
	<input type="hidden" name="return" id="return"/>
</form>

<div class="ads_right">
	<!--- Script ANTS - 120x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="517324793" data-ants-zone-id="517324793"></div>
	<!--- end ANTS Script -->
</div>

<a name="htm_intro"></a>

<h3 class="intro_html">Javascript</h3>
<div style="font-size:18px">
	<p class="p_html">Javascript là ngôn ngữ lập trình ở phía client side. </p>
	<p class="p_html">Bài hướng dẫn này sẽ trình bày những điều từ căn bản đến nâng cao của Javascript</p>
</div>
<hr style="width: 80%;margin-left: 18%;"/>

<h3 style="margin-left: 18%">Các ví dụ trong mỗi chương</h3>
<div class="clr"></div>
<p class="p_html">Với trình "Viết đoạn code trên", bạn có thể thực hành các ví dụ trong chương và xem kết quả</p>

<div class="w3-example">
<h5>Ví dụ</h5>
<div class="w3-code notranslate htmlHigh">
<h3>Đoạn Code Javascript đầu tiên của tôi</h3>
<button type="button" onclick="document.getElementById('demo').innerHTML=Date()">
Click me to display Date and Time</button>
<p id="demo"></p>
</div>
<a target="_blank" class="btn-try-it-yourself btn-write-thecode">Viết đoạn code trên</a>
</div>

<div class="code_editor_wrapper">
<h3 id="edit_html_below">Viết đoạn code bên dưới</h3>
<textarea autocomplete="off" class="code_editor" wrap="logical" spellcheck="false" style="height: 27% !important;">

<h3>Đoạn Code Javascript đầu tiên của tôi</h3>
<button type="button" onclick="document.getElementById('demo').innerHTML=Date()">
Click me to display Date and Time</button>
<p id="demo"></p>

</textarea>
<a target="_blank" class="btn-render btn btn-inverse" style="display:none;margin-top: 120px;">Xem kết quả</a>
</div>

<div class="clr"></div>

<table class="lamp"  style="margin-left:18%;margin-top:15px">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td>Chúng khuyên bạn nên đọc  bài hướng dẫn này theo trình tự đã sắp xếp ở menu bên trái</td>
	</tr>
</tbody>
</table>

<h3 style="margin-left: 18%">Học thông qua ví dụ</h3>
<div class="clr"></div>
<p class="p_html">Ví dụ để thực hành tốt hơn cả 1000 từ. Ví dụ thường dễ hiểu hơn so với sự giải thích bằng văn tự </p> 
<p class="p_html">Các bài hướng dẫn trong chương này đi kèm với trình "Viết đoạn code trên" sẽ giúp bạn hiểu bài hơn </p> 
<div class="clr"></div>
<table class="lamp"  style="margin-left:18%;margin-top:15px">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td>Nếu bạn thử làm tất cả các ví dụ, bạn sẽ học được rất nhiều về JavaScript trong một thời gian ngắn</td>
	</tr>
</tbody>
</table>
<div class="clr"></div>

<h3 style="margin-left: 18%">Tại sao bạn học JavaScript</h3>
<div class="clr"></div>
<p class="p_html">JavaScript là một trong ba ngôn ngữ mà tất cả các nhà phát triển web cần phải học :</p>

<ul style="margin-left:18%;list-style:none">
	<li style="margin-left:15px">1. <b>HTML</b> định nghĩa nội dung trang web</li>
	<li style="margin-left:15px">2. <b>CSS  </b> xác định bố cục của trang web</li>
	<li style="margin-left:15px">3. <b>JavaScript  </b> để lập trình cách người dùng cuối tương tác với trang web </li>
</ul>

<p class="p_html">Bài viết hướng dẫn này là về JavaScript và cách JavaScript làm việc với HTML và CSS</p>

<hr style="width: 80%;margin-left: 18%;"/>

<h3 style="margin-left: 18%">Tốc độ học</h3>
<p class="p_html">Tốc độ học hoàn toàn do bạn, nếu bạn cảm thấy căng thẳng hãy nghĩ nghơi hoặc đọc lại các bài trước</p>
<p class="p_html"><b>Luôn luôn đảm bảo</b> bạn hiểu các ví dụ thông qua trình "Viết đoạn code trên"</p>

<table class="lamp"  style="margin-left:15%">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td>Bạn sẽ học thêm về JavaScrip trong các chương tiếp theo</td>
	</tr>
	<tr>
		<td></td>
		<td><a href="http://myweb.pro.vn/javascript?category=intro">Phần tiếp theo</a></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<!--- Script ANTS - 728x90 --> 
			<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
			<div class="517324894" data-ants-zone-id="517324894"></div>
			<!--- end ANTS Script -->
		</td>
	</tr>
</tbody>
</table>
