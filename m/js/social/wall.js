jQuery(function($){
$(document)
.on("click", "#my_wall_btn", function() {
my_wall_post($(this).attr("id"), "my_wall_textarea", "frm_my_wall", "url_my_wall_save", "my_wall_wrapper")
})
.on("click", "#btn_my_wall_delete_message", my_wall_delete)
.on("keypress", ".textarea_wall_post", my_wall_comment)
.on("click", ".btn-delete-like a", set_delete_id)
.on("keypress", "#my_wall_textarea", function(){
//enable the submit button
$("#my_wall_btn")
.show()
.attr("disabled", false);
$(this).addClass("highlight")
})
.on("click", ".textarea_wall_post", function(){
var id = $(this).attr("id").replace("textarea_wall_post","")
$(this).addClass("highlight")
hashtag($(this).attr('id'))
$(".my_wall_text_comment_input #avatar_wrapper" + id).show()
$(".my_wall_text_comment_input .control-group .controls #wrapper_textbox" + id + " div")
.addClass("textbox_focus")
$(".my_wall_text_comment_input #wrapper_textbox" + id).addClass("wrapper_textbox")
$(this).focus()
})
.on ("blur", ".textarea_wall_post", function(){
var id_blur = $(this).attr("id").replace("textarea_wall_post","")
$(".my_wall_text_comment_input #avatar_wrapper" + id_blur).hide()
})

.on('focus',"",function(){
$(".textntags-tag-list").attr('style','width:423 !important')
})
//start
.ready(function(){
hashtag("my_wall_textarea")
$("#my_wall_btn").addClass("finished_hash_tag")		  
})
//end

//start	
.on('click',"#default_wall_body .sidebar li",function(){
var arr_wall = ['0','1','2','3','4','5','6','7','8','9']
$("#modal_login").attr("style","z-index:-1")
switch($(this).attr("id")){
case "wall_left_7":
	$("#wall_name").html("Cập nhật tài khoản")			
	$.ajax({
	content:'text/html',
	type:'get',
	url:'/user/profile/',
	success:function(data){
	$("#wall_right_6,#wall_right_8,#wall_right_9").hide()
		$("#wall_right_7")
		.show('slow')
		.html(data)			
	}
	})
break;
case "wall_left_0":
$("#wall_right_0").show('slow')
break;

case "wall_left_6":
$.ajax({
content:"text/html",
type:"get",
url:"/book/mylib/",
success:function(data){
$("#wall_right_7,#wall_right_8,#wall_right_9").hide()
$("#wall_right_6")
	.show('slow')
	.html(data)
}
})
break;

//start game
case "wall_left_8":
$.ajax({
content:"text/html",
type:"get",
url:"/game/mygame/",
success:function(data){
$("#wall_right_6,#wall_right_7,#wall_right_9").hide()
$("#wall_right_8")
	.show('slow')
	.html(data)
}
})
break;
//end game

//start film
case "wall_left_9":
$.ajax({
content:"text/html",
type:"get",
url:"/video/myvid/",
success:function(data){
$("#wall_right_6,#wall_right_7,#wall_right_8").hide()
$("#wall_right_9")
	.show('slow')
	.html(data)
}
})
break;
//end film
}
if($(this).attr('class')=='active'){
//do nothing
}
else(
$(this).addClass('active')
)
arr_wall.splice(arr_wall.indexOf($(this).attr('id').replace('wall_left_','')),1)
for(var wall_id=0;wall_id<=arr_wall.length;wall_id++){
$("#wall_left_"+arr_wall[wall_id]).removeClass('active')
$("#wall_right_"+arr_wall[wall_id]).hide()
}
})
//end

})

function set_delete_id()
{
$("#my_wall_delete_id").val($(this).attr('data-id'))
}

function my_wall_delete()
{
$.ajax({
type: 'post',
url: $("#url_self_my_wall_delete").val(),
data: {
'obj-id-message-delete':$("#my_wall_delete_id").val(),
'csrfmiddlewaretoken': $("#frm_my_wall input").val()
},
success:function(data) {
var return_delete_obj = jQuery.parseJSON(data),
delete_arr=return_delete_obj.delete_object,
return_delete_message = delete_arr[delete_arr.length-1]
$("#my_wall_delete_message").modal("hide")

//if not the user that create the message show the modal with error message
if (return_delete_message == "false") {
$("#my_wall_delete_message_permission").modal("show")
}

//if the user that create the message empty html node of the message
if (return_delete_message == "true") {
for (var j=0;j<delete_arr.length;j++){
	$(".my_wall_wrapper #my-wall-post-"+delete_arr[j]).empty()
	$("#my_wall_text_comment_input_"+delete_arr[j]).empty()
}
}
hashtag("my_wall_textarea")
}
})
}

function my_wall_comment(event)
{
var id=$(this).attr("id"), parent_id = id.replace('textarea_wall_post_',''),
comment_text = $(this).val().trim().length
if (event.keyCode == 13 && comment_text != 0) {
$(this).attr("disabled",true)
$.ajax({
type: 'post',
url: $("#url_my_wall_save").val(),
data: {
'textbox_comment':$(this).val(),
'message_id':parent_id,
'csrfmiddlewaretoken':$("#frm_my_wall input").val()
},
success:function(data) {
$("#my_wall_text_comment_input_"+parent_id).prev().append(data)
$("#my-wall-no-message").empty()
$("#"+id)
.val(" ")
.removeClass("my_wall_parent")
.addClass("my_wall_child")
.attr("disabled",false)
}
})
}
}
