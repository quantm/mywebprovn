var VIRK_LAYOUT="";var VIRK_NOKBD=false;if(!window.VIRK_PATH)

window.VIRK_PATH="VIRK/";var VIRK_SIZE=[300,103];var theVirk=null;ctrlAttachEvent(window,"load",function(){theVirk=new Virk()});ctrlAttachEvent(window,"unload",function(){kbdShowHide()});

function kbdShowHide(fShow){

if(theVirk)fShow?theVirk.show():theVirk.hide();

}

function Virk(){this.elem=document.getElementById("virk");if(this.elem&&this.elem.tagName=="IFRAME"){this.wnd=window.frames["virk"];this.show=virkFrameShow;this.hide=virkFrameHide;if(this.elem.style.visibility!="hidden"&&this.elem.style.display!="none")

this.show();}

else{this.show=virkDialogShow;this.hide=virkDialogHide;}

this.attachOnFocus();if(VIRK_NOKBD){this.blockKbd();this.show();}}

function virkDialogShow(color){if(this.wnd&&!this.wnd.closed)this.wnd.close();var href=window.VIRK_PATH+"virk.asp";href=href+'?sh='+color;if(VIRK_LAYOUT)

href+="&layout="+VIRK_LAYOUT;if(window.showModelessDialog){var features="dialogWidth:"+(VIRK_SIZE[0]+1)+"px;dialogHeight:"+(VIRK_SIZE[1]+1)+"px"

+";scroll:no;help:no;status=no;";this.wnd=window.showModelessDialog(href,window,features);}

else{var features="dependent=yes,width="+(VIRK_SIZE[0]+3)+",height="+(VIRK_SIZE[1]+3)

+",scroll=no,help=no,status=no,directories=no,menubar=no,resizable=no";if(navigator.platform.indexOf("Mac")<0)

features+=",dialog=yes";this.wnd=window.open(href,"Virk",features);}}

function virkDialogHide(){if(this.wnd&&!this.wnd.closed)

this.wnd.close();this.wnd=null;}

function virkFrameShow(){this.elem.style.visibility="visible";if(this.wnd&&this.wnd.virkCtrl){if(VIRK_LAYOUT){this.wnd.virkCtrl.setLayout(VIRK_LAYOUT);VIRK_LAYOUT="";}

this.wnd.virkCtrl.attach(window);}}

function virkFrameHide(){this.elem.style.visibility="hidden";if(this.wnd&&this.wnd.virkCtrl)

this.wnd.virkCtrl.detach();}

Virk.prototype.blockKbd=function(){for(var i=0;i<document.forms.length;++i){var ctrls=document.forms[i].elements;for(var j=0;j<ctrls.length;++j){if(isEditable(ctrls[j])){ctrls[j].onkeypress=function(){return false;}

ctrls[j].onclick=function(){theVirk.show();}}}}}

Virk.prototype.attachOnFocus=function(wnd){try{wnd=wnd?wnd:window;var forms=wnd.document.forms;for(var i=0;i<forms.length;++i){var ctrls=forms[i].elements;for(var j=0;j<ctrls.length;++j){if(isEditable(ctrls[j])){ctrlAttachEvent(ctrls[j],"focus",virkOnFocus);}}}

var frames=wnd.document.getElementsByTagName("IFRAME");for(var i=0;i<frames.length;++i)

ctrlAttachEvent(frames[i],"load",virkOnLoadFrame);for(var i=0;i<wnd.frames.length;++i)

this.attachOnFocus(wnd.frames[i]);}

catch(e){}}

Virk.prototype.getLayout=function(){if(!this.wnd||this.wnd.closed)

return"";return this.wnd.virkCtrl.getLayout();}

function virkOnLoadFrame(){theVirk.attachOnFocus();}

function virkOnFocus(e){e=e||window.event;theVirk.activeCtrl=e.srcElement||e.target;}

function isEditable(ctrl){return ctrl.isContentEditable||ctrl.tagName=="INPUT"&&ctrl.type=="text"||ctrl.tagName=="TEXTAREA";}

function ctrlAttachEvent(ctrl,type,listener){if(ctrl.addEventListener){ctrl.addEventListener(type,listener,false);}

else if(ctrl.attachEvent){ctrl.detachEvent("on"+type,listener);ctrl.attachEvent("on"+type,listener);}

else{ctrl["on"+type]=listener;}}
