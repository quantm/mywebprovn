$(document).ready(function(){
	$("#globalnav").append('<li><span class="footer_span"><a target="_new" href="/guide/game_unity">Hướng dẫn cài Unity Web Player</a></span></li>')
})
</script>
<script>
$(function() {
var projects = [
<?php foreach($game as $key):?> 
{
value: "<?=$key['NAME']?>",
label: "<?=$key['NAME']?>"
},
<?php endforeach;?>
];

$( "#search" ).autocomplete({
minLength: 0,
source: projects,
focus: function( event, ui ) {
$(".fa-search").attr('style','margin-left:305px')
$("#search").attr('style','width:375px')
$( "#search" ).val( ui.item.label );
return false;
},
select: function( event, ui ) {
$( "#search" ).val( ui.item.label );      
$("#game_header_search").submit()
return false;
}
})

});
$(window).scroll(set_scroll);
function set_scroll(){
	$("#globalheader").addClass('footer_scroll')
}