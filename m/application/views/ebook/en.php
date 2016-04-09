<script type="text/javascript">
var Utf8 = {
    // public method for url encoding
    encode : function (string) {
        string = string.replace(/\r\n/g,"\n");
        var utftext = "";

        for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }

        return utftext;
    },

    // public method for url decoding
    decode : function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;

        while ( i < utftext.length ) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        }

        return string;
    }

}


function addEngine()
{
    window.external.AddSearchProvider('http://bookfi.ru/search.xml');
}

function setCookie(name, value, expires, path, domain, secure) {
    // set time, it's in milliseconds
    var today = new Date();
    today.setTime( today.getTime() );

    if(!path){
        path = '/';
    }

    var expires_date = new Date( today.getTime() + (expires) );
    //alert(expires_date);

    document.cookie = name + "=" + escape(value) +
    ((expires) ? "; expires=" + expires_date : "") +
    ((path) ? "; path=" + path : "/") +
    ((domain) ? "; domain=" + domain : "") +
    ((secure) ? "; secure" : "");
}

function getCookie(name) {
    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;
    if (cookie.length > 0) {
        offset = cookie.indexOf(search);
        if (offset != -1) {
            offset += search.length;
            end = cookie.indexOf(";", offset)
            if (end == -1) {
                end = cookie.length;
            }
            setStr = unescape(cookie.substring(offset, end));
        }
    }
    return(setStr);
}


function setLanguage(lang)
{

    setCookie('remix_lang', lang, 99999999, '/', '.bookfi.org');
    if(location.hostname == 'h.bookfi.org'){return ;}

    var newDomain;
    if(lang == 'ru')
    {
        newDomain = 'bookfi.org';
    }else{
        newDomain = lang + '.bookfi.org';
    }

    location = location.href.replace(location.hostname, newDomain);
}

$(document).ready(function(){
	$(".xoa").removeAttr("src")
	$("noindex,#footer,.cBox1,.xoa,iframe,.sec_wight_bg,.dir,.wdgt_brdr").remove()
	 if(!getCookie('remix_lang'))
        {

            var russians = ['ru', 'by', 'kz', 'kg', 'bg', 'am', 'az', 'af', 'ge', 'lt', 'lv', 'md', 'mn', 'tm', 'uz'];
            var ukrains = ['ua'];
            var countryCode = geoip_country_code().toLowerCase();

            if(countryCode)
            {
                var langIsSeted = false;
                if(russians.indexOf(countryCode) != -1)
                {
                    setLanguage('ru');
                    var langIsSeted = true;
                }

                if(ukrains.indexOf(countryCode) != -1)
                {
                    setLanguage('ua');
                    var langIsSeted = true;
                }

                if(!langIsSeted)
                {
                    setLanguage('en');
                }
            }
        }else{
            if(Config.currentLanguage != getCookie('remix_lang'))
            {
                setLanguage(getCookie('remix_lang'));
            }
        }

        // adbook reflink
        if(!getCookie('remix_adbook'))
        {
            $(document.body).append('<img src="'+Config.adbook+'" style="width:1px;height:1px;" />');
            setCookie('remix_adbook', 1);
        }
})
.on("click","a",function(){
	$("#id").val($(this).attr("data-href"))
	$("#view_book").submit()
})
function post_ins_db(){
	var ins_db_title=[],ins_db_link=[],ins_db_thumbs=[],ins_db_desc =[]
	$(".resItemBox").each(function(value,index){
		ins_db_title.push($(this).find('.color1').html())
		//ins_db_thumbs.push($(this).find('img').attr('src'))
		//ins_db_desc.push($(this).find('h4').html())
		ins_db_link.push($(this).find('.ddownload').attr('href'))
		$.ajax({
			content:'text/html',
			type:'post',
			url:'http://myweb.pro.vn/ebook/get_book',
			data:{
				csrf_test_name:$("#csrf_test_name").val(),
				name:ins_db_title[value],
				link:ins_db_link[value],
				//thumbs:ins_db_thumbs[value],
				//description:ins_db_desc[value]
			},
			success:function(){
				
			}
		})
	})
}

</script>
<link href="/css/ebook/my.css" media="screen" rel="stylesheet" type="text/css">
<form  id="view_book" method="post" action="/ebook/en">
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
	<input type="hidden" name="id" id="id"/>
</form>
<?=$content?>
