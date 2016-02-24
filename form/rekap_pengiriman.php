<td width="156">&nbsp;</td>
<td>
	<br/>
	<div id="tb" style="padding:2px 5px;">
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
		<input class="easyui-datebox" style="width:120px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38" id="tgl_dari" name="tgl_dari"> 
		s/d 
		<input class="easyui-datebox" style="width:120px;height:25px;padding:8px" data-options="prompt:'No Invoice',iconWidth:38" id="tgl_sampai" name="tgl_sampai">
		Status Pembayaran : 
		<select class="easyui-combobox" name="status" id="status" style="width:150px;padding:8px">
			<option value="">Silahkan Pilih</option>
			<option value="LUNAS">LUNAS</option>
			<option value="BELUM LUNAS">BELUM LUNAS</option>
		</select>
		<button type="submit" onclick="searchRekapPengiriman()" name="cari_rekap" id="cari_rekap">Cari</button>
		<button type="reset" onclick="location.reload()">Batal</button>
		&nbsp;
		<img src="../images/famfam/printer.png" onClick="cetakRekapPengiriman()" style="cursor:pointer;" width="18px"/>
	</div>
    <table width="99%" border="0" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
        <tr>
			<td>
				<table id="gridRekapPengiriman" style="width:100%;height:540px" title="Rekap Pengiriman"
				data-options="singleSelect:true,
					collapsible:true,url:'../json/data-header-rekap-invoice.php',
					method:'get',
					toolbar:'#tb',
					pagination:true" class="easyui-datagrid">
				  <thead>
					<tr>
						<th field="tgl_tanda_terima" width="10%" rowspan="2" align="center">Tgl</th>
						<th field="pengirim" width="10%" rowspan="2" align="left">Pengirim</th>
						<th field="no_cn" width="13%" rowspan="2" align="left">CN</th>
						<th field="tujuan" width="40%" rowspan="2" align="left">Tujuan</th>
						<th field="service" colspan="3" align="center">Service</th>
						<th field="total" colspan="3" align="center">Total</th>
						<th field="inv" colspan="4" align="center">Invoice</th>
						<th field="jatuh_tempo_inv" width="9%" rowspan="2" align="center">Jatuh Tempo</th>
						<th field="tgl_pembayaran" width="9%" rowspan="2" align="center">Tgl. Bayar </th>
						<th field="tanda_terima" colspan="2" align="center">Tanda Terima </th>
						<th field="biaya" colspan="4" align="center">Biaya</th>
					</tr>
					</thead>
					<thead>
					<tr>
						<th field="service_udl" width="5%" align="center">U/D/L</th>
						<th field="service_dtddtp" width="8%" align="center">DTD/DTP</th>
						<th field="service_agent" width="5%" align="center">Agent</th>
						<th field="total_coll" width="5%" align="center">Coll</th>
						<th field="total_berat" width="5%" align="center">KG</th>
						<th field="total_vol" width="5%" align="center">Vol/M3</th>
						<th field="tgl_inv" width="7%" align="center">Tgl</th>
						<th field="no_inv" width="13%" align="center">No</th>
						<th field="tarif_inv" width="6%" align="center">Tarif</th>
						<th field="grand_total" width="5%" align="center">Jumlah</th>
						<th field="penerima" width="10%" align="center">Penerima</th>
						<th field="tgl_tanda_terima" width="7%" align="center">Tgl</th>
						<th field="biaya_angkut" width="5%" align="center">Freight</th>
						<th field="service_udl" width="5%" align="center">U/D/L</th>
						<th field="biaya_lain" width="5%" align="center">Lain 2 </th>
						<th field="keterangan" width="10%" align="center">Ket</th>
					</tr>
				</thead>
			</table>

				<!--<table id="gridRekapPengiriman" style="width:100%;height:250px"
				data-options="singleSelect:true,collapsible:true,url:'../json/data-header-rekap-invoice.php',method:'get'" class="easyui-datagrid">
				<thead>
					<tr>
						<th field="no_inv" style="width:18%">No Inv</th>
						<th field="tanggal" style="width:8%">Tanggal Inv</th>
						<th field="customer_nama" style="width:30%">Cust</th>
						<th field="total" align="right" style="width:8%">Total</th>
						<th field="cicilan" align="right" style="width:8%">Cicilan</th>
						<th field="sisa" align="right" style="width:8%">Sisa</th>
						<th field="keterangan" style="width:10%">Keterangan</th>
					</tr>
				</thead>
			</table>-->
			</td>
        </tr>
    </table>
</td>

<script type="text/javascript">
	function cetakRekapPengiriman() {
		window.open('../form/cetak_rekap_pengiriman.php?customer_inv='+
					$('#customer_inv').textbox('getText')+'&status='+
					$('#status').textbox('getValue')+'&tgl_dari='+
					$('#tgl_dari').textbox('getText')+'&tgl_sampai='+
					$('#tgl_sampai').textbox('getText'),'_blank');
	}
	
	function searchRekapPengiriman() {
		if ($('#customer_inv').combo('getText') != "") {
			$('#gridRekapPengiriman').datagrid({
				queryParams: {
					customer_inv: $('#customer_inv').combo('getText')
				}
			});
			
		} 
		else if ($('#status').combo('getText') != "") { 
			$('#gridRekapPengiriman').datagrid({
				queryParams: {
					status: $('#status').combo('getText')
				}
			});
			
		} else if ($('#tgl_dari').datebox('getValue') != "" && $('#tgl_sampai').datebox('getValue') != "") { 
			$('#gridRekapPengiriman').datagrid({
				queryParams: {
					tgl_dari: $('#tgl_dari').datebox('getValue'),
					tgl_sampai: $('#tgl_sampai').datebox('getValue')
				}
			});
		} else {
			$('#gridRekapPengiriman').datagrid({
				queryParams: {
					tgl_dari: $('#tgl_dari').datebox('getValue'),
					tgl_sampai: $('#tgl_sampai').datebox('getValue')
				}
			});
		}
	}
</script>
