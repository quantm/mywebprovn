<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-vn" lang="vi-vn" dir="ltr" id="minwidth" >

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="/css/general.css" />
        <script type="text/javascript" src='/js/AjaxEngine.js'></script>
    </head>
    <body id="minwidth-body">

        <form name="frmTinnhan" action="/message/" method="POST">

            <fieldset>
                <legend><img src='/images/e_message.png' height='48' width='48'>TIN NHẬN</legend>

                <table cellpadding="0" cellspacing="0" class="adminlist" style="margin-top:5px" >
                    <tr>
                        <td width="15%" valign="top">			
                            <div class="urbangreymenu">
                                <div class="headerbar">Tin nhắn nội bộ</div>
                                <ul>
                                    <li><a  href="/message/input/"><span>Soạn tin</span></a></li>
                                    <li><a onclick="viewInbox(); return false;" href="#"><span>Tin nhận</span><font color="#0B55C4" id="unreadNumber"><?php echo $unread > 0 ? " (<font color=red>" . $unread . "</font>)" : ""; ?></font></a></li>
                                    <li><a onclick="viewSentItems(); return false;" href="#"><span>Tin đã gửi</span></a></li>
                                </ul>
                            </div>
                        </td>
                        <td width="85%">

                            <div class="traodoi_search_tb">  </div>					

                            <table width="100%" cellpadding="0" cellspacing="0" border="0">	
                                <tr>
                                    <td colspan="2" style="background: #f0f0f0;">
                                        <a href="#" onclick="Toggle('thongtinchitiet')"><b>Tin nhận</b></a>							    																	
                                    </td>
                                </tr>					
                                <tr id='thongtinchitiet' >
                                    <td colspan="2">
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td colspan="2" style="background: #F6F6F6; border-color:#CCCCCC; border-width:1px; border-style:dashed">
                                                    <div class="required">
                                                        <label>Người gửi :</label>	
                                                        <div style="float:left;margin-top:3px;margin-left:5px">
                                                            <font color="blue">     
                                                                <? foreach ($content as $row): ?>
                                                                    <?= $row['USERNAME'] ?>
                                                                    <input type="hidden" name="nguoinhan" value="<?= $row['USERNAME'] ?>">
                                                                    <? endforeach ?>
                                                                    <i>
                                                                        (<? foreach ($content as $row): ?>
                                                                            <?= $row['EMP_NAME'] ?>
                                                                        <? endforeach ?>)
                                                                    </i>
                                                            </font>
                                                        </div>						

                                                    </div>	
                                                    <div class="clr"></div>
                                                    <div class="required">
                                                        <label>Danh sách người nhận </label>
                                                        <div style="float:left;margin-top:1px;margin-left:5px">
                                                            <table style="margin-top:20px"> 

                                                                <tr>
                                                                    <td  style="background: #F6F6F6"><b>Tên đăng nhập</b></td>
                                                                    <td  style="background: #F6F6F6"><b>Họ tên</b></td>
                                                                </tr>

                                                                <?php
                                                                foreach ($guitu as $row) {
                                                                    if (!$row['is_cc']) {

                                                                        if ($row['danhan'] == 1) {
                                                                            ?>
                                                                            <tr>
                                                                                <td style="background: #F6F6F6"><font color=red><?php echo $row['USERNAME'] ?></font></td> 
                                                                                <td style="background: #F6F6F6"><font color=red><?php echo $row['EMP_NAME'] ?></font></td>
                                                                            </tr>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <tr>
                                                                                <td style="background: #F6F6F6"><?php echo $row['USERNAME'] ?></td> 
                                                                                <td style="background: #F6F6F6"><?php echo $row['EMP_NAME'] ?></td>
                                                                            </tr>

                                                                            <?
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                                <tr>
                                                                    <td style="background: #F6F6F6" colspan="2"><font color="blue">Chú ý: tên có màu đỏ là tên những người đã đọc tin nhắn</font></td>
                                                                </tr>
                                                            </table>
                                                        </div>									
                                                    </div>
                                                    <div class="clr"></div>
                                                    <div class="required">
                                                        <label>CC :</label>

                                                        <div style="float:left;margin-top:-220px;margin-left:5px"> 
                                                            <table style="margin-top:225px">
                                                                <tr>
                                                                    <td  style="background: #F6F6F6"><b>Tên đăng nhập</b></td>
                                                                    <td  style="background: #F6F6F6"><b>Họ tên</b></td>
                                                                </tr>

                                                                <?php
                                                                foreach ($receive_cc as $row) {


                                                                    if ($row['danhan'] == 1) {
                                                                        ?>
                                                                        <tr>
                                                                            <td style="background: #F6F6F6"><font color=red><?php echo $row['USERNAME'] ?></font></td> 
                                                                            <td style="background: #F6F6F6"><font color=red><?php echo $row['EMP_NAME'] ?></font></td>
                                                                        </tr>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <tr>
                                                                            <td style="background: #F6F6F6"><?php echo $row['USERNAME'] ?></td> 
                                                                            <td style="background: #F6F6F6"><?php echo $row['EMP_NAME'] ?></td>
                                                                        </tr>

                                                                        <?
                                                                    }
                                                                }
                                                                ?>
                                                            </table>
                                                        </div>							
                                                    </div>	
                                                    <br>
                                                        <div class="clr"></div>
                                                        <div class="required">
                                                            <label id="lblTextIput">Tiêu đề :</label>	
                                                            <div style="float:left;margin-top:3px;margin-left:5px">
                                                                <? foreach ($content as $row): ?>
                                                                    <?= $row['tieude'] ?>
                                                                    <input type="hidden" name="tieude" value="<?= $row['tieude'] ?>">
                                                                    <? endforeach ?>
                                                            </div>

                                                        </div>
                                                        <div class="clr"></div>
                                                        <div class="required">
                                                            <label id="lblTextIput">Nội dung tin nhắn :</label>	
                                                            <div style="float:left;margin-top:-9px;margin-left:5px">
                                                                <? foreach ($content as $row): ?>
                                                                    <?= $row['noidung'] ?>
                                                                    <input type="hidden" name="tieude" value='<?= $row['noidung'] ?>'>
                                                                    <? endforeach; ?>
                                                            </div>

                                                        </div>
                                                        <div class="clr"></div>								
                                                        <div class="required">
                                                            <label id="lblTextIput">Tệp đính kèm</label>
                                                            <div id="idFileDinhKem" style="margin-top:3px">
                                                                <table 
                                                                <? foreach ($attachment as $row): ?>
                                                                        <tr>
                                                                            <td style="background: #F6F6F6"><a href='#' onclick="ItemDownload()"><?= $row['FILENAME'] ?></a></td>
                                                                        </tr>
                                                                        <input type="hidden" name='md5' id="md5" value="<?= $row['MASO'] ?>"></input>
                                                                    <? endforeach; ?>
                                                                </table>    
                                                            </div>
                                                            <span class="box_erro_area">
                                                            </span>
                                                        </div>	
                                                        <div class="clr"></div>		

                                                </td>
                                            </tr>                                                                   	
                                        </table>
                                    </td>

                                </tr>	

                            </table>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr height="50">
                                    <td style="background: #f0f0f0;" colspan="2">
                                        <div style="float:left;margin-left:10px;">
                                            <input  accesskey="9" type="button" class="input_button" name="send" value="Phản hồi" title="Phản hồi" onclick="Reply('<?php echo $id ?>')">
                                                <input  accesskey="9" type="button" class="input_button" name="send" value="Phản hồi tất cả" title="Phản hồi" onclick="ReplyAll('<?php echo $id ?>')">
                                                    <input  type="button" class="input_button"name="forward" value="Chuyển tiếp" onclick="Forward('<?php echo $id ?>')">
                                                        <input type="button" class="input_button" accesskey="0" name="cancel" value="Xóa" title="Xóa" onclick="Delete('<?php echo $id ?>')">
                                                            </div>								
                                                            </td>
                                                            </tr>							
                                                            </table>
                                                            </td>
                                                            </tr>
                                                            </table>
                                                            </fieldset>

                                                            <input type="hidden" name="act" id="id_act" value="">
                                                                <input type="hidden" id='idreply' name="idreply" value=""></input>
                                                                <input type="hidden" id='view' name="view" value="">
                                                                    <input type="hidden" name="comeFrom" value="listForm">
                                                                        <input type="hidden" name="DEL[]" id="DEL">
                                                                            <input type="hidden" name="page" value="1">
                                                                                </form>
        <script>
                                                                                    function ItemDownload()
                                                                                    {
                                                                                        document.frmTinnhan.action='/file/download/';
                                                                                        document.frmTinnhan.submit();
                                                                                    }
                                                                                    
                                                                                    function Reply(id)
                                                                                    {
                                                                                        document.frmTinnhan.action = "/message/input/idreply/"+id;
                                                                                        document.getElementById('idreply').value=id;
                                                                                        document.frmTinnhan.submit();
                                                                                    }

                                                                                    function ReplyAll(id)
                                                                                    {
                                                                                        document.frmTinnhan.action = "/message/input/idreplyall/"+id;
                                                                                        document.frmTinnhan.submit();
                                                                                    }

                                                                                    function Forward(id)
                                                                                    {
                                                                                        document.frmTinnhan.action = "/message/input/idforward/"+id;
                                                                                        document.frmTinnhan.submit();	
                                                                                    }
                                                                                    function Delete(id)
                                                                                    {
                                                                                        if(confirm("Bạn muốn xóa tin này"))
                                                                                        {
                                                                                            document.getElementById("DEL").value=id;
                                                                                            document.frmTinnhan.action = "/message/delete";		
                                                                                            document.frmTinnhan.submit();	
                                                                                        }
                                                                                    }

                                                                                    function CreateNewMessage()
                                                                                    {
                                                                                        document.location.href = "/message/input";
	
                                                                                    }
                                                                                    function BackButtonClick()
                                                                                    {
                                                                                        document.frmTinnhan.action = "/message/index/";
                                                                                        document.frmTinnhan.submit();
                                                                                    }
                                                                                    function SaveButtonClick(){
	
                                                                                        var err = true;
                                                                                        err = err & validateInput("req",document.frmTinnhan.ten_chude,"Trường này phải nhập liệu");
                                                                                        err = err & err==true?validateInput("maxlen=50",document.frmTinnhan.ten_chude,"Dữ liệu quá dài"):false;                   
                                                                                        if(err==true)
                                                                                        {
                                                                                            document.frmTinnhan.submit();
                                                                                        }	
                                                                                    }
                                                                                    function viewDraft()
                                                                                    {
                                                                                        document.frmTinnhan.view.value="draft";
                                                                                        document.frmTinnhan.submit();	
                                                                                    }
                                                                                    function viewInbox()
                                                                                    {
                                                                                        document.frmTinnhan.view.value="inbox";
                                                                                        document.frmTinnhan.submit();	
                                                                                    }
                                                                                    function viewSentItems()
                                                                                    {
                                                                                        document.frmTinnhan.view.value="sentitems";
                                                                                        document.frmTinnhan.submit();	
                                                                                    }
                                                                                    function Toggle(item) 
                                                                                    {
                                                                                        obj=document.getElementById(item);
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
                                                                                <div class="b">
                                                                                    <div class="b">
                                                                                        <div class="b"></div>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                                <div class="clr"></div>
                                                                                </div>
                                                                                <div class="clr"></div>
                                                                                </div>
                                                                                </div>

                                                                                </body>
                                                                                </html>