<td width="156">&nbsp;</td>
<td>
	<br>
	<table width="70%" border="1" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
		<tr>
          	<td>
				<fieldset>
					<legend>Data Input Order</legend>
					<form action="../system/order_header_service.php" method="post" enctype="multipart/form-data">
					<table width="80%" border="0" cellspacing="0" cellpadding="3">
          <tr>
				          	<td><label>No. PO</label></td>
				         	<td>:</td>
				         	<td>
				          		<div class="input-control text" data-role="input-control">
					            	<input name="po" id="po" type="text" disabled="disabled" >
				         		</div>          
				         	</td>
				        </tr>
				        <tr>
				          	<td><label>Tanggal</label></td>
				         	<td>:</td>
				         	<td>
				          		<div class="input-control text" data-role="datepicker" data-format="yyyy-mm-dd" data-effect="slide">
					            	<input name="tanggal" type="text" placeholder="Input Tanggal">
					            	<button type="button" class="btn-date"></button>
				         		</div>          
				         	</td>
				        </tr>
				        <tr>
				          	<td><label>Customer</label></td>
				         	<td>:</td>
				         	<td>
				         		<select name="customer" onchange="customerOnChange()" id="customer" data-placeholder="Pilih Customer" class="chosen-select" style="width:100%;" tabindex="2">
								    <option value=""></option>
								</select>
				         	</td>
				        </tr>
				        <tr>
				          <td valign="top"><label>Alamat Pengiriman</label></td>
			         	  <td valign="top">:</td>
         	  				<td>
				          		<div class="input-control textarea">
								    <textarea id="alamat" name="alamat"></textarea>
								</div>   
				         	</td>
				        </tr>
				        <tr>
				          	<td><label>Photo</label></td>
				         	<td>:</td>
				         	<td>
				         		<div class="input-control file">
								    <input type="file" name="photo" />
								    <button type="button" class="btn-file"></button>
								</div>
				          		<!-- <div class="input-control file" data-role="input-control"> -->
					            	<!-- <input name="photo" type="file" > -->
				         		<!-- </div>           -->
				         	</td>
				        </tr>
				        <tr>
				          	<td></td>
				         	<td></td>
				         	<td>
				         		<button type="submit" name="simpan_po">Save</button>
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
	    			<legend>View Order</legend>
	    			<table class="table hovered">
                        <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">No PO</th>
                            <th class="text-left">Tanggal Order</th>
                            <th class="text-left">Nama Customer</th>
                            <th class="text-left">Alamat</th>
                            <th class="text-left">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                    	<?php
                    		$count = 0;
                    		$strQuery = "SELECT p.photo, p.id, p.no_po,p.tanggal,c.nama,p.alamat FROM po_header p INNER JOIN customer c ON c.id = p.id_customer where p.status = 'NEW'";
                    		$result = mysql_query($strQuery) or die(mysql_error());
                    		while($arrResult = mysql_fetch_array($result)) {
                    			$count++;
                    			$path = $arrResult['photo'];
                    			$id = $arrResult['id'];
                    	?>
                        <tr>
                        	<td><?php echo $count;?></td>
                        	<td class="right"><?php echo $arrResult['no_po'];?></td>
                        	<td class="right"><?php echo $arrResult['tanggal'];?></td>
                        	<td class="right"><?php echo $arrResult['nama'];?></td>
                        	<td class="right"><?php echo $arrResult['alamat'];?></td>
                        	<td class="right"><a href="halaman_utama.php?page=order_detail&po_id=<?php echo $id;?>"><i class="icon-plus"></i> Tambah Detail</a> | <a href="javascript:showImage('<?php echo $path;?>');"><i class="icon-image"></i> View</a></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

	    		</fieldset>
	    	</td>
	    </tr>
	</table>
</td>
