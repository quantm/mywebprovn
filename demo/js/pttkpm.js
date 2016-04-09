//
// Copyright (c) 2006 by Conor O'Mahony.
// For enquiries, please email GubuSoft@GubuSoft.com.
// Please keep all copyright notices below.
// Original author of TreeView script is Marcelino Martins.
//
// This document includes the TreeView script.
// The TreeView script can be found at http://www.TreeView.net.
// The script is Copyright (c) 2006 by Conor O'Mahony.
//
// You can find general instructions for this file at www.treeview.net. 
//

// Configures whether the names of the nodes are links (or whether only the icons
// are links).
USETEXTLINKS = 1

// Configures whether the tree is fully open upon loading of the page, or whether
// only the root node is visible.
STARTALLOPEN = 0

// Specify if the images are in a subdirectory;
ICONPATH = 'http://myweb.pro.vn/images/node/'


foldersTree = gFld("<i>MBook Phân tích thiết kế phần mềm</i>", "")
foldersTree.treeID = "Frameset"
foldersTree.iconSrc = ICONPATH + "diffFolder.gif"
foldersTree.iconSrcClosed = ICONPATH + "diffFolder.gif"
aux1 = insFld(foldersTree, gFld("Chương 0: Kỹ thuật lập trình hướng đối tượng", ""))
aux2 = insFld(aux1, gFld("Khởi tạo đối tượng", ""))
insDoc(aux2, gLnk("R", "Từ đối tượng xử lý khác", ""))
insDoc(aux2, gLnk("R", "Từ đối tượng thể hiện", ""))
insDoc(aux2, gLnk("R", "Từ đối tượng lưu trữ", ""))

aux2 = insFld(aux1, gFld("Điều khiển đối tượng", ""))
aux2 = insFld(aux1, gFld("Kế thừa", ""))

//	
// Netscape 4.x needs the HREF to be non-empty to process other events such as open folder,
// hence the need for the op function
//
/*
aux2 = insFld(aux1, gFld("Not linked", "javascript:parent.op()"))
insDoc(aux2, gLnk("R", "New York", ""))
*/
aux1 = insFld(foldersTree, gFld("Chương 1: Mở đầu", "javascript:parent.op()"))
insDoc(aux1, gLnk("R", "Tiếp cận hướng đối tượng", ""))
insDoc(aux1, gLnk("B", "Phân tích và thiết kế hướng đối tượng", ""))
insDoc(aux1, gLnk("T", "Mở đầu lập trình hướng đối tượng", ""))
insDoc(aux1, gLnk("T", "Mở đầu giao diện hướng đối tượng", ""))
/*
insDoc(aux1, gLnk("S", "This frame", "http://www.treeview.net/treemenu/demopics/beenthere_athens.jpg"))
//
// The S target is required.
// The \\\ is needed to escape the ' character for string arguments.
// Also, note that if you define your function in the parent frame, use javascript:parent.myfunc
insDoc(aux1, gLnk("S", "JavaScript link", "javascript:alert(\\\'This JavaScript link simply calls the built-in alert function,\\\\nbut you can define your own function.\\\')"))
*/
aux1 = insFld(foldersTree, gFld("Chương 2: Phân tích yêu cầu hướng đối tượng", "javascript:parent.op()"))
docAux = insDoc(aux1, gLnk("B", "Mở đầu", ""))
docAux = insDoc(aux1, gLnk("B", "Sơ đồ luồng đối tượng", ""))
docAux = insDoc(aux1, gLnk("B", "Sơ đồ lớp đối tượng", ""))
docAux = insDoc(aux1, gLnk("B", "Sơ đồ lớp thành phần", ""))
docAux = insDoc(aux1, gLnk("B", "Tích hợp sơ đồ lớp", ""))

aux1 = insFld(foldersTree, gFld("Chương 3 : Thiết kế phần mềm hướng đối tượng", "javascript:parent.op()"))
docAux = insDoc(aux1, gLnk("B", "Mở đầu", ""))
docAux = insDoc(aux1, gLnk("B", "Thiết kế dữ liệu hướng đối tượng", ""))
docAux = insDoc(aux1, gLnk("B", "Thiết kế giao diện hướng đối tượng", ""))
docAux = insDoc(aux1, gLnk("B", "Màn hình chính", ""))
docAux = insDoc(aux1, gLnk("B", "Màn hình đối tượng", ""))
docAux = insDoc(aux1, gLnk("B", "Thiết kế lớp đối tượng", ""))

/*
aux1 = insFld(foldersTree, gFld("<font color=red>F</font><font color=blue>o</font><font color=pink>r</font><font color=green>m</font><font color=red>a</font><font color=blue>t</font><font color=brown>s</font>", "javascript:parent.op()"))
docAux = insDoc(aux1, gLnk("R", "<div class=specialClass>CSS Class</div>", ""))
*/
$(document)
//start ready function
.ready(function(){
$("td").tooltip({
title:"click để mở MBook",
placement:"left"
})

$(".related li").tooltip({
title:"click để mở MBook",
placement:"left"
})

$("#Header1").remove()
$(".blog-posts").css("margin-top","-13%")
$(".date-header").remove()
var blog_width=($("body").css("width").replace("px","")*9)/10, mbook_height=($("body").css("width").replace("px","")*3.8)/10
blog_width=blog_width+"px"
$("#Blog1").attr("style","width:"+blog_width+";margin-left:-25%")
$("#ctdlgt").attr("style","height:"+mbook_height+"px")
$("#folder1").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/CzoCCyGBV80?autoplay=1&theme=light&color=red&autohide=1")
$("#folder2").show()
$("#folder3").show()
$("#folder4").show()
$("#lesson_title").html("Chương 0: Kỹ thuật lập trình hướng đối tượng"); 
})

$("#folder2").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/D4MQSArNQMg?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Khởi tạo đối tượng"); 
})

$("#item3").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/pPqoBgZefeU?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Từ đối tượng xử lý khác"); 
})
$("#item14").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/kvsI15vg2xY?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Mở đầu"); 
})

$("#folder8").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/4shlBFLpnMg?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Chương 01: Mở đầu"); 
})

$("#item5").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/L79zFbM2O0g?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Từ đối tượng lưu trữ"); 
})

$("#item4").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/VJTTxFyEf3U?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Từ đối tượng thể hiện"); 
})

$("#folder3").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/gBayCA8-92A?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("BigO"); 
})
$("#folder7").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/PSiBjxBaSto?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Kế thừa"); 
})

$("#folder4").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/nKMGWn-_BBM?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Độ phức tạp của thuật toán"); 
})

$("#folder5").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/qKAycP1oUQY?autoplay=1&theme=light&color=red&autohide=1")
$("#folder6").show()
$("#folder12").show()
$("#folder13").show()
$("#lesson_title").html("Các cấu trúc dữ liệu cơ bản"); 
})

$("#folder6").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/94tQld5iUVo?autoplay=1&theme=light&color=red&autohide=1")
$("#item8").show()
$("#item9").show()
$("#item10").show()
$("#item11").show()
$("#lesson_title").html("Điều khiển đối tượng"); 	 
})

$("#item7").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/qKAycP1oUQY?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Giới thiệu danh sách liên kết, Ngăn xếp, Hàng đợi"); 	 
})
$("#item8").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/7F7n9w2CDGs?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Tổ chức danh sách liên kết"); 	 		
})
$("#item9").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/I63482B-C9E?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Tiếp cận hướng đối tượng"); 	 			 
})

$("#item10").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/rb_QcRBkueo?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Phân tích và thiết kế hướng đối tượng"); 	 			 
})

$("#item11").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/H7MDIv1qqzg?autoplay=1&theme=light&color=red&autohide=1")
	$("#lesson_title").html("Mở đầu lập trình hướng đối tượng"); 	 			 		
})
$("#item12").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/pgFr9lZdbEE?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Mở đầu giao diện hướng đối tượng"); 	 			 
})

$("#folder13").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/hDwplmEwMhk?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Chương 2: Phân tích yêu cầu hướng đối tượng"); 	 			 
})
$("#folder14").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/3F-dAtCMpkI?autoplay=1&theme=light&color=red&autohide=1")
$("#item15").show()
$("#item16").show()
$("#item17").show()
$("#folder18").show()
$("#folder22").show()
$("#folder26").show()
$("#lesson_title").html("Cấu trúc cây"); 	 			 
})
$("#item15").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/H19e6O9Iz1A?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Sơ đồ luồng đối tượng"); 	 			 
})

$("#item16").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/wPGPrDwr-og?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Sơ đồ lớp đối tượng"); 	 			 
})

$("#item17").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/Uj5VCVJF58k?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Sơ đồ lớp thành phần"); 	 			 
})
$("#item18").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/q6YHSNvB_Uc?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Tích hợp sơ đồ lớp"); 	 			 
})

$("#folder18").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/Nlb56qQAjp8?autoplay=1&theme=light&color=red&autohide=1")
$("#item19").show()
$("#item20").show()
$("#item21").show()
$("#lesson_title").html("Cây nhị phân-Cây nhị phân tìm kiếm"); 	 			 
})

$("#folder19").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/N-kktL9b3GA?autoplay=1&theme=light&color=red&autohide=1")
$("#item19").show()
$("#item20").show()
$("#item21").show()
$("#lesson_title").html("Chương 3 : Thiết kế phần mềm hướng đối tượng"); 	 			 
})


$("#item19").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/kBxcs2Jyhnc?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Thao tác trên cây nhị phân(Thêm phần tử, Tìm kiếm phần tử)"); 	 			 	
})
$("#item20").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/3aDO-ZK9MiE?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Mở đầu"); 	 			 	
})
$("#item21").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/oODgLTUxSok?autoplay=1&theme=light&color=red&autohide=1")
	$("#lesson_title").html("Thiết kế dữ liệu hướng đối tượng"); 	 			 	
})
$("#item22").click(function(){
$("#item23").show()
$("#item24").show()
$("#item25").show()
$("#lesson_title").html("Thiết kế giao diện hướng đối tượng"); 	 			 	
})
$("#item23").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/dx5eoz2wy-o?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Màn hình chính"); 	 			 	
})
$("#item24").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/7iHD56pzCGc?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Màn hình đối tượng"); 	 			 	
})
$("#item25").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/HeUSXWi2GBc?autoplay=1&theme=light&color=red&autohide=1")
	$("#lesson_title").html("Thiết kế lớp đối tượng"); 			
})
$("#folder26").click(function(){
$("#item27").show()
$("#item28").show()
$("#item29").show() 
$("#item30").show() 
})
$("#item27").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/UQLgfdqKNz8?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Cây AA"); 	 			 	
})
$("#item28").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/qrQ861Dd67g?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Ví dụ tạo cây AA"); 	 			 	
})

$("#item29").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/ym-03WbSn1U?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Thao tác xóa phần tử"); 	 			 	
})

$("#item30").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/xlIaocX-gWs?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Bài tập"); 	 			 	
})
$("#folder31").click(function(){
$("#item32").show()
$("#item33").show()
$("#item34").show()
$("#item35").show()
$("#ctdlgt").attr("src","//www.youtube.com/embed/fZBH2GA2jyM?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Các chiến lược tìm kiếm"); 	 			 	
})

$("#item32").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/fZBH2GA2jyM?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Giới thiệu"); 	 			 	
})
$("#item33").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/vEufrZz5dW0?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Tìm kiếm tuần tự vét cạn"); 	 			 	
})
$("#item34").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/RqvfPaJRRnw?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Tìm kiếm tuần tự lính canh"); 	 			 	
})
$("#item35").click(function(){
$("#ctdlgt").attr("src","//www.youtube.com/embed/TmW4omHjYfc?autoplay=1&theme=light&color=red&autohide=1")
$("#lesson_title").html("Tìm kiếm nhị phân"); 	 			 	
})

})
//end ready function

function call_mbook(id_mbook){
switch(id_mbook)
	{
		case 1:
		clickOnFolder("1")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/CzoCCyGBV80?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Chương 0: Kỹ thuật lập trình hướng đối tượng")
		$("#folder1 a").addClass('hight_light_item')
		break;

		case 2:
		clickOnFolder("1")
		clickOnFolder("2")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/D4MQSArNQMg?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Khởi tạo đối tượng"); 
		$("#folder2 a").addClass('hight_light_item')
		break;

		case 3:
		clickOnFolder("1")
		clickOnFolder("2")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/pPqoBgZefeU?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Khởi tạo đối tượng từ đối tượng xử lý khác");  
		$("#item3 a").addClass('hight_light_item')
		break;

		case 4:
		clickOnFolder("1")
		clickOnFolder("2")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/VJTTxFyEf3U?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Khởi tạo đối tượng từ đối tượng thể hiện"); 
		$("#item4 a").addClass('hight_light_item')
		break;

		case 5:
		clickOnFolder("1")
		clickOnFolder("2")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/L79zFbM2O0g?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Khởi tạo đối tượng từ đối tượng lưu trữ"); 
		$("#item5 a").addClass('hight_light_item')
		break;

		case 6:
		clickOnFolder("1")
		clickOnFolder("2")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/94tQld5iUVo?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Điều khiển đối tượng"); 
		$("#folder6 a").addClass('hight_light_item')
		break;

		case 7:
		clickOnFolder("1")
		clickOnFolder("2")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/PSiBjxBaSto?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Kế thừa");  
		$("#folder7 a").addClass('hight_light_item')
		break;
		
		
		case 9:
		clickOnFolder("8")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/I63482B-C9E?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Tiếp cận hướng đối tượng"); 
		$("#item9 a").addClass('hight_light_item')
		break;

		case 10:
		clickOnFolder("8")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/rb_QcRBkueo?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Phân tích và thiết kế hướng đối tượng");
		$("#item10 a").addClass('hight_light_item')
		break;
		
		case 11:
		clickOnFolder("8")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/H7MDIv1qqzg?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Mở đầu lập trình hướng đối tượng"); 
		$("#item11 a").addClass('hight_light_item')
		break;

		case 12:
		clickOnFolder("8")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/pgFr9lZdbEE?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Mở đầu giao diện hướng đối tượng");
		$("#item12 a").addClass('hight_light_item')
		break;

		case 13:
		clickOnFolder("13")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/hDwplmEwMhk?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Chương 2: Phân tích yêu cầu hướng đối tượng");
		$("#folder13 a").addClass('hight_light_item')
		break;

		case 14:
		clickOnFolder("13")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/kvsI15vg2xY?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Mở đầu phân tích yêu cầu hướng đối tượng "); 
		$("#item14 a").addClass('hight_light_item')
		break;

		case 15:
		clickOnFolder("13")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/H19e6O9Iz1A?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Sơ đồ luồng đối tượng")
		$("#item15 a").addClass('hight_light_item')
		break;

		case 16:
		clickOnFolder("13")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/wPGPrDwr-og?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Sơ đồ lớp đối tượng"); 
		$("#item16 a").addClass('hight_light_item')
		break;

		case 17:
		clickOnFolder("13")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/Uj5VCVJF58k?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Sơ đồ lớp thành phần"); 
		$("#item17 a").addClass('hight_light_item')
		break;

		case 18:
		clickOnFolder("13")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/q6YHSNvB_Uc?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Tích hợp sơ đồ lớp");
		$("#item18 a").addClass('hight_light_item')
		break;

		case 19:
		clickOnFolder("19")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/N-kktL9b3GA?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Chương 3 : Thiết kế phần mềm hướng đối tượng"); 
		$("#folder19 a").addClass('hight_light_item')
		break;
		
		case 20:
		clickOnFolder("19")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/3aDO-ZK9MiE?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Mở đầu thiết kế phần mềm hướng đối tượng");  
		$("#item20 a").addClass('hight_light_item')
		break;
		
		case 21:
		clickOnFolder("19")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/oODgLTUxSok?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Tbiết kế dữ liệu hướng đối tượng"); 
		$("#item21 a").addClass('hight_light_item')
		break;
		
		case 22:
		clickOnFolder("19")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/aKVOjwJl-iE?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Tbiết kế giao diện hướng đối tượng"); 	
		$("#item22 a").addClass('hight_light_item')
		break;
		
		case 23:
		clickOnFolder("19")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/dx5eoz2wy-o?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Màn hình chính");	
		$("#item23 a").addClass('hight_light_item')
		break;
		
		case 24:
		clickOnFolder("19")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/7iHD56pzCGc?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Màn hình đối tượng"); 	 
		$("#item24 a").addClass('hight_light_item')
		break;
		
		case 25:
		clickOnFolder("19")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/HeUSXWi2GBc?autoplay=1&theme=light&color=red&autohide=1")
		$("#lesson_title").html("Thiết kế lớp đối tượng"); 	 
		$("#item25 a").addClass('hight_light_item')
		break;

	}
}
