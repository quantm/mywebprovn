<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title ?></title>
        <meta charset="utf-8">
        <link href="/css/login_register.css" rel="Stylesheet">
        <link href="/css/general.css" rel="Stylesheet">
    </head>
    <body>
        <form id=frm name=frm action='/log/' method='post'>

            <div id="container">
                <h1>Đăng nhập</h1>
                <div id="body">
                    <div style="position:absolute; left:330px;"><img width='105' height='105' src="/images/key_login.png"></div>
                    <div id='loginbox'>	
                        <table>
                            <tr>
                                <td>Tên đăng nhập</td>
                                <td>
                                    <?php echo form_input('username', set_value('username'), 'id="username"'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Mật mã</td>
                                <td><?php echo form_password('password', set_value('password'), 'id="password"'); ?></td>
                            </tr>
                            <tr>
                                <td><input type='submit' name='submit' id='submit' value='Đăng nhập' class='input_button'></td>
                                <td><input type='reset' name='reset' id='reset' value='Làm lại' class='input_button'></td>
                            </tr>
                        </table>		
                        <span class="box_erro_area"><?= $err ?></span>

                    </div>

                </div>

                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
            </div>
            <input type=hidden id='emp_name' name='emp_name'>
        </form>
    </body>
</html>