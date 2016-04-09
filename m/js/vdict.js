if(typeof dictionaries == "undefined") 
{
	var dictionaries = "eng2vie_vie2eng_foldoc";
}
/*_foldoc_vie2vie_vie2fra_fra2vie_wordnet*/

function calldict(word,dictionaries)
{
	/////////////////////////////////////////
console.log(word)
var base_url = '/dict/index/'+word;
	str	=	"<div style='float: left'>";
	str	+=	" <div style='float:left;height:30px;margin-top:10px;margin-left:5px'><span class='dict_look_up_title font-effect-3d-float' style='margin-left:0px'>Chức năng tra từ điển Online</span><span name='vdict_dictionary_name' id='vdict_dictionary_name'></span> </div>";
	str	+=	" <div style='float:right;margin-left:230px'><span onclick='closeDict()' id='dictionary_close' href='#' >Đóng</span></div>";
	str	+=	"</div>";
	str	+=	"<div>";
	str	+=	"<iframe name='minidictionary' id='vdict_iframe' src='"+base_url+"'></iframe>";
	str	+=	"</div>";
	document.getElementById('addVdictOnYourWeb').innerHTML = str;
    $("#addVdictOnYourWeb").show("slow");
}

function closeDict ()
{
	$("#addVdictOnYourWeb").hide(1000)	
}

function ctrlrightclick(evt) {
	evt = (evt) ? evt : ((window.event) ? window.event : "");
	if (!evt.ctrlKey) return true
	return false;
}

function detectKey(evt) 
{
    evt = (evt) ? evt : ((window.event) ? window.event : "");
	if(evt.type == 'keydown' && ( (evt.keyCode == "A".charCodeAt(0)) || (evt.keyCode == "a".charCodeAt(0)) ) )
	{
		if ( (evt.ctrlKey) && (evt.shiftKey) )
		{
			text = (document.all) ? document.selection.createRange().text : document.getSelection();
				vdict_enabletip=true;
				calldict(text, dictionaries);
			
		}
	}
	return true;
}
function doDblClick(evt) 
{
    evt = (evt) ? evt : ((window.event) ? window.event : "")
	text = (document.all) ? document.selection.createRange().text : document.getSelection();
		vdict_enabletip=true;
		calldict(text, dictionaries);
	return true;
}

function getWordFromEvent (evt) {
  if (document.body && document.body.createTextRange) {
    var range = document.body.createTextRange();
    range.moveToPoint(evt.clientX, evt.clientY);
    range.expand('word');
    return range.text;
  }
  else if (evt.rangeParent && document.createRange) {
    var range = document.createRange();
    range.setStart(evt.rangeParent, evt.rangeOffset);
    range.setEnd(evt.rangeParent, evt.rangeOffset);
    expandRangeToWord(range);
    var word = range.toString();
    range.detach();
    return word;    
  }
  else {
    return null;
  }
}

function expandRangeToWord (range) {
  var startOfWord 	= 	/^\s\S+$/;
  var endOfWord 	= 	/^\S+\s$/;
  var whitespace 	= 	/^\s+$/;
  // if offset is inside whitespace
  range.setStart(range.startContainer, range.startOffset - 1);
  while (whitespace.test(range.toString())) {
    range.setEnd(range.endContainer, range.endOffset + 1);
    range.setStart(range.startContainer, range.startOffset + 1);
  }
  while (!startOfWord.test(range.toString())) {
    range.setStart(range.startContainer, range.startOffset - 1);
  }
  range.setStart(range.startContainer, range.startOffset + 1);
  while (!endOfWord.test(range.toString())) {
    range.setEnd(range.endContainer, range.endOffset + 1);
  }
  range.setEnd(range.endContainer, range.endOffset - 1);
  return range.toString();
}

function testSelectText(evt)
{
	evt = (evt) ? evt : ((window.event) ? window.event : "");
	text =	getWordFromEvent(evt);
	alert(text);
	vdict_enabletip=true;
	vdict_positiontip(evt);
	calldict(text, dictionaries);
}

document.ondblclick = 	doDblClick;
document.onkeydown 	= 	detectKey;
