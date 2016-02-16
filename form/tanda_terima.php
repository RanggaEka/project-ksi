<td width="156">&nbsp;</td>
<td>
    <br>
    <table width="75%" border="0" align="left" cellpadding="4" cellspacing="2" style="border: solid 1px #efefef;">
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
														<!--$(agent).combo("getValue")-->
													</select>
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
								<input name="tanggal" id="tanggal" class="easyui-datebox" style="width:150px;height:25px;padding:8px" placeholder="Tanggal" data-options="prompt:'Tanggal',formatter:myformatter,parser:myparser"></input>					       
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
                                        <button onclick="refreshTandaTerima()">Batal</button>
                                    </td>
                                </tr>
                        </table>
                    <!--</form>-->
                    <table id="gridFormTandaTerima" class="easyui-datagrid" style="width:100%;height:180px"
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
