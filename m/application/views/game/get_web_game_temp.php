<?=$content?>
<script type="text/javascript">
$(document)
.on('click','span',function(){
	$("#temp_url").val($(this).attr('href'))
	$('#frm_get_web_game').submit()
})
</script>
<form id="frm_get_web_game" action="/play/insdb/" target="_new">
<input type="hidden" name='temp_url' id="temp_url" value=""/>
</form>