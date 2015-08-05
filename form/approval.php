<td width="156">&nbsp;</td>
<td>
	<br>
	<table width="70%" border="1" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
		<tr>
          	<td>
				<fieldset>
					<legend>Approval PO</legend>
					Kriteria Pencarian:
					<select name="pencarian">
						<option value="po">Nomor PO</option>
						<option value="sales">Nama Sales</option>
						<option value="customer">Nama Customer</option>
					</select>
				    <input class="text" name="keterangan" type="text" >
				    <button>Cari</button>
					<br />
					<br />
					<table class="table hovered">
				        <tr>
				          	<td>No.</td>
				          	<td>Tanggal</td>
				         	<td>No. PO</td>
				         	<td>Nama Sales</td>
				         	<td>Nama Customer</td>
				         	<td>Alamat</td>
				         	<td>Approval</td>
				        </tr>
				        <?php
                    		$count = 0;
                    		$strQuery = "SELECT p.photo, p.id, p.no_po,p.tanggal,c.nama,p.alamat,u.nama as nama_user
                    						FROM po_header p 
                    						INNER JOIN customer c ON c.id = p.id_customer 
                    						INNER JOIN user u ON u.id = c.id_referensi_user 
                    						where p.status = 'NEW'";
                    		$result = mysql_query($strQuery) or die(mysql_error());
                    		while($arrResult = mysql_fetch_array($result)) {
                    			$count++;
                    			$path = $arrResult['photo'];
                    			$id = $arrResult['id'];
                    	?>
                    	<tr>
                        	<td><?php echo $count;?></td>
                        	<td class="right"><?php echo $arrResult['tanggal'];?></td>
                        	<td class="right"><?php echo $arrResult['no_po'];?></td>
                        	<td class="right"><?php echo $arrResult['nama_user'];?></td>
                        	<td class="right"><?php echo $arrResult['nama'];?></td>
                        	<td class="right"><?php echo $arrResult['alamat'];?></td>
                        	<td class="right"><a href="../system/approval_service.php?status=approve&id_po=<?php echo $id; ?>"><i class="icon-checkmark"></i> Approve</a> |
                        					  <a href="../system/approval_service.php?status=reject&id_po=<?php echo $id; ?>"><i class="icon-cancel-2"></i> Reject</a> |
                        					  <a href="vw_po.php?id_po=<?php echo $id; ?>" target="_blank" ><i class="icon-grid-view"></i> View Detail</a></td>
                        </tr>
				        <!-- <tr>
				          	<td><?php echo $i; ?></td>
				         	<td>000<?php echo $i; ?></td>
				         	<td>DJ<?php echo $i; ?></td>
				         	<td>ANDIKA<?php echo $i; ?></td>
				         	<td>JAKARTA<?php echo $i; ?></td>
				         	<td><a href="#">APPROVE</a> | <a href="vw_po.php" target="_blank">VIEW</a></td>
				        </tr> -->
				        <?php } ?>
			    	</table>
				</fieldset>
			</td>
	    </tr>
	</table>
</td>

