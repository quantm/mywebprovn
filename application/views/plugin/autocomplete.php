<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>jquery.textntags</title>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<base href="http://myweb.pro.vn/">
<link href="https://fonts.googleapis.com/css?family=PT+Sans&amp;subset=latin" rel="stylesheet" type="text/css">
<link href="http://daniel-zahariev.github.io/jquery-textntags/assets/style2.css" rel="stylesheet" type="text/css">
<link href="http://daniel-zahariev.github.io/jquery-textntags/jquery-textntags.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://documentcloud.github.com/underscore/underscore-min.js" type="text/javascript"></script>
</head>

<body data-twttr-rendered="true">
<textarea class="tagged_text_ex2" placeholder="Bình luận, nhắc đến ai đó(@username) hoặc thêm hashtag (#hashtag) " style="height: 37px;"></textarea>
<script src="/js/jquery-textntags.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
   var ajax_request = false;
    var ajax_request_hashtag = false;
    $("textarea.tagged_text_ex2").textntags({
        triggers: {
            '@': {
                uniqueTags   : true,
                syntax       : _.template('![<%= id %>:<%= type %>:<%= title %>]'),
                parser       : /(!)\[(\d+):([\w\s\.\-]+):([\w\s@\.,-\/#!$%\^&\*;:{}=\-_`~()]+)\]/gi,
                parserGroups : {id: 2, type: 3, title: 4}
            },
            '#': {
                uniqueTags   : true,
                syntax       : _.template('#[<%= id %>:<%= type %>:<%= title %>]'),
                parser       : /(#)\[(\d+):([\w\s\.\-]+):([\w\s@\.,-\/#!$%\^&\*;:{}=\-_`~()]+)\]/gi,
                parserGroups : {id: 2, type: 3, title: 4}
            }
        },
        onDataRequest:function (mode, query, triggerChar, callback) {
              if (triggerChar == '@')
              {
                    if(ajax_request) ajax_request.abort();
                    var array_comment = $("textarea.tagged_text_ex2").val().split(" ")
                    for(var k=0;k<array_comment.length;k++)
                    {
                        if(array_comment[k].match(/@/g) && array_comment[k].length <= 50)
                        {
                            var obj_comment = array_comment[k].replace("@","")
                            var json_user='/plugin/get_user_auto_complete?user='+obj_comment
                            ajax_request = $.getJSON(json_user, function(responseData) {
                                auto_responseData = {'@':responseData}
                                query = query.toLowerCase();
                                var found = _.filter(auto_responseData[triggerChar], function(item) { return item.name.toLowerCase().indexOf(query) > -1; });
                                callback.call(this, found.splice(0,5));
                                ajax_request = false;
                            });
                        }
                    }
              }

              if(triggerChar == '#')
              {
                    if(ajax_request_hashtag) ajax_request_hashtag.abort();
                    var array_hash_tag = $("textarea.tagged_text_ex2").val().split(" ")
                    for(var i=0;i<array_hash_tag.length;i++)
                    {
                        if(array_hash_tag[i].match(/#/g) && array_hash_tag[i].length <= 50)
                        {
                            var obj_hash_tag = array_hash_tag[i].replace("#","")
                            var json_hash_tag='/social/gethashtag/?name='+obj_hash_tag
                            ajax_request_hashtag = $.getJSON(json_hash_tag, function(responseData_hashtag) {
                                auto_responseData_hashtag = {'#':responseData_hashtag}
                                query = query.toLowerCase();
                                var found = _.filter(auto_responseData_hashtag[triggerChar], function(item) { return item.name.toLowerCase().indexOf(query) > -1; });
                                callback.call(this, found.splice(0,5));
                                ajax_request_hashtag = false;
                            });
                        }
                    }
              }
        }
    });

});

 
</script>

</body>
</html>
