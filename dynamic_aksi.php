<?php
// session_start();
include "config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='data_anggota') {

    if ($act=='input') {  
    // Input Data Nasabah
        mysql_query("INSERT INTO nasabah VALUES(
            '$_POST[id_nasabah]',
            '$_POST[kelancaran]',
            '$_POST[nasabah_name]'
            )");
        foreach ($_POST["variable_array"] as $id_variable =>$id_variable_value) {
            mysql_query("INSERT INTO nasabah_variable VALUES(
                '$_POST[id_nasabah]',
                '$id_variable',
                '$id_variable_value'
                )");
        }
        echo "<script>document.location.href='index.php?p=dynamic_nasabah';</script>\n";

    } elseif ($act=='edit') {
    // Update Data Nasabah
        mysql_query("UPDATE nasabah SET 
            id_nasabah = '$_POST[id_nasabah]',
            kelancaran = '$_POST[kelancaran]',
            nasabah_name = '$_POST[nasabah_name]'
            WHERE id_nasabah = '$_POST[id_nasabah]'");

        foreach (@$_POST["variable_array"] as $id_variable =>$id_variable_value) {
            mysql_query("UPDATE nasabah_variable SET 
            id_nasabah = '$_POST[id_nasabah]',
            id_variable = '$_POST[id_variable]',
            id_variable_value = '$_POST[id_variable_value]'
            WHERE id_nasabah = '$_POST[id_nasabah]'");
        }
        
        echo "<script>document.location.href='index.php?p=dynamic_nasabah';</script>\n";
        
    } elseif ($act=='delete') {
    // hapus data Nasabah per item
        mysql_query("DELETE FROM data_anggota WHERE id='$_GET[id]'");
        echo "<script>document.location.href='index.php?p=dynamic_nasabah';</script>\n";
    }

} elseif ($module=='dynamic_variable') {

    if ($act=='input') {  
    // Input Data Nasabah
        mysql_query("INSERT INTO variable VALUES(
            '$_POST[id_variable]',
            '$_POST[variable_name]',
            '$_POST[variable_alias]'
            )");
        echo "<script>document.location.href='index.php?p=dynamic_variable';</script>\n";

    } elseif ($act=='edit') {
    // Update Data Nasabah
        mysql_query("UPDATE data_anggota SET 
            no_anggota = '$_POST[no_anggota]',
            nama_anggota = '$_POST[nama_anggota]',
            penghasilan = '$_POST[penghasilan]',
            status = '$_POST[status]',
            status_rumah = '$_POST[status_rumah]',
            pinjaman = '$_POST[pinjaman]',
            pekerjaan = '$_POST[pekerjaan]',
            kelancaran = '$_POST[kelancaran]'
            WHERE id      = '$_POST[id]'");
        echo "<script>document.location.href='index.php?p=dynamic_nasabah';</script>\n";
        
    } elseif ($act=='delete') {
    // hapus data Nasabah per item
        mysql_query("DELETE FROM variable WHERE id_variable='$_GET[id]'");
        echo "<script>alert('berhasil dihapus');document.location.href='index.php?p=dynamic_variable';</script>\n";
    }

} else {
    # code...
}

