<html>
<head>
	<meta charset='utf-8'>
	<script src="/js/textsms.js" type="text/javascript"></script>
	<script src="/js/runsms.js" type="text/javascript"></script>
	<script src="/js/jquery-1.js" type="text/javascript"></script>
	<script src="/js/Ajax/AjaxEngine.js" type="text/javascript"></script>
 </head>
 
 <body>

 <iframe style="display:none" src="/test/sms/"></iframe>
	  <form onsubmit="return checkdata(140,'www.mobifone.com.vn');" name="sendsms" method="post" action="http://www.mobifone.com.vn/web/vn/sms/result.jsp">

Gửi đến : </br><input style="width:125px; font-family:Arial, Helvetica, sans-serif; font-size:11px;" name="phonenum" value="84" onkeyup="lookup(this.value);changephonenum();" onblur="fill(this.value);" id="phonenumID"><div id="autoSuggestionsList" style="left:50%;margin-left: -20px;display:none;border: 1px solid #CCCCCC;color:#3a3a3a;background-color: #ebebeb;position: absolute; z-index: 10"></div></br>													
Nội dung tin nhắn</br>
<textarea onkeyup="checkLen(this,140*document.sendsms.chargeFlg.value+160*(1-document.sendsms.chargeFlg.value))" onchange="checkLen(this,140*document.sendsms.chargeFlg.value+160*(1-document.sendsms.chargeFlg.value))" ;="" onfocus="checkLen(this,140*document.sendsms.chargeFlg.value+160*(1-document.sendsms.chargeFlg.value))" style="height:75px; width:221px; font-family:Arial, Helvetica, sans-serif; font-size:11px;" name="message"></textarea>
</br>
<td align="left"><a onmouseout="window.status='';return true;" onmouseover="window.status='Gui tin nhan.';return true;" href="javascript:checkdata(140,'www.mobifone.com.vn');">SMS Message</a></td>



													<input type="hidden" value="" name="smsTplId"> 
													
													  <input type="hidden" value="" name="mSelect">
													  <input type="hidden" value="" name="pbList">	
													  <input name="chargeFlg" value="1" type="hidden">
		</form>
	<?=$content?>
	  </body>



</html>
<script type="text/javascript">
	var addrr = [['0963258052','Au'],['0909936220','Driver&nbsp;1'],['01656178979','Duyen'],['01219845645','Hoc'],['01679579125','Hy&nbsp;1'],['01247882179','Hy&nbsp;2'],['0909614985','Hùng'],['0906065484','L&#7897;c'],['0905760176','Long'],['0937893488','Ngan'],['01229989791','Nhu&nbsp;Quynh'],['01289907172','Nhàn'],['01264311449','Quan'],['01218635595','Thien&nbsp;An&nbsp;-&nbsp;mobi'],['01675678020','Thien&nbsp;An&nbsp;-&nbsp;viettel'],['0908816088','TrQuynh'],['0988698165','Trung'],['0906645349','Tuan&nbsp;Anh'],['0934731249','Vinh'],
['01219845645','Vinh&nbsp;so&nbsp;eChay']];	
	function lookup(inputString) {			
		if(inputString.indexOf("84")==0)
			inputString=inputString.substring(2);
		document.getElementById('autoSuggestionsList').style.top = 25;
		if(inputString.length == 0)  {
			// Hide the suggestion box.
			$('#autoSuggestionsList').hide();
		} else {
			var data = "";
			var field1 = "";
			var field2 = "";
			var count = 0;
			for (var i=0;i<addrr.length;i=i+1){
				field1 = addrr[i][0];
				field2 = addrr[i][1];
				if(field1.indexOf(inputString)>=0 && count<21) {	
					count++;				
					data+="<tr class='labelOut' onmouseover=\"this.className='labelOver';\" onmouseout=\"this.className='labelOut';\"  onclick=fill('"+field1+"')><td>"+field1+"</td><td>"+field2+"</td></tr>";
				}	
			}
			if(count>0)
				data = "<table style='margin: 0px 0px 0px 0px;padding: 7px;'>"+data+"</table>";
			
			if(data.length >0) {
				$('#autoSuggestionsList').show();
				$('#autoSuggestionsList').html(data);
			} else
				$('#autoSuggestionsList').hide();
			
		}
	} // lookup
	
		function fill(thisValue) {
		$('#phonenumID').val(thisValue);
		setTimeout("$('#autoSuggestionsList').hide();", 200);
	}

</script>