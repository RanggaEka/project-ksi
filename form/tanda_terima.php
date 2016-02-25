<td width="156">&nbsp;</td>
<td>
    <br>
    <table width="80%" border="1" align="left" cellpadding="4" cellspacing="2" style="border: solid 1px #efefef;">
        <tr>
            <td>
                <!--<form action="../system/tanda_terima_service.php" method="post" enctype="multipart/form-data">-->
                        <table width="100%" border="0" cellspacing="0" cellpadding="1">
                            <tr>
                                <td width="8%"><label>CN <font color='red'>*</font></label></td>
                                <td width="1%">:</td>
                                <td width="23%">
                                    <input name="cn" id="cn" type="text" class="easyui-searchbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'CN',searcher:searchNoCN">
                                </td>
                                <td width="80%" rowspan="5" valign="top">
                                    <!--SERVICE-->
                                    Service <font color='red'>*</font> :
                                    <table width="28%" border="0" cellpadding="2" cellspacing="0" style="border:1px solid #CCCCCC; border-radius:4px;">
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
															prompt:'Agent'">
											</td>
										</tr>
									</table>
                                    <!--AKUMULASI-->
                                    Akumulasi <font color='red'>*</font> :
									<table width="85%" border="1" cellpadding="2" cellspacing="0" style="border:1px solid #CCCCCC; border-radius:4px;">
										<tr>
											<td width="40" valign="middle">Coll</td>
											<td width="40" valign="middle">
										  <input name="coll" id="coll" type="text" value="1" class="easyui-numberbox" style="width:80px;height:25px;padding:8px" data-options="prompt:'Coll'"> </td>
											<td width="30" valign="middle">Berat</td>
											<td width="40" valign="middle"><input name="kg" id="kg" type="text" value="1" class="easyui-numberbox" precision="2" 
																				style="width:60px;height:25px;padding:8px" 
																				data-options="prompt:'Berat',onChange: function(value){
																				var tarif = parseInt($('#tarif').textbox('getValue'))
																				var kg = parseInt($('#kg').textbox('getValue'))
																				var vol = parseInt($('#vol').textbox('getValue'))
																				var biaya = parseInt($('#biaya').textbox('getValue'))
																				var packing_kayu = parseInt($('#packing_kayu').textbox('getValue'))
																				var asuransi = parseInt($('#asuransi').textbox('getValue'))													
																				var subtotal = parseInt($('#subtotal').textbox('getValue'))	
																				if(vol > kg){
																				var sum = (tarif * vol) + packing_kayu + asuransi + biaya
																				}else{
																				var sum = (tarif * kg) + packing_kayu + asuransi + biaya
																				}													
																				$('#subtotal').textbox('setValue',sum)
																				$('#total').textbox('setValue',sum)
																				}">
												KG </td>
											<td width="80" valign="middle">Volume</td>
											<td width="60" valign="middle"><input name="vol" id="vol" type="text" value="1" class="easyui-numberbox" 
																			precision="2" style="width:60px;height:25px;padding:8px" 
																			data-options="prompt:'Volume',onChange: function(value){
																			var tarif = parseInt($('#tarif').textbox('getValue'))
																				var kg = parseInt($('#kg').textbox('getValue'))
																				var vol = parseInt($('#vol').textbox('getValue'))
																				var biaya = parseInt($('#biaya').textbox('getValue'))
																				var packing_kayu = parseInt($('#packing_kayu').textbox('getValue'))
																				var asuransi = parseInt($('#asuransi').textbox('getValue'))													
																				var subtotal = parseInt($('#subtotal').textbox('getValue'))	
																				if(vol > kg){
																				var sum = (tarif * vol) + packing_kayu + asuransi + biaya
																				}else{
																				var sum = (tarif * kg) + packing_kayu + asuransi + biaya
																				}													
																				$('#subtotal').textbox('setValue',sum)
																				$('#total').textbox('setValue',sum)
																			}">
												M3 </td>
										<tr>
											<td valign="middle">Packing Kayu</td>
											<td valign="middle"><input name="packing_kayu" id="packing_kayu" type="text" value="0" class="easyui-numberbox" 
																	min="0" precision="0" style="width:80px;height:25px;padding:8px" 
																	data-options="prompt:'Packing Kayu',onChange: function(value){													
																	var tarif = parseInt($('#tarif').textbox('getValue'))
																				var kg = parseInt($('#kg').textbox('getValue'))
																				var vol = parseInt($('#vol').textbox('getValue'))
																				var biaya = parseInt($('#biaya').textbox('getValue'))
																				var packing_kayu = parseInt($('#packing_kayu').textbox('getValue'))
																				var asuransi = parseInt($('#asuransi').textbox('getValue'))													
																				var subtotal = parseInt($('#subtotal').textbox('getValue'))	
																				if(vol > kg){
																				var sum = (tarif * vol) + packing_kayu + asuransi + biaya
																				}else{
																				var sum = (tarif * kg) + packing_kayu + asuransi + biaya
																				}													
																				$('#subtotal').textbox('setValue',sum)
																				$('#total').textbox('setValue',sum)
																	}">											</td>
											<td valign="middle">Asuransi</td>
											<td valign="middle"><input name="asuransi" id="asuransi" type="text" value="0" class="easyui-numberbox" 
																	min="0" precision="0" style="width:80px;height:25px;padding:8px" 
																	data-options="prompt:'Asuransi',onChange: function(value){
																	var tarif = parseInt($('#tarif').textbox('getValue'))
																				var kg = parseInt($('#kg').textbox('getValue'))
																				var vol = parseInt($('#vol').textbox('getValue'))
																				var biaya = parseInt($('#biaya').textbox('getValue'))
																				var packing_kayu = parseInt($('#packing_kayu').textbox('getValue'))
																				var asuransi = parseInt($('#asuransi').textbox('getValue'))													
																				var subtotal = parseInt($('#subtotal').textbox('getValue'))	
																				if(vol > kg){
																				var sum = (tarif * vol) + packing_kayu + asuransi + biaya
																				}else{
																				var sum = (tarif * kg) + packing_kayu + asuransi + biaya
																				}													
																				$('#subtotal').textbox('setValue',sum)
																				$('#total').textbox('setValue',sum)
																	}">											</td>
											<td valign="middle" bgcolor="#ADE5F7">Biaya Lainnya</td>
										  <td valign="middle" bgcolor="#ADE5F7"><input name="biaya" id="biaya" type="text" value="0" class="easyui-numberbox" min="0" 
																	precision="0" style="width:80px;height:25px;padding:8px" 
																	data-options="prompt:'Biaya Lainnya',onChange: function(value){
																	var tarif = parseInt($('#tarif').textbox('getValue'))
																				var kg = parseInt($('#kg').textbox('getValue'))
																				var vol = parseInt($('#vol').textbox('getValue'))
																				var biaya = parseInt($('#biaya').textbox('getValue'))
																				var packing_kayu = parseInt($('#packing_kayu').textbox('getValue'))
																				var asuransi = parseInt($('#asuransi').textbox('getValue'))													
																				var subtotal = parseInt($('#subtotal').textbox('getValue'))	
																				if(vol > kg){
																				var sum = (tarif * vol) + packing_kayu + asuransi + biaya
																				}else{
																				var sum = (tarif * kg) + packing_kayu + asuransi + biaya
																				}													
																				$('#subtotal').textbox('setValue',sum)
																				$('#total').textbox('setValue',sum)
																	}">											</td>
										<tr>
											<td colspan="4" rowspan="3" valign="middle">
											Deskripsi Paket <font color='red'>*</font>
                                            <table width="100%" border="0" cellpadding="2" cellspacing="1" >
                                        <tr>
                                            <td valign="top">
                                                <input name="deskripsi" id="deskripsi" class="easyui-textbox" data-options="multiline:true,prompt:'Deskripsi Paket'" style="width:100%;height:70px;padding:8px">
                                            </td>
                                      <tr/>
                                    </table>
										  </td>
											<td valign="middle" bgcolor="#ADE5F7">Tarif</td>
										  <td valign="middle" bgcolor="#ADE5F7"><input name="tarif" id="tarif" type="text" 
																	value="0" class="easyui-numberbox" min="0" 
																	precision="0" style="width:80px;height:25px;padding:8px" 
																	data-options="prompt:'Tarif',onChange: function(value){
																	var tarif = parseInt($('#tarif').textbox('getValue'))
																				var kg = parseInt($('#kg').textbox('getValue'))
																				var vol = parseInt($('#vol').textbox('getValue'))
																				var biaya = parseInt($('#biaya').textbox('getValue'))
																				var packing_kayu = parseInt($('#packing_kayu').textbox('getValue'))
																				var asuransi = parseInt($('#asuransi').textbox('getValue'))													
																				var subtotal = parseInt($('#subtotal').textbox('getValue'))	
																				if(vol > kg){
																				var sum = (tarif * vol) + packing_kayu + asuransi + biaya
																				}else{
																				var sum = (tarif * kg) + packing_kayu + asuransi + biaya
																				}													
																				$('#subtotal').textbox('setValue',sum)
																				$('#total').textbox('setValue',sum)
																	}">											</td>
										</tr>
										<tr>
											<td bgcolor="#ADE5F7">SubTotal</td>
										  <td bgcolor="#ADE5F7"><input name="subtotal" id="subtotal" type="text" class="easyui-numberbox" 
												disabled min="0" precision="0" style="width:80px;height:25px;padding:8px" data-options="prompt:'SubTotal'">											</td>
										</tr>
										<tr>
											<td bgcolor="#ADE5F7">Total</td>
										  <td bgcolor="#ADE5F7"><input name="total" id="total" type="text" class="easyui-numberbox" disabled min="0" 
												precision="0" style="width:80px;height:25px;padding:8px" data-options="prompt:'Total'">											</td>
										</tr>
								  </table>
                                    <!--DESKRIPSI-->
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
												style="width:200px;height:25px;padding:8px"
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
												class="easyui-textbox" 												
												style="width:200px;height:25px;padding:8px"
												name="tujuan" id="tujuan" data-options="prompt:'Tujuan'">
												<!--data-options="
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
												"-->
											
                                        </div>
                                        <input name="alamat_pengirim" id="alamat_pengirim" class="easyui-textbox" data-options="multiline:true,prompt:'Alamat Pengirim'" style="width:200px;height:50px;padding:8px">
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
                                            <input name="penerima" id="penerima" type="text" class="easyui-textbox" style="width:200px;height:25px;padding:8px" data-options="prompt:'Penerima'">
                                        </div>
                                        <input name="alamat_penerima" id="alamat_penerima" class="easyui-textbox" data-options="multiline:true,prompt:'Alamat Penerima'" style="width:200px;height:50px;padding:8px">
										<div style="padding-bottom:2px;padding-top:2px;">
										<input name="telpon_penerima" id="telpon_penerima" class="easyui-numberbox" data-options="prompt:'Telpon Penerima'" style="width:150px;height:25px;padding:8px">
										</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
										<button name="cetak_tt" id="cetak_tt" onclick="cetakTandaTerima()">Cetak</button>
                                        <button name="simpan_tt" id="simpan_tt" onclick="saveTandaTerima()">Save</button>
                                        <button onclick="location.reload()">Batal</button>
                                    </td>
                                </tr>
                        </table>
                    <!--</form>-->
                    <br/>
                    <br/>
                    <table id="gridFormTandaTerima" class="easyui-datagrid" style="width:100%;height:185px"
						data-options="rownumbers:true,singleSelect:true,
									collapsible:true,url:'../json/get_tanda_terima.php',
									method:'get',pagination:true,
									pageSize:20,
									onSelect: function(){
										rowClickTandaTerima()
									}">
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
	document.getElementById('cetak_tt').style.display = "none";	
	function cetakTandaTerima() {
		window.open('../form/cetak_tanda_terima.php?CN='+$('#cn').textbox('getText'),'_blank');
	}
	
	function rowClickTandaTerima() {
		var row = $('#gridFormTandaTerima').datagrid('getSelected');
		if (row){
			$('#cn').textbox('setText',row.no_cn)
			$('#tanggal').datebox('setValue',row.tanggal)
			$('#pengirim').combo("setText",row.pengirim)
			$('#tujuan').combo("setText",row.tujuan)
			$('#alamat_pengirim').textbox('setText',row.alamat_pengirim)
			$('#telpon_pengirim').textbox('setText',row.telpon_pengirim)
			$('#penerima').textbox('setText',row.penerima)
			$('#alamat_penerima').textbox('setText',row.alamat_penerima)
			$('#telpon_penerima').textbox('setText',row.telpon_penerima)
			$('#udl').combo('setText',row.service_udl)
			$('#dtddtp').combo("setText",row.service_dtddtp)
			$('#agent').combo("setText",row.service_agent)
			$('#coll').textbox('setText',parseInt(row.total_coll))
			$('#kg').textbox('setText',parseInt(row.total_berat))
			$('#vol').textbox('setText',parseInt(row.total_vol))
			$('#tarif').textbox('setText',parseInt(row.tarif))
			$('#packing_kayu').textbox('setText',parseInt(row.packing_kayu))
			$('#asuransi').textbox('setText',parseInt(row.asuransi))
			$('#biaya').textbox('setText',parseInt(row.biaya))
			$('#subtotal').textbox('setText',parseInt(row.subtotal))
			$('#total').textbox('setText',parseInt(row.grand_total))
			$('#deskripsi').textbox('setText',row.deskripsi_paket)
			document.getElementById('simpan_tt').style.display = "none"	
			document.getElementById('cetak_tt').style.display = "inline-table"	
		}
	}
	function searchNoCN(value){
		if (value == "") {
			//alert('Data tidak ditemukan !')
			$.messager.alert('Peringatan', 'No CN Masih Kosong !', 'warning');
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
						$('#telpon_pengirim').textbox('setText',dataa[0].telpon_pengirim)
						$('#penerima').textbox('setText',dataa[0].penerima)
						$('#alamat_penerima').textbox('setText',dataa[0].alamat_penerima)
						$('#telpon_penerima').textbox('setText',dataa[0].telpon_penerima)
						$('#udl').combo('setText',dataa[0].service_udl)
						$('#dtddtp').combo("setText",dataa[0].service_dtddtp)
						$('#agent').combo("setText",dataa[0].service_agent)
						$('#coll').textbox('setText',parseInt(dataa[0].total_coll))
						$('#kg').textbox('setText',parseInt(dataa[0].total_berat))
						$('#vol').textbox('setText',parseInt(dataa[0].total_vol))
						$('#tarif').textbox('setText',parseInt(dataa[0].tarif))
						$('#subtotal').textbox('setText',parseInt(dataa[0].subtotal))
						$('#packing_kayu').textbox('setText',parseInt(dataa[0].packing_kayu))
						$('#asuransi').textbox('setText',parseInt(dataa[0].asuransi))
						$('#biaya').textbox('setText',parseInt(dataa[0].biaya))
						$('#total').textbox('setText',parseInt(dataa[0].grand_total))
						$('#deskripsi').textbox('setText',dataa[0].deskripsi_paket)
						document.getElementById('simpan_tt').style.display = "none"	
						document.getElementById('cetak_tt').style.display = "inline-table"	
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
		$('#tarif').textbox('setValue','0')
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
				tarif :  $('#tarif').textbox('getValue'),
				subtotal :  $('#subtotal').textbox('getValue'),
				packing_kayu :  $('#packing_kayu').textbox('getValue'),
				asuransi :  $('#asuransi').textbox('getValue'),
				biaya :  $('#biaya').textbox('getValue'),
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
			&& $('#vol').textbox('getValue') != "" && $('#tarif').textbox('getValue') != "" && $('#subtotal').textbox('getValue') != ""			
			&& $('#total').textbox("getValue") != "" && $('#deskripsi').textbox('getValue') != "") {
		
			$.ajax({
				type	: "POST",
				url		: "../system/tanda_terima_service.php",
				data	: {
					data : obj
				},
				success	: function(data){
					if (data != "") {
						$.messager.alert('Peringatan', data, 'warning');
					} else {					
						setTimeout(function() {
							$.messager.confirm('Print Tanda Terima', 'Cetak Tanda Terima Sekarang ?', function(r){
								if (r){
									//window.location.href='../form/cetak_invoice.php?no_inv='+$('#no_inv').textbox('getValue');
									window.open('../form/cetak_tanda_terima.php?CN='+$('#cn').textbox('getValue'),'_blank');
									location.reload()
								} else {
									location.reload()
								}
							});
						},100)
					}
				}
			});
		} else {
			$.messager.alert('Kesalahan', 'Field yang bertanda * harus di isi ! ', 'error');
		}
	}
</script>
