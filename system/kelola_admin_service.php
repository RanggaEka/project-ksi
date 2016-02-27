<?php
	include 'config_service.php';
	include 'gen_uuid_service.php';
	session_start();
	if ($_POST['data'] != null) {				
		
		$test = json_encode($_POST['data']);
		$jsondata = json_decode($test);
		$id = gen_uuid();
		$username = $jsondata[0]->username;
		$password = $jsondata[0]->password;
		$nama = $jsondata[0]->nama;
		$jenis_kelamin = $jsondata[0]->jenis_kelamin;
		$tempat_lahir = $jsondata[0]->tempat_lahir;
				
		$tanggal_lahir = $jsondata[0]->tanggal_lahir;
		$tgl=substr($tanggal_lahir,0,2);
		$bln=substr($tanggal_lahir,3,2);
		$thn=substr($tanggal_lahir,6,4);
		$hasil="$thn-$bln-$tgl";
		
		$alamat = $jsondata[0]->alamat;
		$jabatan = $jsondata[0]->jabatan;
		$user_id = $jsondata[0]->user_id;
		
		if($user_id == null){		
		$strQry = "INSERT INTO user VALUES ('$id',
											'$username',
											'$password',
											'$nama',
											'$jenis_kelamin',
											'$tempat_lahir',
											'$tanggal_lahir',
											'$alamat',	
											'X',										
											'$jabatan',0)";
		$exQuery = mysql_query($strQry) or die(mysql_error());
		}else{				
		$strQry = "UPDATE user SET 	username='$username',
									password='$password',		
									nama='$nama',		
									jenis_kelamin='$jenis_kelamin',
									tempat='$tempat_lahir',		
									tanggal_lahir='$tanggal_lahir',		
									alamat='$alamat',		
									jabatan='$jabatan' WHERE id='$user_id'";
		$exQuery = mysql_query($strQry) or die(mysql_error());
			if($_SESSION['user_sid']==$user_id){
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;		
				$_SESSION['nama'] = $nama;
				$_SESSION['jabatan'] = $jabatan;				
			}		
		}
		if ($exQuery) {
			echo "OKE";
		} else {
			echo "FAIL";
		}		
	}
?>
