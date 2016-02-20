function onLockingData(rec,form) {
	var value = "release"
	$.ajax({
		type	: "GET",
		url		: "../system/locking_service.php",
		data	: {
			sch : value
		},
		success	: function(data){
		}
	});
	
	setTimeout(function() {
		var objLocking = [{
			rec :  rec,
			form :  form
		}];

		$.ajax({
			type	: "POST",
			url		: "../system/locking_service.php",
			data	: {
				data : objLocking
			},
			success	: function(data){
				if (data != "") {
					$.messager.alert('Peringatan', data, 'warning');
				}
			}
		});	
	},50)
}

function releaseLocking() {
	var value = "release"
	$.ajax({
		type	: "GET",
		url		: "../system/locking_service.php",
		data	: {
			sch : value
		},
		success	: function(data){
			location.reload();
		}
	});
}
