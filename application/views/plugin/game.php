[
<?php $index=0; foreach($game as $key):?>
<?php $index++;?>	
{
        "id": "<?php echo $key['ID']?>",
        "name": "<?php echo $key['NAME']?>",
        "avatar":"<?php echo "http://myweb.pro.vn".$key['THUMBS']?>",
        "type":"contact"
 }
<?php if($index < count($game)) echo ','?>
<?php endforeach;?>   
]		