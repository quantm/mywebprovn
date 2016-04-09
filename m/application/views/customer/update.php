<HTML>
    <head>
        <script type="text/javascript" src="/js/save.js"></script>
    </head>
    <meta charset="UTF-8">
    <body>

        <table class='adminlist'>
            <tbody>
                <?php
                $stt = 0;
                $i = 0;
                foreach ($user_update as $row) {
                    $stt++;
                    ?>
                    <tr align='center'  class="row<?php echo $i; ?>"  width='1px'>
                        <td><?= $row['ID_U'] ?></td> 
                        <td>
                            <select id='SEX' name='SEX'>
                                <option value='0' <?php if ($row['SEX'] == 0) echo 'selected' ?>>Anh</option> 
                                <option value='1' <?php if ($row['SEX'] == 1) echo 'selected' ?>>Chị</option> 
                            </select>
                        </td>
                        <td><input  name='LASTNAME' id='LASTNAME'  type='text' style="background:#FFFFCC"  size='6' value='<?= $row['LASTNAME'] ?>'/></td>
                        <td><input name='NAME' id='NAME' type='text' style="background:#FFFFCC" size='9' value='<?= $row['NAME'] ?>'/></td>
                        <td><input name='COMPANY'  id='COMPANY'  type='text' style="background:#FFFFCC" size='12' value='<?= $row['COMPANY'] ?>'/></td>
                        <td><input  name='ADDRESS' id='ADDRESS'  type='text' style="background:#FFFFCC" size='16' value='<?= $row['ADDRESS'] ?>'/></td>
                        <td>
                            <select id='DISTRICT' name='DISTRICT'>
                                <?= customer_model::comboBox($district, $sel) ?>
                            </select>
                        </td>
                        <td><input name='PHONE' id='PHONE'  type='text' style="background:#FFFFCC" size='11' value='<?= $row['PHONE'] ?>'/></td>
                        <td><input name ='DELIVERY_TIME' id='DELIVERY_TIME'  type='text' style="background:#FFFFCC" size='7' value='<?= $row['DELIVERY_TIME'] ?>'/></td>
                        <td> <select id='CUSTOMER_TYPE' name='CUSTOMER_TYPE'>
                                <?= customer_model::comboBox($type, $sel_type) ?>
                            </select></td>
                        <td><input name='NOTES' id='NOTES'  type='text' style="background:#FFFFCC" size='12' value='<?= $row['NOTES'] ?>'/></td>

                        <td><input type='submit' id='submit' name='submit' class='input_button' size='4' value='Lưu'></input></td>                                                            
                        <td><input type="button" id ='cancel' name='cancel' onClick="document.location.href='/customer/index/';" value="Hủy" title='' class='input_button'/></input></td>              

                <input type='hidden' name='id' id='id' value='<?= $row['ID_U'] ?>'>
                </tr>

                <?php
                $i = (-1 + $i) * -1;
            }
            ?>
            </tbody>
        </table>
    </body>
</HTML>
