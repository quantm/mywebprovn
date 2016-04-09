<head>
<title>Cấu trúc dữ liệu và giải thuật</title>
<!-- start meta -->
<meta property="og:title" content="Cấu trúc dữ liệu và giải thuật" />
<meta property="og:image" content="http://myweb.pro.vn/images/video/ctdlgt.png" />
<meta property="og:type" content="ctdlgt.program" />
<meta property="og:description" content="Mbook Cấu trúc dữ liệu và giải thuật - Hệ đào tạo từ xa ĐH Khoa học tự nhiên" />
<!-- end meta  -->
<script type="text/javascript"	 src="http://myweb.pro.vn/js/ua.js"></script>
<script type="text/javascript" src="http://myweb.pro.vn/js/ftiens4.js"></script>
<script type="text/javascript" src="http://myweb.pro.vn/js/ctdlgt.js"></script>
<link rel="stylesheet" type="text/css" href="/css/mbook/ctdlgt.css" media="screen"/> 
<link rel="canonical" href="http://myweb.pro.vn/mbook/ctdlgt/" />
<script type="text/javascript">
$(document).ready(function(){
	
	//mobile
	if(window.innerWidth <= "800" && window.innerHeight <= "640") {
		$("#toc").hide()
		$("#ctdlgt_wrapper").prepend("<button style='margin-top:5%' class='btn btn-inverse'>Mở danh mục</button>")
		$("#ctdlgt").addClass('ctdlgt_mobile')
		$(".btn-inverse").click(function(){
			$("#toc").show("slow")
			$("#ctdlgt").hide()
		})
		$("#toc").find("a").click(function(){
			$("#toc").hide("")
			$("#ctdlgt").show("slow")
		})
	}
	//end

	call_mbook(<?=$id_element?>)
	
	//start add google custom search in the header
	$("#game_header_search")
	.removeAttr("method")
	.empty()
	.attr("id","cse-search-box")
	.attr("action","http://myweb.pro.vn/book/cse/")
	.html($(".frm_cse-search-box").html())
	$(".frm_cse-search-box").remove()
	//end

})
</script>

</head>

<body>

<form style="display:none" action="http://myweb.pro.vn/book/cse/" class="frm_cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-1996742103012878:3476546681" />
    <input type="hidden" name="cof" value="FORID:10" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" style="width:325px;margin-left:45px;background:#FFFFFF url(http://www.google.com/cse/intl/en/images/google_custom_search_watermark.gif) right no-repeat" name="q" size="115" />
    <input type="submit" name="sa" value="Tìm kiếm" class="btn btn-info" />
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
  </div>
</form>

<!--start ads-->
<div class="adsense_header_ads">
</div>
<!--end add -->

<table border=0>
<tr>
<td>
<font size=-2>
<a style="font-size:7pt;text-decoration:none;color:silver" href="http://www.treemenu.net/" target=_blank>
</a>
</font>
</td>
<td>
	<i id="lesson_title"></i>
</td>
</tr>

</table>

<div id="toc">
<script>initializeDocument()</script>
<!-- start ads-->
<div class="adsense_wrapper">
</div>
<!-- end ads -->
</div>
<noscript>
A tree for site navigation will open here if you enable Javascript in your browser.
</noscript>
<div id="ctdlgt_wrapper">
<iframe id="ctdlgt" src="//www.youtube.com/embed/cZlXhfbpTbY?autoplay=1&theme=dark&color=red&autohide=1&fs=0" frameborder="0"  allowfullscreen></iframe>
</div>
<!-- start comment -->
<div id="comment" class="fb-comments" data-width="930px"  data-href="http://myweb.pro.vn/mbook/ctdlgt"  data-numposts="5" data-colorscheme="light"></div>
<!-- end comment -->

<!--
<h3 style="display:inline-block">Các MBook khác:</h3>
<div style="clear:both"></div>
<ul class="related">
<li><a href="http://mywebvn.blogspot.com/2014/07/phan-tich-thiet-ke-he-thong-thong-tin_12.html" target="_new">Phân tích thiết kế hệ thống thông tin</a></li>
<li>Phân tích và thiết kế phần mềm</li>
</ul>
-->
</body>

