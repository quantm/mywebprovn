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


foldersTree = gFld("<i>Phân tích thiết kế hệ thống thông tin</i>", "")
  foldersTree.treeID = "Frameset"
  foldersTree.iconSrc = ICONPATH + "diffFolder.gif"
  foldersTree.iconSrcClosed = ICONPATH + "diffFolder.gif"

//start chapter 1
  aux1 = insFld(foldersTree, gFld("Chương 1 Giới thiệu về môn học", ""))
	insDoc(aux1, gLnk("R", "Giới thiệu", ""))
	insDoc(aux1, gLnk("R", "Phương pháp phát triển chức năng", ""))
	insDoc(aux1, gLnk("R", "Phương pháp phát triển hướng đối tượng", ""))
	insDoc(aux1, gLnk("R", "Mô hình", ""))
	insDoc(aux1, gLnk("R", "Chu kỳ phát triển hệ thống", ""))
	insDoc(aux1, gLnk("R", "Phương pháp luận phát triển hệ thống", ""))
	insDoc(aux1, gLnk("R", "Phương pháp", ""))
	insDoc(aux1, gLnk("R", "Các vai trò trong dự án", ""))
//end chapter 1

//start chapter 2
  aux1 = insFld(foldersTree, gFld("Chương 2 Các khái niệm về hướng đối tượng", "javascript:parent.op()"))
	insDoc(aux1, gLnk("R", "Đối tượng (Object)", ""))
	insDoc(aux1, gLnk("R", "Lớp (Class)", ""))
	insDoc(aux1, gLnk("R", "Thể hiện của lớp (Instance)", ""))
	insDoc(aux1, gLnk("R", "Phân cấp (Hierarchy)", ""))
	insDoc(aux1, gLnk("R", "Tính bao bọc (Encapsulation)", ""))
	insDoc(aux1, gLnk("R", "Tính kế thừa", ""))
	insDoc(aux1, gLnk("R", "Tính đa hình(Polymorphism)", ""))
//endchapter 2    
    //
    // Netscape 4.x needs the HREF to be non-empty to process other events such as open folder,
    // hence the need for the op function
    //
	/*
    aux2 = insFld(aux1, gFld("Not linked", "javascript:parent.op()"))
      insDoc(aux2, gLnk("R", "New York", ""))
    */
  aux1 = insFld(foldersTree, gFld("Chương 3 Ngôn ngữ mô hình hóa hợp nhất (UML)", "javascript:parent.op()"))
      insDoc(aux1, gLnk("R", "Lịch sử của UML", ""))
      insDoc(aux1, gLnk("B", "UML là gì ?", ""))
      insDoc(aux1, gLnk("T", "Các đặc trưng của tiến trình UML?", ""))
      insDoc(aux1, gLnk("T", "Các sơ đồ trong UML?", ""))
      insDoc(aux1, gLnk("T", "Các hệ thống sử dụng UML trong việc mô hình hóa?", ""))
	     
      /*
	  insDoc(aux1, gLnk("S", "This frame", "http://www.treeview.net/treemenu/demopics/beenthere_athens.jpg"))
      //
      // The S target is required.
      // The \\\ is needed to escape the ' character for string arguments.
      // Also, note that if you define your function in the parent frame, use javascript:parent.myfunc
      insDoc(aux1, gLnk("S", "JavaScript link", "javascript:alert(\\\'This JavaScript link simply calls the built-in alert function,\\\\nbut you can define your own function.\\\')"))
      */
  aux1 = insFld(foldersTree, gFld("Chương 04: Xác định yêu cầu", "javascript:parent.op()"))
    docAux = insDoc(aux1, gLnk("B", "Mục đích khảo sát yêu cầu", ""))
    docAux = insDoc(aux1, gLnk("B", "Nội dung khảo sát", ""))
    docAux = insDoc(aux1, gLnk("B", "Đối tượng khảo sát", ""))
    docAux = insDoc(aux1, gLnk("B", "Các chiến lược phân tích yêu cầu", ""))
    docAux = insDoc(aux1, gLnk("B", "Các chiến lược thu thập yêu cầu", ""))

  aux1 = insFld(foldersTree, gFld("Chương 05: Mô hình hóa chức năng", "javascript:parent.op()"))
    docAux = insDoc(aux1, gLnk("B", "Mục tiêu chương", ""))
    docAux = insDoc(aux1, gLnk("B", "Mô hình chức năng (Use case diagram)", ""))
    docAux = insDoc(aux1, gLnk("B", "Mô hình hoạt động (Activity diagram)", ""))
    docAux = insDoc(aux1, gLnk("B", "Mối liên hệ giữa Use case diagram và Activity diagram", ""))
    docAux = insDoc(aux1, gLnk("B", "Mô hình hóa nghiệp vụ", ""))

  aux1 = insFld(foldersTree, gFld("Chương 06: Mô hình hóa hành vi", "javascript:parent.op()"))
    docAux = insDoc(aux1, gLnk("B", "Giới thiệu về Mô hình hóa hành vi", ""))
    docAux = insDoc(aux1, gLnk("B", "Lượt đồ tuần tự (Sequence diagram)", ""))
    docAux = insDoc(aux1, gLnk("B", "Lượt đồ cộng tác (Communication diagram)", ""))
    docAux = insDoc(aux1, gLnk("B", "Lượt đồ trạng thái hành vi (Behavior State Machine)", ""))
    docAux = insDoc(aux1, gLnk("B", "Câu hỏi ?", ""))

 aux1 = insFld(foldersTree, gFld("Chương 07: Mô hình hóa cấu trúc", "javascript:parent.op()"))
    docAux = insDoc(aux1, gLnk("B", "Mục tiêu chương", ""))
	docAux = insDoc(aux1, gLnk("B", "Sơ đồ lớp (Class Diagram)", ""))
    docAux = insDoc(aux1, gLnk("B", "Sơ đồ đối tượng(Object diagram)", ""))
    docAux = insDoc(aux1, gLnk("B", "Cách tiếp cận sơ đồ lớp", ""))
    docAux = insDoc(aux1, gLnk("B", "Mẫu đặc tả lớp", ""))

 aux1 = insFld(foldersTree, gFld("Chương 08: Thiết kế lớp", "javascript:parent.op()"))
    docAux = insDoc(aux1, gLnk("B", "Các tiên đề và hệ luận trong thiết kế hướng đối tượng", ""))
    docAux = insDoc(aux1, gLnk("B", "Thiết kế lớp", ""))
 
 aux1 = insFld(foldersTree, gFld("Chương 09: Thiết kế giao diện", "javascript:parent.op()"))
    docAux = insDoc(aux1, gLnk("B", "Giới thiệu", ""))
    docAux = insDoc(aux1, gLnk("B", "Nguyên lý thiết kế giao diện người dùng", ""))
    docAux = insDoc(aux1, gLnk("B", "Qui trình thiết kế giao diện người dùng", ""))
    docAux = insDoc(aux1, gLnk("B", "Thiết kế giao diện đầu vào", ""))
    docAux = insDoc(aux1, gLnk("B", "Thiết kế giao diện đầu ra", ""))
 
  /*
  aux1 = insFld(foldersTree, gFld("<font color=red>F</font><font color=blue>o</font><font color=pink>r</font><font color=green>m</font><font color=red>a</font><font color=blue>t</font><font color=brown>s</font>", "javascript:parent.op()"))
    docAux = insDoc(aux1, gLnk("R", "<div class=specialClass>CSS Class</div>", ""))
  */
$(document)
.on("click","#fb-wrapper",function(){
	$(".fb-like iframe").attr('style','margin-left:-266%')
})
//start ready function
.ready(function(){

	$("#item2").click(function(){
		 $("#ctdlgt").attr("src","http://www.youtube.com/embed/4enFFm3hErM?autoplay=1&start=80&theme=dark&color=red&autohide=1")
		 $("#lesson_title").html("Giới thiệu")	
	})
	$("#item3").click(function(){
		$("#ctdlgt").attr("src","http://www.youtube.com/embed/4enFFm3hErM?autoplay=1&start=282&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Phương pháp phát triển chức năng")	
	})

	$("#item4").click(function(){
		$("#ctdlgt").attr("src","http://www.youtube.com/embed/4enFFm3hErM?autoplay=1&start=398&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Phương pháp phát triển đối tượng")		
	})
	$("#item5").click(function(){	
		 $("#ctdlgt").attr("src","http://www.youtube.com/embed/4enFFm3hErM?autoplay=1&start=569&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mô hình")		
	})

	$("#item6").click(function(){	
		$("#ctdlgt").attr("src","http://www.youtube.com/embed/4enFFm3hErM?autoplay=1&start=756&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Chu kì phát triển hệ thống")		
	})

	$("#folder7").click(function(){		
		$("#ctdlgt").attr("src","http://www.youtube.com/embed/4enFFm3hErM?autoplay=1&start=1274&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các phương pháp luận phát triển hệ thống")				
	})

	$("#item8").click(function(){	
		$("#ctdlgt").attr("src","http://www.youtube.com/embed/4enFFm3hErM?autoplay=1&start=2396&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Phương pháp")				
	})

	$("#item9").click(function(){	
		$("#ctdlgt").attr("src","http://www.youtube.com/embed/4enFFm3hErM?autoplay=1&start=2493&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các vai trò trong dự án")				
	})

	$("#folder10").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/cKPF9LiKUdY?&autoplay=1&start=455&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các khái niệm về hướng đối tượng")
	})

	$("#item11").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/cKPF9LiKUdY?&autoplay=1&start=206&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Đối tượng")	
	})
	
	$("#item12").click(function(){
		 $("#ctdlgt").attr("src","//www.youtube.com/embed/cKPF9LiKUdY?&autoplay=1&start=397&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Lớp")	
	})

	$("#item13").click(function(){
		$("#ctdlgt").attr("src","//www.youtube.com/embed/cKPF9LiKUdY?&autoplay=1&start=433&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Thể hiện của lớp")	
	})

	$("#item14").click(function(){
		$("#ctdlgt").attr("src","//www.youtube.com/embed/cKPF9LiKUdY?&autoplay=1&start=638&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Phân cấp")	
	})

	
	$("#item15").click(function(){
		$("#ctdlgt").attr("src","//www.youtube.com/embed/cKPF9LiKUdY?&autoplay=1&start=537&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Tính bao bọc (Encapsulation)")	
	})

	$("#item16").click(function(){
		$("#ctdlgt").attr("src","//www.youtube.com/embed/cKPF9LiKUdY?&autoplay=1&start=683&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Tính kế thừa")	
	})

	$("#item17").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/cKPF9LiKUdY?&autoplay=1&start=802&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Tính đa hình")	
	})

	$("#folder18").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/wV1IEX4wm7k?&autoplay=1&start=000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Ngôn ngữ mô hình hóa hợp nhất (UML)")	
	})
	$("#item19").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/wV1IEX4wm7k?&autoplay=1&start=69&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Lịch sử của UML ")	
	})

	$("#item20").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/wV1IEX4wm7k?&autoplay=1&start=110&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("UML là gì ?")	
	})

	$("#item21").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/wV1IEX4wm7k?&autoplay=1&start=192&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các đặc trưng của tiến trình UML")	
	})

	$("#item22").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/wV1IEX4wm7k?&autoplay=1&start=360&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các sơ đồ trong UML")	
	})

	$("#item23").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/wV1IEX4wm7k?&autoplay=1&start=578&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các hệ thống sử dụng UML trong việc mô hình hóa ?")	
	})

	$("#folder24").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/NigHJ_CLOlk?&autoplay=1&start=000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Chương 04: Xác định yêu cầu")	
	})

	$("#item25").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/NigHJ_CLOlk?&autoplay=1&start=114&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mục đích khảo sát yêu cầu")	
	})
	$("#item26").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/NigHJ_CLOlk?&autoplay=1&start=180&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Nội dung khảo sát")	
	})

	$("#item27").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/NigHJ_CLOlk?&autoplay=1&start=355&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Đối tượng khảo sát")	
	})

	$("#item28").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/NigHJ_CLOlk?&autoplay=1&start=418&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các chiến lược phân tích yêu cầu")	
	})

	$("#item29").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/NigHJ_CLOlk?&autoplay=1&start=635&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các chiến lược thu thập yêu cầu")	
	})
	
	$("#folder30").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/3UA65mvq1i4?&autoplay=1&start=000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mô hình hóa chức năng")	
	})

	$("#item31").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/3UA65mvq1i4?&autoplay=1&start=311&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mục tiêu chương")	
	})

	$("#item32").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/3UA65mvq1i4?&autoplay=1&start=425&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mô hình chức năng (Use case Diagram)")	
	})

	$("#item33").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/3UA65mvq1i4?&autoplay=1&start=3645&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mô hình họat động (Activity Diagram)")	
	})
	
	$("#item35").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/3UA65mvq1i4?&autoplay=1&start=5000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mô hình hóa nghiệp vụ")	
	})
	
	$("#item34").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/3UA65mvq1i4?&autoplay=1&start=4511&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mối liên hệ giữa Use case diagram và Activity diagram ")	
	})

	$("#folder31").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/3UA65mvq1i4?&autoplay=1&start=000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mô hình hóa chức năng (Function Modeling)")	
	})

	$("#folder36").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/fMR7WFE1WFU?&autoplay=1&start=000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mô hình hóa hành vi (Behavioral Modeling)")	
	})
	
		
	$("#item37").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/fMR7WFE1WFU?&autoplay=1&start=186&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Giới thiệu Mô hình hóa hành vi")	
	})
	
	
	$("#item38").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/fMR7WFE1WFU?&autoplay=1&start=365&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Lược đồ tuần tự (Sequence Digram)")	
	})
	
	$("#item39").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/fMR7WFE1WFU?&autoplay=1&start=1615&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Lược đồ cộng tác (Collaboration Digram)")	
	})

	$("#item40").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/fMR7WFE1WFU?&autoplay=1&start=2210&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Lược đồ trạng thái (Behavioral State Machine)")	
	})

	$("#folder42").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/9BX3TIGS36g?&autoplay=1&start=000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mô hình hóa cấu trúc")	
	})


	$("#item43").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/9BX3TIGS36g?&autoplay=1&start=72&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mục tiêu chương")	
	})

	
	$("#item44").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/9BX3TIGS36g?&autoplay=1&start=143&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Sơ đồ lớp (Class Diagram)")	
	})
	
	$("#item45").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/9BX3TIGS36g?&autoplay=1&start=1230&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Sơ đồ đối tượng (Object Diagram)")	
	})
	
	$("#item46").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/9BX3TIGS36g?&autoplay=1&start=1315&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Cách tiếp cận sơ đồ lớp")	
	})
	
	$("#item47").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/9BX3TIGS36g?&autoplay=1&start=3000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mẫu đặc tả lớp")	
	})
	
	$("#folder48").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/6QSrhuzXQtg?&autoplay=1&start=000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Thiết kế lớp")	
	})
	
	$("#item49").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/6QSrhuzXQtg?&autoplay=1&start=211&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các tiên đề và hệ luận trong thiết kế hướng đối tượng")	
	})
	
	$("#item50").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/6QSrhuzXQtg?&autoplay=1&start=1418&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Thiết kế lớp")	
	})
	
	
	$("#folder51").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/4VxHAOqGCAw?&autoplay=1&start=000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Thiết kế giao diện")	
	})
	
	$("#item52").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/4VxHAOqGCAw?&autoplay=1&start=50&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Giới thiệu")	
	})
	$("#item53").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/4VxHAOqGCAw?&autoplay=1&start=207&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Nguyên lý thiết kế giao diện")	
	})

	$("#item54").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/4VxHAOqGCAw?&autoplay=1&start=833&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Qui trình thiết kế giao diện người dùng")	
	})

	$("#item55").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/4VxHAOqGCAw?&autoplay=1&start=1780&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Thiết kế giao diện đầu vào")	
	})

	$("#item56").click(function(){	
		$("#ctdlgt").attr("src","//www.youtube.com/embed/4VxHAOqGCAw?&autoplay=1&start=2180&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Thiết kế giao diện đầu ra")	
	})

})
//end ready function

function call_mbook(id){
	switch(id)
	{
		case 1:
		clickOnFolder("1")
		 $("#ctdlgt").attr("src","//www.youtube.com/embed/4enFFm3hErM?autoplay=1&theme=dark&color=red&autohide=1")
		 $("#lesson_title").html("Giới thiệu chung môn học")
		 $("#folder1").find("a").addClass('hight_light_item')		
		break;

		case 10:
		clickOnFolder("10")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/cKPF9LiKUdY?&autoplay=1&start=455&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Các khái niệm về hướng đối tượng")
		$("#folder10").find("a").addClass('hight_light_item')		
		break;

		case 18:
		clickOnFolder("18")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/wV1IEX4wm7k?&autoplay=1&start=000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Ngôn ngữ mô hình hóa hợp nhất (UML)")
		$("#folder18").find("a").addClass('hight_light_item')		
		break;
		
		case 24:
		clickOnFolder("24")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/NigHJ_CLOlk?&autoplay=1&start=000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Chương 04: Xác định yêu cầu")	
		$("#folder24").find("a").addClass('hight_light_item')		
		break;

		case 30:
		clickOnFolder("30")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/3UA65mvq1i4?&autoplay=1&start=635&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mô hình hóa chức năng (Function Modeling)")
		$("#folder30").find("a").addClass('hight_light_item')		
		break;

		case 36:
		clickOnFolder("36")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/fMR7WFE1WFU?&autoplay=1&start=635&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mô hình hóa hành vi (Behavioral Modeling)")
		$("#folder36").find("a").addClass('hight_light_item')		
		break;
		
		case 42:
		clickOnFolder("42")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/9BX3TIGS36g?&autoplay=1&start=000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Mô hình hóa cấu trúc")
		$("#folder42").find("a").addClass('hight_light_item')		
		break;

		case 48:
		clickOnFolder("48")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/6QSrhuzXQtg?&autoplay=1&start=000&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Thiết kế lớp")
		$("#folder48").find("a").addClass('hight_light_item')		
		break;
		
		case 51:
		clickOnFolder("51")
		$("#ctdlgt").attr("src","//www.youtube.com/embed/4VxHAOqGCAw?&autoplay=1&start=00&theme=dark&color=red&autohide=1")
		$("#lesson_title").html("Thiết kế giao diện")
		$("#folder51").find("a").addClass('hight_light_item')		
		break;
	}
}