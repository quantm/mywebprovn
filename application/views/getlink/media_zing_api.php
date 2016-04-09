<style type="text/css">
.ants_left {
	position: absolute;
    margin-top: 67px;
    margin-left: 15px;
}

.ants_right {
	position: absolute;
    margin-top: 67px;
    margin-left: 90.7%;
}

.getlink_nhaccuatui {
	position:absolute;
	margin-top:5%;
	margin-left:16%;
}
#music_pagination_ajax_loading {
	display:none;
    margin-top: -200px;
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
	margin-top: 30%;
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
#html5_audio {
	display:none;
	width: 475px;
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
<meta property="og:title" content="Get link mp3 server mp3.zing.vn qua API" />
<meta property="og:image" content="http://static.appstore.vn/a/uploads/thumbnails/082014/nhaccuatui_icon.png" />
<meta property="og:type" content="music" />
<meta property="og:description" content="Lấy link download server mp3.zing.vn qua API" />
<meta property="og:url" content="http://myweb.pro.vn/getlink/get_link_zing_api" />
<meta name="description" content="Lấy link download server mp3.zing.vn qua API" />
<meta name="image" content="http://static.appstore.vn/a/uploads/thumbnails/082014/nhaccuatui_icon.png" />
<!-- end meta  -->

<link rel="canonical" href="http://myweb.pro.vn/getlink/get_link_zing_api" />

<div class="ants_left">
<script type="text/javascript" src="http://e.eclick.vn/delivery/zone/2569.js"></script>
</div>

<div class="ants_right">
<!--- Script ANTS - 120x600 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="517324793" data-ants-zone-id="517324793"></div>
<!--- end ANTS Script -->
</div>

<iframe class="youtube_player" src="https://www.youtube.com/embed/eZkYVVcg4tg" frameborder="0" allowfullscreen></iframe>

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
<audio id="html5_audio" autoplay controls loop></audio>
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
<h2 style="margin-left:15px">Lấy link mp3 server mp3.zing.vn qua API</h3>
<hr style="width: 100%;margin-top: -10px;">
<div class="content">
	Link API trên github: <a href="https://github.com/anbinh/dna/blob/master/zi/apifuncs.go" target="_blank"> https://github.com/anbinh/dna/blob/master/zi/apifuncs.go</a>. 
	<div class='clr'></div>	
	Trong API này chúng ta quan tâm đến đoạn 
	<code>http://api.mp3.zing.vn/api/mobile/song/getsonginfo?keycode=fafd463e2131914934b73310aa34a23f&requestdata={"id":"<span style="color:green;text-decoration:underline">ZWZB09U6</span>"}</code>, 
	<div class='clr'></div>
	đoạn gạch chân màu xanh chính là ID của bài hát cần lấy link, copy và dán vào trình duyệt, API sẽ trả về kết quả như bên dưới 
	<div class='clr'></div>
	<code class="code_main">{"song_id":1073854662,"song_id_encode":"ZWZB09U6","video_id_encode":"","title":"A Lover's Concerto","artist_id":"2086","artist":"Various Artists","album_id":1073753078,"album":"Lover\u2019s Romance Vol.03 - Romance","composer_id":0,"composer":"","genre_id":"6","isrc":"","zaloid":0,"username":"","is_hit":0,"is_official":1,"duration":181,"download_status":1,
	"copyright":"","co_id":0,"ad_status":-1,"lyrics_file":"","download_disable":0,"vn_only":false,"total_play":68795,
	"link":"\/bai-hat\/A-Lover-s-Concerto-Various-Artists\/ZWZB09U6.html",
	"source":{"128":"http:\/\/api.mp3.zing.vn\/api\/mobile\/source\/song\/LGJGTLGNVJQAXXDTLDJTDGLG",
	"lossless":"http:\/\/api.mp3.zing.vn\/api\/mobile\/source\/song\/LGJGTLGNVJQAXXDTUOKKUMKKTDGLG","320":"http:\/\/api.mp3.zing.vn\/api\/mobile\/source\/song\/LGJGTLGNVJQAXXDTVDGTDGLG"},
	"link_download":"<span style="color: blue;text-decoration:underline;font-weight: bold;">{"128":"http:\/\/api.mp3.zing.vn\/api\/mobile\/download\/song\/LGJGTLGNVJQAXXDTLDJTDGLG","320":"http:\/\/api.mp3.zing.vn\/api\/mobile\/download\/song\/LGJGTLGNVJQAXXDTVDGTDGLG"}</span>,
	"thumbnail":"covers\/7\/f\/7fdc1a630c238af0815181f9faa190f5_1299816909.jpg",
	"album_cover":"covers\/7\/f\/7fdc1a630c238af0815181f9faa190f5_1299816909.jpg","likes":39,"like_this":false,"favourites":0,"favourite_this":false,"comments":0,"genre_name":"H\u00f2a T\u1ea5u","video":{},"response":{"msgCode":1,"msg":""}}</code>
	<div class='clr'></div>
	Đoạn gạch chân màu xanh blue là link cần bóc tách để lấy. Url bài hát của zing có dạng <code>http://mp3.zing.vn/bai-hat/A-Lover-s-Concerto-Various-Artists/ZWZB09U6.html</code> , truyền url này vào hàm xử lý server side sẽ trả về kết quả là link cần lấy, sau đây là code bóc tách để lấy link
	<code class="code_main">
		<div class='clr'></div>
		<span style="color:black">//text_get_link là tên textbox nhập liệu ở bên trên</span>
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
		<span>$api = 'http://api.mp3.zing.vn/api/mobile/song/getsonginfo?keycode=fafd463e2131914934b73310aa34a23f&requestdata={"id":"'.$id.'"}';</span>
		<div class='clr'></div>
		<span style="color:black">//đọc nội dung API</span>
		<div class='clr'></div>
		<span>$get = file_get_contents($api);</span>
		<div class='clr'></div>
		<span style="color:black">//bóc tách</span>
		<div class='clr'></div>
		<span>preg_match('/"128":"(.*)",/U', $get, $mp3_128k);</span>
		<div class='clr'></div>
		<span>if($mp3_128k){$audio = str_replace('\/', '/', $mp3_128k[1]);}</span>
		<div class='clr'></div>
		<span>preg_match('/"320":"(.*)"}/U', $get, $mp3_320k);</span>
		<div class='clr'></div>
		<span>if($mp3_320k){$audio = str_replace('\/', '/', $mp3_320k[1]);}</span>
		<div class='clr'></div>
		<span style="color:black">//trả về link</span>
		<div class='clr'></div>	
		<span>return $audio;</span>
	</code>
	<div class='clr'></div>
	Đoạn code trên khá đơn giản, từ url tách chuỗi để lấy ID, sau đó truyền ID vào API, đọc nội dung và bóc tách để lấy link cần lấy, có gì thắc mắc hoặc góp ý các bạn vui lòng bình luận bên dưới.
	<div class='clr'></div>
	<a href="http://www.myweb.pro.vn/nhaccuatui/baihat/Tu-Ngay-Anh-Di-Ho-Ngoc-Ha/ZWZDFZI6.html/zing" target="_blank">Trang người dùng cuối</a>
</div>
<div id="comment" class="fb-comments tab-pane  fade in active" data-width="100%"  data-href="http://myweb.pro.vn/getlink/get_link_zing_api"  data-numposts="5" data-colorscheme="dark"></div>
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
url:'http://myweb.pro.vn/getlink/get_link_zing_api',
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
$('#html5_audio,.btn-success').show()
$('#html5_audio').attr('src',data.link)
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
		url:'http://myweb.pro.vn/getlink/get_link_zing_api',
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
						$('#html5_audio').attr('src',data.link)
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
