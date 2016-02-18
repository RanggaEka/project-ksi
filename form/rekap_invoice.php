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
						<td width="180px"><input class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38" id="no_inv" name="no_inv"></td>
						<td width="110px"><label>Tanggal</label></td>
						<td>:</td>
						<td>
							<input class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38" id="no_inv" name="no_inv">
							s/d
							<input class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38" id="no_inv" name="no_inv">
						</td>
					</tr>
					<tr>
						<td><label>Status Pembayaran</label></td>
						<td>:</td>
						<td><input class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38" id="no_inv" name="no_inv"></td>
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
						{field:'pengirim',title:'total',width:100,align:'right'}
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
</script>
