$(document)
.on("ready", function (){
	$(".click_to_view_lyric,.learn_eng,.html5_video").tooltip();
})
.on("keypress", "#search", function(e){
$(this).addClass("header_search_box")
if(e.keyCode == 13){
$("#game_header_search").submit()
$(this).attr('disabled','disabled')
}
})
.on("click",".fa-search",function(){
$("#game_header_search").submit()
})	
.on('click','._trackLink',function(){
$("#song_name").val($(this).attr('title'))
$("#song_id").val($(this).attr('href'))
$("#frm_listen_music").submit()	
})
.on('mouseover','.content-item',function(){
$('#song_link').val($(this).find('.music-download').attr('href'))
})
.on('click','.paging ul li span',function(){
	if($(this).find('span').length=1)($(this).attr('href',$(this).find('span').attr('href')))
	$('#paging_link').val($(this).attr('href'))
	$("#frm_listen_music").attr('action','/music/index')	
	$("#frm_listen_music").submit()	
})
.on('click','.content-item p span',function(){
	$('#paging_link').val($(this).attr('href'))
	$("#song_name").val($(this).html())					
	$("#frm_listen_music").attr('action','/music/index')	
	$("#frm_listen_music").submit()	
})
.on('click','.singer-album .content-item',function(){
	$("#song_id").val($(this).find('.album-img').attr('href'))					
	$("#frm_listen_music").attr('action','/music/album')	
	$("#frm_listen_music").submit()	
})
//start ready function
.ready(function(){
	$(".comment").remove()
	$(".category").height($(".search-content").height()+$(".paging").height()+14)
	$(".blue12").remove()
	$(".sidebar,.search-categories ul,.search-categories div,.singer-site div,.singer-site p,.singer-site span").remove()
	$(".navbar-inner").attr("style","height: 45px !important;border-bottom: navajowhite;background-image: linear-gradient(to bottom, #514444, #000000)")
	
	$(".music-function .music-download").click(function(){
	
	})
$(".special-song .music-function .music-download")		
.click(function(){
	window.open($(this).attr('href'))
})
.addClass('fa fa-download fa-2x')	
})
//end ready function

