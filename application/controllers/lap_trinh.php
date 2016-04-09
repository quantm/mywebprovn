<?php
require_once 'application/controllers/header.php';
require_once 'application/controllers/web_transfer.php';
class lap_trinh extends CI_Controller
{
function web(){
redirect('http://myweb.pro.vn/html');
$header = new header();
$header->programing("Học lập trình");
$this->load->view('lap_trinh/web');
}


//start function
function detail(){
if(!isset($_REQUEST['link'])){
	redirect('/lap_trinh/web/');
}

//echo 'website is building - please come back as soon as we finish programming';
echo '<meta charset="UTF-8"/>Phần này đang trong quá trình xây dựng...mong các bạn thông cảm';
/*
//hightlight selected item
if(isset($_REQUEST['item_selected'])){$data['item_selected']=$_REQUEST['item_selected'];}
else{$data['item_selected']='';}
//end
$header = new header();
$header->index($_REQUEST['item_title'],"","");

$trans= new web_transfer();
$post=$this->input->post();
$url='http://www.w3schools.com/'.$_REQUEST['link'];
$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("www.w3schools.com");
$trans->getcontent($content);
$content=str_replace("Try it Yourself","Run",$content);
$content=str_replace('href','data-href',$content);
preg_match_all('/<div>(.*?)<div style="clear:both;">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key_left);
$data['left_col']=$key_left[0];
$data['link']=$url;
$data['try_it_url']=$post['link'];

$data['csrf_test_name'] = $this->security->get_csrf_hash(); 

$this->load->view('lap_trinh/web_detail',$data);
*/
}
//end function

//start function
function filter($content){
$content=str_replace("Try it Yourself","Run",$content);
$content=str_replace('Exercise','Lesson',$content);
$content=str_replace('colormap.gif','/images/colormap.gif',$content);
$content=str_replace('objectExplained.gif','http://www.w3schools.com/js/objectExplained.gif',$content);
$content=str_replace('pic_chart.jpg','http://www.w3schools.com/browsers/pic_chart.jpg',$content);
$content=str_replace('pic_ie.jpg','http://www.w3schools.com/html/pic_ie.jpg',$content);
$content=str_replace('pic_ie128.jpg','http://www.w3schools.com/browsers/pic_ie128.jpg',$content);
$content=str_replace('pic_chrome128.gif','http://www.w3schools.com/browsers/pic_chrome128.gif',$content);
$content=str_replace('pic_firefox128.png','http://www.w3schools.com/browsers/pic_firefox128.png',$content);
$content=str_replace('pic_safari128.gif','http://www.w3schools.com/browsers/pic_safari128.gif',$content);
$content=str_replace('pic_opera128.jpg','http://www.w3schools.com/browsers/pic_opera128.jpg',$content);
$content=str_replace('pic_iphone.jpg','http://www.w3schools.com/browsers/pic_iphone.jpg',$content);
$content=str_replace('/cert/pic_html_cert_small.gif','/images/avatar-hat-240.png',$content);
$content=str_replace('mov_bbb.mp4','http://www.w3schools.com/html/mov_bbb.mp4',$content);
$content=str_replace('mov_bbb.ogg','http://www.w3schools.com/html/mov_bbb.ogg',$content);
$content=str_replace('pic_video.jpg','http://www.w3schools.com/html/pic_video.jpg',$content);
$content=str_replace('tryhtml5_canvas_coordinates.htm','http://www.w3schools.com/html/tryhtml5_canvas_coordinates.htm',$content);
$content=str_replace('pic_mountain.jpg','http://www.w3schools.com/html/pic_mountain.jpg',$content);
$content=str_replace('pic_graph.png','http://www.w3schools.com/html/pic_graph.png',$content);
$content=str_replace('pic_notepad.jpg','http://www.w3schools.com/html/pic_notepad.jpg',$content);
$content=str_replace('iphone5.png','http://www.w3schools.com/jquerymobile/iphone5.png',$content);
$content=str_replace('icons/','http://www.w3schools.com/jquerymobile/icons/',$content);
$content=str_replace('tryjqmob_touch.htm','http://www.w3schools.com/jquerymobile/tryjqmob_touch.htm',$content);
$content=str_replace('tryjqmob_switch.htm','http://www.w3schools.com/jquerymobile/tryjqmob_switch.htm',$content);
$content=str_replace('tryjqmob_slider.htm','http://www.w3schools.com/jquerymobile/tryjqmob_slider.htm',$content);
$content=str_replace('selectmenu.jpg','http://www.w3schools.com/jquerymobile/selectmenu.jpg',$content);
$content=str_replace('tryjqmob_forms.htm','http://www.w3schools.com/jquerymobile/tryjqmob_forms.htm',$content);
$content=str_replace('tryjqmob_filters_app.htm','http://www.w3schools.com/jquerymobile/tryjqmob_filters_app.htm',$content);
$content=str_replace('tryjqmob_lists.htm','http://www.w3schools.com/jquerymobile/tryjqmob_lists.htm',$content);
$content=str_replace('tryjqmob_lists_app.htm','http://www.w3schools.com/jquerymobile/tryjqmob_lists_app.htm',$content);
$content=str_replace('tryjqmob_collapsible_app.htm','http://www.w3schools.com/jquerymobile/tryjqmob_collapsible_app.htm',$content);
$content=str_replace('tryjqmob_panels_app.htm','http://www.w3schools.com/jquerymobile/tryjqmob_panels_app.htm',$content);
$content=str_replace('tryjqmob_navbars_app.htm','http://www.w3schools.com/jquerymobile/tryjqmob_navbars_app.htm',$content);
$content=str_replace('tryjqmob_toolbars.htm','http://www.w3schools.com/jquerymobile/tryjqmob_toolbars.htm',$content);
$content=str_replace('tryjqmob_default.htm','http://www.w3schools.com/jquerymobile/tryjqmob_default.htm',$content);
$content=str_replace('tryjqmob_popup_app.htm','http://www.w3schools.com/jquerymobile/tryjqmob_popup_app.htm',$content);
$content=str_replace('tryjqmob_icon_app.htm','http://www.w3schools.com/jquerymobile/tryjqmob_icon_app.htm',$content);
$content=str_replace('tryjqmob_button_app.htm','http://www.w3schools.com/jquerymobile/jqmsupport.jpg',$content);
$content=str_replace('<img src="/images/w3cert.gif"','<div class="bottom-ads"',$content);
$content=str_replace('src="selector.gif"','src="http://www.w3schools.com/css/selector.gif"',$content);
$content=str_replace('href','data-href',$content);
$content=str_replace('W3Schools','Website myweb.pro.vn',$content);
$content=str_replace('pic_html5.gif','/images/pic_html5.gif',$content);
$content=str_replace('bs.png','http://www.w3schools.com/bootstrap/bs.png',$content);
$content=str_replace('transforms.gif','http://www.w3schools.com/css/transforms.gif',$content);
$content=str_replace('pic_angular.jpg','http://www.w3schools.com/angular/pic_angular.jpg',$content);
$content=str_replace('pic_appml.jpg','http://www.w3schools.com/appml/pic_appml.jpg',$content);
$content=str_replace('nodetree.gif','http://www.w3schools.com/dom/nodetree.gif',$content);
$content=str_replace('Customers.html','http://www.w3schools.com/website/Customers.html',$content);
$content=str_replace('pic_browsers_pie.png','http://www.w3schools.com/browsers/pic_browsers_pie.png',$content);
$content=str_replace('pic_chrome50.gif','http://www.w3schools.com/browsers/pic_chrome50.gif',$content);
$content=str_replace('pic_firefox50.png','http://www.w3schools.com/browsers/pic_firefox50.png',$content);
$content=str_replace('pic_ie50.png','http://www.w3schools.com/browsers/pic_ie50.png',$content);
$content=str_replace('pic_safari50.gif','http://www.w3schools.com/browsers/pic_safari50.gif',$content);
$content=str_replace('pic_opera50.gif','http://www.w3schools.com/browsers/pic_opera50.gif',$content);
$content=str_replace('http://www.w3schools.com/html/demo_html.asp','http://myweb.pro.vn/',$content);
$content=str_replace('http://www.w3schools.com/stdtheme.css','http://myweb.pro.vn/css/font-awesome.css',$content);
$content=str_replace('http://www.w3schools.com/html/demo_xhtml.asp','http://myweb.pro.vn/toefl/index',$content);
$content=str_replace('http://www.w3schools.com/dom/note.xml','http://myweb.pro.vn/game/',$content);
return $content;
}
//end function

//start function
function detail_2(){
$trans= new web_transfer();
$url=$_REQUEST['link'];
$indexpage='/';
$base='/';
$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content = '';
$trans->start_transfer("www.w3schools.com");
$trans->getcontent($content);
$content=$this->filter($content);
preg_match_all('/<div>(.*?)<div style="clear:both;">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key_left);
$data['left_col']=$key_left[0];
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$this->load->view('lap_trinh/web_detail_2',$data);
}
//end function

//start function
function runIframe() {
$indexpage='/';
$base='/';

//proccess iframe content
$trans_2= new web_transfer();
$url_2='http://www.w3schools.com/'.$_REQUEST['url'];
$content2 ='';
$trans_2->initiate_news ($url_2,$indexpage); 
$trans_2->start_transfer("www.w3schools.com");
$trans_2->getcontent($content2);
$content2=str_replace('W3Schools.com','Learning TOEFL',$content2);
$content2=str_replace('img_logo.gif','http://myweb.pro.vn/images/avatar-hat-240.png',$content2);
$content2=str_replace('http://www.youtube.com/embed/XGSy3_Czz8k','http://www.youtube.com/embed/gBayCA8-92A',$content2);
$content2=str_replace('XGSy3_Czz8k','qSeNdUL1Vx8',$content2);
$content2=str_replace('horse.ogg','http://myweb.pro.vn/music/my_oh_my.mp3',$content2);
$content2=str_replace('horse.mp3','http://myweb.pro.vn/music/1A%20time%20for%20us.mp3',$content2);
$content2=str_replace('http://www.w3schools.com','http://myweb.pro.vn/toefl/index',$content2);
$content2=str_replace('demo_iframe.htm','http://myweb.pro.vn/game/',$content2);
$content2=str_replace("planets.gif","http://www.w3schools.com/html/planets.gif",$content2);
$content2=str_replace("smiley.gif","http://www.w3schools.com/html/smiley.gif",$content2);
$content2=str_replace("programming.gif","http://www.w3schools.com/html/programming.gif",$content2);
$content2=str_replace("pic_mountain.jpg","http://www.w3schools.com/html/pic_mountain.jpg",$content2);
$content2=str_replace("cinqueterre.jpg","http://www.w3schools.com/bootstrap/cinqueterre.jpg",$content2);
$content2=str_replace("Result:","Kết quả",$content2);
$content2=str_replace("Try it Yourself","Chạy thử code",$content2);
$content2=str_replace('<button ','<button class="btn btn-inverse"',$content2);
$content2=str_replace('</body>','<p class="append_footer_iframe"><p/></body>',$content2);
preg_match_all('/<body>(.*?)<p class="append_footer_iframe">/s',$content2,$matches2,PREG_SET_ORDER);
foreach($matches2 as $key_2);
if(isset($_REQUEST['code'])){
	echo $_REQUEST['code'];
}

else {
	echo '<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" /><link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />'.$key_2[0];
}
//end

}
//end function


//start run function
function run(){
if(!isset($_REQUEST['try_it_yourself'])){
	redirect('/lap_trinh/web/');
}


$indexpage='/';
$base='/';


//process textarea content
$trans= new web_transfer();

//start filter url
$filter_url=split('=',$_REQUEST['try_it_yourself']);
$filer_path=split('/',$_REQUEST['try_it_yourself']);

if(count($filter_url) >1){
	$url_replace=$filter_url[1].'.htm';
	$url='http://www.w3schools.com/'.$_REQUEST['try_it_yourself'];
}
else {
$url_replace='';
$url='http://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_default';
}

$new_try_url=$filer_path[0]."/".$url_replace;

$url_to_replace='/lap_trinh/runIframe?url='.$new_try_url;
//end filter url


$trans->initiate_news ($url,$indexpage); 
$trans->converturl($url,$base);
$content ='';
$trans->start_transfer("www.w3schools.com");
$trans->getcontent($content);

//start filter
//$content=str_replace('xsrc','src',$content);
$content=str_replace('onclick="submitTryit()"','',$content);
$content=str_replace('img_logo.gif','http://myweb.pro.vn/images/avatar-hat-240.png',$content);
$content=str_replace('XGSy3_Czz8k','qSeNdUL1Vx8',$content);
$content=str_replace('http://www.youtube.com/embed/XGSy3_Czz8k','http://www.youtube.com/embed/gBayCA8-92A',$content);
$content=str_replace('W3Schools.com','Learning TOEFL',$content);
$content=str_replace('audi.jpeg','http://myweb.pro.vn/images/avatar-hat-240.png',$content);
$content=str_replace('http://www.w3schools.com','http://myweb.pro.vn/toefl/index',$content);
$content=str_replace('bookmark.swf','http://vuigame.vcdn.vn/upload/data/duaxejeep_1354186332.swf',$content);
$content=str_replace('horse.ogg','http://myweb.pro.vn/music/my_oh_my.mp3',$content);
$content=str_replace('horse.mp3','http://myweb.pro.vn/music/1A%20time%20for%20us.mp3',$content);
$content=str_replace('demo_iframe.htm','http://myweb.pro.vn/game/',$content);
$content=str_replace($url_replace,$url_to_replace,$content);
$content=str_replace('Edit This Code:','Viết đoạn code bên dưới: ',$content);
$content=str_replace('See Result','Chạy thử đoạn code này',$content);
$content=str_replace('class="submit"','class="btn btn-primary"',$content);
$content=str_replace('<script>submitTryit()</script>','<div class="footer_append_server"></div>',$content);
preg_match_all('/<body>(.*?)<div class="footer_append_server">/s',$content,$matches,PREG_SET_ORDER);
foreach($matches as $key_1);
//end filter

$data['main']=$key_1[0];
$data['csrf_test_name'] = $this->security->get_csrf_hash(); 
$this->load->view('/lap_trinh/run_code',$data);
}
//end run function




}
?>