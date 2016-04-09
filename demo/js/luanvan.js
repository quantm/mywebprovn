$(document)
	.ready(function(){
		//start add google custom search in the header
		$("#game_header_search")
		.removeAttr("method")
		.empty()
		.attr("id","cse-search-box")
		.attr("action","http://myweb.pro.vn/book/cse/")
		.html($(".frm_cse-search-box").html())
		$(".frm_cse-search-box").remove()
		//end

		//add 3d bookshelf in the bottom
		$("#globalheader div").append("<a style='float:right;margin-left:30%;position:absolute;' href='http://myweb.pro.vn/book/google_3d_bookcase'>Kệ sách 3D</a>")
		//end
	})
    .on("mouseover",".ebook_div_item", show_ebook)
    .on("mouseout",".ebook_div_item", hide_ebook)

function show_ebook()
{
	$("#"+"ebook_item_"+$(this).attr("id").replace("ebook_div_item_", "")).show()   
}

function hide_ebook()
{
    $("#"+"ebook_item_"+$(this).attr("id").replace("ebook_div_item_", "")).hide()   
}
