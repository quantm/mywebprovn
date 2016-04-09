//
//             Copyright (c) 2004, 2005 Smartlink Corp.
//                       All rights reserved.
//

var VK_SPACE = 50, VK_BACK_SPACE = 51, VK_TAB = 52, VK_DELETE = 53, VK_ENTER = 54;
var VK_CAPS_LOCK = 55, VK_LEFT_SHIFT = 56, VK_RIGHT_SHIFT = 57, VK_ALTGR = 58;
var STATE_NORMAL = 0x0, STATE_SHIFT = 0x1, STATE_CAPS = 0x2, STATE_ALTGR = 0x4;

function Keyboard (listener, layout, noKbd) {
   this.listener = listener;
   this.imgLayout = document.getElementById ("layout");
   /*no-layouts*/  /*no-layouts*/
   /*key-layouts*/ /*key-layouts*/
   /*sel-layouts*/ 
       this.layoutsCtrl = new LayoutsCtrl (document.getElementById ("layouts"), this); 
   /*sel-layouts*/
   this.elem = document.getElementById ("virk");
   this.elem.ref = this;
   this.elem.ondragstart = function (e) { return false; }
   if (!noKbd) {
      this.elem.onkeydown = function (e) { this.ref.onKeyDown (e); }
      this.elem.onkeyup   = function (e) { this.ref.onKeyUp (e); }
   }
   this.elem.onmousedown = function (e) { this.ref.onMouseDown (e); }
   this.elem.onmouseup   = function (e) { this.ref.onMouseUp (e); }
   var pos = getElemPos (this.elem);
   this.elem.clientX = pos.x; this.elem.clientY = pos.y;
   
   // Methods
   this.createKbd = this.imgLayout ? createImgKbd : createHtmlKbd;
   this.init = kbdInit;
   this.setLayout = kbdSetLayout;
   this.getLayout = function () { return this.layoutsCtrl.getValue (); };
   this.updateState = kbdUpdateState;
   this.translateKey = kbdTranslateKey;
   this.adjustSize = kbdAdjustSize;
   this.nextLayout = kbdNextLayout;
   
   // Properties
   this.state = STATE_NORMAL;
   this.stateMask = 0;
   this.keys = "";
   this.deadChar = -1;
   this.layout = null;
   
   // Events
   this.onKeyDown   = kbdOnKeyDown;
   this.onKeyUp     = kbdOnKeyUp;
   this.onMouseDown = kbdOnMouseDown;
   this.onMouseUp   = kbdOnMouseUp;
   this.onLayoutChanged = kbdOnLayoutChanged;
   
   this.adjustSize ();
   this.createKbd ();
   this.init ();
   this.setLayout (layout);
}

var KEY_STATES = [
   { key: VK_LEFT_SHIFT,  state: STATE_SHIFT, img: "imgLShift" },
   { key: VK_RIGHT_SHIFT, state: STATE_SHIFT, img: "imgRShift" },
   { key: VK_CAPS_LOCK,   state: STATE_CAPS,  img: "imgCaps"   },
   { key: VK_ALTGR,       state: STATE_ALTGR, img: "imgAltGr"  }
];

var KEY_CHARS = [
   { key: VK_SPACE,      ch: ' '     },
   { key: VK_ENTER,      ch: '\n'    },
   { key: VK_BACK_SPACE, ch: "<bs>"  },
   { key: VK_DELETE,     ch: "<del>" }
];

//------------------------These lines here are to resolve the Firefox problem with keys: ( ;-= ) and (:_+ )
var KEY_SUB = 189, KEY_EQ = 187, KEY_SEM = 186;
if (navigator.gecko)
    KEY_SUB = 109, KEY_EQ = 61,  KEY_SEM = 59;

var KEY_CODES = [
   192, 49, 50, 51, 52, 53, 54, 55, 56, 57, 48, KEY_SUB, KEY_EQ, 220,
         81, 87, 69, 82, 84, 89, 85, 73, 79, 80, 219, 221,
         65, 83, 68, 70, 71, 72, 74, 75, 76, KEY_SEM, 222,
        0, 90, 88, 67, 86, 66, 78, 77, 188, 190, 191, 0, 0,
   32 /*space*/, 8 /*bs*/, 9 /*tab*/, 46 /*del*/, 13 /*enter*/,
   20 /*caps*/, 16 /*lshift*/, 16 /*rshift*/, 18 /*alt*/
];




var KEY_IDS = null;

// 0)tonos 1)/ 2).. 3)^ 4)\ 5)~ 6)dialytika_tonos 7)o 8)v 9)ogonek a). b)u c)// d), e)+
var DEAD_TRANS = [
   ":\u2500\u0384:\u03b1\u03ac:\u03b5\u03ad:\u03b9\u03af:\u03bf\u03cc:\u03b7\u03ae:\u03c5\u03cd:\u03c9\u03ce"
   + ":\u0391\u0386:\u0395\u0388:\u0399\u038a:\u039f\u038c:\u0397\u0389:\u03a5\u038e:\u03a9\u038f",
   ":\u2501\xb4:a\xe1:e\xe9:i\xed:o\xf3:u\xfa:y\xfd:A\xc1:E\xc9:I\xcd:O\xd3:U\xda:Y\xdd"
   + ":c\u0107:C\u0106:l\u013a:L\u0139:n\u0144:N\u0143:r\u0155:R\u0154:s\u015b:S\u015a:z\u017a:Z\u0179",
   ":\u2502\xa8:a\xe4:e\xeb:i\xef:o\xf6:u\xfc:y\xff:A\xc4:E\xcb:I\xcf:O\xd6:U\xdc"
   + ":\u03c5\u03cb:\u03b9\u03ca:\u03a5\u03ab:\u0399\u03aa",
   ":\u2503\x5e:a\xe2:e\xea:i\xee:o\xf4:u\xfb:A\xc2:E\xca:I\xce:O\xd4:U\xdb"
   + ":\u0131\xee:\u0130\xce:g\u011d:G\u011c",
   ":\u2504\x60:a\xe0:e\xe8:i\xec:o\xf2:u\xf9:A\xc0:E\xc8:I\xcc:O\xd2:U\xd9",
   ":\u2505\x7e:a\xe3:n\xf1:o\xf5:A\xc3:N\xd1:O\xd5",
   ":\u2506\u0385:\u03c5\u03b0:\u03b9\u0390",
   ":\u2507\xb0:a\xe5:A\xc5:u\u016f;U\u016e",
   ":\u2508\u02c7:c\u010d:C\u010c:d\u010f:D\u010e:e\u011b:E\u011a:l\u013e:L\u013d:n\u0148:N\u0147"
   + ":r\u0159:R\u0158:s\u0161:S\u0160:t\u0165:T\u0164;z\u017e:Z\u017d",
   ":\u2509\u02db:A\u0104:a\u0105:E\u0118:e\u0119:i\u012f:I\u012e:u\u0173:U\u0172",
   ":\u250a\u02d9:e\u0117:E\u0116:i\u0131:I\u0130:z\u017c:Z\u017b",
   ":\u250b\u02d8:A\u0102:a\u0103:G\u011f:g\u011e",
   ":\u250c\u02dd:O\u0150:o\u0151:U\u0170:u\u0171",
   ":\u250d\xb8:C\xc7:c\xe7:g\u0123:G\u0122:k\u0137:K\u0136:l\u013c:L\u013b"
   + ":n\u0146:N\u0145:r\u0157:R\u0156:S\u015e:s\u015f:T\u0162:t\u0163"
];

function getDeadKeyIndex (ch) {
   var index = ch.charCodeAt (0) - 0x2500;
   return (index >= 0 && index < DEAD_TRANS.length) ? index : -1;
}

var LIGATURES = [ // started from 0xe000
   "\u0638\u064b", "\u0644\u0627", "\u0644\u0625", 
   "\u0644\u0623", "\u0644\u0622", "\u0631\u064a\u0627\u0644",
   "\u094d\u0930", "\u0930\u094d", "\u091c\u094d\u091e", "\u0924\u094d\u0930",
   "\u0915\u094d\u0937", "\u0936\u094d\u0930", "\u0644\u0627\u064b",
];
/*layouts*/
//alert(maxNum);
var LAYOUTS = [
   { id: "ar", name: "Arabic",
     normal: "\u06301234567890-=\\\u0636\u0635\u062b\u0642\u0641\u063a\u0639\u0647\u062e\u062d\u062c\u062f\u0634\u0633\u064a\u0628\u0644\u0627\u062a\u0646\u0645\u0643\u0637 \u0626\u0621\u0624\u0631\ue001\u0649\u0629\u0648\u0632\u0638",
     shift: "\u0651!@#$%^&*)(_+|\u064e\u064b\u064f\u064c\ue002\u0625\u2018\xf7\xd7\u061b<>\u0650\u064d][\ue003\u0623\u0640\u060c/:\" ~\u0652}{\ue004\u0622\u2019,.\u061f" },
   { id: "bl", name: "Baltic",
     normal: "`\xa9\xae\"$\u20ac\xa3\xb2\xb3\xa7\\-=\xb5\u0105\xe6\u0101\xe4\xe5\u0107\u010d\u0119\u0113\xe9\u0117\u0123\u012f\u012b\u0137\u013c\u0142\u0144\u0146\xf3\u014d\xf5\xf6 \xf8\u0157\u015b\u0161\u0173\u016b\xfc\u017a\u017c\u017e",
     shift: "`\xa9\xae\"$\u20ac\xa3\xb2\xb3\xa7\\-=\xb5\u0104\xc6\u0100\xc4\xc5\u0106\u010c\u0118\u0112\xc9\u0116\u0122\u012e\u012a\u0136\u013b\u0141\u0143\u0145\xd3\u014c\xd5\xd6 \xd8\u0156\u015a\u0160\u0172\u016a\xdc\u0179\u017b\u017d" },
   { id: "bu", name: "Bulgarian",
     normal: "`1234567890-.(,\u0443\u0435\u0438\u0448\u0449\u043a\u0441\u0434\u0437\u0446;\u044c\u044f\u0430\u043e\u0436\u0433\u0442\u043d\u0432\u043c\u0447\\\u044e\u0439\u044a\u044d\u0444\u0445\u043f\u0440\u043b\u0431",
     shift: "~!?+\"%=:/_\u2116\u0406V)\u044b\u0423\u0415\u0418\u0428\u0429\u041a\u0421\u0414\u0417\u0426\xa7\u042c\u042f\u0410\u041e\u0416\u0413\u0422\u041d\u0412\u041c\u0427|\u042e\u0419\u042a\u042d\u0424\u0425\u041f\u0420\u041b\u0411",
     caps: "`1234567890-.(,\u0423\u0415\u0418\u0428\u0429\u041a\u0421\u0414\u0417\u0426;\u042c\u042f\u0410\u041e\u0416\u0413\u0422\u041d\u0412\u041c\u0427\\\u042e\u0419\u042a\u042d\u0424\u0425\u041f\u0420\u041b\u0411" },
   { id: "ca", name: "Canadian",
     normal: "#1234567890-=<qwertyuiop\u2503\u2505asdfghjkl;\u2504 zxcvbnm,.\xe9",
     shift: "|!\"/$%?&*()_+>QWERTYUIOP\u2503\u2502ASDFGHJKL:\u2504 ZXCVBNM'.\xc9",
     caps: "#1234567890-=<QWERTYUIOP\u2503\u2505ASDFGHJKL;\u2504 ZXCVBNM,.\xc9" },
   { id: "ce", name: "Centr.Eur.",
     normal: "`\xa9\xae\"$\u20ac\xa3\xb2\xb3\xa7\u0105\xe1\xe2\u0103\xe4\u0107\xe7\u010d\u010f\u0111\xe9\u0119\xeb\u011b\xed\xee\u013a\u013e\u0142\u0144\u0148\xf3\xf4\u0151\xf6\u0159\u015b \u0161\u015f\u0165\u0163\u016f\xfa\u0171\xfc\xfd\u017c",
     shift: "`\xa9\xae\"$\u20ac\xa3\xb2\xb3\xa7\u0104\xc1\xc2\u0102\xc4\u0106\xc7\u010c\u010e\u0110\xc9\u0118\xcb\u011a\xcd\xce\u0139\u013d\u0141\u0143\u0147\xd3\xd4\u0150\xd6\u0158\u015a \u0160\u015e\u0164\u0162\u016e\xda\u0170\xdc\xdd\u017b" },
   { id: "cz", name: "Czech",
     normal: ";+\u011b\u0161\u010d\u0159\u017e\xfd\xe1\xed\xe9=\u2501\u2502qwertzuiop\xfa)asdfghjkl\u016f\xa7\\yxcvbnm,.-",
     shift: "\u25071234567890%\u2508'QWERTZUIOP/(ASDFGHJKL\"!|YXCVBNM?:_",
     caps: ";+\u011a\u0160\u010c\u0158\u017d\xdd\xc1\xcd\xc9=\u2501\u2502QWERTZUIOP\xda)ASDFGHJKL\u016e\xa7\\YXCVBNM,.-",
     altgr: " ~\u2508\u2503\u250b\u2507\u2509\u2504\u250a\u2501\u250c\u2502\u250d\xa4\\|\u20ac       \xf7\xd7 \u0111\u0110[]  \u0142\u0141$\xdf  #&@{} <>*" },
   { id: "dn", name: "Danish",
     normal: "\xbd1234567890+'\u2501qwertyuiop\xe5\u2502asdfghjkl\xe6\xf8<zxcvbnm,.-",
     shift: "\xa7!\"#\xa4%&/()=?*\u2504QWERTYUIOP\xc5\u2503ASDFGHJKL\xc6\xd8>ZXCVBNM;:_",
     caps: "\xbd1234567890+'\u2501QWERTYUIOP\xc5\u2502ASDFGHJKL\xc6\xd8>ZXCVBNM,.-",
     altgr: "  @\xa3$\u20ac {[]} |   \u20ac        \u2505           \\      \u20ac   " },
   { id: "du", name: "Dutch",
     normal: "@1234567890/\xb0<qwertyuiop\u2502*asdfghjkl+\u2501 zxcvbnm,.-",
     shift: "\xa7!\"#$%&_()'?\u2505>QWERTYUIOP\u2503|ASDFGHJKL\xb1\u2504 ZXCVBNM;:=",
     caps: "@1234567890/\xb0<QWERTYUIOP\u2502*ASDFGHJKL+\u2501 ZXCVBNM,.-" },
   { id: "en-DV", name: "English (Dvorak)",
     normal: "`1234567890[]\\',.pyfgcrl/=aoeuidhtns- ;qjkxbmwvz",
     shift: "~!@#$%^&*(){}|\"<>PYFGCRL?+AOEUIDHTNS_ :QJKXBMWVZ",
     caps: "`1234567890[]\\',.PYFGCRL/=AOEUIDHTNS- ;QJKXBMWVZ" },
   { id: "en-or", name: "English (US)",
     normal: "`1234567890-=\\qwertyuiop[]asdfghjkl;'\\zxcvbnm,./",
     shift: "~!@#$%^&*()_+|QWERTYUIOP{}ASDFGHJKL:\"\\ZXCVBNM<>?",
     caps: "`1234567890-=\\QWERTYUIOP[]ASDFGHJKL;'\\ZXCVBNM,./" },
   { id: "et", name: "Estonian",
     normal: "\u25081234567890+'\u2501qwertyuiop\xfc\xf5asdfghjkl\xf6\xe4<zxcvbnm,.-",
     shift: "\u2505!\"#\xa4%&/()=?*\u2504QWERTYUIOP\xdc\xd5ASDFHJKL\xd6\xc4*>ZXCVBNM;:_",
     caps: "\u25081234567890+'\u2501QWERTYUIOP\xdc\xd5ASDFHJKL\xd6\xc4'<ZXCVBNM,.-",
     altgr: "  @\xa3$\u20ac {[]}\\    \u20ac        \xa7  \u0161        |\u017e         " },
   { id: "fa", name: "Farsi (Persian)",
     normal: "\xf71234567890-=\u067e\u0636\u0635\u062b\u0642\u0641\u063a\u0639\u0647\u062e\u062d\u062c\u0686\u0634\u0633\u06cc\u0628\u0644\u0627\u062a\u0646\u0645\u06a9\u06af \u0638\u0637\u0632\u0631\u0630\u062f\u0626\u0648./",
     shift: "\xd7!@#$%^&*)(_+|\u064b\u064c\u064d\ue005\u060c\u061b,][\\}{\u064e\u064f\u0650\u0651\u06c0\u0622\u0640\xab\xbb:\" \u0629\u064a\u0698\u0624\u0625\u0623\u0621<>\u061f" },
   { id: "fr-or", name: "French",
     normal: "\xb2&\xe9\"'(-\xe8_\xe7\xe0)=*azertyuiop\u2503$qsdfghjklm\xf9 wxcvbn,;:!",
     shift: " 1234567890\xb0+\xb5AZERTYUIOP\u2502\xa3QSDFGHJKLM% WXCVBN?./\xa7",
     caps: "\xb21234567890\xb0+\xb5AZERTYUIOP\u2502\xa3QSDFGHJKLM% WXCVBN?./\xa7" },
   { id: "fr-CH", name: "French (Swiss)",
     normal: "\xa71234567890'\u2503$qwertzuiop\xe8\u2502asdfghjkl\xe9\xe0<yxcvbnm,.-",
     shift: "\xb0+\"*\xe7%&/()=?\u2504\xa3QWERTZUIOP\xfc!ASDFGHJKL\xf6\xe4>YXCVBNM;:_",
     caps: "\xa71234567890'\u2503$QWERTZUIOP\xe8\u2502ASDFGHJKL\xe9\xe0<YXCVBNM,.-",
     altgr: " \xa6@#\xb0\xa7\xac|\xa2  \u2501\u2505   \u20ac       []         {}\\          " },
   { id: "fn", name: "Finnish",
     normal: "\xa71234567890+'\u2501qwertyuiop\xe5\u2502asdfghjkl\xf6\xe4<zxcvbnm,.-",
     shift: "\xbd!\"#\xa4%&/()=?*\u2504QWERTYUIOP\xc5\u2503ASDFGHJKL\xd6\xc4>ZXCVBNM;:_",
     caps: "\xa71234567890+'\u2501QWERTYUIOP\xc5\u2502ASDFGHJKL\xd6\xc4<ZXCVBNM,.-",
     altgr: "  @\xa3$\u20ac {[]}\\    \u20ac        \u2503           |      \xb5   " },
   { id: "de-or", name: "German",
     normal: "\u25031234567890\xdf\u2501#qwertzuiop\xfc+asdfghjkl\xf6\xe4 yxcvbnm,.-",
     shift: "\xb0!\"\xa7$%&/()=?\u2504'QWERTZUIOP\xdc*ASDFGHJKL\xd6\xc4 YXCVBNM;:_",
     caps: "\u2502!\"\xa7$%&/()=?\u2501'QWERTZUIOP\xdc*ASDFGHJKL\xd6\xc4 YXCVBNM;:-" },
   { id: "de-CH", name: "German (Swiss)",
     normal: "\xa71234567890'\u2503$qwertzuiop\xfc\u2502asdfghjkl\xf6\xe4<yxcvbnm,.-",
     shift: "\xb0+\"*\xe7%&/()=?\u2504\xe8QWERTZUIOP\xfc!ASDFGHJKL\xe9\xe0>YXCVBNM;:_",
     caps: "\xa71234567890'\u2503$QWERTZUIOP\xdc\u2502ASDFGHJKL\xd6\xc4<YXCVBNM,.-",
     altgr: " \xa6@#\xb0\xa7\xac|\xa2  \u2501\u2505   \u20ac       []         {}\\          " },
   { id: "el", name: "Greek",
     normal: "`1234567890-=\\;\u03c2\u03b5\u03c1\u03c4\u03c5\u03b8\u03b9\u03bf\u03c0[]\u03b1\u03c3\u03b4\u03c6\u03b3\u03b7\u03be\u03ba\u03bb\u2500'<\u03b6\u03c7\u03c8\u03c9\u03b2\u03bd\u03bc,./",
     shift: "~!@#$%^&*()_+|:\u2506\u0395\u03a1\u03a4\u03a5\u0398\u0399\u039f\u03a0{}\u0391\u03a3\u0394\u03a6\u0393\u0397\u039e\u039a\u039b\u2502\">\u0396\u03a7\u03a8\u03a9\u0392\u039d\u039c<>?",
     caps: "`1234567890-=\\;\u03c2\u0395\u03a1\u03a4\u03a5\u0398\u0399\u039f\u03a0[]\u0391\u03a3\u0394\u03a6\u0393\u0397\u039e\u039a\u039b\u2501'<\u0396\u03a7\u03a8\u03a9\u0392\u039d\u039c,./" },
   { id: "he", name: "Hebrew",
     normal: ";1234567890-=\\/'\u05e7\u05e8\u05d0\u05d8\u05d5\u05df\u05dd\u05e4][\u05e9\u05d3\u05d2\u05db\u05e2\u05d9\u05d7\u05dc\u05da\u05e3,\\\u05d6\u05e1\u05d1\u05d4\u05e0\u05de\u05e6\u05ea\u05e5.",
     shift: "~!@#$%^&*()+_|QWERTYUIOP}{ASDFGHJKL:\"|ZXCVBNM><?",
     caps: "\u05b0\u05b1\u05b2\u05b3\u05b4\u05b5\u05b6\u05b7\u05b8\u05c2\u05c1\u05b9\u05bc\u05bb/'\u05e7\u05e8\u05d0\u05d8\u05d5\u05df\u05dd\u05e4][\u05e9\u05d3\u05d2\u05db\u05e2\u05d9\u05d7\u05dc\u05da\u05e3,\\\u05d6\u05e1\u05d1\u05d4\u05e0\u05de\u05e6\u05ea\u05e5." },
   { id: "hi", name: "Hindi",
     normal: " 1234567890-\u0943\u0949\u094c\u0948\u093e\u0940\u0942\u092c\u0939\u0917\u0926\u091c\u0921\u093c\u094b\u0947\u094d\u093f\u0941\u092a\u0930\u0915\u0924\u091a\u091f  \u0902\u092e\u0928\u0935\u0932\u0938,.\u092f",
     shift: " \u090d\u0945\ue006\ue007\ue008\ue009\ue00a\ue00b()\u0903\u090b\u0911\u0914\u0910\u0906\u0908\u090a\u092d\u0919\u0918\u0927\u091d\u0922\u091e\u0913\u090f\u0905\u0907\u0909\u092b\u0931\u0916\u0925\u091b\u0920  \u0901\u0923  \u0933\u0936\u0937\u0964\u095f",
     altgr: "`\u0967\u0968\u0969\u096a\u096b\u096c\u096d\u096e\u096f\u0966-=\\          []         ;'  \u0950     ,./" },
   { id: "hu", name: "Hungarian",
     normal: "0123456789\xf6\xfc\xf3\u0171qwertzuiop\u0151\xfaasdfghjkl\xe9\xe1\xedyxcvbnm,.-",
     shift: "\xa7'\"+!%/=()\xd6\xdc\xd3\u0170QWERTZUIOP\u0150\xdaASDFGHJKL\xc9\xc1\xcdYXCVBNM?:_",
     caps: "0123456789\xd6\xdc\xd3\u0170QWERTZUIOP\u0150\xdaASDFGHJKL\xc9\xc1\xcdYXCVBNM,.-",
     altgr: " ~\u2508\u2503\u2505\u2507\u2509`\u250a\u2501\u250c\u2502\u250d \\|\xc4   \u20ac\xcd  \xf7\xd7\xe4\u0111\u0110[] \xed\u0142\u0141$\xdf<>#&@{}<;>*" },
   { id: "ic", name: "Icelandic",
     normal: "\u25071234567890\xf6-+qwertyuiop\xf0'asdfghjkl\xe6\u2501<zxcvbnm,.\xfe",
     shift: "\u2502!\"#$%&/()=\xd6_*QWERTYUIOP\xd0?ASDFGHJKL\xc6'>ZXCVBNM;:\xde",
     caps: "\u25071234567890\xd6-+QWERTYUIOP\xd0'ASDFGHJKL\xc6\u2501<ZXCVBNM,.\xde",
     altgr: "\xb0    \u20ac {[]}\\  @ \u20ac        ~          \u2503|      \xb5   " },
   { id: "ir", name: "Irish",
     normal: "\u25041234567890-=#qwertyuiop[]asdfghjkl;'\\zxcvbnm,./",
     shift: "\xac!\"\xa3$%^&*()_+~QWERTYUIOP{}ASDFGHJKL:@|ZXCVBNM<>?",
     caps: "\u25041234567890-=#QWERTYUIOP[]ASDFGHJKL;'\\ZXCVBNM,./",
     altgr: "\xa6   \u20ac           \xe9   \xfa\xed\xf3   \xe1         \u2501           " },
   { id: "it", name: "Italian",
     normal: "\\1234567890'\xec\xf9qwertyuiop\xe8+asdfghjkl\xf2\xe0 zxcvbnm,.-",
     shift: "|!\"\xa3$%&/()=?^\xa7QWERTYUIOP\xe9*ASDFGHJKL\xe7\xb0 ZXCVBNM;:_",
     caps: "\\1234567890'\xec\xf9QWERTYUIOP\xe8+ASDFGHJKL\xf2\xe0 ZXCVBNM,.-" },
   { id: "lv", name: "Latvian",
     normal: "\xad1234567890-f\u0137\u016bgjrmvnz\u0113\u010d\u017eh\u0161usildatec\u2501 \u0146b\u012bkpo\u0101,.\u013c",
     shift: "?!\xab\xbb$%/&\xd7()_F\u0136\u016aGJRMVNZ\u0112\u010c\u017dH\u0160USILDATEC\u2507 \u0145B\u012aKPO\u0100;:\u013b",
     caps: "\xad1234567890-F\u0136\u016aGJRMVNZ\u0112\u010c\u017dH\u0160USILDATEC\u2507 \u0145B\u012aKPO\u0100;:\u013b",
     altgr: " \xab  \u20ac\"\u2019 :  -= q\u0123 \u0157wy    []        \u20ac \u2501  x \u0137 \xf5 <> " },
   { id: "lt", name: "Lithuanian",
     normal: "`\u0105\u010d\u0119\u0117\u012f\u0161\u0173\u016b90-\u017e\\qwertyuiop[]asdfghjkl;' zxcvbnm,./",
     shift: "~\u0104\u010c\u0118\u0116\u012e\u0160\u0172\u016a()_\u017d|QWERTYUIOP{}ASDFGHJKL:\" ZXCVBNM<>?",
     caps: "`\u0104\u010c\u0118\u0116\u012e\u0160\u0172\u016a(0_\u017d\\QWERTYUIOP[]ASDFGHJKL;' ZXCVBNM,./",
     altgr: " 1234567890 =   \u20ac         " },
   { id: "no", name: "Norwegian",
     normal: "|1234567890+\\'qwertyuiop\xe5\u2502asdfghjkl\xf8\xe6<zxcvbnm,.-",
     shift: "\xa7!\"#\xa4%&/()=?\u2504*QWERTYUIOP\xc5\u2503ASDFGHJKL\xd8\xc6>ZXCVBNM;:_",
     caps: "|1234567890+\\'QWERTYUIOP\xc5\u2502ASDFGHJKL\xd8\xc6<ZXCVBNM,.-",
     altgr: "  @\xa3$\u20ac {[]} \u2501   \u20ac        \u2505                   \xb5  " },
   { id: "pl", name: "Polish",
     normal: "\u25091234567890+'\xf3qwertzuiop\u017c\u015basdfghjkl\u0142\u0105<yxcvbnm,.-",
     shift: "\u250a!\"#\xa4%&/()=?*\u017aQWERTZUIOP\u0144\u0107ASDFGHJKL\u0141\u0119>YXCVBNM;:_",
     caps: "\u25091234567890+'\xf3QWERTZUIOP\u017c\u015bASDFGHJKL\u0141\u0105<YXCVBNM,.-",
     altgr: " ~\u2508\u2503\u250b\u2507\u2509`\u250a\u2501\u250c\u2502\u250d \\|    \u20ac   \xf7\xd7 \u0111\u0110      $\xdf    @{}\xa7<> " },
   { id: "po", name: "Portuguese",
     normal: "\\1234567890'\xab\u2505qwertyuiop+\u2501asdfghjkl\xe7\xba zxcvbnm,.-",
     shift: "|!\"#$%&/()=?\xbb\u2503QWERTYUIOP*\u2504ASDFGHJKL\xc7\xaa ZXCVBNM;:_",
     caps: "\\1234567890'\xab\u2502QWERTYUIOP+\u2501ASDFGHJKL\xc7\xba ZXCVBNM,.-" },
   { id: "ro", name: "Romanian",
     normal: "]1234567890+'\xe2qwertzuiop\u0103\xeeasdfghjkl\u015f\u0163<yxcvbnm,.-",
     shift: "[!\"#\xa4%&/()=?*\xc2QWERTZUIOP\u0102\xceASDFGHJKL\u015e\u0162>YXCVBNM;:_",
     caps: "]1234567890+'\xc2QWERTZUIOP\u0102\xceASDFGHJKL\u015e\u0162<YXCVBNM,.-",
     altgr: " ~         \u250d  \\|        \xf7\xd7 \u0111\u0110    \u0142\u0141$\xdf    @{}\xa7<> " },
   { id: "ru-or", name: "Russian",
     normal: "\u04511234567890-=\\\u0439\u0446\u0443\u043a\u0435\u043d\u0433\u0448\u0449\u0437\u0445\u044a\u0444\u044b\u0432\u0430\u043f\u0440\u043e\u043b\u0434\u0436\u044d \u044f\u0447\u0441\u043c\u0438\u0442\u044c\u0431\u044e.",
     shift: "\u0401!\"\u2116;%:?*()_+/\u0419\u0426\u0423\u041a\u0415\u041d\u0413\u0428\u0429\u0417\u0425\u042a\u0424\u042b\u0412\u0410\u041f\u0420\u041e\u041b\u0414\u0416\u042d \u042f\u0427\u0421\u041c\u0418\u0422\u042c\u0411\u042e,",
     caps: "\u04011234567890-=\\\u0419\u0426\u0423\u041a\u0415\u041d\u0413\u0428\u0429\u0417\u0425\u042a\u0424\u042b\u0412\u0410\u041f\u0420\u041e\u041b\u0414\u0416\u042d \u042f\u0427\u0421\u041c\u0418\u0422\u042c\u0411\u042e." },
   { id: "ru-TR", name: "Russian TR",
     normal: "\u04511234567890-\u044a\u044d\u044f\u0448\u0435\u0440\u0442\u044b\u0443\u0438\u043e\u043f\u044e\u0449\u0430\u0441\u0434\u0444\u0433\u0447\u0439\u043a\u043b\u044c\u0436 \u0437\u0445\u0446\u0432\u0431\u043d\u043c;.=",
     shift: "\u0401\u2116!/\":\xab\xbb?()_\u042a\u042d\u042f\u0428\u0415\u0420\u0422\u042b\u0423\u0418\u041e\u041f\u042e\u0429\u0410\u0421\u0414\u0424\u0413\u0427\u0419\u041a\u041b\u042c\u0416 \u0417\u0425\u0426\u0412\u0411\u041d\u041c',%",
     caps: "\u04011234567890-\u042a\u042d\u042f\u0428\u0415\u0420\u0422\u042b\u0423\u0418\u041e\u041f\u042e\u0429\u0410\u0421\u0414\u0424\u0413\u0427\u0419\u041a\u041b\u042c\u0416 \u0417\u0425\u0426\u0412\u0411\u041d\u041c;.=" },
   { id: "sl", name: "Slovak",
     normal: ";+\u013e\u0161\u010d\u0165\u017e\xfd\xe1\xed\xe9=\u2501\u0148qwertzuiop\xfa\xe4asdfghjkl\xf4\xa7&yxcvbnm,.-",
     shift: "\u25071234567890%\u2508)QWERTZUIOP/(ASDFGHJKL\"!*YXCVBNM?:_",
     caps: ";+\u013e\u0161\u010d\u0165\u017e\xfd\xe1\xed\xe9=\u2501\u0148QWERTZUIOP\xfa\xe4ASDFGHJKL\xf4\xa7&YXCVBNM,.-",
     altgr: " ~\u2508\u2503\u250b\u2507\u2509`\u250a\u2501\u250c\u2502\u250d\xa4\\|\u20ac      '\xf7\xd7 \u0111\u0110[]  \u0142\u0141$\xdf<>#&@{} <>*" },
   { id: "sn", name: "Slovenian",
     normal: "\u250d1234567890'+\u017eqwertzuiop\u0161\u0111asdfghjkl\u010d\u0107<yxcvbnm,.-",
     shift: "\u2502!\"#$%&/()=?*\u017dQWERTZUIOP\u0160\u0110ASDFGHJKL\u010c\u0106>YXCVBNM;:_",
     caps: "\u250d1234567890'+\u017dQWERTZUIOP\u0160\u0110ASDFGHJKL\u010c\u0106<YXCVBNM,.-",
     altgr: " ~\u2508\u2503\u2505\u2507\u2509`\u250a\u2501\u250c\u2502\u250d \\|\u20ac       \xf7\xd7   []  \u0142\u0141 \xdf    @{}\xa7<>\xa4" },
   { id: "es", name: "Spanish",
     normal: "|1234567890'\xbf}qwertyuiop\u2501+asdfghjkl\xf1{<zxcvbnm,.-",
     shift: "\xb0!\"#$%&/()=?\xa1]QWERTYUIOP\u2502*ASDFGHJKL\xd1[>ZXCVBNM;:_",
     caps: "|1234567890'\xbf}QWERTYUIOP\u2502+ASDFGHJKL\xd1{<ZXCVBNM,.-",
     altgr: "\\|@#\u2505\u20ac\xac         \u20ac       []         {}" },
   { id: "sw", name: "Swedish",
     normal: "\xa71234567890+'\u2501qwertyuiop\xe5\u2502asdfghjkl\xf6\xe4<zxcvbnm,.-",
     shift: "\xbd!\"#\xa4%&/()=?*\u2504QWERTYUIOP\xc5\u2503ASDFGHJKL\xd6\xc4>ZXCVBNM;:_",
     caps: "\xa71234567890+'\u2501QWERTYUIOP\xc5\u2502ASDFGHJKL\xd6\xc4<ZXCVBNM,.-",
     altgr: "  @\xa3$\u20ac {[]}\\    \u20ac        \u2503           |      \xb5   " },
   { id: "tr", name: "Turkish",
     normal: "\"1234567890*-\\qwertyu\u0131op\u011f\xfcasdfghjkl\u015fi<zxcvbnm\xf6\xe7.",
     shift: "\xe9!'\u2503+%&/()=?_;QWERTYUIOP\u011e\xdcASDFGHJKL\u015e\u0130>ZXCVBNM\xd6\xc7:",
     caps: "\xe91234567890-=\\QWERTYUIOP\u011e\xdcASDFGHJKL\u015e\u0130<ZXCVBNM\xd6\xc7." },
   { id: "uk-or", name: "Ukrainian",
     normal: "\u04511234567890-=\u0491\u0439\u0446\u0443\u043a\u0435\u043d\u0433\u0448\u0449\u0437\u0445\u0457\u0444\u0456\u0432\u0430\u043f\u0440\u043e\u043b\u0434\u0436\u0454 \u044f\u0447\u0441\u043c\u0438\u0442\u044c\u0431\u044e.",
     shift: "\u0401!\"\u2116;%:?*()_+\u0490\u0419\u0426\u0423\u041a\u0415\u041d\u0413\u0428\u0429\u0417\u0425\u0407\u0424\u0406\u0412\u0410\u041f\u0420\u041e\u041b\u0414\u0416\u0404 \u042f\u0427\u0421\u041c\u0418\u0422\u042c\u0411\u042e," },
   { id: "uk-TR", name: "Ukrainian TR",
     normal: "\u04511234567890-\u0491\u0454\u044f\u0448\u0435\u0440\u0442\u0456\u0443\u0438\u043e\u043f\u044e\u0449\u0430\u0441\u0434\u0444\u0433\u0447\u0439\u043a\u043b\u044c\u0436 \u0437\u0445\u0446\u0432\u0431\u043d\u043c\u0457.=",
     shift: "\u0401!\"\u2116;%:?*()_\u0490\u0404\u042f\u0428\u0415\u0420\u0422\u0406\u0423\u0418\u041e\u041f\u042e\u0429\u0410\u0421\u0414\u0424\u0413\u0427\u0419\u041a\u041b\u042c\u0416 \u0417\u0425\u0426\u0412\u0411\u041d\u041c\u0407,=" },
   { id: "ur", name: "Urdu",
     normal: "`1234567890-=\\\u0642\u0686\u0639\u0631\u062a\u06cc\u062d\u06d2\u06c1\u067e\u06be\u0637\u0633\u0634\u062f\u0641\u06af\u0627\u062c\u06a9\u0644\u0621\u201e \u06ba\u0635\u062b\u0648\u0628\u0646\u0645\u0679\ue001/",
     shift: "~!@#$%^&*()_+|\u0627\u064f\u063a\u0691\u060c\u0626\u062e\u0650\u06c3\xa3\u064c\u0638\u064f\u061b\u0630\u06d3\u06d4\u0622\u0640\u06c2\ue00c:\u201d \u0698\u0636\u0670\u0624\u0652%\u0632\u0651\u0688\u061f" },
   { id: "ws", name: "Western",
     normal: "`\xbf\xa1\xa2$\u20ac\xa3\xa5\xaa\xba0\xdf\xb5\\\xe0\xe1\xe2\xe3\xe4\xe5\xe6\u0153\xe7\xf0\xf1\xfe\xe8\xe9\xea\xeb\xec\xed\xee\xef\xfd\xff\xdf \xf2\xf3\xf4\xf5\xf6\xf8\xf9\xfa\xfb\xfc",
     shift: "`\xbf\xa1\xa2$\u20ac\xa3\xa5\xaa\xba0\xdf\xb5\\\xc0\xc1\xc2\xc3\xc4\xc5\xc6\u0152\xc7\xd0\xd1\xfe\xc8\xc9\xca\xcb\xcc\xcd\xce\xcf\xdd\u0178\xdf \xd2\xd3\xd4\xd5\xd6\xd8\xd9\xda\xdb\xdc" }
];
/*layouts*/

function kbdSetLayout (layout) {
   if (this.layout && this.layout.id == layout) // not changed?
      return;
      
   for (var i = 0; i != LAYOUTS.length; ++i) {
      if (LAYOUTS [i].id == layout) {
//alert(LAYOUTS [i].id + " - "+ layout);
         this.layout = LAYOUTS [i];
         break;
      }
   }
   if (this.layout == null)  {this.layout = LAYOUTS [0];}
   if (this.layoutsCtrl.getValue () != this.layout.id)
      this.layoutsCtrl.setValue (this.layout.id);
   
   this.deadChar = -1;
   this.updateState ();

}

function kbdOnLayoutChanged (layout) {
   this.setLayout (layout);
   if (this.listener)
      this.listener.onLayoutChanged (layout);
}

function kbdUpdateState (key, value) {
   for (var i = 0; i != KEY_STATES.length; ++i) {
      if (key == KEY_STATES [i].key) {
         var state = KEY_STATES [i].state;
         if (value > 0)
            this.state |= state;
         else if (value == 0)
            this.state &= ~state;
         else
            this.state ^= state;
         break;
      }
   }

   this.showKey (this.imgKey, false);
   this.state &= this.stateMask;
   for (var i = 0; i != KEY_STATES.length; ++i) {
      var state = KEY_STATES [i].state;
      var img = KEY_STATES [i].img;
      if (this [img])
         this.showKey (this [img], this.state & state);
   }

   var state = "normal";
   if (this.layout ["altgr"] && (this.state & STATE_ALTGR))
      state = "altgr";
   else if ((this.state & STATE_SHIFT) && (this.state & STATE_CAPS))
      state = "normal";
   else if (this.state & STATE_CAPS)
      state = (this.layout ["caps"] ? "caps" : "shift");
   else if (this.state & STATE_SHIFT)
      state = "shift";
   if (!this.layout [state])
      state = "normal";
   
   this.keys = this.layout [state];
   this.loadLayout (this.layout, state);
}

function kbdOnKeyUp (e) {
   if (!e)
      e = event;

   this.showKey (this.imgKey, false);
   if (e.type == "mouseup")
      return;
   var key = getKeyIDByCode (e.keyCode);
   if (key <= VK_CAPS_LOCK)
      return;
   // state key was pressed (not VK_CAPS_LOCK)
   this.updateState (key, 0 /* turn off */);
}

function kbdOnKeyDown (e) {
   if (!e)
      e = event;

   var key = -1, isMouse = false;
   if (e.type == "mousedown") {
      isMouse = true;
      if (e.button == 2) // right mouse button?
         return;
      var pos = getEventPos (e, this.elem);
      key = getKeyID (pos.x, pos.y);
   }
   else {

      key = getKeyIDByCode (e.keyCode);
      if (e.keyCode == 16 /* DOM_VK_SHIFT */ && (e.altKey || e.ctrlKey)) {
         this.nextLayout ();
         return;
      }
      if (e.ctrlKey)
         return; // do not insert 'x' on Ctrl+X


   }
   var keyInfo = getKeyInfo (key);
   if (!keyInfo)
      return;

   this.setKey  (this.imgKey, keyInfo);
   this.showKey (this.imgKey, true);

   if (key >= VK_CAPS_LOCK) { // it's a state-key?
      var value = -1; // -1 (change), 0 (off), 1 (on)
      if (key != VK_CAPS_LOCK && !isMouse)
         value = 1;
      this.updateState (key, value);
      this.isMouse = isMouse;
      return;
   }

   var charInfo = null;
   if (key < this.keys.length) {
      charInfo = this.translateKey (key);
   }
   else {
      charInfo = { ch: "", deadChar: -1 };
      for (var i = 0; i < KEY_CHARS.length; ++i) {
         if (KEY_CHARS [i].key == key) {
            charInfo.ch = KEY_CHARS [i].ch;
            break;
         }
      }
   }
   if (charInfo.deadChar != this.deadChar) {
      this.deadChar = charInfo.deadChar;
      this.updateState ();
   }
   if (charInfo.ch && this.listener)
      this.listener.onKeyPress (charInfo.ch);
      
   if ((this.state & (STATE_SHIFT | STATE_ALTGR)) && this.isMouse) {
      this.state &= ~(STATE_SHIFT | STATE_ALTGR);
      this.updateState ();
   }
}

function getElemPos (elem) {
   var pos = { x: 0, y: 0 };
   for (var parent = elem; parent; parent = parent.offsetParent) {
      pos.x += parent.offsetLeft;
      pos.y += parent.offsetTop;
   }
   return pos;
}

function getEventPos (e, ctrl) {
   return { x: e.clientX - ctrl.clientX, y: e.clientY - ctrl.clientY };
}

function kbdOnMouseDown (e) {
   if (navigator.gecko)
      eventPreventDefault (e);
   var target = getEventTarget (e ? e : event);
   if (target && target != this.layoutsCtrl.ctrl
       && target.parentNode != this.layoutsCtrl.ctrl)
      this.onKeyDown (e);
}

function kbdOnMouseUp (e) {
   if (navigator.gecko)
      eventPreventDefault ();
   var target = getEventTarget (e ? e : event);
   if (target != this.layoutsCtrl.ctrl)
      this.onKeyUp (e);
}
/*keys*/
var KEYS = [
   { key: 0, c: 14, src: "btn", x: 0, y: 0, width: 280, height: 20 },
   { key: VK_BACK_SPACE, c: 1, src: "bs", x: 280, y: 0, width: 20, height: 20, text: "<-" },
   { key: VK_TAB, c: 1, src: "tab", x: 0, y: 20, width: 30, height: 20, text: "Tab" },
   { key: 14, c: 12, src: "btn", x: 30, y: 20, width: 240, height: 20 },
   { key: VK_DELETE, c: 1, src: "del", x: 270, y: 20, width: 30, height: 20, text: "Del" },
   { key: VK_CAPS_LOCK, c: 1, src: "caps", x: 0, y: 40, width: 37, height: 20, text: "Caps" },
   { key: 26, c: 11, src: "btn", x: 37, y: 40, width: 220, height: 20 },
   { key: VK_ENTER, c: 1, src: "enter", x: 257, y: 40, width: 43, height: 20, text: "Enter" },
   { key: VK_LEFT_SHIFT, c: 1, src: "lshift", x: 0, y: 60, width: 46, height: 20, text: "Shift" },
   { key: 38, c: 10, src: "btn", x: 46, y: 60, width: 200, height: 20 },
   { key: VK_RIGHT_SHIFT, c: 1, src: "rshift", x: 246, y: 60, width: 54, height: 20, text: "Shift" },
   { key: VK_SPACE, c: 1, src: "space", x: 82, y: 80, width: 113, height: 20 }
];
/*keys*/



function getKeyID (x, y) {
   var keyID = -1;
   for (var i = 0; i < KEYS.length; ++i) {
      var key = KEYS [i];
      if (x >= key.x && x < key.x + key.width &&
          y >= key.y && y < key.y + key.height) {
         keyID = key.key;
         if (key.c > 1)
            keyID += Math.floor ((x - key.x) * key.c / key.width);
         break;
      }
   }
   return keyID;
}

function getKeyInfo (keyID) {
   if (keyID < 0 || keyID > VK_ALTGR)
      return null;
   
   for (var i = 0; i < KEYS.length; ++i) {
      var key = KEYS [i];
      if (keyID >= key.key && keyID < key.key + key.c && key.src) {
         var keyInfo = { id: keyID, src: key.src, x: key.x, y: key.y,
                         width: key.width, height: key.height, text: key.text };
         keyInfo.width /= key.c;
         keyInfo.x += (keyID - key.key) * keyInfo.width;
         keyInfo.src =  keyInfo.src + ".gif";
         return keyInfo;
      }
   }
   return null;
}

function getKeyIDByCode (keyCode) {
   if (!KEY_IDS) {
      var keyIDs = new Array (250);
      for (var i = 0; i < keyIDs.length; ++i)
         keyIDs [i] = -1;
      for (var keyID = 0; keyID < KEY_CODES.length; ++keyID)
         keyIDs [KEY_CODES [keyID]] = keyID;
      KEY_IDS = keyIDs;
   }

   if (keyCode < 0 || keyCode >= KEY_IDS.length)
      return -1;
   return KEY_IDS [keyCode];
}

function kbdInit () {
   this.imgKey = this.createKey (null);

   for (var i = 0; i != KEY_STATES.length; ++i) {
      var keyInfo = getKeyInfo (KEY_STATES [i].key);
      if (!keyInfo)
         continue;
      this.stateMask |= KEY_STATES [i].state;
      this [KEY_STATES [i].img] = this.createKey (keyInfo);
   }
}

function kbdTranslateKey (key) {

   var charInfo = { ch : "", deadChar: -1 };
   var ch = this.keys.charAt (key);
   if (ch == ' ')
      return charInfo;

   var deadChar = getDeadKeyIndex (ch);
   if (this.deadChar >= 0) {
      if (deadChar >= 0)
         ch = DEAD_TRANS [deadChar].charAt (2);
      var i = DEAD_TRANS [this.deadChar].indexOf (":" + ch);
      if (i >= 0)
         ch = DEAD_TRANS [this.deadChar].charAt (i + 2);
      if (i <= 0)
         ch = DEAD_TRANS [this.deadChar].charAt (2) + ch;
   }
   else {
      var chCode = ch.charCodeAt (0);
      if (deadChar >= 0) {
         charInfo.deadChar = deadChar; ch = "";
      }
      if (chCode >= 0xe000 && chCode < 0xe000 + LIGATURES.length)
         ch = LIGATURES [chCode - 0xe000];
   }
   charInfo.ch = ch;
   return charInfo;
 
}

function kbdNextLayout () {
   var value = this.layoutsCtrl.getValue (), i = 0;
   for (i = 0; i < LAYOUTS.length; ++i) {
      if (LAYOUTS [i].id == value)
         break;
   }
   value = LAYOUTS [(i + 1) % LAYOUTS.length].id;
   this.layoutsCtrl.setValue (value);
   this.onLayoutChanged (value);
}

function kbdAdjustSize () {
   var cx = this.elem.offsetWidth;
   var cy = this.elem.offsetHeight;
   if (!cx || !cy)
      return;
   if (window.innerWidth) {
      cx -= window.innerWidth;
      cy -= window.innerHeight;
   }
   else if (document.body.clientWidth) {
      cx -= document.body.clientWidth;
      cy -= document.body.clientHeight;
   }
   else
      return;
   if (cx > 0 || cy > 0) {
      // alert ("cx = " + cx + "; cy = " + cy);
      cx = Math.max (cx, 0);
      cy = Math.max (cy, 0);
      if (window.dialogWidth) { // it's dialog?
         window.dialogWidth  = (parseInt (window.dialogWidth)  + cx) + "px";
         window.dialogHeight = (parseInt (window.dialogHeight) + cy) + "px";
      }
      else {
         window.resizeBy (cx, cy);
      }
   }
}


function setCookie(name, value, expires, path, domain, secure)
{
    document.cookie= name + "=" + escape(value) +
        ((expires) ? "; expires=" + expires.toGMTString() : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}



//////////////////////////////////////////////////////////////////////////////
//
// LayoutsCtrl
//

/*sel-layouts*/
function LayoutsCtrl (ctrl, listener) {


   if (!ctrl || !ctrl.options)
      return;
      
   this.ctrl     = ctrl;
   this.ctrl.focus();
   this.listener = listener;
   this.getValue = function () { return this.ctrl.value; }
   this.setValue = function (value) { listSetValue (this.ctrl, value); }
   ctrl.listener = listener;
   ctrl.onchange = function () { 
      this.listener && this.listener.onLayoutChanged (this.value);
      this.parentNode.focus && this.parentNode.focus ();
      setCookie("vk-layout",this.options[this.selectedIndex].value);
   }
   
   var options = ctrl.options;
   for (var i = 0; i != LAYOUTS.length; ++i) {
      options [i] = new Option;
      options [i].value = LAYOUTS [i].id;
      options [i].text  = LAYOUTS [i].name;
   }

}

function listSetValue (ctrl, value) {
   // "ctrl.value = value" doesn't work in safari and ie.mac
   var options = ctrl.options;
   for (var i = options.length - 1; i >= 0; --i) {
      if (options [i].value == value)
         break;
   }
   ctrl.selectedIndex = i;
}
/*sel-layouts*/

/*key-layouts*/
/*key-layouts*/

/*no-layouts*/
/*no-layouts*/

//////////////////////////////////////////////////////////////////////////////
//
// Keyboard
//

/*img-kbd*/
function createImgKbd () {
   this.loadLayout = ImgKbd_loadLayout;
   this.createKey  = ImgKbd_createKey;
   this.setKey     = ImgKbd_setKey;
   this.showKey    = function (key, show) { key.style.display = show ? "block" : "none" }
}

function ImgKbd_loadLayout (layout, state) {
   var src = layout.id + "/" + state;
   if (this.deadChar >= 0)
      src += "-" + this.deadChar;
   src += ".gif";
   if (this.imgLayout.src != src)
      this.imgLayout.src = src;
}

function ImgKbd_createKey (keyInfo) {
   var key = document.createElement ("IMG");
   key.style.position = "absolute";
   key.style.display = "none";
   keyInfo && this.setKey (key, keyInfo);
   this.elem.appendChild (key);
   return key;
}

function ImgKbd_setKey (key, keyInfo) {
   key.src        = keyInfo.src;
   key.style.left = keyInfo.x;
   key.style.top  = keyInfo.y;
   key.width      = keyInfo.width;
   key.height     = keyInfo.height;
}
/*img-kbd*/

/*html-kbd*/
/*html-kbd*/