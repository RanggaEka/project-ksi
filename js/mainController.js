function savePembayaran() {
	var objBayar = [{
			no_inv :  $('#no_inv').textbox('getText'),
			tanggal :  $('#tanggal_bayar').datebox('getValue'),
			nilai_bayar :  $('#bayar').textbox('getText')
		}];
	
	$.ajax({
		type	: "POST",
		url		: "../system/pembayaran_invoice_service.php",
		data	: {
			data : objBayar
		},
		success	: function(data){
			location.reload();			
		}
	});
		
}

function saveUser() {
	var obj = [{
			username :  $('#username').textbox('getValue'),
			password :  $('#password').textbox('getValue'),
			nama :  $('#nama').textbox('getValue'),
			jenis_kelamin :  $('#jenis_kelamin').combo("getText"),
			tempat_lahir :  $('#tempat_lahir').textbox('getValue'),
			tanggal_lahir :  $('#tanggal_lahir').datebox('getValue'),
			alamat :  $('#alamat').textbox('getValue'),
			jabatan :  $('#jabatan').combo("getText")
		}];
		
	if ($('#username').textbox('getValue') != "" && $('#password').datebox('getValue') != ""
		&& $('#nama').textbox('getValue') != "" && $('#jenis_kelamin').combo("getText") != ""
		&& $('#tempat_lahir').textbox('getValue') != "" && $('#tanggal_lahir').textbox('getValue') != ""
		&& $('#alamat').textbox('getValue') != "" &&  $('#jabatan').textbox('getText') != "") {
	
		$.ajax({
			type	: "POST",
			url		: "../system/kelola_admin_service.php",
			data	: {
				data : obj
			},
			success	: function(data){
				location.reload();
			}
		});
	} else {
		alert("Field yang bertanda * harus di isi! ")
	}
}
