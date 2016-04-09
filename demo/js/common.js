function Split(str, delim)
{
    var res = new Array();
	while(str.length > 0)
	{
	    var pos = (str+delim).indexOf(delim);
	    res[res.length] = str.substring(0, pos);
	    str = (pos == str.length)?"":str.substring(pos+delim.length);
	}
	return res;
}
function Trim(str)
{
    while((str.length > 0) && (str.charAt(0) == ' '))
	    str = str.substring(1,str.length);
    while((str.length > 0) && (str.charAt(str.length-1) == ' '))
	    str = str.substring(0,str.length-1);
    return str;
}
function RemoveElement(obj){
	var objparent;
	objparent = obj.parentNode;
	objparent.removeChild(obj);
}
function RemoveArrItem(arr,id){
	for(var i=0;i<arr.length;i++){
		if(arr[i][0]==id){
			arr.splice(i,1);break;
		}
	}
	return arr;
}
function FillComboByCombo(obj,objdesc,arr){
	for (i = objdesc.length - 1; i>=0; i--) {
		objdesc.removeChild(objdesc.options[i]);
	}
	for(var i=0;i<arr.length;i++){
		if(arr[i][0]==obj.value || obj.value==0){
			var elOptNew = document.createElement('option');
			elOptNew.text = arr[i][2];
			elOptNew.value = arr[i][1];
			try {
			  objdesc.add(elOptNew, null); // standards compliant; doesn't work in IE
			}
			catch(ex) {
			  objdesc.add(elOptNew); // IE only
			}
		}
	}
}
function AddComboxItem(obj,id,text){
	var elOptNew = document.createElement('option');
	elOptNew.text = text;
	elOptNew.value = id;
	try {
		obj.add(elOptNew, null); // standards compliant; doesn't work in IE
	}
	catch(ex) {
		obj.add(elOptNew); // IE only
	}
}
function FillComboByComboExp(obj,objdesc,arr,exparr){
	for (i = objdesc.length - 1; i>=0; i--) {
		objdesc.removeChild(objdesc.options[i]);
	}
	for(var i=0;i<arr.length;i++){
		if(arr[i][0]==obj.value || obj.value==0){
			var ok=true;
			if(exparr!=null){
				for(var j=0;j<exparr.length;j++){
					if(exparr[j][1]==arr[i][1]){
						ok=false;
						break;
					}
				}
			}
			if(ok){
				var elOptNew = document.createElement('option');
				elOptNew.text = arr[i][2];
				elOptNew.value = arr[i][1];
				try {
				  objdesc.add(elOptNew, null); // standards compliant; doesn't work in IE
				}
				catch(ex) {
				  objdesc.add(elOptNew); // IE only
				}
			}
		}
	}
}
function FillComboByComboExp1(obj,objdesc,arr,exparr){	

	for (i = objdesc.length - 1; i>=0; i--) {
		objdesc.removeChild(objdesc.options[i]);
	}
		  var elOptNew1 = document.createElement('option');
				elOptNew1.text= "---Chọn tất cả --------";
				elOptNew1.value = 1;
         try {
                  objdesc.add(elOptNew1, null);				
			 }catch(ex) {
				  objdesc.add(elOptNew1); 
				}
	for(var i=0;i<arr.length;i++){
		if(arr[i][0]==obj.value || obj.value==0){
			var ok=true;
			if(exparr!=null){
				for(var j=0;j<exparr.length;j++){
					if(exparr[j][1]==arr[i][1]){
						ok=false;
						break;
					}
				}
			}
			if(ok){
				var elOptNew = document.createElement('option');				
				elOptNew.text = arr[i][2];
				elOptNew.value = arr[i][1];
				try {                  
				  objdesc.add(elOptNew, null); // standards compliant; doesn't work in IE
				}
				catch(ex) {
				  objdesc.add(elOptNew); // IE only
				}
			}
		}
	}
	   	
}
function FillComboByComboWithSel(obj,objdesc,arr,sel){
	for (i = objdesc.length - 1; i>=0; i--) {
		objdesc.removeChild(objdesc.options[i]);
	}
	for(var i=0;i<arr.length;i++){
		if(arr[i][0]==obj.value || obj.value==0){
			var elOptNew = document.createElement('option');
			elOptNew.text = arr[i][2];
			elOptNew.value = arr[i][1];
			try {
			  objdesc.add(elOptNew, null); // standards compliant; doesn't work in IE
			}
			catch(ex) {
			  objdesc.add(elOptNew); // IE only
			}
		}
	}
	objdesc.value = sel;
}
function FillComboBy2Combo(obj1,obj2,objdesc,arr,exparr){
	for (i = objdesc.length - 1; i>=0; i--) {
		objdesc.removeChild(objdesc.options[i]);
	}
	for(var i=0;i<arr.length;i++){
		if(arr[i][0]==obj1.value && arr[i][1]==obj2.value){
			var ok=true;
			
			if(exparr!=null){
				for(var j=0;j<exparr.length;j++){
					//alert(exparr[j].length);
					if(exparr[j][0]==arr[i][2]){
						ok=false;
						
						break;
					}
				}
			}
			if(ok){
				var elOptNew = document.createElement('option');
				elOptNew.text = arr[i][3];
				elOptNew.value = arr[i][2];
				try {
				  objdesc.add(elOptNew, null); // standards compliant; doesn't work in IE
				}
				catch(ex) {
				  objdesc.add(elOptNew); // IE only
				}
			}
		}
	}
}
function SelectAll(selobj,childobj){
	var arr = document.getElementsByName(childobj+"[]");
	for(var i=0;i<arr.length;i++){
		arr[i].checked = selobj.checked;
	}
}
function SelectAllForEmail(checked,childobj,read,mark){
	var arr = document.getElementsByName(childobj+"[]");
	for(var i=0;i<arr.length;i++){
		if(checked==false){
			arr[i].checked = checked;
		}else{
			if(read!="" || mark!=""){
				if(read!=""){
					if(arr[i].title==""+read+"-0" || arr[i].title==""+read+"-1"){
						arr[i].checked = checked;
					}else{
						arr[i].checked = false;
					}
				}else if(mark!=""){
					if(arr[i].title=="0-1" || arr[i].title=="1-1"){
						arr[i].checked = checked;
					}else{
						arr[i].checked = false;
					}
				}else{
					arr[i].checked = false;
				}
			}else{
				arr[i].checked = checked;
			}
		}
	}
}
function SelectAllByTitle(selobj,childobjtitle){
	var arr = document.getElementsByTagName("input");
	var fire = selobj.checked;
	for(var i=0;i<arr.length;i++){
		if(arr[i].title==childobjtitle){
			//cha check con ko
			if(fire && arr[i].checked==false){
				arr[i].click();
			}
			//cha check con check
			if(fire && arr[i].checked){
				arr[i].checked=false;
				arr[i].click();
			}
			//cha khong check con check
			if(fire==false && arr[i].checked){
				arr[i].click();
			}
			//cha ko check con cung ko
			if(fire==false && arr[i].checked==false){
				arr[i].checked=true;
				arr[i].click();
			}
		}
	}
}
function URLEncode(str)
{
	// The Javascript escape and unescape functions do not correspond
	// with what browsers actually do...
	var SAFECHARS = "0123456789" +					// Numeric
					"ABCDEFGHIJKLMNOPQRSTUVWXYZ" +	// Alphabetic
					"abcdefghijklmnopqrstuvwxyz" +
					"-_.!~*'()";					// RFC2396 Mark characters
	var HEX = "0123456789ABCDEF";

	var plaintext = str;
	var encoded = "";
	for (var i = 0; i < plaintext.length; i++ ) {
		var ch = plaintext.charAt(i);
	    if (ch == " ") {
		    encoded += "+";				// x-www-urlencoded, rather than %20
		} else if (SAFECHARS.indexOf(ch) != -1) {
		    encoded += ch;
		} else {
		    var charCode = ch.charCodeAt(0);
			encoded += "%";
			encoded += HEX.charAt((charCode >> 4) & 0xF);
			encoded += HEX.charAt(charCode & 0xF);
		}
	} // for
	return encoded;
}
function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode;
   if(charCode==46)return true;
   if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;

   return true;
}
function showOrHideAllDropDowns(newState) {
	var is_ie6 = (
			window.external &&
			typeof window.XMLHttpRequest == "undefined"
		);
	if (is_ie6)
	{
		var elements = document.getElementsByTagName('select');
		 
	    for (var i=0; i<elements.length; i++) {
	        elements[i].style.visibility = newState;
	        elements[i].style.border = "1px solid";
	    }
	}
}
/**
 * http://www.openjs.com/scripts/events/keyboard_shortcuts/
 * Version : 2.01.B
 * By Binny V A
 * License : BSD
 */
shortcut = {
	'all_shortcuts':{},//All the shortcuts are stored in this array
	'add': function(shortcut_combination,callback,opt) {
		//Provide a set of default options
		var default_options = {
			'type':'keydown',
			'propagate':false,
			'disable_in_input':false,
			'target':document,
			'keycode':false
		}
		if(!opt) opt = default_options;
		else {
			for(var dfo in default_options) {
				if(typeof opt[dfo] == 'undefined') opt[dfo] = default_options[dfo];
			}
		}

		var ele = opt.target;
		if(typeof opt.target == 'string') ele = document.getElementById(opt.target);
		var ths = this;
		shortcut_combination = shortcut_combination.toLowerCase();

		//The function to be called at keypress
		var func = function(e) {
			e = e || window.event;
			
			if(opt['disable_in_input']) { //Don't enable shortcut keys in Input, Textarea fields
				var element;
				if(e.target) element=e.target;
				else if(e.srcElement) element=e.srcElement;
				if(element.nodeType==3) element=element.parentNode;

				if(element.tagName == 'INPUT' || element.tagName == 'TEXTAREA') return;
			}
	
			//Find Which key is pressed
			if (e.keyCode) code = e.keyCode;
			else if (e.which) code = e.which;
			var character = String.fromCharCode(code);
			
			if(code == 188) character=","; //If the user presses , when the type is onkeydown
			if(code == 190) character="."; //If the user presses , when the type is onkeydown

			var keys = shortcut_combination.split("+");
			//Key Pressed - counts the number of valid keypresses - if it is same as the number of keys, the shortcut function is invoked
			var kp = 0;
			
			//Work around for stupid Shift key bug created by using lowercase - as a result the shift+num combination was broken
			var shift_nums = {
				"`":"~",
				"1":"!",
				"2":"@",
				"3":"#",
				"4":"$",
				"5":"%",
				"6":"^",
				"7":"&",
				"8":"*",
				"9":"(",
				"0":")",
				"-":"_",
				"=":"+",
				";":":",
				"'":"\"",
				",":"<",
				".":">",
				"/":"?",
				"\\":"|"
			}
			//Special Keys - and their codes
			var special_keys = {
				'esc':27,
				'escape':27,
				'tab':9,
				'space':32,
				'return':13,
				'enter':13,
				'backspace':8,
	
				'scrolllock':145,
				'scroll_lock':145,
				'scroll':145,
				'capslock':20,
				'caps_lock':20,
				'caps':20,
				'numlock':144,
				'num_lock':144,
				'num':144,
				
				'pause':19,
				'break':19,
				
				'insert':45,
				'home':36,
				'delete':46,
				'end':35,
				
				'pageup':33,
				'page_up':33,
				'pu':33,
	
				'pagedown':34,
				'page_down':34,
				'pd':34,
	
				'left':37,
				'up':38,
				'right':39,
				'down':40,
	
				'f1':112,
				'f2':113,
				'f3':114,
				'f4':115,
				'f5':116,
				'f6':117,
				'f7':118,
				'f8':119,
				'f9':120,
				'f10':121,
				'f11':122,
				'f12':123
			}
	
			var modifiers = { 
				shift: { wanted:false, pressed:false},
				ctrl : { wanted:false, pressed:false},
				alt  : { wanted:false, pressed:false},
				meta : { wanted:false, pressed:false}	//Meta is Mac specific
			};
                        
			if(e.ctrlKey)	modifiers.ctrl.pressed = true;
			if(e.shiftKey)	modifiers.shift.pressed = true;
			if(e.altKey)	modifiers.alt.pressed = true;
			if(e.metaKey)   modifiers.meta.pressed = true;
                        
			for(var i=0; k=keys[i],i<keys.length; i++) {
				//Modifiers
				if(k == 'ctrl' || k == 'control') {
					kp++;
					modifiers.ctrl.wanted = true;

				} else if(k == 'shift') {
					kp++;
					modifiers.shift.wanted = true;

				} else if(k == 'alt') {
					kp++;
					modifiers.alt.wanted = true;
				} else if(k == 'meta') {
					kp++;
					modifiers.meta.wanted = true;
				} else if(k.length > 1) { //If it is a special key
					if(special_keys[k] == code) kp++;
					
				} else if(opt['keycode']) {
					if(opt['keycode'] == code) kp++;

				} else { //The special keys did not match
					if(character == k) kp++;
					else {
						if(shift_nums[character] && e.shiftKey) { //Stupid Shift key bug created by using lowercase
							character = shift_nums[character]; 
							if(character == k) kp++;
						}
					}
				}
			}
			
			if(kp == keys.length && 
						modifiers.ctrl.pressed == modifiers.ctrl.wanted &&
						modifiers.shift.pressed == modifiers.shift.wanted &&
						modifiers.alt.pressed == modifiers.alt.wanted &&
						modifiers.meta.pressed == modifiers.meta.wanted) {
				callback(e);
	
				if(!opt['propagate']) { //Stop the event
					//e.cancelBubble is supported by IE - this will kill the bubbling process.
					e.cancelBubble = true;
					e.returnValue = false;
	
					//e.stopPropagation works in Firefox.
					if (e.stopPropagation) {
						e.stopPropagation();
						e.preventDefault();
					}
					return false;
				}
			}
		}
		this.all_shortcuts[shortcut_combination] = {
			'callback':func, 
			'target':ele, 
			'event': opt['type']
		};
		//Attach the function with the event
		if(ele.addEventListener) ele.addEventListener(opt['type'], func, false);
		else if(ele.attachEvent) ele.attachEvent('on'+opt['type'], func);
		else ele['on'+opt['type']] = func;
	},

	//Remove the shortcut - just specify the shortcut and I will remove the binding
	'remove':function(shortcut_combination) {
		shortcut_combination = shortcut_combination.toLowerCase();
		var binding = this.all_shortcuts[shortcut_combination];
		delete(this.all_shortcuts[shortcut_combination])
		if(!binding) return;
		var type = binding['event'];
		var ele = binding['target'];
		var callback = binding['callback'];

		if(ele.detachEvent) ele.detachEvent('on'+type, callback);
		else if(ele.removeEventListener) ele.removeEventListener(type, callback, false);
		else ele['on'+type] = false;
	}
}
if(document.all){
	shortcut.add("Ctrl+S",function() {
		if( typeof(PressCtrlS)=="function")eval("PressCtrlS()");
	},{'type':'keydown',
		'propagate':false,
		'disable_in_input':false,
		'target':document,
		'keycode':83});
}else{
	shortcut.add("Ctrl+S",
			function(evt) { if(typeof(PressCtrlS)=="function")eval("PressCtrlS()"); },
			{'type':'keypress','propagate':false,'target':document}
			);
}

function cancelEvent(evt){
	if(!evt) evt=window.event;
	if (evt.stopPropagation) evt.stopPropagation(); // DOM Level 2
	else evt.cancelBubble = true;
	//alert(evt);
}


function luutheodoiJs(id_hscv){
	
	//window.location = '/hscv/hosoluutheodoi';
	if(confirm('Bạn có muốn lưu hồ sơ để theo dõi không?')){
	
		var url = '/hscv/hosoluutheodoi/luutheodoi/id_hscv/'+id_hscv;
		var AE = new AjaxEngine();
		var oXmlHttp = AE.createXMLHttp(); 	
	    oXmlHttp.open('post', url , true);
	    oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	    oXmlHttp.onreadystatechange = function () { 
	        if (oXmlHttp.readyState == 4) { 
	        	if (oXmlHttp.status == 200) {             	
	        		// thực hiện hàm success() nếu server trả dữ liệu về đúng   
	        		//alert(oXmlHttp.responseText);        		
	        		var re = oXmlHttp.responseText;
	        		if(re > 0){
	        			document.frm.submit();
	        		}else{
	        			alert('Không thể chuyển hồ sơ vào danh mục lưu để theo dõi');
	        		}
	            } else { 
	            	
	            	
	            }            
	        } 
	    };  
	    oXmlHttp.send(null);   
	}
}
function createTextArea(id,name,initvalue,onchangeaction,style){
	html = "";
	if(!document.all){
		html = "<textarea id='"+id+"' class="+style+" onkeypress='fitToText(this)' style='height:auto;border:0px solid;width:95%;overflow-y:hidden;overflow-x:hidden' name="+name+" onchange='"+onchangeaction+"'>"+initvalue+"</textarea>";
	}else{
		//alert(onchangeaction);
		html = "<div id='DIV_"+id+"' class="+style+" contenteditable='true' onkeydown='return EditorKillEnter(this)' onblur='document.getElementById(\""+id+"\").value=this.innerText;"+onchangeaction+"' style='width:98%'>"+initvalue.replace(/\n/g,"<br>")+"</div>";
		html += "<textarea style='display:none' name='"+name+"' id='"+id+"' cols='12' rows='4'>"+initvalue+"</textarea>";
	}
	return html;
}
function createInputHanxuly(id,name,value,onchange,display,type){
	var html="";
	html  ="<span style='display:"+display+";' id='span_"+id+"'><input id='"+id+"' type=textbox onkeypress='return isNumberKey(event)' name='temp_"+name+"' size=3 maxlength=3 value='"+value+"' onchange='document.getElementById(\"real_"+id+"\").value=this.value/document.frm.type_real_"+id+".value;"+onchange+"'>";
	html+= "<input style='display:none;' type=text id='real_"+id+"' name='"+name+"' value='"+(value/type)+"'>";
	html+= "<input "+(type==1?"checked":"")+" type=radio name='type_"+id+"' id='type_1_"+id+"' onclick=\"document.frm.type_real_"+id+".value=1;document.getElementById('real_"+id+"').value=document.getElementById('"+id+"').value/this.value;"+onchange+"\" value=1>ngày ";
	html+= "<input "+(type==8?"checked":"")+" type=radio name='type_"+id+"' id='type_8_"+id+"' onclick=\"document.frm.type_real_"+id+".value=8;document.getElementById('real_"+id+"').value=document.getElementById('"+id+"').value/this.value;"+onchange+"\" value=8>giờ";
	html+= "<input style='display:none;' type=text id='type_real_"+id+"' name='type_real_"+id+"' value='"+type+"'></span>";
	return html;
}
function createTextHanXuLy(value){
	if(value<1 && value>0){
		value = value * 8;
		return "" + value + " giờ";
	}else if(value>=1){
		return "" + value + " ngày";
	}else{
		return "";
	}
}
function EditorKillEnter(obj)
{
	//check whether the shiftKey isn't used at the same time
	if(event.keyCode == 13 && !event.shiftKey)
	{ //check if an image isn't selected
		var TempTR = obj.document.selection.createRange();
		if(TempTR.pasteHTML)
		TempTR.pasteHTML("<br><wbr>");
		return false;
	}
	else
	return true;
}