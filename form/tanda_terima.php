<td width="156">&nbsp;</td>
<td>
    <br>
    <table width="75%" border="0" align="left" cellpadding="4" cellspacing="2" style="border: solid 1px #efefef;">
        <tr>
            <td>
                <form action="../system/tanda_terima_service.php" method="post" enctype="multipart/form-data">
                        <table width="100%" border="0" cellspacing="0" cellpadding="1">
                            <tr>
                                <td width="10%"><label>CN</label></td>
                                <td width="1%">:</td>
                                <td width="40%">
                                    <input name="cn" id="cn" type="text" class="easyui-searchbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'CN',searcher:doSearch">
                                    <script>
										function doSearch(value){
											alert('You input: ' + value);
										}
									</script>
                                </td>
                                <td width="70%" rowspan="5" valign="top">
                                    Service :
                                    <table width="20%" border="0" cellpadding="2" cellspacing="1" >
                                        <tr>
                                            <td valign="top">
                                                <select class="easyui-combobox" name="udl" id="udl" style="width:180px;height:25px;padding:8px">
														<option value="" default>U/D/L</option>
														<option value="U">U</option>
														<option value="D">D</option>
														<option value="L">L</option>
													</select>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td valign="top">
                                                    <select class="easyui-combobox" name="dtddtp" id="dtddtp" style="width:180px;height:25px;padding:8px">
														<option value="" default>DTD/DTP</option>
														<option value="DTD">DTD</option>
														<option value="DTP">DTP</option>
													</select>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">
                                                        <select class="easyui-combobox" name="agent" id="agent" style="width:180px;height:25px;padding:8px">
														<option value="" default>Agent</option>
														<option value="JNE">JNE</option>
														<option value="Tiki">Tiki</option>
														<option value="RPX">RPX</option>
														<option value="Atm Logistic">Atm Logistic</option>
														<option value="Kumis Logistic">Kumis Logistic</option>
														<!--$(agent).combo("getText")-->
													</select>
                                                    </td>
                                                </tr>
                                    </table>
                                    <br/> Berat Total :
                                    <table width="20%" border="0" cellpadding="2" cellspacing="1">
                                        <tr>
                                            <td valign="top">
                                                <input name="coll" id="coll" type="text" class="easyui-numberbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'Coll'"> </td>
										<tr/>
										<tr>
											<td valign="middle">
												<input name="kg" id="kg" type="text" class="easyui-numberbox" precision="2" style="width:120px;height:25px;padding:8px" data-options="prompt:'Berat'"> KG 
											</td>
										<tr/>
										<tr>
											<td valign="top">
												<input name="vol" id="vol" type="text" class="easyui-numberbox" precision="2" style="width:150px;height:25px;padding:8px" data-options="prompt:'Volume'"> 
											</td>
										</tr>
										<tr>
											<td valign="top">
												<input name="tarif" id="tarif" type="text" class="easyui-numberbox" precision="2" style="width:150px;height:25px;padding:8px" data-options="prompt:'Tarif'"> 
											</td>
										</tr>
										<tr>
											<td valign="top">
												<input name="total" id="total" type="text" class="easyui-numberbox" precision="2" style="width:150px;height:25px;padding:8px" data-options="prompt:'Total'"> 
											</td>
										</tr>
                                    </table>
                                    <br/>
                                    Deskripsi Paket :
                                    <table width="20%" border="0" cellpadding="2" cellspacing="1" >
                                        <tr>
                                            <td valign="top">
                                                <input name="deskripsi" id="deskripsi" class="easyui-textbox" data-options="multiline:true,prompt:'Deskripsi Paket'" style="width:290px;height:50px;padding:8px">
                                            </td>
                                            <tr/>
                                    </table>
                                </td>
                                </tr>
                                <tr>
                                    <td><label>Tanggal</td>
				         	<td>:</td>
				         	<td>
								<input name="tanggal" id="tanggal" class="easyui-datebox" style="width:150px;height:25px;padding:8px" placeholder="Tanggal" data-options="formatter:formatTanggalIndonesia,parser:parserTanggal,prompt:'Tanggal'"></input>					       
							 </td>
			            </tr>
				        <tr>
				          	<td valign="top"><label>Pengirim</label></td>
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
															$('#alamat_pengirim').textbox('setText', val.alamat);
															$('#telpon_pengirim').textbox('setText', val.telpon);
														}
												">
                                        </div>                                        
                                        <input name="alamat_pengirim" id="alamat_pengirim" class="easyui-textbox" data-options="multiline:true,prompt:'Alamat Pengirim'" style="width:300px;height:80px;padding:8px">
										<input name="telpon_pengirim" id="telpon_pengirim" class="easyui-textbox" data-options="prompt:'Telpon Pengirim'" style="width:150px;height:25px;padding:8px">
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top"><label>Penerima</label></td>
                                    <td valign="top">:</td>
                                    <td>
                                        <div style="padding-bottom:2px;">
                                            <input name="penerima" id="penerima" type="text" class="easyui-textbox" style="width:240px;height:25px;padding:8px" data-options="prompt:'Penerima'">
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
                                        <input name="alamat_penerima" id="alamat_penerima" class="easyui-textbox" data-options="multiline:true,prompt:'Alamat Penerima'" style="width:300px;height:80px;padding:8px">
										<input name="telpon_penerima" id="telpon_penerima" class="easyui-textbox" data-options="prompt:'Telpon Penerima'" style="width:150px;height:25px;padding:8px">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="submit" name="simpan_tt">Save</button>
                                        <button type="reset" onclick="location.reload()">Batal</button>
                                    </td>
                                </tr>
                        </table>
                    </form>
                    <table id="gridTandaTerima" class="easyui-datagrid" style="width:100%;height:185px"
						data-options="rownumbers:true,singleSelect:true,collapsible:true,url:'../json/get_tanda_terima.php',method:'get'">
                        <thead>
                        <tr>
                            <!--th data-options="field:'no',width:40">No</th-->
                            <th data-options="field:'no_cn',width:180">CN</th>
                            <th data-options="field:'tanggal',width:100">Tanggal</th>
                            <th data-options="field:'pengirim',width:200">Pengirim</th>
                            <th data-options="field:'tujuan',width:120">Tujuan</th>
                            <th data-options="field:'grand_total',width:170" formatter="formatPrice">Total</th>
                        </tr>
                        </thead>
                    </table>
            </td>
            </tr>
    </table>
</td>
