<?php
	include "config/koneksi.php";

	if($_POST['username'] && $_POST['password']){
		$username	= strtolower($_POST['username']);
		$password	= md5($_POST['password']);
		$sql		= "select * from karyawan where username = '$username' and password = '$password'";
		
		$query		= mysql_query($sql);
		$result		= mysql_fetch_array($query);
		$data		= mysql_num_rows($query);

		if($data == 1){
			# set session login
			session_start();
			
			$_SESSION['username'] = $result["username"];
			$_SESSION['nama_karyawan'] = $result["nama_karyawan"];
			$_SESSION['photo_karyawan'] = $result["photo_karyawan"];
			$_SESSION['userLogin'] = true;

			header('location:index.php');
		}else{
			header('location:login.php?status=error');
		}
	}else{
		header('location:login.php?status=errors');
	}
?>