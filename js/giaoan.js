$(document)
//start ready function
.ready(function(){

//tooltip
	$('.item_link').tooltip({placement:'bottom'})
//end


$('#globalheader a').each(function(){
	var path=$(this).attr('href')+'?'+document.location.href.split('?')[1]
		if(document.location.href.split('?')[1]!='undefined'){
			$(this).attr('href',path)
		}
})	

//count
$("#globalheader div").append("<a style='float:right;margin-left:35%;position:absolute;pointer-events:none' href='#'>Tổng số giáo án : " +$('#total_rows').val()+"</a>")
//end

})
//end ready function


///close bottom advertisement
.on('mouseover','.adv_micro_bottom',function(){
	$(this).addClass('adv_bottom_top')
})
.on('mouseout','.adv_micro_bottom',function(){
	$(this).removeClass('adv_bottom_top')
})
//end

//register, login
.on('click','#show_register,#show_login',function(){
	$('#modal_register,#modal_login').addClass('modal_register_view')
})
.on('mouseover','#show_register',function(){
	$('#modal_register').addClass('show_modal_register')
})
//end

//close modal event
.on('click','.close',function(){
	//set z-index modal_register
		$('#modal_register,#modal_login').removeClass('modal_register_view')
	//end
})
//end

.on("mouseover",".ebook_div_item", show_ebook)
.on("mouseout",".ebook_div_item", hide_ebook)
//header cse
.on('mouseover','.header_text_search',function(){
$('#cse-search-box').show('slow')
$('.header_text_search').hide()
})
.on('click','#header_cse_close',function(){
$('#cse-search-box').hide('slow')
$('.header_text_search').show()
})
//end

function show_ebook()
{
$("#"+"ebook_item_"+$(this).attr("id").replace("ebook_div_item_", "")).show()   
}

function hide_ebook()
{
$("#"+"ebook_item_"+$(this).attr("id").replace("ebook_div_item_", "")).hide()   
}
