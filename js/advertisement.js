$(document)
.ready(function(){

})
.on('mouseover','.adv_items,.adv_item',function(){
	 $('.adv_items,.adv_item').attr('style','background-color:white')
})
.on('ready',
	function(){
		if($(this).find('.ssvzHeader').find('div').find('a').length>0){
			//do not thing		
		}	
		if($(this).find('.ssvzHeader').find('div').find('a').length=='0'){		
			$('.ssvzHeader div ').html('<span style="margin-left:5px">QUẢNG CÁO</span>')
		}
	}
)

//hightlight advertisement onmouseover
.on('mouseover','.ssvzone_16597_items,.adv_items,.adv_item',function(){
	$(this).addClass('advertisement_hightlight')
})

.on('mouseout','.ssvzone_16597_items,.adv_items,.adv_item',function(){
	$(this).removeClass('advertisement_hightlight')
})
//end