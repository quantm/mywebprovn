<meta name="description" content="JavaScript có thể đặt ở đâu  - ngôn ngữ lập trình phía client">
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/programming.css"/>	
<script type="text/javascript">
$(document)
.ready(function(){
	var self_link=document.location.href
	if(self_link.match('#')){
		$('#return').val(self_link.split('#')[0])
	}
	else {
		$('#return').val(document.location.href)
	}
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
function changeimage() {
    var image=document.getElementById('myimage')
    if (image.src.match("bulbon")) {
        image.src="http://myweb.pro.vn/images/programming/pic_bulboff.gif";
    } else { 
        image.src="http://myweb.pro.vn/images/programming/pic_bulbon.gif";
    }
}
function view_img_src_change(){
	$('#render').val($('#code_editor_change_img').val());
	$('#return').val(document.location.href+"#javascript_change_img_src")
	$('#frm_render').attr('action','http://myweb.pro.vn/javascript/index').submit()
}
function view_style_change(){
	$('#render').val($('#code_editor_change_style').val());
	$('#in_page_rel').val('#javascript_change_style')
	$('#frm_render').attr('action','http://myweb.pro.vn/javascript/index').submit()
}
function view_js_head(){
	$('#render').val($('#code_editor_js_head').val());
	$('#in_page_rel').val('#js_in_head')
	$('#frm_render').attr('action','http://myweb.pro.vn/javascript/index').submit()
}
function view_js_body(){
	$('#render').val($('#code_editor_js_body').val());
	$('#in_page_rel').val('#js_in_body')
	$('#frm_render').attr('action','http://myweb.pro.vn/javascript/index').submit()
}
function view_js_external(){
	$('#render').val($('#code_editor_js_external').val());
	$('#in_page_rel').val('#js_external')
	$('#frm_render').attr('action','http://myweb.pro.vn/javascript/index').submit()
}
</script>

<? include_once 'include/javascript_left_panel.php';?>

<form id="frm_render" method="post">
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
	<input type="hidden" name="render" id="render"/>
	<input type="hidden" name="return" id="return"/>
	<input type="hidden" name="in_page_rel" id="in_page_rel"/>
</form>

<div class="ads_right">
	<!--- Script ANTS - 120x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="517324793" data-ants-zone-id="517324793"></div>
	<!--- end ANTS Script -->
</div>

<a name="htm_intro"></a>

<h3 class="intro_html">JavaScript có thể đặt ở đâu trong trang HTML</h3>
<hr style="width: 80%;margin-left: 18%;"/>
<div style="font-size:14px">
	<p class="p_html">JavaScript có thể đặt trong thẻ &lt;body&gt; hoặc thẻ &lt;head&gt;</p>
</div>
<hr style="width: 80%;margin-left: 18%;"/>

<h3 style="margin-left: 18%">Thẻ  &lt;script&gt; </h3>
<p class="p_html">Trong trang HTML, code JavaScript phải được chèn giữa cặp thẻ &lt;script&gt; and &lt;/script&gt;</p>

<div class="w3-example">
	<h5>Ví dụ</h5>
	<div class="w3-code notranslate htmlHigh">
	<span class="highLT">&lt;</span><span class="highELE">script</span><span class="highGT">&gt;</span><br>
	document.getElementById("demo").innerHTML = "My First JavaScript";<br>
	<span class="highLT">&lt;</span><span class="highELE">/script</span><span class="highGT">&gt;</span>
	</div>
</div>

<hr style="width:72.5%;margin-left: 18%;"/>

<table class="lamp"  style="margin-left:18%;width:72.5%">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td>
			<p style="margin-left: 5px;margin-top: 10px;line-height:20px;font-size:14px">
			Ở các ví dụ cũ thường sử dụng thêm thuộc tính: &lt;script type=”text/javascript”&gt;.<br>Thuộc tính&nbsp;type là không bắt buộc. JavaScript là ngôn ngữ kịch bản mặc định trong HTML</p>
		</td>
	</tr>
</tbody>
</table>

<a name="javascript_change_img_src"></a>

<h3 style="margin-left: 18%">Hàm JavaScript và sự kiện</h3>
<div class="clr"></div>
<p class="p_html">Một hàm JavaScript là một khối code JavaScript có thể được gọi thực thi khi cần</p> 
<p class="p_html">Ví dụ một hàm có thể được gọi khi người dùng click (sự kiện) vào một button. Bạn sẽ học nhiều hơn về hàm và sự kiện ở các chương sau</p> 

<hr style="width:72.5%;margin-left: 18%;"/>

<a name="javascript_change_style"></a>

<h3 style="margin-left: 18%">JavaScript ở &lt;head&gt; hoặc &lt;body&gt;</h3>
<div class="clr"></div>
<p class="p_html">Bạn có thể đặt bất kỳ số lượng các thẻ &lt;script&gt trong một trang HTML, script có thể được đặt trong thẻ &lt;head&gt hoặc thẻ &lt;body&gt </br> hoặc bất kỳ nơi nào trong trang HTML</p>

<table class="lamp"  style="margin-left:18%;border:none">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lam	p.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td>Đặt code ở một nơi sẽ luôn là thói quen tốt</td>
	</tr>
</tbody>
</table>

<hr style="width:72.5%;margin-left: 18%;"/>

<h3 style="margin-left: 18%">JavaScript ở &lt;head&gt;</h3>
<div class="clr"></div>
<p class="p_html">Trong ví dụ dưới đây hàm JavaSript được đặt trong phần &lt;head&gt; của trang HTML. Hàm này sẽ được thực thi (gọi) khi một button được click </p>

<a name="js_in_head"></a>

<div class="w3-example">
<h3>Ví dụ</h3>
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">!DOCTYPE</span> <span class="highATT">html</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">html</span><span class="highGT">&gt;</span><p><span class="highLT">&lt;</span><span class="highELE">head</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">script</span><span class="highGT">&gt;</span><br>
function myFunction() {<br>
&nbsp;&nbsp;&nbsp;
document.getElementById("demo").innerHTML = "Một đoạn văn khác";<br>
}<br>
<span class="highLT">&lt;</span><span class="highELE">/script</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">/head</span><span class="highGT">&gt;</span></p>
	<p><span class="highLT">&lt;</span><span class="highELE">body</span><span class="highGT">&gt;</span></p>
<p><span class="highLT">&lt;</span><span class="highELE">h1</span><span class="highGT">&gt;</span>Bài viết của tôi<span class="highLT">&lt;</span><span class="highELE">/h1</span><span class="highGT">&gt;</span></p>
<p><span class="highLT">&lt;</span><span class="highELE">p</span> <span class="highATT">id=</span><span class="highVAL">"demo"</span><span class="highGT">&gt;</span>Một đoạn văn<span class="highLT">&lt;</span><span class="highELE">/p</span><span class="highGT">&gt;</span></p>
<p><span class="highLT">&lt;</span><span class="highELE">button</span> <span class="highATT">type=</span><span class="highVAL">"button"</span> <span class="highATT">onclick=</span><span class="highVAL">"myFunction()"</span><span class="highGT">&gt;</span>Viết bài<span class="highLT">&lt;</span><span class="highELE">/button</span><span class="highGT">&gt;</span></p>
<p><span class="highLT">&lt;</span><span class="highELE">/body</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">/html</span><span class="highGT">&gt;</span>
</p></div>
<a target="_blank" class="btn-write-thecode" onclick="$('#btn_render_js_head,#edit_js_head,#code_editor_js_head,#code_editor_js_head_wrapper').show()">Viết đoạn code trên</a>
</div>

<div class="code_editor_wrapper" id="code_editor_js_head_wrapper">
<h3 id="edit_js_head" style="display:none;margin-left:18%">Viết đoạn code bên dưới</h3>
<textarea autocomplete="off" class="code_editor" id="code_editor_js_head" wrap="logical" spellcheck="false" style="height: 55% !important;">
<!DOCTYPE html>
<html>
<head>
<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "Một đoạn văn khác";
}
</script>
</head>
<body>
<h1>Bài viết của tôi</h1>
<p id="demo">Một đoạn văn</p>
<button type="button" onclick="myFunction()">Viết bài</button>
</body>
</html> 
</textarea>

<a target="_blank" onclick="view_js_head()"  class="btn btn-success" id="btn_render_js_head" style="display:none;margin-left: 18%!important;margin-top:-40px">Xem kết quả</a>
</div>

<hr style="width: 80%;margin-left: 18%;"/>

<h3 style="margin-left: 18%">JavaScript ở &lt;body&gt; </h3>
<p class="p_html">Trong ví dụ dưới đây hàm JavaSript được đặt trong phần &lt;body&gt; của trang HTML. Hàm này sẽ được thực thi (gọi) khi một button được click </p>

<a name="js_in_body"></a>

<div class="w3-example">
<h3>Ví dụ</h3>
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">!DOCTYPE</span> <span class="highATT">html</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">html</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">body</span><span class="highGT">&gt;</span>
<br><br><span class="highLT">&lt;</span><span class="highELE">h1</span><span class="highGT">&gt;</span>Đổi màu chữ<span class="highLT">&lt;</span><span class="highELE">/h1</span><span class="highGT">&gt;</span><br>
	<br><span class="highLT">&lt;</span><span class="highELE">p</span> <span class="highATT">id=</span><span class="highVAL">"demo"</span><span class="highGT">&gt;</span>Màu đen	<span class="highLT">&lt;</span><span class="highELE">/p</span><span class="highGT">&gt;</span><br>
	<br><span class="highLT">&lt;</span><span class="highELE">button</span> <span class="highATT">type=</span><span class="highVAL">"button"</span> <span class="highATT">onclick=</span><span class="highVAL">"myFunction()"</span><span class="highGT">&gt;</span>Click để đổi màu chữ<span class="highLT">&lt;</span><span class="highELE">/button</span><span class="highGT">&gt;</span><br>
	<br><span class="highLT">&lt;</span><span class="highELE">script</span><span class="highGT">&gt;</span><br>
function myFunction() {<br>
&nbsp;&nbsp;&nbsp;document.getElementById("demo").innerHTML = "Màu đỏ.";<br>
&nbsp;&nbsp;&nbsp;document.getElementById("demo").style.color = "red";<br>
}<br>
<span class="highLT">&lt;</span><span class="highELE">/script</span><span class="highGT">&gt;</span><br>
	<br><span class="highLT">&lt;</span><span class="highELE">/body</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">/html</span><span class="highGT">&gt;</span>
</div>
<a target="_blank" class="btn-write-thecode" onclick="$('#btn_render_js_body,#edit_js_body,#code_editor_js_body,#code_editor_js_body_wrapper').show()">Viết đoạn code trên</a>
</div>

<div class="code_editor_wrapper" id="code_editor_body_wrapper">
<h3 id="edit_js_head" style="display:none;margin-left:18%">Viết đoạn code bên dưới</h3>
<textarea autocomplete="off" class="code_editor" id="code_editor_js_body" wrap="logical" spellcheck="false" style="height: 55% !important;">
<!DOCTYPE html>
<html>
<body>
<h1>JavaScript được đặt ở thẻ body</h1>
<h1>Hàm JavaScript thực hiện việc đổi màu chữ của một thành phần HTML</h1>
<p id="demo">Màu đen</p>
<button type="button" onclick="myFunction()">Click để đổi màu chữ</button>
<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "Màu đỏ";
    document.getElementById("demo").style.color = "red";
}
</script>
</body>
</html> 
 
</textarea>

<a target="_blank" onclick="view_js_body()"  class="btn btn-success" id="btn_render_js_body" style="display:none;margin-left: 18%!important;margin-top:-40px">Xem kết quả</a>
</div>


<hr style="width: 80%;margin-left: 18%;"/>

<h3 style="margin-left: 18%">Bạn có biết ?</h3>

<table class="lamp"  style="margin-left:18%">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td style="font-size:14px">
			Đặt JavaScript ở cuối thẻ &lt;body&gt sẽ giúp tăng tốc độ tải trang web đối với người dùng vì các thành phần giao diện của trang HTML sẽ load trước
		</td>
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

<div class="clr"></div>

<h3 style="margin-left: 18%">JavaScript tham chiếu bên ngoài</h3>
<p class="p_html">Script cũng có thể được đặt ở các file bên ngoài trang HTML</p>
<p class="p_html">JavaScript bên ngoài được dùng khi một đoạn code được dùng cho nhiều trang khác nhau</p>
<p class="p_html">File JavaScript có phần mở rộng là <b>.js</b></p>
<p class="p_html">Để sử dụng JavaScript ngoại, bạn thêm đường dẫn của file vào thuộc tính src của thẻ &lt;script&gt;</p>

<a name="js_external"></a>

<div class="w3-example">
<h3>Ví dụ</h3>
<div class="w3-code notranslate htmlHigh">
<span class="highLT">&lt;</span><span class="highELE">!DOCTYPE</span> <span class="highATT">html</span><span class="highGT">&gt;</span><br><span class="highLT">&lt;</span><span class="highELE">html</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">body</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">script</span> <span class="highATT">src=</span><span class="highVAL">"http://www.w3schools.com/js/myScript.js"</span><span class="highGT">&gt;</span><span class="highLT">&lt;</span><span class="highELE">/script</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">/body</span><span class="highGT">&gt;</span><br>
<span class="highLT">&lt;</span><span class="highELE">/html</span><span class="highGT">&gt;</span></div>
<a target="_blank" class="btn-write-thecode" onclick="$('#edit_js_external_below,#code_editor_external_script,#btn_render_js_external,#code_editor_js_external').show()">Viết đoạn code trên</a>
</div>

<div class="code_editor_wrapper" id="code_editor_external_script">
<h3 id="edit_js_external_below" style="display:none;margin-left:18%">Viết đoạn code bên dưới</h3>
<textarea autocomplete="off" class="code_editor" id="code_editor_js_external" wrap="logical" spellcheck="false" style="height: 63% !important;">

<!DOCTYPE html>
<html>
<body>

<h1>JavaScript tham chiếu bên ngoài</h1>

<p id="demo">Một đoạn văn</p>

<button type="button" onclick="myFunction()">Thử Click vào đây</button>

<p><strong>Chú ý:</strong> myFunction được lưu trong một file tên là "myScript.js".</p>

<script src="http://www.w3schools.com/js/myScript.js"></script>

</body>
</html>

</textarea>

<a target="_blank" onclick="view_js_external()"  class="btn btn-success" id="btn_render_js_external" style="display:none;margin-left: 18%!important;margin-top:-40px">Xem kết quả</a>
</div><br>

<p class="p_html">Bạn có thể đặt các file JavaScript tham chiếu bên ngoài ở thẻ &lt;head&gt; hoặc &lt;body&gt;.</p>

<table class="lamp"  style="margin-left:18%;border:none !important">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td style="font-size:14px">
				JavaScript tham chiếu ngoại không thể đặt bên trong cặp thẻ &lt;script&gt  &lt;/script&gt
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<!--- Script ANTS - 300x250 --> 
			<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
			<div class="534383851" data-ants-zone-id="534383851"></div>
			<!--- end ANTS Script -->
		</td>
	</tr>
</tbody>
</table>

<hr style="width: 80%;margin-left: 18%;"/>

<h3 style="margin-left: 18%">Ưu điểm của việc dùng JavaScript ngoài</h3>
<p class="p_html">Việc dùng JavaScript ngoại có một số ưu điểm:</p>
<ul style="margin-left: 21%">
	<li> Tách giữa code HTML và JavaScript</li> 
	<li>Làm cho HTML và JavaScript trở nên dễ đọc và dễ bảo trì</li> 
	<li>Cached JavaScript có thể tăng tốc độ tải trang web</li> 
</ul>

