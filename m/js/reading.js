function show_tooltip(id){
	document.getElementById(id).style.display='block';
}
function hide_tooltip(id){
	document.getElementById(id).style.display='none';
}
function go_top(){
	window.scrollTo(500,220);	
		document.getElementById('keyword_model_01_question_03').style.color='red';
}
$(document).ready(function(){
	$("input").tooltip();
})