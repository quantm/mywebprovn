<script type="text/javascript"  src="/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript"  src="/js/bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".btn_print").tooltip({
		placement:'top'
	})
})
.on('click','#print_now',function(){
	$('.btn_print').hide()
	window.print();
})
</script>
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" /><style>
	.btn_print{
		position:absolute;
		width:90px;
		margin-left:15px;
		cursor:pointer;
	}
	#print_collection{
	display:none!important;
	}
</style>
<meta charset="utf-8"/>
<title><?=$print_name?></title>
<iframe src="<?=$print_path?>"  style="margin-left:-15x" width="1200px" height="1600px"></iframe>
<button id="print_now" style="margin-top:4%" title="Click để in tài liệu" class='btn btn-primary btn_print'>In tài liệu</button>
<button id="print_collection" style="margin-top:8%" title="Bạn không có sẵn máy in, lưu vào danh mục tài liệu in để in sau" class='btn btn-primary btn_print' >Lưu vào tài liệu in</button>
