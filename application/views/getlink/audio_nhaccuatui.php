<style type="text/css">
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
    margin-top: -300px;
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
	margin-top: -22px;
    position: relative;
}
#html5_audio {
	display:none;
	width: 475px;
    margin-left: 215px;
}
.developer {
	position: relative;
	margin-top:300px;
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
<meta property="og:title" content="Get link mp3 server nhaccuatui.com" />
<meta property="og:image" content="http://static.appstore.vn/a/uploads/thumbnails/082014/nhaccuatui_icon.png" />
<meta property="og:type" content="music" />
<meta property="og:description" content="Lấy link download server nhaccuatui.com" />
<meta property="og:url" content="http://myweb.pro.vn/getlink/nhaccuatui_audio" />
<meta name="description" content="Lấy link download server nhaccuatui.com" />
<meta name="image" content="http://static.appstore.vn/a/uploads/thumbnails/082014/nhaccuatui_icon.png" />
<!-- end meta  -->

<link rel="canonical" href="http://myweb.pro.vn/getlink/nhaccuatui_audio" />

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

<iframe class="youtube_player" src="https://www.youtube.com/embed/Br6EJPaZJaM" frameborder="0" allowfullscreen></iframe>

<div class="getlink_nhaccuatui">
<input type="text"  placeholder='Copy link từ trang nhaccuatui.com và dán vào đây hoặc gõ tên bài hát' name="text_get_link" id="text_get_link">
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
<h2 style="margin-left:15px">Code lấy link mp3 server nhaccuatui.com </h3>
<hr style="width: 100%;margin-top: -10px;">
<div class="content">
	Ví dụ url: <code>http://www.nhaccuatui.com/bai-hat/chac-ai-do-se-ve-chang-trai-nam-ay-ost-son-tung-m-tp.<span style="color:green">sK00vXjIXqFQ</span>.html</code>, kéo xuống sẽ thấy có tùy chọn là <span style="color:blue">Tải Nhạc 128 Kbps</span>, các bạn cài plugin Firebug sẽ thấy khi click vào nút này nó sẽ gọi ajax request <code>http://www.nhaccuatui.com/download/song/<span style="color:green">sK00vXjIXqFQ</span>_128</code> và trả về JSON có dạng <code>{"error_message":"Success","data":{"stream_url":"<span style="color: blue;text-decoration:underline;font-weight: bold;">http:\/\/download.f9.stream.nixcdn.com\/8f1705bdbfd732d95a48dda37fb39330\/55cf8284\/NhacCuaTui875\/ChacAiDoSeVe-SonTungMTP-3597661.mp3</span>","is_charge":"false"},"error_code":0,"STATUS_READ_MODE":true}</code>. Đoạn gạch chân màu xanh blue là link cần bóc tách để lấy. Đầu tiên là thiết kế form nhập liệu như bên trên gồm một textbox với tên là text_get_link và một nút Get link. Sau đây là code xử lý server side.
	<code class="code_main">
		<div style="clear:both"></div>
		<span style="color:red">//tách chuỗi để lấy ID</span>
		<div style="clear:both"></div>
		<span>$link = explode('.', $_REQUEST['text_get_link']);</span>
		<div style="clear:both"></div>
		<span>$link_128 = 'http://www.nhaccuatui.com/download/song/'.<span style="color:green">$link[3]</span>.'_128';</span><span style="color:black">//link 128k</span>
		<div style="clear:both"></div>
		<span style="color:red">//đọc nội dung và bóc tách</span>
		<div style="clear:both"></div>
		<span>$get_128 = file_get_contents($link_128);</span>
		<div style="clear:both"></div>
		<span>preg_match('/"stream_url":"(.*)","/U', $get_128, $mp3_128k);</span>
		<div style="clear:both"></div>
		<span>if($mp3_128k){$audio = str_replace('\/', '/', $mp3_128k[1]);}</span>
		<div style="clear:both"></div>
		<span>$link_320 = 'http://www.nhaccuatui.com/download/song/'.<span style="color:green">$link[3]</span>;</span><span style="color:black">//link 320k</span>
		<div style="clear:both"></div>
		<span>$get_320 = file_get_contents($link_320);</span>
		<div style="clear:both"></div>
		<span>preg_match('/"stream_url":"(.*)","/U', $get_320, $mp3_320k);</span>
		<div style="clear:both"></div>
		<span>if($mp3_320k){$audio = str_replace('\/', '/', $mp3_320k[1]);}	</span>			
		<div style="clear:both"></div>
		<span>else {$audio='0';}</span>
		<div style="clear:both"></div>
		<span>return $audio;</span>
	</code>
	<div style="clear:both"></div>
	Đoạn code trên khá đơn giản, từ url tách chuỗi để lấy ID, sau đó truyền ID vào link download, đọc nội dung và bóc tách để lấy link cần lấy, có gì thắc mắc hoặc góp ý các bạn vui lòng bình luận bên dưới.
	<div style="clear:both"></div>
	<a href="http://www.myweb.pro.vn/nhaccuatui/baihat/bai-hat/tap-song-khong-cao-em-son-tung-m-tp.tr7or5XpWIHY.html/nhaccuatui" target="_blank">Trang người dùng cuối</a>
</div>
<div id="comment" class="fb-comments tab-pane  fade in active" data-width="100%"  data-href="http://myweb.pro.vn/getlink/nhaccuatui_audio"  data-numposts="5" data-colorscheme="dark"></div>
</div>


<input type="hidden" value="<?=$csrf_test_name?>" id="csrf_test_name"/>
<script type="text/javascript">
$(document)
.on('click','#btn_get_link_nhaccuatui',function(){ 
var current_url=document.location.href, get_ur=''
if(current_url.match('www')){
	get_url='http://www.myweb.pro.vn/getlink/nhaccuatui_audio';
}
else {
	get_url='http://myweb.pro.vn/getlink/nhaccuatui_audio';
}
$('#music_pagination_ajax_loading').show()
//ajax
$.ajax({
content:'text/html',
type:'get',
dataType: "json",
url:get_url,
data:{
text_get_link:$('#text_get_link').val(),
csrf_test_name:$('#csrf_test_name').val()
},
success:function(data){
if(data.link=='0' || data.link==''){
$('#music_pagination_ajax_loading').hide()
alert('Không tìm thấy hoặc không thể getlink do vấn đề bản quyền');
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
	var type=$(this).attr('data-type'), obj=$(this), current_url=document.location.href, get_ur=''
	if(current_url.match('www')){
		get_url='http://www.myweb.pro.vn/getlink/nhaccuatui_audio';
	}
	else {
		get_url='http://myweb.pro.vn/getlink/nhaccuatui_audio';
	}
	$('#music_pagination_ajax_loading').show()
	//ajax
		$.ajax({
		content:'text/html',
		type:'get',
		dataType: "json",
		url:get_url,
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
