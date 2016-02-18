<td width="156">&nbsp;</td>
<td>
    <br>
    <table width="80%" border="1" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
        <tr>
            <td>
				Pencarian :
				<table width="100%" border="0" cellspacing="0" cellpadding="3" style="border:1px solid #CCCCCC;">
					<tr>
						<td width="120px"><label>No. Invoice</label></td>
						<td>:</td>
						<td width="180px">
							<input class="easyui-textbox" style="width:130px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38" id="no_inv" name="no_inv">
							<a href="javascript:void(0)" onclick="$('#lookupinvoiceRekap').window('open')"><img src="../images/famfam/application_xp.png" /></a>
							<div id="lookupinvoiceRekap" class="easyui-window" title="Lookup Invoice" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:70%;height:320px;padding:10px; text-align:left;">
								Pencarian : <input class="easyui-searchbox" data-options="prompt:'.......',menu:'#mm',searcher:searchLookupInvoice" style="width:480px;height:25px;padding:10px;"></input>
								<br/>
								<br/>
								<div id="mm">
									<div data-options="name:'semua'">Semua</div>
									<div data-options="name:'no_inv'">No Inv</div>
									<div data-options="name:'tanggal'">Tanggal</div>
								</div>
								<table id="tblLookupInvoiceRekap" class="easyui-datagrid" title="" style="width:98%;height:180px"
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
						<td width="110px"><label>Tanggal</label></td>
						<td>:</td>
						<td>
							<input class="easyui-datebox" style="width:150px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38" id="no_inv" name="no_inv"> 
							s/d 
							<input class="easyui-datebox" style="width:150px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38" id="no_inv" name="no_inv">
						</td>
					</tr>
					<tr>
						<td><label>Status Pembayaran</label></td>
						<td>:</td>
						<td>
							<select class="easyui-combobox" name="status" id="status" style="width:150px;padding:8px">
								<option value="LUNAS">LUNAS</option>
								<option value="BELUM LUNAS">BELUM LUNAS</option>
							</select>
						</td>
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
											formatter: formatItem">
						</td>
					</tr>
					<tr>
						<td colspan="6">
							<button type="submit" onclick="saveInvoice()" name="simpan_inv" id="simpan_inv">Cari</button>
							<button type="reset" onclick="location.reload()">Batal</button>	
						</td>
					</tr>
				</table>
			</td>
        </tr>
        <tr>
			<td>
				<table id="gridRekapInvoice" style="width:100%;height:250px"
					url="../json/data-header-rekap-invoice.php" 
					singleSelect="true" fitColumns="true">
				<thead>
					<tr>
						<th field="no_inv" width="80">No Inv</th>
						<th field="tanggal" width="100">Tanggal</th>
						<th field="customer_nama" align="right" width="80">Cust</th>
						<th field="total" align="right" width="80">Total</th>
						<th field="keterangan" align="right" width="100">Keterangan</th>
					</tr>
				</thead>
			</table>
			</td>
        </tr>
    </table>
</td>

<script type="text/javascript">
	$(function(){
		$('#gridRekapInvoice').datagrid({
			view: detailview,
			detailFormatter:function(index,row){
				return '<div style="padding:2px"><table id="ddv-' + index + '"></table></div>';
			},
			onExpandRow: function(index,row){
				$('#ddv-'+index).datagrid({
					url:'../json/data-detail-rekap-invoice.php?no_inv='+row.no_inv,
					fitColumns:true,
					singleSelect:true,
					rownumbers:true,
					loadMsg:'',
					height:'auto',
					columns:[[
						{field:'no_cn',title:'No Tanda Terima',width:80},
						{field:'tujuan',title:'Tujuan',width:300,},
						{field:'grand_total',title:'Total',width:100,align:'right'}
					]],
					onResize:function(){
						$('#gridRekapInvoice').datagrid('fixDetailRowHeight',index);
					},
					onLoadSuccess:function(){
						setTimeout(function(){
							$('#gridRekapInvoice').datagrid('fixDetailRowHeight',index);
						},0);
					}
				});
				$('#gridRekapInvoice').datagrid('fixDetailRowHeight',index);
			}
		});
		
		$('#gridRekapInvoice').datagrid({
			rowStyler:function(index,row){
				if (row.keterangan == 'LUNAS'){
					return 'background-color:pink;color:blue;font-weight:bold;';
				}
			}
		});
	});
	
	function searchLookupInvoice(value,name) {
		if (value == "") {
			//alert('Data tidak ditemukan !')
			console.log("kosong");
		} else {
			if (name == "no_inv") {
				$('#tblLookupInvoiceRekap').datagrid({
					queryParams: {
						no_inv: value
					}
				});
				
			} else if (name == "no_inv") { 
				$('#tblLookupInvoiceRekap').datagrid({
					queryParams: {
						tanggal: value
					}
				});
			}
		}
	}
</script>
