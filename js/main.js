var newwindow;
function poptastic(url) {
	newwindow=window.open(url,'name','height=300,width=500,resizable=0');
	if (window.focus) {newwindow.focus()}
}


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
	 		result += '<option value="'+e[i].id+'">'+ e[i].kode_customer+" - "+e[i].nama+'</option>';
	 	}	

	 	$('#customer').find('option').remove().end().append(result);
	 	$('#customer').chosen();
	},
	error: function(error) {
		console.log(error);
	    // Fail message
	}
});