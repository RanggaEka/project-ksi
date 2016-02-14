<?php 
    session_start();
    if (empty($_SESSION['username']) || empty($_SESSION['password']) ) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>KSI System</title>
    <link rel="stylesheet" type="text/css" href="lib/jquery/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="lib/jquery/themes/icon.css">
    <script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="lib/jquery/jquery.easyui.min.js"></script>
    <script>
		function onLoadBody() {
			$('#gridFormTandaTerima').datagrid({striped:$(this)})
			$('#gridTandaTerima').datagrid({striped:$(this)})
			$('#gridLookupTandaTerima').datagrid({striped:$(this)})
			$('#gridDetailInvoice').datagrid({striped:$(this)})
			setTimeout(function(){
				$('#username').textbox('clear').textbox('textbox').focus();
			},200)
		}
    </script>
</head>
<body onload="onLoadBody()">
    <table border="0" width="100%" height="500px">
        <tr align="center">
            <!-- <td></td> -->
            <td align="center">
				<form name="form1" method="post" action="system/login_service.php">
			<div class="easyui-panel" title="KSI Login" style="width:400px;padding:30px 70px 20px 70px">
				 <table border="0" width="100%" height="100%">
        <tr>
			<td align="center"><img src="images/ksi.png" width="70px"></td>
        </tr>
        </table>
			<div style="margin-bottom:10px">
				<input class="easyui-textbox" style="width:100%;height:40px;padding:12px" data-options="prompt:'Username',iconCls:'icon-man',iconWidth:38" id="username" name="username">
			</div>
			<div style="margin-bottom:20px">
				<input class="easyui-textbox" type="password" style="width:100%;height:40px;padding:12px" data-options="prompt:'Password',iconCls:'icon-lock',iconWidth:38" name="password" id="password">
			</div>
			<div>
				<button type="submit" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" style="padding:5px 0px;width:30%;" name="btn_login">Login</button>
				<button type="reset" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" style="padding:5px 0px;width:30%;">Reset</button>
			</div>
		</div>
	</form>
          </td>
            <!-- <td></td> -->
        </tr>
    </table>
</body>
</html>
<?php } else {
    echo "<script>window.location.href='form/halaman_utama.php?page=home'</script>";
}
?>
