<meta name="description" content="Giới thiệu JavaScript - ngôn ngữ lập trình phía client">
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
	$('#code_editor_change_html,#code_editor_change_html_wrapper,#edit_html_below,#btn-render-change-html').show()
	$('.code_editor a')
		.html('Xem kết quả')
		.addClass('btn-render')
	$('.code_editor h3').html('Soạn thảo tài liệu HTML bên dưới')
})
.on('click','.btn-render',function(){
	$('#render').val($('.code_editor').val())
	$('#in_page_rel').val("#home")
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
	$('#in_page_rel').val("#javascript_change_img_src")	
	$('#frm_render').attr('action','http://myweb.pro.vn/javascript/index').submit()
}
function view_style_change(){
	$('#render').val($('#code_editor_change_style').val());
	$('#in_page_rel').val("#javascript_change_style")
	$('#frm_render').attr('action','http://myweb.pro.vn/javascript/index').submit()
}
function view_validate_input_data(){
	$('#render').val($('#code_editor_validate_input_data').val());
	$('#in_page_rel').val("#javascript_validate_input_data")
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

<h3 class="intro_html">Giới thiệu JavaScript</h3>
<hr style="width: 80%;margin-left: 18%;"/>
<div style="font-size:14px">
	<p class="p_html">JavaScript là ngôn ngữ lập trình phổ biến trên thế giới</p>
	<p class="p_html">Trang này trình bày một số ví dụ mà JavaScript có thể làm</p>
</div>
<hr style="width: 80%;margin-left: 18%;"/>

<h3 style="margin-left: 18%">JavaScript thay đổi nội dung HTML</h3>
<p class="p_html">Một trong nhiều phương thức là dùng <b>getElementById()</b> </p>
<p class="p_html">Ví dụ bên dưới dùng phương thức này để tìm thành phần HTML (với id="demo") và thay đổi nội dung của nó là "Hello JavaScript"</p>

<div class="w3-example">
<h5>Ví dụ</h5>
<div class="w3-code notranslate htmlHigh">
document.getElementById("demo").innerHTML = "Hello JavaScript";
<p id="demo"></p>
</div>
<a target="_blank" class="btn-try-it-yourself btn-write-thecode">Viết đoạn code trên</a>
</div>

<a name="javascript_change_html"></a>

<div class="code_editor_wrapper"  id="code_editor_change_html_wrapper">
<h3 id="edit_html_below">Viết đoạn code bên dưới</h3>
<textarea autocomplete="off" class="code_editor" id="code_editor_change_html" wrap="logical" spellcheck="false" style="height: 56% !important;">

<!DOCTYPE html>
<html>
<body>

<h1>JavaScript có thể làm gì?</h1>

<p id="demo">JavaScript có thể thay đổi nội dung HTML.</p>

<button type="button"
onclick="document.getElementById('demo').innerHTML = 'Chào, tôi là JavaScript, bạn với anh HTML và CSS'">Click vào tôi !</button>

</body>
</html>

</textarea>

<a target="_blank" class="btn-render btn btn-success" id="btn-render-change-html" style="display:none;margin-top: 345px;">Xem kết quả</a>
</div>
<div class="clr"></div>
<hr style="width: 80%;margin-left: 18%;"/>

<a name="javascript_change_img_src"></a>

<h3 style="margin-left: 18%">JavaScript có thể thay đổi thuộc tính HTML</h3>
<div class="clr"></div>
<p class="p_html">Ví dụ dưới đây thay đổi hình ảnh bằng cách thay đổi thuộc tính src của thẻ <b>&lt;img&gt</b> </p> 

<div class="w3-example">
<h3>Bật/Tắt bóng đèn</h3>
<div class="w3-padding w3-white notranslate" style="text-align:center">
<img style="cursor:pointer"  id="myimage" onclick="changeimage()" border="0" src="http://myweb.pro.vn/images/programming/pic_bulboff.gif" width="100" height="180">
<p>Click vào bóng đèn để bật/tắt</p>
</div>
<p>
<a target="_blank" class="btn-write-thecode" onclick="$('#btn_render_change_img,#edit_change_img_below,#code_editor_change_img_wrapper,#code_editor_change_img').show()">Viết đoạn code trên</a>
</p>
</div>

<div class="code_editor_wrapper" id="code_editor_change_img_wrapper">
<h3 id="edit_change_img_below" style="display:none;margin-left:18%">Viết đoạn code bên dưới</h3>
<textarea autocomplete="off" class="code_editor" id="code_editor_change_img" wrap="logical" spellcheck="false" style="height: 85% !important;">

<a name="javascript_change_style"></a>

<!DOCTYPE html>
<html>
<body>

<h1>JavaScript có thể thay đổi hình ảnh trong trang HTML</h1>

<img id="myImage" onclick="changeImage()" src="http://myweb.pro.vn/images/programming/pic_bulbon.gif" width="100" height="180">

<p>Click vào bóng đèn để bật/tắt</p>

<script>
function changeImage() {
    var image = document.getElementById('myImage');
    if (image.src.match("bulbon")) {
        image.src = "http://myweb.pro.vn/images/programming/pic_bulboff.gif";
    } else {
        image.src = "http://myweb.pro.vn/images/programming/pic_bulbon.gif";
    }
}
</script>

</body>
</html>

</textarea>

<a target="_blank" onclick="view_img_src_change()"  class="btn btn-success" id="btn_render_change_img" style="display:none;margin-left: 18%!important;margin-top:-40px">Xem kết quả</a>
</div>

<div class="clr"></div>

<h3 style="margin-left: 18%">JavaScript có thể thay đổi HTML Styles (CSS)</h3>
<div class="clr"></div>
<p class="p_html">Thay đổi style cho một phần tử HTML hay thay đổi thuộc tính style của một phần tử HTML:</p>

<div class="w3-example">
<h3>Ví dụ</h3>
<div class="w3-code notranslate jsHigh">
	document.getElementById(<span class="highVAL">"demo"</span>).style.fontSize = <span class="highVAL">"25px"</span>;</div>
<a target="_blank" class="btn-write-thecode" onclick="$('#btn_render_change_style,#edit_change_style_below,#code_editor_change_style_wrapper,#code_editor_change_style').show()">Viết đoạn code trên</a>
</div>

<div class="code_editor_wrapper" id="code_editor_change_style_wrapper">
<h3 id="edit_change_style_below" style="display:none;margin-left:18%">Viết đoạn code bên dưới</h3>
<textarea autocomplete="off" class="code_editor" id="code_editor_change_style" wrap="logical" spellcheck="false" style="height: 80% !important;">

<!DOCTYPE html>
<html>
<body>

<h1>JavaScript có thể làm gì ?</h1>

<p id="demo">JavaScript có thể thay đổi style của một phần tử HTML</p>

<script>
function myChange_HTML_Style() {
    var x = document.getElementById("demo");
    x.style.fontSize = "25px";           
    x.style.color = "red"; 
}
</script>

<button type="button" onclick="myChange_HTML_Style()">Click vào tôi thử xem cái gì hiện ra !</button>

</body>
</html> 

</textarea>

<a target="_blank" onclick="view_style_change()"  class="btn btn-success" id="btn_render_change_style" style="display:none;margin-left: 18%!important;margin-top:-40px">Xem kết quả</a>
</div>

<hr style="width: 80%;margin-left: 18%;"/>

<h3 style="margin-left: 18%">JavaScript có thể kiểm tra dữ liệu nhập</h3>
<p class="p_html">JavaScript thường được dùng để kiểm tra dữ liệu nhập</p>

<script>
$(document).on('click','#btn_check_is_numer_input',function(){
	Number_Validation()
})
function Number_Validation() {
    var x,text='';
    x = document.getElementById("numb").value;
	if(isNaN(x)){
		text = "Bạn phải nhập vào một số";
	}
    if  (x > 1 && x < 10) {
        text = "Bạn đã nhập đúng";
    }
	if(x < 1 || x > 10 || x==1 || x==10) {
		text = "Bạn phải nhập vào một con số lớn hơn 1 và nhỏ hơn 10";
	}
    document.getElementById("demo_number_validation").innerHTML = text;
}
</script>

<div class="w3-example">
<p>Nhập vào số lớn hơn 1 và nhỏ hơn 10 : </p>
<input id="numb" type="text">
<button type="button" id="btn_check_is_numer_input">Submit</button>
<p id="demo_number_validation"></p>
<a target="_blank" class="btn-write-thecode" onclick="$('#btn_render_validate_input_data,#edit_validate_input_data_below,#code_editor_validate_input_data_wrapper,#code_editor_validate_input_data').show()">Viết đoạn code trên</a>
</div>

<hr style="width: 80%;margin-left: 18%;"/>

<a name="javascript_validate_input_data"></a>

<div class="code_editor_wrapper" id="code_editor_validate_input_data_wrapper">
<h3 id="edit_validate_input_data_below" style="display:none;margin-left:18%">Viết đoạn code bên dưới</h3>
<textarea autocomplete="off" class="code_editor" id="code_editor_validate_input_data" wrap="logical" spellcheck="false" style="height: 80% !important;">

<!DOCTYPE html>
<html>
<body>
<h1>JavaScript có thể kiểm tra dữ liệu nhập</h1>
<p>Nhập vào số lớn hơn 1 và nhỏ hơn 10 :</p>
<input id="numb" type="number">
<button type="button" onclick="myFunction()">Submit</button>
<p id="demo"></p>
<script>
function myFunction() {
    var x, text;
    x = document.getElementById("numb").value;
    if (isNaN(x) || x > 1 && x < 10) {
        text = "Bạn đã nhập đúng";
    } else {
        text = "Bạn đã nhập sai";
    }
    document.getElementById("demo").innerHTML = text;
}
</script>
</body>
</html> 
</textarea>

<a target="_blank" onclick="view_validate_input_data()"  class="btn btn-success" id="btn_render_validate_input_data" style="display:none;margin-left: 18%!important;margin-top:-40px">Xem kết quả</a>
</div>

<hr style="width: 80%;margin-left: 18%;"/>

<h3 style="margin-left: 18%">Bạn có biết ?</h3>

<table class="lamp"  style="margin-left:15%">
<tbody>
	<tr>
		<th style="width:34px">
		<img src="http://www.w3schools.com/images/lamp.jpg" alt="Note" style="height:32px;width:32px"></th>
		<td>
				<p style="margin-left:12%;margin-top:5px">JavaScript và Java là hai ngôn ngữ lập trình hoàn toàn khách nhau, cả về định nghĩa lẫn thiết kế.</p>
				<p style="margin-left:12%;margin-top:5px">JavaScript được tạo bởi Brendan Eich năm 1995, và trở thành một chuẩn ECMA năm 1997.</p>
				<p style="margin-left:12%;margin-top:5px">Tên gọi thường dùng là ECMA-262. ECMAScript 5 (JavaScript 1.8.5 – 7/2010) là chuẩn hiện hành đang sử dụng.</p>
			</td>
	</tr>
	<tr>
		<td></td>
		<td><a href="http://myweb.pro.vn/javascript?category=js_where_to">Phần tiếp theo</a></td>
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