[
    <?php $loop=0;foreach($game as $key):
    $loop++
    ?>
    {
        "id":<?=$key['ID']?>,
        "name":"#<?=$key['NAME']?> ",
        "avatar":"<?=$key['THUMBS']?> ",
        "type":"contact2"
    }
    <?php if(count($game)>$loop):?>,<?php endif?>
    <?php endforeach;?>
]