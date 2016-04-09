var ttsLIMIT = 1000;
var mailer_path = "";
var mailer_type =   "asp"; // htm

var dmn = "http://"+location.host; 

var fIE    = (window.showModalDialog ? true : false);
var fNS4   = !(document.getElementById);

setCookie("advr",0);

function GEBI(id){
return document.getElementById(id);
}

function Browser () {
   var userAgent = navigator.userAgent.toLowerCase ();
   this.major    = parseInt (navigator.appVersion);
   this.version  = parseFloat (navigator.appVersion);
	if (userAgent.indexOf ("safari") >= 0) {
      this.sfr    = true;
   }
   else if (userAgent.indexOf ("opera") >= 0) {
      this.opera = true;
   }
   else if (userAgent.indexOf ("msie") >= 0) {
      this.ie    = true;
   }
   else if (userAgent.indexOf ("mozilla") >= 0) {
      this.ns    = true;
      this.ns4   = (this.version >= 4 && this.version < 5);
   }
   this.win      = (userAgent.indexOf ("win") >= 0);
   this.mac      = (userAgent.indexOf ("mac") >= 0);
   this.unix     = (userAgent.indexOf ("x11") >= 0);
   this.lineSep  = (this.mac ? '\r' : '\n');
   this.ie6SP2   = (userAgent.indexOf("sv1") != -1)
   
}

var browser = new Browser ();

function Baner300x250(){
if(window.frames['ifr300x250'])window.frames['ifr300x250'].document.location.reload();
if(window.frames['ifr300x250x2'])window.frames['ifr300x250x2'].document.location.reload();
//if(window.frames['topbanner'])window.frames['topbanner'].document.location.reload();
}



function TTS_OnOff(dir){
var DRS = dir.split("/");
var ob = new Array();
ob[0]='tts_source';
ob[1]='tts_target';
 for (var i=0; i<2; i++){
  if(DRS[i] == "zh" || DRS[i] == "en" || DRS[i] == "enf" || DRS[i] == "fr" || DRS[i] == "de" || DRS[i] == "it" || DRS[i] == "ja" || DRS[i] == "ko" || DRS[i] == "pt" || DRS[i] == "ru" || DRS[i] == "es")	
	document.getElementById(ob[i]).style.display='block';
  else  document.getElementById(ob[i]).style.display='none';
 }
}

function StartTTS(ob){
dir = document.getElementById('langs').value;
var obName;
var segdir = dir.split("/");
 if(ob==1) {dir = segdir[0]; obName = "source";}
 else      {dir = segdir[1]; obName = "target";}
 text = window.frames[obName].document.form.text.value;

  for(var i=0; i<text.length; i++) {
     if (text.indexOf("&")!=-1)           text = text.replace("&"," ");
     if (text.indexOf("\n")!=-1)          text = text.replace("\n"," ~|~");
  }

//--------------------------------------------------------------------------------
//if(dir=="en") dir="enf"; // Switching the dafault English Character to the Female.
//--------------------------------------------------------------------------------



 var submitForm = getNewSubmitForm();
 createNewFormElement(submitForm, "text", text);
 createNewFormElement(submitForm, "url", "F_TR");
 createNewFormElement(submitForm, "dir", dir);
 submitForm.action= dmn +"/speech.asp";
 submitForm.target= "_top";
 submitForm.submit();

// document.location.href ="speech.asp?url=F_TR&dir="+dir+"&text="+text;
}



function getNewSubmitForm(){
 var submitForm = document.createElement("FORM");
 document.body.appendChild(submitForm);
 submitForm.method = "POST";
 return submitForm;
}

function createNewFormElement(inputForm, elementName, elementValue){

try{
var newElement = document.createElement("<input name='"+elementName+"' type='hidden'>");
}catch(err){   
var newElement = document.createElement('input');
newElement.setAttribute('type','hidden');
newElement.setAttribute('name',elementName);

}
 
 inputForm.appendChild(newElement);
 newElement.value = elementValue;
 return newElement;
}

function DivAlert(){
	document.getElementById('divalert').style.display='none';
	document.getElementById('fog').style.display = 'none'; return false;
}


function speechClose(){
 if(document.getElementById('speech')){
  var frame = document.getElementById('speech');
  if(frame)	frame.parentNode.removeChild(frame);
 }

}

function speechBuilder(ul,ID,TTSlang){
speechClose();

if(TTSlang != "en" && TTSlang != "zh" && TTSlang != "enf" && TTSlang != "ja" && TTSlang != "ko" && TTSlang != "fr" && TTSlang != "de" && TTSlang != "it" && TTSlang != "pt"  && TTSlang != "ru" && TTSlang != "es")	{alert("The voice is not implemented yet.\nWe are planning to add it in the near future.\n\nPlease come back soon."); return false;}

var speechText="";
var font='15px';
var getfont=font;
speechText = window.frames['TTSText'].document.form.text.value; 


speed = document.getElementById('spd').value;

if(getfont != "") font=getfont;

switch(TTSlang){
 case 'zh': face = "MiaHead"; voice="VW Lily"; break;
 case 'en': face = "PeterHead"; voice="VW Paul"; break;
 case 'enf': face = "AnnaHead"; voice="VW Kate"; break;
 case 'es': face = "Jason"; voice="Jorge"; break;
// case 'ru': face = "VoyagerHead"; voice="ScanSoft Katerina_Telecom"; break;
 case 'ru': face = "VoyagerHead"; voice="Olga"; break;
 case 'fr': face = "Jessi"; voice="Florence"; break;
 case 'de': face = "James"; voice="Stefan"; break;
 case 'it': face = "TonyHead"; voice="Matteo"; break;
 case 'pt': face = "Jenny"; voice="Gabriela"; break;
 case 'ja': face = "MiaHead"; voice="VW Misaki"; break;
 case 'ko': face = "MiaHead"; voice="VW Yumi"; break;
 default  : face = "PeterHead"; voice="VW Paul"; break;
}

//alert(voice);
  var NEWspeechText;
  NEWspeechText=speechText;
  for(var i=0; i<NEWspeechText.length; i++) {
     if (NEWspeechText.indexOf(".\n")!=-1)           NEWspeechText = NEWspeechText.replace(".\n",". ");
     if (NEWspeechText.indexOf("\n")!=-1)            NEWspeechText = NEWspeechText.replace("\n"," ");
  }


document.getElementById('TTSLangs').value=TTSlang;



  var msg="";
  if(NEWspeechText.length>ttsLIMIT){
	NEWspeechText = NEWspeechText.substring (speechText, ttsLIMIT);
	msg="Warning: The Text To Speech (TTS) service is able to speak up to " + ttsLIMIT + " characters at one time.\n\nThe text will be trimmed!";
  }

if(!document.getElementById("speech")){

 if (speechText == "" || speechText == " " || speechText == "  " || speechText == "   " || speechText == "   " || speechText == "    "){
//alert(TTSlang);
  switch(TTSlang){
  case 'en': NEWspeechText= "Hello, my name is Mike. Welcome to our language portal! I want to introduce a new text to speech service, which means I can read out anything you like. I and my colleagues speak English, Chinese, French, German, Italian, Japanese, Korean, Portuguese, Russian and Spanish. Just type a word or a phrase, or copy and paste any text, and I'll say it back for you. You can also translate your text to any of the available languages, and I will read out the translation. You may want to master a foreign language by practicing the pronunciation. Just repeat after me! It will be fun!"; break;
  case 'fr': NEWspeechText= "Bonjour, je m’appelle Claire. Soyez les bienvenus sur notre service de langue! Je voudrais vous présenter un nouveau service vocale, qui signifie que je peux lire à haute voix tout ce que vous voulez. Mes collègues et moi, nous parlons français, anglais, allemand, espagnol, chinois, coréen, italien, japonais, portugais et russe. Tapez simplement un mot ou une proposition, ou copiez et collez votre texte, et je vais le prononcer pour vous. Vous pouvez traduire votre texte vers la langue disponible, et je vais lire la traduction et le texte original à haute voix. Vous pouvez également maîtriser les langues étrangères en pratiquant votre prononciation. Répétez après moi!"; break;
  case 'de': NEWspeechText= "Hallo, mein Name ist Peter. Willkommen bei unserem Sprachportal! Ich möchte Ihnen einen neuen Text-to-Speech-Service vorstellen, mit dem ich Ihnen einen beliebigen Text vorlesen kann. Meine Kollegen und ich sprechen Englisch, Französisch, Deutsch, Italienisch, Chinesisch, Japanisch, Koreanisch, Portugiesisch, Russisch und Spanisch. Sie tippen Sie einfach ein Wort oder einen Ausdruck ein, oder Sie kopieren einen beliebigen Text und fügen ihn ein. Ich spreche Ihnen das zurück. Sie können Ihren Text auch in eine der verfügbaren Sprachen übersetzen. Dann lese ich Ihnen den Originaltext und die Übersetzung vor. Vielleicht können Sie sogar eine Fremdsprache lernen, wenn Sie die Aussprache üben. Wiederholen Sie einfach, was ich sage! Es wird Ihnen Spaß machen!"; break;
  case 'it': NEWspeechText= "Salve, mi chiamo Umberto. Benvenuti al nostro portale dedicato alle lingue! Vorrei presentarvi un nuovo servizio di conversione da testo a parlato, il che significa che posso leggere ad alta voce qualsiasi cosa vogliate. I miei colleghi ed io parliamo inglese, francese, tedesco, cinese, coreano, giapponese, italiano, portoghese, russo e spagnolo. Basta digitare una parola o una frase, oppure copiare e incollare un qualsiasi testo, e ve lo leggerò. Potrete anche tradurre il vostro testo in qualsiasi lingua tra quelle disponibili, e vi leggerò ad alta voce il testo originale e la sua traduzione. Se volete perfezionare la conoscenza di una lingua straniera facendo esercizio di pronuncia, basta ripetere quello che dico - imparerete divertendovi!"; break;
  case 'pt': NEWspeechText= "Oi, meu nome é Ana. Bem-vindo ao nosso portal de idiomas! Gostaria de apresentar o novo serviço de texto-voz, o que significa que eu posso ler o que você quiser. Eu e meus amigos falamos inglês, francês, alemão, chinês, coreano, italiano, japonês, português, russo e espanhol. Digite uma palavra ou frase, ou copie e cole qualquer texto, e eu falarei para você. Você também pode traduzir o seu texto para qualquer dos idiomas disponíveis e eu irei ler o texto original e a sua tradução. Você pode falar com fluência um idioma estrangeiro praticando a pronúncia. Repita o que eu falo. Será divertido!"; break;
  case 'ru': NEWspeechText= "Здравствуйте! Меня зовут Ольга. Добро пожаловать на наш языковой портал! Я хочу предложить вашему вниманию новые возможности, предоставляемые нашим порталом. Это – голосовой сервис. Я и мои коллеги говорим на русском, английском, французском, немецком, испанском, итальянском, китайском, корейском, португальском и японском языках. Напишите любое слово, или фразу на одном из предлагаемых языков, и Вы услышите, как это звучит. Вы также можете перевести Ваш текст на любой из имеющихся языков, и послушать, как звучит перевод, и его оригинал. А если Вы будете повторять за мной, то Ваше произношение будет становиться лучше и лучше с каждым днем!"; break;
  case 'es': NEWspeechText= "Hola, me llamo Alberto. ¡Bienvenido a nuestro portal de idiomas! Quiero presentarle un nuevo servicio de conversión de texto en voz, mediante el cual puedo leer en voz alta todo aquello que usted desee. Mis colegas y yo leemos inglés, francés, alemán, chino, coreano, italiano, japonés, portugués, ruso y español. Usted tan sólo tiene que teclear una palabra o una frase, o copiar y pegar cualquier texto, y yo lo pronunciaré. También puede traducir el texto a cualquiera de los idiomas disponibles, y yo leeré en voz alta el texto original y su traducción. Usted puede llegar a dominar una lengua extranjera practicando la pronunciación. Tan sólo tiene que repetir lo que yo diga. ¡Será divertido!"; break;
  case 'ja': NEWspeechText= "こんにちは、Miaです。 私たちのランゲージ ポータルへようこそ。 今日はテキストをスピーチに変換するサービスを紹介したいと思います。これがあればどんなテキストも読み上げることができるのです。 私たちは英語、中国語、フランス語、ドイツ語、イタリア語、日本語、韓国語、ポルトガル語、ロシア語、そしてスペイン語に対応しています。 単語やフレーズを入力、またはテキストをコピーしたり貼り付けたりするだけで、私たちがそれを読み上げます。 また入力されたテキストを他の対応言語に翻訳し、私たちがそれを読み上げることもできます。 こうして発音を練習することで、外国語を学ぶことも可能なのです。 私の後に繰り返すだけでいいのですから。 これは楽しいですよ！"; break;
  case 'ko': NEWspeechText= "안녕하세요, 제 이름은 미아입니다. 저희 언어 포털에 방문하신 것을 환영합니다! 원하시는 것이라면 무엇이라도 읽어드릴 수 있는 새로운 텍스트 음성 변환 서비스를 소개해 드리겠습니다. 저와 제 동료들은 영어, 중국어, 프랑스어, 독일어, 이탈리아어, 일본어, 한국어, 포르투갈어, 러시아어, 스페인어를 할 수 있습니다. 단어 또는 구문을 입력하시거나, 텍스트를 복사하여 붙여 넣기만 하시면 제가 읽어드리겠습니다. 텍스트를 지원 언어 중 어떤 언어로도 번역하실 수도 있으며, 제가 번역문을 읽어드리겠습니다. 발음 연습으로 외국어를 마스터하고 싶으신 경우도 있을 것입니다. 저를 따라 하기만 하세요! 재미있을 거에요!";break;
  case 'zh': NEWspeechText= "您好，我是米亞。 歡迎來到我們的語言門戶網站！ 我想為您介紹一種將文本轉為語音的新服務，也就是說我能讀出任何您喜歡的內容。 我和同事們會講英語、漢語、法語、德語、義大利語、日語、韓語、葡萄牙語、俄語和西班牙語。 您只需輸入單詞或短語，或複製和粘貼任何文本，我就能為您讀出來。 您可以將文本譯成任何可用的語言，我們也能讀出譯文。 您也許想透過發音練習來掌握一門外語。 那麼請跟我讀！ 來體驗其中的樂趣吧！";break;
  default: NEWspeechText= "Please enter text: I will read it."; break;
  }
 
 }
                  

if(NEWspeechText == "" && speechText == ""){
 document.getElementById("facefake").style.display="block";
 document.getElementById('faceBTN').actName=getCookie("faceName");
}
else document.getElementById("facefake").style.display="none";


//setCookie("globalTTStext", unescape(NEWspeechText));

window.frames['speechbox'].document.getElementById('text').value = "~@~";

 var submitForm = getNewSubmitForm();
 createNewFormElement(submitForm, "text", NEWspeechText);
 submitForm.action= dmn+"/sockets/box.html";
 submitForm.target= "speechbox";
 submitForm.submit();


 SR_1 = setInterval(function(){ 	
 if(window.frames['speechbox'].document.getElementById('text').value!="~@~") 
   {
    clearInterval(SR_1);

    var frame2 = document.getElementById('speech');
    if(frame2)	frame2.parentNode.removeChild(frame2);

    var die = document.createElement("iframe");
    die.src = "/sockets/tts?speed="+speed+"&url="+ul+"&dir="+TTSlang+"&B=1&ID="+ID+"&chr="+face+"&vc="+voice+"&FA="+hasFlash;

    die.name = "speech";
    die.id="speech";
    die.width="460px";
    die.height="250px";


    die.frameBorder="0";
//    die.zIndex="1000";
    die.scrolling="no";

    var obTTS = parent.frames["TTSText"].document.getElementById('text');

    obTTS.value = speechText;
    //obTTS.style.fontSize = font;
    if(msg!="")alert(msg);
    window.frames["top"].document.getElementById('wait').style.display='block';window.frames["top"].document.getElementById('wait').innerHTML='<b style="color:black">LOADING, PLEASE WAIT ...</b>';
    window.frames['TTSText'].document.form.text.style.height='77px';document.getElementById('TTSText').style.height='80px';

    document.getElementById('speech_container').appendChild(die);
    document.getElementById('closer').style.display='block';

  }},2500);

    }


    change_fontTTS2();
}





function doMailEx(type, frame, el, color, loc)
{

	if(window.kbdShowHide) {
		kbdShowHide (false);
	}

	var query = "?type=" + type;
	if(typeof(mail_title)!='undefined')
		query += "&subj=" + mail_title;
	if(typeof(m_clientName)!='undefined')
		query += "&clientname=" + m_clientName;
		
	if(type == "email") {
		if( m_curFrame != "" ) 
			query +="&ctrl=" + frame + "/"+ el.name;
		else
			query +="&ctrl=" + el.name;
	}
	var url = dmn+"/mailer.asp" 

	if(mailer_type == "htm") {
		url = type + "_form.html"
		if(typeof(RES_LN)!='undefined') {
			url = expandFilebyLang(url, RES_LN);
		}
	}
	else if(mailer_type == "asp") {
	  query += "&do=";
	  	}

	url = mailer_path + url + query;
	var height = 291;
	switch(type)
	{
		case "email":
			height  = 662;
			break;
		case "feedback":
			height  = 690;
			break;
		case "tellafriend":
			height  = 686;
			break;
	}
	url = url + '&sh=' + color+ '&loc=' + loc;
	if(fIE) {
	    var features = "dialogWidth:438px; dialogHeight:" + height +"px;scroll:no;help:no;status:no;";
		var args = { opener: this };
//		dialog = window.showModalDialog (url, args, features);
		dialog = showDialog_ (url, args, features);
//dialog = window.open (url, "SendMail", "width=438,height="+height+",toolbar=no,status=no,menubar=no,directories=no,resizable=yes");

	}
	else {
		dialog = window.open (url, "SendMail", "width=438,height="+height+",toolbar=no,status=no,menubar=no,directories=no,resizable=yes");
	}
	return true;
}


function showDialog_ (url, args, features) {
   var href = "", ref = url, query = "", arr = url.split ("?");
   if (arr.length > 1) {
      ref = arr [0];
      query = arr [1];
   }
   var sep = ref.lastIndexOf ("/");
   if (sep >= 0) {
      href = ref.substr (0, sep + 1);
      ref = ref.substr (sep + 1);
   }
   args = { opener: this, query : "ref=" + ref + (query ? "&" : "") + query};
   href += "dlgframe.asp" + "?ref=" + ref + (query ? "&" : "") + query;
   //return window.showModalDialog (href, args, features);
try {
   return window.showModalDialog (href, args, features);
		  }
	  catch (err){
	    if(browser.ie6SP2){
	      alert(TEXT_MSG_POPUP);
		  }
		}

}


function doBookmark()
{
if(browser.ie)	window.external.AddFavorite(location.href, document.title);
else alert("Please use 'Ctrl' + 'D' buttons to add this web-site to your favorites");
}

function sleep(){
document.getElementById('getcode').style.display='block';
document.getElementById('webmaster').style.display='block';

  var frame2 = document.getElementById('web_master');
  if(frame2)	frame2.parentNode.removeChild(frame2);

    if(!document.getElementById("web_master")){
    var die = document.createElement("iframe");
    die.src = dmn+"/webmasters.asp"
    die.name = "web_master";
    die.id="web_master";
    die.width="98%";
    die.height="440px";
    die.frameBorder="0";
    document.getElementById('webmasterBuilder').appendChild(die);
    }

}

function doCommandTTS (cmd) 
{
  var el = parent.frames["TTSText"].document.getElementById('text'); 
  return doCommandTTSEx(cmd, el);
}

function doCommandTTSEx(cmd, el)
{
if(!el)	return;
   var textCtrl =  el; // form.text;
    if (browser.ie) {
      textCtrl.createTextRange ().execCommand (cmd);
   }
   else {
      switch (cmd) {
         case "Copy":  copyPasteMsg(); m_clipboard = textCtrl.value; break;
         case "Paste": copyPasteMsg(); textCtrl.focus (); if(m_clipboard) textCtrl.value = m_clipboard; break;
         case "Delete":textCtrl.focus (); textCtrl.value = " "; break;
         case "Cut":   copyPasteMsg(); textCtrl.focus (); m_clipboard = textCtrl.value; textCtrl.value = " "; break;
      }
   }
	return true;
}

function copyPasteMsg(){
	if(navigator.userAgent.indexOf("MSIE") == -1) {
		document.getElementById('divalert').style.display = "block";
		document.getElementById('fog').style.display = "block";
	}	
}

function change_fontTTS()
{
 if (current_font_source == "small"){
	current_font_source = "large";
	window.frames["TTSText"].document.getElementById('text').style.fontSize = "20px";
	document.getElementById('font').src = dmn+"/images/white/font-s.gif";
 }else{
	current_font_source="small";
	window.frames["TTSText"].document.getElementById('text').style.fontSize = "15px";
	document.getElementById('font').src = dmn+"/images/white/font-b.gif";
 }
}

function change_fontTTS2()
{
 if (current_font_source == "large"){
	window.frames["TTSText"].document.getElementById('text').style.fontSize = "20px";
	document.getElementById('font').src = dmn+"/images/white/font-s.gif";
 }else{
	window.frames["TTSText"].document.getElementById('text').style.fontSize = "15px";
	document.getElementById('font').src = dmn+"/images/white/font-b.gif";
 }
}



function PUB(url,w,h){
	var openprint;
	openprint=eval("window.open( url ,'', 'toolbar=1,scrollbars=1,statusbar=yes,width='+ w + ',height=' + h + ',resizable=1');" );
	if(!openprint)	alert(TEXT_MSG_POPUP);
}


var myTimer= 0;

function DoubleClickBlock() {
var ob=document.getElementById('ttsgo');
 ob.disabled=true;
 ob.value="Loading";
 myTimer = setTimeout('rel();',5000);
}
function rel(){
 var ob=document.getElementById('ttsgo');
 ob.disabled=false;
 ob.value="Say It";
 clearTimeout(myTimer);
}

function SlideUp(pix){
 if(document.getElementById('adv').style.display!='block' && getCookie('advr')!=1){
  setTimeout('adv()',50);
  for (i=0;i<pix;i++) setTimeout('moveme('+(pix+25-i)+')',i);
  setTimeout('moveme('+(pix+25-i)+')',i);
  setTimeout('moveme2(700)',1000);
 }
}

function moveme2(pos){
 document.getElementById('framer').style.width=(pos+10)+'px';
 document.getElementById('adv').style.width=pos+'px';
 document.getElementById('adv').style.background='#fbe7ef';
 document.getElementById('adv').style.height='27px';
}
function moveme(pos){
 document.getElementById('adv').style.marginTop=pos+'px';
 document.getElementById('adv').style.width=(600-pos)+'px';
}

function adv(){
// if(getCookie("adv")!="yes"){
   document.getElementById('adv').innerHTML='<div align=center><table width="100%"><tr><td width="98%" align="center"><a href="http://imtranslator.net/translate-and-speak/"><div style="font-size:14px;color:#0E75B3;font-weight:600;">We\'ve just launched a new Translate and Speak site. <span style="font-size:14px;color:#BE3B34;font-weight:600;">Check out the new features >></span></div></a></td><td width="2%" align="center"><img style="cursor:pointer;" onClick="var ob=document.getElementById(\'adv\'); ob.style.display=\'none\';ob.style.background=\'white\';setCookie(\'advr\',1);return false;" src="images/close.gif" alt="Close" title="Close" border=0></td></tr></table></div>';
   document.getElementById('adv').style.display='block';
//   setCookie("adv","yes");
// }
}

//MOVER----------------
var ie=document.all;
var nn6=document.getElementById&&!document.all;

var isdrag=false;
var x,y;
var dobj;

function movemouse(e)
{
  if (isdrag)
  {
    dobj.style.left = nn6 ? tx + e.clientX - x : tx + event.clientX - x;
    dobj.style.top  = nn6 ? ty + e.clientY - y : ty + event.clientY - y;
    return false;
  }
}

function selectmouse(e) 
{
  var fobj       = nn6 ? e.target : event.srcElement;
  var topelement = nn6 ? "HTML" : "BODY";

  while (fobj.tagName != topelement && fobj.className != "dragme")
  {
    fobj = nn6 ? fobj.parentNode : fobj.parentElement;
  }

  if (fobj.className=="dragme")
  {
    isdrag = true;
    dobj = fobj;
    tx = parseInt(dobj.style.left+1);
    ty = parseInt(dobj.style.top+1);
    x = nn6 ? e.clientX : event.clientX;
    y = nn6 ? e.clientY : event.clientY;
    document.onmousemove=movemouse;
    return false;
  }
}

document.onmousedown=selectmouse;
document.onmouseup=new Function("isdrag=false");


//MOVER----------------

function INITKBD(){
if(browser.ie)setTimeout('kbdShowHide(false)',10);
else kbdShowHide(false);
GEBI('dragme').style.display='none';
GEBI('dragme').style.marginTop='-50px';
GEBI('dragme').style.marginLeft='4px';
}