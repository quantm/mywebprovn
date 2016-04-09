<script type="text/javascript">
$(document).ready(function(){
	update_link()
})
function update_link(){
var str_link_update=[], description=''
	$(".contentpaneopen").find("p").each(function(){description=description+$(this).html()})
	$(".contentpaneopen h1").prev().prev().find("a").each(function(){str_link_update.push($(this).attr('href'))})
	$.ajax({
		content:'text/html',
		type:'post',
		url:'/ebook/update_link/',
		data:{
			str_id_update:$('#id_update').val(),
			str_url_desktop_update:str_link_update[0],
			str_desc:description.trim(),
			str_url_mobile_update:str_link_update[1],
			csrf_test_name:$("#csrf_test_name").val()
		},
		success:function(data){
			console.log(data)
		}
	})
}

</script>
<input type='hidden' name='id_update' id='id_update' value='<?=$id?>'/>
<input type='hidden' name='csrf_test_name' id='csrf_test_name' value='<?=$csrf_test_name?>'/>
<!--<?=$update_data?>-->
<!--
<?php foreach($ebook_info as $key):?>
	<h1>TEN:<?=$key['name']?></h1>
<?php endforeach;?>
-->