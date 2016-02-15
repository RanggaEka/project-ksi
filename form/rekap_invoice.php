<td width="156">&nbsp;</td>
<td>
    <br>
    <table width="80%" border="1" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
        <tr>
            <td>
                    <form action="../system/order_header_service.php" method="post" enctype="multipart/form-data">
                        <table width="80%" border="0" cellspacing="0" cellpadding="3">
                            <tr>
                                <td width="150px"><label>No. Invoice</label></td>
                                <td>:</td>
                                <td>
                                    <input class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38" id="no_inv" name="no_inv">
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
											data-options="singleSelect:true,collapsible:true,url:'../json/get_invoice.php',method:'get'">
											<thead>
											<tr>
												<th data-options="field:'no_inv',width:200">No. Invoice</th>
												<th data-options="field:'tanggal',width:100">Tanggal</th>
												<th data-options="field:'customer_nama',width:250">Customer</th>
											</tr>
											</thead>
										</table>
                                        <br/>
                                        <div style="float:right;">
											<button type="submit" onclick="$('#lookupinvoice').window('close')">Pilih</button>
										</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Tanggal</label></td>
                                <td>:</td>
                                <td>
									
                                </td>
                            </tr>
                            <tr>
                                <td><label>Customer</label></td>
                                <td>:</td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td><label>Total</label></td>
                                <td>:</td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td><label>Tanggal Pembayaran</label></td>
                                <td>:</td>
                                <td>
									<input class="easyui-datebox" style="width:150px;height:25px;padding:8px" placeholder="Tanggal" data-options="prompt:'Tanggal'"></input>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Nilai Ppembayaran</label></td>
                                <td>:</td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="submit" name="simpan_po">Save</button>
                                    <button type="reset" onclick="location.reload()">Batal</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <table id="gridDetailInvoice" class="easyui-datagrid" title="" style="width:98%;height:250px"
									data-options="singleSelect:true,collapsible:true,url:'../json/get_invoice.php',method:'get'">
									<thead>
									<tr>
										<th data-options="field:'no_inv',width:180">CN</th>
										<th data-options="field:'tanggal',width:100">Tanggal</th>
										<th data-options="field:'customer_nama',width:200">Pengirim</th>
									</tr>
									</thead>
								</table>
				</td>
        </tr>
    </table>
</td>
