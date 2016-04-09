<?php
require_once 'application/models/common.php';
require_once 'application/models/autocomplete_model.php';
require_once 'application/models/project_model.php';
require_once 'application/models/log_model.php';
echo ProjectCommon::useDlgConfirm();
?>

<html>
    <head>    
        <script src="/js/autocomplete.js" type="text/javascript"></script> 
        <script src="/js/Ajax/AjaxEngine.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/dlg_confirm.js"></script>
        <script type="text/javascript" src="/js/validate.js"></script>
        <link href="/css/general.css" rel="Stylesheet">
        <meta charset='utf-8'>
    </head> 

    <body>
        <form method="post" name="frmUserRight" id='frmUserRight' action="">
            <br>
            <fieldset>
                <legend><img src='/images/project/checklist.png' width='60' height='60'>QUYỀN TRUY CẬP</legend>		
                <br> 
                <div style="position: absolute;margin-top:-50px;margin-left: 1180px">
                  <center>
                    <img src='/images/icon-32-save.png'><br>
                    <span><a href='#' onclick="document.frmUserRight.action='/user/setUserRight/';document.frmUserRight.submit();">Lưu</a></span>
                  </center>
                </div>
                <table>
                    <tr>
                        <td colspan="6"></td>
                        <td>

                               <div style="position: float;margin-top: -221px">
                    
                      <table class="reportlist">
                                <thead>
                                    <tr>
                                        <th nowrap="nowrap">Tên HeaderMenu</th>
                                        <th>Chọn</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($menuheader as $row): ?> 
                                        <tr>	
                                            <td>
                                                <font color=brown><?php echo $row['DROPDOWN'] ?></font>
                                            </td>
                                            <td>
                                                <input value="<?=$row['ID']?>" type="checkbox" name="ID_DROP[]">
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>

                            </table>
                </div>

                        </td>

                        <td colspan="16"></td>
                        <td>

                            <table class="reportlist">
                                <thead>
                                    <tr>
                                        <th nowrap="nowrap">Tên HomeMenu</th>
                                        <th>Chọn</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($menuhome as $row): ?> 
                                        <tr>	
                                            <td>
                                                <font color=brown><?php echo $row['HOME'] ?></font>
                                            </td>
                                            <td>
                                                <input type="checkbox" value='<?=$row['ID']?>' name="ID_H[]">
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>

                            </table>

                        </td>
                    </tr>


                </table>

            </fieldset>
            <input type="hidden" name='id' id='id' value=<?=$id?>>
        </form>
    </body>

</html>    
