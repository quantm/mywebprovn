<html>
<head>
<!-- start meta -->
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<link rel="author" href="https://plus.google.com/+TranKing" />
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
<link rel="canonical" href="http://myweb.pro.vn/book/all/" />
<link  rel="stylesheet" type="text/css" href="/css/ebook.css"/>
</head>

<body>
<table id="ebook_wrapper_table">					  			
<?php $condition = empty($book) || !is_array($book) ? 0 : count($book); ?>
<?php if ($condition) {
$loop = -1;
foreach ($book as $key) {                    
$loop++; ?>
<?php if ($loop && $loop % 10 == 0) { ?>
<tr>
<?php } ?>
<td style="cursor: pointer"  align="center" valign="top" width="<?php echo 100 / 10 ?>%">
<?php if ($key["THUMBS"]) { ?>
<div class="ebook_div_item" id="ebook_div_item_<?= $key['ID'] ?>">                          
<a href="/book/detail?id=<?=$key['ID']?>">
<img alt="<?= $key['NAME'] ?>" class="ebook_thumbs" src="<?=$key['THUMBS'] ?>" >
<div class="div_clear_both"></div>	
<span style="width:125px;overflow-x:hidden"><?= $key['NAME'] ?></a>
</a>
</div>
<?php } ?>
</td>
<?php }
} ?>
</tr>		
</table>      
</body>
<html>
