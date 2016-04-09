<html>
 <head>
  <meta content="text/html" charset="utf-8" http-equiv="Content-Type">
  <title><?=$title?></title>
  <link href="/css/general.css" />
 </head>

 <body>
 <form id="frmNew" name="frmNew" method="post">
        <table>
                    <tr>
                            <td>Tên trò chơi</td>
                            <td><input type="text" name="name" id="name" /></td>
                    </tr>
                    
                    <tr>
                            <td>Thể loại</td>
                            <td><input type="text" name="type" id="type" /></td>
                    </tr>
                    
                    <tr>
                            <td>Href</td>
                            <td><input type="text" name="href" id="href"/></td>
                    </tr>
                    
                    <tr>
                            <td colspan="2"><input type="button"  class="input_button" value="Thêm mới game" onclick="Save();" /></td>
                    </tr>
        </table>
        </form>
 </body>
</html>

<script>
            function Save()
            {
                document.frmNew.action='/game/save_input/';
                document.frmNew.submit();
            }
</script>
