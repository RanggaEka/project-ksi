<td width="156">&nbsp;</td>
<td>
    <br>
    <table width="80%" border="1" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
        <tr>
            <td>
                    <!--form action="../system/pembayaran_invoice_service.php" method="post" enctype="multipart/form-data"-->
                        <table width="80%" border="0" cellspacing="0" cellpadding="3">
                            <tr>
                                <td width="150px"><label>No. Invoice</label></td>
                                <td>:</td>
                                <td>
                                    <input class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38" id="no_inv" name="no_inv" disabled>
                                    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#lookupinvoice').window('open')"><img src="../images/famfam/application_xp.png" /></a>
                                    <div id="lookupinvoice" class="easyui-window" title="Lookup Invoice" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:70%;height:320px;padding:10px; text-align:left;">
                                        Pencarian : <input class="easyui-searchbox" data-options="prompt:'.......',menu:'#mm',searcher:doSearch" style="width:480px;height:25px;padding:10px;"></input>
                                        <br/>
                                        <br/>
                                        <div id="mm">
                                            <div data-options="name:'semua'">Semua</div>
                                            <div data-options="name:'cn'">CN</div>
                                            <div data-options="name:'tanggal'">Tanggal</div>
                                            <div data-options="name:'pengirim'">Pengirim</div>
                                            <div data-options="name:'tujuan'">Tujuan</div>
                                        </div>
                                        <script>
                                            function doSearch(value, name) {
                                                alert('You input: ' + value + '(' + name + ')');
                                            }
                                        </script>
                                        <table id="tblLookupInvoice" class="easyui-datagrid" title="" style="width:98%;height:180px"
											data-options="rownumbers:true,singleSelect:true,collapsible:true,url:'../json/get_invoice.php',method:'get'">
											<thead>
											<tr>												
												<th data-options="field:'no_inv',width:100">No. Invoice</th>												
												<th data-options="field:'tanggal',width:100">Tanggal</th>
												<th data-options="field:'customer_nama',width:250">Customer</th>
												<th data-options="field:'total',width:100" formatter="formatPrice" align="right">Total</th>
												<th data-options="field:'cicilan',width:100" formatter="formatPrice" align="right">Cicilan</th>
												<th data-options="field:'sisa',width:100" formatter="formatPrice" align="right">Sisa</th>
											</tr>
											</thead>
										</table>
                                        <br/>
                                        <div style="float:right;">
											<button type="submit" onclick="selectInvoice()">Pilih</button>
										</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Tanggal</label></td>
                                <td>:</td>
                                <td>
									<input class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'Tanggal Invoice'" id="tanggal" name="tanggal" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Customer</label></td>
                                <td>:</td>
                                <td>
									<input class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'Nama Customer'" id="customer" name="customer" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Total</label></td>
                                <td>:</td>
                                <td>
									<input type="text" class="easyui-numberbox" min="0" precision="0" style="width:150px;height:25px;padding:8px" data-options="prompt:'Total'" id="total" name="total" disabled>
                                </td>
                            </tr>
							<tr>
                                <td><label>Cicilan</label></td>
                                <td>:</td>
                                <td>
									<input type="text" class="easyui-numberbox" min="0" precision="0" style="width:150px;height:25px;padding:8px" data-options="prompt:'Cicilan'" id="cicilan" name="cicilan" disabled>
                                </td>
                            </tr>
							<tr>
                                <td><label>Sisa</label></td>
                                <td>:</td>
                                <td>
									<input type="text" class="easyui-numberbox" min="0" precision="0" style="width:150px;height:25px;padding:8px" data-options="prompt:'Sisa'" id="sisa" name="sisa" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Tanggal Pembayaran</label></td>
                                <td>:</td>
                                <td>
									<input type="text" id="tanggal_bayar" name="tanggal_bayar" class="easyui-datebox" style="width:150px;height:25px;padding:8px" placeholder="Tanggal Pembayaran" data-options="prompt:'Tanggal Pembayaran',formatter:myformatter,parser:myparser"></input>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Nilai Pembayaran</label></td>
                                <td>:</td>
                                <td>
									<input type="text" id="bayar" name="bayar" class="easyui-numberbox" min="0" precision="0" style="width:150px;height:25px;padding:8px" 
									data-options="prompt:'Nilai Pembayaran',onChange: function(value){
													var bayar = parseInt($('#bayar').textbox('getText'))
													var sisa = parseInt($('#sisa').textbox('getText'))													
														if(bayar > sisa){
															$.messager.alert('Kesalahan', 'Nilai bayar tidak boleh lebih besar dari sisa !');
															$('#bayar').focus()
														}													
												}">									
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="submit" name="simpan_inv" onclick="savePembayaran()">Save</button>
                                    <button type="reset" onclick="location.reload()">Batal</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <table id="gridDetailInvoice" class="easyui-datagrid" title="" style="width:98%;height:250px"
									data-options="rownumbers:true,singleSelect:true,collapsible:true,url:'../json/get_invoice_detail.php',method:'get'">
									<thead>
									<tr>										
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
<script type="text/javascript">	
	function selectInvoice(){
		var row = $('#tblLookupInvoice').datagrid('getSelected');
		if (row){
			$('#no_inv').textbox('setValue', row.no_inv);
			$('#tanggal').textbox('setValue', row.tanggal);
			$('#customer').textbox('setValue', row.customer_nama);
			$('#total').textbox('setValue', row.total);
			$('#cicilan').textbox('setValue', row.cicilan);
			$('#sisa').textbox('setValue', row.sisa);
			$('#lookupinvoice').window('close');			
		}else{
			$.messager.alert('Kesalahan', 'Data belum di pilih !');
		}
	}
</script>
