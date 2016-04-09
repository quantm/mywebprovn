<title>Tổng hợp những game mới nhất</title>
<meta charset='UTF-8'/>
<?php foreach($seo as $key):?>
<a href="/choi-game/<?=$key['NAME'];?>" data-id='<?=$key['ID'];?>' target="_new"><h2>Chơi game <?=$key['NAME']?></h2></a>
<?php endforeach;?>