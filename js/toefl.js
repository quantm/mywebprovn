var arr_true= [], arr_false=[], arr_reading_01_13=[],true_percent=0,id_sentence=0,arr_reading_01_26=[],
	dom_height=window.innerHeight,arr_question=[], array_merge_question =[]
$(document)
//start ready function
.ready(function(){
$(".checkbox_reading_01_13").tooltip();
$(".modal-header button").click(function(){
	$(".alert_register").hide();
})
$("#toc img").click(function(){
	var left_toc_height=parseInt($("#toc").height()),window_height=parseInt(dom_height*65/100)
	if(left_toc_height>window_height){
	var fix_height=left_toc_height-window_height
	$(".intro").attr('style','margin-top:'+fix_height+'px')
	}
})

$('.intro_register').tooltip({
title:'Click để đăng ký',
placement:'top'
})
$(".alert_register a").click(function(){
	$("#modal_login").modal('hide')
	$("#modal_register").modal('show')
})
$(".reading_question a,.listening_question a, .speaking_question a,.writting_question a").tooltip({title:'Click để học',placement:'top'})
$(".reading_answer a,.listening_answer a, speaking_answer a,.writting_answer a,#lesson_to_test")
	.tooltip({title:'Click để làm bài tập',placement:'right'})
	 .click(function(){
			$("#toefl_overview #id").val($(this).attr("data-id"))
			$("#toefl_overview #type").val($(this).attr("data-type"))
			if($("#is_logged").val()=="0"){			
				$(".alert_register").show()
				$("#modal_login")
					.attr("style",'width:500px!important;z-index:10000')
					.modal("show")
			}
			else {
				$(".ajax_load")
					.show()
					.find("span")
					.attr('style','color:blue;font-weight:bold')
					.html('Đang vào bài test...')
				$("#toefl_overview").submit()
			}
	  })
$('.intro_login').tooltip({
title:'Click để đăng nhập',
placement:'top'
})
$('.pronunciation').tooltip({
title:"Nghe phát âm",
placement:"top"
})
$("#list_reading_01").tooltip({
	title:'Click to open the reading exercise',
	placement:'left'
})
$('#list_reading_01').click(function(){
	$(".reading_section_overview").hide('slow')
	call_reading("1","toefl_wrapper")
})
$(".reading,.reading_section_overview").tooltip(
		{
		title:"",
		placement:"left"
	}
)


$("#model_1_reading_1 a").tooltip({placement:"top"})
$(".related li").tooltip({
	title:"click để mở MBook",
	placement:"left"
})

$("#Header1").remove()
$(".blog-posts").css("margin-top","-13%")
$(".date-header").remove()
})
//end ready function


//start processing reading 01
.on("click",".checkbox_model_01_reading_01",function(){
	$("#check_stat").val('1')	
	var id_sentence=$(this).attr("name").replace("reading_","")
		//start ajax call
		$.ajax({
			dataType:'text',
			type:'get',
			url:'/toefl/compare_answer/',
			data:{
			id_sentence:id_sentence,
			id_choice:$(this).val()
			},
			success:function(data){
					var array_sentence_item=[id_sentence+"_1",id_sentence+"_2",id_sentence+"_3",id_sentence+"_4"]			
					if(data.match('false')){					
						array_sentence_item.splice(array_sentence_item.indexOf(data.replace('false_','')),1)
						//one sentence return one value true or false
						for(var arr_s_true=0;arr_s_true<=array_sentence_item.length;arr_s_true++){
							if(arr_true_01_01.indexOf(array_sentence_item[arr_s_true])!="-1"){
								arr_true_01_01.splice(arr_true_01_01.indexOf(array_sentence_item[arr_s_true]),1)					
							}							
							if(arr_false_01_01.indexOf(array_sentence_item[arr_s_true])!="-1"){
								arr_false_01_01.splice(arr_false_01_01.indexOf(array_sentence_item[arr_s_true]),1)					
							}							
						}
						arr_false_01_01.push(data.replace('false_',''))																
					}
					if(data.match('true')){
						array_sentence_item.splice(array_sentence_item.indexOf(data.replace('true_','')),1)	
						for(var arr_s_false=0;arr_s_false<=array_sentence_item.length;arr_s_false++){
							if(arr_false_01_01.indexOf(array_sentence_item[arr_s_false])!="-1"){
								arr_false_01_01.splice(arr_false_01_01.indexOf(array_sentence_item[arr_s_false]),1)					
							}							
						}
						arr_true_01_01.push(data.replace('true_',''))					
					}			
			}
		})
		//end ajax call
})
//end processing reading 01

//start processing reading 02
.on("click",".checkbox_model_01_reading_02",function(){
	var id_sentence=$(this).attr("name").replace("reading_","")
	$("#check_stat").val('1')
	//start ajax call
		$.ajax({
			dataType:'text',
			type:'get',
			url:'/toefl/compare_answer/',
			data:{
			id_sentence:id_sentence,
			id_choice:$(this).val()
			},
			success:function(data){
					var array_sentence_item=[id_sentence+"_1",id_sentence+"_2",id_sentence+"_3",id_sentence+"_4"]			
					if(data.match('false')){					
						array_sentence_item.splice(array_sentence_item.indexOf(data.replace('false_','')),1)
						//one sentence return one value true or false
						for(var arr_s_true=0;arr_s_true<=array_sentence_item.length;arr_s_true++){
							if(arr_true_01_02.indexOf(array_sentence_item[arr_s_true])!="-1"){
								arr_true_01_02.splice(arr_true_01_02.indexOf(array_sentence_item[arr_s_true]),1)					
							}							
							if(arr_false_01_02.indexOf(array_sentence_item[arr_s_true])!="-1"){
								arr_false_01_02.splice(arr_false_01_02.indexOf(array_sentence_item[arr_s_true]),1)					
							}							
						}
						arr_false_01_02.push(data.replace('false_',''))																
					}
					if(data.match('true')){
						array_sentence_item.splice(array_sentence_item.indexOf(data.replace('true_','')),1)	
						for(var arr_s_false=0;arr_s_false<=array_sentence_item.length;arr_s_false++){
							if(arr_false_01_02.indexOf(array_sentence_item[arr_s_false])!="-1"){
								arr_false_01_02.splice(arr_false_01_02.indexOf(array_sentence_item[arr_s_false]),1)					
							}							
						}
						arr_true_01_02.push(data.replace('true_',''))					
					}			
			}
		})
		//end ajax call
})
//end processing reading 02

//start
.on("click",".checkbox_reading_01_13",function(){
		$("#check_stat").val('1')	
		if($(this).prop('checked')){arr_reading_01_13.push($(this).val())}
		else{
			var index=arr_reading_01_13.indexOf($(this).val())
				if(index!=-1){arr_reading_01_13.splice(index,1)}
			}
	if(arr_reading_01_13.length == 3){
		//start ajax call
		var choice_13=arr_reading_01_13.toString().replace(',','').replace(',','')
			if(choice_13=='efd'){choice_13='edf'}
			if(choice_13=='fed'){choice_13='edf'}
			if(choice_13=='fde'){choice_13='edf'}
			if(choice_13=='def'){choice_13='edf'}
			if(choice_13=='dfe'){choice_13='edf'}
		$.ajax({
			dataType:'text',
			type:'get',
			url:'/toefl/compare_answer/',
			data:{
			id_sentence:13,
			id_choice:choice_13
			},
			success:function(data){
					if(data.match('false')){
						if(arr_true_01_01.indexOf(data)!='-1'){
							arr_true_01_01.splice(arr_true_01_01.indexOf(data),1)
						}
						arr_false_01_01.push(data)
					}
					if(data.match('true')){
						if(arr_false_01_01.indexOf(data)!='-1'){
							arr_false_01_01.splice(arr_false_01_01.indexOf(data),1)
						}
						arr_true_01_01.push(data)
					}
			}
		})
		//end ajax call		
	}
})
//end

.on('click','.intro_register',function(){
$("#modal_register").modal('show')
})
.on('click','.intro_login',function(){
$("#modal_login").modal('show')
})

//start function
.on("click",".checkbox_reading_01_26",function(k){
		$("#check_stat").val('1')	
		$("#modal_login").attr('style','z-index:-1')
		if($(this).prop('checked')){arr_reading_01_26.push($(this).val())}
		else{
			var index=click_reading_01_26.indexOf($(this).val())
				if(index!=-1){click_reading_01_26.splice(index,1)}
			}
	if(arr_reading_01_26.length == 3){
		//start ajax call
		var choice_26=arr_reading_01_26.toString().replace(',','').replace(',','')
			if(choice_26=='efc'){choice_13='ecf'}
			if(choice_26=='fec'){choice_13='ecf'}
			if(choice_26=='fce'){choice_13='ecf'}
			if(choice_26=='cfe'){choice_13='ecf'}
			if(choice_26=='cef'){choice_13='ecf'}
		$.ajax({
			dataType:'text',
			type:'get',
			url:'/toefl/compare_answer/',
			data:{
			id_sentence:26,
			id_choice:choice_26
			},
			success:function(data){
					if(data.match('false')){
						if(arr_true_01_02.indexOf(data)!='-1'){
							arr_true_01_02.splice(arr_true_01_02.indexOf(data),1)
						}
						arr_false_01_02.push(data)
					}
					if(data.match('true')){
						if(arr_false_01_02.indexOf(data)!='-1'){
							arr_false_01_02.splice(arr_false_01_02.indexOf(data),1)
						}
						arr_true_01_02.push(data)
					}
			}
		})
		//end ajax call		
	}
})
//end function

//start function
.on("mouseover",".first_letter",function(){
	var id_sentence_item_true=$(this).attr('id').split("_")[3];
	for(var index_question=0;index_question<=13;index_question++){
		if(index_question != id_sentence_item_true){
			$("#question_"+index_question+" .popover").remove();
		}
	}
})
//end function

//start function
.on('click','.btn_next',function(){
	var id=$(this).attr("data-next"),current_id="#question_"+$(this).attr("data-id")
		if($("#check_stat").val()=='0'){
			$("#modal-check").show('slow')
		}
		if($("#check_stat").val()=='1') {
			$(current_id).hide('fast')
			call_exam(id,current_id)
		}
})
//end function

function call_reading(id,id_fetch_html){
$(".ajax_load").show()
//start ajax call	
	$.ajax({
			dataType:'text',
			type:'get',
			url:'/toefl/index/',
			data:{
			reading:id,
			},
			success:function(data){
			$(".ajax_load").hide()
			$("#"+id_fetch_html).html(data)
			$("#lesson_title").show();
			}
		})
		//end ajax call
}

function call_exam(id,id_ads){
$(".ajax_load").show()
//start ajax call	
	$.ajax({
			dataType:'text',
			type:'get',
			url:'/toefl/fetch_child_question',
			data:{
			id:id,
			},
			success:function(data){
			$(".ajax_load").hide()
			$("#question_"+id).html(data)
			$(id_ads).find(".inline_question_ads").remove();
				if(id=="13"){
					$("#modal_login").attr("style",'top:55%')				
				}
			$("#check_stat").val("0")
			$("#modal-check").hide()
			}
		})
		//end ajax call
}

//start function
function get_mark(id){
	switch(id){
		case "01_01":
		true_percent=arr_true_01_01.length/(arr_false_01_01.length+arr_true_01_01.length)
		$("#num_excercise_done_true").html(arr_true_01_01.length)
		$("#num_excercise_done").html(arr_false_01_01.length+arr_true_01_01.length)
		$("#num_excercise_done_false").html(arr_false_01_01.length)
		$("#num_excercise_done_true_percent").html(Math.round(true_percent*100)+"%")
		$("#reading_estimate").html(Math.round(true_percent*30)+"/30")
		if($("#check_stat").val()=="1"){
			show_true_false(arr_true_01_01,arr_false_01_01)
			show_detail()
		}
		else {
			$("#modal-check").show()
		}
		break;
		case "01_02":
		true_percent=arr_true_01_02.length/(arr_false_01_02.length+arr_true_01_02.length)
		$("#modal_result").modal('show')
		$("#num_excercise_done_true").html(arr_true_01_02.length)
		$("#num_excercise_done").html(arr_false_01_02.length+arr_true_01_02.length)
		$("#num_excercise_done_false").html(arr_false_01_02.length)
		$("#num_excercise_done_true_percent").html(Math.round(true_percent*100)+"%")
		$("#reading_estimate").html(Math.round(true_percent*30)+"/30")
		break;
	}
}
//end function

//start function
function show_true_false(arr_true,arr_false) {
	if(arr_true.length != 0){
		for(var index_true=0;index_true<=arr_true.length;index_true++){
				$("#first_letter_choice_"+arr_true[index_true]).append("<img class='true_false' src='/images/true.png'>")
				array_merge_question.push(arr_true[index_true])
		}
	}	
	if(arr_false.length != 0){
		for(var index_false=0;index_false<=arr_false.length;index_false++){			
				$("#first_letter_choice_"+arr_false[index_false]).append("<img class='true_false' src='/images/false.png'>")
				array_merge_question.push(arr_false[index_false])
		}
	}
	array_merge_question.splice(arr_true.length,1)
	array_merge_question.splice(array_merge_question.indexOf("undefined",1))
	/*
	for(var index_array_merge_question=0;index_array_merge_question<=array_merge_question.length;index_array_merge_question++)
	{ 
					if(array_merge_question[index_array_merge_question].search('13')!=-1){
						if(array_merge_question[index_array_merge_question].split("_")[0].search('false') !=-1){
							$("#first_letter_choice_13_1").append("<img class='true_false' src='/images/false.png'>")	
							console.log("false")
						}
						if(array_merge_question[index_array_merge_question].split("_")[0].search('true') !=-1){
							$("#first_letter_choice_13_1").append("<img class='true_false' src='/images/true.png'>")	
							console.log("true")
						}
					}
	}
	*/
}
//end function 


//start function
function show_detail(){

	for(var k=0;k<=arr_db_true.length;k++){
	$("#"+arr_db_true[k]).append('<sup>true</sup>')
	$("#"+arr_db_true[k]).addClass('true_answer')
}

$('#'+"first_letter_choice_13_4")
	.addClass('true_answer')
	.append('<sup>true</sup>')

$('#'+"first_letter_choice_13_6")
	.addClass('true_answer')
	.append('<sup>true</sup>')


$('#'+"first_letter_choice_13_5")
	.addClass('true_answer')
	.append('<sup>true</sup>')
$(".true_false").show();

$(".question").attr("style","display:block")
$(".btn_next").attr("style","display:none")
$("#model_1_reading_1").attr("style","display:none")
$("#question_13").attr("style","margin-top:0px")
$(".text_guide").html("<img width='32px' height='32px' src='/images/false.png'/> : bạn làm sai</br> <img width='32px' height='32px' src='/images/true.png'> : bạn làm đúng<br-/> <span style='color:red'></br>Click vào chữ <font color=blue>true</font> để xem giải thích về đáp án của mỗi câu</span>")
$("#model_01_reading_exercise_01").attr("style","margin-left:75px")
$("#question_12").find("sup").remove()
$(".reading_result").show()
$(".reading_result .modal-body").html($("#modal_result .modal-body").html())
$("#question_13 #finish_reading_01_01")
	.val("Lưu kết quả")
	.attr('is_finish','1')
console.log(array_merge_question[12])
}
//end function