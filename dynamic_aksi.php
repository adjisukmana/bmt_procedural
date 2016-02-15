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
        // foreach ($_POST["variable_array"] as $id_variable =>$id_variable_value) {
        //     echo "$id_variable"."$id_variable_value <br>";
        // }
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
        mysql_query("DELETE FROM nasabah WHERE id_nasabah='$_GET[id_nasabah]'");
        echo "<script>document.location.href='index.php?p=dynamic_nasabah';</script>\n";
    }

} elseif ($module=='dynamic_variable') {

    $variable_array = $_POST["variable_array"]; 
    $variable_value_transformation = $_POST["variable_value_transformation"]; 
    $variable_value_name = $_POST["variable_value_name"]; 
    $variable_value_alias = $_POST["variable_value_alias"]; 

    if ($act=='input') {  
    // Input Variable
        mysql_query("INSERT INTO variable VALUES(
            '$_POST[id_variable]',
            '$_POST[variable_name]',
            '$_POST[variable_alias]'
            )");
        foreach ($variable_array as $key =>$id_variable_value) {
        // Input Variable Value
            mysql_query("INSERT INTO variable_value VALUES(
                '$id_variable_value',
                '$_POST[id_variable]',
                '$variable_value_transformation[$key]',
                '$variable_value_name[$key]',
                '$variable_value_alias[$key]'
                )");
        }
        echo "<script>document.location.href='index.php?p=dynamic_variable';</script>\n";
        
    } elseif ($act=='edit') {
    // Update Variable Value
        mysql_query("UPDATE variable SET 
            id_variable = '$_POST[id_variable]',
            variable_name = '$_POST[variable_name]',
            variable_alias = '$_POST[variable_alias]'
            WHERE id_variable = '$_POST[id_variable]'");
        foreach ($variable_array as $key =>$id_variable_value) {
            $a = mysql_query("DELETE FROM variable_value WHERE id_variable = '$_POST[id_variable]'");
            if ($a==false) {
                echo mysql_error();
                die();
            }
        }
        foreach ($variable_array as $key =>$id_variable_value) {
        // Update Variable Value
            mysql_query("INSERT INTO variable_value VALUES(
                '$id_variable_value',
                '$_POST[id_variable]',
                '$variable_value_transformation[$key]',
                '$variable_value_name[$key]',
                '$variable_value_alias[$key]'
                )");
        }
        echo "<script>document.location.href='index.php?p=dynamic_variable';</script>\n";
        
    } elseif ($act=='delete') {
    // hapus data Variable Value per item
        mysql_query("DELETE FROM variable WHERE id_variable='$_GET[id]'");
        echo "<script>alert('berhasil dihapus');document.location.href='index.php?p=dynamic_variable';</script>\n";
    }

} else {
    # code...
}

