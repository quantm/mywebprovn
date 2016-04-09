<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 12">
<meta name=Originator content="Microsoft Word 12">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:1;
	mso-generic-font-family:roman;
	mso-font-format:other;
	mso-font-pitch:variable;
	mso-font-signature:0 0 0 0 0 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520092929 1073786111 9 0 415 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0mm;
	margin-right:0mm;
	margin-bottom:10.0pt;
	margin-left:0mm;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
.MsoPapDefault
	{mso-style-type:export-only;
	margin-bottom:10.0pt;
	line-height:115%;}
@page Section1
	{size:612.0pt 792.0pt;
	margin:72.0pt 72.0pt 72.0pt 72.0pt;
	mso-header-margin:36.0pt;
	mso-footer-margin:36.0pt;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
-->
</style>

</head>

<body lang=EN-US style='tab-interval:36.0pt'>

<div class=Section1>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
 mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0mm 5.4pt 0mm 5.4pt'>
   <caption>
            <font color='blue' size='4'><b>HÓA ĐƠN BÁN HÀNG</b></font> 
        </caption>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td valign=top style='border:solid black 1.0pt;
  mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0mm 5.4pt 0mm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0mm;margin-bottom:.0001pt;line-height:
  normal'>Tên mặt hàng</p>
  </td>
  <td valign=top style='border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0mm 5.4pt 0mm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0mm;margin-bottom:.0001pt;line-height:
  normal'>Số lượng</p>
  </td>
  <td valign=top style='border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0mm 5.4pt 0mm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0mm;margin-bottom:.0001pt;line-height:
  normal'>Đơn giá</p>
  </td>
  <td valign=top style='border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0mm 5.4pt 0mm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0mm;margin-bottom:.0001pt;line-height:
  normal'>Thành tiền</p>
  </td>
 </tr>
 <?php
foreach ($detail as $row) {
    ?>
 <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
  <td valign=top style='border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0mm 5.4pt 0mm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0mm;margin-bottom:.0001pt;line-height:
  normal'><font color='blue'><?php echo $row['NAME'] ?></font></p>
  </td>
  <td valign=top style='border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0mm 5.4pt 0mm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0mm;margin-bottom:.0001pt;line-height:
  normal'><font color='blue'><?= $row['QUANTITY'] ?></font></p>
  </td>
  <td valign=top style='border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0mm 5.4pt 0mm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0mm;margin-bottom:.0001pt;line-height:
  normal'><font color='blue'><?= $row['PRICE'] ?> VNĐ</font></p>
  </td>
  <td valign=top style='border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0mm 5.4pt 0mm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0mm;margin-bottom:.0001pt;line-height:
  normal'><font color='blue'><? echo bcmul($row['QUANTITY'], $row['PRICE']) ?> VNĐ</font></p>
  </td>
 </tr>
     <?php
}
?>

 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td colspan="3" valign=top style='border:solid black 1.0pt;
  mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0mm 5.4pt 0mm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0mm;margin-bottom:.0001pt;line-height:
  normal'><font color='green'><b><span class="MsoNormal" style="margin-bottom:0mm;margin-bottom:.0001pt;line-height:
  normal">Tổng tiền phải trả</span></b></font></p>
  </td>
  <td valign=top style='border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0mm 5.4pt 0mm 5.4pt'>
    <p class=MsoNormal style='margin-bottom:0mm;margin-bottom:.0001pt;line-height:
  normal'>  <font color=red>
        <?php
        foreach ($total_paid as $row)
            echo $row['PAID_ROW']; echo '  ';
        echo 'VNĐ';
        ?>
        </font></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

</div>

</body>

</html>
<script>print();</script>