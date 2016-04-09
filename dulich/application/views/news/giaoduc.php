<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="Generator" content="EditPlus">
<meta name="Author" content="">
<meta name="Keywords" content="">
<meta name="Description" content="">
<meta charset="utf-8"/>
<LINK href="/css/giaoduc.css" type="text/css" rel="stylesheet">
<LINK href="/css/giaoduc_menu.css" type="text/css" rel="stylesheet">
<LINK href="/css/giaoduc_detail.css" type="text/css" rel="stylesheet">
<LINK href="/css/giaoduc_newslist.css" type="text/css" rel="stylesheet">
<LINK href="/css/giaoduc_stru.css" type="text/css" rel="stylesheet">
<link href="/css/dictionary.css" type="text/css" rel="stylesheet">
<!--<script type="text/javascript" src="/js/vdict.js"></script>-->
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	$(".tagged_text_ex2").remove()
	//$("#item").prepend("<button class='btn btn-save-read-later btn-success'>Lưu để đọc sau</button>")
	$('.btn-save-read-later').click(function(){
		if($("#is_logged").val()=="0"){
		$("#modal_login")
			.attr('style','z-index:10000')
			.modal('show')
		}
		if($("#is_logged").val()!=="0"){
		
		}
	})
	$('#search').addClass('text_header_search')
	$('.newsPublishingDate a').remove()
})
$(window).scroll(show_ads)
function show_ads(){
	if($("#newsotherlist").length!="0"){
		if($("#newsotherlist").find("ins").length=="0"){
					$("#newsotherlist").html($(".ads_temp_wrapper").html())
					$(".ads_temp_wrapper").remove()
		}
	}
	if($("#newsrelated").length!="0"){
		if($("#newsrelated").find("ins").length=="0"){
					$("#newsrelated").html($(".ads_temp_wrapper").html())
					$(".ads_temp_wrapper").remove()
		}
	}
}
</script>
</head>

<body>

<div style="display:none" class="ads_temp_wrapper">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ebook_list_header_browse -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-1996742103012878"
     data-ad-slot="9578942686"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>

<div id='addVdictOnYourWeb'></div>
<!-- start ads left -->
<div class="ads_left">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ebook_index_left -->
<ins class="adsbygoogle"
style="display:inline-block;width:120px;height:600px"
data-ad-client="ca-pub-1996742103012878"
data-ad-slot="5784968680"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<!-- end ads left -->
<div class="ads_right">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ebook_index_left -->
<ins class="adsbygoogle"
style="display:inline-block;width:120px;height:600px"
data-ad-client="ca-pub-1996742103012878"
data-ad-slot="5784968680"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>

<!-- start header search-->
<div class="lap_trinh_header_search">
<style type="text/css">
@import url(//www.google.com/cse/api/branding.css);
</style>
<div class="cse-branding-bottom" style="background-color:transparent;color:#000000">
  <div class="cse-branding-form">
    <form action="http://www.google.com.vn" id="cse-search-box" target="_blank">
      <div>
        <input type="hidden" name="cx" value="partner-pub-1996742103012878:4800332684" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input placeholder="Tìm kiếm tùy chỉnh với Google" type="text" style="margin-left: 30px;height:25px" name="q" size="55" />
        <input style="margin-left: 30px;" class='btn btn-primary' type="submit" name="sa" value="Tìm kiếm" />
      </div>
    </form>
  </div>
  <div class="cse-branding-logo">
    <img src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" alt="Google" />
  </div>
  <span class="cse-branding-text">
    Tìm kiếm tùy chỉnh
  </span>
</div>

<script type="text/javascript" src="http://www.google.com/cse/query_renderer.js"></script>
<div id="queries"></div>
<script src="http://www.google.com/cse/api/partner-pub-1996742103012878/cse/4800332684/queries/js?oe=UTF-8&amp;callback=(new+PopularQueryRenderer(document.getElementById(%22queries%22))).render"></script>
</div>
<!--end header search-->

<table id="table_giaoduc_main">
<td>
<?=$content?>
</td>
</table>
<!--http://myweb.pro.vn/news/giaoduc?giaoduc&id=http%3A%2F%2Fwww.giaoduc.edu.vn%2Fnews%2Fkhoa-hoc-729-19.aspx-->
</body>
</html>
