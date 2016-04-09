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


foldersTree = gFld("<i>Cấu trúc dữ liệu và giải thuật</i>", "")
  foldersTree.treeID = "Frameset"
  foldersTree.iconSrc = ICONPATH + "mbook_icon.jpg"
  foldersTree.iconSrcClosed = ICONPATH + "mbook_icon.jpg"
  aux1 = insFld(foldersTree, gFld("Bài 01: Các khái niệm cơ bản", ""))

    aux2 = insFld(aux1, gFld("Khái niệm", ""))
/*
	  insDoc(aux2, gLnk("R", "Boston", "http://www.treeview.net/treemenu/demopics/beenthere_boston.jpg"))
      insDoc(aux2, gLnk("R", "New York", ""))
      insDoc(aux2, gLnk("R", "Washington", "http://www.treeview.net/treemenu/demopics/beenthere_washington.jpg"))
*/
    aux2 = insFld(aux1, gFld("BigO", ""))
	aux2 = insFld(aux1, gFld("Độ phức tạp của thuật toán", ""))
 /*     
	  insDoc(aux2, gLnk("R", "Edinburgh", ""))
      insDoc(aux2, gLnk("R", "London", "http://www.treeview.net/treemenu/demopics/beenthere_london.jpg"))
      insDoc(aux2, gLnk("R", "Munich", "http://www.treeview.net/treemenu/demopics/beenthere_munich.jpg"))
      insDoc(aux2, gLnk("R", "Athens", "http://www.treeview.net/treemenu/demopics/beenthere_athens.jpg"))
      insDoc(aux2, gLnk("R", "Florence", "http://www.treeview.net/treemenu/demopics/beenthere_florence.jpg"))    
	  //
      // The next three links have their http protocol appended by the script
      //
      insDoc(aux2, gLnk("Rh", "Pisa", "www.treeview.net/treemenu/demopics/beenthere_pisa.jpg"))
      insDoc(aux2, gLnk("Rh", "Rome", "www.treeview.net/treemenu/demopics/beenthere_rome.jpg"))
      insDoc(aux2, gLnk("Rh", "Lisboa", "www.treeview.net/treemenu/demopics/beenthere_lisbon.jpg"))
 */ 
  aux1 = insFld(foldersTree, gFld("	Bài 02: Các cấu trúc dữ liệu cơ bản", "javascript:parent.op()"))

    aux2 = insFld(aux1, gFld("Danh sách liên kết", ""))
      insDoc(aux2, gLnk("R", "Giới thiệu", ""))
	  insDoc(aux2, gLnk("R", "Tổ chức danh sách liên kết", ""))
	  insDoc(aux2, gLnk("R", "Các thao tác trên danh sách liên kết", ""))
	  insDoc(aux2, gLnk("R", "Tổng kết", ""))
	  insDoc(aux2, gLnk("R", "Bài tập", ""))

    aux2 = insFld(aux1, gFld("Ngăn xếp (Stack)", ""))
    aux2 = insFld(aux1, gFld("Hàng đợi (Queue)", ""))

    //
    // Netscape 4.x needs the HREF to be non-empty to process other events such as open folder,
    // hence the need for the op function
    //
	/*
    aux2 = insFld(aux1, gFld("Not linked", "javascript:parent.op()"))
      insDoc(aux2, gLnk("R", "New York", ""))
    */
  aux1 = insFld(foldersTree, gFld("Bài 03: Cấu trúc cây", "javascript:parent.op()"))
      insDoc(aux1, gLnk("R", "Khái niệm", ""))
      insDoc(aux1, gLnk("B", "Phép duyệt cây", ""))
      insDoc(aux1, gLnk("T", "Biểu diễn cây", ""))
	      aux2 = insFld(aux1, gFld("Cây nhị phân-Cây nhị phân tìm kiếm", ""))
		        insDoc(aux2, gLnk("R", "Thao tác Thêm phần tử-Tìm kiếm", ""))
		        insDoc(aux2, gLnk("R", "Thao tác Xóa phần tử-Sắp xếp-Duyệt cây", ""))
		        insDoc(aux2, gLnk("R", "Thao tác Quay trái-Quay phải", ""))
          aux2 = insFld(aux1, gFld("Cây AVL", ""))
		        insDoc(aux2, gLnk("R", "Định nghĩa cây AVL", ""))
		        insDoc(aux2, gLnk("R", "Xử lý các trường hợp mất cân bằng", ""))
		        insDoc(aux2, gLnk("R", "Các thao tác trên cây AVL", ""))
          aux2 = insFld(aux1, gFld("Cây AA", ""))
		        insDoc(aux2, gLnk("R", "Khái niệm và các thao tác trên cây AA", ""))
		        insDoc(aux2, gLnk("R", "Ví dụ tạo cây AA", ""))
		        insDoc(aux2, gLnk("R", "Thao tác xóa phần tử", ""))

        insDoc(aux1, gLnk("R", "Bài tập", ""))
      /*
	  insDoc(aux1, gLnk("S", "This frame", "http://www.treeview.net/treemenu/demopics/beenthere_athens.jpg"))
      //
      // The S target is required.
      // The \\\ is needed to escape the ' character for string arguments.
      // Also, note that if you define your function in the parent frame, use javascript:parent.myfunc
      insDoc(aux1, gLnk("S", "JavaScript link", "javascript:alert(\\\'This JavaScript link simply calls the built-in alert function,\\\\nbut you can define your own function.\\\')"))
      */
  aux1 = insFld(foldersTree, gFld("Bài 04: Các chiến lược tìm kiếm", "javascript:parent.op()"))
    docAux = insDoc(aux1, gLnk("B", "Giới thiệu", ""))
    docAux = insDoc(aux1, gLnk("B", "Tìm kiếm tuần tự-Vét cạn", ""))
    docAux = insDoc(aux1, gLnk("B", "Tìm kiếm tuần tự- Lính canh", ""))
    docAux = insDoc(aux1, gLnk("B", "Tìm kiếm nhị phân", ""))
  /*
  aux1 = insFld(foldersTree, gFld("<font color=red>F</font><font color=blue>o</font><font color=pink>r</font><font color=green>m</font><font color=red>a</font><font color=blue>t</font><font color=brown>s</font>", "javascript:parent.op()"))
    docAux = insDoc(aux1, gLnk("R", "<div class=specialClass>CSS Class</div>", ""))
  */

$(document)
//start ready function
.ready(function(){
$("td").tooltip({
title:"click để mở MBook",
placement:"top"
})

$(".related li").tooltip({
title:"click để mở MBook",
placement:"top"
})

$("#Header1").remove()
$(".blog-posts").css("margin-top","-13%")
$(".date-header").remove()
var blog_width=($("body").css("width").replace("px","")*9)/10, mbook_height=($("body").css("width").replace("px","")*3.5)/10
blog_width=blog_width+"px"
$("#Blog1").attr("style","width:"+blog_width+";margin-left:-25%")
$("#ctdlgt").attr("style","height:"+mbook_height+"px")
$("#folder1").click(function(){
 $("#ctdlgt").attr("src","//www.youtube.com/embed/cZlXhfbpTbY?autoplay=1&theme=dark&color=red&autohide=1")
 $("#folder2").show()
 $("#folder3").show()
 $("#folder4").show()
 $("#lesson_title").html("Bài 01: Các khái niệm cơ bản"); 
})

$("#folder2").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/cZlXhfbpTbY?autoplay=1&theme=dark&color=red&autohide=1")
     $("#lesson_title").html("Các khái niệm cơ bản"); 
})

$("#folder3").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/gBayCA8-92A?autoplay=1&theme=dark&color=red&autohide=1")
    $("#lesson_title").html("BigO"); 
})
$("#folder4").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/nKMGWn-_BBM?autoplay=1&theme=dark&color=red&autohide=1")
	$("#lesson_title").html("Độ phức tạp của thuật toán"); 
})

$("#folder5").click(function(){
 $("#ctdlgt").attr("src","//www.youtube.com/embed/qKAycP1oUQY?autoplay=1&theme=dark&color=red&autohide=1")
 $("#lesson_title").html("Các cấu trúc dữ liệu cơ bản")
 $("#folder6").show()
 $("#folder12").show()
 $("#folder13").show()
})

$("#folder6").click(function(){
 $("#ctdlgt").attr("src","//www.youtube.com/embed/qKAycP1oUQY?autoplay=1&theme=dark&color=red&autohide=1")
 $("#item8").show()
 $("#item9").show()
 $("#item10").show()
 $("#item11").show()
 $("#lesson_title").html("Danh sách liên kết"); 	 
})

$("#item7").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/qKAycP1oUQY?autoplay=1&theme=dark&color=red&autohide=1")
    $("#lesson_title").html("Giới thiệu danh sách liên kết, Ngăn xếp, Hàng đợi"); 	 
})
$("#item8").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/7F7n9w2CDGs?autoplay=1&theme=dark&color=red&autohide=1")
    $("#lesson_title").html("Tổ chức danh sách liên kết"); 	 		
})
$("#item9").click(function(){
	 $("#ctdlgt").attr("src","//www.youtube.com/embed/iusDWjht-Ig?autoplay=1&theme=dark&color=red&autohide=1")
	 $("#lesson_title").html("Các thao tác trên danh sách liên kết"); 	 			 
})

$("#item10").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/eOFKOKwzffE?autoplay=1&theme=dark&color=red&autohide=1")
    $("#lesson_title").html("Tổng kết"); 	 			 
})

$("#item11").click(function(){$("#ctdlgt").attr("src","//www.youtube.com/embed/QmO24_WRo60?autoplay=1&theme=dark&color=red&autohide=1")})
$("#folder12").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/QrIVH12q1u4?autoplay=1&theme=dark&color=red&autohide=1")
	$("#lesson_title").html("Ngăn xếp (Stack)"); 	 			 
})

$("#folder13").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/hH7KTyxXrE8?autoplay=1&theme=dark&color=red&autohide=1")
	$("#lesson_title").html("Hàng đợi (Queue)"); 	 			 
})
$("#folder14").click(function(){
	 $("#ctdlgt").attr("src","//www.youtube.com/embed/3F-dAtCMpkI?autoplay=1&theme=dark&color=red&autohide=1")
	 $("#item15").show()
	 $("#item16").show()
	 $("#item17").show()
	 $("#folder18").show()
	 $("#folder22").show()
	 $("#folder26").show()
	 $("#lesson_title").html("Cấu trúc cây"); 	 			 
})
$("#item15").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/3F-dAtCMpkI?autoplay=1&theme=dark&color=red&autohide=1")
    $("#lesson_title").html("Khái niệm"); 	 			 
})

$("#item16").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/3F-dAtCMpkI?autoplay=1&theme=dark&color=red&autohide=1")
    $("#lesson_title").html("Phép duyệt cây"); 	 			 
})

$("#item17").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/IqVJEt0G3fg?autoplay=1&theme=dark&color=red&autohide=1")
	$("#lesson_title").html("Biểu diễn cây"); 	 			 
})

$("#folder18").click(function(){
 $("#ctdlgt").attr("src","//www.youtube.com/embed/Nlb56qQAjp8?autoplay=1&theme=dark&color=red&autohide=1")
 $("#item19").show()
 $("#item20").show()
 $("#item21").show()
 $("#lesson_title").html("Cây nhị phân-Cây nhị phân tìm kiếm"); 	 			 
})

$("#item19").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/kBxcs2Jyhnc?autoplay=1&theme=dark&color=red&autohide=1")
	$("#lesson_title").html("Thao tác trên cây nhị phân(Thêm phần tử, Tìm kiếm phần tử)"); 	 			 	
})
$("#item20").click(function(){
	 $("#ctdlgt").attr("src","//www.youtube.com/embed/s15OaqAYf2I?autoplay=1&theme=dark&color=red&autohide=1")
	 $("#lesson_title").html("Thao tác trên cây nhị phân(Xóa phần tử, Sắp xếp phần tử, Duyệt cây)"); 	 			 	
})
$("#item21").click(function(){$("#ctdlgt").attr("src","//www.youtube.com/embed/6dZMb-PZgKw?autoplay=1&theme=dark&color=red&autohide=1")})
$("#item22").click(function(){
 $("#item23").show()
 $("#item24").show()
 $("#item25").show()
 $("#lesson_title").html("Thao tác trên cây nhị phân(quay trái, quay phải)"); 	 			 	
})
$("#item23").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/xuOD13LBuaU?autoplay=1&theme=dark&color=red&autohide=1")
    $("#lesson_title").html("Các thao tác trên cây AVL"); 	 			 	
})
$("#item24").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/ufuN-TtSpnw?autoplay=1&theme=dark&color=red&autohide=1")
    $("#lesson_title").html("Xử lý các trường hợp mất cân bằng"); 	 			 	
})
$("#item25").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/qrQSqRdoMpA?autoplay=1&theme=dark&color=red&autohide=1")
	$("#lesson_title").html("Các thao tác trên cây AVL"); 	 			 	
})
$("#folder26").click(function(){
$("#item27").show()
$("#item28").show()
$("#item29").show() 
$("#item30").show() 
})
$("#item27").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/UQLgfdqKNz8?autoplay=1&theme=dark&color=red&autohide=1")
    $("#lesson_title").html("Cây AA"); 	 			 	
})
$("#item28").click(function(){
	  $("#ctdlgt").attr("src","//www.youtube.com/embed/qrQ861Dd67g?autoplay=1&theme=dark&color=red&autohide=1")
      $("#lesson_title").html("Ví dụ tạo cây AA"); 	 			 	
})

$("#item29").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/ym-03WbSn1U?autoplay=1&theme=dark&color=red&autohide=1")
    $("#lesson_title").html("Thao tác xóa phần tử"); 	 			 	
})

$("#item30").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/xlIaocX-gWs?autoplay=1&theme=dark&color=red&autohide=1")
	$("#lesson_title").html("Bài tập"); 	 			 	
})
$("#folder31").click(function(){
  $("#item32").show()
  $("#item33").show()
  $("#item34").show()
  $("#item35").show()
  $("#ctdlgt").attr("src","//www.youtube.com/embed/fZBH2GA2jyM?autoplay=1&theme=dark&color=red&autohide=1")
  $("#lesson_title").html("Các chiến lược tìm kiếm"); 	 			 	
})

$("#item32").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/fZBH2GA2jyM?autoplay=1&theme=dark&color=red&autohide=1")
	$("#lesson_title").html("Giới thiệu"); 	 			 	
})
$("#item33").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/vEufrZz5dW0?autoplay=1&theme=dark&color=red&autohide=1")
    $("#lesson_title").html("Tìm kiếm tuần tự vét cạn"); 	 			 	
})
$("#item34").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/RqvfPaJRRnw?autoplay=1&theme=dark&color=red&autohide=1")
    $("#lesson_title").html("Tìm kiếm tuần tự lính canh"); 	 			 	
})
$("#item35").click(function(){
	$("#ctdlgt").attr("src","//www.youtube.com/embed/TmW4omHjYfc?autoplay=1&theme=dark&color=red&autohide=1")
	$("#lesson_title").html("Tìm kiếm nhị phân"); 	 			 	
})

})
//end ready function
.on("click","#toc img",function(){
	var left_toc_height=parseInt($("#toc").height()),window_height=parseInt($("#ctdlgt").height())
	if(left_toc_height>window_height){
	var fix_height=left_toc_height*13/10-window_height
		console.log("margin-top:"+fix_height)
	$("#globalheader").attr('style','margin-top:'+fix_height+'px')
	}
})


function call_mbook(id){
switch(id)
	{
		case 2:
		clickOnFolder("1")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/cZlXhfbpTbY?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Bài 01: Các khái niệm cơ bản"); 
		$("#folder1 a").addClass('hight_light_item')
		break;


		case 3:
		clickOnFolder("1")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/gBayCA8-92A?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("BigO"); 
		$("#folder3 a").addClass('hight_light_item')
		break;
		
		case 4:
		clickOnFolder("1")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/nKMGWn-_BBM?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Độ phức tạp của thuật toán"); 
		$("#folder4 a").addClass('hight_light_item')
		break;
		
		case 5:
		clickOnFolder("5")
		clickOnFolder("6")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/qKAycP1oUQY?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các cấu trúc dữ liệu cơ bản")
		$("#folder5 a").addClass('hight_light_item')
		break;
		
		case 7:
		clickOnFolder("5")
		clickOnFolder("6")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/qKAycP1oUQY?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Giới thiệu danh sách liên kết, Ngăn xếp, Hàng đợi"); 	 
		$("#item7 a").addClass('hight_light_item')
		break;
		
		case 8:
		clickOnFolder("5")
		clickOnFolder("6")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/7F7n9w2CDGs?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Tổ chức danh sách liên kết"); 	 
		$("#item8 a").addClass('hight_light_item')
		break;
		
		case 9:
		clickOnFolder("5")
		clickOnFolder("6")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/iusDWjht-Ig?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các thao tác trên danh sách liên kết"); 	 			 
		$("#item9 a").addClass('hight_light_item')
		break;
		
		
		case 10:
		clickOnFolder("5")
		clickOnFolder("6")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/eOFKOKwzffE?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Tổng kết"); 	 	
		$("#item10 a").addClass('hight_light_item')
		break;

		case 11:
		clickOnFolder("5")
		clickOnFolder("6")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/QmO24_WRo60?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Bài tập"); 
		$("#item11 a").addClass('hight_light_item')
		break;

		case 12:
		clickOnFolder("5")
		clickOnFolder("6")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/QrIVH12q1u4?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Ngăn xếp (Stack)"); 
		$("#folder12 a").addClass('hight_light_item')
		break;
		
		case 13:
		clickOnFolder("5")
		clickOnFolder("6")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/hH7KTyxXrE8?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Hàng đợi Queue"); 	 			 	
		$("#folder13 a").addClass('hight_light_item')
		break;
		
		case 14:
		clickOnFolder("14")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/3F-dAtCMpkI?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Cấu trúc cây"); 
		$("#folder14 a").addClass('hight_light_item')
		break;
		
		case 15:
		clickOnFolder("14")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/3F-dAtCMpkI?autoplay=1&theme=dark&color=red&autohide=1")
	    $("#lesson_title").html("Khái niệm"); 	 			 
		$("#item15 a").addClass('hight_light_item')
		break;
		

		case 16:
		clickOnFolder("14")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/3F-dAtCMpkI?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Phép duyệt cây")	 			 
		$("#item16 a").addClass('hight_light_item')
		break;

		case 17:
		clickOnFolder("14")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/IqVJEt0G3fg?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Biểu diễn cây"); 	 			 
		$("#item17 a").addClass('hight_light_item')
		break;
		
		case 18:
		clickOnFolder("14")
		clickOnFolder("18")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/Nlb56qQAjp8?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Cây nhị phân-Cây nhị phân tìm kiếm"); 	 			 
		$("#folder18 a").addClass('hight_light_item')
		break;

		case 19:
		clickOnFolder("14")
		clickOnFolder("18")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/kBxcs2Jyhnc?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Thao tác trên cây nhị phân(Thêm phần tử, Tìm kiếm phần tử)"); 	 			 	
		$("#item19 a").addClass('hight_light_item')
		break;
		

		case 20:
		clickOnFolder("14")
		clickOnFolder("18")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/s15OaqAYf2I?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Thao tác trên cây nhị phân(Xóa phần tử, Sắp xếp phần tử, Duyệt cây)"); 	 			 	
		$("#item20 a").addClass('hight_light_item')
		break;
		
		
		case 21:
		clickOnFolder("14")
		clickOnFolder("18")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/6dZMb-PZgKw?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Thao tác trên cây nhị phân(quay trái, quay phải)"); 	 			 	
		$("#item21 a").addClass('hight_light_item')
		break;
		
		case 23:
		clickOnFolder("14")
		clickOnFolder("22")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/7C4T_LRk5vY?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các thao tác trên cây AVL");
		$("#item23 a").addClass('hight_light_item')
		break;
		
		case 24:
		clickOnFolder("14")
		clickOnFolder("22")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/ufuN-TtSpnw?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Xử lý các trường hợp mất cân bằng"); 	 		
		$("#item24 a").addClass('hight_light_item')
		break;
		
		case 25:
		clickOnFolder("14")
		clickOnFolder("22")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/qrQSqRdoMpA?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các thao tác trên cây AVL");
		$("#item25 a").addClass('hight_light_item')
		break;
		
		
		case 27:
		clickOnFolder("14")
		clickOnFolder("26")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/UQLgfdqKNz8?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Cây AA"); 	 		
		$("#item27 a").addClass('hight_light_item')
		break;

		case 28:
		clickOnFolder("14")
		clickOnFolder("26")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/qrQ861Dd67g?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Ví dụ tạo cây AA");
		$("#item28 a").addClass('hight_light_item')
		break;
		
		case 29:
		clickOnFolder("14")
		clickOnFolder("26")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/ym-03WbSn1U?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Thao tác xóa phần tử");
		$("#item29 a").addClass('hight_light_item')
		break;
		
		case 30:
		clickOnFolder("14")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/xlIaocX-gWs?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Bài tập"); 
		$("#item30 a").addClass('hight_light_item')
		break;

		case 31:
		clickOnFolder("14")
		clickOnFolder("31")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/fZBH2GA2jyM?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các chiến lược tìm kiếm");	 			 
		$("#folder31 a").addClass('hight_light_item')
		break;

		case 33:
		clickOnFolder("31")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/vEufrZz5dW0?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Tìm kiếm tuần tự vét cạn"); 	
		$("#item33 a").addClass('hight_light_item')
		break;
		
		case 34:
		clickOnFolder("31")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/RqvfPaJRRnw?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Tìm kiếm tuần tự lính canh"); 	 			 
		$("#item34 a").addClass('hight_light_item')
		break;


		case 35:
		clickOnFolder("31")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/TmW4omHjYfc?autoplay=1&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Tìm kiếm nhị phân"); 	
		$("#item35 a").addClass('hight_light_item')
		break;
	
	}
}