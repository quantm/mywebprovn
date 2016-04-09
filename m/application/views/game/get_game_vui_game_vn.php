<script id="test" type="text/javascript">
$(document).ready(function(){
	get_data()	
	$("a")
		.attr("href","#")
		.attr("title","#")
	$("span").attr("style","#")
})
function get_data(){
$.ajax({
		content:"text/html",
		type:'post',
		url:'/play/dbins',
		data:{
		csrf_test_name:$("#csrf_test_name").val(),
		flashfile:$("#flashfile").val(),
		p_image:$("#p_image").val(),
		pname:$("#pname").val(),
		game_key:$("#cachChoi").html(),
		desc:$(".Score").html()
		},
		success:function(){
		alert('ok - save in db')
		}
	})
}
</script>
<input type="hiddem" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
<?=$content?>