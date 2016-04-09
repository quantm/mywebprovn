$(document)
    .on("mouseover",".ebook_div_item", show_ebook)
    .on("click",".ebook_div_item",set_ebook)
    .on("mouseout",".ebook_div_item", hide_ebook)
    .on("ready", ebook_action)

function show_ebook()
{
	$("#"+"ebook_item_"+$(this).attr("id").replace("ebook_div_item_", "")).show()   
}

function hide_ebook()
{
    $("#"+"ebook_item_"+$(this).attr("id").replace("ebook_div_item_", "")).hide()   
}

function set_ebook()
{	$(".ebook_div_item").hide()
    $("#ebook_title").html($(this).find("button").attr("data-name"))
    $("#iframe_ebook").attr("src",$(this).find("button").attr("data-embed"))   
}

function ebook_action()
{
		//close the ebook modal and show the main header
		$("#ebook_body .close").click(function(){
			$("header").show();
		})

    	$("#li_ebook_category ul li").click(function(){
            $("#id_category").val($(this).attr("data-id"))
    		$("#name_category").val($(this).find("a").html())
            $("#count_category_item").val($(this).find("input").val())         
    		$("#game_header_search")
            .attr("action","/ebook/index/")
            .submit()
		})
		$(".modal-header button").click(function(){
			$(".ebook_div_item").show()
		})
}