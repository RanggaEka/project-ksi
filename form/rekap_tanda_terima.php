<td width="156">&nbsp;</td>
<td>
	<br>
	<table width="75%" border="1" align="left" cellpadding="4" cellspacing="2" style="border: solid 1px #efefef;">
		<tr>
          	<td>
					<form action="../system/order_header_service.php" method="post" enctype="multipart/form-data">
					<table width="100%" border="0" cellspacing="0" cellpadding="3">
						<tr>
				          	<td>
								Pencarian Data :
								<input class="easyui-searchbox" data-options="prompt:'.......',menu:'#mm',searcher:doSearchRekapTandaTerima" style="width:480px;height:25px;padding:10px;"></input>
								<div id="mm">
									<div data-options="name:'semua'">Semua</div>
									<div data-options="name:'cn'">CN</div>
									<div data-options="name:'tanggal'">Tanggal</div>
									<div data-options="name:'pengirim'">Pengirim</div>
									<div data-options="name:'tujuan'">Tujuan</div>
								</div>
							</td>
				        </tr>
				        <tr>
							<td>
								<table id="gridTandaTerima" class="easyui-datagrid" style="width:98%;height:480px"
									data-options="singleSelect:true,collapsible:true,url:'../json/get_tanda_terima.php',method:'get',
												rownumbers:true,
												autoRowHeight:false,
												pagination:true,
												pageSize:20">
									<thead>
									<tr>
										<!--th data-options="field:'no'">No</th-->
										<th data-options="field:'no_cn'">CN</th>
										<th data-options="field:'tanggal'">Tanggal</th>
										<th data-options="field:'pengirim'">Pengirim</th>
										<th data-options="field:'tujuan'">Tujuan</th>
										<th data-options="field:'grand_total'" formatter="formatPrice">Total</th>
									</tr>
									</thead>
								</table>
							</td>
				        </tr>
			    	</table>
			    </form>
			</td>
	    </tr>
	</table>
</td>
<!--TESTTING PULL-->
