<meta name="description" content="Các thẻ HTML căn bản">
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
	$('#frm_render').submit()
})
</script>

<? include_once 'include/program_left_panel.php';?>

<div class="ads_right">
	<!--- Script ANTS - 120x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="517324793" data-ants-zone-id="517324793"></div>
	<!--- end ANTS Script -->
</div>

<a name="htm_intro"></a>

<h3 class="intro_html">Ví dụ HTML căn bản</h3>
<div style="margin-left: 18%;font-size:18px">Nếu các thẻ dùng trong các ví dụ này bạn chưa biết, bạn sẽ học nó trong các chương tiếp theo</div>
<hr style="width: 72%;margin-left: 18%;"/>

<h3 class="intro_html">Tài liệu HTML</h3>
<p class="p_html">Tất cả tài liệu HTML phải bắt đầu bằng khai báo: <strong>&lt;!DOCTYPE html&gt;</strong>.</p>
<p class="p_html">Tài liệu HTML bắt đầu bằng thẻ<strong>&lt;html&gt;</strong> và kết thúc với thẻ <strong> &lt;/html&gt;</strong>.</p>
<p class="p_html">Phần hiển thị của tài liệu HTML nằm giữa thẻ <strong>&lt;body&gt;</strong> và thẻ <strong> &lt;/body&gt;</strong>.</p>

<div class="w3-example">
<h5>Một tài liệu HTML đơn giản:</h5>
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">!DOCTYPE</span> <span class="highATT">html</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">html</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">head</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">title</span><span class="highGT">&gt;</span>Tiêu đề trang<span class="highLT">&lt;</span><span class="highELE">/title</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">/head</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">body</span><span class="highGT">&gt;</span><br><br><span class="highLT">&lt;</span><span class="highELE">h1</span><span class="highGT">&gt;</span>Tiêu đề đoạn văn<span class="highLT">&lt;</span><span class="highELE">/h1</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">p</span><span class="highGT">&gt;</span>Đoạn văn mở đầu<span class="highLT">&lt;</span><span class="highELE">/p</span><span class="highGT">&gt;</span><br><br>
<span class="highLT">&lt;</span><span class="highELE">/body</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">/html</span><span class="highGT">&gt;</span>
</div>
<a target="_blank" class="btn-try-it-yourself btn btn-inverse">Thực hành viết đoạn code trên</a>
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

<a name="html_heading"></a>
<h3 style="margin-left: 18%">Thẻ HTML tiêu đề (headings)</h3>
<div class="clr"></div>
<p class="p_html">Các thẻ tiêu đề được định nghĩa với các thẻ từ <strong>&lt;h1&gt;</strong> đến <strong>&lt;h6&gt;</strong></p>

<div class="w3-example">
<h5>Ví dụ thẻ HTML tiêu đề (headings):</h5>
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">!DOCTYPE</span> <span class="highATT">html</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">html</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">head</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">title</span><span class="highGT">&gt;</span>Thẻ tiêu đề HTML (headings)<span class="highLT">&lt;</span><span class="highELE">/title</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">/head</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">body</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">h1</span><span class="highGT">&gt;</span>Tiêu đề đoạn văn<span class="highLT">&lt;</span><span class="highELE">/h1></span></br>
<span class="highLT">&lt;</span><span class="highELE">h2</span><span class="highGT">&gt;</span>Tiêu đề đoạn văn<span class="highLT">&lt;</span><span class="highELE">/h2></span></br>
<span class="highLT">&lt;</span><span class="highELE">h3</span><span class="highGT">&gt;</span>Tiêu đề đoạn văn<span class="highLT">&lt;</span><span class="highELE">/h3</span>
<span class="highGT">&gt;</span></br>
<span class="highLT">&lt;</span><span class="highELE">/body</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">/html</span><span class="highGT">&gt;</span>
</div>
<a target="_blank" class="btn btn-inverse" onclick="$('#return').val(document.location.href+'#html_heading');$('#code_editor_heading_wrapper,#code_editor_heading_wrapper a').show()">Thực hành viết đoạn code trên</a>
</div>

<div id="code_editor_heading_wrapper" class="code_editor_wrapper" style="display:none">
<h3 style="margin-left:18%">Soạn thảo tài liệu HTML bên dưới</h3>
<textarea autocomplete="off" class="code_editor" id="code_editor_heading" style="display:block !important" wrap="logical" spellcheck="false">
<!DOCTYPE html>
<html>
<head>
<title>Thẻ tiêu đề HTML (headings)</title>
</head>
<body>

<h1>Tiêu đề đoạn văn</h1>
<h2>Tiêu đề đoạn văn</h2>
<h3>Tiêu đề đoạn văn</h3>

</body>
</html>
</textarea>
<a target="_blank" class="btn btn-inverse" style="margin-left:18%" onclick="$('#render').val($('#code_editor_heading').val());$('#frm_render').submit()">Xem kết quả</a>
</div>

<a name="html_paragraph"></a>

<h3 style="margin-left: 18%">Đoạn văn HTML (paragraphs)</h3>
<div class="clr"></div>
<p class="p_html">Đoạn văn HTML được định nghĩa với thẻ <strong>&lt;p&gt;</strong></p>

<div class="w3-example">
<h5>Ví dụ thẻ HTML tiêu đề (headings):</h5>
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">!DOCTYPE</span> <span class="highATT">html</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">html</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">head</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">title</span><span class="highGT">&gt;</span>Thẻ tiêu đề HTML (headings)<span class="highLT">&lt;</span><span class="highELE">/title</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">/head</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">body</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">p</span><span class="highGT">&gt;</span>Đây là một đoạn văn<span class="highLT">&lt;</span><span class="highELE">/p></span></br>
<span class="highLT">&lt;</span><span class="highELE">p</span><span class="highGT">&gt;</span>Đây là một đoạn văn khác<span class="highLT">&lt;</span><span class="highELE">/p></span></br>
<span class="highLT">&lt;</span><span class="highELE">/body</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">/html</span><span class="highGT">&gt;</span>
</div>
<a target="_blank" class="btn btn-inverse" onclick="$('#return').val(document.location.href+'#html_paragraph');$('#code_editor_paragraph_wrapper,#code_editor_paragraph_wrapper a').show()">Thực hành viết đoạn code trên</a>
</div>

<div id="code_editor_paragraph_wrapper" class="code_editor_wrapper" style="display:none">
<h3 style="margin-left:18%">Soạn thảo tài liệu HTML bên dưới</h3>
<textarea autocomplete="off" class="code_editor" id="code_editor_paragraph" style="display:block !important" wrap="logical" spellcheck="false">
<!DOCTYPE html>
<html>
<head>
<title>Đoạn văn HTML (paragraphs)</title>
</head>
<body>

<p>Đây là một đoạn văn</p>
<p>Đây là một đoạn văn khác</p>

</body>
</html>
</textarea>
<a target="_blank" class="btn btn-inverse" style="margin-left:18%" onclick="$('#render').val($('#code_editor_paragraph').val());$('#frm_render').submit()">Xem kết quả</a>
</div>

<a name="html_link"></a>

<h3 style="margin-left: 18%">Liên kết trong trang HTML</h3>
<div class="clr"></div>
<p class="p_html">Liên kết trong trang HTML được định nghĩa bởi thẻ  <strong>&lt;a&gt;</strong></p>

<div class="w3-example">
<h5>Ví dụ liên kết trong trang HTML:</h5>
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">a</span> <span class="highATT">href=</span><span class="highVAL">"http://www.xahoihoctap.net.vn"</span><span class="highGT">&gt;</span>Đây là một liên kết<span class="highLT">&lt;</span><span class="highELE">/a</span><span class="highGT">&gt;</span>
</div>
<a target="_blank" class="btn btn-inverse" onclick="$('#return').val(document.location.href+'#html_link');$('#code_editor_link_wrapper,#code_editor_link_wrapper a').show()">Thực hành viết đoạn code trên</a>
</div>

<div id="code_editor_link_wrapper" class="code_editor_wrapper" style="display:none">
<h3 style="margin-left:18%">Soạn thảo tài liệu HTML bên dưới</h3>
<textarea autocomplete="off" class="code_editor" id="code_editor_link" style="display:block !important" wrap="logical" spellcheck="false">
<!DOCTYPE html>
<html>
<head>
<title>Liên kết trong trang HTML</title>
</head>
<body>

<a href="http://xahoihoctap.net.vn/">Đây là một liên kết</a>

</body>
</html>
</textarea>
<a target="_blank" class="btn btn-inverse" style="margin-left:18%" onclick="$('#render').val($('#code_editor_link').val());$('#frm_render').submit()">Xem kết quả</a>
</div>

<a name="html_image"></a>

<h3 style="margin-left: 18%">Hình ảnh trong trang HTML</h3>
<div class="clr"></div>
<p class="p_html">Hình ảnh trong trang HTML được định nghĩa bởi thẻ  <strong>&lt;img&gt;</strong></p>
<p class="p_html">Đường dẫn (<b>src</b>), văn bản thay thế (<b>alt</b>) và kích thước (<b>width</b> và <b>height</b>) là những thuộc tính</p>

<div class="w3-example">
<h5>Ví dụ sử dụng hình ảnh trong trang HTML:</h5>
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">img</span> <span class="highATT">src=</span><span class="highVAL">"https://scontent-hkg3-1.xx.fbcdn.net/hphotos-xpa1/t31.0-8/c0.83.851.315/p851x315/10506915_864253046932890_2629971463990181579_o.jpg"</span><span class="highGT">&gt;</span><span class="highLT">&lt;</span><span class="highELE">/img</span><span class="highGT">&gt;</span>
</div>
<a target="_blank" class="btn btn-inverse" onclick="$('#return').val(document.location.href+'#html_image');$('#code_editor_img_wrapper,#code_editor_img_wrapper a').show()">Thực hành viết đoạn code trên</a>
</div>

<div id="code_editor_img_wrapper" class="code_editor_wrapper" style="display:none">
<h3 style="margin-left:18%">Soạn thảo tài liệu HTML bên dưới</h3>
<textarea autocomplete="off" class="code_editor" id="code_editor_img" style="display:block !important" wrap="logical" spellcheck="false">
<!DOCTYPE html>
<html>
<head>
<title>Hình ảnh trong trang HTML</title>
</head>
<body>

<img src="https://scontent-hkg3-1.xx.fbcdn.net/hphotos-xpa1/t31.0-8/c0.83.851.315/p851x315/10506915_864253046932890_2629971463990181579_o.jpg"></img>

</body>
</html>
</textarea>
<a target="_blank" class="btn btn-inverse" style="margin-left:18%" onclick="$('#render').val($('#code_editor_img').val());$('#frm_render').submit()">Xem kết quả</a>
</div>


<table class="lamp"  style="margin-left:15%">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td>Bạn sẽ học thêm về thuộc tính trong các chương tiếp theo</td>
	</tr>
	<tr>
		<td></td>
		<td><a href="http://myweb.pro.vn/html?category=element">Phần tiếp theo</a></td>
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

<form id="frm_render" method="post" action="http://myweb.pro.vn/html/index">
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
	<input type="hidden" name="render" id="render"/>
	<input type="hidden" name="return" id="return"/>
</form>

