<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" type="text/css" href="/css/general.css" />
</head>
<body style="background-color:transparent">

<form name=frmUpload enctype="multipart/form-data" action="/file/save" method="post" target="tftemp<?php echo $idObject?>">
	<input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
	<table width=100% class="admintable" border=0>
		<tr>
			<td nowrap class=key>Chọn file đính kèm</td>
			<td nowrap><input name="uploadedfile" type="file" /> </td>
		</tr>
	</table>
	    
	<a href="#" onclick="window.parent.document.getElementById('tftemp<?php echo $idObject?>').style.display='none'
	return false;"> 
	[ Hủy ] </a>
        <a href="#" onclick="document.frmUpload.submit();">[ Đính kèm ]</a>
	<input type="hidden" name="idObject" value=<?php echo $idObject?> >
	<input type="hidden" name="isTemp" value=<?php echo $isTemp?>>
	<input type="hidden" name="iddiv" value=<?php echo $iddiv?>>
	<input type="hidden" name="type" value=<?php echo $type?>>
	<input type="hidden" name="from" value=<?php echo $from?>>
	<input type="hidden" name="pdf" value="<?php echo $pdf?>">
	<input type="hidden" name="is_nogetcontent" value="<?php echo $is_nogetcontent?>">
	
</form>
<p id=lasttext></p>
</body>
</html>
<script>
var iframeElement = window.parent.document.getElementById('tftemp<?php echo $idObject?>');
iframeElement.style.height = ""+(document.getElementById("lasttext").offsetTop+10)+"px";
iframeElement.width = "100%"; 
</script>