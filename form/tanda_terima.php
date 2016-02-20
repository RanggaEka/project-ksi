<td width="156">&nbsp;</td>
<td>
    <br>
    <table width="80%" border="0" align="left" cellpadding="4" cellspacing="2" style="border: solid 1px #efefef;">
        <tr>
            <td>
                <!--<form action="../system/tanda_terima_service.php" method="post" enctype="multipart/form-data">-->
                        <table width="100%" border="0" cellspacing="0" cellpadding="1">
                            <tr>
                                <td width="10%"><label>CN <font color='red'>*</font></label></td>
                                <td width="1%">:</td>
                                <td width="40%">
                                    <input name="cn" id="cn" type="text" class="easyui-searchbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'CN',searcher:searchNoCN">
                                </td>
                                <td width="70%" rowspan="5" valign="top">
                                    Service <font color='red'>*</font> :
                                    <table width="40%" border="0" cellpadding="2" cellspacing="1" style="border:1px solid #CCCCCC; border-radius:4px;">
                                        <tr>
											<td width="30">U/D/L</td>
                                            <td valign="middle">
                                                <select class="easyui-combobox" name="udl" id="udl" style="width:110px;height:25px;padding:8px">
														<option value="U">U</option>
														<option value="D">D</option>
														<option value="L">L</option>
													</select>
                                            </td>
                                        </tr>
                                            <tr>
												<td>DTD/DTP</td>
                                                <td valign="middle">
                                                    <select class="easyui-combobox" name="dtddtp" id="dtddtp" style="width:110px;height:25px;padding:8px">
														<option value="DTD">DTD</option>
														<option value="DTP">DTP</option>
													</select>
                                                </td>
                                            </tr>
                                                <tr>
													<td>Agent</td>
                                                    <td valign="middle">
														<input
															class="easyui-combobox" 												
															style="width:110px;height:25px;padding:8px"
															name="agent" id="agent"
															data-options="
																	url:'../json/get_agent.php',
																	method:'get',
																	valueField:'agent',
																	textField:'agent',
																	panelHeight:'150',
																	panelWidth: 150,
																	prompt:'Agent'														
															">
                                                    </td>
                                                </tr>
                                    </table>
                                    Akumulasi <font color='red'>*</font> :
                                    <table width="40%" border="0" cellpadding="2" cellspacing="1" style="border:1px solid #CCCCCC; border-radius:4px;">
                                        <tr>
											<td width="56">Coll</td>
                                            <td valign="top">
                                                <input name="coll" id="coll" type="text" value="1" class="easyui-numberbox" style="width:110px;height:25px;padding:8px" data-options="prompt:'Coll'"> </td>
										<tr/>
										<tr>
											<td>Berat</td>
											<td valign="middle">
												<input name="kg" id="kg" type="text" value="1" class="easyui-numberbox" precision="2" style="width:80px;height:25px;padding:8px" 
												data-options="prompt:'Berat',onChange: function(value){
													var tarif = parseInt($('#tarif').textbox('getValue'))
													var kg = parseInt($('#kg').textbox('getValue'))
													var vol = parseInt($('#vol').textbox('getValue'))
														if(vol > kg){
															var sum = tarif * vol
														}else{
															var sum = tarif * kg
														}													
													$('#total').textbox('setValue',sum)
												  }"> KG 
											</td>
										<tr/>
										<tr>
											<td>Volume</td>
											<td valign="top">
												<input name="vol" id="vol" type="text" value="1" class="easyui-numberbox" precision="2" style="width:80px;height:25px;padding:8px" 
												data-options="prompt:'Volume',onChange: function(value){
													var tarif = parseInt($('#tarif').textbox('getValue'))
													var kg = parseInt($('#kg').textbox('getValue'))
													var vol = parseInt($('#vol').textbox('getValue'))
														if(vol > kg){
															var sum = tarif * vol
														}else{
															var sum = tarif * kg
														}													
													$('#total').textbox('setValue',sum)
												}"> M3
											</td>
										</tr>
										<tr>
											<td>Tarif</td>
											<td valign="top">
												<input name="tarif" id="tarif" type="text" class="easyui-numberbox" disabled min="0" precision="0" style="width:110px;height:25px;padding:8px" data-options="prompt:'Tarif'"> 
											</td>
										</tr>											
										<tr>
											<td>Total</td>
											<td valign="top">
												<input name="total" id="total" type="text" class="easyui-numberbox" disabled min="0" precision="0" style="width:110px;height:25px;padding:8px" data-options="prompt:'Total'"> 
											</td>
										</tr>
                                    </table>
                                    Deskripsi Paket <font color='red'>*</font> :
                                    <table width="20%" border="0" cellpadding="2" cellspacing="1" >
                                        <tr>
                                            <td valign="top">
                                                <input name="deskripsi" id="deskripsi" class="easyui-textbox" data-options="multiline:true,prompt:'Deskripsi Paket'" style="width:290px;height:46px;padding:8px">
                                            </td>
                                            <tr/>
                                    </table>
                                </td>
                                </tr>
                                <tr>
                                    <td><label>Tanggal <font color='red'>*</font></td>
				         	<td>:</td>
				         	<td>
								<input name="tanggal" id="tanggal" class="easyui-datebox" style="width:150px;height:25px;padding:8px" placeholder="Tanggal" data-options="prompt:'Tanggal',formatter:myformatter"></input>					       
							 </td>
			            </tr>
				        <tr>
				          	<td valign="top"><label>Pengirim <font color='red'>*</font></label></td>
                                    <td valign="top">:</td>
                                    <td>
                                        <div>
											<input
												class="easyui-combobox" 												
												style="width:240px;height:25px;padding:8px"
												name="pengirim" id="pengirim"
												data-options="
														url:'../json/get_customer.php',
														method:'get',
														valueField:'nama',
														textField:'nama',
														panelHeight:'150',
														panelWidth: 350,
														prompt:'Pengirim',
														formatter: formatItem,
														onSelect: function(val){
															$('#alamat_pengirim').textbox('setValue', val.alamat);
															$('#telpon_pengirim').textbox('setValue', val.telpon);
														}														
												">
                                        </div>
                                        <div style="padding-bottom:2px;padding-top:2px;">
											<input
												class="easyui-combobox" 												
												style="width:300px;height:25px;padding:8px"
												name="tujuan" id="tujuan"
												data-options="
														url:'../json/get_tujuan.php',
														method:'get',
														valueField:'kecamatan',
														textField:'kecamatan',
														panelHeight:'150',
														panelWidth: 350,
														prompt:'Tujuan',
														formatter: formatItemTujuan,
														onSelect: function(val){
															onSelectedTujuan(val)
														}
												">
											
                                        </div>
                                        <input name="alamat_pengirim" id="alamat_pengirim" class="easyui-textbox" data-options="multiline:true,prompt:'Alamat Pengirim'" style="width:300px;height:50px;padding:8px">
										<div style="padding-bottom:2px;padding-top:2px;">
										<input name="telpon_pengirim" id="telpon_pengirim" class="easyui-numberbox" data-options="prompt:'Telpon Pengirim'" style="width:150px;height:25px;padding:8px">
										</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top"><label>Penerima <font color='red'>*</font></label></td>
                                    <td valign="top">:</td>
                                    <td>
                                        <div style="padding-bottom:2px;">
                                            <input name="penerima" id="penerima" type="text" class="easyui-textbox" style="width:240px;height:25px;padding:8px" data-options="prompt:'Penerima'">
                                        </div>
                                        <input name="alamat_penerima" id="alamat_penerima" class="easyui-textbox" data-options="multiline:true,prompt:'Alamat Penerima'" style="width:300px;height:50px;padding:8px">
										<div style="padding-bottom:2px;padding-top:2px;">
										<input name="telpon_penerima" id="telpon_penerima" class="easyui-numberbox" data-options="prompt:'Telpon Penerima'" style="width:150px;height:25px;padding:8px">
										</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button name="simpan_tt" id="simpan_tt" onclick="saveTandaTerima()">Save</button>
                                        <button onclick="location.reload()">Batal</button>
                                    </td>
                                </tr>
                        </table>
                    <!--</form>-->
                    <br/>
                    <br/>
                    <table id="gridFormTandaTerima" class="easyui-datagrid" style="width:100%;height:190px"
						data-options="rownumbers:true,singleSelect:true,collapsible:true,url:'../json/get_tanda_terima.php',method:'get',pagination:true,
												pageSize:20">
                        <thead>
                        <tr>                            
                            <th style="width:10%" data-options="field:'no_cn'">CN</th>
                            <th style="width:14%" data-options="field:'tanggal'">Tanggal</th>
                            <th style="width:20%" data-options="field:'pengirim'">Pengirim</th>
                            <th style="width:35%" data-options="field:'tujuan'">Tujuan</th>
                            <th style="width:16%" data-options="field:'grand_total'" align="right" formatter="formatPrice">Total</th>
                        </tr>
                        </thead>
                    </table>
				</td>
            </tr>
    </table>
</td>
<script>
	function searchNoCN(value){
		if (value == "") {
			//alert('Data tidak ditemukan !')
			console.log("kosong");
		} else {
			$.ajax({
				type	: "GET",
				url		: "../system/tanda_terima_service.php",
				data	: {
					sch_cn : value
				},
				success	: function(data){
					console.log(data)
					if (data == "") {
						$.messager.alert('Peringatan', 'Data tidak ditemukan !', 'warning');
					} else {
						var dataa = JSON.parse(data);
						$('#cn').textbox('setText',dataa[0].no_cn)
						$('#tanggal').datebox('setValue',dataa[0].tanggal)
						$('#pengirim').combo("setText",dataa[0].pengirim)
						$('#tujuan').combo("setText",dataa[0].tujuan)
						$('#alamat_pengirim').textbox('setText',dataa[0].alamat_pengirim)
						$('#telpon_pengirim').textbox('setText',dataa[0].telepon_pengirim)
						$('#penerima').textbox('setText',dataa[0].penerima)
						$('#alamat_penerima').textbox('setText',dataa[0].alamat_penerima)
						$('#telpon_penerima').textbox('setText',dataa[0].telepon_penerima)
						$('#udl').combo('setText',dataa[0].service_udl)
						$('#dtddtp').combo("setText",dataa[0].service_dtddtp)
						$('#agent').combo("setText",dataa[0].service_agent)
						$('#coll').textbox('setText',parseInt(dataa[0].total_coll))
						$('#kg').textbox('setText',parseInt(dataa[0].total_berat))
						$('#vol').textbox('setText',parseInt(dataa[0].total_vol))
						$('#total').textbox('setText',parseInt(dataa[0].grand_total))
						$('#deskripsi').textbox('setText',dataa[0].deskripsi_paket)
						document.getElementById('simpan_tt').style.display = "none"
					}
				}
			});
		}
	}
	
	function refreshTandaTerima() {
		$('#cn').textbox('setText','')
		$('#tanggal').datebox('setValue',null)
		$('#pengirim').combo("clear")
		$('#tujuan').combo("clear")
		$('#alamat_pengirim').textbox('setText','')
		$('#telpon_pengirim').textbox('setText','')
		$('#penerima').textbox('setText','')
		$('#alamat_penerima').textbox('setText','')
		$('#telpon_penerima').textbox('setText','')
		$('#udl').combo('clear','')
		$('#dtddtp').combo("clear")
		$('#agent').combo("clear")
		$('#coll').textbox('setText','1')
		$('#kg').textbox('setText','1')
		$('#vol').textbox('setText','1')
		$('#tarif').textbox('setValue','')
		$('#total').textbox('setValue','')
		$('#deskripsi').textbox('setText','')
		document.getElementById('simpan_tt').style.display = "inline-block"
		$('#gridFormTandaTerima').datagrid('reload')
	}
	
	function saveTandaTerima() {
		var obj = [{
				cn :  $('#cn').textbox('getValue'),
				tanggal :  $('#tanggal').datebox('getValue'),
				pengirim :  $('#pengirim').combo("getText"),
				tujuan :  $('#tujuan').combo("getText"),
				alamat_pengirim :  $('#alamat_pengirim').textbox('getValue'),
				telpon_pengirim :  $('#telpon_pengirim').textbox('getValue'),
				penerima :  $('#penerima').textbox('getValue'),
				alamat_penerima :  $('#alamat_penerima').textbox('getValue'),
				telpon_penerima :  $('#telpon_penerima').textbox('getValue'),
				udl : $('#udl').combo('getValue'),
				dtddtp :  $('#dtddtp').combo("getValue"),
				agent :  $('#agent').combo("getValue"),
				coll :  $('#coll').textbox('getValue'),
				kg :  $('#kg').textbox('getValue'),
				vol :  $('#vol').textbox('getValue'),
				grand_total :  $('#total').textbox('getValue'),
				deskripsi :  $('#deskripsi').textbox('getValue')
			}];
			
		if ($('#cn').textbox('getValue') != "" && $('#tanggal').datebox('getValue') != ""
			&& $('#pengirim').textbox('getValue') != "" && $('#tujuan').combo("getText") != ""
			&& $('#alamat_pengirim').textbox('getValue') != "" && $('#telpon_pengirim').textbox('getValue') != ""
			&& $('#penerima').textbox('getValue') != "" &&  $('#alamat_penerima').textbox('getValue') != "" 
			&& $('#telpon_penerima').textbox('getValue') != "" && $('#udl').combo('getValue') != "" 
			&& $('#dtddtp').combo("getValue") != "" && $('#agent').combo("getValue") != ""
			&& $('#coll').textbox('getValue') != "" && $('#kg').textbox("getValue") != ""
			&& $('#vol').textbox('getValue') != "" && $('#total').textbox("getValue") != ""
			&& $('#deskripsi').textbox('getValue') != "") {
		
			$.ajax({
				type	: "POST",
				url		: "../system/tanda_terima_service.php",
				data	: {
					data : obj
				},
				success	: function(data){					
					//alert('Data berhasil disimpan!');
					window.location.href='../form/cetak_tanda_terima.php?CN=no_cn';
					//location.reload();
					//$.messager.alert('Info','Data berhasil disimpan!','info');
					//refreshTandaTerima();
				}
			});
		} else {
			$.messager.alert('Kesalahan', 'Field yang bertanda * harus di isi ! ', 'error');
		}
	}
</script>
