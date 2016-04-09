<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
 <!-- start meta -->
<meta property="og:title" content="<?=$book_title?>" />
<meta property="og:image" content="<?=$book_thumbs?>" />
<meta property="og:type" content="book" />
<meta property="og:description" content="<?=$book_description?>" />
<meta property="og:url" content="http://myweb.pro.vn/book/detail?id=<?=$share_id?>" />
<!-- end meta  -->
<script type="text/javascript" src="/js/tailieuhoctap/my.js"></script>
<style>
	iframe {
	width: 98%;
	height: 100%;
	position: absolute;
	margin-top:2%;
	}
</style>
 </head>

 <body>
  <iframe src="<?=$embed_src?>"/>
 </body>
</html>
