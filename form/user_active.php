<td width="156">&nbsp;</td>
<td>
    <br>
    <table width="80%" border="0" align="left" cellpadding="4" cellspacing="2" style="border: solid 1px #efefef;">
        <tr>
            <td>
				<font color="gray"><b>Menu Ini di peruntukan untuk un-lock user yg telah login tetapi keluar secara paksa</b></font><br/>
				<font color="red">*</font> <b><font color="orange">tutup browser, mati lampu, dll</font></b>
				<br/>
				<br/>
				<style>
					.cTh {border:1px solid #CCCCCC;}
				</style>
				<table style="width:100%; border: solid 1px #efefef;" cellpadding="4">
					<tr style="background:#ADE5F7;">                            
						<td class="cTh" width="20%" height="40">Username</td>
						<td class="cTh" width="50%">Nama</td>
						<td class="cTh" width="16%">Jabatan / Level</td>
						<td class="cTh" align="center" width="10%"><b>status</b></td>
						<td class="cTh" align="center" width="5%">&nbsp;</td>
					</tr>
					<?php
						include '../system/config_service.php';
							
						$rs = mysql_query("SELECT * FROM user where is_active = 1 order by nama asc");
						while ($uR = mysql_fetch_array($rs)) {
					?>
					<tr>                            
						<td class="cTh"><?php echo $uR['username']; ?></td>
						<td class="cTh"><?php echo $uR['nama']; ?></td>
						<td class="cTh"><?php echo $uR['jabatan']; ?></td>
						<td class="cTh" align="center"><font color="red"><?php if ($uR['is_active'] == 1) echo "active"; ?></font></td>
						<td class="cTh" align="center">
							<?php 
								if ($uR['jabatan'] != 'ADMIN') {
							?>
							<a href="#" onclick="confirmX('<?php echo $uR['username']; ?>')"><img src="../images/famfam/group_key.png" width="20px"/></a>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</table>
			</td>
            </tr>
    </table>
</td>

<script>
	function confirmX(data) {
		$.messager.confirm('User Aktif', 'Unlock user `'+data+'` ?', function(r){
			if (r){
				var obj = [{
				username :  data
			}];
				$.ajax({
				type	: "GET",
				url		: "../system/kelola_admin_service.php",
				data	: {
					username : data
				},
				success	: function(data){
					if (data != "") {
						$.messager.alert('Kesalahan', data, 'error');
					} else {					
						location.reload()
					}
				}
			});
			}
		});
	}
</script>
