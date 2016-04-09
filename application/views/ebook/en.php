<meta name="Author" content=""/>
<script type="text/javascript">
$(document).ready(function(){
	post_ins_db()
})
.on("click","a",function(){
	$("#id").val($(this).attr("data-href"))
	$("#view_book").submit()
})

function post_ins_db(){
	var ins_db_title=[],ins_db_link=[],ins_db_thumbs=[],ins_db_desc =[],ins_db_author=[]
	$(".contentdescription a").each(function(value,index){
		ins_db_title.push($(this).html().trim())
		//ins_db_author.push($(".stt").next().next().html().trim())
		//ins_db_thumbs.push($(this).find('img').attr('src'))
		//ins_db_desc.push($(this).find('h4').html())
		ins_db_link.push($(this).attr('href'))
	
		//start ajax
		$.ajax({
			content:'text/html',
			type:'post',
			url:'http://myweb.pro.vn/ebook/get_book',
			data:{
				csrf_test_name:$("#csrf_test_name").val(),
				name:ins_db_title[value],
				author:'unknown',
				link:"http://pdfbooks.co.za/"+ins_db_link[value],
				//thumbs:ins_db_thumbs[value],
				//description:ins_db_desc[value]
			},
			success:function(data){
				console.log(data)
				//window.open('http://myweb.pro.vn/ebook/get_download_link?id_update='+data,'_blank')	
			}
		})
		//end ajax

	})
}
</script>
<link href="/css/ebook/my.css" media="screen" rel="stylesheet" type="text/css">
<form  id="view_book" method="post" action="/ebook/en">
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
	<input type="hidden" name="id" id="id"/>
</form>
<?=$content?>
