<title>Danh mục sản phẩm</title>
<meta name="description" content="Danh mục sản phẩm tại Lazada.vn"/>
<div class="product_wrapper_main">

<table id="fetch_ajax_pagination"  border="0" cellpadding="0" cellspacing="0" width="100%">
<!-- begin loop -->

<tr>
<?php $condition = empty($lazada) || !is_array($lazada) ? 0 : count($lazada); ?>
<?php
if ($condition) {
$loop = -1;
foreach ($lazada as $key) {
$loop++;
?>
<?php if ($loop && $loop % 6 == 0) { ?></tr>
<tr>
<?php } ?>
<td style="cursor: pointer;"  align=center valign=top width="<?php echo 100 / 6 ?>%">
<?php if ($key["picture_url"]) { ?>
<div class="btn btn-primary">
<a href="/lazada-mua-sam?id=<?=$key['id']?>" target="_new" style="color:white">
<img title="<?=$key['product_name']?>" class="product_thumb" src="<?= $key['picture_url'] ?>" data-desc='<?=$key['description']?>' data-large="<?=$key['zoom_picture_url']?>" data-id='<?=$key['id']?>' width="180" height="160">

<?php } ?>
<?php if ($key["product_name"]) { ?><div style="padding:1px">				
</div>
<div style="padding-bottom:3px"><?php } ?>
<?php if (!$key["price"]) { ?>
<?php if ($key["price"]) { ?>
<div style="padding-bottom:3px">
<?php if ($key["memberdc"] > 0) { ?>

<span style="color:gray">
<strike><?php
echo number_format($key["price"]);
echo strtoupper("<strong>" . $key['currency'] . "</strong>");
?> </strike>
<span style='font-family:Tahoma;font-size:7pt;color:red'>(<?php echo $key["dc"] ?> %)</span></span><br>
<b><?php echo number_format($key["realprice"]) ?> </b>
<?php } else { ?>
<b><?php
echo number_format($key["price"]);
echo strtoupper("<strong>" . $key['currency'] . "</strong>");
?> </b>
<?php } ?>
</div>
<?php } ?>
<?php if ($key["soldout_price_string"]) { ?><?php echo $key["soldout_price_string"] ?><?php } ?>
<?php if ($key["soldout_price_image"]) { ?><?php echo $key["soldout_price_image"] ?><?php } ?>
<?php } else { ?>
<div style="clear:both"></div>
<strong>Xem chi tiết</strong>
</a>
</div>			
<?php } ?>
</td>
<?php
}
}
?>

</tr>

<!-- end loop -->
</tbody></table>

</div>
<div id="game_scroll_loading">
<h3 style="color:red">Đang tải sản phẩm...</h3>
<img src="http://www.xahoihoctap.net.vn/images/ajax_loading.GIF">
</div>
<input type="hidden" id="id_category" value="<?=$id_category?>"/>
<input type="hidden" id="pagination_total_page" value="<?=$total_rows?>"/>	
