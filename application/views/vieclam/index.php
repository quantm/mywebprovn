<?php
session_start();
$_SESSION['username'] = $user_chat// Must be already set
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
.list_chat {
display:inline-block;
}
.video_call{
margin-left:25px
width:20px;
height:20px;
cursor:pointer;
}
.chat_wrapper{
margin-top:75px;	
}
</style>

<link type="text/css" rel="stylesheet" media="all" href="/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="/css/screen.css" />
</head>
<div class="chat_wrapper">
<?php foreach($user as $key):?>
<span class="list_chat">
<a href="javascript:void(0)" onClick="javascript:chatWith('<?=$key['USERNAME']?>');">
<img class="user_avatar" src="https://graph.facebook.com/<?=$key['facebook_id']?>/picture"/>  <?=$key['USERNAME']?>
</a>
</span>
<?php endforeach;?>
</div>
<script type="text/javascript" src="/js/jquery-chat.js"></script>
<script type="text/javascript" src="/js/chat.js"></script>
</html>


