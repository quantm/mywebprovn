//start window onload
window.onload=function(){
jQuery("#notification,#game_header_search").remove()
jQuery('.fan-page').attr('href',"#")
jQuery('.fan-page').attr('href',"https://www.facebook.com/elearningsocialvn?ref=hl")
jQuery("#homepage h1 span").addClass('font-effect-neon')
jQuery('.jp-playlist img').attr('src','http://myweb.pro.vn/images/icon/music_item.png')
jQuery("#modal_login").attr('style','display:none')
jQuery(".navbar-inner").attr("style","background-image: linear-gradient(to bottom, #07ECAF, #0D5769)") //màu da trời pha xanh lá cây
//jQuery(".navbar-inner").attr("style","background-image: linear-gradient(to bottom, #12DBDB, #094B3B)") 	//màu xanh da trời

//rewrite url tag
if(jQuery('.song-tags a,.link-one,.item-result a').length!=='0'){
	jQuery('.link-one').each(function(){
		jQuery(this).attr('href',"http://myweb.pro.vn/music/nhackhongloi?"+jQuery(this).attr('href').split('?')[1]+"&title="+jQuery('.link-one').prev().find('.jp-playlist-item').html())	
	})
	jQuery('.song-tags a,,.item-result a').each(function(){	
		jQuery(this).attr('href',"http://myweb.pro.vn/music/nhackhongloi?"+jQuery(this).attr('href').split('?')[1]+"&title="+jQuery(this).html())		
	})


}
//end

jQuery('#thumb-tray').find('li')[1].remove()
jQuery('#thumb-tray').find('li')[4].remove()
jQuery('#thumb-tray').find('li')[6].remove()
//jQuery('#thumb-tray').find('li')[7].remove()
}
//end window onload
