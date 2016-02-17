<td width="156">&nbsp;</td>
<td>
    <br>
    <table width="80%" border="1" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
        <tr>
            <td>
                    <!--form action="../system/kelola_admin_service.php" method="post" enctype="multipart/form-data"-->
                        <table width="80%" border="0" cellspacing="0" cellpadding="3">
                            <tr>
                                <td width="150px"><label>Username <font color='red'>*</font></label></td>
                                <td>:</td>
                                <td>									
                                    <input type="text" id="username" name="username" class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'Username',iconWidth:38">
									<input type="hidden" id="user_id" name="user_id" class="easyui-textbox" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Password <font color='red'>*</font></label></td>
                                <td>:</td>
                                <td>
									<input type="password" id="password" name="password" class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'Password',iconWidth:38">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Nama <font color='red'>*</font></label></td>
                                <td>:</td>
                                <td>
									<input type="text" id="nama" name="nama" class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'Nama',iconWidth:38">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Jenis Kelamin <font color='red'>*</font></label></td>
                                <td>:</td>
                                <td>
									<select class="easyui-combobox" name="jenis_kelamin" id="jenis_kelamin" style="width:110px;height:25px;padding:8px">
										<option value="L">Laki-laki</option>
										<option value="P">Perempuan</option>
									</select>
                                </td>
                            </tr>
							<tr>
                                <td><label>Tempat Lahir<font color='red'>*</font></label></td>
                                <td>:</td>
                                <td>
									<input type="text" id="tempat_lahir" name="tempat_lahir" class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'Tempat Lahir',iconWidth:38">
                                </td>
                            </tr>
							<tr>
                                <td><label>Tanggal Lahir <font color='red'>*</font></label></td>
                                <td>:</td>
                                <td>
									<input type="text" id="tanggal_lahir" name="tanggal_lahir" class="easyui-datebox" style="width:150px;height:25px;padding:8px" placeholder="Tanggal Lahir" data-options="prompt:'Tanggal Lahir',formatter:myformatter,parser:myparser"></input>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Alamat <font color='red'>*</font></label></td>
                                <td>:</td>
                                <td>
									<input name="alamat" id="alamat" class="easyui-textbox" data-options="multiline:true,prompt:'Alamat'" style="width:300px;height:50px;padding:8px">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Jabatan <font color='red'>*</font></label></td>
                                <td>:</td>
                                <td>
									<select class="easyui-combobox" name="jabatan" id="jabatan" style="width:110px;height:25px;padding:8px">
										<option value="ADMIN">ADMIN</option>
										<option value="USER">USER</option>
									</select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="" onclick="saveUser()">Save</button>
									<!--<button type="" onclick="editUser()">Edit</button>-->
                                    <button type="" onclick="location.reload()">Batal</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <table id="gridUser" class="easyui-datagrid" title="" style="width:98%;height:250px"
						data-options="rownumbers:true,singleSelect:true,collapsible:true,url:'../json/get_users.php',method:'get'">
						<thead>
							<tr>								
								<th data-options="field:'nama',width:100">Nama</th>
								<th data-options="field:'jenis_kelamin',width:80">Jenis Kelamin</th>
								<th data-options="field:'tempat',width:100">Tempat</th>
								<th data-options="field:'tanggal_lahir',width:100">Tanggal Lahir</th>
								<th data-options="field:'alamat',width:200">Alamat</th>
								<th data-options="field:'jabatan',width:50">Jabatan</th>
							</tr>
						</thead>
					</table>
			</td>
        </tr>
    </table>
</td>
<script type="text/javascript">	
	function editUser(){
		var row = $('#gridUser').datagrid('getSelected');
		if (row){
			$('#user_id').textbox('setValue', row.user_id);
			$('#username').textbox('setValue', row.username);
			$('#password').textbox('setValue', row.password);
			$('#nama').textbox('setValue', row.nama);
			$('#jenis_kelamin').combobox('setValue', row.jenis_kelamin);
			$('#tempat_lahir').textbox('setValue', row.tempat);
			$('#tanggal_lahir').textbox('setValue', row.tanggal_lahir);
			$('#alamat').textbox('setValue', row.alamat);
			$('#jabatan').combobox('setValue', row.jabatan);			
		}else{
			$.messager.alert('Peringatan', 'Data belum di pilih !', 'warning');
		}
	}
</script>
