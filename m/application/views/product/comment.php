			<fieldset>
                    <legend><font color="#FFFFFF" size="+2" style="font-weight:bold">Nhận xét sản phẩm</font></legend>
                    <table style="color:#FFF;padding:15px;width:775px;">
                        <thead style="text-align:left;">
                        <th>Tên</th>
                        <th>Nội dung </th>
                        <th>Ngày gửi</th>
                        </thead>
						<div id="commentted">
                        <?php foreach ($comment as $com): ?>
                            <tr>
                                <td width="17%"><?= $com['commenter'] ?></td>
                                <td width="63%"><?= $com['content'] ?></td>
                                <td width="20%"><?= $com['date'] ?></td>
                            </tr>
                        <?php endforeach; ?>
						<div>
						</div style="display:none" id="commentted_swap"></div>
                        <br>
                        <tr>
                            <td>Nội dung nhận xét</td>
                            <td colspan="2">
                                <textarea onfocus="check();" onblur="document.getElementById('temp').value=this.value" style="width: 599px; height: 42px;"  id="comment" name="comment"></textarea>
								<input type="hidden" id="temp"/>
                            </td>
                        </tr
                        ><tr>
                            <td colspan="3"><input type="button"  onClick="send_comment(<?= $id_product ?>);"   value="Gửi nhận xét" class="input_button"></td>
                        </tr>
                    </table>
                </fieldset>