<style type="text/css">
.ants_left {
	position: absolute;
    margin-top: 45px;
    margin-left: 15px;
}
#btn_get_link_nhaccuatui {
    position: absolute;
    margin-top: 0px;
    margin-left: 616px;
}
.hljs-tag,.var_value {
	color:black;
}
.hljs-attribute {
	color:#aa0d91;
}
.hljs-keyword {
	margin-left:30px;
	color:#aa0d91;
}
.hljs-value {
	color:green;
}
.getlink_nhaccuatui {
	position:absolute;
	margin-top:5%;
	margin-left:16%;
}
#music_pagination_ajax_loading {
	display:none;
    margin-top: -175px;
    margin-left: 75%;
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
    z-index: 1000000;
    position: absolute;
}
#keyword_search_result {
	margin-top: 45%;
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
    margin-top: -25px;
    position: relative;
}
#html5_video {
	display:none;
	width: 475px;
	margin-top:0px;
    margin-left: 215px;
}
.developer {
	position: relative;
	margin-top:400px;
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
.a:link {
	color:blue;
}
</style>

<!-- start meta -->
<meta property="og:title" content="Get link server keeng.vn" />
<meta property="og:image" content="http://static.appstore.vn/a/uploads/thumbnails/082014/nhaccuatui_icon.png" />
<meta property="og:type" content="music" />
<meta property="og:description" content="Lấy link download server keeng.vn" />
<meta property="og:url" content="http://myweb.pro.vn/getlink/get_link_keeng_vn" />
<meta name="description" content="Lấy link download server nhaccuatui.com" />
<meta name="image" content="http://static.appstore.vn/a/uploads/thumbnails/082014/nhaccuatui_icon.png" />
<!-- end meta  -->

<link rel="canonical" href="http://myweb.pro.vn/getlink/get_link_keeng_vn" />

<div class="ants_left">
<!--- Script ANTS - 160x600 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="519993167" data-ants-zone-id="519993167"></div>
<!--- end ANTS Script -->
</div>

<iframe class="youtube_player" src="https://www.youtube.com/embed/Gy2WcW4H7oc" frameborder="0" allowfullscreen></iframe>

<div class="getlink_nhaccuatui">
<input type="text"  placeholder='Copy link từ trang keeng.vn và dán vào đây hoặc gõ tên bài hát' name="text_get_link" id="text_get_link">
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
<h2 style="margin-left:15px">Code lấy link download server keeng.vn</h3>
<hr style="width: 100%;margin-top: -10px;">
<div class="content">
	Site keeng.vn có ba loại link là link audio, video và playlist
	<div style="clear:both"></div>
	<code class="code_main">
		<span style="color:black">Audio url:</span>
		<div style="clear:both"></div>
		<span>http://www.keeng.vn/audio/bien-tinh-cam-ly/8F2332EF.html</span>
		<div style="clear:both"></div>
		<span style="color:black">Video url:</span>
		<div style="clear:both"></div>
		<span>http://www.keeng.vn/index.php/video/Say-You-Do-Fan-Made-Tien-Tien/IRJSCHAG.html</span>
		<div style="clear:both"></div>
		<span style="color:black">Playlist url:</span>
		<div style="clear:both"></div>
		<span>http://www.keeng.vn/index.php/album/Tuyen-Chon-Nonstop-The-Remix-Viet-Vuot-Thoi-Gian-Peto/AOTN46KM.html</span>
		<div style="clear:both"></div>
	</code>
	<div style="clear:both;height:10px"></div>
	Sau đây chúng ta sẽ phân tích html để bóc tách
	<code class="code_main">
		<span style="color:red">//Audio</span>
		<div style="clear:both"></div>		
			<span class="hljs-tag">&lt;<span class="hljs-title">script</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text/javascript"</span>&gt;</span>
			<div style="clear:both"></div>
			<span class="javascript">
			<span class="hljs-keyword">var</span> <span class="var_value">audioPlayerName</span> = <span class="hljs-string">"player_flash"</span>;
			<div style="clear:both"></div>
			<span style="text-decoration:underline"><span class="hljs-keyword">var</span> <span class="var_value">audioPlayerLink</span></span> = <span class="hljs-string">"aHR0cDovL21lZGlhNS5rZWVuZy52bi9tZWRpYXM0L1ppbmcvTmhhY011Y1RpZXUvQmllbl9UaW5oLm1wMw=="</span>;
			<div style="clear:both"></div>
			<span class="hljs-tag">&lt;/<span class="hljs-title">script</span>&gt;</span>
		<div style="clear:both;height:15px"></div>

		<span style="color:red">//Playlist</span>
		<div style="clear:both"></div>

		<span class="hljs-tag">&lt;<span class="hljs-title">script</span> <span class="hljs-attribute">type</span>=<span class="hljs-value">"text/javascript"</span>&gt;</span>
		<div style="clear:both"></div>
		<span class="javascript">
		<span class="hljs-keyword">var</span> <span class="var_value">playerName</span> = <span class="hljs-string">'player_flash'</span>;
		<div style="clear:both"></div>
		<span class="hljs-keyword">var</span> <span class="var_value">song_count</span> = <span class="hljs-number">6</span>;
		<div style="clear:both"></div>
		<span style="text-decoration:underline"><span class="hljs-keyword">var</span> <span class="var_value">albumPlayerXml</span> </span>= <span class="hljs-string">'/kusers.php/album/AOTN46KM.xml'</span>;
		<div style="clear:both"></div>
		<span class="hljs-keyword">var</span> <span class="var_value">player_width</span> = <span class="hljs-number">638</span>;
		<div style="clear:both"></div>
		<span class="hljs-keyword">var</span> <span class="var_value">player_height</span> = <span class="hljs-number">24</span>;
		<div style="clear:both"></div>
		<span class="hljs-keyword">var</span> <span class="var_value">player_style</span> = <span class="hljs-string">'miniplayer'</span>;
		<div style="clear:both"></div>
		<span class="hljs-keyword">var</span> <span class="var_value">player_autoplay</span> = <span class="hljs-string">'true'</span>;
		<div style="clear:both"></div>
		<span class="hljs-keyword">var</span> <span class="var_value">_flashplayer</span> = <span class="hljs-string">'http://image.keeng.vn/web/swf/mp3player.swf'</span>;
		<div style="clear:both"></div>
		<span class="hljs-keyword">var</span> <span class="var_value">_skin </span>= <span class="hljs-string">'http://image.keeng.vn/web/swf/mp3-playlist-magenta.swf'</span>;
		<div style="clear:both"></div>
		</span><span class="hljs-tag">&lt;/<span class="hljs-title">script</span>&gt;</span>
		
		<div style="clear:both;height:15px"></div>
		<span style="color:red">//Video</span>
		<div style="clear:both"></div>
		
		<span class="hljs-tag">&lt;<span class="hljs-title">p</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"wrap-choice _wrap-choice"</span>&gt;</span>
		<div style="clear:both"></div>
		<span class="hljs-tag">&lt;<span class="hljs-title">a</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"choice-item choice-selected"</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"http://hot5.medias.keeng.vn/sas_02/video/2015/04/28/0b4cc922b85221e9051108be94897a1f0c3d8ae5.mp4"</span>&gt;</span>
		720p FHD
		<span class="hljs-tag">&lt;/<span class="hljs-title">a</span>&gt;</span>
		<div style="clear:both"></div>
		<span class="hljs-tag">&lt;<span class="hljs-title">a</span> <span class="hljs-attribute">class</span>=<span class="hljs-value">"choice-item "</span> <span class="hljs-attribute">value</span>=<span class="hljs-value">"http://hot5.medias.keeng.vn/sas_02/video/2015/04/28/0b4cc922b85221e9051108be94897a1f0c3d8ae5_mp4_640_360.mp4"</span>&gt;</span>
		480p SD
		<span class="hljs-tag">&lt;/<span class="hljs-title">a</span>&gt;</span>
		<div style="clear:both"></div>
		<span class="hljs-tag">&lt;/<span class="hljs-title">p</span>&gt;</span>
	</code>
	<div style="clear:both;height:15px"></div>
	Những đoạn được gạch chân bên trên là những đoạn chúng ta sẽ dùng hàm preg_match để bóc tách như bên dưới
	<code class="code_main">
		<div style="clear:both"></div>
		<span>$get=file_get_contents($link);</span>
		<div style="clear:both"></div>
		<span style="color:red">//Audio</span>
		<div style="clear:both"></div>
		<span>if(strpos($link, 'audio')) {</span>
		<div style="clear:both"></div>
		<span>preg_match('/var audioPlayerLink = "(.*)";/U', $get, $link);</span>
		<div style="clear:both"></div>
		<span>$link = base64_decode($link[1]);</span>
		<div style="clear:both"></div>
		<span>} </span>
		<div style="clear:both"></div>
		<span style="color:red">//Playlist</span>
		<div style="clear:both"></div>
		<span>elseif(strpos($link, 'album')) {</span>
		<div style="clear:both"></div>
		<span>preg_match("/var albumPlayerXml = '(.*)';/U", $get, $xml);</span>
		<div style="clear:both"></div>
		<span>$data_xml = file_get_contents('http://www.keeng.vn'.$xml[1]);</span>
		<div style="clear:both"></div>
		<span>$title = explode('<title>', $data_xml);</span>			
		<div style="clear:both"></div>
		<span>$arr=array();</span>
		<div style="clear:both"></div>
		<span>foreach($title as $data) {</span>
		<div style="clear:both"></div>
		<span>$title = explode('</title>', $data);</span>
		<div style="clear:both"></div>
		<span>preg_match('/<location>(.*)<\/location>/U', $data, $link);</span>
		<div style="clear:both"></div>
		<span>if($link){</span>
		<div style="clear:both"></div>
		<span>$link=str_replace('location','',$link[0]);</span>
		<div style="clear:both"></div>
		<span>$link=str_replace('<>','',$link);</span>
		<div style="clear:both"></div>
		<span>array_push($arr,$link);</span>
		<div style="clear:both"></div>
		<span>}</span>
		<div style="clear:both"></div>
		<span>$link=$arr;</span>
		<div style="clear:both"></div>
		<span>}</span>
		<div style="clear:both"></div>
		<span style="color:red">//Video </span>
		<div style="clear:both"></div>
		<span>elseif(strpos($link, 'video')) {</span>
		<div style="clear:both"></div>
		<span>$data = explode('&lt;p class="wrap-choice _wrap-choice">', $get);</span>
		<div style="clear:both"></div>
		<span>$data = explode('&lt;/p>', $data[1]);</span>
		<div style="clear:both"></div>
		<span>preg_match_all('/&lt;a class="choice-item(.+?)" value="(.*)">/U', $data[0], $link);</span>
		<div style="clear:both"></div>
		<span>foreach($link[2] as $links) {</span>
		<div style="clear:both"></div>
		<span>$link=$links;</span>
		<div style="clear:both"></div>
		<span>}</span>
		<div style="clear:both"></div>
		<span>}</span>
		<div style="clear:both"></div>
		<span>echo $link; </span>
		<div style="clear:both"></div>
		<span><div style="clear:both"></div></span>
	</code>
	<div style="clear:both"></div>
	Có gì thắc mắc hoặc góp ý các bạn vui lòng bình luận bên dưới.
	<div style="clear:both"></div>
	<a href="http://www.myweb.pro.vn/nhaccuatui/baihat/Con-Buom-Xuan-Ho-Quang-Hieu/0OB3BFRG.html/keeng" target="_blank">Trang người dùng cuối</a>
</div>
<div id="comment" class="fb-comments tab-pane  fade in active" data-width="100%"  data-href="http://myweb.pro.vn/getlink/get_link_keeng_vn"  data-numposts="5" data-colorscheme="dark"></div>
</div>


<input type="hidden" value="<?=$csrf_test_name?>" id="csrf_test_name"/>
<script type="text/javascript">
$(document)
.on('click','#btn_get_link_nhaccuatui',function(){ 
$('.developer').attr('style','margin-top: 530px;')
$('#music_pagination_ajax_loading').show()
//ajax
$.ajax({
content:'text/html',
type:'get',
dataType: "json",
url:'http://myweb.pro.vn/getlink/get_link_keeng_vn',
data:{
text_get_link:$('#text_get_link').val(),
csrf_test_name:$('#csrf_test_name').val()
},
success:function(data){
$('#html5_video,.btn-success').show()
if(data.link=='0' || data.link==''){
$('#music_pagination_ajax_loading').hide()
alert('Không tìm thấy');
}
else{
$('#music_pagination_ajax_loading').hide()
$('.player').show()
$('#html5_video').attr('src',data.link)
$('.font-effect-fire').html(data.name)
$('.audio_link').html(data.link)
var search_result=''
i=0
$.each(data.arr_link, function() {                              
search_result +=
' <tr class="row-search-result"><td nowrap="nowrap">'+data.arr_link[i]['name']+'</td>'+'<td class="listening-online" data-download="'+data.arr_link[i]['fetch_link']+'" data-type="listen" nowrap="nowrap">Nghe Online</td><td  class="download" data-type="download" nowrap="nowrap" data-download="'+data.arr_link[i]['fetch_link']+'">Tải về</td>'+'</tr>';  
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
		url:'http://myweb.pro.vn/getlink/get_link_keeng_vn',
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
