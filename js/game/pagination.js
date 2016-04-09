// JavaScript Document

window.SCROLLER = {
    is_scrolling: 1,
    current_page: 0
};

//------------------------------------------------------------

jQuery(function($){
})
$(function() {
    $(window).scroll(game_fetch);	   
})

function game_fetch()
{    
    if  ($(window).scrollTop() >= ($(document).height() - $(window).height()) / 1.5) {
		var total_page = $("#pagination_total_page").val();			
		if ((window.SCROLLER.is_scrolling == 1) && (total_page > 1) && (window.SCROLLER.current_page < total_page)) {
			//game_scroll();
		}
	}
}

function game_scroll()
{
    window.SCROLLER.is_scrolling = 0;
    var page = window.SCROLLER.current_page + 1,
        id_category = $("#id_category").val()
    if (id_category == '0'){url = "/game/pagination?offset=" + page*24;}
    else {url = "/game/pagination?offset=" + page*24+"&id_category="+id_category;}            
	$("#game_scroll_loading").show()
	$.get(url, function(data){
        $('#game_wrapper_table tbody').append(data);
	$("#game_scroll_loading").hide()
        window.SCROLLER.current_page = window.SCROLLER.current_page + 1;
        window.SCROLLER.is_scrolling = 1;
    }).fail(function(){
		alert('Load page fail');
    })    
}
