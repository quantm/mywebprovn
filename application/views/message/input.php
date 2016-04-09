<?php
require_once 'application/models/common.php';
echo ProjectCommon::useDlgConfirm();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="/js/mail/mailautocomplete_actb.js" type="text/javascript" language="javascript"></script>
        <script type="text/javascript" src="/js/dlg_confirm.js"></script>
        <script type="text/javascript" src="/js/validate.js"></script>
        <script src="/js/Ajax/AjaxEngine.js" type="text/javascript" language="javascript"></script>
        <script src="/js/mail/mailautocomplete_common.js" type="text/javascript" language="javascript"></script>
        <script src="/js/common.js" type="text/javascript" language="javascript"></script>
        <script>
            var customarray = new Array();
<?php
foreach ($usernamedata as $addr_item) {
    echo "customarray.push('" . $addr_item["USERNAME"] . "');";
}
?>
        </script>

    </head>
    <body>      

        <div class="m">
            <form method="POST" action="/message/index/" name="frmMessage">
                <br>
                <fieldset><legend><img src='/images/e_message.png' height='48' width='48'>Soạn tin nhắn nội bộ</legend>
                    <table cellspacing="0" cellpadding="0" style="" class="adminlist">
                        <tbody><tr>
                                <td>
                                    <div class="traodoi_search_tb">
                                        <div style="float:right;margin-right:10px;">
                                            Chọn chủ đề
                                            <select size="1" class="inputbox" id="filter_object" name="filter_object">									
                                                <?= message_model::chudeCombo($subject, $subject); ?>
                                            </select>
                                        </div>						
                                    </div>		   
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">						
                                        <tbody><tr>
                                                <td colspan="2">
                                                    <div style="display:none">

                                                        <label id="lblTextIput" class="input"><font color="red"></font></label>
                                                    </div>	
                                                    <div class="clr"></div>
                                                    <div class="required">
                                                        <label id="lblTextIput" class="input">Gửi đến<font color="red">*</font></label>

                                                        <textarea cols="80" rows="24" style="width:448px;height:40px" id="nguoinhan" name="nguoinhan"></textarea>		
                                                        <script> var obj = actb(document.getElementById('nguoinhan'),customarray);</script>
                                                        <span class="box_erro_area" id="ERRnguoinhan">
                                                            <a href="#" onClick="ToggleUsers()">Chọn người nhận</a>
                                                        </span>
                                                    </div>
                                                    <div id="BuildUsers" style="display:none; margin-left:550px; vertical-align:top; ">
                                                        <div style="float:left">
                                                            <select name="DEP_NGUOINHAN" id="DEP_NGUOINHAN" onchange='FillComboByComboExp(this,document.getElementById("NGUOINHAN"),ARR_NGUOINHAN,arr_user);'>  
															<option value='0'>* Chọn tất cả *</option>
                                                                <?= user_model::departmentBox($dep, $dep); ?>      
                                                            </select><br>
                                                            <select name="NGUOINHAN" id="NGUOINHAN" multiple="multiple" size="5" ondblclick="if(typeof(InsertIntoArr)=='function')eval('InsertIntoArr()');">

                                                            </select>
                                                            <br>
                                                            <input value="Chọn" class='input_button' onClick="BuildUsers()" type="button">
                                                            <input value="Chọn tất cả" class='input_button' onClick="BuildUsersAll()" type="button">
                                                        </div>
                                                        <script>	
<?= message_model::arr_user_nguoinhan($usernamedata); ?>
    FillComboByComboExp(document.getElementById("DEP_NGUOINHAN"),document.getElementById("NGUOINHAN"),ARR_NGUOINHAN,null);
                                                        </script>										
                                                        <div class="clr"></div>								
                                                    </div>
                                                    <br>		
                                                    <div class="clr"></div>
                                                    <div class="required">
                                                        <label id="lblTextIput" class="input">CC:<font color="red">*</font></label>
                                                        <textarea cols="80" rows="24" style="width:448px;height:40px" id="nguoinhan_cc" name="nguoinhan_cc"></textarea>		
                                                        <script> var obj = actb(document.getElementById('nguoinhan_cc'),customarray);</script>
                                                        <span class="box_erro_area" id="ERRnguoinhan_cc">
                                                            <a href="#" onClick="ToggleUsers_cc()">Chọn người cc</a>
                                                        </span>
                                                    </div>
                                                    <div id="BuildUsers_cc" style="display:none; margin-left:550px; vertical-align:top; ">
                                                        <div style="float:left">
                                                            <select name="DEP_NGUOINHAN_CC" id="DEP_NGUOINHAN_CC" onchange='FillComboByComboExp(this,document.getElementById("NGUOINHAN_CC"),ARR_NGUOINHAN_CC,arr_user);'>
															<option value='0'> * Chọn tất cả * </option>
                                                                <?= user_model::departmentBox($dep, $dep) ?>
                                                            </select>
                                                            </select>
                                                            <br>
                                                            <select name="NGUOINHAN_CC" id="NGUOINHAN_CC" multiple="multiple" size="5" ondblclick="if(typeof(InsertIntoArrCC)=='function')eval('InsertIntoArrCC()');">

                                                            </select>
                                                            <br>
                                                            <input value="Chọn" class='input_button' onClick="BuildUsers_cc()" type="button">
                                                            <input value="Chọn tất cả" class='input_button' onClick="BuildUsersAll_cc()" type="button">
                                                        </div>

                                                        <script>	    
<?= message_model::arr_user_nguoinhan_cc($usernamedata); ?>
    FillComboByComboExp(document.getElementById("DEP_NGUOINHAN_CC"),document.getElementById("NGUOINHAN_CC"),ARR_NGUOINHAN_CC,null);
                                                        </script>								


                                                        <div class="clr"></div>								
                                                    </div>
                                                    <br>                                
                                                    <div class="clr"></div>							
                                                    <div class="required">
                                                        <label id="lblTextIput" class="input">Tiêu đề<font color="red">*</font></label>

                                                        <input type="text" size='72' maxlength="100" value="" id="tieude" name="tieude">							    	<span id="ERRtieude" class="box_erro_area">
                                                            <span id="ERRtieude" class="box_erro_area"></span>
                                                    </div>	
                                                    <div class="clr"></div>														
                                                    <div class="required">
                                                        <label id="lblTextIput" class="input">File đính kèm</label>
                                                        <div id="idFileDinhKem">                                                         <!--
                                                            <iframe width="559px" scrolling="no" frameborder="0" height="120px"src="/file/attach"></iframe>                                -->       
                                                            </div>

															<?php 
									if(null!=$type)
									{
										$type=$type;
									}
									else if($idTemp>0)
									{
										$type=6;
									}
									else $type=-1;
								?>
								<script type="text/javascript">
									divFileDinhKemId='idFileDinhKem';
									url='/file/attach?iddiv=idFileDinhKem&idObject=<?php echo ($idTemp>0?$idTemp:0) ?>&is_new=<?php echo ($idTemp>0?0:1)  ?>&year=<?php echo $year ?>&type=<?php echo $type; ?>';
									loadDivFromUrl(divFileDinhKemId,url,1);
								</script>
                                                    </div>
                                                    <div class="clr"></div>														
                                                    <div class="required">
                                                        <label id="lblTextIput" class="input">Nội dung</label>
                                                        <?php
                                                        require_once 'application/models/fckeditor_php5.php';
                                                        $sBasePath = '/editor/fckeditor/';
                                                        $oFCKeditor = new FCKeditor('message_content');
                                                        $oFCKeditor->BasePath = $sBasePath;
                                                        $oFCKeditor->Config['SkinPath'] = $sBasePath . 'editor/skins/' . htmlspecialchars('Office2003') . '/';
                                                        $oFCKeditor->Width = 550;
                                                        $oFCKeditor->Height = 200;
                                                        $oFCKeditor->ToolbarSet = 'Basic';
                                                        $oFCKeditor->Create();
                                                        ?>

                                                        <span class="box_erro_area">
                                                        </span>
                                                    </div>															
                                                </td>
                                            </tr>					
                                        </tbody></table>
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody><tr height="50">
                                                <td colspan="2" style="background: #f0f0f0;">
                                                    <div style="float:left;margin-left:10px;">
                                                        <input type="button" class='input_button' onClick="Send();this.disabled = true;" title="Gửi tin" value="Gửi" name="send" accesskey="9">
                                                        <input type="button" class='input_button' onClick="SaveDraft()" value="Lưu nháp" name="savedraft">
                                                        <input type="button" class='input_button' onClick="Cancel()" title="Hủy bỏ" value="Hủy bỏ" name="cancel" accesskey="0">
                                                    </div>								
                                                </td>
                                            </tr>							
                                        </tbody></table>
                                </td>
                            </tr>
                        </tbody></table>
                </fieldset>
                <?php foreach ($id as $row): ?>
                    <input type='hidden' name='id' id="id" value='<?= $row['id_thongtin'] ?>'>
                <?php endforeach; ?>
                <input type="hidden" value="" id="id_act" name="act">
                <input type="hidden" value="" name="view">
                <input type="hidden" value="" name="thongtinlienquan">
                <input type="hidden" value="" name="fw_or_re">
                <input type="hidden" value="" name="page">
                <?php foreach ($nguoigui as $row): ?>
                    <input type='hidden' name='nguoigui' id='nguoigui' value="<?= $row['ID_U'] ?>">
                <?php endforeach; ?>

            </form>
            <script>
                function SaveDraft()
                {
                    var err = true;
                    err = err &amp; validateInput("req",document.frmMessage.nguoinhan,"Trường này phải nhập liệu");
                    err = err &amp; err==true?validateInput("maxlen=50",document.frmMessage.nguoinhan,"Dữ liệu quá dài"):false;                   
                    err = err &amp; validateInput("req",document.frmMessage.tieude,"Trường này phải nhập liệu");
                    err = err &amp; err==true?validateInput("maxlen=100",document.frmMessage.tieude,"Dữ liệu quá dài"):false;           
    
                    if(err==true)
                    {
                        document.getElementById("id_act").value="draft";
                        document.frmMessage.action = "/traodoi/traodoi/input/";
                        document.frmMessage.submit();
                    }	
	
                }
                function Send()
                {
                    var validate_title = document.getElementById("ERRtieude");
                    validate_title.innerHTML = "";
                    
                    var err = true;
                    err = err & validateInput("req",document.frmMessage.tieude,"Tiêu đề tin nhắn không được rỗng");
                 
                    if(err==true)
                    {
                        document.getElementById("id_act").value="send";
                        document.frmMessage.action = "/message/save/";
                        document.frmMessage.submit();
                    }
                    	
                }
                function Cancel()
                {
                    if((document.frmMessage.tieude.value)!='' ||(document.frmMessage.nguoinhan.value)!='')
                    {
                        var func_ok = "document.frmMessage.action = '/message/input/';document.frmMessage.submit();";
                        var func_cancel = "";
                        displayConfirm("Bạn chắc chắn muốn hủy tin này? Toàn bộ nội dung thư sẽ bị mất","","",func_ok,func_cancel);
			
                    }
                    else
                    {
                        document.frmMessage.action = "/message/index/";
                        document.frmMessage.submit();
                    }
	
                }

                function CreateNewMessage()
                {
                    document.location.href = "/traodoi/traodoi/input";
	
                }
                function BackButtonClick()
                {
                    document.frmMessage.action = "/traodoi/traodoi/";
                    document.frmMessage.submit();
                }
                function SaveButtonClick(){
	
                    var err = true;
                    err = err &amp; validateInput("req",document.frmMessage.ten_chude,"Trường này phải nhập liệu");
                    err = err &amp; err==true?validateInput("maxlen=50",document.frmMessage.ten_chude,"Dữ liệu quá dài"):false;                   
                    if(err==true)
                    {
                        document.frmMessage.submit();
                    }	
                }
                var arr_user = new Array();
                var arr_user_cc = new Array();
                function BuildUsers()
                {
                    var opt = document.frmMessage.NGUOINHAN.options;
                    for(var i=0;i<opt.length;i++)
                    {
                        if(opt[i].selected)
                        {
                            arr_user[arr_user.length] = new Array(document.frmMessage.DEP_NGUOINHAN.value,opt[i].value,opt[i].text);	
                        }
                    }
                    exportToNguoiNhan();
                }

                function BuildUsers_cc()
                {
                    var opt = document.frmMessage.NGUOINHAN_CC.options;
                    for(var i=0;i<opt.length;i++)
                    {
                        if(opt[i].selected)
                        {
                            arr_user_cc[arr_user_cc.length] = new Array(document.frmMessage.DEP_NGUOINHAN_CC.value,opt[i].value,opt[i].text);	
                        }
                    }
                    exportToNguoiNhan_cc();
                }

                function BuildUsersAll()
                {
                    var opt = document.frmMessage.NGUOINHAN.options;
                    for(var i=0;i<opt.length;i++)
                    {
                        //if(opt[i].selected)
                        //{
                        arr_user[arr_user.length] = new Array(document.frmMessage.DEP_NGUOINHAN.value,opt[i].value,opt[i].text);	
                        //}
                    }
                    exportToNguoiNhan();
                }

                function BuildUsersAll_cc()
                {
                    var opt = document.frmMessage.NGUOINHAN_CC.options;
                    for(var i=0;i<opt.length;i++)
                    {
                        //if(opt[i].selected)
                        //{
                        arr_user_cc[arr_user_cc.length] = new Array(document.frmMessage.DEP_NGUOINHAN_CC.value,opt[i].value,opt[i].text);	
                        //}
                    }
                    exportToNguoiNhan();
                }

                function InsertIntoArr(){
                    BuildUsers();
                }

                function InsertIntoArrCC(){
                    BuildUsers_cc();
                }

                function exportToNguoiNhan()
                {
                    var nguoinhan="";
                    for(i=0;i<arr_user.length;i++)
                    {
                        nguoinhan +=arr_user[i][1]+";";	
                    }
                    if(nguoinhan!="")
                    {
                        addNguoiNhan(nguoinhan);		
                        arr_user = new Array();
                    }	 
                }

                function exportToNguoiNhan_cc()
                {
                    var nguoinhan="";
                    for(i=0;i<arr_user_cc.length;i++)
                    {
                        nguoinhan +=arr_user_cc[i][1]+";";	
                    }
                    if(nguoinhan!="")
                    {
                        addNguoiNhan_cc(nguoinhan);		
                        arr_user_cc = new Array();
                    }	 
                }
                function addNguoiNhan(value)
                {
                    var Nguoinhan=document.getElementById('nguoinhan').value;
                    if(Nguoinhan.length>0)
                    {
                        if(Nguoinhan.charAt(Nguoinhan.length-1) != ';') 
                        {
                            document.getElementById('nguoinhan').value+=";";
                        }
                    }
                    var arrNguoiNhan=Split(Nguoinhan,";");
                    var arrAddNguoiNhan=Split(value,";");	
                    if(arrAddNguoiNhan.length>0)
                    {
                        for(j=0;j<arrAddNguoiNhan.length;j++)
                        {
                            m=0;			
                            if(arrAddNguoiNhan[j]!="")
                            {
                                while(m<arrNguoiNhan.length)
                                {
                                    if((arrAddNguoiNhan[j])==(arrNguoiNhan[m]))
                                    {
                                        break;		
                                    }
                                    else
                                    {
                                        m++;
                                    }
                                }		
                                if(m==arrNguoiNhan.length)
                                {
                                    document.getElementById('nguoinhan').value+=(arrAddNguoiNhan[j])+";";			
                                }				
                            }
                        }	
                    }
                }

                function addNguoiNhan_cc(value)
                {
                    var Nguoinhan=document.getElementById('nguoinhan_cc').value;
                    if(Nguoinhan.length>0)
                    {
                        if(Nguoinhan.charAt(Nguoinhan.length-1) != ';') 
                        {
                            document.getElementById('nguoinhan_cc').value+=";";
                        }
                    }
                    var arrNguoiNhan=Split(Nguoinhan,";");
                    var arrAddNguoiNhan=Split(value,";");	
                    if(arrAddNguoiNhan.length>0)
                    {
                        for(j=0;j<arrAddNguoiNhan.length;j++)
                        {
                            m=0;			
                            if(arrAddNguoiNhan[j]!="")
                            {
                                while(m<arrNguoiNhan.length)
                                {
                                    if((arrAddNguoiNhan[j])==(arrNguoiNhan[m]))
                                    {
                                        break;		
                                    }
                                    else
                                    {
                                        m++;
                                    }
                                }		
                                if(m==arrNguoiNhan.length)
                                {
                                    document.getElementById('nguoinhan_cc').value+=(arrAddNguoiNhan[j])+";";			
                                }				
                            }
                        }	
                    }
                }

                function ToggleUsers()
                {
                    obj=document.getElementById("BuildUsers");
                    visible=(obj.style.display!="none")
                    if (visible) 
                    {
                        obj.style.display="none";   
                    } 
                    else 
                    {
                        obj.style.display="block";
                    }
                }

                function ToggleUsers_cc()
                {
                    obj=document.getElementById("BuildUsers_cc");
                    visible=(obj.style.display!="none")
                    if (visible) 
                    {
                        obj.style.display="none";   
                    } 
                    else 
                    {
                        obj.style.display="block";
                    }
                }
            </script>
            <div class="clr"></div>
        </div>
    </body>
</html>
