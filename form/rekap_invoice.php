<td width="156">&nbsp;</td>
<td>
    <br>
     <table width="99%" border="0" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
        <tr>
			<td>
				<div id="tbInv" style="padding:2px 5px;">
					Customer :
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
									panelWidth: 330,
									formatter: formatItem"/>
					Tanggal : 
					<input class="easyui-datebox" style="width:120px;height:25px;padding:8px" data-options="prompt:'Tanggal Awal',iconWidth:38" id="tgl_dari" name="tgl_dari"> 
					s/d 
					<input class="easyui-datebox" style="width:120px;height:25px;padding:8px" data-options="prompt:'Tanggal Akhir',iconWidth:38" id="tgl_sampai" name="tgl_sampai">
					Status Pembayaran : 
					<select class="easyui-combobox" name="status" id="status" style="width:150px;padding:8px">
						<option value="">Silahkan Pilih</option>
						<option value="LUNAS">LUNAS</option>
						<option value="BELUM LUNAS">BELUM LUNAS</option>
					</select>
					<button type="submit" onclick="searchRekapInvoice()" name="cari_rekap" id="cari_rekap">Cari</button>
					<button type="reset" onclick="location.reload()">Batal</button>
					&nbsp;
					<img src="../images/famfam/printer.png" onClick="cetakRekapInvoice()" style="cursor:pointer;" width="18px"/>
				</div>
				<table id="gridRekapInvoice" style="width:100%;height:540px" title="Rekap Invoice"
						data-options="singleSelect:true,
							collapsible:true,url:'../json/data-header-rekap-inv.php',
							method:'get',
							toolbar:'#tbInv',
							pagination:true" class="easyui-datagrid">
				<thead>
					<tr>
						<th field="no_inv" style="width:15%">No Inv</th>
						<th field="tanggal" style="width:10%">Tanggal Inv</th>
						<th field="customer_nama" style="width:29%">Cust</th>
						<th field="total" align="right" style="width:10%">Total</th>
						<th field="cicilan" align="right" style="width:10%">Cicilan</th>
						<th field="sisa" align="right" style="width:10%">Sisa</th>
						<th field="keterangan" style="width:15%">Keterangan</th>
					</tr>
				</thead>
			</table>
			</td>
        </tr>
    </table>
</td>

<script type="text/javascript">
	function cetakRekapInvoice() {
		window.open('../form/cetak_rekap_invoice.php?customer_inv='+
					$('#customer_inv').textbox('getText')+'&status='+
					$('#status').textbox('getValue')+'&tgl_dari='+
					$('#tgl_dari').textbox('getText')+'&tgl_sampai='+
					$('#tgl_sampai').textbox('getText'),'_blank');
	}
	
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
						{field:'no_cn',title:'No CN',width:40,rowspan:2},
						{field:'tujuan',title:'Tujuan',width:100,rowspan:2},
						{field:'service',title:'Service',align:'center',width:80,colspan:3},
						{field:'total',title:'Total',align:'center',width:40,colspan:3},
						{field:'invoice',title:'Invoice',align:'center',width:40,colspan:4}
					],[
						{field:'service_udl',title:'U/D/L',width:20,align:'center'},
						{field:'service_dtddtp',title:'DTD/DTP',width:36,align:'center'},
						{field:'service_agent',title:'Agent',width:30,align:'center'},
					
						{field:'total_coll',title:'Coll',width:10,align:'center'},
						{field:'total_berat',title:'KG',width:10,align:'center'},
						{field:'total_vol',title:'Vol/M3',width:15,align:'center'},
						
						{field:'service_agent',title:'Agent',width:30,align:'center'},
						{field:'total_coll',title:'Coll',width:10,align:'center'},
						{field:'total_berat',title:'KG',width:10,align:'center'},
						{field:'total_vol',title:'Vol/M3',width:15,align:'center'}
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
					return 'background-color:#CCCCCC;color:red;font-weight:bold;';
				}
			}
		});
	});
</script>
