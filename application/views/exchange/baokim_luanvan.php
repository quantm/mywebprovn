<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" style="text/css" href="/css/bootstrap.min.css">
<link href="/css/baokim.css" rel="stylesheet">
<script src="/js/jsmin.js"></script>
<script src="/js/bootstrap.js"></script>
<script>
	$(document).ready(function(){
	$("#ebook_id").val(window.parent.document.getElementById('share_id').value)	
	$('#txtpin').blur(function(){
		if($('#txtpin').val().length<'10'&&$('#txtpin').val().length!='0'){
			$('#txtpin_validate')
				.html('Mã Pin quá ngắn (tối thiểu là 10 kí tự)')
				.show()
		}	
		if($('#txtpin').val().length>'10'&&$('#txtpin').val().length!='0'){
			$('#txtpin_validate').hide()
		}	
	}) 

	$('#txtseri').blur(function(){
		if($('#txtseri').val().length<'8'&&$('#txtseri').val().length!='0'){
			$('#txtseri_validate')
				.html('Mã Seri quá ngắn (tối thiểu là 8 kí tự).')
				.show()
		}	
		if($('#txtseri').val().length>'8'){
			$('#txtseri_validate').hide()
		}				
	})
		
	$(".form-control").tooltip({ placement: 'right'});
});
</script>
</head>
<body>
<div class="payment-table-price">
<span>Để góp phần giúp chúng tôi duy trì server và nhân lực lập trình để giúp bạn tìm được những tài liệu, luận văn, giáo án chất lượng, chúng tôi sẽ thu phí tải tài liệu chi tiết như bảng bên dưới</span>
				<table class="payment-table">
				<tbody>
				<tr class="payment-header">
					<td>Mệnh giá</td>
					<td>Lượt tải</td>
					<td>Hạn dùng</td>
				</tr>
				<tr>
					<td>10.000đ</td>
					<td>5 lượt</td>
					<td>1 tháng</td>
				</tr>
				<tr>
					<td>20.000đ</td>
					<td>10 lượt</td>
					<td>1 tháng</td>
				</tr>
				<tr>
					<td>50.000đ</td>
					<td>50 lượt</td>
					<td>3 tháng</td>
				</tr>				
				<tr>
					<td>100.000đ</td>
					<td>150 lượt</td>
					<td>6 tháng</td>
				</tr>
			</tbody></table>																	
</div>

<!--start container-->
<div class="container"> 

<form class="form-horizontal form-bk" role="form" method="post" action="/plugin/transaction">
	<input type="hidden" value="<?=$csrf_test_name?>" name="csrf_test_name" id="csrf_test_name">
	<input type="hidden" name="ebook_id" id="ebook_id">
	<input type="hidden" id="download_type" name="download_type" value="luanvan"/>
	<h4 class="form-control-heading">NẠP THẺ CÀO ĐIỆN THOẠI</h4>
<div class="form-group">
    <div class="col-lg-10">
      <select required="" class="form-control" name="chonmang" style="width:260px!important" data-original-title="" title="">
		  <option value="VIETEL">Viettel</option>
		  <option value="MOBI">Mobifone</option>
		  <option value="VINA">Vinaphone</option>
		  <option value="GATE">Gate</option>
		  <option value="VTC">VTC</option>
		</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-10">
      <input type="text" class="form-control" disabled="disabled" value="<?=$username?>"/>
	  <input type="hidden" id="txtuser" name="txtuser" value="<?=$username?>"/>
	</div>
  </div>
  <div class="form-group">
    <div class="col-lg-10">
      <input required type="text" class="form-control" maxlength="16" id="txtpin" name="txtpin" placeholder="Nhập mã thẻ" title="Mã số sau lớp bạc mỏng">
	  <div style="clear:both">
	  <span class="help-inline" id="txtpin_validate" style="display: none;"></span>
	</div>
  </div>
  <div class="form-group">
    <div class="col-lg-10">
      <input required type="text" class="form-control" id="txtseri" name="txtseri" placeholder="Nhập số seri" title="Mã seri nằm sau thẻ">
	  <div style="clear:both">
	  <span class="help-inline" id="txtseri_validate" style="display: none;"></span>
	</div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary" id="napthe" name="napthe" style="margin-top: 15px;">Nạp thẻ</button>
    </div>
  </div>
</div>  

</div>
</form>

<p id="open_popup">Nếu không tải về được (do trình duyệt chặn popup), vui lòng <a href="https://www.youtube.com/watch?v=yET6DF7yfrc" target="blank">click vào đây</a> để xem cách bật popup</p>

</div>
<!--end container -->

</body>
</html>