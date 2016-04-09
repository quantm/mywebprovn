//
//             Copyright (c) 1999-2010 Smartlink Corp.
//                       All rights reserved.
//

//var VIRK_LAYOUT = /*VIRK_LAYOUT*/'en-or'/*VIRK_LAYOUT*/;

function getCookie(name)
{

    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1)
    {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
    }
    var end = document.cookie.indexOf(";", begin);
    if (end == -1)
    {
        end = dc.length;
    }
    return unescape(dc.substring(begin + prefix.length, end));
}



//var VIRK_LAYOUT = '';
if(getCookie("vk-layout")==null) var VIRK_LAYOUT = "en-or";
else var VIRK_LAYOUT = getCookie("vk-layout");



var VIRK_NOKBD = /*VIRK_NOKBD*/false/*VIRK_NOKBD*/;
navigator.ns70 = navigator.userAgent.indexOf ("Netscape6") > 0
              || navigator.userAgent.indexOf ("Netscape/7.0") > 0;
navigator.opera = navigator.userAgent.indexOf ("Opera") >= 0;
navigator.safari = navigator.userAgent.indexOf ("Safari") >= 0;
navigator.safari10 = navigator.userAgent.indexOf ("Safari/85") >= 0;
navigator.gecko  = navigator.userAgent.indexOf ("Gecko") >= 0
                   && !navigator.safari;
navigator.ie = navigator.appName.indexOf ("Internet Explorer") >= 0;
var noKbd = VIRK_NOKBD || navigator.ns70 || navigator.safari10;
var virkCtrl = null;

//////////////////////////////////////////////////////////////////////////////
//
// VirkCtrl
//

ctrlAttachEvent (window, "load", createVirkCtrl);

function createVirkCtrl () {
   virkCtrl = new VirkCtrl ();
   if (window.opener || window.dialogArguments)
      virkCtrl.attach ();
   ctrlAttachEvent (virkCtrl.mainWnd, "unload", destroyVirkCtrl);
}

function destroyVirkCtrl () {
   if (!window.virkCtrl)
      return;

   window.virkCtrl.detach ();
   window.dialogArguments && window.close (); // for SLToolBar
}

function VirkCtrl () {
   this.mainWnd    = getOpener ();
   this.onKeyPress = virkOnKeyPress;
   this.onLayoutChanged = function (layout) { this.savedLayout = layout; }
   this.attach     = virkAttach;
   this.detach     = virkDetach;
   this.setLayout  = function (layout) { this.kbd.setLayout (layout) };
   this.getLayout  = function () { return this.kbd.getLayout (); };
   
   this.hookCtrl   = virkHookCtrl;
   this.unhookCtrl = virkUnhookCtrl;
   this.updateSel  = virkUpdateSel;
   this.setActiveCtrl = virkSetActiveCtrl;
   
   var layout = VIRK_LAYOUT;
   if (!layout)
      layout = getQueryParam (document.location.href, "layout");
   this.kbd = new Keyboard (this, layout, VIRK_NOKBD);
   this.textRange  = null;
   this.activeCtrl = null;
   if (this.mainWnd.theVirk && this.mainWnd.theVirk.activeCtrl)
      this.setActiveCtrl (this.mainWnd.theVirk.activeCtrl);   

}

function getOpener () {
   //if (window.external && window.external.dialogArguments) // toolbar?
   //   return window.external.dialogArguments;
   if (window.dialogArguments) // dialog?
      return window.dialogArguments;
   if (window.opener) // window?
      return window.opener;
   if (window.parent != window.self) // frame?
      return window.parent;
   if (window.frameElement) // context menu?
      return window.frameElement.parentElement.document.parentWindow;
   return window;
}

function virkEnumObjects (wnd, listener) {
   try {
      var frames = wnd.document.getElementsByTagName ("IFRAME");
      for (var i = 0; i < frames.length; ++i)
         listener.onFrame (frames [i]);

      var doc = wnd.document, forms = doc.forms;
      for (var i = 0; i != forms.length; ++i) {
         var form = forms [i];
         for (var j = 0; j != form.elements.length; ++j) {
            var ctrl = form.elements [j];
            isEditable (ctrl) && listener.onCtrl (ctrl, doc);
         }
      }
      
      if (window.showModalDialog) { // IE?
         var ctrls = wnd.document.getElementsByTagName ("DIV");
         for (var j = 0; j != ctrls.length; ++j) {
            var ctrl = ctrls [j];
            isEditable (ctrl) && listener.onCtrl (ctrl, doc);
         }
      }
      
      for (var i = 0; i != wnd.frames.length; ++i)
         virkEnumObjects (wnd.frames [i], listener);
   }
   catch (e) {
      // exception if wnd is from another domain
   }
}

function VirkAttacher () {
}

VirkAttacher.prototype.onCtrl = function (ctrl, doc) {
   virkCtrl.hookCtrl (ctrl, doc);
   if (virkCtrl.activeCtrl == null)
      virkCtrl.setActiveCtrl (ctrl);
}

VirkAttacher.prototype.onFrame = function (frame) {
   if (frame.style.visibility == "hidden" || frame.style.display == "none")
      return;
   ctrlAttachEvent (frame, "load", virkReAttach);
}

function VirkDetacher () {
}

VirkDetacher.prototype.onCtrl = function (ctrl, doc) {
   virkCtrl.unhookCtrl (ctrl);
}

VirkDetacher.prototype.onFrame = function (frame) {
   ctrlDetachEvent (frame, "load", virkReAttach);
}

function virkAttach () {
   virkEnumObjects (this.mainWnd, new VirkAttacher ());
}

function virkDetach () {
   if (!this.mainWnd || this.mainWnd.closed)
      return;
   virkEnumObjects (this.mainWnd, new VirkDetacher ());
}

function virkReAttach (e) {
   virkEnumObjects (virkCtrl.mainWnd, new VirkAttacher ());
}

var HOOK_EVENTS = [
   { type: "focus",    listener: vkOnFocus     },
   { type: "click",    listener: vkOnFocus     },
 //  { type: "mouseup",  listener: vkOnFocus     },
   { type: "keydown",  listener: vkOnKeyDown,  skip: noKbd },
   { type: "keyup",    listener: vkOnKeyUp,    skip: noKbd },
   { type: "keypress", listener: vkOnKeyPress, skip: noKbd, handler: navigator.safari }
];
  
function virkHookCtrl (ctrl, doc) {

   if (!ctrl.ownerDocument) // for ie5x
      ctrl.ownerDocument = doc;
   if (navigator.ie && !ctrl.attachEvent) {
      ctrl.attachEvent = ctrlAttachEventIE;
      ctrl.detachEvent = ctrlDetachEventIE;
   }
   for (var i = 0; i < HOOK_EVENTS.length; ++i) {
      var e = HOOK_EVENTS [i];
      if (!e.skip )
         ctrlAttachEvent (ctrl, e.type, e.listener, e.handler);
   }
   return ctrl;
}

function virkUnhookCtrl (ctrl) {
   for (var i = 0; i < HOOK_EVENTS.length; ++i) {
      var e = HOOK_EVENTS [i];
      if (!e.skip)
         ctrlDetachEvent (ctrl, e.type, e.listener, e.handler);
   }
}

function getEventTarget (e) {
   return e.srcElement || e.target;
}

function virkOnKeyPress (str) {
   this.updateSel (this.activeCtrl);
   if (!this.textRange) // null if activeCtrl is disabled
      return;
   if (str == "<enter>")
      str = "\n";
   switch (str) {
      case "<bs>":  this.textRange.deleteText (-1); break;
      case "<del>": this.textRange.deleteText (0); break;
      default:      this.textRange.insertText (str); break;
   }
   if (str.charCodeAt (0) > 0x5b0 && str.charCodeAt (0) < 0x6ff || document.getElementById('layouts').value == "ar" || document.getElementById('layouts').value == "fa" || document.getElementById('layouts').value == "ur" || document.getElementById('layouts').value == "he" )
      this.textRange.ctrl.dir = "rtl";
   else this.textRange.ctrl.dir = "ltr";
}

function virkSetActiveCtrl (ctrl) {
   var prevCtrl = this.activeCtrl;
   this.updateSel (ctrl);
   if (!this.activeCtrl || this.activeCtrl == prevCtrl)
      return;
   
   if (this.activeCtrl.lang) {
      if (!this.savedLayout)
         this.savedLayout = this.getLayout ();
      this.setLayout (this.activeCtrl.lang);
   }
   else if (this.savedLayout) {
      this.setLayout (this.savedLayout);
      this.savedLayout = "";
   }
}

function virkUpdateSel (ctrl) {
   try {
      var prevRange = this.textRange;
      this.activeCtrl = this.textRange = null;
      if (!ctrl)
         return;
      var range = new TextRange (ctrl);
      if (!range.ctrl)
         return;
      ctrl.focus ();
      this.activeCtrl = ctrl;
      this.textRange  = (range.ctrl == ctrl ? range : prevRange);
   }
   catch (e) {
      // fails if control is disabled or hidden
      // fails if selection belongs to another domain
   }
}

function vkOnFocus (e) {
   virkCtrl.setActiveCtrl (getEventTarget (e));
}

function vkOnKeyDown (e) {
   var ctrl = getEventTarget (e);
   if (e.keyCode == 8 /*<del>*/ || e.keyCode == 46 /*<bs>*/)
      eventPreventDefault (e);
   virkCtrl.updateSel (ctrl);
   virkCtrl.kbd.onKeyDown (e);
}

function vkOnKeyUp (e) {
   virkCtrl.kbd.onKeyUp (e);
}

function vkOnKeyPress (e) {
   if (!navigator.ie && e.keyCode >= 33 && e.keyCode <= 40) // arrows?
      return;
   if (e.ctrlKey)
      return;
   eventPreventDefault (e);
}
//////////////////////////////////////////////////////////////////////////////
//
// TextRange
//

function TextRange (ctrl) {
   if (!ctrl.ownerDocument)
      return;
   this.ctrl = ctrl;
   if (document.selection && navigator.opera!=true) {
      this.range = ctrl.ownerDocument.selection.createRange ();
      this.ctrl = this.range.parentElement ();
      this.insertText = rangeInsertText;
      this.deleteText = rangeDeleteText;
   }
	//by Igor
	//MOZILLA/NETSCAPE support
  else if (ctrl.selectionStart || ctrl.selectionStart == '0') {
    var startPos = ctrl.selectionStart;
    var endPos = ctrl.selectionEnd;

	this.insertText = function(text){
	    ctrl.value = ctrl.value.substring(0, startPos)
            + text
            + ctrl.value.substring(endPos, ctrl.value.length);
		ctrl.selectionStart = startPos+text.length;
		ctrl.selectionEnd = startPos+text.length;
		}
	this.deleteText = function(dir){
		//If no selection exists, delete 1 char at cursor
		if( startPos == endPos){    // && startPos != 0 && endPos != 0
			ctrl.value = ctrl.value.substring(0,startPos-1)
			+ ctrl.value.substring(endPos,ctrl.value.length);
			ctrl.selectionStart = startPos-1;
			ctrl.selectionEnd = startPos-1;
		}
		else{
			ctrl.value= ctrl.value.substring(0,startPos) 
			+ ""
			+ ctrl.value.substring(endPos,ctrl.value.length);
			ctrl.selectionStart = startPos;
			ctrl.selectionEnd = startPos;
		}
	}
  } 
   else {
      this.insertText = plainInsertText;
      this.deleteText = plainDeleteText;
   }
}

function rangeInsertText (text) {
   this.range.text = text;
   this.range.collapse (false);
   this.range.select ();
   /*#if FARSI_YEH*/this.correctText ();/*#endif*/
}

function rangeDeleteText (dir) {
   if (!this.range.text) {
      var savedRange = this.range.duplicate ();
      if (dir < 0)
         this.range.moveStart ("character", -1);
      else
         this.range.moveEnd ("character", 1);
      if (/<.*>/.test (this.range.htmlText)) {
         this.range = savedRange;
         return;
      }
   }
   this.range.text = "";
   this.range.collapse (false);
   this.range.select ();
   /*#if FARSI_YEH*/this.correctText ();/*#endif*/
}

function plainInsertText (text) {
   this.ctrl.value = this.ctrl.value + text;
   /*#if FARSI_YEH*/this.correctText ();/*#endif*/
}

function plainDeleteText (dir) {
   if (dir < 0 && this.ctrl.value.length)
      this.ctrl.value = this.ctrl.value.substr (0, this.ctrl.value.length - 1);
   /*#if FARSI_YEH*/this.correctText ();/*#endif*/
}

/*#if FARSI_YEH*/
TextRange.prototype.correctText = function () {
   if (navigator.userAgent.indexOf ("Windows 98") < 0)
      return;

   var text = "", range = null, cchRight = 0, isDirty = false;
   if (this.range) {
      range = this.range.duplicate ();
      cchRight = range.moveEnd ("character", 1);
      if (/<.*>/.test (range.htmlText)) {
         range = this.range.duplicate ();
         cchRight = 0;
      }
      range.moveStart ("character", -2);
      if (/<.*>/.test (range.htmlText))
         return;
      text = range.text;
   }
   else {
      text = this.ctrl.value;
   }
   
   for (var pos = 0; (pos = text.indexOf ('\u06cc', pos)) >= 0; ++pos) {
      var nextChar = text.charAt (pos + 1);
      if (nextChar && !nextChar.match (/\s/)) {
         text = text.substr (0, pos) + '\u064a' + text.substr (pos + 1);
         isDirty = true;
      }
   }
   if (!isDirty)
      return;
   
   if (range) {
      range.text = text; 
      range.moveEnd ("character", -cchRight);
      range.collapse (false);
      range.select ();
      this.range = range;
   }
   else {
      this.ctrl.value = text;
   }
}
/*#endif*/

//////////////////////////////////////////////////////////////////////////////
//
// Helper functions
//

function ctrlAttachEvent (ctrl, type, listener, handler) {
   if (ctrl.addEventListener && !handler) {
      ctrl.addEventListener (type, listener, false);
   }
   else if (ctrl.attachEvent) {
      ctrl.detachEvent ("on" + type, listener);
      ctrl.attachEvent ("on" + type, listener);
   }
   else {
      ctrl ["on" + type] = listener;
   }
}

function ctrlDetachEvent (ctrl, type, listener, handler) {
   if (handler)
      ctrl ["on" + type] = null;
   if (ctrl.removeEventListener)
      ctrl.removeEventListener (type, listener, false);
   else if (ctrl.detachEvent)
      ctrl.detachEvent ("on" + type, listener);
}

function isEditable (ctrl) {
   return !ctrl.disabled &&  ctrl.id != "back_text" &&
          (ctrl.isContentEditable ||
           ctrl.tagName == "INPUT" && ctrl.type == "text" ||
           ctrl.tagName == "TEXTAREA");
}

function eventPreventDefault (e) {
   if (e) {
      e.returnValue = false;
      if (e.preventDefault)
         e.preventDefault ();
   }
}

function getQueryParam (query, param) {
   var value = new RegExp (param + "=([^&]*)").exec (query);
   if (!value || value.length < 2)
      return "";
   return value [1];
}

function ctrlAttachEventIE (type, listener) {
   this.parentWin = this.ownerDocument.parentWindow;
   this [type + "Listener"] = listener;
   this [type] = onEventIE;
}

function ctrlDetachEventIE (type) {
   this [type] = null;
}

function cloneObject (obj) {
   var clone = new Object, prop;
   for (prop in obj)
      clone [prop] = obj [prop];
   return clone;
}

function onEventIE () {
   var e = this.parentWin.event, listener;
   if (e && (listener = this ["on" + e.type + "Listener"]))
      return listener (cloneObject (e));
}