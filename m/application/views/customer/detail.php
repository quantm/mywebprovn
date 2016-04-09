<?php 
	require_once 'application/models/common.php';
	echo ProjectCommon::useDlgConfirm();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>Thông tin chi tiết</title>
  <meta charset="utf-8">
  <link href='/css/general.css' rel='Stylesheet'>
	<script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script>
	<script type="text/javascript" src="/js/validate.js"></script>
	<script type="text/javascript" src="/js/dlg_confirm.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>

 </head>
		
 <body>
 
	<div style="position:absolute; left: 1200px; top: 10px;">
	<a title='Đóng' href='/department/index/'>X</a>
	</div>

<form id='frm'	name='frm' method='post'>		
	<table width="97%">
		
				<caption>
							<font color=red>Danh sách phòng ban của</font>
							<? foreach($emp_caption as $row):?>
							<?=$row['NAME']?>
							<? endforeach?>
				</caption>  
	
		<thead>
					<tr>
							<th>#</th>
							<th width='1px'style="text-align: center;"><input type=checkbox name=DELALL onClick="SelectAll(this,'DEL')"></th>
							<th>Mã phòng ban</th>
							<th>Tên phòng ban</th>
							<th colspan='2'><div  align='center'>Chức năng</div></th>

					</tr>
		</thead>
       
	 <tbody>
				<?php
							$stt=0;
							$i=0;
							foreach ( $emp as $row ){
								$stt++;
				?>
						<tr align='center'>
						<td nowrap><?php echo $stt ?></td> 
						<td width='1px'align="center"><input type=checkbox name=DEL[] id=DEL[] value='<?php echo $row['ID_DEP'] ?>'></td>
							<td width="180">		
								<?php echo $row['KYHIEU_PB']?>	
							</td>
							<td width="184">
								<?php echo $row['NAME']?>
							</td>
							<td>
									<a href='javascript:
                                            {
												alert("Bạn có muốn xóa phòng ban này không?");
													document.frm.action = "/department/delete";
													document.frm.submit();				
                                            }'>Xóa
									</a>
							</td>
							<td>
									<a href='/department/update/<?=$row['ID_DEP']?>' >Cập nhật</a>
							</td>
						</tr>
				<?php
								$i = (-1+$i)*-1;
							}
				?>		
	</tbody>
	
	</table>
		

<input type='hidden' name='id' id='id' value='<?=$id?>'/>
</form>			
 </body>
</html>
