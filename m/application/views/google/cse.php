<script type="text/javascript">
$(document).ready(function(){

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
<form style="display:none" action="http://myweb.pro.vn/book/cse/" class="frm_cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-1996742103012878:3476546681" />
    <input type="hidden" name="cof" value="FORID:10" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" style="width:325px;margin-left:45px;background:#FFFFFF url(http://www.google.com/cse/intl/en/images/google_custom_search_watermark.gif) right no-repeat" placeholder="Enter để tìm kiếm sách..." name="q" size="115" />
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
  </div>
</form>

<div style="margin-top:65px;margin-left:15px" id="cse-search-results"></div>
<script type="text/javascript">
  var googleSearchIframeName = "cse-search-results";
  var googleSearchFormName = "cse-search-box";
  var googleSearchFrameWidth = 1200;
  var googleSearchDomain = "www.google.com.vn";
  var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>