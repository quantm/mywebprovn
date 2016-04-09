<meta name="description" content="Blog lập trình">
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
		.attr('action','http://myweb.pro.vn/html/index')
		.submit()
})
</script>

<? include_once 'include/program_left_panel.php';?>

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

<h3 class="intro_html">Giới thiệu HTML</h3>
<div style="margin-left: 18%;font-size:16px;margin-bottom:10px">Ngôn ngữ HTML xác định cách trình duyệt sẽ hiển thị một trang web, dưới đây là một ví dụ</div>

<div class="clr"></div>

<div class="w3-example">
<h5>Một tài liệu HTML đơn giản:</h5>
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">!DOCTYPE</span> <span class="highATT">html</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">html</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">head</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">title</span><span class="highGT">&gt;</span>Tiêu đề trang<span class="highLT">&lt;</span><span class="highELE">/title</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">/head</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">body</span><span class="highGT">&gt;</span><br><br><span class="highLT">&lt;</span><span class="highELE">h1</span><span class="highGT">&gt;</span>Tiêu đề đoạn văn<span class="highLT">&lt;</span><span class="highELE">/h1</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">p</span><span class="highGT">&gt;</span>Đoạn văn mở đầu<span class="highLT">&lt;</span><span class="highELE">/p</span><span class="highGT">&gt;</span><br><br>
<span class="highLT">&lt;</span><span class="highELE">/body</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">/html</span><span class="highGT">&gt;</span>
</div>
<a target="_blank" class="btn-try-it-yourself btn btn-inverse">Thực hành viết đoạn code bên trên</a>
</div>

<div class="code_editor_wrapper">
<h3 id="edit_html_below">Soạn thảo tài liệu HTML bên dưới</h3>
<textarea autocomplete="off" class="code_editor" wrap="logical" spellcheck="false">
<!DOCTYPE html>
<html>
<head>
<title>Tiêu đề trang</title>
</head>
<body>

<h1>Tiêu đề đoạn văn</h1>
<p>Đoạn văn mở đầu</p>

</body>
</html>
</textarea>
<a target="_blank" class="btn-render btn btn-inverse" style="display:none">Xem kết quả</a>
</div>

<ul style="margin-left:18%;margin-top:2%">
	<li>Khai báo <strong>DOCTYPE</strong> định nghĩa kiểu tài liệu là HTML</li>
	<li>Các thẻ giữa <strong>&lt;html&gt;</strong> và <strong>&lt;/html&gt;</strong> mô tả một tài liệu HTML</li>
	<li>Các thẻ giữa <strong>&lt;head&gt;</strong> và <strong>&lt;/head&gt;</strong> cung cấp thông tin (css,javascript,icon...) cho trang HTML</li>
	<li>Văn bản giữa <strong>&lt;title&gt;</strong> và <strong>&lt;/title&gt;</strong> cung cấp tiêu đề cho trang HTML</li>
	<li>Các thẻ giữa <strong>&lt;body&gt;</strong> và <strong>&lt;/body&gt;</strong> hiển thị nội dung của trang HTML</li>
	<li>Văn bản giữa <strong>&lt;h1&gt;</strong> và <strong>&lt;/h1&gt;</strong> mô tả tiêu đề</li>
	<li>Văn bản giữa <strong>&lt;p&gt;</strong> và <strong>&lt;/p&gt;</strong>mô tả đoạn</li>
</ul>

<hr style="width: 80%;margin-left: 18%;"/>

<h3 style="margin-left: 18%">Thẻ HTML</h3>
<div class="clr"></div>
<p class="p_html">Các thẻ HTML là <strong>các từ khóa</strong> trong dấu ngoặc nhọn :</p>

<div class="htmlHigh" style="margin-left:18%;font-size:20px;padding:10px;margin-bottom:10px;word-wrap:break-word;font-family:Consolas,'courier new'">
<span class="highLT">&lt;</span><span class="highELE">tên-thẻ</span><span class="highGT">&gt;</span>nội-dung<span class="highLT">&lt;</span><span class="highELE">/tên-thẻ</span><span class="highGT">&gt;</span>
</div>

<ul style="margin-left:18%">
	<li>Thẻ HTML thường đi đôi với nhau như  &lt;p&gt; and &lt;/p&gt;</li>
	<li>Thẻ đầu tiên là <b>thẻ bắt đầu</b> (thẻ mở),thẻ tiếp theo là thẻ <b>kết thúc</b> (thẻ đóng)</li>
	<li>Thẻ đóng được viết giống thẻ mở nhưng có dấu <strong>gạch chéo</strong> trước tên thẻ</li>
</ul>

<table class="lamp"  style="margin-left:18%">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td>Thẻ bắt đầu thường được gọi là <b>thẻ mở</b> Thẻ kết thúc thường được gọi là <b>thẻ đóng</b>.</td>
	</tr>
</tbody>
</table>

<h3 style="margin-left: 18%">Trình duyệt</h3>
<div class="clr"></div>
<p class="p_html">Các trình duyệt web (Chrome, IE, Firefox, Safari,...) có chức năng đọc tài liệu HTML và hiển thị</p> 
<p class="p_html">Trình duyệt không hiển thị các thẻ HTML, nhưng dùng nó để xác định cách hiển thị tài liệu HTML</p> 
<div class="clr"></div>
<img style="margin-left: 18%" src="http://xahoihoctap.net.vn/images/programming/html.png"/ title="Web browser read the HTML">

<hr style="width: 80%;margin-left: 18%;"/>

<h3 style="margin-left: 18%">Cấu trúc một trang HTML</h3>
<div class="clr"></div>
<p class="p_html">Bên dưới là cấu trúc một trang HTML</p> 
<div style="width:70%;border:1px solid grey;padding:3px;margin-left:18%;background-color:#ddd">&lt;html&gt;
<div style="width:90%;border:1px solid grey;padding:3px;margin:20px">&lt;head&gt;
<div style="width:90%;border:1px solid grey;padding:5px;margin:20px">&lt;title&gt;Tiêu đề&lt;/title&gt;
</div>
&lt;/head&gt;
</div>
<div style="width:90%;border:1px solid grey;padding:3px;margin:20px;background-color:#fff">&lt;body&gt;
<div style="width:90%;border:1px solid grey;padding:5px;margin:20px">&lt;h1&gt;Tiêu đề đoạn văn &lt;/h1&gt;</div>
<div style="width:90%;border:1px solid grey;padding:5px;margin:20px">&lt;p&gt;Đoạn văn mở đầu&lt;/p&gt;</div>
<div style="width:90%;border:1px solid grey;padding:5px;margin:20px">&lt;p&gt;Đoạn văn khác&lt;/p&gt;</div>
&lt;/body&gt;
</div>
&lt;/html&gt;
</div>
<div class="clr"></div>
<table class="lamp"  style="margin-left:18%">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td>Chỉ có các tag nằm trong thẻ body (khu vực màu trắng) là được hiển thị trên trình duyệt</td>
	</tr>
	<tr>
		<td></td>
		<td><a href="http://myweb.pro.vn/html?category=editor">Phần tiếp theo</a></td>
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
<div class="clr"></div

