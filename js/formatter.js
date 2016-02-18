function onLoadBodyGrid() {
	$('#gridFormTandaTerima').datagrid({striped:$(this)})
	$('#gridTandaTerima').datagrid({striped:$(this)})
	$('#gridLookupTandaTerima').datagrid({striped:$(this)})
	$('#gridDetailInvoice').datagrid({striped:$(this)})
	$('#detail_invoice_ui').datagrid("getPanel").css("display","none")
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
        return '<span style="color:blue;">'+formatNumber(parseInt(val))+'</span>';
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

function myformatter(date){
	var y = date.getFullYear();
	var m = date.getMonth()+1;
	var d = date.getDate();
	return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
}
function myparser(s){
	if (!s) return new Date();
	var ss = (s.split('-'));
	var y = parseInt(ss[0],10);
	var m = parseInt(ss[1],10);
	var d = parseInt(ss[2],10);
	if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
		return new Date(y,m-1,d);
	} else {
		return new Date();
	}
}

function onSelectedTujuan(val) {
	var comb = val.tujuan +" - "+ val.kota +" - "+ val.kecamatan;
	$("#tujuan").textbox("setText", comb)
	$("#tarif").textbox("setValue", parseInt(val.reg))
	var tarif = parseInt($('#tarif').textbox('getValue'))
	var kg = parseInt($('#kg').textbox('getValue'))
	var vol = parseInt($('#vol').textbox('getValue'))
	if(vol > kg){
		var sum = tarif * vol
	}else{
		var sum = tarif * kg
	}
	$('#total').textbox('setValue',sum)
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
