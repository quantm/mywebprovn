<style type="text/css">
.hljs-tag,.var_value {
	color:black;
}
.hljs-attribute {
	color:#aa0d91;
}
.hljs-keyword {
	color:#aa0d91;
}
.hljs-value {
	color:green;
}
.ants_left {
	position: absolute;
    margin-top: 45px;
    margin-left: 15px;
}

.ants_right {
	position: absolute;
    margin-top: 45px;
    margin-left: 90.7%;
}

.getlink_nhaccuatui {
	position:absolute;
	margin-top:5%;
	margin-left:16%;
}
#music_pagination_ajax_loading {
	display:none;
    margin-top:-200px;
    margin-left: 62%;
    position: fixed;
    z-index: 1000000;
}
.player {
	width: 100%;
	position: absolute;
	margin-top: 9%;
}
.audio_link,.font-effect-fire {
margin-left:16%;
}
.ants_ads {
	margin-left: -210px;
}
#text_get_link {
	width:600px;
}
#keyword_search_result {
	margin-top:600px;
	margin-left: 3%;
	position: relative;
	display:none;
}
.hightlight {
    background-color: #DCD8DE;
}
.download,.listening-online {
	cursor:pointer;
	cursor: pointer;
    margin-left: 30px;
    position: absolute;
	color:blue;
}
a:link {
color:blue;
}
.download {
	margin-left: 130px !important;
}
/* style scroll bar*/
::-webkit-scrollbar-track {}

::-webkit-scrollbar-button {}

::-webkit-scrollbar {
	  width: 15px;
	  height: 5px;
	  background: rgba(238, 238, 238, 0.5);
	  border: thin solid lightgray;
	  box-shadow: 0px 0px 3px #dfdfdf inset;
	  border-radius: 10px;
}
::-webkit-scrollbar-thumb{
	background: rgba(244, 112, 37, 1);
	border: thin solid lightgray;
	box-shadow: 10px 10px 10px rgba(105, 39, 39, 0.62) inset;
	border-radius: 5px;
}
/*end*/
.btn-success {
	display:none;
	margin-top:-23px;
    position: relative;
}
#html5_video {
    display:none;
	margin-left: 215px;
}
.developer {
	position: relative;
	margin-top:630px;
	width: 100%;
}
.content {
	position: relative;
	text-align:justify;
	margin-left:15px;
	font-size:15px;
	width: 95%;
}
.code_main {
    display: block;
    width:100%;
    color: black;
    font-size: 12px !important;
    line-height: 16px !important;
    background: #f6f6ae url('http://xahoihoctap.net.vn/images/s_book.png');
    padding: 15px 0.5em 0.5em 30px;
    -webkit-text-size-adjust: none;
	color: #c41a16;
}
.youtube_player {
    width: 75%;
    height: 500px;
    margin-left: 15%;
    margin-top: 5%;
}
.clr {
	clear:both;
}
</style>

<!-- start meta -->
<meta property="og:title" content="Get link video server www.meme.vn" />
<meta property="og:image" content="http://static.appstore.vn/a/uploads/thumbnails/082014/nhaccuatui_icon.png" />
<meta property="og:type" content="music" />
<meta property="og:description" content="Lấy link download server mp3.zing.vn qua API" />
<meta property="og:url" content="http://myweb.pro.vn/getlink/get_link_meme_vn" />
<meta name="description" content="Get link video server www.meme.vn" />
<meta name="image" content="http://static.appstore.vn/a/uploads/thumbnails/082014/nhaccuatui_icon.png" />
<!-- end meta  -->

<link rel="canonical" href="http://myweb.pro.vn/getlink/get_link_meme_vn" />

<div class="ants_left">
<!--- Script ANTS - 160x600 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="519993167" data-ants-zone-id="519993167"></div>
<!--- end ANTS Script -->
</div>

<div class="ants_right">
<!--- Script ANTS - 120x600 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="517324793" data-ants-zone-id="517324793"></div>
<!--- end ANTS Script -->
</div>

<iframe class="youtube_player" src="https://www.youtube.com/embed/F7YcyoJ8WpY" frameborder="0" allowfullscreen></iframe>

<div class="getlink_nhaccuatui">
<input type="text"  placeholder='Copy link từ trang www.meme.vn hoặc gõ tên video' name="text_get_link" id="text_get_link">
<input type="button" class="btn btn-inverse" id="btn_get_link_nhaccuatui" value="Get link">
</div>

<div style="clear:both;height:10px"></div>

<div class="player">
<span class="font-effect-fire"></span>
<div style="clear:both;height:10px"></div>
<span class="audio_link" style="display:block"></span>
<div style="clear:both"></div>
<video id="html5_video" autoplay controls loop></video>
<button class="btn btn-success">Tải về</button>
<div style="clear:both;height:10px"></div>
<div class='ants_ads'>
<!--- Script ANTS - 728x90 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="517324894" data-ants-zone-id="517324894"></div>
<!--- end ANTS Script -->
</div>
</div>

<div id="music_pagination_ajax_loading">
<h3 style="color:red">Đang tải...</h3>
<img src="http://xahoihoctap.net.vn/images/ajax_loading.GIF">
</div>

<table id="keyword_search_result">
	<thead>
		<tr style="background-color: #DAD4D4;">
			<th align="left">Tên</th>
			<th align="right" style="width:175px">Hành động</th>
		</tr>
	<thead>
	<tbody></tbody>
</table>

<div class="developer">
<h2 style="margin-left:15px">Lấy link video www.meme.vn</h3>
<hr style="width: 100%;margin-top: -10px;">
<div class="content">
<code>http://www.meme.vn/video/lien-khuc-que-huong-toi-duong-ngoc-thai-live-show-mot-thoang-que-huong-4-wigfbw5ikc</code>, kích chuột phải vào trình phát và click chuột trái kiểm tra phần tử, các bạn chú ý đến đoạn code như bên dưới, đoạn gạch chân màu xanh blue là đoạn cần lấy 
<div class='clr'></div>	
<code class="code_main">
			<span class="hljs-tag">&lt;<span class="hljs-title">video</span> <span class="hljs-attribute">id</span>=<span class="hljs-value">"MEME-player-MemeVideoPlayer_wigfbw5ikc.460"</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"memeplayer-video"</span><span class="hljs-attribute">src</span>=<span class="hljs-value" style="text-decoration:underline;color:blue">"http://stream2.memeclip.com/clip/2014/12/23/18/33/b3b6dabc20d9a95a537e39764d71c9d0_360.mp4?st=1SM5-JCDvOwFn68VkaLYiA&amp;e=1439921194217"</span><span class="hljs-attribute">type</span>=<span class="hljs-value">"video/mp4"</span><span class="hljs-attribute">style</span>=<span class="hljs-value">"width: 744px !important; height: 418.5px !important; display: block !important;"</span>&gt;&lt;/video&gt</span>
	</code>
	<div class='clr' style="height:10px"></div>
	Mình thử lấy bóc tách bằng php để lấy trực tiếp nhưng không được nên kết hợp bóc tách bằng php và lấy link bằng javascript như đoạn code bên dưới 
	<code class="code_main">
		<span>$url=$_REQUEST['url'];</span>
		<div class='clr'></div>
		<span>$content_url=file_get_contents('compress.zlib://'.$url);</span>
		<div class='clr'></div>	
		<span>preg_match_all('/&lt;div class="playerAPI floatLeft">(.*?)div/s',$content_url,$matches);</span>
		<div class='clr'></div>
		<span>echo '&lt;script type="text/javascript"  src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js">&lt;/script&gt;';</span>
		<div class='clr'></div>
		<span>echo '&lt;button class="get_link">Get link&lt;/button&gt;';</span>
		<div class='clr'></div>		
		<span>echo &lt;div style="display:none">'.$matches[0][0].'&lt;/div&gt;';</span>
		<div class='clr'></div>		
		<span>echo '&lt;script type="text/javascript">$(document).on("click",".get_link",function(){var link=$(".memeplayer-video").attr("src");alert(link)})&lt;/script&gt;';</span>
		<div class='clr'></div>		
	</code>
	<div class='clr' style="height:10px"></div>
	Trang www.meme.vn này có chức năng nhúng video, url nhúng có dạng <code>http://embed.meme.vn/embedif.php?type=clip&v=IDVIDEO</code>, bên dưới là code bóc tách link theo url nhúng
		<code class="code_main">
		<span>$url=$_REQUEST['url'];</span>
		<div class='clr'></div>
		<span>$content_url=file_get_contents('compress.zlib://'.$url);</span>
		<div class='clr'></div>	
		<span>preg_match_all('/&lt;meta property="og:video" content="https:\/\/embed.meme.vn\/video\/(.*)" \/>/U',$content_url,$matches);</span>
		<div class='clr'></div>
		<span>$embed = 'http://embed.meme.vn/embedif.php?type=clip&v='.$id[1];</span>
		<div class='clr'></div>
		<span>$content_embed=file_get_contents('compress.zlib://'.$embed);</span>
		<div class='clr'></div>
		<span>$data = explode('"video":[', $content_embed);</span>
		<div class='clr'></div>		
		<span>$data = explode(']', $data[1]);</span>
		<div class='clr'></div>		
		<span>preg_match_all('/"url":"(.*)"/U', $data[0], $data);</span>
		<div class='clr'></div>		
		<span>echo $data[1][0];</span>
		<div class='clr'></div>		
	</code>
	<div class='clr' style="height:10px"></div>	
		Bạn nào thử bóc tách bằng php đoạn code ở đầu bài viết để lấy link phần gạch chân màu xanh blue
	<div class='clr'></div>
	<a href="http://myweb.pro.vn/xem-video-tong-hop/clipvn/watch/Doremon-Lau-Dai-Duoi-Day-Bien/17815" target="_blank">Trang người dùng cuối</a>
</div>

<div id="comment" class="fb-comments tab-pane  fade in active" data-width="100%"  data-href="http://myweb.pro.vn/getlink/get_link_meme_vn"  data-numposts="5" data-colorscheme="dark"></div>
</div>

<input type="hidden" value="<?=$csrf_test_name?>" id="csrf_test_name"/>
<script type="text/javascript">
$(document)
.on('click','#btn_get_link_nhaccuatui',function(){ 
$('#music_pagination_ajax_loading').show()
//var rc=$('.meme_data').contents().find('.memeplayer-video').attr('src')

//ajax
$.ajax({
content:'text/html',
type:'get',
dataType: "json",
url:'http://myweb.pro.vn/getlink/get_link_meme_vn',
data:{
text_get_link:$('#text_get_link').val(),
csrf_test_name:$('#csrf_test_name').val()
},
success:function(data){
if(data.link=='0' || data.link==''){
$('#music_pagination_ajax_loading').hide()
alert('Không tìm thấy');
}
else{
$('#music_pagination_ajax_loading').hide()
$('#html5_video,.btn-success').show()
$('#html5_video').attr('src',data.link)
$('.font-effect-fire').html(data.name)
$('.audio_link').html(data.link)
var search_result=''
i=0
$.each(data.arr_link, function() {                              
search_result +=
' <tr class="row-search-result"><td nowrap="nowrap">'+data.arr_link[i]['name']+'</td>'+'<td class="listening-online" data-download="'+data.arr_link[i]['fetch_link']+'" data-type="listen" nowrap="nowrap">Xem Online</td><td  class="download" data-type="download" nowrap="nowrap" data-download="'+data.arr_link[i]['fetch_link']+'">Tải về</td>'+'</tr>';  
i++;
});
$('#keyword_search_result').show()
$('#keyword_search_result tbody').html(search_result)	
}
}
})
//end ajax
})
.on('click','.btn-success',function(){
			  document.location.href=$('.audio_link').html()
})
.on('click','.download,.listening-online',function(){
	var type=$(this).attr('data-type')
		 obj=$(this)
	$('#music_pagination_ajax_loading').show()
	//ajax
		$.ajax({
		content:'text/html',
		type:'get',
		dataType: "json",
		url:'http://myweb.pro.vn/getlink/get_link_meme_vn',
		data:{
		text_get_link:$(this).attr('data-download'),
		csrf_test_name:$('#csrf_test_name').val()
		},
		success:function(data){
		$('#music_pagination_ajax_loading').hide()
				switch(type){
					case 'download':
					document.location.href=data.link
					break;
					case 'listen':
						$('.audio_link').html(data.link)
						$('#html5_video').attr('src',data.link)
						$('.font-effect-fire').html(obj.prev().html())
						$('body').scrollTop(300)
					break;
				}
			}
		})
	//end ajax
})
.on('mouseenter','.row-search-result',function(){
	$(this).addClass('hightlight')
})
.on('mouseleave','.row-search-result',function(){
	$(this).removeClass('hightlight')
})
</script>
