<style type="text/css">
.ants_left {
	position: absolute;
    margin-top: 45px;
    margin-left: 15px;
}

.ants_right {
	position: absolute;
    margin-top: 45px;
    margin-left: 90.5%;
}

.getlink_nhaccuatui {
	position:absolute;
	margin-top:5%;
	margin-left:16%;
}
#music_pagination_ajax_loading {
	display:none;
    margin-top:-275px;
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
	margin-top:775px;
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
    margin-top: -23px;
    position: relative
}
#html5_video {
	display:none;
    margin-left: 215px;
}
.developer {
	position: relative;
	margin-top:275px;
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
<meta property="og:title" content="Get link mp4 server mp3.zing.vn qua API" />
<meta property="og:image" content="http://static.appstore.vn/a/uploads/thumbnails/082014/nhaccuatui_icon.png" />
<meta property="og:type" content="music" />
<meta property="og:description" content="Lấy link download server mp3.zing.vn qua API" />
<meta property="og:url" content="http://myweb.pro.vn/getlink/get_link_zing_mp4" />
<meta name="description" content="Lấy link download video server mp3.zing.vn qua API" />
<meta name="image" content="http://static.appstore.vn/a/uploads/thumbnails/082014/nhaccuatui_icon.png" />
<!-- end meta  -->

<link rel="canonical" href="http://myweb.pro.vn/getlink/get_link_zing_mp4" />

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

<iframe class="youtube_player" src="https://www.youtube.com/embed/6SM5Q4CEfzs" frameborder="0" allowfullscreen></iframe>

<div class="getlink_nhaccuatui">
<input type="text"  placeholder='Copy link từ trang mp3.zing.vn và dán vào đây hoặc gõ tên bài hát' name="text_get_link" id="text_get_link">
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
<h2 style="margin-left:15px">Lấy link mp4 server mp3.zing.vn qua API</h3>
<hr style="width: 100%;margin-top: -10px;">
<div class="content">
	
	Link API trên github: <a href="https://github.com/anbinh/dna/blob/master/zi/apifuncs.go" target="_blank"> https://github.com/anbinh/dna/blob/master/zi/apifuncs.go</a>. 
	<div class='clr'></div>	
	Trong API này chúng ta quan tâm đến đoạn 
	<code>http://api.mp3.zing.vn/api/mobile/video/getvideoinfo?keycode=fafd463e2131914934b73310aa34a23f&requestdata={"id":"<span style="color:green;text-decoration:underline">ZWZ9ZAW9</span>"}</code>, 
	<div class='clr'></div>
	đoạn gạch chân màu xanh lá cây chính là ID của bài hát cần lấy link, copy và dán vào trình duyệt, API sẽ trả về kết quả như bên dưới 
	<div class='clr'></div>
	<code class="code_main">
	{"video_id":1073744297,"song_id_encode":"ZWZ9ZAW9","title":"Love Story","artist_id":"808","artist":"Taylor Swift","genre_id":"3,23","thumbnail":"thumb_video\/2012\/01\/05\/a\/f\/af67e37f79b1f6a00b57142b039f14c3_2.jpg","duration":237,"download_status":0,"copyright":1,"status_id":1,"link":"\/video-clip\/Love-Story-Taylor-Swift\/ZWZ9ZAW9.html","source":{"480":"<span style="color: blue;text-decoration:underline;font-weight: bold;">http:\/\/api.mp3.zing.vn\/api\/mobile\/source\/video\/LGJGTLGNVNAADENTAJGTDGLG</span>"},"preroll":"http:\/\/api.adtimaserver.vn\/zad\/videoad?zid=315924612111615521&pl=ios","total_play":3205166,"likes":5057,"like_this":false,"favourites":0,"favourite_this":false,"comments":172,"genre_name":"\u00c2u M\u1ef9, Pop","response":{"msgCode":1,"msg":""}}
	</code>
	<div class='clr'></div>
	Đoạn gạch chân màu xanh blue là link cần bóc tách để lấy. Url bài hát của zing có dạng <code>http://mp3.zing.vn/video-clip/Love-Story-Taylor-Swift/<span style="color:green;text-decoration:underline;font-weight: bold;">ZWZ9ZAW9</span>.html</code> , truyền url này vào hàm xử lý server side sẽ trả về kết quả là là link cần lấy. Sau đây là code bóc tách để lấy link
	<code class="code_main">
		<div class='clr'></div>
		<span>$link = explode('.', $_REQUEST['text_get_link']);</span>
		<div class='clr'></div>
		<span style="color:black">//tách chuỗi để lấy ID bài hát từ url</span>
		<div class='clr'></div>	
		<span>$id = explode('/', $link);</span>
		<div class='clr'></div>
		<span>$id = explode('.html', $id[5]);</span>
		<div class='clr'></div>
		<span>$id=$id[0];</span>
		<div class='clr'></div>	
		<span>$api = 'http://api.mp3.zing.vn/api/mobile/video/getvideoinfo?keycode=fafd463e2131914934b73310aa34a23f&requestdata={"id":"'.$id.'"}';</span>
		<div class='clr'></div>
		<span style="color:black">//đọc nội dung API</span>
		<div class='clr'></div>
		<span>$get = file_get_contents($api);</span>
		<div class='clr'></div>
		<span style="color:black">//bóc tách</span>
		<div class='clr'></div>
		<span>preg_match('/"240":"(.*)","/U', $get, $mp4_240p)</span>
		<div class='clr'></div>
		<span>if($mp4_240p){$video_link = str_replace('\/', '/', $mp4_240p[1]);}</span>
		<div class='clr'></div>
		<span>preg_match('/"360":"(.*)",/U', $get, $mp4_360p);</span>
		<div class='clr'></div>
		<span>if($mp4_360p){$video_link = str_replace('\/', '/', $mp4_360p[1]);}</span>
		<div class='clr'></div>
		<span>preg_match('/"480":"(.*)",/U', $get, $mp4_480p);</span>
		<div class='clr'></div>
		<span>if($mp4_480p){$video_link = str_replace('\/', '/', $mp4_480p[1]);}</span>
		<div class='clr'></div>
		<span>if(preg_match('/adtimaserver/',$video_link)){
								$video_link=explode('},',$video_link);
								$video_link=$video_link[0];
								$video_link=str_replace('"','',$video_link);	
				  }
		</span>
		<div class='clr'></div>
		<span style="color:black">//trả về link</span>
		<div class='clr'></div>	
		<span>return $video_link;</span>
	</code>
	<div class='clr'></div>
	Đoạn code trên khá đơn giản, từ url tách chuỗi để lấy ID, sau đó truyền ID vào API, đọc nội dung và bóc tách để lấy link cần lấy, có gì thắc mắc hoặc góp ý các bạn vui lòng bình luận bên dưới.
	<div class='clr'></div>
	<a href="http://www.myweb.pro.vn/nhaccuatui/baihat/Facebook-Tinh-Yeu-Lyna-Thuy-Linh-Hoang-Phuc-Thien/ZW696II6.html/zing" target="_blank">Trang người dùng cuối</a>
</div>
<div id="comment" class="fb-comments tab-pane  fade in active" data-width="100%"  data-href="http://myweb.pro.vn/getlink/get_link_zing_mp4"  data-numposts="5" data-colorscheme="dark"></div>
</div>


<input type="hidden" value="<?=$csrf_test_name?>" id="csrf_test_name"/>
<script type="text/javascript">
$(document)
.on('click','#btn_get_link_nhaccuatui',function(){ 
$('#music_pagination_ajax_loading').show()
//ajax
$.ajax({
content:'text/html',
type:'get',
dataType: "json",
url:'http://myweb.pro.vn/getlink/get_link_zing_mp4',
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
		url:'http://myweb.pro.vn/getlink/get_link_zing_mp4',
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
