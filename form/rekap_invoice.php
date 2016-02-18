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
    </table>
</td>
