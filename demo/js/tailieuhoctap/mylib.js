$(document)
    .on("mouseover",".ebook_div_item", show_ebook)
    .on("click",".ebook_div_item",set_ebook)
    .on("mouseout",".ebook_div_item", hide_ebook)
function show_ebook()
{
	$("#"+"ebook_item_"+$(this).attr("id").replace("ebook_div_item_", "")).show()   
}

function hide_ebook()
{
    $("#"+"ebook_item_"+$(this).attr("id").replace("ebook_div_item_", "")).hide()   
}

function set_ebook()
{		var path=$(this).find("button").attr("data-href")
		window.open(path,"_new")
		$("header").attr('style','display:block')
}

