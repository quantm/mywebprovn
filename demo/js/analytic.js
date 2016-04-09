$(document).ready(function(){
   $.ajax({
	   type:"POST",
       url:"/home/analytic/",
       data:{
                type:"general",
				csrf_test_name:$("#csrf_test_name").val()
            },
		success:function(){
				
		}
	})
})