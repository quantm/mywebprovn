$(document)
//start ready function
.ready(function(){
$("input").tooltip();
})
//end ready function
//start function 
.on('mouseover','.question',function(){
	var id_sentence=$(this).attr('id').replace('question_','')
	$.ajax({
		dataType:"html",
		type:"get",
		url:'/toefl/get_content_true',
		data:{
			id_sentence:id_sentence
		},
		success:function(data){
			for(var count=0;count<=4;count++){
				if($("#first_letter_choice_"+id_sentence+"_"+count).attr('class') == 'first_letter true_answer'){
					$("#first_letter_choice_"+id_sentence+"_"+count).popover(						
						{title:'ANSWERS EXPLANATION',
							trigger:'click',
							html:'true',
							placement:'right',
							content:'<div class="explain_true_content">'+data+'</div>'
						}
					)
				}
				else{
					//do nothing
				}

			}	
	}
	})
})
//end function 
//start function
.on('click','#view_result_detail',function(){
})
//end function

