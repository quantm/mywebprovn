<HTML>
    <head>
        <script type="text/javascript" src="/js/save.js"></script>
        <script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script>
    </head>
    <meta charset="UTF-8">
    <body>

        <table class='adminlist'>
                                <tbody>
                        <?php
                        $i = 0;
                        foreach ($update as $row) {
                            ?>
                            <tr id=groupicon6_<?= $row['ID_ORDER'] ?>  class="row<?= $row_order == $row['ID_ORDER'] ? "2" : $i ?>">
                                <td><?= $row['ID_ORDER'] ?><?php echo $row_order ?></td>
                                <td style="vertical-align: middle;width:75px;">
                                        <input id="date_time" name="date_time" size="9" value="<?= $row['DATE_TIME'] ?>" onClick="popCalendar.show(this, 'date_time', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;" />
                                </td>
                                <td>
                                <input  style="background:#FFFFCC"  size="12" id="NAME" name="NAME" value='<?php echo $row['LASTNAME']; echo ' '; echo $row['NAME']?>' ></input>
                            </td>
                                <td><input style="background:#FFFFCC" size='12' value='<?= $row['PHONE'] ?>' id="PHONE" name="PHONE"  /></td>
                                <td><input style="background:#FFFFCC" size='14' value='<?= $row['DELIVERY_ADDRESS'] ?>' id="DELIVERY_ADDRESS" name="DELIVERY_ADDRESS"  /></td>
                              <td>
                            <select id='DISTRICT' name='DISTRICT'>
                                <?= customer_model::comboBox($district, $sel) ?>
                            </select>
                        </td>
                                <!--
                                                                <td>
                                                                    <input type="text" value="<?= $row['ORDER_DATE'] ?>" id="delivery_date"  name="delivery_date" onClick="popCalendar.show(this, 'delivery_date', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;width: 70px;" >
                                                                </td>
                                -->

                                <td style="vertical-align: middle;width: 55px;">
                                <input style="background:#FFFFCC" size='8' value='<?= $row['DELIVERY_TIME'] ?>' id="DELIVERY_TIME" name="DELIVERY_TIME"  />
                                </td>
                                 <td>
                                    <select id='RECEIVER' name='RECEIVER'>
                                        <?= customer_model::comboBox($receiver, $sel) ?>
                                    </select>
                                </td>
                                
                                <td>
                                    <select id='PAID' name='PAID'>
                                        <?= customer_model::comboBox($paid, $sel) ?>
                                    </select>
                                </td>
                                
                                
                                  <td>
                                    <select id='DRIVER' name='DRIVER'>
                                        <?= customer_model::comboBox($driver, $sel) ?>
                                    </select>
                                </td>
                                <td><input style="background:#FFFFCC" size='16' value='<?= $row['GHICHU'] ?>' id="NOTES" name="NOTES"  /></td>

                                <td>
                                <input type="button" value="Lưu" class="input_button"/>
                                <input type="button" value="Hủy" onclick="document.location.href='/order/day/';" class="input_button"/>
                                </td>
                                    
                        <input type='hidden' value='<?= $row['MD5'] ?>' name='md5' id='md5'></input>
                        <input type='hidden' value='<?= $row['ID_U'] ?>' name='id_u' id='id_u'></input>
                        <input type='hidden' name="md5_id" id='md5_id'>
                        
                        <tr id=group<?= $row['ID_ORDER'] ?> style="display:none;">
                        <td colspan="">  
                            <div style="display:none;background: #ffffff" id=group<?= $row['ID_ORDER'] ?> class="project"></div>
                        </td>
                        </tr> 
                        
                        </tr>
                            
                        <tr id=groupcontent2<?= $row['ID_ORDER'] ?> style="display:none;">

                        <div style="display:none;background: #ffffff" id=groupcontent2<?= $row['ID_ORDER'] ?> class="project">
                        </div>

                        </tr>
                        <?php
                        $i = (-1 + $i) * -1;
                    }
                    ?>
                    </tbody>
        </table>
    </body>
</HTML>
