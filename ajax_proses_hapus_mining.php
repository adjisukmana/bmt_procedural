<?php
	include "config/koneksi.php";
	
	mysql_query("TRUNCATE `pohon_keputusan`");
	mysql_query("TRUNCATE `rule_pohon_keputusan`");
	mysql_query("TRUNCATE `iterasi_c45`");
    mysql_query("DELETE FROM rule_prediksi where pohon = 'C45'");
?>

<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    Hapus Pohon Keputusan Berhasil!
</div>