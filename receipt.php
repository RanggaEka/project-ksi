<?php $this->load->view("partial/header"); ?>
<?php
if (isset($error_message))
{
	echo '<h1 style="text-align: center;">'.$error_message.'</h1>';
	exit;
}
?>
<div id="receipt_wrapper">
	<div id="receipt_header">
		<div id="company_name"><?php echo $this->config->item('company'); ?></div>
		<div id="company_address"><?php echo nl2br($this->config->item('address')); ?></div>
		<div id="company_phone"><?php echo $this->config->item('phone'); ?></div>
	</div>

	<div id="receipt_customer">
		<?php if(isset($customer))
		{
		?>
			<div id="customer"><?php echo $this->lang->line('')."  ".$customer; ?></div>
			<div id="customer"><?php echo $this->lang->line('')."  ".$customer_address_1; ?></div>
			<div id="customer"><?php echo $this->lang->line('')."  ".$customer_address_2; ?></div>
			<div id="customer"><?php echo $this->lang->line('')."  ".$customer_phone_number; ?></div>
		<?php
		}
		?>
	</div>
		<div id="sale_date">
		<div id="sale_time"><?php echo 'Tanggal : '.$transaction_time ?></div>
		<div id="sale_id"><?php echo $this->lang->line('sales_id').": ".$sale_id; ?></div>
		<div id="customer"><?php echo 'Kode Sales' .": ".$delivery_name; ?></div>
	</div>
	
	<?php
		foreach($payments as $payment_id=>$payment)
	{ ?>
		<tr>
		<td colspan="2" style="text-align:right;"><?php echo $this->lang->line('sales_payment').':'; ?></td>
		<td colspan="2" style="text-align:right;"><?php $splitpayment=explode(':',$payment['payment_type']); echo $splitpayment[0]; ?> </td>
		<td colspan="2" style="text-align:right"></td>
	    </tr>
	<?php
	}
	?>
	
	<table id="receipt_items">
	<tr>
	<th style="width:15%;text-align:left;"><?php echo $this->lang->line('sales_item_number'); ?></th>
	<th style="width:30%;text-align:left;"><?php echo $this->lang->line('items_name'); ?></th>
	<th style="width:15%;"><?php echo $this->lang->line('common_price'); ?></th>
	<th style="width:16%;text-align:left;"><?php echo $this->lang->line('sales_quantity'); ?></th>
	<th style="width:9%;text-align:left;"><?php echo $this->lang->line('sales_discount'); ?></th>
	<th style="width:20%;text-align:right;"><?php echo $this->lang->line('sales_total'); ?></th>
	</tr>
	
	<tr>
	<td colspan="4" style='text-align:right;border-top:2px solid #000000;'></td>
	<td colspan="2" style='text-align:right;border-top:2px solid #000000;'></td>
	</tr>
	
	<?php
	foreach(array_reverse($cart, true) as $line=>$item)
	{
	?>
		<table id="receipt_items1">
		<tr>
		<td style="width:15%;text-align:left;"><?php echo $item['item_number']; ?></td>
		<td style="width:30%;text-align:left;"><?php echo $item['name']; ?></td>
		<td style="width:15%;text-align:left;"><?php echo to_currency($item['price']+$item['delivery_price']); ?></td>
		<td style='width:16%;text-align:left;'><?php echo $item['quantity']; ?></td>
		<td style='width:9%;text-align:left;'><?php echo $item['discount']; ?></td>
		<td style='width:20%;text-align:right;'><?php echo to_currency($item['price']*$item['quantity']+$item['delivery_price']*$item['quantity']-$item['price']*$item['quantity']*$item['discount']/100-$item['delivery_price']*$item['quantity']*$item['discount']/100); ?></td>
		</tr>

	    <tr>
	    <td colspan="2" align="center"><?php echo $lang['sales_comments']; ?></td>
		<td colspan="2" ><?php echo $item['serialnumber']; ?></td>
	    </tr>

	<?php
	}
	?>
	<tr>
	<td colspan="4" style='text-align:right;border-top:2px solid #000000;'></td>
	<td colspan="2" style='text-align:right;border-top:2px solid #000000;'></td>
	</tr>

	<?php foreach($taxes as $name=>$value) { ?>
		<tr>
			<td colspan="4" style='text-align:right;'><?php echo $name; ?>:</td>
			<td colspan="2" style='text-align:right;'><?php echo to_currency($value); ?></td>
		</tr>
	<?php }; ?>

	<tr>
	<td colspan="2" style='text-align:left;'><?php echo $this->lang->line('sales_comment').$comment; ?></td>
	<td colspan="2" style='text-align:right;'><?php echo $this->lang->line('sales_total'); ?></td>
	<td colspan="2" style='text-align:right'><?php echo to_currency($total); ?></td>
	</tr>
	<tr><td colspan="6">&nbsp;</td></tr>
	<tr>
	<td colspan="2" style="text-align:left;"><?php echo 'Tanda Terima'; ?></td>
	<td colspan="2" style="text-align:right;"><?php echo 'Hormat Kami'; ?></td>
	<td colspan="2" style="text-align:right"></td>
	</tr>
	<tr><td colspan="6">&nbsp;</td></tr>
	<tr><td colspan="6">&nbsp;</td></tr>
	<tr><td colspan="6">&nbsp;</td></tr>
	<tr>
	<td colspan="2" style="text-align:left;"><?php echo 'Ket: Ttd, Nama Lengkap, Stempel'; ?></td>
	<td colspan="2" style="text-align:right;"><?php echo 'CKB'; ?></td>
	<td colspan="2" style="text-align:right"></td>
	</tr>
	</table>
	<div><?php echo 'Pembayaran :'; ?></div>
	<div><?php echo 'Transfer atau Giro'; ?></div>
	<div><?php echo 'ke No. Rek. BCA. 5770351067 a/n Sujoto Halim'; ?></div>

</div>
<?php $this->load->view("partial/footer"); ?>

<?php if ($this->Appconfig->get('print_after_sale'))
{
?>
<script type="text/javascript">
$(window).load(function()
{
	window.print();
});
</script>
<?php
}
?>