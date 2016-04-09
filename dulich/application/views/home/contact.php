<link rel="stylesheet" href="http://getbootstrap.com/assets/css/docs.min.css"/>
<style>
#globalheader {
width:65%;
font-size:14px;
margin-left:5%;
}
input.span2, textarea.span2, .uneditable-input.span2{
width:275px !important;
height:30px;
}
.container textarea {
width:275px !important;
height:110px !important;
} 
.icon-user {
background-position: -168px 0;
}
.icon-message {
background-position: -216px -48px;
}
.icon-envelope {
background-position: -72px 0;
}
[class^="icon-"], [class*=" icon-"] {
display: inline-block;
width: 14px;
height: 14px;
margin-top: 1px;
line-height: 14px;
vertical-align: text-top;
background-image: url("/images/glyphicons-halflings.png");
background-repeat: no-repeat;
}
.container form {
	margin-top: 75px;
	border-radius: 25px;
	border: 2px solid rgb(207, 204, 204);;
	padding: 30px 30px 30px 30px;
	border-radius: 10px;
	background-color: white;
}
body{
	background-color:#ebebeb!important;
}
.input-append .add-on, .input-prepend .add-on {
display: inline-block;
width: auto;
height: 20px;
min-width: 16px;
padding: 4px 5px;
font-size: 14px;
font-weight: normal;
line-height: 20px;
text-align: center;
text-shadow: 0 1px 0 #ffffff;
background-color: #eeeeee;
border: 1px solid #ccc;
}
.ads_wrapper {
	margin:100px 100px 100px 435px;
	position:fixed;
	display:block;
}
</style>
<script type="text/javascript"  src="/js/validate.js" ></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#contact_submit").click(function(){
	var k=0, username=$("#username_contact").val(),email=$("#email").val(),content=$("#content").val(),err=true;
	err = err & validateInput("req",document.frm_contact.username_contact,"Vui lòng nhập tên của bạn");
	err = err & validateInput("req",document.frm_contact.email,"Vui lòng nhập email của bạn");
	err = err & validateInput("req",document.frm_contact.content,"Vui lòng nhập nội dung");
	if(document.frm_contact.email.value!='')
    {
        err = err & validateInput("email",document.frm_contact.email,"Xin vui lòng nhập email hợp lệ");
    }
	//start ajax call
	if (err === 1){
	$.ajax({
		content:'text/html',
		type:'post',
		url:'/home/contact',
		data:{
			name:username,
			email:email,
			content:content,
			csrf_test_name:$("#csrf_test_name").val()
		},
		complete:function(){
			$("#modal_contact").modal('show')	
		}
	})
	}
	//end ajax call	
	
	})
})
</script>
<div class="container">
<form id="frm_contact" name="frm_contact" role="form" action="" method="post" >
    <div class="col-lg-6">
<span style="font-size:14px">Vui lòng điền form bên dưới hoặc gửi mail đến <a title="Quan Tran" href="mailto:012kinglight@gmail.com">012kinglight@gmail.com</a></span>
<div class="clr"></div>
<div class="control-group">
	<label class="control-label" for="inputIcon">Họ tên của bạn</label>
	<div class="controls">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-user"></i></span>
			<input class="span2" id="username_contact" name="username_contact" type="text" value="<?=$name?>" required>
			<div class="clr"></div>
			<span id="ERRusername_contact" class="box_erro_area"></span>
		</div>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="inputIcon">Email của bạn</label>
	<div class="controls">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-envelope"></i></span>
			<input class="span2" id="email" name="email" type="text" value="<?=$email?>" required>
			<div class="clr"></div>
			<span id="ERRemail" class="box_erro_area"></span>
		</div>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="inputIcon">Nội dung</label>
	<div class="controls">
		<div class="input-prepend">
			<span style="height:100px!important" class="add-on"><i class="icon-message"></i></span>
			<textarea id="content" name="content" class="form-control" rows="5" required></textarea>
			<div class="clr"></div>
			<span id="ERRcontent" class="box_erro_area"></span>
		</div>
	</div>
</div>

<input style="float:left;margin-left:0px" type="button" name="contact_submit" id="contact_submit" value="Gửi" class="btn btn-info pull-right">
    </div>
	<input type='hidden' name='csrf_test_name' id='csrf_test_name' value='<?=$csrf_test_name?>'/>
  </form>
  <?$this->load->view('footer')?>
</div>

<div class="modal hide fade" id="modal_contact">
	<div class="modal-header"></div>
	<div class="modal-body">
		<h3>Cảm ơn bạn đã góp ý kiến</h3>
	</div>
	<div class="modal-footer">
		<button class="btn btn-info" data-dismiss="modal" >Đóng</button>
	</div>
</div>

</div>
