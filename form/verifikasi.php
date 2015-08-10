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
					<legend>Verifikasi</legend>
					<form action="" method="post">
						Kriteria Pencarian:
						<select name="pencarian">
							<option  <?php if ($pencarian == "s.no_sj") echo 'selected="selected"'; ?> value="s.no_sj">Nomor SJ</option>
							<option  <?php if ($pencarian == "u.nama") echo 'selected="selected"'; ?> value="u.nama">Nama Sales</option>
							<option  <?php if ($pencarian == "c.nama") echo 'selected="selected"'; ?> value="c.nama">Nama Customer</option>
						</select>
					    <input class="text" value="<?php echo $keterangan;?>" name="keterangan" type="text" >
					    <button>Cari</button>
					</form>	
					<table class="table" width="100%" border="0" cellspacing="0" cellpadding="3">
				        <tr>
				          	<td>No.</td>
				         	<td>No. SJ</td>
				         	<td>Nama Sales</td>
				         	<td>Nama Customer</td>
				         	<td>Status</td>
				        </tr>
				        <?php
                    		$count = 0;
                    		$strQuery = "SELECT i.status_penagihan as status_penagihan, i.id as id_invoice, s.status_pengiriman,s.no_sj as no_sj, s.id as sj_id, p.photo, p.id, p.no_po,p.tanggal,c.nama,p.alamat,u.nama as nama_user
                    						FROM invoice i
                    						INNER JOIN surat_jalan s ON s.id = i.id_sj 
                    						INNER JOIN po_header p ON p.id = s.id_po 
                    						INNER JOIN customer c ON c.id = p.id_customer 
                    						INNER JOIN user u ON u.id = c.id_referensi_user 
                    						where (i.status_penagihan = 'NEW' or i.status_penagihan = 'APPROVED') ".$sql ;
                    		$result = mysql_query($strQuery) or die(mysql_error());
                    		while($arrResult = mysql_fetch_array($result)) {
                    			$count++;
                    			$id = $arrResult['id_invoice'];
                    			$status_penagihan = $arrResult['status_penagihan'];
                    	?>
				        <tr>
				          	<td><?php echo $count; ?></td>
				         	<td><?php echo $arrResult['no_sj']; ?></td>
				         	<td><?php echo $arrResult['nama_user']; ?></td>
				         	<td><?php echo $arrResult['nama']; ?></td>
				         	<td>
				         		<?php 
				         			if ($status_penagihan == "NEW") {
				         				echo '<a href="../system/verifikasi_service.php?status=APPROVED&id_inv='.$id.'"><i class="icon-clipboard"></i> Verifikasi/Approve</a>';
				         			} elseif ($status_penagihan == "APPROVED") {
				         				echo '<a href="cetak_invoice.php?id_invoice='.$id.'" target="_blank"><i class="icon-tag"></i> Cetak Invoice</a>';
				         			}
				         		?>				         		
				         	</td>
				        </tr>
				        <?php } ?>
			    	</table>
				</fieldset>
			</td>
	    </tr>
	</table>
</td>

