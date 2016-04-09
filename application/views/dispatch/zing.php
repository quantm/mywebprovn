<div class="m">
    <script src="/js/autocomplete.js" type="text/javascript"></script> 
    <script src="/js/Ajax/AjaxEngine.js" type="text/javascript"></script>

    <form method="post" name="frmProject" id='frmProject'>
        <br>
        <fieldset>
            <legend><img src='/images/project/time_effort_value.png'>DANH SÁCH ĐIỀU PHỐI</legend>		

            <table class="adminlist">
                <thead>
                    <tr>

                    </tr>
                    <tr>
                        <th nowrap="nowrap">Ngày giao</th>
                        <th nowrap="nowrap">Mã ĐH</th>
                        <th nowrap="nowrap">Ngày giao</th>
                        <th nowrap="nowrap">Dx</th>
                        <th nowrap="nowrap">Tên</th>
                        <th nowrap="nowrap">Công ty</th>
                        <th nowrap="nowrap">Địa chỉ</th>
                        <th nowrap="nowrap">Quận</th>
                        <th nowrap="nowrap">Tel</th>
                        <th nowrap="nowrap">Món</th>
                        <th nowrap="nowrap">SLg</th>
                        <th nowrap="nowrap">Trạng thái</th>
                        <th nowrap="nowrap">Giờ giao</th>
                        <th nowrap="nowrap">Người nhận</th>
                        <th nowrap="nowrap">T.Toán</th>
                        <th nowrap="nowrap">Driver</th>
                        <th nowrap="nowrap">Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dispatch as $row) {
                        ?>
                        <tr  align='left' >
                            <td><font color='blue'><?php echo $row['NAME'] ?></font></td> 	
                            <td><font color='blue'><?= $row['QUANTITY'] ?></font></td>
                            <td><font color='blue'><?= $row['PRICE'] ?> VNĐ</font></td>
                            <td><font color='blue'><? echo bcmul($row['QUANTITY'], $row['PRICE']) ?> VNĐ</font></td>

                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>

                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $stt = 0;
                    $i = 0;
                    foreach ($project as $row) {
                        $stt++;
                        ?>  
                        <tr>
                            <td valign="top" rowspan="2"><?= $stt ?></td>
                            <td valign="top"><span style="font-weight:bold;color:#903"><?= $row['NAME'] ?></span></td>
                            <td valign="top" nowrap="nowrap">
                                <a href='javascript:
                                   {	SwapDiv(<?= $row['ID_PR'] ?>,"/index.php/project/detail/<?= $row['ID_PR'] ?>",6);
                                   }
                                   ' title='Click để xem chi tiết'>
                                    Chi tiết
                                </a>
                            </td>        

                        </tr>

                        <tr class="row<?= $id_pr == $row['ID_PR'] ? "2" : $i ?>">
                            <td colspan='2'>
                                <div>
                                    <ul class="chitiethscv">

                                        <li id=groupicon6_<?= $row['ID_PR'] ?>>
                                            <img hspace="5" border="0"  width='24' height='24' src="/images/project/tasklist.gif">
                                            <a href='javascript:
                                               {	SwapDiv(<?= $row['ID_PR'] ?>,"/index.php/project/overview/<?= $row['ID_PR'] ?>",6);
                                               }
                                               ' title='Click để xem chi tiết'>

                                                <font color=brown>
                                                Tổng hợp dự án
                                                </font>
                                            </a>
                                        </li>
                                        <li id=groupicon6_<?= $row['ID_PR'] ?>>
                                            <img width='24' height='24' hspace="5" border="0" src="/images/project/addtask.png">
                                            <a href='javascript:
                                               {	SwapDiv(<?= $row['ID_PR'] ?>,"/index.php/project/work/<?= $row['ID_PR'] ?>",6);
                                               }
                                               ' title='Click để xem chi tiết'>

                                                <font color=brown>
                                                Công việc
                                                </font>
                                            </a>
                                        </li>
                                        <li id=groupicon6_<?= $row['ID_PR'] ?>>
                                            <img width='24' height='24' hspace="5" border="0" src="/images/project/element.png">
                                            <a href='javascript:
                                               {	SwapDiv(<?= $row['ID_PR'] ?>,"/index.php/project/element/<?= $row['ID_PR'] ?>",6);
                                               }
                                               ' title='Click để xem chi tiết'>

                                                <font color=brown>
                                                Thành phần
                                                </font>
                                            </a>
                                        </li>
                                        <li id=groupicon6_<?= $row['ID_PR'] ?>>
                                            <img width='24' height='24' hspace="5" border="0" src="/images/user.gif">
                                            <a href='javascript:
                                               {	SwapDiv(<?= $row['ID_PR'] ?>,"/index.php/project/member_work/<?= $row['ID_PR'] ?>",6);
                                               }
                                               ' title='Click để xem chi tiết'>

                                                <font color=brown>
                                                Thành viên tham gia
                                                </font>
                                            </a>
                                        </li>
                                        <li id=groupicon6_<?= $row['ID_PR'] ?>>
                                            <img width='24' height='24' hspace="5" border="0" src="/images/icon-48-static.png">
                                            <a href='javascript:
                                               {	SwapDiv(<?= $row['ID_PR'] ?>,"/index.php/project/doc/<?= $row['ID_PR'] ?>",6);
                                               }
                                               ' title='Click để xem chi tiết'>

                                                <font color=brown>
                                                Tài liệu
                                                </font>
                                            </a>
                                        </li>
                                        <li id=groupicon6_<?= $row['ID_PR'] ?>>
                                            <img width='24' height='24' hspace="5" border="0" src="/images/clock.png">
                                            <a href='javascript:
                                               {	SwapDiv(<?= $row['ID_PR'] ?>,"/index.php/project/time/<?= $row['ID_PR'] ?>",6);
                                               }
                                               ' title='Click để xem chi tiết'>

                                                <font color=brown>
                                                Thời gian
                                                </font>
                                            </a>
                                        </li>
                                        </li>
                                        <li id=groupicon6_<?= $row['ID_PR'] ?>>
                                            <img width='24' height='24' hspace="5" border="0" src="/images/report_show.jpg">
                                            <a href='javascript:
                                               {	SwapDiv(<?= $row['ID_PR'] ?>,"/index.php/project/report/<?= $row['ID_PR'] ?>",6);
                                               }
                                               ' title='Click để xem chi tiết'>

                                                <font color=brown>
                                                Báo cáo
                                                </font>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div style="display:none;background: #ffffff" id=groupcontent<?= $row['ID_PR'] ?> class="project"></div>
                            </td>

                        </tr>
                        <?php
                        $i = (-1 + $i) * -1;
                    }
                    ?>
                </tbody>
            </table>
        </fieldset>
        <input type="hidden" name='id_pr' id='id_pr'>
    </form>
    <script>
	
        
        function SwapDiv(id,url,tab){
         
            /* 
        if(document.getElementById('id_pr'))
            {
                document.getElementById('id_pr').value=id;
                document.frmProject.action='/project/detail';
            }
             */
            for(var i=1;i<11;i++){
                if(document.getElementById("groupicon"+i+"_"+id)){
                    if(tab!=i){
                        if(document.getElementById("groupicon"+i+"_"+id).className=="groupiconopen"){
                            document.getElementById("groupcontent"+id).style.display="none";
                            document.getElementById("groupicon"+i+"_"+id).className = "groupicon";
                            break;
                        }
                    }
                }
            }
            if(document.getElementById("groupcontent"+id).style.display==""){
                document.getElementById("groupcontent"+id).style.display="none";
                document.getElementById("groupicon"+tab+"_"+id).className = "groupicon";
            }else{
                document.getElementById("groupcontent"+id).style.display="";
                document.getElementById("groupicon"+tab+"_"+id).className = "groupiconopen";
                document.getElementById("groupcontent"+id).innerHTML="<img src='/images/loading.gif' width='16' height='16' border='0'></img<img src='/images/loading.gif' width='16' height='16' border='0'></img><img src='/images/loading.gif' width='16' height='16' border='0'></img><img src='/images/loading.gif' width='16' height='16' border='0'></img>";
                loadDivFromUrl("groupcontent"+id,url,1);

            }
        }
        
	
    </script>						
