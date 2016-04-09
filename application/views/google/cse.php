<style>
.adv_cse_right {
  position: fixed;
  width: 250px;
  height: 600px;
  margin-left: 77%;
  margin-top: -139%;
}
#cse-search-results >iframe {
	width:75%;
}
</style>
<div style="margin-top:65px;margin-left:15px" id="cse-search-results"></div>
<div class="adv_cse_right">
	<!--- Script ANTS - 300x600 --> 
<script type="text/javascript">
    if(typeof window.ANTS=='undefined'||(window.ANTS&&typeof window.ANTSExcuted!='undefined'))
       document.write('<script type="text/javascript" async="true" src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"><\/script>');
    document.write('<div class="521621655" data-ants-zone-id="521621655"><\/div>');
</script> 
<!--- end ANTS Script -->
</div>
<script type="text/javascript">
  var googleSearchIframeName = "cse-search-results";
  var googleSearchFormName = "cse-search-box";
  var googleSearchFrameWidth = 1200;
  var googleSearchDomain = "www.google.com.vn";
  var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
<script type="text/javascript">
$(document)
.ready(function(){
	$('#intro_guide').remove()
	$('body').removeAttr('onbeforeunload')
	$('#javascript_adv_object').removeAttr('src')
})

//header cse
.on('mouseover','.header_text_search',function(){
	$('#cse-search-box').show('slow')
	$('.header_text_search,.language h6').hide()
})
.on('click','#header_cse_close',function(){
	$('#cse-search-box').hide('slow')
	$('.header_text_search').show()
})
//end
</script>