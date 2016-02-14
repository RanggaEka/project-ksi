<td width="156">&nbsp;</td>
<td>
	<br>
	<table width="75%" border="1" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
		<tr>
          	<td>
					<form action="../system/invoice_service.php" method="post" enctype="multipart/form-data">
					<table width="80%" border="0" cellspacing="0" cellpadding="3">
						<tr>
				          	<td width="80px"><label>No. Invoice </label></td>
				         	<td>:</td>
				         	<td><input class="easyui-searchbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38,searcher:doSearch" id="no_inv" name="no_inv"></td>
				         	<script>
								function doSearch(value){
									alert('You input: ' + value);
								}
							</script>
				        </tr>
				        <tr>
				          	<td><label>Tanggal</label></td>
				         	<td>:</td>
				         	<td><input class="easyui-datebox" style="width:150px;height:25px;padding:8px" placeholder="Tanggal" data-options="prompt:'Tanggal'"></input></td>
				        </tr>
				        <tr>
				          	<td><label>Customer</label></td>
				         	<td>:</td>
				         	<td>
				         		<input class="easyui-combobox" 
									name="language"
									style="width:180px;height:25px;padding:8px"
									data-options="
											prompt:'Customer',
											url:'../json/get_customer.php',
											method:'get',
											valueField:'sid',
											textField:'nama',
											panelHeight:'150',
											panelWidth: 350,
											formatter: formatItem
									">			         	
								</td>
				        </tr>
				        <tr>
				          	<td></td>
				         	<td></td>
				         	<td></td>
				        </tr>
			    	</table>
			    	<button type="submit" name="simpan_inv">Save</button>
					<button type="reset" onclick="location.reload()">Batal</button>	
	    			<table class="table hovered" id="detail_invoice" class="easyui-datagrid" title="" style="width:98%;height:180px"
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
                        <tbody>
                    	<tr>														
                        	<td>
								<!--script>
									function nomor() {
										var no = (document.getElementById("detail_invoice").rows.length - 2) + 1;
										document.getElementById("nomor").innerHTML = no;
									}
								</script>
								<span id="nomor">&nbsp;</span-->								
								<input class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'No CN',iconWidth:38" id="no_cn" name="no_cn">
								<a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#lookuptandaterima').window('open')"><img src="../images/famfam/application_xp.png" /></a>
								<div id="lookuptandaterima" class="easyui-window" title="Lookup Tanda Terima" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:67%;height:320px;padding:10px; text-align:left;">
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
                                <table id="gridLookupTandaTerima" class="easyui-datagrid" title="" style="width:98%;height:180px"
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
                                        <br/>
                                        <div style="float:right;">
											<button type="submit" onclick="tambahDetail()">Pilih</button>
										</div>
                                    </div>
                        	</td>
                        	<td><input class="easyui-textbox" style="width:190px;height:25px;padding:8px" data-options="prompt:'Tanggal',iconWidth:38" id="tanggal" name="tanggal"></td>
                        	<td><input class="easyui-textbox" style="width:190px;height:25px;padding:8px" data-options="prompt:'Pengirim',iconWidth:38" id="pengirim" name="pengirim"></td>
                        	<td><input class="easyui-textbox" style="width:190px;height:25px;padding:8px" data-options="prompt:'Tujuan',iconWidth:38" id="tujuan" name="tujuan"></td>
                        	<td><input class="easyui-textbox" style="width:190px;height:25px;padding:8px" data-options="prompt:'Total',iconWidth:38" id="total" name="total"></td>							
                        </tr>
                        </tbody>
                    </table>
			    </form>
			</td>
	    </tr>
	</table>
</td>
	<script type="text/javascript">
		function tambahDetail(){
			var row = $('#gridLookupTandaTerima').datagrid('getSelected');
			if (row){
				$('#no_cn').textbox('setValue', row.no_cn);
				$('#tanggal').textbox('setValue', row.tanggal);
				$('#pengirim').textbox('setValue', row.pengirim);
				$('#tujuan').textbox('setValue', row.tujuan);
				$('#total').textbox('setValue', row.grand_total);
				$('#lookuptandaterima').window('close');				
			}else{
				$.messager.alert('Kesalahan', 'Belum Ada Tanda Terima Yang dipilih');
			}
		}		
	</script>
