<td width="156">&nbsp;</td>
<td>
    <br>
    <table width="75%" border="0" align="left" cellpadding="4" cellspacing="2" style="border: solid 1px #efefef;">
        <tr>
            <td>
                <!--<form action="../system/tanda_terima_service.php" method="post" enctype="multipart/form-data">-->
                        <table width="100%" border="0" cellspacing="0" cellpadding="1">
                            <tr>
                                <td width="10%"><label>CN</label></td>
                                <td width="1%">:</td>
                                <td width="40%">
                                    <input name="cn" id="cn" type="text" class="easyui-searchbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'CN',searcher:searchNoCN">
                                </td>
                                <td width="70%" rowspan="5" valign="top">
                                    Service :
                                    <table width="40%" border="0" cellpadding="2" cellspacing="1" style="border:1px solid #CCCCCC; border-radius:4px;"">
                                        <tr>
											<td width="30">U/D/L</td>
                                            <td valign="middle">
                                                <select class="easyui-combobox" name="udl" id="udl" style="width:110px;height:25px;padding:8px">
														<option value="U">U</option>
														<option value="D">D</option>
														<option value="L">L</option>
													</select>
                                            </td>
                                            <tr/>
                                            <tr>
												<td>DTD/DTP</td>
                                                <td valign="middle">
                                                    <select class="easyui-combobox" name="dtddtp" id="dtddtp" style="width:110px;height:25px;padding:8px">
														<option value="DTD">DTD</option>
														<option value="DTP">DTP</option>
													</select>
                                                </td>
                                                <tr/>
                                                <tr>
													<td>Agent</td>
                                                    <td valign="middle">
                                                        <select class="easyui-combobox" name="agent" id="agent" style="width:110px;height:25px;padding:8px">
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
                                    Akumulasi :
                                    <table width="40%" border="0" cellpadding="2" cellspacing="1" style="border:1px solid #CCCCCC; border-radius:4px;">
                                        <tr>
											<td width="56">Coll</td>
                                            <td valign="top">
                                                <input name="coll" id="coll" type="text" class="easyui-numberbox" style="width:110px;height:25px;padding:8px" data-options="prompt:'Coll'"> </td>
										<tr/>
										<tr>
											<td>Berat</td>
											<td valign="middle">
												<input name="kg" id="kg" type="text" class="easyui-numberbox" precision="2" style="width:80px;height:25px;padding:8px" 
												data-options="prompt:'Berat',onChange: function(value){
													var total = parseInt($('#total').textbox('getText'))
													var sum = total * parseInt($('#kg').textbox('getText'))
													$('#total').textbox('setText',sum)
												  }"> KG 
											</td>
										<tr/>
										<tr>
											<td>Volume</td>
											<td valign="top">
												<input name="vol" id="vol" type="text" class="easyui-numberbox" precision="2" style="width:110px;height:25px;padding:8px" data-options="prompt:'Volume'"> 
											</td>
										</tr>
										<tr>
											<td>Total</td>
											<td valign="top">
												<input name="total" id="total" type="text" class="easyui-numberbox" disabled min="0" precision="0" style="width:110px;height:25px;padding:8px" data-options="prompt:'Total'"> 
											</td>
										</tr>
                                    </table>
                                    Deskripsi Paket :
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
                                    <td><label>Tanggal</td>
				         	<td>:</td>
				         	<td>
								<input name="tanggal" id="tanggal" class="easyui-datebox" style="width:150px;height:25px;padding:8px" placeholder="Tanggal" data-options="prompt:'Tanggal'"></input>					       
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
														valueField:'kota',
														textField:'tujuan',
														panelHeight:'150',
														panelWidth: 350,
														prompt:'Tujuan',
														formatter: formatItemTujuan,
														onSelect: function(val){
															onSelectedTujuan(val)
														}
												">
											
                                        </div>
                                        <input name="alamat_pengirim" id="alamat_pengirim" class="easyui-textbox" data-options="multiline:true,prompt:'Alamat Pengirim'" style="width:300px;height:80px;padding:8px">
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top"><label>Penerima</label></td>
                                    <td valign="top">:</td>
                                    <td>
                                        <div style="padding-bottom:2px;">
                                            <input name="penerima" id="penerima" type="text" class="easyui-textbox" style="width:240px;height:25px;padding:8px" data-options="prompt:'Penerima'">
                                        </div>
                                        <input name="alamat_penerima" id="alamat_penerima" class="easyui-textbox" data-options="multiline:true,prompt:'Alamat Penerima'" style="width:300px;height:80px;padding:8px">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button name="simpan_tt" id="simpan_tt" onclick="saveTandaTerima()">Save</button>
                                        <button onclick="refreshTandaTerima()">Batal</button>
                                    </td>
                                </tr>
                        </table>
                    <!--</form>-->
                    <table id="gridFormTandaTerima" class="easyui-datagrid" style="width:100%;height:185px"
						data-options="singleSelect:true,collapsible:true,url:'../json/get_tanda_terima.php',method:'get'">
                        <thead>
                        <tr>
                            <th style="width:4%" data-options="field:'no'">No</th>
                            <th style="width:14%" data-options="field:'no_cn'">CN</th>
                            <th style="width:14%" data-options="field:'tanggal'">Tanggal</th>
                            <th style="width:20%" data-options="field:'pengirim'">Pengirim</th>
                            <th style="width:55%" data-options="field:'tujuan'">Tujuan</th>
                            <th style="width:16%" data-options="field:'grand_total'" align="right" formatter="formatPrice">Total</th>
                        </tr>
                        </thead>
                    </table>
            </td>
            </tr>
    </table>
</td>
