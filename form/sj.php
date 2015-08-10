<td width="156">&nbsp;</td>
<td>
	<br>
	<table width="70%" border="1" align="left" cellpadding="10" cellspacing="3" style="border: solid 1px #efefef;">
		<tr>
          	<td>
				<fieldset>
					<?php
						$pencarian = "";	
			        	$keterangan = "";	
			        	$sql = "";
			        	if (isset($_POST['pencarian'])) {
			        		$pencarian = $_POST['pencarian'];
			        		$sql .=  "AND ".$pencarian;
			        	}
			        	if (isset($_POST['keterangan'])) {
			        		$keterangan = $_POST['keterangan'];
			        		$sql .= " like '%".$keterangan."%'"; 
			        	}


			        	// echo ">>>>>>>>>>>>>>".$sql;
					?>
					<legend>Surat Jalan</legend>
					<form action="" method="post">
						Kriteria Pencarian:
						<select name="pencarian">
							<option  <?php if ($pencarian == "p.no_po") echo 'selected="selected"'; ?> value="p.no_po">Nomor PO</option>
							<option  <?php if ($pencarian == "u.nama") echo 'selected="selected"'; ?> value="u.nama">Nama Sales</option>
							<option  <?php if ($pencarian == "c.nama") echo 'selected="selected"'; ?> value="c.nama">Nama Customer</option>
						</select>
					    <input class="text" value="<?php echo $keterangan;?>" name="keterangan" type="text" >
					    <button>Cari</button>
					</form>	
					<table class="table" width="100%" border="0" cellspacing="0" cellpadding="3">
				        <tr>
				          	<td>No.</td>
				          	<td>Tanggal</td>
				         	<td>No. PO</td>
				         	<td>Nama Sales</td>
				         	<td>Nama Customer</td>
				         	<td>Alamat</td>
				         	<td></td>
				        </tr>
				        <?php
                    		$count = 0;
                    		$strQuery = "SELECT s.status_pengiriman, s.id as sj_id, p.photo, p.id, p.no_po,p.tanggal,c.nama,p.alamat,u.nama as nama_user
                    						FROM surat_jalan s 
                    						INNER JOIN po_header p ON p.id = s.id_po 
                    						INNER JOIN customer c ON c.id = p.id_customer 
                    						INNER JOIN user u ON u.id = c.id_referensi_user 
                    						where (s.status_pengiriman = 'NEW' or s.status_pengiriman = 'READY') ".$sql ;
                    		$result = mysql_query($strQuery) or die(mysql_error());
                    		while($arrResult = mysql_fetch_array($result)) {
                    			$count++;
                    			$path = $arrResult['photo'];
                    			$id = $arrResult['sj_id'];
                    	?>
                    	<tr>
                        	<td><?php echo $count;?></td>
                        	<td class="right"><?php echo $arrResult['tanggal'];?></td>
                        	<td class="right"><?php echo $arrResult['no_po'];?></td>
                        	<td class="right"><?php echo $arrResult['nama_user'];?></td>
                        	<td class="right"><?php echo $arrResult['nama'];?></td>
                        	<td class="right"><?php echo $arrResult['alamat'];?></td>
				         	<td>
				         		<?php 
				         			if ($arrResult['status_pengiriman'] == "NEW") {
				         				echo '<a href="cetak_sj.php?id_sj='.$id.'" ><i class="icon-printer"></i> Cetak</a>';
				         			} elseif ($arrResult['status_pengiriman'] == "READY") {
				         				echo '<i class="icon-cars"> Delivery</i>';
				         			}
				         		?>
				         		
				         	</td>
                        	
                        </tr>
				        <!-- <tr>
				          	<td><?php echo $i; ?></td>
				         	<td>000<?php echo $i; ?></td>
				         	<td>DJ<?php echo $i; ?></td>
				         	<td>ANDIKA<?php echo $i; ?></td>
				         	<td>JAKARTA<?php echo $i; ?></td>
				         	<td>JAKARTA<?php echo $i; ?></td>
				         	<td><a href="cetak_sj.php" target="_blank"><i class="icon-printer"></i> Cetak</a></td>
				        </tr> -->
				        <?php } ?>
			    	</table>
				</fieldset>
			</td>
	    </tr>
	</table>
</td>

