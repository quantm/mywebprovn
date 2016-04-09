$(document)
//start ready function
.ready(function(){
var this_url='http://myweb.pro.vn/news/';
//$(".banner_980x60").remove();
$("#wrapper_footer .go_head").remove();

$(".scroll-pane").addClass('home_top_right')
$("#gocnhin").addClass('home_top_goc_nhin')
$(".box_sub_hot_news ul").attr('style','margin-top:-15%')
$("#gocnhin .title_news").attr('style','width:150%!important;margin-left:15px')
$(".block_title_gocnhin").attr('style','margin-left:60px !important')
$("#box_khuyenmai .title_box_category").attr('style','width:420px')
$('#xemnhieunhat').addClass('add_xemnhieu')

//start submenu fix link 
$("#breakumb_web li a").each(function(){
$(this).attr('href','/news/vnexpresss?id=http://vnexpress.net/'+$(this).attr('href'));
})
//end submenu fix link

//start body news title fix
$("#container a").each(function(){
$(this).attr("href","/news/vnexpress?id="+$(this).attr("href"))

})
//end body news title fix

//start body newss title fix css
$("#box_khuyenmai").attr("style","width:155px")
$("#box_raovat").remove();
$(".block_100").attr("style","width:100%")
//end body news title fix css


//remove ads
$("#col_3").remove()
for(var i=0;i<5;i++){
//$("#FIXED_FLOAT_BANNER_"+i).remove()
}

/*
$("#BACKGROUND").remove()
$("#BACKGROUND_available").remove()
$("#STICKY_BANNER").remove()
$("#POPUP_UNDER").remove()
$("#BALLOON_BANNER").remove()
*/
})
//end ready function

.on('mouseover','.adv_items',function(){
        $('.adv_items').attr('style','background-color:white')
})