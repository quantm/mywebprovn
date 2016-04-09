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

//redirect to mobile site
if(window.innerWidth <= "800" && window.innerHeight <= "640") {
	window.open('http://myweb.pro.vn/mobile/karaoke/','_parent')
}
//end mobile

$(".navbar-inner").attr("style","background-image: linear-gradient(to bottom, #2D2E30, #000000)")
$(".header-small,.adsence, sup").remove()
var isFirefox = typeof InstallTrigger !== 'undefined';   
if(isFirefox){
$(".fa-search").attr('style','margin-top:5px!important')
$(".fa-search").addClass('firefox_search')
}	
})
$(window).scroll(show_ads)
function show_ads(){

}
