<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>Cập nhật thông tin nhân viên</title>
  <meta charset="utf-8">
  <link href='/css/general.css' rel='Stylesheet'>
 <script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script>
 </head>
		
 <body>
 
<form id=frmUpdate name=frmUpdate action='/user/update/' method='post'>			
	<table class="admintable">
		
        			<h1>CẬP NHẬT THÔNG TIN NHÂN VIÊN</h1>     
		<tbody>
		
		 <div style="position:absolute;margin-top:-30;margin-left:800">
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
				<input class='input_update_text' type=text name='name' id='name' value='<?=$row['EMP_NAME']?>'>
				<?php endforeach?>
				<span id="ERRho_nv" class="box_erro_area"></span>
			</td>


			<td width="150" class="key">Tình trạng công việc</td>
			<td width="184">
				<?php foreach ($emp as $row):?>	
				<?php echo $row['NGHIVIEC']?>
				<?php endforeach?>
    			<span id="ERRten_nv" class="box_erro_area"></span>
			</td>
		</tr>
					 
		<tr>
			<td class="key">Ngày sinh </td>
			<td nowrap>
				<?php foreach ($emp as $row):?>	
				<input type="text" value='<?=$row['EMP_BIRTHDAY']?>' class='input_update_text' id="ngaysinh" name="ngaysinh">
					<img height="17" alt="" onclick="popCalendar.show(this, 'ngaysinh', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;" src="/images/calendar.jpg">
				<?php endforeach?>
			<span id="ERRdienthoai" class="box_erro_area"></span>
			</td>

			<td class="key">Cơ quan</td>
			<td>
				<select id='coquan' name='coquan'>
					<?=user_model::coquanBox($coquan, $coquan)?>
				</select>
			</td>
		</tr>
	
		<tr>
			<td class="key">Số điện thoại</td>

			<td>
				<?php foreach ($emp as $row):?>	
				<input type=text class=input_update_text name=phone id=phone value='<?=$row['PHONE']?>'>
				<?php endforeach?>
			<span id="ERRngaysinh" class="box_erro_area"></span>
		  </td>

			<td class="key">Phòng ban</td>
			<td>
			<select id='department' name='department'>
				<?=user_model::departmentBox($dep,$dep)?>
			</select>	
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
			<select id='chucvu' name='chucvu'><?=user_model::chucvuBox($chucvu, $chucvu)?></select>	
    			<span id="ERRnghe_nghiep" class="box_erro_area"></span>
			</td>
		</tr>

	<tr>
			<td class="key">Số CMND</td>

			<td>
				<?php foreach ($emp as $row):?>	
				<input class='input_update_text' type=text name='cmnd' id='cmnd' value='<?php echo $row['CMND']?>'>
				<?php endforeach?>
			</td>


  <td class="key">Trình độ</td>
			
            <td>
    			<select id='level' name='level'>
							<?=user_model::levelBox($level, $level) ?>
				</select>
			</td>
		</tr>

			<tr>
			<td class="key">Ngày cấp CMND</td>

			<td nowrap>
				<?php foreach ($emp as $row):?>	
				<input class='input_update_text' type=text name='ngaycap_cmnd' id='ngaycap_cmnd' value='<?=$row['NGAYCAP_CMND']?>'>
				<img height="17" alt="" onclick="popCalendar.show(this, 'ngaycap_cmnd', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;" src="/images/calendar.jpg">
				<?php endforeach?>
			<span id="ERRthap_trai" class="box_erro_area"></span>
			</td>

			<td class="key">Điện thoại nhà riêng</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<input class='input_update_text' type=text name='homephone' id='homephone' value='<?=$row['HOMEPHONE']?>'>
				<?php endforeach?>
			<span id="ERRtruong_trai" class="box_erro_area"></span>
			</td>
		</tr>

			<tr>
			<td class="key">
				<span title="Nơi nhập môn">Nơi cấp CMND</span>
			</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<input class='input_update_text' type=text name='noicap_cmnd' id='noicap_cmnd' value='<?php echo $row['NOICAP_CMND']?>'>
				<?php endforeach?>
			<span id="ERRnoi_nhap_mon" class="box_erro_area"></span>
			</td>

			<td class="key">Di động</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<input class='input_update_text' type=text name='mobile' id='mobile' value='<?php echo $row['MOBILES']?>'>
				<?php endforeach?>
			<span id="ERRnam_nhap_mon_al" class="box_erro_area"></span>
			</td>
		</tr>

	<tr>
			

			 <td class="key">Ngày đi làm </td>
			<td nowrap>
				 <?php foreach ($emp as $row):?>	
				<input class='input_update_text' type=text name='ngaydilam' id='ngaydilam' value='<?php echo $row['NGAYDILAM']?>'>
				<img height="17" alt="" onclick="popCalendar.show(this, 'ngaydilam', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;" src="/images/calendar.jpg">
				<?php endforeach?>
			<span id="ERRnam_qui_lieu_al" class="box_erro_area"></span>
			</td>

			<td class="key">Địa chỉ Email</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<input  class='input_update_text' name='email' id='email' value='<?=$row['EMAIL']?>'>
				<?php endforeach?>
			<span id="ERRnam_nhap_mon_dl" class="box_erro_area"></span>
			</td>
		</tr>

	<tr>

		<td class="key">Ngày nghỉ việc </td>
			<td nowrap>
				<?php foreach ($emp as $row):?>	
				<input  class='input_update_text' type='text' name='ngaynghiviec' id='ngaynghiviec' value='<?=$row['NGAYNGHIVIEC']?>'>
				<img height="17" alt="" onclick="popCalendar.show(this, 'ngaynghiviec', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;" src="/images/calendar.jpg">
				<?php endforeach?>
			<span id="ERRid_vu" class="box_erro_area"></span>
			</td>

			<td class="key">Website</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<input class='input_update_text' type='text' name='websites' id='websites' value='<?=$row['WEBSITES']?>'>
				<?php endforeach?>
			<span id="ERRdang_ban_thanh_danh" class="box_erro_area"></span>
			</td>
		</tr>

			<tr>
			<td class="key">Hôn nhân</td>

			<td>
				<?php foreach ($emp as $row):?>	
				<input class='input_update_text' type='text' name='honnhan' id='honnhan'value='<?=$row['HONNHAN']?>'/>
				<?php endforeach?>
			<span id="ERRnam_qui_lieu_dl" class="box_erro_area"></span>
			</td>

			<td class="key">Địa chỉ thường trú</td>

			<td>
				<?php foreach ($emp as $row):?>	
					<input class='input_update_text' type='text' name='diachi_thuongtru' id='diachi_thuongtru' value='<?=$row['DIACHI_THUONGTRU']?>'>
				<?php endforeach?>
			<span id="ERRnam_vao_co_quan" class="box_erro_area"></span>
			</td>

		</tr>


		<tr>
			<td class="key">Số sổ BH</td>
			<td>
				<?php foreach ($emp as $row):?>	
				<input class='input_update_text' type='text'  id='so_baohiem' name='so_baohiem' value='<?=$row['SO_BAOHIEM']?>'>
				<?php endforeach?>
			<span id="ERRid_vu" class="box_erro_area"></span>
		  </td>

			<td class="key">Nguyên quán</td>

			<td>
				<?php foreach ($emp as $row):?>	
				<input class='input_update_text' type='text' name='nguyenquan' id='nguyenquan' value='<?=$row['NGUYENQUAN']?>'>
				<?php endforeach?>
			<span id="ERRthanhdanh" class="box_erro_area"></span>
			</td>
		</tr>
        
        <tr>
			<td class="key">Ngày cấp sổ BH</td>
			<td nowrap>
				<?php foreach ($emp as $row):?>	
				<input class='input_update_text' typpe='text' name='ngaycap_baohiem' id='ngaycap_baohiem' value='<?=$row['NGAYCAP_BAOHIEM']?>'/>
				<img height="17" alt="" onclick="popCalendar.show(this, 'ngaycap_baohiem', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;" src="/images/calendar.jpg">
				<?php endforeach?>
			<span id="ERRid_vu" class="box_erro_area"></span>
			</td>

            <td class="key">Ảnh cán bộ</td>
			
			<td>
			<input type="file" name='userfile' id='userfile' size="20" />
			  <span id="ERRid_vu" class="box_erro_area"></span>
			</td>
		</tr>
        
		<tr>
        		<td  align="center" colspan="2"><input type=submit id='submit' name='submit' value='Cập nhật thông tin nhân viên'/ class='input_button'></td>
                <td class="key">
                           Thông tin cá nhân khác
				</td>
                <td nowrap align="right">
							<?php foreach ($emp as $row):?>	
						<textarea class='input_update_text' cols="100%"  name='other_info' id='other_info' rows="2"><?=$row['OTHER_INFO']?></textarea>
							<?php endforeach?>
				</td>
    	 </tr>
	
	</tbody></table>
	
<input type='hidden' name='id' id='id' value='<?=$id?>'/>
</form>			
 </body>
</html>

<script>
				
			
</script>
