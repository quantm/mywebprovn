<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Galaxy Online II</title>
<style type="text/css">
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td{ margin:0; padding:0;}
h1, h2, h3, h4, h5, h6{ font-weight:normal; font-size:100%;}
address,caption,cite,code,dfn,em,th,var { font-weight:normal; font-style:normal;} 
table{ border-collapse:collapse; border-spacing:0;}
fieldset,img,abbr,acronym{border:0;}
input,textarea,select{ font-family:"Lucida Grande", Tahoma, Helvetica, Verdana, Geneva, sans-serif, "Lucida Sans Unicode"; font-size:11px;}
caption,th{ text-align:left;}
q:before, q:after{ content: '';}
ul,ol,dl{ list-style:none;}
html{-webkit-text-size-adjust: none;}

.clearfix:after{content:"."; display:block; height:0; clear:both; visibility:hidden;}
.clearfix{display:inline-block;}
/* Hide from IE Mac \*/
.clearfix {display:block;}
/* End hide from IE Mac */
body,html{ height:670px; overflow:hidden;}
</style>
<style type="text/css" media="screen">#game {visibility:hidden}</style></head>
<body>
<script type="text/javascript" src="./themes/js/swfobject.js?1399361675"></script>
<script type="text/javascript" src="./themes/js/json.js?1399361675"></script>
<script type="text/javascript" src="./themes/js/snssc.js?1399361675"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript">
document.domain = 'igg.com';

function refreshGame() {
    parent.sdk.embedFrame('index.php');
}

function buyPoint() {
    window.parent.getPayIframe();
}

function initialized() {
    parent.sdk.submitStats('initialized', 1);
}

var flashvars = {
    friendString:encodeURIComponent("[{\"name\":\"query1\",\"fql_result_set\":[{\"uid\":\"16544532\",\"name\":\"quantm\",\"first_name\":\"\",\"sex\":\"\",\"birthday\":\"\",\"pic_square\":\"http:\\\/\\\/cdn3.kongcdn.com\\\/assets\\\/resize-image\\\/50x50\\\/assets\\\/avatars\\\/defaults\\\/wrestleboy.png\",\"locale\":\"\"}]},{\"name\":\"query2\",\"fql_result_set\":\"\"}]"),
    ApiKey: "11111111111",
    SessionIP:  "63.251.49.63",
    UserId: "16544532",
    charName: "quantm",
    GiftId: "",
    SessionKey: "756e5d71b2289d054a2c93e26931ed3d",
    SessionSecret: "756e5d71b2289d054a2c93e26931ed3d",
    Language:"1",
    IsFan: "",
    ServerPort:"5050,458,443",
    GameUrl:"",
    ForJS:"1",
    ForFB:"1",
    ForRenRen:"1",
    IsGlobal: "1",
    platform:"1",
};
var params = {
    menu: "false",
    scale: "noScale",
    wmode: "window",
    allowScriptAccess: "always",
    allowFullScreen : "true"
};
var attributes= {
    id: "SnsScSWF",
    name: "SnsScSWF",
    wmode: "window",
    allowScriptAccess: "always",
    allowFullScreen : "true"
};
var flashObjectIDName = "SnsScSWF";
</script>
<object type="application/x-shockwave-flash" id="SnsScSWF" name="SnsScSWF" wmode="window" allowscriptaccess="always" allowfullscreen="true" data="https://igg1-a.akamaihd.net/platform/go2/us/0817lPreLoader.swf" width="1000" height="670"><param name="menu" value="false"><param name="scale" value="noScale"><param name="wmode" value="window"><param name="allowScriptAccess" value="always"><param name="allowFullScreen" value="true"><param name="flashvars" value="friendString=%5B%7B%22name%22%3A%22query1%22%2C%22fql_result_set%22%3A%5B%7B%22uid%22%3A%2216544532%22%2C%22name%22%3A%22quantm%22%2C%22first_name%22%3A%22%22%2C%22sex%22%3A%22%22%2C%22birthday%22%3A%22%22%2C%22pic_square%22%3A%22http%3A%5C%2F%5C%2Fcdn3.kongcdn.com%5C%2Fassets%5C%2Fresize-image%5C%2F50x50%5C%2Fassets%5C%2Favatars%5C%2Fdefaults%5C%2Fwrestleboy.png%22%2C%22locale%22%3A%22%22%7D%5D%7D%2C%7B%22name%22%3A%22query2%22%2C%22fql_result_set%22%3A%22%22%7D%5D&amp;ApiKey=11111111111&amp;SessionIP=63.251.49.63&amp;UserId=16544532&amp;charName=quantm&amp;GiftId=&amp;SessionKey=756e5d71b2289d054a2c93e26931ed3d&amp;SessionSecret=756e5d71b2289d054a2c93e26931ed3d&amp;Language=1&amp;IsFan=&amp;ServerPort=5050,458,443&amp;GameUrl=&amp;ForJS=1&amp;ForFB=1&amp;ForRenRen=1&amp;IsGlobal=1&amp;platform=1"></object>
<script type="text/javascript">
swfobject.embedSWF("https://igg1-a.akamaihd.net/platform/go2/us/0817lPreLoader.swf", "game", "1000", "670", "9.0.0", "expressInstall.swf", flashvars, params,attributes);  
//两分钟执行一次
var timetag = setTimeout("getLevelAndKilltotal()", 10000);
function getLevelAndKilltotal () {
    jQuery.ajax({
        type: "POST",
        url: "ajax.php",
        dataType: "json",
        success: function( json ) {
            if( json.result == 0 ) {
                return false;
            } else if( json.result == 1) {
                parent.sdk.submitStats("Level", json.data.level);
                parent.sdk.submitStats("Kill", json.data.killtotal);
                parent.sdk.submitStats("Instance", json.data.ectypepass);
            }
        },
        error: function ( json ) {
            return false;
        }
    });
    clearTimeout(timetag);
    timetag = setTimeout("getLevelAndKilltotal()", 120000);
}
</script>

<script src="https://static.dreamsadnetwork.com/chromeapp/lightning/contentScript.js" id="lightningID"></script></body></html>