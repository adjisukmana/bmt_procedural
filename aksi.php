<?php
function deleteAllDb()
{
    mysql_query("TRUNCATE variabel");
    mysql_query("TRUNCATE data_anggota");
    mysql_query("TRUNCATE data_prediksi");
    
    mysql_query("TRUNCATE perhitungan_c45");
    mysql_query("TRUNCATE pohon_keputusan");
    mysql_query("TRUNCATE rule_pohon_keputusan");

    mysql_query("TRUNCATE rule_prediksi");
    mysql_query("TRUNCATE data_variabel_prediksi");
}

// session_start();
include "config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// hapus data Nasabah per item
if ($module=='pegawai') {

    if ($act=='input') {  
        $cek_username=mysql_num_rows(mysql_query("SELECT username FROM karyawan 
                       WHERE username='$_POST[username]'"));
        if ($cek_username>0){
            echo "<script>window.alert('Username sudah ada. Ulangi lagi!');
                window.location=('index.php?p=pegawai&id_karyawan=$_GET[id_karyawan]');</script>";
        } else {
        // Input Data Nasabah
        $lokasi_img     = $_FILES['img']['tmp_name'];
        $nama_img       = $_FILES['img']['name'];
        move_uploaded_file($lokasi_img,"./img_karyawan/$nama_img");
        $password = md5($_POST['password']);
        mysql_query("INSERT INTO karyawan VALUES(
            '$_POST[id_karyawan]',
            '$_POST[nama_karyawan]',
            '$nama_img',
            '$_POST[username]',
            '$password',
            '$_POST[status_karyawan]'
            )");
        echo "<script>document.location.href='index.php?p=pegawai';</script>\n";
        }

    } elseif ($act=='edit') {
    // Update Data Pegawai
        $sql_cek_username = mysql_query("SELECT * FROM karyawan WHERE username='$_POST[username]'");
        $cek_username = mysql_fetch_array($sql_cek_username);
        if ((mysql_num_rows($sql_cek_username)>0) && ($cek_username['username']!=$_POST['username']) ){
            echo "<script>window.alert('Username sudah ada. Ulangi lagi!');
                window.location=('index.php?p=pegawai&id_karyawan=$_GET[id_karyawan]');</script>";
        } else {

        if (is_null($_POST['password'])) {
            $password = $cek_username['password'];
        } else {
            $password = md5($_POST['password']);
        }

        $lokasi_img     = $_FILES['img']['tmp_name'];
        if (!is_null($lokasi_img)) {
            $nama_img       = $_FILES['img']['name'];
            move_uploaded_file($lokasi_img,"./img_karyawan/$nama_img");
        } else {
            $nama_img       = $cek_username['photo_karyawan'];
        }

        mysql_query("UPDATE karyawan SET 
            nama_karyawan = '$_POST[nama_karyawan]',
            photo_karyawan = '$nama_img',
            username = '$_POST[username]',
            password = '$password',
            status_karyawan = '$_POST[status_karyawan]'
            WHERE id_karyawan = '$_POST[id_karyawan]'");
        
        echo "<script>document.location.href='index.php?p=pegawai';</script>\n";

        }
        
    } elseif ($act=='delete') {
    // hapus data Nasabah per item
        mysql_query("DELETE FROM nasabah WHERE id_nasabah='$_GET[id_nasabah]'");
        echo "<script>document.location.href='index.php?p=dynamic_nasabah';</script>\n";
    }

} elseif ($module=='data_anggota' AND $act=='hapus_data_anggota'){
    mysql_query("DELETE FROM data_anggota WHERE id='$_GET[id]'");
    echo "<script>alert('Data berhasil diinput!'); document.location.href='index.php?p=nasabah';</script>\n";
}

// hapus semua data Nasabah
elseif ($module=='data_anggota' AND $act=='hapus_semua_data_anggota'){
	mysql_query("TRUNCATE `data_anggota`");
    deleteAllDb();
    echo "<script>alert('Data berhasil dihapus!'); document.location.href='media.php?module=data_anggota';</script>\n";
}

// hapus semua data Prediksi
elseif ($module=='prediksi' AND $act=='hapus_semua_prediksi'){
	mysql_query("TRUNCATE `data_prediksi`");
    
    echo "<script>alert('Data berhasil dihapus!'); document.location.href='media.php?module=prediksi';</script>\n";
}


// Input Data Nasabah
elseif ($module=='data_anggota' AND $act=='input'){
    mysql_query("INSERT INTO data_anggota VALUES('',
        '$_POST[no_anggota]',
        '$_POST[nama_anggota]',
        '$_POST[penghasilan]',
        '$_POST[status]',
        '$_POST[status_rumah]',
        '$_POST[pinjaman]',
        '$_POST[pekerjaan]',
        '$_POST[kelancaran]'
        )");
    echo "<script>alert('Data berhasil diinput!'); document.location.href='index.php?p=nasabah';</script>\n";
}

// Update Data Nasabah
elseif ($module=='data_anggota' AND $act=='update_data_anggota'){
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
    echo "<script>document.location.href='index.php?p=nasabah';</script>\n";
}

// Hapus Semua Data Pohon Keputusan C45
elseif ($module=='c45' AND $act=='hapus_pohon_keputusan'){
	mysql_query("TRUNCATE `pohon_keputusan`");
	mysql_query("TRUNCATE `rule_pohon_keputusan`");
    mysql_query("DELETE FROM rule_prediksi where pohon = 'C45'");
    header('location:media.php?module=c45');
}

// Hapus Semua Data Penentu Keputusan
elseif ($module=='penentu_keputusan' AND $act=='delete_data_penentu_keputusan'){
	mysql_query("TRUNCATE `data_prediksi`");
    header('location:media.php?module=penentu_prediksi');
}

// Hapus Semua Data Penentu Keputusan per Item
if ($module=='penentu_keputusan' AND $act=='hapus'){
  mysql_query("DELETE FROM data_prediksi WHERE id='$_GET[id]'");
  header('location:media.php?module='.$module);
}

// Hapus Semua Data Kinerja
elseif ($module=='kinerja' AND $act=='hapus_data_kinerja'){
	mysql_query("TRUNCATE `data_keputusan_kinerja`");
    header('location:media.php?module=kinerja');
}

// Hapus Seluruh Database
elseif ($module=='lain-lain' AND $act=='delete_all_db'){
    deleteAllDb();
    header('location:media.php?module=lain-lain');
}
