<td width="156">&nbsp;</td>
<td>
	<br>
	<table width="100%" border="0" cellspacing="0" cellpadding="3" style="border: solid 1px #efefef;">
		 <tr>
			<td>
				<div id="tbTT" style="padding:2px 5px;">
					Pencarian Data :
					<input id="cari" class="easyui-searchbox" data-options="prompt:'.......',menu:'#mm',searcher:doSearchRekapTandaTerima" style="width:480px;height:25px;padding:10px;"></input>
					<div id="mm">
						<div data-options="name:'semua'">Semua</div>
						<div data-options="name:'cn'">CN</div>
						<div data-options="name:'tanggal'">Tanggal</div>
						<div data-options="name:'pengirim'">Pengirim</div>
						<div data-options="name:'tujuan'">Tujuan</div>
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="../images/famfam/printer.png" onClick="cetakRekapTandaTerima()" style="cursor:pointer;"/>
				</div>
				<table id="gridTandaTerima" class="easyui-datagrid" 
					style="width:100%;height:543px;"
					title="Tanda Terima" 
					data-options="singleSelect:true,
								collapsible:true,url:'../json/get_tanda_terima.php',
								method:'get',
								toolbar:'#tbTT',
								rownumbers:true,
								autoRowHeight:false,
								pagination:true,
								pageSize:20">
					<thead>
						<tr>
							<th field="no_cn" width="9%" rowspan="2" align="left">CN</th>
							<th field="tanggal" width="9%" rowspan="2" align="center">Tgl</th>
							<th field="pengirim" width="18%" rowspan="2" align="left">Pengirim</th>
							<th field="tujuan" width="40%" rowspan="2" align="left">Tujuan</th>
							<th field="penerima" width="18%" rowspan="2" align="left">Penerima</th>
							<th field="service" colspan="3" align="center">Service</th>
							<th field="total" colspan="5" align="center">Total</th>
						</tr>
						</thead>
						<thead>
						<tr>
							<th field="service_udl" width="5%" align="center">U/D/L</th>
							<th field="service_dtddtp" width="8%" align="center">DTD/DTP</th>
							<th field="service_agent" width="5%" align="center">Agent</th>
							<th field="total_coll" width="5%" align="center">Coll</th>
							<th field="total_berat" width="5%" align="center">KG</th>
							<th field="total_vol" width="6%" align="center">Vol/M3</th>
							<th field="tarif" width="10%" align="center">Tarif</th>
							<th field="grand_total" width="10%" align="center">Total</th>
						</tr>
					</thead>
				</table>
			</td>
		</tr>
	</table>
</td>
<script>
	function cetakRekapTandaTerima() {
		if (name == "cn") {
			window.open('../form/cetak_rekap_tanda_terima.php?cn='+$('#cari').textbox('getText'),'_blank');
		} else if (name == "tanggal") {
			window.open('../form/cetak_rekap_tanda_terima.php?tanggal='+$('#cari').textbox('getText'),'_blank');
		}
		//blm di buat, cetak All sama cetak berdasarkan kriteria
		//window.open('../form/cetak_rekap_tanda_terima.php?cn='+$('#cari').textbox('getText')+'&tanggal='+$('#cari').textbox('getText'),'_blank');
	}
	
	function doSearchRekapTandaTerima(value,name){
		if (name == "cn") {
			$('#gridTandaTerima').datagrid({
				queryParams: {
					cn: value
				}
			});
		} else if (name == "tanggal") {
			$('#gridTandaTerima').datagrid({
				queryParams: {
					tanggal: value
				}
			});
		} else if (name == "tujuan") {
			$('#gridTandaTerima').datagrid({
				queryParams: {
					tujuan: value
				}
			});
		} else if (name == "pengirim") {
			$('#gridTandaTerima').datagrid({
				queryParams: {
					pengirim: value
				}
			});
		} else {
			$('#gridTandaTerima').datagrid({
				queryParams: {
					 free: 'free'
				}
			});
		}
	}	
</script>
