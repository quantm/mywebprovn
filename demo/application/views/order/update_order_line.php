<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title></title>
  <meta name="Generator" content="EditPlus" charset="UTF-8">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <link type='text/css' href='/css/general.css' rel='Stylesheet'/>
  <script src="/js/Ajax/AjaxEngine.js" type="text/javascript"></script>
  <script src="/js/SwapDiv.js" type="text/javascript"></script>
 </head>

<body>

<form name="frm" id="frm" method="POST" action="/order/save_order_line/">
<table>
<tbody>
           
            
                <tr style="background-color:#CCC">
					<td style="background-color:#CCC">MDT</td>
					<td style="background-color:#CCC">MCTDT</td>
                    <td style="background-color:#CCC">
						<select id='item' name='item' >
											<?= order_model::comboBox($item, $selected_item) ?>
						</select>
					</td>
                    
                    <td style="background-color:#CCC">
                             <strong>
                            <?php foreach ($update_order_line as $value): ?>
                            <input style="background:#CCC"  id="price" name="price" value="<?= $value['PRICE'] ?>" />
                            <?php endforeach;?>
                    </strong></td>
                    
                    <td style="background-color:#CCC">
                         <strong>
                         <?php foreach ($update_order_line as $value): ?>
                         <input style="background:#CCC"  id="quantity" name="quantity" value="<?= $value['QUANTITY'] ?>" />
                         <?php endforeach;?>
                    </strong></td>
                    
                    <td style="background-color:#CCC">
                         <strong>
                                       <select id='status' name='status' >
											<?= order_model::comboBox($stat, $sel) ?>
										</select>
                    </strong></td>
                    
                    <td style="background-color:#CCC">
                        <strong>
                         <?php foreach ($update_order_line as $value): ?>
                         <input style="background:#CCC"  id="paid" name="paid" value="<?= $value['PAID'] ?>" />
                         <?php endforeach;?>
                    </strong></td>
                    
                    <td style="background-color:#CCC">
                        <strong>
                        <input class='input_button' value='Lưu' type='button'>
                        </input>
                    </strong></td>
                    
                    <td style="background-color:#CCC">
                        <strong>
                        <input type='button' class='input_button' value='Hủy'>
                        </input>
                    </strong></td>
                </tr>
        </tbody>
        </table>
    </form>
    </body>
</html>        