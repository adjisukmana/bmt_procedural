<?php 
include './config/koneksi.php';

function max_id($column, $tabel) {
	$sql = mysql_query("SELECT MAX($column) as max FROM $tabel");
	$result = mysql_fetch_array($sql);

	return $result['max'] +1;
}

function null_check($tabel, $column, $id) {
	$sql = mysql_query("SELECT count(*) as counts FROM $tabel WHERE $column = '$id'");
	$result = mysql_fetch_array($sql);

	return $result['counts'];
}

?>