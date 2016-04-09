<meta charset="UTF-8"/>
<?php foreach($seo as $key):?>
<?php
	  $path=str_replace('http://khoahoc.tv/','http://myweb.pro.vn/khoa-hoc-cong-nghe/',$key['path']);
?>
<a href="<?=$path?>">
<?=$key['name']?>
</a>
<div style="clear:both"></div>
<?php endforeach;?>