 <script id="test" type="text/javascript">
var src='',embed_type='';
$(document).ready(function(){
	$("a")
		.attr("href","#")
		.attr("title","#")
	$("span").attr("style","#")
})

function get_data(){
if($("#game-holder iframe").length=='1'){
	src=$("#game-holder iframe").attr('src')
	embed_type='webgame';
}
if($("#game-holder embed").length=='1'){
	src=$("#game-holder embed").attr('src')
	embed_type='unity3d';
}
$.ajax({
		content:"text/html",
		type:'post',
		url:'/play/dbins',
		data:{
		csrf_test_name:$("#csrf_test_name").val(),
		flashfile:src,
		embed_type:embed_type,
		p_image:$("#game-name").prev().find('img').attr('src'),
		pname:$("#game-name").text(),
		game_key:$("#controlslog table tbody tr td").html(),
		desc:$(".little-zone-content").html()
		},
		success:function(data){
		console.log('ok - save in db:'+data)
		}
	})
}
</script>
<button style="position:absolute;z-index:100000000;margin-top:15%" class="btn btn-primary" onclick="get_data()">get_game</button>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
<?=$content?>