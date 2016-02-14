function onLoadBodyGrid() {
	$('#gridFormTandaTerima').datagrid({striped:$(this)})
	$('#gridTandaTerima').datagrid({striped:$(this)})
	$('#gridLookupTandaTerima').datagrid({striped:$(this)})
	$('#gridDetailInvoice').datagrid({striped:$(this)})
}

function formatNumber(number) {
    number = number.toFixed(2) + '';
    x = number.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function formatPrice(val,row){
    //if (val < 20){
        return '<span style="color:red;">'+formatNumber(parseInt(val))+'</span>';
    //} else {
    //    return val;
    //}
}

function formatItem(row){
	var s = '<span style="font-weight:bold">' + row.nama + '</span><br/>' +
			'<span style="color:#888">' + row.alamat + '</span>';
	return s;
}

function formatItemTujuan(row){
	var s = '<span style="font-weight:bold">' + row.tujuan + '</span><br/>' +
			'<span style="color:#888">' + row.kota + ' - ' + row.kecamatan + ' - Rp.'+ row.reg + '</span>';
	return s;
}

function onSelectedTujuan(val) {
	var comb = val.tujuan +" - "+ val.kota +" - "+ val.kecamatan;
	$("#tujuan").textbox("setText", comb)
	$("#total").textbox("setText", parseInt(val.reg))
}

function doSearchRekapTandaTerima(value,name){
	if (name == "cn") {
		$('#gridTandaTerima').datagrid({
			queryParams: {
				cn: value
			}
		});
	} else if (name == "tanggal") {
		$('#gridTandaTerima').datagrid({
			queryParams: {
				tanggal: value
			}
		});
	} else if (name == "tujuan") {
		$('#gridTandaTerima').datagrid({
			queryParams: {
				tujuan: value
			}
		});
	} else if (name == "pengirim") {
		$('#gridTandaTerima').datagrid({
			queryParams: {
				pengirim: value
			}
		});
	} else {
		$('#gridTandaTerima').datagrid({
			queryParams: {
				 free: 'free'
			}
		});
	}
}

(function($){
	function pagerFilter(data){
		if ($.isArray(data)){	// is array
			data = {
				total: data.length,
				rows: data
			}
		}
		var gridTandaTerima = $(this);
		var state = gridTandaTerima.data('datagrid');
		var opts = gridTandaTerima.datagrid('options');
		if (!state.allRows){
			state.allRows = (data.rows);
		}
		var start = (opts.pageNumber-1)*parseInt(opts.pageSize);
		var end = start + parseInt(opts.pageSize);
		data.rows = $.extend(true,[],state.allRows.slice(start, end));
		return data;
	}

	var loadDataMethod = $.fn.datagrid.methods.loadData;
	$.extend($.fn.datagrid.methods, {
		clientPaging: function(jq){
			return jq.each(function(){
				var gridTandaTerima = $(this);
				var state = gridTandaTerima.data('datagrid');
				var opts = state.options;
				opts.loadFilter = pagerFilter;
				var onBeforeLoad = opts.onBeforeLoad;
				opts.onBeforeLoad = function(param){
					state.allRows = null;
					return onBeforeLoad.call(this, param);
				}
				gridTandaTerima.datagrid('getPager').pagination({
					onSelectPage:function(pageNum, pageSize){
						opts.pageNumber = pageNum;
						opts.pageSize = pageSize;
						$(this).pagination('refresh',{
							pageNumber:pageNum,
							pageSize:pageSize
						});
						gridTandaTerima.datagrid('loadData',state.allRows);
					}
				});
				$(this).datagrid('loadData', state.data);
				if (opts.url){
					$(this).datagrid('reload');
				}
			});
		},
		loadData: function(jq, data){
			jq.each(function(){
				$(this).data('datagrid').allRows = null;
			});
			return loadDataMethod.call($.fn.datagrid.methods, jq, data);
		},
		getAllRows: function(jq){
			return jq.data('datagrid').allRows;
		}
	})
})(jQuery);

function getData(){
	var rows = [];
	for(var i=1; i<=800; i++){
		var amount = Math.floor(Math.random()*1000);
		var price = Math.floor(Math.random()*1000);
		rows.push({
			inv: 'Inv No '+i,
			date: $.fn.datebox.defaults.formatter(new Date()),
			name: 'Name '+i,
			amount: amount,
			price: price,
			cost: amount*price,
			note: 'Note '+i
		});
	}
	return rows;
}

$(function(){
	$('#gridTandaTerima').datagrid({data:getData()}).datagrid('clientPaging');
});
		
function progress(){
	var win = $.messager.progress({
		title:'Please wait',
		msg:'Loading data...'
	});
	setTimeout(function(){
		$.messager.progress('close');
	},3000)
}
