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
					<table class="table" width="100%" border="0" cellspacing="0" cellpadding="3">
				        <tr>
				          	<td>No.</td>
				         	<td>No. PO</td>
				         	<td>Nama Sales</td>
				         	<td>Nama Customer</td>
				         	<td>Alamat</td>
				         	<td>Approval</td>
				        </tr>
				        <?php 
				        	for ($i = 1; $i < 10; $i++) {
				        ?>
				        <tr>
				          	<td><?php echo $i; ?></td>
				         	<td>000<?php echo $i; ?></td>
				         	<td>DJ<?php echo $i; ?></td>
				         	<td>ANDIKA<?php echo $i; ?></td>
				         	<td>JAKARTA<?php echo $i; ?></td>
				         	<td><a href="#">APPROVE</a> | <a href="vw_po.php" target="_blank">VIEW</a></td>
				        </tr>
				        <?php } ?>
			    	</table>
				</fieldset>
			</td>
	    </tr>
	</table>
</td>

