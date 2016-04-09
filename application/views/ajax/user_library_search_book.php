<?php require_once 'application/models/common_model.php';?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta content="text/html; charset=utf-8">
<script type="text/javascript">
$(document).ready(function(){
	$('.search_result_book_title').tooltip({placement:'top'})
	$('.pagination a').each(function(){
		var link=$(this).attr('href')
			 link=link+'?q_lib='+'<?=$search_key?>'
		$(this).removeAttr('href')
		$(this).attr('data-href',link)
	})
})
</script>
</head>
<body>
<table>
<?php foreach($search as $key):?>
<tr class="row-search-result">
	<td class="search_result_book_title" data-id="<?=$key['ID']?>" nowrap style="cursor:pointer" title="Click để thêm sách vào tủ">
		<?php echo common_model::highlightWords($key['NAME'],$search_key);?>
	</td>	
	<td  class="skim_the_doc" data-id="<?=$key['ID']?>">Xem trước</td>
</tr>
<?php endforeach;?>
</table>
<table class="pagination">
<tr>
	<td nowrap="nowrap"><?=$pagination?></td>
	<td style="margin-left:35px;position:absolute">Tìm được <?=$total_rows?> kết quả với từ khóa <span style="color:red"><?=$search_key?></span></td>
</tr>
</table>
</body>
</html>