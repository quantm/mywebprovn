

<?php if($isCapnhat == 1){ ?>
<a href="#" onclick="document.getElementById('tftemp<?php echo $idObject?>').style.display='';
	document.getElementById('tftemp<?php echo $idObject?>').src = 
	'/file/input?type=-1&year=<?php echo $year?>&idObject=<?php echo $idObject?>&iddiv=<?php echo $iddiv ?>&isTemp=<?php echo $isTemp?>&from=attach';
	return false;"><img src="/images/icon_add.gif" border="0" alt="Click để đính kèm tệp"></a><br>
<?php } ?>
<iframe style="overflow-x:visible;display:none;" allowTransparency=true BORDER=0 scrolling=no FRAMEBORDER=no  class='iframeinputfile' id="tftemp<?php echo $idObject?>" 
name="tftemp<?php echo $idObject?>" 
src="" >
</iframe>
