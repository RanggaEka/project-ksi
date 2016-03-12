<td width="156">&nbsp;</td>
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
					<br/><br/>
					           		
					<table id="detail_invoice_ui" class="easyui-datagrid" title="" style="width:98%;height:250px;"
						data-options="singleSelect:true,collapsible:true,url:'../json/get_invoice_detail.php',method:'get'">
						<thead>
						<tr>
							<th width="15%" data-options="field:'no_cn'">No CN</th>
							<th width="10%" data-options="field:'tanggal'">Tanggal</th>
							<th width="50%" data-options="field:'tujuan'">Tujuan</th>
							<th width="15%" data-options="field:'total'">Total</th>
						</tr>
						</thead>
					</table>
					<div style="width:100%; height:25px; background:#ADE5F7;padding:3px;">Invoice Detail</div>
	    			<table id="detail_invoice" border=0 width="100%">
						<style>
							.cTh {border:1px solid #CCCCCC;}
						</style>
                        <thead>
                        <tr style="background:#ADE5F7;">
                            <th class="cTh" width="15px" height="30px">No</th>
                            <th class="cTh" width="120px">No CN <font color='red'>*</font></th>
                            <th class="cTh" width="25px">&nbsp;</th>
                            <th class="cTh" width="70px">Tanggal</th>
                            <th class="cTh" width="330px">Tujuan</th>
							<th class="cTh" width="100px">Total</th>
                        </tr>
                        </thead>
						<style>
							
						</style>
                        <tbody style="border:1px solid #CCCCCC; max-height: 60px;overflow: auto;">
                    	<tr>
                        	<td><input type="text" disabled style="width:100%;height:25px;padding:1px;text-align:center;" id="no1" name="no1"/></td>
                        	<td><input style="width:100%;height:25px;padding:1px" id="no_cn1" name="no_cn1"/></td>
                        	<td>
								<div style="width:100%; text-align:center;">
								<a id="btnLookup1" href="javascript:void(0)" onclick="showLookupTandaTerima()"><img src="../images/famfam/application_xp.png" /></a>
								</div>
                                    <div id="lookupinvoice" class="easyui-window" title="Lookup Tanda Terima" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:70%;height:320px;padding:10px; text-align:left;">
                                        Pencarian : <input id="searchBoxLookupTandaInvoice" class="easyui-searchbox" data-options="prompt:'.......',menu:'#mm',searcher:doSearchRekapLookupTandaTerima" style="width:480px;height:25px;padding:10px;"></input>
                                        <br/>
                                        <br/>
                                        <div id="mm">
                                            <div data-options="name:'semua'">Semua</div>
                                            <div data-options="name:'cn'">CN</div>
                                            <div data-options="name:'tanggal'">Tanggal</div>
                                            <div data-options="name:'tujuan'">Tujuan</div>
                                        </div>
                                        <table id="gridLookupTandaTerima" class="easyui-datagrid" title="" style="width:98%;height:180px"
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
                        	</td>
                        	<td><input type="text" disabled style="width:100%;height:25px;padding:1px" id="tanggal1" name="tanggal1"/></td>
                        	<td><input type="text" disabled style="width:100%;height:25px;padding:1px" id="tujuan1" name="tujuan1"/></td>
                        	<td>
								<input disabled style="width:100%;height:25px;padding:1px" id="total1" name="total1" />
								<input disabled style="width:100%;height:25px;padding:1px" id="sid1" name="sid1" hidden />
                        	</td>
                        </tr>
                        </tbody>
                    </table>
			    <!--</form>-->
			</td>
	    </tr>
	</table>
</td>

<script type="text/javascript">
	document.getElementById('cetak_inv').style.display = "none";	
	function cetakInvoice() {
		window.open('../form/cetak_invoice.php?no_inv='+$('#no_inv').textbox('getValue'),'_blank');
	}
	
	var tblIndex = "";
	function showLookupTandaTerima() {
		if ($('#customer_inv').combo('getText') != "") {
			$('#detail_invoice').find('tr').click( function(){
				tblIndex = ($(this).index()+1);
			});
			
			setTimeout(function(){
				$('#lookupinvoice').window('open')
				$('#searchBoxLookupTandaInvoice').searchbox('clear');
				var count = document.getElementById("detail_invoice").rows.length;
				var dataSelected = []
				for (var i = 1; i < count-1; i++) {
					if ($("#sid"+i).val() != "") {
						dataSelected.push("'"+$("#sid"+i).val()+"'")
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
		$('#detail_invoice').find('tr').click( function(){
			tblIndex = ($(this).index()+1);
		});
		setTimeout(function(){
			document.getElementById("detail_invoice").deleteRow(tblIndex);
		},100)
	}
	
	function selectDetailTandaTerima(){
		var row = $('#gridLookupTandaTerima').datagrid('getSelected');
		if (row){
			//$("#no_cn"+tblIndex).textbox('setValue', row.no_cn);
			document.getElementById("sid"+tblIndex).value = row.sid
			document.getElementById("no"+tblIndex).value = tblIndex 
			document.getElementById("no_cn"+tblIndex).value = row.no_cn 
			document.getElementById("tanggal"+tblIndex).value = row.tanggal 
			document.getElementById('tujuan'+tblIndex).value = row.tujuan 
			document.getElementById('total'+tblIndex).value = formatNumber(row.grand_total)
			//$('#tanggal').textbox('setValue', row.tanggal);
			//$('#pengirim').textbox('setValue', row.pengirim);
			//$('#tujuan').textbox('setValue', row.tujuan);
			//$('#total').textbox('setValue', row.grand_total);
			//$('#tt_sid').textbox('setValue', row.sid);
			
			var table = document.getElementById("detail_invoice");
			var count = document.getElementById("detail_invoice").rows.length;
			var table = document.getElementById("detail_invoice");
			var newRow = table.insertRow(count);
			
			var cell1 = newRow.insertCell(0);
			var cell2 = newRow.insertCell(1);
			var cell3 = newRow.insertCell(2);
			var cell4 = newRow.insertCell(3);
			var cell5 = newRow.insertCell(4);
			var cell6 = newRow.insertCell(5);
			//var cell7 = newRow.insertCell(6);
			
			cell1.innerHTML = "<input type='text' disabled style='width:100%;height:25px;padding:1px;text-align:center;' id='no"+(tblIndex + 1)+"' name='no"+(tblIndex + 1)+"'/>";
			cell2.innerHTML = "<input style='width:100%;height:25px;padding:1px' id='no_cn"+(tblIndex + 1)+"' name='no_cn"+(tblIndex + 1)+"'/>";
			cell3.innerHTML = "<div style='width:100%; text-align:center;'> <a id='btnLookup"+(tblIndex + 1)+"' href='javascript:void(0)' class='easyui-linkbutton' onclick='showLookupTandaTerima()'><img src='../images/famfam/application_xp.png' /></a></div>";
			cell4.innerHTML = "<input type='text' disabled style='width:100%;height:25px;padding:1px' id='tanggal"+(tblIndex + 1)+"' name='tanggal"+(tblIndex + 1)+"'/>";
			cell5.innerHTML = "<input type='text' disabled style='width:100%;height:25px;padding:1px' id='tujuan"+(tblIndex + 1)+"' name='tujuan"+(tblIndex + 1)+"'/>";
			cell6.innerHTML = "<input disabled style='width:100%;height:25px;padding:1px' id='total"+(tblIndex + 1)+"' name='total"+(tblIndex + 1)+"'>" + 
							  "<input hidden disabled style='width:100%;height:25px;padding:1px' id='sid"+(tblIndex + 1)+"' name='sid"+(tblIndex + 1)+"'>";
			//cell7.innerHTML = "<div style='width:100%; text-align:center;'> <a id='btnDelete"+(count+1)+"' style='visibility:hidden;' href='javascript:void(0)' class='easyui-linkbutton' onclick='deleteRowTandaTerima()'><img src='../images/famfam/delete.png' /></a></div>";
			
			setTimeout(function(){
				document.getElementById("btnLookup"+tblIndex).style.visibility = 'hidden'  
			},200)
			$('#lookupinvoice').window('close')			
		
		}else{
			$.messager.alert('Peringatan', 'Data belum di pilih !', 'warning');
		}
	}
	
	function doSearchRekapLookupTandaTerima(value,name){
		var count = document.getElementById("detail_invoice").rows.length;
		var dataSelected = []
		for (var i = 1; i < count; i++) {
			if ($("#sid"+i).val() != "") {
				dataSelected.push("'"+$("#sid"+i).val()+"'")
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
		var objDtl = []
		var dtl = {}
		var count = document.getElementById("detail_invoice").rows.length;
		if ($('#no_inv').textbox('getValue') != "" && $('#tgl_inv').datebox('getValue') != ""
			&& $('#customer_inv').textbox('getValue') != ""){	

			for (var i = 1; i < count-1; i++) {
				if (document.getElementById("sid"+i).value != "") {
					dtl = {
						sid :  document.getElementById("sid"+i).value
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
						document.getElementById('detail_invoice').style.display = "none"
						$('#detail_invoice_ui').datagrid("getPanel").css("display","block")
						setTimeout(function(){
							$('#detail_invoice_ui').datagrid({
								queryParams: {
									custNama: dataa[0].customer_nama,
									no_inv: dataa[0].no_inv,
								}
							});
						},150)
					}
				}
			});
		}
	}
</script>
