<?php foreach($user_category as $key):?>
<input title="<?=$key['name']?>" id="user_category_<?=$key['id']?>" type="checkbox" data-id="<?=$key['id']?>" class="checkbox" /> <?=$key['name']?> <span style="color:red;margin-left:10px"></span>
<div style="clear:both"></div>
<?php endforeach;?>