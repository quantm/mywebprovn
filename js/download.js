$(document)

//start ready function
.ready(function(){

		//remove unused object
		$('.remove').remove()
		//end

		//hightlight left and middle advertisement object onload
		setInterval(function(){
		$(".adv_micro_left .adv_items, .adv_micro_left .adv_item").toggleClass("blink");
		},3000)
		setInterval(function(){
		$(".middle_advertisement .adv_items, .middle_advertisement .adv_item").toggleClass("blink_blue");
		},1000)
		//end

		//reset path
		$('.new-list').find('a').each(function(){
			var name=$(this).attr('title'),
				path=$(this).attr('href')+'&name='+name
			//$(this).attr('href',path)
		})
		//end


})
.on('ready',
	function(){
		
		//hightlight right advertisement object onload
		setInterval(function(){
		$(".adv_micro_right .adv_items, .adv_micro_right .adv_item").toggleClass("blink_rose");
		},3000)
		//end

		if($(this).find('.ssvzHeader').find('div').find('a').length>0){
			//do not thing		
		}	
		if($(this).find('.ssvzHeader').find('div').find('a').length=='0'){		
			$('.ssvzHeader div ').html('<span style="margin-left:5px">QUẢNG CÁO</span>')
		}
	}
)
//end ready function
.on('mouseover','.adv_items,.adv_item',function(){
	 $('.adv_items,.adv_item').attr('style','background-color:white')
})

.on('mouseover','.fa-search',function(){
	$('#___gcse_0').show('slow')	 
})

.on('mouseout','#___gcse_0',function(){
	//$(this).hide('slow')	 
})

