<td width="156">&nbsp;</td>
<div data-dojo-type="dojo/store/JsonRest"
	 data-dojo-props="target: '../json/get_invoice_detail.php'"
	 data-dojo-id="memoryInvoice"></div>
<div data-dojo-type="dojo/data/ObjectStore"
	 data-dojo-props="objectStore: memoryInvoice"
	 data-dojo-id="storeGridInvoice"></div>
<td>
	<br>
	<table width="80%" border="1" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
		<tr>
          	<td>
				<!--<form action="../system/invoice_service.php" method="post" enctype="multipart/form-data">-->
					<table width="80%" border="0" cellspacing="0" cellpadding="3">
						<tr>
				          	<td width="100px"><label>No. Invoice <font color='red'>*</font></label></td>
				         	<td>:</td>
				         	<td><input class="easyui-searchbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38,searcher:searchNoInv" id="no_inv" name="no_inv"></td>
				        </tr>
				        <tr>
				          	<td><label>Tanggal <font color='red'>*</font></label></td>
				         	<td>:</td>
				         	<td><input id="tgl_inv" name="tgl_inv" class="easyui-datebox" style="width:150px;height:25px;padding:8px" placeholder="Tanggal" data-options="prompt:'Tanggal',formatter:myformatter,parser:myparser"></input></td>
				        </tr>
				        <tr>
				          	<td><label>Customer <font color='red'>*</font></label></td>
				         	<td>:</td>
				         	<td>
				         		<input class="easyui-combobox" 
									name="language"
									id="customer_inv"
									name="customer_inv"
									style="width:180px;height:25px;padding:8px"
									data-options="
											prompt:'Customer',
											url:'../json/get_customer.php',
											method:'get',
											valueField:'sid',
											textField:'nama',
											panelHeight:'150',
											panelWidth: 350,
											formatter: formatItem,
											onSelect: function(rec){
												onLockingData(rec.nama,'INVOICE')
												dijit.byId('gridDetailInvoice').setQuery({no_query : 'XXXXX'});
												setTimeout(function(){
													dijit.byId('gridDetailInvoice').store.newItem({
														sid : '',
														no_cn : '',
														lookup : '',
														tanggal : '',
														tujuan : '',
														grand_total : '',
														delete : ''
													})													
												},100)
											}
									">			         	
								</td>
				        </tr>
				        <tr>
				          	<td>Jatuh Tempo </td>
				         	<td>:</td>
				         	<td><input id="jatuh_tempo" name="jatuh_tempo" class="easyui-datebox" style="width:150px;height:25px;padding:8px" data-options="prompt:'Jatuh Tempo',formatter:myformatter,parser:myparser"></input></td>
				        </tr>
			    	</table>
					<button name="cetak_inv" id="cetak_inv" onclick="cetakInvoice()">Cetak</button>
			    	<button type="submit" onclick="saveInvoice()" name="simpan_inv" id="simpan_inv">Save</button>
					<button type="reset" onclick="releaseLocking()">Batal</button>	
					<table id="gridDetailInvoice"
						   data-dojo-id="gridDetailInvoice"
						   data-dojo-type="dojox/grid/EnhancedGrid"
						   selectionMode="single"
						   clientSort="false"
						   store="storeGridInvoice"
						   style="width: 100%;height:160px;"
						   noDataMessage="..Entri Detail Invoice..">
						<thead>
							<tr>
								<th noresize="true" field="sid" hidden></th>&nbsp;</th>
								<th width="50%" noresize="true" field="no_cn">No CN</th>
								<th noresize="true" formatter="formatterLookupNoCN" width="3%">&nbsp;</th>
								<th width="10%" noresize="true" field="tanggal">Tanggal</th>
								<th width="40%" noresize="true" field="tujuan">Tujuan</th>
								<th width="15%" noresize="true" field="grand_total">Total</th>
								<th noresize="true" formatter="formatterDeleteRow" width="3%">&nbsp;</th>
							</tr>
						</thead>
					</table>
			    <!--</form>-->
			    
			    <!--<LOOKUP>-->
			    <div id="lookupinvoice" class="easyui-window" title="Lookup Tanda Terima" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:70%;height:330px;padding:10px; text-align:left;">
					Pencarian : <input id="searchBoxLookupTandaInvoice" class="easyui-searchbox" data-options="prompt:'.......',menu:'#mm',searcher:doSearchRekapLookupTandaTerima" style="width:480px;height:25px;padding:10px;"></input>
					<br/>
					<br/>
					<div id="mm">
						<div data-options="name:'semua'">Semua</div>
						<div data-options="name:'cn'">CN</div>
						<div data-options="name:'tanggal'">Tanggal</div>
						<div data-options="name:'tujuan'">Tujuan</div>
					</div>
					<table id="gridLookupTandaTerima" class="easyui-datagrid" title="" style="width:99%;height:190px"
						data-options="rownumbers:true,
						singleSelect:true,
						collapsible:true,url:'../json/get_tanda_terima.php',
						method:'get',
						onDblClickRow:function(){
							selectDetailTandaTerima()
						}">
						<thead>
						<tr>
							<th width="13%" data-options="field:'no_cn'">No CN </th>
							<th width="13%" data-options="field:'tanggal'">Tanggal</th>
							<th width="55%" data-options="field:'tujuan'">Tujuan</th>
							<th width="15%" data-options="field:'grand_total'" formatter="formatPrice">Total</th>
						</tr>
						</thead>
					</table>
					<br/>
					<div style="float:right;">
						<button type="submit" onclick="selectDetailTandaTerima()">Pilih</button>
					</div>
				</div>
				<!--<LOOKUP>-->
				
				<table id="gridRekapInvoice" style="width:101%;height:190px" title="Rekap Invoice"
						data-options="singleSelect:true,
							collapsible:true,url:'../json/data-header-rekap-inv.php',
							method:'get',
							rownumbers:true,
							pagination:true,
							pageSize:20,
							onSelect: function(){
								rowClickEntriInvoice()
							}" class="easyui-datagrid">
				<thead>
					<tr>
						<th field="no_inv" width="15%">No Inv</th>
						<th field="tanggal" width="10%">Tanggal Inv</th>
						<th field="customer_nama" width="29%">Cust</th>
						<th field="total" align="right" width="10%">Total</th>
						<th field="keterangan" width="15%">Keterangan</th>
					</tr>
				</thead>
			</td>
	    </tr>
	</table>
</td>

<script type="text/javascript">
	var tblIndex = "";
	document.getElementById('cetak_inv').style.display = "none";
	setTimeout(function() {
		dijit.byId('gridDetailInvoice').setQuery({no_query : 'XXXXX'});
	},100)
	
	
	function cetakInvoice() {
		window.open('../form/cetak_invoice.php?no_inv='+$('#no_inv').textbox('getText'),'_blank');
	}
	
	function formatterLookupNoCN(value, index) {
		tblIndex = index
		var tbl = dijit.byId('gridDetailInvoice')
		var getSID = tbl.getItem(index).sid
		if (getSID != "") {
			return ""
		} else {
			return "<a id='btnLookup"+index+"' href='javascript:void(0)' onclick='showLookupTandaTerima("+index+")'><img src='../images/famfam/application_xp.png' /></a>"
		}
	}
	
	function formatterDeleteRow(value, index) {
		var tbl = dijit.byId('gridDetailInvoice')
		var getSID = tbl.getItem(index).sid
		if (getSID == "") {
			return ""
		} else {
			if (tbl.getItem(index).is_sudah_invoice) {
				return ""
			} else {
				return "<a id='btnDeleteLookup"+index+"' href='javascript:void(0)' onclick='deleteRowTandaTerima("+index+")'><img src='../images/famfam/delete.png' /></a>"
			}
		}
	}
	
	function showLookupTandaTerima(index) {
		if ($('#customer_inv').combo('getText') != "") {
			setTimeout(function(){
				$('#lookupinvoice').window('open')
				$('#searchBoxLookupTandaInvoice').searchbox('clear');
				var tbl = dijit.byId('gridDetailInvoice')
				var count = dijit.byId('gridDetailInvoice').rowCount
				var dataSelected = []
				for (var i = 0; i < count; i++) {
					var getSID = tbl.getItem(i).sid
					if (getSID != "") {
						dataSelected.push("'"+getSID+"'")
					}
				}
				
				$('#gridLookupTandaTerima').datagrid({
					queryParams: {
						customer: $('#customer_inv').combo('getText'),
						arrSID:dataSelected
					}
				});
			},120);
		} else {
			$.messager.alert('Peringatan', 'Customer belum di pilih !', 'warning');
		}
	}
	
	function deleteRowTandaTerima() {
		var tbl = dijit.byId('gridDetailInvoice')
		tbl.removeSelectedRows();
	}
	
	function selectDetailTandaTerima(e){
		var tbl = dijit.byId('gridDetailInvoice')
		var row = $('#gridLookupTandaTerima').datagrid('getSelected');
		if (row){
			//$("#no_cn"+tblIndex).textbox('setValue', row.no_cn);
			tbl.getItem(tblIndex).sid = row.sid
			tbl.getItem(tblIndex).no_cn = row.no_cn
			tbl.getItem(tblIndex).tanggal = row.tanggal
			tbl.getItem(tblIndex).tujuan = row.tujuan
			tbl.getItem(tblIndex).grand_total = row.grand_total
			
			setTimeout(function(){
				tbl.store.newItem({
					sid : '',
					no_cn : '',
					lookup : '',
					tanggal : '',
					tujuan : '',
					grand_total : '',
					delete : ''
				})													
			},100)
			
			setTimeout(function(){
				tbl.updateRowCount(tbl.rowCount);
			},200)
			$('#lookupinvoice').window('close')			
		
		}else{
			$.messager.alert('Peringatan', 'Data belum di pilih !', 'warning');
		}
	}
	
	function doSearchRekapLookupTandaTerima(value,name){
		var tbl = dijit.byId('gridDetailInvoice')
		var count = dijit.byId('gridDetailInvoice').rowCount
		var dataSelected = []
		for (var i = 0; i < count; i++) {
			var getSID = tbl.getItem(i).sid
			if (getSID != "") {
				dataSelected.push("'"+getSID+"'")
			}
		}
		
		if (name == "cn") {
			$('#gridLookupTandaTerima').datagrid({
				queryParams: {
					cn: value,
					customer: $('#customer_inv').combo('getText'),
					arrSID:dataSelected
				}
			});
		} else if (name == "tanggal") {
			$('#gridLookupTandaTerima').datagrid({
				queryParams: {
					tanggal: value,
					customer: $('#customer_inv').combo('getText'),
					arrSID:dataSelected
				}
			});
		} else if (name == "tujuan") {
			$('#gridLookupTandaTerima').datagrid({
				queryParams: {
					tujuan: value,
					customer: $('#customer_inv').combo('getText'),
					arrSID:dataSelected
				}
			});
		} else {
			$('#gridLookupTandaTerima').datagrid({
				queryParams: {
					customer: $('#customer_inv').combo('getText'),
					arrSID:dataSelected
				}
			});
		}
	}
	
	function saveInvoice() {
		var tbl = dijit.byId('gridDetailInvoice')
		var objDtl = []
		var dtl = {}
		var count = tbl.rowCount;
		if ($('#no_inv').textbox('getValue') != "" && $('#tgl_inv').datebox('getValue') != ""
			&& $('#customer_inv').textbox('getValue') != ""){	

			for (var i = 0; i < count; i++) {
				if (tbl.getItem(i).sid != "") {
					dtl = {
						sid :  tbl.getItem(i).sid
					}
					objDtl.push(dtl)
				}
			}
			
			var objHeader = [{
				no_inv :  $('#no_inv').textbox('getText'),
				tanggal :  $('#tgl_inv').datebox('getValue'),
				customer_nama :  $('#customer_inv').textbox('getText'),
				jatuh_tempo :  $('#jatuh_tempo').datebox('getValue'),
				listDetail : objDtl
			}];
			
			if (objDtl.length > 0) {
				$.ajax({
					type	: "POST",
					url		: "../system/invoice_service.php",
					data	: {
						data : objHeader
					},
					success	: function(data){
						if (data != "") {
							$.messager.alert('Peringatan', data, 'warning');
						} else {
							setTimeout(function() {
								$.messager.confirm('Print Invoice', 'Cetak Invoice Sekarang ?', function(r){
									if (r){
										//window.location.href='../form/cetak_invoice.php?no_inv='+$('#no_inv').textbox('getValue');
										window.open('../form/cetak_invoice.php?no_inv='+$('#no_inv').textbox('getValue'),'_blank');
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
		} else {
			$.messager.alert('Kesalahan', 'Field yang bertanda * harus di isi ! ', 'error');
		}
	}
	
	function searchNoInv(value){
		var tbl = dijit.byId('gridDetailInvoice')
		if (value == "") {
			//alert('Data tidak ditemukan !')
			$.messager.alert('Peringatan', 'No Invoice Masih Kosong !', 'warning');			
			console.log("kosong");			
		} else {
			$.ajax({
				type	: "GET",
				url		: "../system/invoice_service.php",
				data	: {
					sch_inv : value
				},
				success	: function(data){
					if (data == "") {
						$.messager.alert('Peringatan', 'Data tidak ditemukan !', 'warning');
					} else {
						var dataa = JSON.parse(data);
						$('#no_inv').textbox('setText',dataa[0].no_inv)
						$('#tgl_inv').datebox('setValue',dataa[0].tanggal)
						$('#customer_inv').combo("setText",dataa[0].customer_nama)
						$('#jatuh_tempo').datebox("setValue",dataa[0].jatuh_tempo)						
						document.getElementById('cetak_inv').style.display = "inline-table"
						document.getElementById('simpan_inv').style.display = "none"
						setTimeout(function(){
							tbl.setQuery({
									custNama: dataa[0].customer_nama,
									no_inv: dataa[0].no_inv
								});
						},150)
					}
				}
			});
		}
	}
	
	function rowClickEntriInvoice() {
		var row = $('#gridRekapInvoice').datagrid('getSelected');
		var tbl = dijit.byId('gridDetailInvoice')
		if (row){
			$('#no_inv').textbox('setText',row.no_inv)
			$('#tgl_inv').datebox('setValue',row.tanggal)
			$('#customer_inv').combo("setText",row.customer_nama)
			$('#jatuh_tempo').datebox("setValue",row.jatuh_tempo)						
			document.getElementById('cetak_inv').style.display = "inline-table"
			document.getElementById('simpan_inv').style.display = "none"
			setTimeout(function(){
				tbl.setQuery({
						custNama: row.customer_nama,
						no_inv: row.no_inv
					});
			},150)
		}
	}
</script>
