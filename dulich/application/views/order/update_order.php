<HTML>
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <link type='text/css' href='/css/general.css' rel='Stylesheet'>
        <script src="/js/Ajax/AjaxEngine.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/boxover.js"></script>
        <script type="text/javascript" src="js/SwapDiv.js"></script>
        <script type="text/javascript" src="/js/popcalendar/popcalendar.js"></script>
    </head>
    <body>

        <form method="post" name="frm" id='frm' action='/order/details/'>
            <table class="adminlist">
                <tbody>
                    <?php
                    foreach ($update as $value) {
                        ?>
                        <tr>
                            <td><?php echo $value['ID_ORDER'] ?></td>
                            <td style="vertical-align: middle;width:75px;"><?= $value['DATE_TIME'] ?></td>
                            <td style="vertical-align: middle;width:100px;"><a href='#' title='"cssbody=[dvbdy1] cssheader=[dvhdr1] header=[<span class=toolTipTitle>Khách hàng <?php echo $value['LASTNAME'] ?> <?php
                    echo $value
                    ['NAME']
                        ?></span>] body=[<table><tr><td valign=top>Email: <?php echo $value['EMAIL'] ?></td></tr><tr><td valign=top>Trai kỳ: <?php echo $value['VEGETARIAN_TYPE'] ?></td></tr><tr><td valign=top>Cách thanh toán: <?php echo $value['PAID_METHOD'] ?></td></tr></table>]"'><?php
                                                                           echo $value['LASTNAME'];
                                                                           echo ' ';
                                                                           echo $value['NAME']
                        ?></a></td>
                            <td>
                                <input name='phone' id='phone' style="vertical-align: middle;width:85px;"  type='text' value='<?= $value['DIENTHOAI'] ?>'></input>
                            </td>
                            <td style="vertical-align: middle;width:120px;">
                                <input type='text' name='address' id='address' style="vertical-align: middle;width:120px;" value='<?= $value['DELIVERY_ADDRESS'] ?>'></input>
                            </td>
                            <td>
							<?php $id_district=$value['DISTRICT']?>
                                <select id='district' name='district'>
									<?php foreach($district as $key):?>
									<option value='<?=$key['ID']?>' <?if($key['ID'] == $id_district)  echo 'selected'?>><?=$key['NAME']?></option>
									<?php endforeach;?>
								</select>
                            </td>
                            <!--
                                                            <td>
                                                                <input type="text" value="<?= $row['ORDER_DATE'] ?>" id="delivery_date"  name="delivery_date" onClick="popCalendar.show(this, 'delivery_date', 'yyyy-mm-dd', true);" style="cursor: pointer; vertical-align: middle;width: 70px;" >
                                                            </td>
                            -->

                            <td >
                                <input id="giogiao" style="vertical-align: middle;width: 55px;"  name="giogiao" type='text' value='<?= $value['GIOGIAO'] ?>'/>
                            </td>

                            <td>
									<?php $id_receiver=$value['ID_RECEIVER']?>
                                <select id='receiver' name='receiver'>
                                     <?php foreach($receiver as $key):?>
									<option value='<?=$key['ID']?>' <?if($key['ID'] == $id_receiver)  echo 'selected'?>><?=$key['NAME']?></option>
									<?php endforeach;?>
                                </select>
                            </td>
                            <td>
									<?php $id_paid_method=$value['ID_PAID_METHOD']?>
                                <select id='paid_method' name='paid_method'>
                                   <?php foreach($paid_method as $key):?>
									<option value='<?=$key['ID']?>' <?if($key['ID'] == $id_paid_method)  echo 'selected'?>><?=$key['NAME']?></option>
									<?php endforeach;?>
                                </select>

                            </td>

                            <td>
							<?php $id_driver=$value['DRIVER']?>
                                <select id='driver' name='driver'>
									<?php foreach($driver as $key):?>
									<option value='<?=$key['ID']?>' <?if($key['ID'] == $id_driver)  echo 'selected'?>><?=$key['NAME']?></option>
									<?php endforeach;?>
                                </select>
                            </td>

                            <td><input id='ghichu' name='ghichu' type='text' value='<?= $value['GHICHU'] ?>'></input></td>
                            <td>
                                <input type='button' value='Thêm' onClick="add()"  class='input_button' ></input>
                                <input type='button' value='Hủy' onClick="cancel()" class='input_button'></input>
                            </td>
                    <input type='hidden' value='<?= $value['MD5'] ?>' name='md5' id='md5'></input>
                    <input type='hidden' value='<?= $value['ID_U'] ?>' name='id_u' id='id_u'></input>
                    <input type='hidden' value='<?= $value['ID_ORDER'] ?>' name='id_order' id='id_order'></input>
                    </tr>
                    <tr id=groupcontent<?= $value['ID_ORDER'] ?> style="display:none;"><td colspan="">  <div style="display:none;background: #ffffff" id=groupcontent<?= $value['ID_U'] ?> class="project"></div></td>

                    </tr>

                    <?php
                }
                ?>
                </tbody>
            </table>
        </form>

    </body>
</html>

<script>
    function add()
    {
        document.frm.action='/order/detail/';
        document.frm.submit();
    }
    function cancel()
    {
        document.frm.action='/order/cancel/';
        document.frm.submit();
    }
    function setvalueDateD(value_from,value_to){
        document.frm.fromdate.value = value_from;
        document.frm.todate.value = value_to;
    }

</script>
