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
				         	<td><input id="tanggal" name="tanggal" class="easyui-datebox" style="width:150px;height:25px;padding:8px" placeholder="Tanggal" data-options="prompt:'Tanggal'"></input></td>
				        </tr>
				        <tr>
				          	<td><label>Customer</label></td>
				         	<td>:</td>
				         	<td>
				         		<input id="customer_sid" name="customer_sid" class="easyui-combobox" 
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
											formatter: formatItem,
											onSelect: function(val){
												$('#customer_nama').textbox('setValue', val.nama);												
											}
									">			         	
								<input type="text" id="customer_nama" name="customer_nama">
							</td>
				        </tr>
				        <tr>
				          	<td></td>
				         	<td></td>
				         	<td>
								<button type="submit" name="simpan_inv">Save</button>
								<button type="reset" onclick="location.reload()">Batal</button>				
							</td>						
				        </tr>						
			    	</table>			    	
				</form>
				<form name="fm_tt" id="fm_tt" action="../system/tambah_tanda_terima.php" method="POST" enctype="multipart/form-data">
	    			<table width="80%" border="0" cellspacing="0" cellpadding="3">
                        <thead>
                        <tr>
                            <th>Cari CN</th>
							<th>CN</th>
							<th>Tanggal</th>
							<th>Pengirim</th>
							<th>Tujuan</th>
							<th>Total</th>
							<th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                    	<tr>														
							<td><a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#lookuptandaterima').window('open')"><img src="../images/famfam/application_xp.png" /></a></td>
                        	<td>
								<!--script>
									function nomor() {
										var no = (document.getElementById("detail_invoice").rows.length - 2) + 1;
										document.getElementById("nomor").innerHTML = no;
									}
								</script>
								<span id="nomor">&nbsp;</span-->								
								<input type="text" id="no_cn" name="no_cn" class="easyui-textbox" style="width:150px;height:25px;padding:8px" data-options="prompt:'No CN',iconWidth:38">								
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
                        	<td><input type="text" class="easyui-textbox" style="width:190px;height:25px;padding:8px" data-options="prompt:'Tanggal',iconWidth:38" id="tanggal" name="tanggal"></td>
                        	<td><input type="text" class="easyui-textbox" style="width:190px;height:25px;padding:8px" data-options="prompt:'Pengirim',iconWidth:38" id="pengirim" name="pengirim"></td>
                        	<td><input type="text" class="easyui-textbox" style="width:190px;height:25px;padding:8px" data-options="prompt:'Tujuan',iconWidth:38" id="tujuan" name="tujuan"></td>
                        	<td><input type="text" class="easyui-textbox" style="width:190px;height:25px;padding:8px" data-options="prompt:'Total',iconWidth:38" id="total" name="total"></td>							
							<td><!--a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="tambahTT()"></a-->
							<input type="submit" name="tambah_tt" id="tambah_tt" value="Tambah" onclick="tambahTT()"></td>
							<input type="hidden" class="easyui-textbox" id="tt_sid" name="tt_sid">											
                        </tr>
                        </tbody>
                    </table>					
				</form>
			</td>
	    </tr>
		<tr>
			<td>
				<table id="gridDetail" class="easyui-datagrid" style="width:75%;height:185px"
					data-options="footer:'#ft',rownumbers:true,singleSelect:true,collapsible:true,url:'../json/get_temp.php',method:'get'">
                    <thead>
                        <tr>                            
                            <th style="width:30%" data-options="field:'tanda_terima_nomor'" align="center">CN</th>
                            <th style="width:30%" data-options="field:'tanda_terima_tanggal'" align="center">Tanggal</th>                            
                            <th style="width:30%" data-options="field:'grand_total'" align="right" formatter="formatPrice">Total</th>
                        </tr>
                    </thead>
                </table>				
			</td>
			<div id="ft" style="padding:2px 5px;">				
				<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapusTT()"></a>
			</div>
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
				$('#tt_sid').textbox('setValue', row.sid);
				$('#lookuptandaterima').window('close');				
			}else{
				$.messager.alert('Kesalahan', 'Belum Ada Tanda Terima Yang dipilih');
			}
		}
		function tambahTT(){
			$.post('../system/tambah_tanda_terima.php',function(result){
				if (result.success){
					$('#gridDetail').datagrid('reload');
				} else {
					$.messager.show({
					title: 'Error',
					msg: result.msg
					});
				}
			},'json');
		}
		function hapusTT(){
			var row = $('#gridDetail').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Anda yakin akan menghapus data ini?',function(r){
					if (r){
						$.post('../system/hapus_tanda_terima.php',{id:row.id},function(result){
							if (result.success){
								$('#gridDetail').datagrid('reload');
							} else {
								$.messager.show({
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
		}
	</script>