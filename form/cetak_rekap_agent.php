<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Rekap Tanda Terima</title>
    <link rel="stylesheet" href="../lib/metro/css/metro-bootstrap.css">
    <script src="../lib/metro/js/jquery/jquery.min.js"></script>
    <script src="../lib/metro/js/jquery/jquery.widget.min.js"></script>
    <script src="../lib/metro/min/metro.min.js"></script>
    <script src="../js/main.js"></script>
</head>
<style>
body {padding:0px}
.print-area {border:0px dashed;padding:0;margin:0}
</style>
<body class="metro" onLoad="#javascript:printDiv('print-area-1');">  
  <table width="100%" cellspacing="30" cellpadding="30" align="center">
    <tr>
      <td>
	  <div id="print-area-1" class="print-area" style="width: 100%; height: 100%; padding: 0px;" align="center">
        <!--fieldset style="width: 85%; padding: 0px;" align="center"-->
        <!-- <legend>Cetak TT</legend> -->
        <table width="100%" border="0" cellpadding="5" cellspacing="5" bordercolor="1" style="border:solid 0px #000000; padding:0px;" align="center">
          <tr>
            <!--td width="10%"><img src="../images/ksi.png" width="100" height="100" /></td-->
            <td align="center"><p><strong>REKAP AGENT </strong><br/>              
              <strong>CV. KIKI SOLUSI INTERNUSA (KiKi Trans)</strong><br />              
              </p>
			</td>			
          </tr>
		  <tr>
            <td>
			<table width="100%" border="0" cellpadding="5" cellspacing="5">
              <tr>                
				<th colspan="6" align="center" width="50%">
					<table width="100%" border="1" cellspacing="0" cellpadding="5">
                      <tr>
                        <td width="2%">No</td>
                        <td width="20%">Agent</td>
                        <td width="52%">Alamat</td>
                        <td width="25%">Telepon</td>
                      </tr>
					  <?php 
						include '../system/config_service.php'; 
						$strQuery = "SELECT * FROM agent order by agent asc";
					$count = 0;    
						$result = mysql_query($strQuery) or die(mysql_error());
						while($arrResult = mysql_fetch_array($result)) {
							$count++;
					?>
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $arrResult['agent']; ?></td>
                        <td><?php echo $arrResult['alamat']; ?></td>
                        <td><?php echo $arrResult['no_telp']; ?></td>
                      </tr>
					  <?php } ?>   	
                    </table>
				</th>
				</tr>
			 </table></td>
          </tr>
        </table>
		<!--/fieldset-->
		</div>
      </td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr align="center">
		<td align="center">
			<a type="button" class="button" href="javascript:printDiv('print-area-1');" >Cetak</a>
		</td>
	</tr>
  </table>
<textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:70%;font:inherit;vertical-align:center}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px solid;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:0.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:0.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:70%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:70%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
  
</body>
<script>
function printDiv(elementId) {
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
</script>
</html>
