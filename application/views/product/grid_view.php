<html>
	 <head>
		 <title><?=$title?></title>
		<meta content='myweb.pro.vn Social Ebook' property="og:title"/>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
		<meta name="description" content="SocialGame, SocialEntertaintment, ebook, eCommerce, myweb.pro.vn" /> 
		<meta name="keywords" content="game,social,entertainment,learning,ebook, myweb.pro.vn"/>      
		<meta name="viewport" content="width=device-width, user-scalable=no">
        <link  rel="stylesheet" type="text/css" href="/css/product.css"/>
	</head>

	<body>
<center>
			<table id="product_wrapper_table">								
			<tr>
				<td id="game_header_category_item" colspan="9"><span></span></td>
			</tr>

			<?php $condition = empty($product) || !is_array($product) ? 0 : count($product); ?>
			<?php if ($condition) {
                $loop = -1;
                foreach ($product as $key) {                    
					$loop++; ?>
                            <?php if ($loop && $loop % 5 == 0) { ?>
                        <tr>
        <?php } ?>
                        <td style="cursor: pointer"  align="center" valign="top" width="<?php echo 100 / 5 ?>%">
        <?php if ($key["image"]) { ?>
                                <div class="product_div_item" id="product_div_item_<?= $key['id'] ?>">                          
                                    <img class="product_thumbs" src="/<?= $key['image'] ?>" >
                                    <div class="div_clear_both"></div>
                                    <span><?= $key['name'] ?></span>
                                    <button id="game_item_<?= $key['id'] ?>"  data-toggle="modal"  href="#ebook_body" data-name="<?= $key['name'] ?>"  class="game_list btn btn-primary" >Đ?c</button>
                                </div>
                        <?php } ?>
                        </td>
    <?php }
} ?>
            </tr>		
    </table>
</center>    	
	</body>
</html>