var dictionaries = "eng2vie_vie2eng";
/*_foldoc_vie2vie_vie2fra_fra2vie_wordnet*/
$(document)
		.on("click", "#dict_on", doFetchDictData)
 	    .on("click", "#dictionary_close", closeDict)
document.write("<div id='addVdictOnYourWeb'></div>");
function calldict(word,dictionaries)
{
	/////////////////////////////////////////
var base_url = "http://vdict.com/word/lookup", text = "", vdict_url	=	base_url+'?word='+word+'&dictionaries='+dictionaries;
	str	=	"<div style='float: left; border-bottom: 1px solid #000000; background: #ffffff;'>";
	str	+=	" <div style='float:left;'><a href='index.php?nv=dictionary&op=mini' target='minidictionary'><img src='/modules/dictionary/images/dict_logo.gif' border=0 /></a><span name='vdict_dictionary_name' id='vdict_dictionary_name'></span> </div>";
	str	+=	" <div style='float:right;'><span id='dictionary_close' href='#' ><img src='/modules/dictionary/images/close.gif' border=0 /></span></div>";
	str	+=	"</div>";
	str	+=	"<div>";
	str	+=	"<iframe name='minidictionary' id='myIframe' src='"+vdict_url+"'></iframe>";
	str	+=	"</div>";
	document.getElementById('addVdictOnYourWeb').innerHTML = str;
}

function closeDict ()
{
	$("#addVdictOnYourWeb").hide(1000)	
}


function doFetchDictData()
{
	var  html_text=$("#music_lyric_"+$(this).attr("data-parent")).html().replace("\n","").replace("<hr>","").split(" "),
		   context_id = $(this).attr("data-parent")
		   raw_id = context_id.replace("music_lyric_","")			   
       $(".music_title #music_lyric_" +context_id).remove()       
	   if($('#dict_on .music_lyric').length == '0'){
			$("#music_title_"+raw_id+" .music_key").append("<hr>")
			$("#music_title_"+raw_id+" .music_key").append("<div id="+context_id+" class='music_lyric'></div>")
			for(var k=0;k<html_text.length;k++){
				$("#music_title_"+raw_id+" .music_lyric").append("<span>"+html_text[k]+"</span>")
			}
			$("#music_title_"+raw_id+" .music_lyric").attr("style","display:block")
		}
		/* implement mouse over to query the vdict database */	
        $("#music_title_"+raw_id+" .music_lyric span").mouseover(function(){		
			$(this).addClass("hightlight_word")
			var word_send_to_server=$(this).html()
			$(this).click(function(){
		      $("#addVdictOnYourWeb").show(1000)
                calldict(word_send_to_server, dictionaries) 
			})
            
		})	

		$("#music_title_"+raw_id+" .music_lyric span").mouseout(function(){
				$(this).removeClass("hightlight_word")
		})
		/* end function */
}

