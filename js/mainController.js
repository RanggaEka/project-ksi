function refreshTandaTerima() {
	$('#cn').textbox('setText','')
	$('#tanggal').datebox('setValue',null)
	$('#pengirim').combo("clear")
	$('#tujuan').combo("clear")
	$('#alamat_pengirim').textbox('setText','')
	$('#penerima').textbox('setText','')
	$('#alamat_penerima').textbox('setText','')
	$('#udl').combo('clear','')
	$('#dtddtp').combo("clear")
	$('#agent').combo("clear")
	$('#coll').textbox('setText','')
	$('#kg').textbox('setText','')
	$('#vol').textbox('setText','')
	$('#total').textbox('setText','')
	$('#deskripsi').textbox('setText','')
	document.getElementById('simpan_tt').style.display = "inline-block"
	$('#gridFormTandaTerima').datagrid('reload')
}

function saveTandaTerima() {
	var obj = [{
			cn :  $('#cn').textbox('getText'),
			tanggal :  $('#tanggal').datebox('getValue'),
			pengirim :  $('#pengirim').combo("getText"),
			tujuan :  $('#tujuan').combo("getText"),
			alamat_pengirim :  $('#alamat_pengirim').textbox('getText'),
			penerima :  $('#penerima').textbox('getText'),
			alamat_penerima :  $('#alamat_penerima').textbox('getText'),
			udl : $('#udl').combo('getText'),
			dtddtp :  $('#dtddtp').combo("getText"),
			agent :  $('#agent').combo("getText"),
			coll :  $('#coll').textbox('getText'),
			kg :  $('#kg').textbox('getText'),
			vol :  $('#vol').textbox('getText'),
			grand_total :  $('#total').textbox('getText'),
			deskripsi :  $('#deskripsi').textbox('getText')
		}];
	
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
}

function searchNoCN(value){
	$.ajax({
		type	: "GET",
		url		: "../system/tanda_terima_service.php",
		data	: {
			sch_cn : value
		},
		success	: function(data){
			var dataa = JSON.parse(data);
			$('#cn').textbox('setText',dataa[0].no_cn)
			$('#tanggal').datebox('setValue',dataa[0].tanggal)
			$('#pengirim').combo("setText",dataa[0].pengirim)
			$('#tujuan').combo("setText",dataa[0].tujuan)
			$('#alamat_pengirim').textbox('setText',dataa[0].alamat_pengirim)
			$('#penerima').textbox('setText',dataa[0].penerima)
			$('#alamat_penerima').textbox('setText',dataa[0].alamat_penerima)
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
	});
}
