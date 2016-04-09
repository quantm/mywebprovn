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