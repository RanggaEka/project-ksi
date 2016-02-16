function refreshTandaTerima() {
	$('#cn').textbox('setText','')
	$('#tanggal').datebox('setValue',null)
	$('#pengirim').combo("clear")
	$('#tujuan').combo("clear")
	$('#alamat_pengirim').textbox('setText','')
	$('#telpon_pengirim').textbox('setText','')
	$('#penerima').textbox('setText','')
	$('#alamat_penerima').textbox('setText','')
	$('#telpon_penerima').textbox('setText','')
	$('#udl').combo('clear','')
	$('#dtddtp').combo("clear")
	$('#agent').combo("clear")
	$('#coll').textbox('setText','1')
	$('#kg').textbox('setText','1')
	$('#vol').textbox('setText','1')
	$('#tarif').textbox('setText','')
	$('#total').textbox('setText','')
	$('#deskripsi').textbox('setText','')
	document.getElementById('simpan_tt').style.display = "inline-block"
	$('#gridFormTandaTerima').datagrid('reload')
}

function saveTandaTerima() {
	var obj = [{
			cn :  $('#cn').textbox('getValue'),
			tanggal :  $('#tanggal').datebox('getValue'),
			pengirim :  $('#pengirim').combo("getText"),
			tujuan :  $('#tujuan').combo("getText"),
			alamat_pengirim :  $('#alamat_pengirim').textbox('getValue'),
			telpon_pengirim :  $('#telpon_pengirim').textbox('getValue'),
			penerima :  $('#penerima').textbox('getValue'),
			alamat_penerima :  $('#alamat_penerima').textbox('getValue'),
			telpon_penerima :  $('#telpon_penerima').textbox('getValue'),
			udl : $('#udl').combo('getValue'),
			dtddtp :  $('#dtddtp').combo("getValue"),
			agent :  $('#agent').combo("getValue"),
			coll :  $('#coll').textbox('getValue'),
			kg :  $('#kg').textbox('getValue'),
			vol :  $('#vol').textbox('getValue'),
			grand_total :  $('#total').textbox('getValue'),
			deskripsi :  $('#deskripsi').textbox('getValue')
		}];
		
	if ($('#cn').textbox('getValue') != "" && $('#tanggal').datebox('getValue') != ""
		&& $('#pengirim').textbox('getValue') != "" && $('#tujuan').combo("getText") != ""
		&& $('#alamat_pengirim').textbox('getValue') != "" && $('#telpon_pengirim').textbox('getValue') != ""
		&& $('#penerima').textbox('getValue') != "" &&  $('#alamat_penerima').textbox('getValue') != "" 
		&& $('#telpon_penerima').textbox('getValue') != "" && $('#udl').combo('getValue') != "" 
		&& $('#dtddtp').combo("getValue") != "" && $('#agent').combo("getValue") != ""
		&& $('#coll').textbox('getValue') != "" && $('#kg').textbox("getValue") != ""
		&& $('#vol').textbox('getValue') != "" && $('#total').textbox("getValue") != ""
		&& $('#deskripsi').textbox('getValue') != "") {
	
		$.ajax({
			type	: "POST",
			url		: "../system/tanda_terima_service.php",
			data	: {
				data : obj
			},
			success	: function(data){
				refreshTandaTerima();
			}
		});
	} else {
		alert("Field yang bertanda * harus di isi! ")
	}
}

function searchNoCN(value){
	if (value == "") {
		//alert('Data tidak ditemukan !')
		console.log("kosong");
	} else {
		$.ajax({
			type	: "GET",
			url		: "../system/tanda_terima_service.php",
			data	: {
				sch_cn : value
			},
			success	: function(data){
				console.log(data)
				if (data == "") {
					alert('Data tidak ditemukan !')
				} else {
					var dataa = JSON.parse(data);
					$('#cn').textbox('setText',dataa[0].no_cn)
					$('#tanggal').datebox('setValue',dataa[0].tanggal)
					$('#pengirim').combo("setText",dataa[0].pengirim)
					$('#tujuan').combo("setText",dataa[0].tujuan)
					$('#alamat_pengirim').textbox('setText',dataa[0].alamat_pengirim)
					$('#telpon_pengirim').textbox('setText',dataa[0].telepon_pengirim)
					$('#penerima').textbox('setText',dataa[0].penerima)
					$('#alamat_penerima').textbox('setText',dataa[0].alamat_penerima)
					$('#telpon_penerima').textbox('setText',dataa[0].telepon_penerima)
					$('#udl').combo('setText',dataa[0].service_udl)
					$('#dtddtp').combo("setText",dataa[0].service_dtddtp)
					$('#agent').combo("setText",dataa[0].service_agent)
					$('#coll').textbox('setText',parseInt(dataa[0].total_coll))
					$('#kg').textbox('setText',parseInt(dataa[0].total_berat))
					$('#vol').textbox('setText',parseInt(dataa[0].total_vol))
					$('#total').textbox('setText',parseInt(dataa[0].grand_total))
					$('#deskripsi').textbox('setText',dataa[0].deskripsi_paket)
					document.getElementById('simpan_tt').style.display = "none"
				}
			}
		});
	}
}

function saveInvoice() {
	var objDtl = []
	var dtl = {}
	var count = document.getElementById("detail_invoice").rows.length;
	
	for (var i = 1; i < count; i++) {
		dtl = {
			sid :  document.getElementById("sid"+i).value
		}
		objDtl.push(dtl)
	}
	
	var objHeader = [{
			no_inv :  $('#no_inv').textbox('getText'),
			tanggal :  $('#tgl_inv').datebox('getValue'),
			customer_nama :  $('#customer_inv').textbox('getText'),
			listDetail : objDtl
		}];
	
	$.ajax({
		type	: "POST",
		url		: "../system/invoice_service.php",
		data	: {
			data : objHeader
		},
		success	: function(data){
			location.reload();
		}
	});
		
}

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