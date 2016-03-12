dojo.provide("lib.SSGParseUtil");

//http://www.bennadel.com/blog/2012-Exploring-Javascript-s-parseInt-And-parseFloat-Functions.htm
// Mengubah String ke Integer dengan default base 10
toInteger = function(strValue) {
	return parseInt(strValue,10);
};

numberNotDecimal = function(nilai){
    //penambahan validasi ketika value bernilai bulat tidak usah menampilkan 00 nya (feldy)
    var currencyformat =  dojo.number.format(nilai, {selector: 'currency', pattern: '#,##0'});
   
    return currencyformat;
};
formatCurrency = function(nilai){
    //penambahan validasi ketika value bernilai bulat tidak usah menampilkan 00 nya (feldy)
    var currencyformat;
    if (nilai % 1 == 0) {
        currencyformat = dojo.number.format(nilai, {selector: 'currency', pattern: '#,##0'});
    } else {
        currencyformat = dojo.number.format(nilai, {selector: 'currency', pattern: '#,##0.00'});
    }
    return currencyformat;
};

formatNumber = function(nilai){
    nilai = parseFloat(nilai, 10);
    //penambahan validasi ketika value bernilai bulat tidak usah menampilkan 00 nya (feldy)
    var currencyformat;
    if (Math.ceil(nilai % 1) == 0) {
        currencyformat = dojo.number.format(nilai, {selector: 'currency', pattern: '#,##0'});
    } else {
        currencyformat = dojo.number.format(nilai, {selector: 'currency', pattern: '#,##0.####'});
    }
    return currencyformat;
};

formatTanggal= function(tanggal){
    var tglDispl;
    if(tanggal == null || tanggal == ""){
        tglDispl = "";
    } else {
        // console.log("isi Tanggal ->> "+tanggal);
        var cut = tanggal.substring(0,10);

        tglDispl = dojo.date.locale.format(new Date(cut), {
            datePattern: "dd/MM/yyyy" ,
            selector: "date"
        }); 
    } 

    return tglDispl;
};
formatServer= function(tanggal){
    var tglDispl;
    if(tanggal == null || tanggal == ""){
        tglDispl = "";
    } else {
        // console.log("isi Tanggal ->> "+tanggal);
        // var cut = tanggal.substring(0,10);
        var datePattern = "yyyy-MM-dd";
        if (tanggal.toString().split("/").length > 1) {
            datePattern = "yyyy-dd-MM";
        }
        tglDispl = dojo.date.locale.format(new Date(tanggal), {
            datePattern: datePattern ,
            selector: "date"
        }); 
    } 

    return tglDispl;
};
cutStringPerWord = function (value, len) {
    var result;
    if (value == null) {
        return "";
    }
    
    if (value.trim().length > len) {
        var valueNew = value.substr(0, len);
        if (value.substr(len, 1) == " ") {
            result = valueNew;
        } else if (valueNew.indexOf(" ") < 0) {
            result = valueNew;
        } else {
            result = valueNew.substr(0, valueNew.lastIndexOf(" "));
        }
        return result;
    } else {
        return value;
    }
};
cutStringPerWordWithDot = function (value, len) {
    var result;
    if (value == null) {
        return "";
    }
    
    if (value.trim().length > len) {
        var valueNew = value.substr(0, len);
        if (value.substr(len, 1) == " ") {
            result = valueNew;
        } else if (valueNew.indexOf(" ") < 0) {
            result = valueNew;
        } else {
            result = valueNew.substr(0, valueNew.lastIndexOf(" "));
        }
        return result + "...";
    } else {
        return value;
    }
};

/**
 * fungsi untuk memformat angka on the fly pada text box
 * @param {type} idObj
 * @returns {undefined}
 */
function formatKoma(idObj) {
    if (idObj !== null && idObj !== "") {
        $('#'+idObj).autoNumeric('init',{
            "aSep": '.',
            "aDec": ','
        });
    }
}

/**
 * fungsi untuk mendapatkan value asli dari objek yang sudah ada formatter angkanya
 * @param {type} idObj
 * @returns {unresolved}
 */
function getRealValue(idObj) {
    return $('#'+idObj).autoNumeric('get');
}

function formatTruncateNumber(number, isFormat){
    var result =  number > 0 ? Math.floor(number) : Math.ceil(number);
    if (typeof isFormat == "boolean") {
        if (isFormat) {
            return dojo.number.format(result, {selector: 'currency', pattern: '#,###.####'});
        }
    }

    return result;
};
function formatDecimalNumber(number, places, isFormat){
    // if (number.toString().indexOf('.') > -1) {
    //     places = (places == 2) ? 3 : (places == 4) ? 5 : 0 ; 
    //     number = number.toString().substring(0,number.toString().indexOf('.')+places);
    //     // jika isFormat == true maka nilai hasil parsing di format
    //     if (typeof isFormat == "boolean") {
    //         if (isFormat) {
    //             return dojo.number.format(number, {selector: 'currency', pattern: '#,###.####'});
    //         }
    //     } 
    // }
    if (number.toString().indexOf('.') > -1) {
        number = number.toString().substring(0,number.toString().indexOf('.')+places+1);
    }
    if (isFormat) {
        return dojo.number.format(number, {selector: 'currency', pattern: '#,###.####'});
    }
    return parseFloat(number);
};
