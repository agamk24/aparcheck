<?php

function open_connection(){
	//modify here
	$host = "localhost";
	$username = "root";
	$pass	= "";
	$dbname = "apar_p3k_check_web";

	$koneksi = mysqli_connect($host, $username, $pass, $dbname);

	if(mysqli_connect_errno()){
		die("Gagal melakukan koneksi ke MYSQL :" . mysqli_connect_error());
	}

	return $koneksi;
}

?>