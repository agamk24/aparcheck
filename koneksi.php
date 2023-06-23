<?php

function open_connection()
{
	//modify here
	$host = "localhost";
	$username = "id20947964_agamk24";
	$pass	= "H4zelnut24!";
	$dbname = "id20947964_apar_p3k_check_web";
	// $username = "root";
	// $pass	= "";
	// $dbname = "apar_p3k_check_web";

	$koneksi = mysqli_connect($host, $username, $pass, $dbname);

	if (mysqli_connect_errno()) {
		die("Gagal melakukan koneksi ke MYSQL :" . mysqli_connect_error());
	}

	return $koneksi;
}
