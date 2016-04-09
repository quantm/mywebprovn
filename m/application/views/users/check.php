<html>
	<head>
			        <meta charset="utf-8">
			<link href='/css/general.css' rel='Stylesheet'>
			 <script type="text/javascript" src="/js/Ajax/AjaxEngine.js"></script>
			 <script src="/js/common.js" type="text/javascript" language="javascript"></script>    
                <script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script>
                <script type="text/javascript" src="/js/validate.js"></script>
	</head>
		<form method='post' action='/user/checkExist'>
		<input type='text' name='username' id='username'  onChange="return checkData(this.value);" ><br/>
		<span id="ERRusername" class="box_erro_area"></span>
		<input type='submit' value='Test'>
		</form>
</html>
<script>
		     function check_user(msg)
                                            {
                                                if(msg=='1')
                                                {
                                                    document.getElementById('ERRusername').innerHTML ="Tên người dùng đã tồn tại";
                                                    test='1';
                                                    return true;
                                                }
                                                else if(msg=='2')
                                                {
                                                    document.getElementById('ERRusername').innerHTML ="<font color='blue'>Tên người dùng hợp lệ</font>";
                                                    test="2";
                                                    return false;
                                                }
                                            }

                                            function checkFail(msg)
                                            {
                                                alert('Kiểm tra dữ liệu gặp lỗi');
                                            }

                                            function checkData(value)
                                            {
                                                var checkAjax = new AjaxEngine();     	
                                                var url="/user/checkExist";		
				
                                                url=url+"?username="+value;	
                                                var type_request = "GET";
                                                if(trim(value)!='')
                                                {
                                                    sendRequestToServer(url,type_request,check_user,checkFail);
                                                }
                                            }
</script>