<meta charset="utf-8">
<?php
require_once 'application/models/common.php';
require_once 'application/models/autocomplete_model.php';
echo ProjectCommon::useDlgConfirm();
?>
<script type="text/javascript" src="/js/Ajax/AjaxEngine.js"></script>
<script type="text/javascript" src="/js/autocomplete.js"></script>
 <script type="text/javascript" src="/js/dlg_confirm.js"></script>
<link rel="stylesheet" type="text/css" href="/css/general.css" />
<script type="text/javascript" src="/js/validate.js"></script>
<form name="frmInbox" action="" method="POST">
    
	<fieldset>
			<legend><img src='/images/e_message.png' height='48' width='48'>Thư mục tin nhắn</legend>
	<table cellpadding="0" cellspacing="0" class="adminlist" style="margin-top:5px" >
        <tr>
            <td width="15%" valign="top">			
                <div class="urbangreymenu">
                    <div class="headerbar">Tin nhắn nội bộ</div>
                    <ul>
                        <li><a href="/message/input/"><span style='border-bottom-width:1px;'>Soạn tin</span></a></li>
                        <li><a href="#" onclick="viewInbox(); return false;">
							<span style='border-bottom-width:1px;'>Tin đến</span>
							(<font color="#0B55C4" id="unreadNumber"><?php echo $unread ?></font>)
							</a>
						</li>
                        <li><a href="#"  onclick="viewSentItems(); return false;">
							<span style='border-bottom-width:1px;'>Tin đã gửi</span>
						</a>
						</li>
                        <li><a href="#"  onclick="viewDraft(); return false;">
							<span style='border-bottom-width:1px;'>Tin nháp</span>
						(<font color="#0B55C4"></font>)
						</a>
						</li>
                    </ul>
                </div>	
            </td>
            <td width="85%" valign="top">
                <b>Thư mục tin đã gửi</b>
				<div class="traodoi_search_tb">
                    <div style="float:left;width:100%;height:20px;">
                        <div style="float:left">
                            &nbsp;
                            Tìm theo tiêu đề:
                            <?php
                            echo ProjectCommon::AutoComplete(
                                    autocomplete_model::getTieude(), "id_thongtin", "tieude", "id_thongtin", "search", true, "width:200px", "ID_SEARCH", "search", $auto, "AutoSearch Box");
                            ?> 
                            &nbsp;
                            <input  type="button" class="input_button" onclick="document.frmInbox.submit();" name="send" value="Tìm" title="Tìm">
                        </div>
                        <div style="float:left">
                            &nbsp;
                            Tìm theo người gửi:
                            <?php
                            echo ProjectCommon::AutoComplete(
                                    autocomplete_model::getKeyword(), "ID_U", "EMP_NAME", "ID_U", "nguoigui", true, "width:200px", "ID_SEARCH", "nguoigui", $auto, "AutoSearch Box");
                            ?>  
                            &nbsp;
                            <input  type="button" class="input_button" onclick="document.frmInbox.submit();" name="send" value="Tìm" title="Tìm">
                        </div>
                        <div style="float:right">
                            Tìm theo chủ đề
                            <select name="filter_object"  style="width:200px" id="filter_object" class="inputbox" size="1" onchange="document.frmInbox.submit();">
                                <?= message_model::chudeCombo($subject, $subject) ?>								
                            </select>
                        </div>
                    </div>				
                </div>
                <div>	   
                    <table width="100%" summary="List of messages" class="adminlist" id="inbox">
                        <caption><em>&nbsp;</em></caption>

                        <thead>
                            <tr>
                                <th align=center width="15"><input type=checkbox name=DELALL onclick="SelectAll(this,'DEL')"></th>	
                                <th width="50%">Tiêu đề</th>												
                                <th>Ngày gửi</th>
							</tr>
                        </thead>                  
                        <tbody id="body">
								<?php foreach($sent_item as $data): ?>
								<tr>
										<td><input type='checkbox' name=DEL[] value=<?=$data['ID']?>></td>
										<td><a href='#' onclick='ItemClick(<?=$data['ID']?>)'><?=$data['TITLE']?></a></td>
										<td><?=$data['NGAYGUI']?></td>
								</tr>
								<?php endforeach?>
						</tbody>					
						
						
					
                    </table>
                </div>
			
                <div style="float:left;width:100%;height:30px;">
                     <div style="float:left;height:30px" >
                         <input type="button" class="input_button" onclick="DeleteButtonClick()" class="inputbutton" name="top_bpress_delete" value ="Xóa tin nhắn" title="Xóa (các) thư đã chọn" >
                     </div>
                </div>
				
            </td>
        </tr>
    </table>
	</fieldset>
    <div id="div_hidden"></div>
    <input type="hidden" name="comeFrom" value="listForm">
    <input type="hidden" name="view" value="">
    <input type="hidden" id="id_tinnhan" name='id_tinnhan'></input>
    <input type='hidden' id='dannhan' name="dannhan"></input>
    <input type='hidden' id='view' name="view"></input>
</form>
<script>
    function viewDraft()
    {
        document.frmInbox.view.value="draft";
        document.frmInbox.submit();	
    }
    function viewInbox()
    {
        document.frmInbox.action="/message/index/";
        document.frmInbox.submit();	
    }
    function viewSentItems()
    {
        document.frmInbox.view.value="sentitems";
        document.frmInbox.submit();	
    }

    function CreateNewMessage()
    {
        document.location.href = "/message/input";
	
    }
    
  
    function ItemClick(id)
    {    
        document.frmInbox.action = "/message/inbox/id/"+id;
        document.getElementById('id_tinnhan').value=id;
        document.getElementById('dannhan').value=1;
        document.getElementById('view').value=1;                    
        document.frmInbox.submit();
    }
    function DeleteButtonClick(){
        var mess = true;
        mess = validateInput("selone_check","DEL[]","Chọn ít nhất một tin nhắn để xóa");
        if(mess){
            var func_ok = "document.frmInbox.action = '/message/delete';document.frmInbox.submit();";
            var func_cancel = "";
            displayConfirm("Bạn có muốn xóa tin nhắn đã gửi  không?","","",func_ok,func_cancel);
			
            /*if(confirm("<?= MSG11012001 ?>")){
			
                }*/
        }else{
            alert("Chọn ít nhất một tin nhắn để xóa");
        }
    }

   
   
   
</script>
