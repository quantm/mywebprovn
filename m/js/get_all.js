function get_film(){
var ins_db_title=[],ins_db_link=[],ins_db_thumbs=[],ins_db_desc =[]
$(".list-film .inner").each(function(value,index){
ins_db_title.push($(this).find('.name').find('span').attr('title'))
ins_db_thumbs.push($(this).find('img').attr('src'))
ins_db_desc.push("Xem phim HD online")
ins_db_link.push($(this).find('.name').find('span').attr('href'))

$.ajax({
content:'text/html',
type:'post',
url:'/video/get_film',
data:{
csrf_test_name:$("#csrf_test_name").val(),
name:ins_db_title[value],
fetch_id:ins_db_link[value],
thumbs:ins_db_thumbs[value],
description:ins_db_desc[value]
},
success:function(){

}
})

})
}