<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="/css/toefl.css" media="screen"/> 
<link href="/css/dictionary.css" type="text/css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Rancho&effect=3d-float" type="text/css" rel="stylesheet">
<link rel="canonical" href="http://myweb.pro.vn/toefl/index/" />
<script type="text/javascript" src="/js/toefl.js"></script>
<script type="text/javascript" src="/js/vdict.js"></script>
<script type="text/javascript">
$("document").ready(function(){
	$("#modal_login").attr("style","z-index:-1");
})
</script>
</head>
<body>
<div id='addVdictOnYourWeb'></div>
<!-- start toefl wrapper -->
<div id="toefl_wrapper">
</div>
<!-- end toefl wrappers -->
<div class="ajax_load">
<!--<img src="/images/spinningDisc.gif"/>-->
<img src="/public/images/ajax_load_green.gif"/>
<span style="margin-left:5px">Đang tải câu hỏi...</span>
</div>
<!--start result -->
<div class="modal hide fade" id="modal_result">
        <div class="modal-header">
			<h4 style="margin-left:1%">Kết quả làm bài</h4>
        </div>
        <div class="modal-body">
			<table>
				<tbody>
					<tr>
						<td>Số câu hỏi :</td>
						<td id="num_excercise_done"></td>
					</tr>
					<tr>
						<td>Số câu trả lời đúng :</td>
						<td id="num_excercise_done_true"></td>
					</tr>
					<tr>
						<td>Số câu trả lời sai :</td>
						<td id="num_excercise_done_false"></td>
					</tr>
					<tr>
						<td>Tỷ lệ bạn làm đúng :</td>
						<td id="num_excercise_done_true_percent"></td>
					</tr>
					<tr>
						<td>Tỷ lệ cần đạt :</td>
						<td>80%</td>
					</tr>
					<tr>
						<td>Ước lượng theo thang điểm phần thi Reading :</td>
						<td id="reading_estimate"></td>
					</tr>
				</tbody>
			</table>
		</div>  
		<div class="modal-footer">		  
		    <button type="button" id="view_result_detail" class="btn btn-primary" data-dismiss="modal">Xem chi tiết</button>
		</div>
 </div>
<!-- end result -->
<input type="hidden" id="check_stat" value="0"/>
<div class="modal" id="modal-check">
	<div class="modal-body" style="color:red">Bạn chưa chọn câu trả lời</div>
</div>
</body>
</html>