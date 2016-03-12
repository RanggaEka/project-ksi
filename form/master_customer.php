<td width="156">&nbsp;</td>
<td>
    <br>
    <table width="80%" border="1" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
        <tr>
            <td>
				<table width="80%" border="0" cellspacing="0" cellpadding="3">
                            <tr>
                                <td><label>Nama <font color='red'>*</font></label></td>
                                <td>:</td>
                                <td>
									<input type="text" id="nama" name="nama" class="easyui-textbox" style="width:220px;height:25px;padding:8px" data-options="prompt:'Nama',iconWidth:38">
                                </td>
                            </tr>
							<tr>
                                <td><label>Alamat <font color='red'>*</font></label></td>
                                <td>:</td>
                                <td>
									<input name="alamat" id="alamat" class="easyui-textbox" data-options="multiline:true,prompt:'Alamat'" style="width:360px;height:50px;padding:8px">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Telepon <font color='red'>*</font></label></td>
                                <td>:</td>
                                <td>
									<input name="telpon" id="telpon" class="easyui-numberbox" data-options="prompt:'Telepon'" style="width:150px;height:25px;padding:8px">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button id="btnSaveUser" onclick="saveMasterUser()">Save</button>
                                    <button onclick="location.reload()">Batal</button>
									<img src="../images/famfam/printer.png" onClick="cetakCustomer()" style="cursor:pointer;" width="18px"/>
                                </td>
                            </tr>
                        </table>
						<br/>
						<table id="gridUser" class="easyui-datagrid" title="Customer" style="width:100%;height:350px"
							data-options="rownumbers:true,singleSelect:true,collapsible:true,url:'../json/get_customer.php',method:'get',
							pagination:true,
							pageSize:20,
							onSelect: function(){
								editUser()
							}">
						<thead>
							<tr>																
								<th width="20%" data-options="field:'nama'">Nama</th>
								<th width="50%" data-options="field:'alamat'">Alamat</th>							
								<th width="20%" data-options="field:'telpon'">Telepon</th>							
							</tr>
						</thead>
					</table>
			</td>
        </tr>
    </table>
</td>
<script type="text/javascript">	
	function cetakCustomer() {
		window.open('../form/cetak_rekap_customer.php','_blank');
	}
	function saveMasterUser() {
		var obj = [{
				nama :  $('#nama').textbox('getValue'),
				alamat :  $('#alamat').textbox('getValue'),
				telpon :  $('#telpon').textbox("getValue")
			}];
			
		if ($('#alamat').textbox('getValue') != "" && $('#telpon').textbox('getValue') != ""
			&& $('#nama').textbox('getValue') != "") {
		
			$.ajax({
				type	: "POST",
				url		: "../system/master_customer_service.php",
				data	: {
					data : obj
				},
				success	: function(data){
					if (data != null) {
						location.reload();
					} else {
						$.messager.alert('Kesalahan', data, 'error');
					}
					//$.messager.alert('Info', 'Data berhasil disimpan ', 'info');
					//refreshUser();
				}
			});
		} else {
			$.messager.alert('Kesalahan', 'Field yang bertanda * harus di isi ! ', 'error');
		}
	}
</script>
