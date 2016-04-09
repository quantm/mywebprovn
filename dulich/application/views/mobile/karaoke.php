<!-- start meta -->
<meta name="Author" content="Tran Minh Quan"/>
<meta property="og:site_name" content="myweb.pro.vn"/>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="UTF-8">
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
<link rel="canonical" href="http://myweb.pro.vn/mobile/karaoke/" />
<meta property="og:title" content="Tra mã số karaoke" />
<meta name="keywords" content="myweb.pro.vn,phien ban mobile danh cho lumia 520,lumia x,lumia 525,dien thoai nokia,dien thoai samsung,dien thoai iphone"/>
<meta property="og:image" content="http://myweb.pro.vn/images/mobile/karaoke.jpg" />
<meta property="og:type" content="music" />
<meta property="og:description" content="Ứng dụng tra mã số karaoke trên thiết bị di động" />
<!-- end meta  -->
<script type="text/javascript"  src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/mobile/karaoke.css">
<link rel="stylesheet" type="text/css" href="/css/mobile/mobile.css">
<script>
window.onload=function(){
$("#header").append('<img class="ajax_load" src="/public/images/ajax_load_green.gif"/><span class="ajax_load">Đang tải dữ liệu, vui lòng chờ...</span');
$('.remove,.save,.saveTui,#box_mem2,#box_mem,#footer,.lmore,.menu_list').remove()
$(".menu_lang")[1].remove()
$('.nav_top_menu')[2].remove()
$('.nav').find('li')[2].remove()
$("#header .nav ul").append('<li><div class="fb-like" data-width="100px" data-height="25px" data-href="http://myweb.pro.vn/mobile/karaoke/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div><li>')
//start categorize
$(".menu_lang ul li a")
	.each(function(){
			$(this).attr("data-href",$(this).attr("href"))
			$(this).removeAttr('href')
	})
	.click(function(){
		$(".ajax_load").show()
		$("#resultSong").empty()
		//start ajax call
		$.ajax({
		content:'text/html',
		type:'post',
		url:'/mobile/karaoke',
		data:{
		csrf_test_name:$("#csrf_test_name").val(),
		category:$(this).attr("data-href").replace('.','')
		},
		success:function(data){
			$(".ajax_load").hide()
			$("#resultSong").append(data)	
			$("#nav_menu").hide()
			$(".remove_older_ads,.save").remove()
			$(".fix_content").attr('style','left:0px')
			$("#paging a,#list a,.song a,#resultSong a")
			.each(function(){
				$(this).attr("data-href",$(this).attr("href"))
				$(this).removeAttr('href')
			})	
		}
		})
		//end ajax
	})
//end categorize

$('#sub_Search')
	.empty()
	.append('<button id="mobile_btn_search" class="btn btn-primary">Tìm</button>')

//start click to search
$("#mobile_btn_search").click(function(){
	$(".ajax_load").show()
	$("#resultSong").empty()
	//start ajax call
	$.ajax({
	content:'text/html',
	type:'post',
	url:'/mobile/karaoke',
	data:{
		csrf_test_name:$("#csrf_test_name").val(),
		keyword:$("#fsearch").val()
	},
	success:function(data){
			$(".ajax_load").hide()
			$(".save").remove()
			$("#resultSong").append(data)		
	}
	})
	//end ajax
})
//end

var ads_header=$(".ads_mobile_temp").html()
$("#resultSong").prepend("<div class='header_mobile_ads'>"+ads_header+"</div>")

}

$(document)
//start paging
.on('click','#paging a,#list a,.song a,#resultSong a',function(){
	$(".ajax_load").show()
	$("#resultSong").empty()
	$.ajax({
		content:'text/html',
		type:'post',
		url:'/mobile/karaoke',
		data:{
		csrf_test_name:$("#csrf_test_name").val(),
		category:$(this).attr("data-href").replace('.','')
		},
		success:function(datas){
			$("#resultSong").append(datas)
			$(".save").remove()
			$(".ajax_load").hide()
			$("#paging a,#list a,.song a,#resultSong a").each(function(){
				$(this).attr("data-href",$(this).attr("href"))
				$(this).removeAttr('href')
			})
				
		}
	})
			
})
//end paging
.on('ready','',function(){
	if($(".remove_older_ads").length!="0"){
			$(".remove_older_ads").remove()
	}
})
.on('click','#nav_show',function(){
	$("#nav_menu").show()
	$(".fix_content").attr('style','left:260px')
})
</script>
<div style="display:none" class="ads_mobile_temp">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- karaoke_mobile -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-1996742103012878"
     data-ad-slot="7716773082"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?=$content?>
