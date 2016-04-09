[
<?php $index=0; foreach($book as $key):?>
<?php $index++;?>	
{
        "id": "<?php echo $key['ID']?>",
        "name": "<?php echo $key['NAME']?>",
        "avatar":"<?php echo $key['THUMBS']?>",
        "type":"contact"
 }
<?php if($index < count($book)) echo ','?>
<?php endforeach;?>   
]
<meta charset="UTF-8"/>