<meta charset="UTF-8"/>
<link rel="stylesheet" type="text/css" href="/css/social/responsive.css">
<link rel="stylesheet" type="text/css" href="/css/social/social.css">
<link href="/css/social/jquery-textntags.css" type="text/css" media="screen" rel="stylesheet">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>-->
<script src="/js/social/underscore-min.js"></script>
<script src="/js/social/jquery-textntags.js"></script>
<script src="/js/social/hashtag.js"></script>
<script src="/js/social/wall.js"></script>
<script src="/js/social/post_comment.js"></script>
<!--<script src="/js/social/pagination.js"></script>-->
<script type="text/javascript" src="/js/social/like.js"></script>

<script type="text/javascript">
$(document).ready(function(){

//set z-index to enable the cursor
$("#modal_register,#login_process").attr('style','z-index:-1');
//end

$("#modal_take_picture iframe").contents().find("#snap").click(function(){
$("#allow_use_camera").hide();
})

$(".nav-pills li").each(function(){
if($(this).find('a').attr('id')=="<?=$tab?>"){
$(this).addClass('active')
switch($(this).attr("id")){
case "wall_left_6":
$.ajax({
content:"text/html",
type:"get",
url:"/book/mylib/",
success:function(data){
$("#wall_right_6").html(data)
}
})
break;
case "wall_left_0":
$("#wall_right_0").show()
break;

//start profile
case "wall_left_7":
$.ajax({
content:'text/html',
type:'get',
url:'/user/profile/',
success:function(data){
$("#wall_right_7")
.show('slow')
.html(data)			
}
})
break;
//end profile

//start game
case "wall_left_8":
$.ajax({
content:'text/html',
type:'get',
url:'/game/mygame/',
success:function(data){
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
content:'text/html',
type:'get',
url:'/video/myvid/',
success:function(data){
$("#wall_right_9")
.show('slow')
.html(data)			
}
})
break;
//end film

}
}
})
})
</script>
<!--<script src="My%20Wall%20_%20Account%20_%20Oscar%20-%20eCommerce_textntext_files/jquery_002.js"></script>-->
<body id="default_wall_body" class="account-profile">
<div class="container-fluid page">
<div class="page_inner">
<div class="row-fluid">

<aside style="width: 16%!important;" class="sidebar span3">
<ul id="ul_account" style="z-index:10000;position:absolute;width: 225px;" class="nav nav-pills nav-stacked">
<!--
<li id="wall_left_1"><a id="announcement">Thông báo</a></li>
<li id="wall_left_2"><a id="video">Videos</a></li>
<li id="wall_left_3"><a id="images">Hình ảnh</a></li>
<li id="wall_left_4"><a id="friend">Bạn bè</a></li>
<li id="wall_left_5"><a id="invite">Mời bạn</a></li>
<li id="wall_left_6"><a id="event" >Sự kiện</a></li>
-->
<!--<li id="wall_left_0" class=""><a id="wall">Tường nhà</a></li>-->
<li id="wall_left_6"><a id="mylib" >Sách</a></li>
<li id="wall_left_8"><a id="mygame" >Game</a></li>
<li id="wall_left_9"><a id="myvid">Phim</a></li>
<li id="wall_left_7"><a id="profile">Tài khoản</a></li>
<!--<li id="wall_left_8"><a id="wall_profile">Học anh văn</a></li>-->
</ul>

</aside>

<div class="span9">
<!-- start left column title -->
<div class="page-header action">
<!--	<h3 id="wall_name">Tường nhà của <?php foreach($user_data as $key):?><?php echo $key['NAME']?><?php endforeach;?></h3>-->
</div>
<!-- end left column title -->

<!-- start personal wall --><div style="display:none" class="wall_right" id="wall_right_0">
<div id="messages"></div>
<div id="promotions"></div>
<form id="frm_my_wall" method="post">
<input name="csrf_test_name" id="csrf_test_name "value="<?=$csrf_test_name?>" type="hidden">
<div class="control-group">
<div class="controls">
<textarea id="my_wall_textarea" name="textbox_comment" placeholder="Bạn đang nghĩ gì ?"></textarea>
<button id="my_wall_btn" type="button" class="btn btn-primary wall-button">Đăng</button>
<span class="help-block" id="my_wall_textarea_error_text"></span>
</div>
</div>
</form>

<div class="my_wall_wrapper">

<!-- start message body -->
<div id="my-wall-post-64" class="my_wall_parent">
<img src="http://myweb.pro.vn/images/avatar-hat-240.png" style="display:none">
<span class="my_wall_username"></span>
<span class="my_wall_date_post">

</span>

<div class="my_wall_content">
<span id="my_wall_content_parent_64" class="my-wall-message-link">

</span>

</div>

<!-- start like  -->
<div class="btn-delete-like">
<a data-id="64" id="social-message-parent" data-toggle="modal" href="#my_wall_delete_message"></a>	
<div class="wrapper-like" data-object-type="104" data-object-id="64" data-action="like">
<a class="like-text" href="#" data-like-text="like" data-unlike-text="unlike"></a>
<div class="wrapper-icon-like">
<!--<i class="like-icon icon-thumbs-up"></i> <sup class="like-count"></sup>-->
</div>
</div>
<input class="my-wall-obj-child-parent" id="my_wall_obj_message_parent_id" type="hidden">
</div>
<!-- end like -->

</div>
<!-- end message body -->
<div class="clear_div_space"></div>
<!-- start message input -->
<div class="my_wall_text_comment_input" id="my_wall_text_comment_input_64">
<!--<span class="my_wall_username">Tam Phan</span>-->
<span class="avatar_wrapper" id="avatar_wrapper_64" style="display: none;">
<img class="my_wall_input_avatar" id="my_wall_avatar_64" src="<?=$user_avatar?>">
</span>
<div class="clear_div_space"></div>
<div id="my_wall_comment" class="control-group">
<div class="controls">
<span id="wrapper_textbox_64">
<textarea id="textarea_wall_post_64" row="3" placeholder="Bình luận hoặc nhắc đến ai đó bằng cú pháp @username" class="textarea_wall_post"></textarea>
</span>
<span class="help-block" id="my_wall_textarea_error_text_64"></span>
</div>
</div>
</div>
<!-- end message input -->

<?php foreach($all_message as $key):?>
<!--<?php echo $key['content']?>-->
<?php endforeach;?>

<div>

<input id="pagination_total_page" name="pagination_total_page" value="6" type="hidden">
<input id="url_self_pagination" value="/social/my-wall/" type="hidden">
<input id="url_self_my_wall_delete" value="/social/my-wall/delete/" type="hidden">
<input value="" id="my_wall_delete_id" type="hidden">
</div>
</div><!-- /row-fluid -->
</div><!-- end personal wall-->

<div class="wall_right" id="wall_right_6"></div>
<div class="wall_right" id="wall_right_7"></div>
<div class="wall_right" id="wall_right_8"></div>
<div class="wall_right" id="wall_right_9"></div>

</div><!-- /page_inner -->

</div><!-- /container-fluid -->

<!-- Modal content -->


<!--start capture modal -->
<div class="modal hide fade" id="modal_take_picture">
<iframe id="frame_html5_capture" src=''></iframe>
<div style="float:right">
<button type="button" id="btn_close_modal_capture" class="btn btn-primary" data-dismiss="modal">Sử dụng làm hình đại diện</button>
</div>
</div>
<!-- end capture modal -->

</body>