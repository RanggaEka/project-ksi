<?php 
    session_start();
    if (empty($_SESSION['username']) || empty($_SESSION['password']) ) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PO Online</title>
    <link rel="stylesheet" type="text/css" href="lib/jquery/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="lib/jquery/themes/icon.css">
    <script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="lib/jquery/jquery.easyui.min.js"></script>
</head>
<body>
    <table border="0" width="100%" height="500px">
        <tr align="center">
            <!-- <td></td> -->
            <td align="center">
                <div  class="easyui-panel" title="Login" style="width: 270px;height:240px;padding:10px;" >
                    <!-- ubah background color -->
                    <form name="form1" method="post" action="system/login_service.php">
                      <table cellpadding="5" style="background-color: none;">
                        <tr>
                          <td colspan="2" align="center"><img src="images/logo-gku.jpeg" width="64px"> </td>
                        </tr>
                        <tr>
                          <td>Username:</td>
                          <td><input class="easyui-textbox" type="text" name="username" /></td>
                        </tr>
                        <tr>
                          <td>Password:</td>
                          <td><input class="easyui-textbox" type="password" name="password" /></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><button type="submit" class="easyui-linkbutton" name="btn_login">Login</button>
                              <button type="reset" class="easyui-linkbutton">Reset</button>
                              <button type="button" class="easyui-linkbutton">Forgot?</button></td>
                        </tr>
                      </table>
                                        </form>
              </div>  
          </td>
            <!-- <td></td> -->
        </tr>
    </table>
</body>
</html>
<?php } else {
    echo "<script>window.location.href='form/halaman_utama.php'</script>";
}
?>