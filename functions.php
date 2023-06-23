<?php
session_start();

define("BASE_URL", "https://aparcheck.000webhostapp.com/");
// define("BASE_URL", "http://localhost/aparcheck/");

function check_login()
{
	if (!isset($_SESSION['nik'])) {
		header("Location:" . BASE_URL . "login.php");
	}
}

function get_data_jurusan()
{
	require_once "koneksi.php";

	$conn = open_connection();

	$query = "SELECT kode, nama_jurusan FROM jurusan";

	$hasil = mysqli_query($conn, $query);

	$list = array();

	while ($row = mysqli_fetch_assoc($hasil)) {
		$list[$row['kode']] = $row['nama_jurusan'];
	}

	return $list;
}

function get_data_lokasi()
{
	require_once "koneksi.php";

	$conn = open_connection();

	$query = "SELECT id_lokasi, lokasi FROM lokasi";

	$hasil = mysqli_query($conn, $query);

	$list = array();

	while ($row = mysqli_fetch_assoc($hasil)) {
		$list[$row['id_lokasi']] = $row['lokasi'];
	}

	return $list;
}

function get_data_ukuran()
{
	require_once "koneksi.php";

	$conn = open_connection();

	$query = "SELECT * FROM ukuran";

	$hasil = mysqli_query($conn, $query);

	$list = array();

	while ($row = mysqli_fetch_assoc($hasil)) {
		$list[$row['id_ukuran']] = $row['ukuran'];
	}

	return $list;
}

function baseRadioButton($value, $name, $title)
{
	echo '<fieldset class="form-group">
				<div class="row align-items-center">
					<legend class="col-form-label col-sm-4 pt-0">' . $title . ':</legend>
					<div class="col-sm-10">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="' . $name . '" value="Ya"'
		. ($value == '1' ? 'checked' : '') . '>
							<label class="form-check-label d-flex align-items-center">
								Ya
							</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="' . $name . '" value="Tidak"'
		. ($value == '0' ? 'checked' : '') . '>
							<label class="form-check-label d-flex align-items-center">
								Tidak
							</label>
						</div>
					</div>
				</div>
			</fieldset>';
}

function baseTextField($value, $name, $title)
{
	echo '
		<div class="mb-3">
			<label for="' . $name . '" class="form-label">' . $title . ' : </label>
			<input type="text" class="form-control" id="' . $name . '" name="' . $name . '" value="' . $value . '">
		</div>';
}

function baseTextArea($value, $name, $title)
{
	echo '
		<div class="mb-3">
			<label for="' . $name . '" class="form-label">' . $title . ' : </label>
			<textarea class="form-control" id="' . $name . '" name="' . $name . '" rows="3">' . $value . '</textarea>
		</div>';
}

function baseDatePicker($value, $name, $title)
{
	echo '
		<div class="mb-3">
			<label for="' . $name . '" class="form-label">' . $title . ' : </label>
			<input type="date" class="form-control" id="' . $name . '" name="' . $name . '" value="' . $value . '">
		</div>';
}
