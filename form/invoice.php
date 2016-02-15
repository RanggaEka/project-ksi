<td width="156">&nbsp;</td>
<td>
	<br>
	<table width="75%" border="1" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
		<tr>
          	<td>
				<!--<form action="../system/invoice_service.php" method="post" enctype="multipart/form-data">-->
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
				         	<td><input id="tgl_inv" nama="tgl_inv" class="easyui-datebox" style="width:150px;height:25px;padding:8px" placeholder="Tanggal" data-options="prompt:'Tanggal'"></input></td>
				        </tr>
				        <tr>
				          	<td><label>Customer</label></td>
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
			    	<button type="submit" onclick="saveInvoice()" name="simpan_po">Save</button>
					<button type="reset" onclick="location.reload()">Batal</button>	
					<br/><br/>
	    			<table id="detail_invoice" border=0 width="100%">
						<style>
							.cTh {border:1px solid #CCCCCC;}
						</style>
                        <thead style="background:#ADE5F7;">
                        <tr>
                            <th class="cTh" width="15px" height="30px">No</th>
                            <th class="cTh" width="120px">No CN</th>
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
								<a id="btnLookup1" href="javascript:void(0)" onclick="test()"><img src="../images/famfam/application_xp.png" /></a>
								</div>
                                    <div id="lookupinvoice" class="easyui-window" title="Lookup Tanda Terima" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:700px;height:320px;padding:10px; text-align:left;">
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
									data-options="singleSelect:true,collapsible:true,url:'../json/get_tanda_terima.php',method:'get'">
									<thead>
									<tr>
										<th data-options="field:'no',width:40">No</th>
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
	var tblIndex = "";
	function myFunction(x) {
		tblIndex = x.rowIndex;
		document.getElementById('no'+tblIndex).value = tblIndex 
	}
	
	function test() {
		$('#lookupinvoice').window('open')
		$('#detail_invoice').find('tr').click( function(){
			tblIndex = ($(this).index()+1);
		});
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
			document.getElementById('total'+tblIndex).value = row.grand_total 
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
			
			cell1.innerHTML = "<input type='text' disabled style='width:100%;height:25px;padding:1px;text-align:center;' id='no"+count+"' name='no"+count+"'/>";
			cell2.innerHTML = "<input style='width:100%;height:25px;padding:1px' id='no_cn"+count+"' name='no_cn"+count+"'/>";
			cell3.innerHTML = "<div style='width:100%; text-align:center;'> <a id='btnLookup"+tblIndex+"' href='javascript:void(0)' class='easyui-linkbutton' onclick='test()'><img src='../images/famfam/application_xp.png' /></a></div>";
			cell4.innerHTML = "<input type='text' disabled style='width:100%;height:25px;padding:1px' id='tanggal"+count+"' name='tanggal"+count+"'/>";
			cell5.innerHTML = "<input type='text' disabled style='width:100%;height:25px;padding:1px' id='tujuan"+count+"' name='tujuan"+count+"'/>";
			cell6.innerHTML = "<input disabled style='width:100%;height:25px;padding:1px' id='total"+count+"' name='total"+count+"'>" + 
							  "<input hidden disabled style='width:100%;height:25px;padding:1px' id='sid"+count+"' name='sid"+count+"'>";
			
			//var table=document.getElementById("detail_invoice")
			//var clnNode=document.getElementById("detail_invoice_row").cloneNode(true);  
			//table.insertBefore(clnNode,table.lastChild);
			
			$('#lookupinvoice').window('close')			
		}else{
			$.messager.alert('Kesalahan', 'Data belum di pilih !');
		}
	}
</script>
