$(document)
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
.ready(function(){
//start fix firefox UI error
var isFirefox = typeof InstallTrigger !== 'undefined';   
if(isFirefox){
	$(".fa-search").addClass('firefox_search')
}
//end
$(".navbar-inner").attr("style","background-image: linear-gradient(to bottom, #2D2E30, #000000)")
$(".header-small,.adsence, sup").remove()
var isFirefox = typeof InstallTrigger !== 'undefined';   
if(isFirefox){
$(".fa-search").attr('style','margin-top:5px!important')
}	
})
$(window).scroll(show_ads)
function show_ads(){

}
