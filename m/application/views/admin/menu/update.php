<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset='utf-8'/>
        <link href="/css/general.css" type="text/css" rel="stylesheet" />
    </head>

    <body>
        <form enctype="multipart/form-data" id=frm name=frm action='/admin/save_update/' method='post'>

            <fieldset>
                <legend>Quản trị thực đơn - Cập nhật</legend>
                <table class='admintable'>

                    <tr>
                        <td class='key'>Tên món ăn</td>
                        <td width="261">
                            <? foreach ($menu as $row): ?>
                                <input class='input_update_text' type='text' name='name' id='name' value='<?= $row['NAME'] ?>'>
                                <? endforeach; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class='key'>Giá</td>
                        <td>
                            <? foreach ($menu as $row): ?>
                                <input class='input_update_text' type='text' name='price' id='price' value='<?= $row['PRICE'] ?>'>
                                <? endforeach; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class='key'>Hình ảnh</td>
                        <td nowrap><input name="userfile" type="file" /> </td>
                    </tr>
					<tr>
                        <td class='key'>Mô tả</td>
                        <td nowrap><input name="description" id='description' value=<?=$row['DESCRIPTION']?>/> </td>
                    </tr>

                    <tr>
                        <td class='key'>Kiểu</td>
                        <td nowrap>
                            Cơm <input title='Cơm' type='radio' name='type' <?php
                                foreach ($menu as $row)
                                    if ($row['TYPE'] == '1')
                                        echo'checked="checked"'
                                        ?> id='type' value="1"/>
                            Sợi <input title='Sợi' type='radio' name='type'<?php
                                foreach ($menu as $row)
                                    if ($row['TYPE'] == '2')
                                        echo'checked="checked"'
                                        ?>  id='type' value="2"/>
                            Mỳ Ý <input title='Mỳ Ý' type='radio' name='type'<?php
                                foreach ($menu as $row)
                                    if ($row['TYPE'] == '3')
                                        echo'checked="checked"'
                                        ?>  id='type' value="3"/>
                        </td>
                    </tr>
                    <tr>
                        <td class='key'>Hiển thị trang chủ</td>
                        <td nowrap>
                            Có <input <?php
                                foreach ($menu as $row)
                                    if ($row['VIEW'] == '1')
                                        echo'checked="checked"'
                                        ?>  title='Hiển thị lên trang chủ echay' type='radio' name='view' id='view' value="1"/>
                            Không <input <?php
                    foreach ($menu as $row)
                        if ($row['VIEW'] == '0')
                            echo'checked="checked"'
                            ?>  title='Không hiển thị lên trang chủ echay' type='radio' name='view' id='view' value="0"/>
                        </td>
                    </tr>
                    <tr>
                        <td class='key'>Thực đơn ngày thứ</td>
                        <td nowrap>
                            Thứ 2 <input title='Thứ 2' <?php
                    foreach ($menu as $row)
                        if ($row['DATE'] == '1')
                            echo'checked="checked"'
                                        ?>   type='radio' name='date' id='date' value='1'></input>
                            Thứ 3 <input title='Thứ 3' <?php
                    foreach ($menu as $row)
                        if ($row['DATE'] == '2')
                            echo'checked="checked"'
                                        ?> type='radio' name='date' id='date' value='2'></input>
                            Thứ 4 <input title='Thứ 4' <?php
                    foreach ($menu as $row)
                        if ($row['DATE'] == '3')
                            echo'checked="checked"'
                                        ?> type='radio' name='date' id='date' value='3'></input>
                            Thứ 5 <input title='Thứ 5' <?php
                    foreach ($menu as $row)
                        if ($row['DATE'] == '4')
                            echo'checked="checked"'
                                        ?> type='radio' name='date' id='date' value='4'></input>
                            Thứ 6 <input title='Thứ 6' <?php
                    foreach ($menu as $row)
                        if ($row['DATE'] == '5')
                            echo'checked="checked"'
                            ?> type='radio' name='date' id='date' value='5'></input>
                        </td>


                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Cập nhật" class='input_button'/>
                            <input type="button" onclick='goback();' value="Hủy bỏ" title='Hủy bỏ cập nhật và quay về trang danh sách' class='input_button'/>

                        </td>
                    </tr>
                </table>
                <input type='hidden' name='id' id='id' value='<?= $row['ID'] ?>'>
            </fieldset>
        </form>

    </body>

    <script>
        function goback()
        {
            document.location.href='/admin/menu/';
        }
    </script>

</html>
