[
<?php $index=0; foreach($user as $key):?>
<?php $index++;?>	
{
        "id": "<?php echo $key['ID_U']?>",
        "name": "<?php echo $key['USERNAME']?>",
        "avatar":"<?php 
			if($key['facebook_id']!=''&& $key['USER_IMAGE'] =='') echo 'https://graph.facebook.com/'.$key['facebook_id'].'/picture'; 
			if($key['facebook_id']=='' && $key['USER_IMAGE'] !='' &&  $key['facebook_id'] != $key['USER_IMAGE']) echo $key['USER_IMAGE'];
			if($key['facebook_id']=='' && $key['USER_IMAGE'] =='') echo '/images/no_avatar.png';
			if($key['facebook_id']!='' && $key['USER_IMAGE'] !='' &&  $key['facebook_id'] != $key['USER_IMAGE']) echo $key['USER_IMAGE']; 
			if($key['facebook_id'] == $key['USER_IMAGE'] && $key['USER_IMAGE'] !='')  echo 'https://graph.facebook.com/'.$key['facebook_id'].'/picture'; ?>",
        "type":"contact"
 }
<?php if($index < count($user)) echo ','?>
<?php endforeach;?>   
]