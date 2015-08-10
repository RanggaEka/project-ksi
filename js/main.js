var newwindow;
function poptastic(url) {
	newwindow=window.open(url,'name','height=300,width=500,resizable=0');
	if (window.focus) {newwindow.focus()}
}
function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

//customer
$.ajax({
	url: "../system/service_impl.php",
	type: "POST",
	data: {
	    type: "customer"	  
	},
	cache: false,
	dataType : "json",
	success: function(e) {
		// console.log(e);
		var result = "<option value=''>Pilih</option>";
	 	for (var i = 0; i < e.length; i++) {
	 		result += '<option alamat="'+e[i].alamat+'" value="'+e[i].id+'">'+ e[i].kode_customer+" - "+e[i].nama+'</option>';
	 	}	

	 	$('#customer').find('option').remove().end().append(result);
	 	$('#customer').chosen();
	},
	error: function(error) {
		console.log(error);
	    // Fail message
	}
});

//kode barang
$.ajax({
	url: "../system/service_impl.php",
	type: "POST",
	data: {
	    type: "barang"	  
	},
	cache: false,
	dataType : "json",
	success: function(e) {
		// console.log(e);
		var result = "<option value=''>Pilih</option>";
	 	for (var i = 0; i < e.length; i++) {
	 		result += '<option harga="'+e[i].harga+'" deskripsi="'+e[i].deskripsi+'" value="'+e[i].id+'">'+ e[i].kode_barang+" - "+e[i].nama_barang+'</option>';
	 	}	

	 	$('#barang').find('option').remove().end().append(result);
	 	$('#barang').chosen();
	},
	error: function(error) {
		console.log(error);
	    // Fail message
	}
});

function barangOnChange() {
	var attr = $("#barang").find('option:selected')[0];
	var deskripsi = attr.getAttribute('deskripsi');
	var harga = attr.getAttribute('harga');


	$('#deskripsi_barang').val(deskripsi);
	$('#harga_barang').val(addCommas(harga));
}

function customerOnChange() {
	var attr = $("#customer").find('option:selected')[0];
	var alamat = attr.getAttribute('alamat');

	$('#alamat').val(alamat);
}

function qtyOnblur() { 
	var attr = $("#barang").find('option:selected')[0];
	var harga = attr.getAttribute('harga');
	var total = $('#qty').val() * harga;

	var qty = $('#qty').val();
	var diskon = 0;
	if (qty > 50 && qty <= 100) {
		diskon = total * 0.05;
	} else if (qty > 101 && qty <= 200) {
		diskon = total * 0.1;
	} else if (qty > 200 && qty <= 500) {
		diskon = total * 0.15;
	} else if (qty > 501 && qty <= 1000) {
		diskon = total * 0.2;
	} else if (qty > 1001 ) {
		diskon = total * 0.3;
	} else {
		diskon = 0;
	}

	// console.log(harga, total);
	$('#diskon').val(0);
	$('#diskon').val(addCommas(diskon));
	$('#diskonRp').val(diskon);
	$('#total').val(addCommas(total-diskon));

}

function showImage(path) {
    $.Dialog({
        shadow: true,
        overlay: true,
        icon: '<span class="icon-image"></span>',
        title: 'Photo',
        style: 'max-width: 500px;',
        padding: 10,
        content: '<img src="../upload/photo/'+path+'" class="shadow">'
    });
}