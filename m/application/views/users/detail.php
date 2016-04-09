
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>Thông tin chi tiết</title>
  <meta charset="utf-8">
  <link href='/css/general.css' rel='Stylesheet'>
 <script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script>
 </head>
		
 <body>
 
	<div style="position:absolute; left: 1200px; top: 10px;">
	<a title='Đóng' href='/user/index'>X</a>
	</div>

			
	<table class="admintable">
		
<h1>THÔNG TIN CHI TIẾT</h1>    
		<tbody>
        
        
        <div style="float:right">
			<?php foreach($emp as $row):?>
			<img src='/uploads/<?=$row['USER_IMAGE']?>'width=175 height=175/>
			  <?php endforeach?>
		  <br />
          <br />
          <center><font color="#FF0000" face="Arial Black, Gadget, sans-serif"> Ảnh cán bộ</font></center>
          </div>
		
        <tr>
			<td width="132" class="key">
				Họ và tên
			</td>

		  
			<td width="180">
				<?php foreach ($emp as $row):?>	
				<?php echo $row['EMP_NAME']?>
				<?php endforeach?>
			</td>


			<td width="150" class="key">Tình trạng công việc</td>
			<td width="184">
				<?php foreach ($emp as $row):?>	
				<?php echo $row['NGHIVIEC']?>
				<?php endforeach?>
			</td>
		</tr>
					 
		<tr>
			<td class="key">Ngày sinh </td>
			<td nowrap>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['EMP_BIRTHDAY']?>
				<?php endforeach?>
			</td>
			<td class="key">Cơ quan</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['COQUAN']?>
				<?php endforeach?>
			</td>
		</tr>
	
		<tr>
			<td class="key">Số điện thoại</td>

			<td>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['PHONE']?>
				<?php endforeach?>
		  </td>

			<td class="key">Phòng ban</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['DEP_NAME']?>
				<?php endforeach?>
			</td>
		</tr>


		<tr>
			<td class="key">Giới tính</td>

			<td>
			<?php foreach ($emp as $row):?>	
				<?php echo $row['SEX']?>
				<?php endforeach?>
			</td>
            
			<td class="key">Chức vụ</td>
			<td>
				 <?php foreach ($emp as $row):?>	
				<?php echo $row['CHUCVU']?>
				<?php endforeach?>
			</td>
		</tr>

	<tr>
			<td class="key">Số CMND</td>

			<td>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['CMND']?>
				<?php endforeach?>
			</td>


  <td class="key">Trình độ</td>
			
            <td>
    			<?php foreach ($emp as $row):?>	
				<?php echo $row['TRINHDO']?>
				<?php endforeach?>
			</td>
		</tr>

			<tr>
			<td class="key">Ngày cấp CMND</td>

			<td nowrap>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['NGAYCAP_CMND']?>
				<?php endforeach?>
			</td>

			<td class="key">Điện thoại nhà riêng</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['HOMEPHONE']?>
				<?php endforeach?>
			</td>
		</tr>

			<tr>
			<td class="key">
				<span title="Nơi nhập môn">Nơi cấp CMND</span>
			</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['NOICAP_CMND']?>
				<?php endforeach?>
			</td>

			<td class="key">Di động</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['MOBILES']?>
				<?php endforeach?>
			</td>
		</tr>

	<tr>
			

			 <td class="key">Ngày đi làm </td>
			<td nowrap>
				 <?php foreach ($emp as $row):?>	
				<?php echo $row['NGAYDILAM']?>
				<?php endforeach?>
			</td>

			<td class="key">Địa chỉ Email</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['EMAIL']?>
				<?php endforeach?>
			</td>
		</tr>

	<tr>

		<td class="key">Ngày nghỉ việc </td>
			<td nowrap>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['NGAYNGHIVIEC']?>
				<?php endforeach?>
			</td>

			<td class="key">Website</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<a href='<?=$row['WEBSITES']?>'><?=$row['WEBSITES']?></a>
				<?php endforeach?>
			</td>
		</tr>

			<tr>
			<td class="key">Hôn nhân</td>

			<td>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['HONNHAN']?>
				<?php endforeach?>
			</td>

			<td class="key">Địa chỉ thường trú</td>

			<td>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['DIACHI_THUONGTRU']?>
				<?php endforeach?>
			</td>

		</tr>


		<tr>
			<td class="key">Số sổ BH</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['SO_BAOHIEM']?>
				<?php endforeach?>
		  </td>

			<td class="key">Nguyên quán</td>

			<td>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['NGUYENQUAN']?>
				<?php endforeach?>
			</td>
		</tr>
        
        <tr>
			<td class="key">Ngày cấp sổ BH</td>
			<td nowrap>
				<?php foreach ($emp as $row):?>	
				<?php echo $row['NGAYCAP_BAOHIEM']?>
				<?php endforeach?>
			</td>

            <td class="key">Thông tin cá nhân khác </td>
			
			<td>
			 <?php foreach ($emp as $row):?>	
				<?php echo $row['OTHER_INFO']?>
				<?php endforeach?>
			</td>
		</tr>
        
    
	
	</tbody></table>
		

<input type='hidden' name='id' id='id' value='<?=$id?>'/>
			
 </body>
</html>

<script>
				
			
</script>
