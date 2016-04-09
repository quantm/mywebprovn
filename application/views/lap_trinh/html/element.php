<meta name="description" content="HTML căn bản - Thành phần của trang HTML">
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

<h3 class="intro_html">Thành phần của trang HTML</h3>
<div style="margin-left: 18%;font-size:18px">Tài liệu HTML được tạo nên bởi các thành phần HTML</div>
<hr style="width: 72%;margin-left: 18%;"/>

<h3 class="intro_html">Thành phần HTML</h3>
<p class="p_html">Thành phần HTML được viết bởi một thẻ bắt đầu, một thẻ kết thúc và nội dung ở giữa như bên dưới:</p>

<div class="htmlHigh" style="font-size:20px;padding:10px;margin-bottom:10px;margin-left:18%">
<span class="highLT">&lt;</span><span class="highELE">tênthẻ</span><span class="highGT">&gt;</span>nộidung<span class="highLT">&lt;</span><span class="highELE">/tênthẻ</span><span class="highGT">&gt;</span>
</div>

<table style="margin-left:18%" class="w3-table-all notranslate">
<tbody><tr>
<th align="left" style="width:33%">Thẻ bắt đầu</th>
<th style="width:33%">Thành phần nội dung</th>
<th align="right">Thẻ kết thúc</th>
</tr>
<tr>
<td>&lt;h1&gt;</td>
<td>Tiêu đề đầu tiên</td>
<td style="text-align:right">&lt;/h1&gt;</td>
</tr>
<tr>
<td>&lt;p&gt;</td>
<td>Đoạn văn đầu tiên</td>
<td style="text-align:right">&lt;/p&gt;</td>
</tr>
<tr>
<td>&lt;br&gt;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody></table>

<div class="clr"></div>

<table class="lamp"  style="margin-left:18%">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td>Một số thành phần HTML có thể không cần thẻ đóng</td>
	</tr>
</tbody>
</table>

<a name="html_nested"></a>
<h3 style="margin-left: 18%">Các thành phần HTML lồng nhau</h3>
<div class="clr"></div>
<p class="p_html">Các thành phần HMTL có thể lồng vào nhau (các thành phần có thể chứa lẫn nhau). Mã HTML sẽ gồm nhiều các thành phần HTML lồng vào nhau.</p>
<p class="p_html">Dưới đây là ví dụ chứa 4 thành phần HTML</p>

<div class="w3-example">
<h5>Ví dụ HTML lồng nhau:</h5>
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">!DOCTYPE</span> <span class="highATT">html</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">html</span><span class="highGT">&gt;</span><br>
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
<body>

<h1>Tiêu đề đoạn văn</h1>
<p>Đoạn văn mở đầu</p>

</body>
</html>
</textarea>
<a target="_blank" class="btn-render btn btn-inverse" style="display:none">Xem kết quả</a>
</div>

<a name="html_heading"></a>
<h3 style="margin-left: 18%">Giải thích ví dụ</h3>
<div class="clr"></div>
<p class="p_html">Thành phần <strong>&lt;html&gt;</strong> định nghĩa toàn bộ tài liệu HTML</p>
<p class="p_html">Nó bắt đầu bắt đầu bằng thẻ <strong>&lt;html&gt;</strong> và kết thúc bằng thẻ <strong>&lt;/html&gt;</strong></p>
<p class="p_html">Nội dung của thành phần <strong>&lt;html&gt;</strong> là các thành phần HTML khác (<strong>&lt;body&gt;</strong>,<strong>&lt;div&gt;</strong>...)</p>

<div class="w3-example">
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">!DOCTYPE</span> <span class="highATT">html</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">html</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">body</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">h1</span><span class="highGT">&gt;</span>Tiêu đề đoạn văn<span class="highLT">&lt;</span><span class="highELE">/h1></span></br>
<span class="highLT">&lt;</span><span class="highELE">p</span><span class="highGT">&gt;</span>Tiêu đề đoạn văn<span class="highLT">&lt;</span><span class="highELE">/p></span></br>
<span class="highLT">&lt;</span><span class="highELE">/body</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">/html</span><span class="highGT">&gt;</span>
</div>
</div>

<div class="clr"></div>

<p class="p_html">Thành phần <strong>&lt;body&gt;</strong> định nghĩa <strong>document body</strong>.</p>
<p class="p_html"><strong>Nội dung </strong> của thành phần <strong>&lt;body&gt;</strong> là hai thành phần HTML khác (&lt;h1&gt; and &lt;p&gt;)</p>

<div class="w3-example">
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">body</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">h1</span><span class="highGT">&gt;</span>Đây là một đoạn văn<span class="highLT">&lt;</span><span class="highELE">/h1></span></br>
<span class="highLT">&lt;</span><span class="highELE">p</span><span class="highGT">&gt;</span>Đây là một đoạn văn khác<span class="highLT">&lt;</span><span class="highELE">/p></span></br>
<span class="highLT">&lt;</span><span class="highELE">/body</span><span class="highGT">&gt;</span>
</div>
</div>

<div class="clr"></div>
<p class="p_html">Thành phần <strong>&lt;h1&gt;</strong> định nghĩa tiêu đề và có thẻ bắt đầu &lt;h1&gt; và thẻ kết thúc &lt;/h1&gt</p>
<p class="p_html"><strong>Nội dung</strong>  của nó là : Đây là một đoạn văn.</p>

<div class="w3-example">
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">h1</span><span class="highGT">&gt;</span>Đây là một đoạn văn<span class="highLT">&lt;</span><span class="highELE">/h1</span><span class="highGT">&gt;</span>
</div>
</div>

<a name="html_dont_forget_close_tag"></a>

<h3 style="margin-left: 18%">Đừng quên thẻ đóng</h3>
<div class="clr"></div>
<p class="p_html">Một số thành phần HTML vẫn hiển thị đúng trên trình duyệt mặc dù bạn quên thẻ đóng</p>

<div class="w3-example">
<h5>Ví dụ </h5>
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">html</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">body</span><span class="highGT">&gt;</span><br><br>
	<span class="highLT">&lt;</span><span class="highELE">p</span><span class="highGT">&gt;</span>Đây là một đoạn văn<br>
	<span class="highLT">&lt;</span><span class="highELE">p</span><span class="highGT">&gt;</span>Đây là một đoạn văn<br>
<br><span class="highLT">&lt;</span><span class="highELE">/body</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">/html</span><span class="highGT">&gt;</span></div>
<a target="_blank" class="btn btn-inverse" onclick="$('#return').val(document.location.href+'#html_dont_forget_close_tag');$('#code_editor_img_wrapper,#code_editor_img_wrapper a').show()">Thực hành viết đoạn code trên</a>
</div>

<div id="code_editor_img_wrapper" class="code_editor_wrapper" style="display:none">
<h3 style="margin-left:18%">Soạn thảo tài liệu HTML bên dưới</h3>
<textarea autocomplete="off" class="code_editor" id="code_editor_img" style="display:block !important" wrap="logical" spellcheck="false">
<html>
<body>

<p>Đây là một đoạn văn
<p>Đây là một đoạn văn

</body>
</html>
</textarea>
<a target="_blank" class="btn btn-inverse" style="margin-left:18%" onclick="$('#render').val($('#code_editor_img').val());$('#frm_render').submit()">Xem kết quả</a>
</div>

<div class="clr"></div>

<p class="p_html">Ví dụ trên có thể hiển thị đúng trên tất cả các trình duyệt vì thẻ đóng trong trường hợp này là tùy chọn không bắt buộc.</p>
<p class="p_html">Không bao giờ dựa vào điều này, có thể xảy ra lỗi không mong muốn nếu bạn quên thẻ đóng</p>

<div class="clr"></div>

<h3 style="margin-left: 18%">Các thành phần rỗng</h3>
<div class="clr"></div>
<p class="p_html">Các thành phần không có nội dung được gọi là thành phần trống</p>
<p class="p_html">&lt;br&gt; là một empty element (thẻ &lt;br&gt; định nghĩa việc xuống dòng).</p>
<p class="p_html">Thẻ Empty element có thể &nbsp;viết như thế này : &lt;br /&gt;.</p>
<p class="p_html">Ở HTML5 không yêu cầu tất cả các phần tử đều phải có thẻ đóng.</p> 
<p class="p_html">Nhưng để mã nguồn chặt chẽ hơn, code dễ đọc hơn thì &nbsp;bạn nên đóng thẻ cho tất cả các HTML element.&nbsp;</p>

<table class="lamp"  style="margin-left:15%">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td><a href="/">Phần tiếp theo</a></td>
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

