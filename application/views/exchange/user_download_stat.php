<meta charset="UTF-8"/>
<link href="/css/baokim.css" rel="stylesheet">
<style>
.payment-table td {
  min-width: 150px!important;
}
</style>
<div class="payment-table-price">
				<table class="payment-table">
				<tbody>
				<tr class="payment-header">
					<td>Mệnh giá card đã nạp</td>
					<td>Số lượt đã tải</td>
					<td>Số lượt tải còn lại</td>
				</tr>
				<?php foreach($download_info as $key):?>
				<tr>
					<td><?=number_format($key['CARD_VALUE'])?> VNĐ</td>
					<td><?=$key['BOOK_DOWNLOADED_COUNT']?></td>
					<td><?=($key['DOWNLOADED_PER_CHARGED']-$key['BOOK_DOWNLOADED_COUNT'])?></td>
				</tr>
				<?php endforeach;?>
			</tbody></table>
			<div style='clear:both'></div>
			<button type="submit" class="btn btn-primary" href="#nap_the_cao" data-toggle="modal" id="napthe" name="napthe" style="margin-top: 15px;">Nạp thẻ</button>
</div>

<!-- start modal card charge -->
<div class="modal hide fade" id="nap_the_cao">
	<div class="modal-header">
		<span style="margin-left:15px">Nạp thẻ cào điện thoại</span>
		<button type="button" class="close" data-dismiss="modal">×</button>
	</div>
	<div class="modal-body">
			<iframe src='http://myweb.pro.vn/plugin/baokim/account'/>
	</div>
</div>
<!-- end modal card charge -->