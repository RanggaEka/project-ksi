<?php
	$poID = "";
	if (isset($_GET['po_id'])) {
		$poID = $_GET['po_id'];
	}
	$strQuery = "SELECT * FROM po_header where id = '$poID'";
	$result = mysql_query($strQuery) or die(mysql_error());
	$arrResult = mysql_fetch_array($result);
?>
<td width="156">&nbsp;</td>
<td>
	<br>
	<table width="70%" border="1" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
		<tr>
          	<td>
				<fieldset>
					<legend>Data Input Order Detail</legend>
					<form action="../system/order_detail_service.php" method="post" enctype="multipart/form-data">
					<table width="100%" border="0" cellspacing="0" cellpadding="3">
				        <tr>
				          	<td><label>No. PO</label></td>
				         	<td>:</td>
				         	<td>
				         		<div class="input-control text">
								    <input type="text" value="<?php echo $arrResult['no_po'];?>" disabled="disabled" name="po" type="text" placeholder="Input PO" />
								    <input type="hidden" name="po" value="<?php echo $arrResult['id'];?>" />
								    <!-- <button class="btn-search"></button> -->
								</div>
				          		<!-- <div class="input-control text" data-role="input-control" >
					            	<input name="po" type="text" placeholder="Input PO" style="width: 158px;" />
					            	<button style="padding-top: 8px; padding-bottom: 8px;"><i class="icon-eye"></i> Pilih</button>
				         		</div>  -->        
				         	</td>
				        </tr>
				        <tr>
				          	<td><label>Kode Barang</label></td>
				         	<td>:</td>
				         	<td>
				         <!-- 		<div class="input-control text">
								    <input type="text" name="kode" type="text" placeholder="Input Kode Barang" />
								    <button class="btn-search"></button>
								</div> -->
								<!-- <input type="hidden" name="barang" type="text" placeholder="Input Kode Barang" /> -->
								<select name="barang" id="barang" onchange="barangOnChange()" data-placeholder="Pilih Barang" class="chosen-select" style="width:100%;" tabindex="2">
								    <option value=""></option>
								</select>
				          		<!-- <div class="input-control text" data-role="input-control" >
					            	<input name="kode" type="text" placeholder="Input Kode Barang" style="width: 158px;" />
					            	<button style="padding-top: 8px; padding-bottom: 8px;"><i class="icon-eye"></i> Pilih</button>
				         		</div>  -->         
				         	</td>
				        </tr>
				        <tr>
				          	<td><label>Deskripsi Barang</label></td>
				         	<td>:</td>
				         	<td>
				          		<div class="input-control text" data-role="input-control" >
					            	<input type="text" id="deskripsi_barang"  disabled="disabled" />
				         		</div>          
				         	</td>
				        </tr>
				        <tr>
				          	<td><label>Harga Barang</label></td>
				         	<td>:</td>
				         	<td>
				          		<div class="input-control text" data-role="input-control" >
					            	<input type="text" id="harga_barang" disabled="disabled" />
				         		</div>          
				         	</td>
				        </tr>
				        <tr>
				          	<td><label>Qty</label></td>
				         	<td>:</td>
				         	<td>
				          		<div class="input-control text" data-role="input-control">
					            	<input name="qty" id="qty" onblur="qtyOnblur()" type="text" placeholder="Input Qty"   />
				         		</div>          
				         	</td>
				        </tr>
				        <tr>
				          	<td><label>Diskon</label></td>
				         	<td>:</td>
				         	<td>
				          		<div class="input-control text" data-role="input-control" >
					            	<input type="text" id="diskon" disabled="disabled" />
					            	<input type="hidden" id="diskonRp" name="diskon" />
				         		</div>          
				         	</td>
				        </tr>
				        <tr>
				          	<td><label>Total</label></td>
				         	<td>:</td>
				         	<td>
				          		<div class="input-control text" data-role="input-control" >
					            	<input type="text" id="total"  disabled="disabled" />
				         		</div>          
				         	</td>
				        </tr>
				        <tr>
				          	<td></td>
				         	<td></td>
				         	<td>
				         		<button type="submit" name="simpan_po_detail">Tambahkan</button>
				         		<button type="reset">Batal</button>
				         	</td>
				        </tr>
			    	</table>
			    </form>
				</fieldset>
			</td>
	    </tr>
	    <tr>
	    	<td>
	    		<fieldset>
	    			<legend>Item Detail</legend>
	    			<table class="table hovered">
                        <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Kode Barang</th>
                            <th class="text-left">Nama Barang</th>
                            <th class="text-left">Harga</th>
                            <th class="text-left">Qty</th>
                            <th class="text-left">Discount</th>
                            <th class="text-left">Total</th>
                        </tr>
                        </thead>

                        <tbody>
                    	<?php
                    		$count = 0;
                    		$total = 0;
                    		$strQuery = "SELECT p.diskon, b.kode_barang, b.nama_barang, b.harga, p.qty FROM po_detail p INNER JOIN tbl_barang b ON b.id = p.id_barang where id_po_header = '$poID'";
                    		$result = mysql_query($strQuery) or die(mysql_error());
                    		while($arrResult = mysql_fetch_array($result)) {
                    			$count++;
                    			$total = $total + (($arrResult['qty']*$arrResult['harga']) - $arrResult['diskon']);
                    	?>
                        <tr>
                        	<td><?php echo $count;?></td>
                        	<td class="right"><?php echo $arrResult['kode_barang'];?></td>
                        	<td class="right"><?php echo $arrResult['nama_barang'];?></td>
                        	<td class="right"><?php echo number_format($arrResult['harga']);?></td>
                        	<td class="right"><?php echo number_format($arrResult['qty']);?></td>
                        	<td class="right"><?php echo number_format($arrResult['diskon']);?></td>
                        	<td align="right" class="right"><?php echo number_format((($arrResult['qty']*$arrResult['harga']) - $arrResult['diskon']));?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                         <tfoot>
                         	<tr >
                        		<td align="right" colspan="6"><strong>GRAND TOTAL</strong></td>
                        		<td align="right"><strong><?php echo number_format($total);?></strong></td>
                        	</tr>
                         </tfoot>
                    </table>

	    		</fieldset>
	    	</td>
	    </tr>
	</table>
</td>
