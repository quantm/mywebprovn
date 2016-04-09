<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link type='text/css' href='/css/general.css' rel='Stylesheet'/>
        <link href="/css/menu.css" rel="Stylesheet"/>
        <link href="/css/arrowsidemenu.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="/js/validate.js"></script>
        <script type="text/javascript" src="/js/common.js"></script>
    </head>
    <body>

        <form enctype="multipart/form-data" name='frmMenu' id='frmMenu' method='post' action=''>
            <br><br>
            <fieldset>
                <legend>Quản trị thực đơn - Thêm mới</legend>  														
                <table class='admintable'>
                    <tr>
                        <td class='key'>Tên món ăn</td>
                        <td>
                            <input type='text' name="FOOD" id='FOOD' size="30" /><br />
                            <span id="ERRFOOD" class="box_erro_area"></span>
                        </td>
                    </tr>

                    <tr>
                        <td class='key'>Giá</td>
                        <td>
                            <input id='PRICE'  name='PRICE' size='30' type="text" maxlength="100" value="" class="inputbox"/><font  title='Trường này bắt buột nhập liệu' color=red>*</font></br>
                            <span id="ERRPRICE" class="box_erro_area"></span>
                        </td>
                    </tr>

                    <tr>
                        <td class='key'>Hình ảnh</td>
                        <td nowrap><input name="userfile" id="product_image" type="file" /><br /> 
                        <span id="ERRimage" class="box_erro_area"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class='key'>Mô tả</td>
                        <td nowrap><input name="description" id="description" /> </td>
                    </tr>
                    <tr>
                        <td class='key'>Kiểu</td>
                        <td nowrap>
                            Cơm <input title='Cơm' type='radio' name='type' id='com' value="1"/>
                            Sợi <input title='Sợi' type='radio' name='type' id='soi' value="2"/>
                            Mỳ Ý <input title='Mỳ Ý' type='radio' name='type' id='miy' value="3"/><br />
                            <span id="ERRtype" class="box_erro_area"></span>
                        </td>
                    </tr>    
                        <tr>
                            <td class='key'>Hiển thị trang chủ</td>
                            <td nowrap>
                                Có <input title='Hiển thị lên trang chủ echay' type='radio' name='view' id='view' checked="checked" value="1"/>
                                Không <input title='Không hiển thị lên trang chủ echay' type='radio' name='view' id='view' value="0"/>
                            </td>
                        </tr>    
                        <tr>
                            <td class='key'>Thực đơn ngày thứ</td>
                            <td>
                                Thứ 2 <input title='Thứ 2'  type='radio' name='date' id='d1' value='1'></input>
                                Thứ 3 <input title='Thứ 3'  type='radio' name='date' id='d2' value='2'></input>
                                Thứ 4 <input title='Thứ 4'  type='radio' name='date' id='d3' value='3'></input>
                                Thứ 5 <input title='Thứ 5'  type='radio' name='date' id='d4' value='4'></input>
                                Thứ 6 <input title='Thứ 6'  type='radio' name='date' id='d5' value='5'></input>
                                <br /><span id="ERRdate" class="box_erro_area"></span>
                            </td>
                        </tr>      
                </table>

                <div>
                    <input type='button' onclick='SaveButtonClick();' value='Thêm mới' class='input_button'/>
                    <input type='button' onClick='GoBack();' value='Hủy bỏ' class='input_button'/>
                </div>
            </fieldset>
        </form>
    </body>
</html>
<script>
        function GoBack()
        {
            document.frmMenu.action='/admin/menu';
        }

        function SaveButtonClick()
        {
            
            var err = true;
            err = err & validateInput("req",document.frmMenu.FOOD,"Tên món ăn không được rỗng");
            err = err & validateInput("req",document.frmMenu.PRICE,"Giá không được rỗng");
            //var check=document.forms['frmMenu']['type'].id;
            var com=document.getElementById('com').checked;            
            var soi=document.getElementById('soi').checked;
            var miy=document.getElementById('miy').checked;
            
            var d1=document.getElementById('d1').checked;            
            var d2=document.getElementById('d2').checked;
            var d3=document.getElementById('d3').checked;
            var d4=document.getElementById('d4').checked;
            var d5=document.getElementById('d5').checked;
            var product_image=document.getElementById('product_image').value;
            
            if(product_image=='')
            {
                document.getElementById('ERRimage').innerHTML='Bạn chưa chọn hình cho sản phẩm';
            }
            if(com==false && soi==false && miy==false)
            {
                document.getElementById('ERRtype').innerHTML='Bạn chưa chọn kiểu món ăn';
                err=false;
            }
            if(d1==false && d2==false && d3==false && d4==false && d5==false)
            {
                document.getElementById('ERRdate').innerHTML='Bạn chưa chọn ngày của thực đơn';
                err=false;
            }
            
            if(err==true)
            {
                document.frmMenu.action='/admin/save_menu/';
                document.frmMenu.submit();
            }
        }
    </script>
