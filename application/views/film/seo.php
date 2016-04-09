<title>Tổng hợp phim hay nhất </title>
<meta name="description" content="Xem phim HD online"/>
<meta charset="UTF-8"/>
<?php foreach($content as $key):?>
<a title="<?=$key['name']?> -<?=$key['id']?>" href="/funtoday?id=<?=$key['id']?>">
<?=$key['name']?>
</a>
<?php endforeach;?>