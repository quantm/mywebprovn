<meta charset="UTF-8">
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50476937-1', 'myweb.pro.vn');
  ga('send', 'pageview');

</script>

<?php $arrThongtin=array("Báo chí","Đài phát thanh","Tivi","Mạng internet","Tờ rơi");?>

<div>Dùng thuộc tính <span style="color:red">required</span> để kiểm tra người dùng chọn mới submit form:</div>
<div style="clear:both"/>
<form action="" method="get">
<select required name="lst_thongtin[]" id="lst_thongtin" size="3" multiple="multiple">
<?php for($i=0;$i<count($arrThongtin);$i++):?>
<?php echo '<option>'.$arrThongtin[$i].'</option>'; ?>
<?php endfor;?>
</select>
<input type="submit" value="Submit">
</form>

<div>Dùng jquery</div>
<select required name="lst_thongtin_j[]" id="lst_thongtin_j" size="3" multiple="multiple">
<?php for($i=0;$i<count($arrThongtin);$i++):?>
<?php echo '<option>'.$arrThongtin[$i].'</option>'; ?>
<?php endfor;?>
</select>

<input type="button" value="Submit" id="submit">
<script type="text/javascript">
$(document).ready(function(){
	
	//khi user click vào tag option  thì thêm class is_checked tag select
	$('#lst_thongtin_j option').click(function(){
		$('#lst_thongtin_j').addClass('is_checked')
	})

	//submit click
	$('#submit').click(function(){
			
			//duyệt tag option
			$('#lst_thongtin_j option').each(function(index,value){		
					//nếu đã chọn
					if($(this).prop('selected')){
						alert($(this).val())
					}
					
					//nếu chưa chọn
					else {		
							if(index=="0"){
									if($(this).parent().hasClass('is_checked')){
										//do nothing
									}
									else{alert('bạn phải chọn ít nhất một mục')}	
							}
					}
			})
		//gán thuộc tính is_checked=0
		$('#lst_thongtin_j').attr('is_checked','0')
	})
	//end
})

</script>

<div>Dùng javascript</div>
<select required name="lst_thongtin_j[]" id="lst_thongtin_javascript" onclick="document.getElementById('is_selected').value=1" size="3" multiple="multiple">
<?php for($i=0;$i<count($arrThongtin);$i++):?>
<?php echo '<option>'.$arrThongtin[$i].'</option>'; ?>
<?php endfor;?>
</select>
<!-- thêm hidden field để kiếm tra user đã select hay chưa-->

<input type="hidden" id="is_selected" value="0">
<input type="button" value="Submit" id="submit_javascript" onclick="check()">

<script type="text/javascript">
//đơn giản hơn dùng jquery
function check(){
	var is_selected=document.getElementById('is_selected').value;
	if(is_selected=='0'){alert('bạn phải chọn một mục')}
	if(is_selected=='1') {
		var e = document.getElementById("lst_thongtin_javascript")
			strSelected = e.options[e.selectedIndex].value;
			alert(strSelected)
	}
}
</script>
