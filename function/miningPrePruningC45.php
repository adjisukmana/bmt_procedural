<?php
include "./config/koneksi.php";
// generateRuleFinalPrePruning();
// insertRuleC45PrePruning();

//---------- KUMPULAN FUNGSI YANG AKAN DILAKUKAN DALAM PROSES MINING ----------
function miningC45($variabel, $nilai_variabel)
{
    perhitunganC45($variabel, $nilai_variabel);
    insertVariabelPohonKeputusan($variabel, $nilai_variabel);
    getInfGainMax($variabel, $nilai_variabel);
updateKeputusanUnknown();
}

//#1# Hapus semua DB dan insert default variabel dan nilai variabel
function populateDb() 
{
    mysql_query("TRUNCATE rule_prediksi");
    mysql_query("TRUNCATE pohon_keputusan");
    mysql_query("TRUNCATE rule_pohon_keputusan");
    mysql_query("TRUNCATE iterasi_c45");
    mysql_query("TRUNCATE perhitungan_c45");
    populateVariabel();
}

function populateVariabel() 
{
    mysql_query("TRUNCATE rule_variabel");
    
    mysql_query("INSERT INTO rule_variabel (`id`, `variabel`, `nilai_variabel`) VALUES ('', 'kelancaran', 'kelancaran')");

    $sql=mysql_query("SELECT * FROM variable");
    while ($data=mysql_fetch_array($sql)){
        $sql1=mysql_query("SELECT * FROM variable_value WHERE id_variable = '$data[id_variable]'");
        while ($data1=mysql_fetch_array($sql1)){
            mysql_query("INSERT INTO rule_variabel (`id`, `variabel`, `nilai_variabel`) VALUES
            ('', '$data[variable_name]', '$data1[variable_value_name]')");
        }
    }

}

function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}

// ================ FUNGSI PERHITUNGAN C45 =================
function perhitunganC45($variabel, $nilai_variabel) 
{
    if (empty($variabel) AND empty($nilai_variabel)) {
//#2# Jika variabel yg diinputkan kosong, maka lakukan perhitungan awal
        $kondisiVariabel = ""; // set kondisi variabel kosong
        $kondisiVariabelDynamic = ""; 
    } else if (!empty($variabel) AND !empty($nilai_variabel)) { 
        // jika variabel tdk kosong, maka select kondisi variabel dari DB
        $sqlKondisiVariabel = mysql_query("SELECT kondisi_variabel, dynamic_variable FROM pohon_keputusan WHERE variabel = '$variabel' AND nilai_variabel = '$nilai_variabel' order by id DESC LIMIT 1");
        $rowKondisiVariabel = mysql_fetch_array($sqlKondisiVariabel);
        $kondisiVariabel = str_replace("~", "'", $rowKondisiVariabel['kondisi_variabel']); // replace string ~ menjadi '
        $kondisiVariabelDynamic = str_replace("~", "'", $rowKondisiVariabel['dynamic_variable']); // replace string ~ menjadi '
        $kondisiVariabelDynamics = $rowKondisiVariabel['dynamic_variable']; // replace string ~ menjadi '
    } 
    

    // ambil seluruh variabel
    $sqlVariabel = mysql_query("SELECT distinct variabel FROM rule_variabel");
    // SCR_1
    while($rowGetVariabel = mysql_fetch_array($sqlVariabel)) {
        $getVariabel = $rowGetVariabel['variabel'];
                
        $explode = explode("OR",$kondisiVariabelDynamic);
        
        foreach ($explode as $jum_having =>$value)
        {
        $having = "$jum_having";
        }

        if ($getVariabel === 'kelancaran') { 
//#3# Jika variabel = kelancaran, maka hitung jumlah kasus kelancaran, jumlah kasus Ya dan jumlah kasus Tidak
            // hitung jumlah kasus kelancaran


                // $sql=mysql_query("SELECT * FROM pohon_keputusan");
                // while ($data=mysql_fetch_array($sql)){
                //     $rule = $data['dynamic_variable'];
                //     $kvs = str_replace("~", "'", $rule); // replace string ~ menjadi '
                   
                // }
            
            if ($kondisiVariabelDynamic=="") {
                    //hitung jumlah kasus Total
                $sql = "SELECT COUNT(distinct n.id_nasabah) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null";
                    $sqlJumlahKasusTotalDynamic = mysql_query("SELECT COUNT(distinct n.id_nasabah) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null");
                    $sqlJumlahKasusYaDynamic = mysql_query("SELECT COUNT(distinct n.id_nasabah) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE n.kelancaran = 'Ya' AND nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null");
                    $sqlJumlahKasusTidakDynamic = mysql_query("SELECT COUNT(distinct n.id_nasabah) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE n.kelancaran = 'Tidak' AND nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null");
                    // hitung jumlah kasus Ya
            } else {
                if ($having==0 OR $having==null) {

                    $kondisiVariabelDynamicAfter = "$kondisiVariabelDynamic";
                $sql = "SELECT COUNT(*) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiVariabelDynamicAfter";
                    $sqlJumlahKasusTotalDynamic = mysql_query("SELECT COUNT(*) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiVariabelDynamicAfter");
                    $sqlJumlahKasusYaDynamic = mysql_query("SELECT COUNT(*) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE n.kelancaran = 'Ya' AND nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiVariabelDynamicAfter");
                    $sqlJumlahKasusTidakDynamic = mysql_query("SELECT COUNT(*) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE n.kelancaran = 'Tidak' AND nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiVariabelDynamicAfter");
                } else {
                $sql = "z";
                    $syarat = "group by n.id_nasabah having jumlah > $having";
                    $kondisiVariabelDynamicAfter = "($kondisiVariabelDynamic)".$syarat;
                   
                    $sqlJumlahKasusTotalDynamic = mysql_query("SELECT count(*) as jumlah FROM (
                        SELECT COUNT(*) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiVariabelDynamicAfter) as jumlah
                         ");
                    $sqlJumlahKasusYaDynamic = mysql_query("SELECT count(*) as jumlah FROM (
                        SELECT COUNT(*) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE n.kelancaran = 'Ya' AND nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiVariabelDynamicAfter) as jumlah
                         ");
                    $sqlJumlahKasusTidakDynamic = mysql_query("SELECT count(*) as jumlah FROM (
                        SELECT COUNT(*) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE n.kelancaran = 'Tidak' AND nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiVariabelDynamicAfter) as jumlah
                         ");
                }
            }
            //     echo "<script>alert('yes".$having."');</script>";

                    $a ="SELECT count(*) as jumlah FROM data_anggota WHERE kelancaran is not null $kondisiVariabel";
                    $sqlJumlahKasusTotal = mysql_query("SELECT count(*) as jumlah FROM data_anggota WHERE kelancaran is not null $kondisiVariabel");

                    $sqlJumlahKasusYa = mysql_query("SELECT COUNT(*) as jumlah FROM data_anggota WHERE kelancaran = 'Ya' AND kelancaran is not null $kondisiVariabel");

                    // hitung jumlah kasus Tidak
                    $sqlJumlahKasusTidak = mysql_query("SELECT COUNT(*) as jumlah FROM data_anggota WHERE kelancaran = 'Tidak' AND kelancaran is not null $kondisiVariabel");

            // $sqlJumlahKasusTotalDynamic = mysql_query("SELECT COUNT($count) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiVariabelDynamicAfter");


            $rowJumlahKasusTotal = mysql_fetch_array($sqlJumlahKasusTotal);
            $rowJumlahKasusTotalDynamic = mysql_fetch_array($sqlJumlahKasusTotalDynamic);
            $getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah'];
            $getJumlahKasusTotalDynamic = $rowJumlahKasusTotalDynamic['jumlah'];
            
            // $q = $having."/".$kondisiVariabelDynamics;

            $rowJumlahKasusYa = mysql_fetch_array($sqlJumlahKasusYa);
            $rowJumlahKasusYaDynamic = mysql_fetch_array($sqlJumlahKasusYaDynamic);
            $getJumlahKasusYa = $rowJumlahKasusYa['jumlah'];
            $getJumlahKasusYaDynamic = $rowJumlahKasusYaDynamic['jumlah'];

            $rowJumlahKasusTidak = mysql_fetch_array($sqlJumlahKasusTidak);
            $rowJumlahKasusTidakDynamic = mysql_fetch_array($sqlJumlahKasusTidakDynamic);
            $getJumlahKasusTidak = $rowJumlahKasusTidak['jumlah'];
            $getJumlahKasusTidakDynamic = $rowJumlahKasusTidakDynamic['jumlah'];

            // $q = $getJumlahKasusTotal.":".$getJumlahKasusTotalDynamic." / ";
            // $q .= $getJumlahKasusYa.":".$getJumlahKasusYaDynamic." / ";
            // $q .= $getJumlahKasusTidak.":".$getJumlahKasusTidakDynamic;
            // debug_to_console("$q");

            // die();

//#4# Insert jumlah kasus kelancaran, jumlah kasus Ya dan jumlah kasus Tidak ke DB
            // insert ke database perhitungan_c45
            mysql_query("INSERT INTO perhitungan_c45 VALUES ('', 'Total', 'Total', '$getJumlahKasusTotalDynamic', '$getJumlahKasusTidakDynamic', '$getJumlahKasusYaDynamic', '', '', '', '', '', '')");

        } else {
//#5# Jika variabel != kelancaran (variabel lainnya), maka hitung jumlah kasus kelancaran, jumlah kasus Ya dan jumlah kasus Tidak masing2 variabel
            // // ambil nilai variabel
            // echo "- x - ".$getVariabel;
            $sqlNilaiVariabel = mysql_query("SELECT nilai_variabel FROM rule_variabel WHERE variabel = '$getVariabel' ORDER BY id");
            while($rowNilaiVariabel = mysql_fetch_array($sqlNilaiVariabel)) {
                $getNilaiVariabel = $rowNilaiVariabel['nilai_variabel'];

                // set kondisi dimana nilai_variabel = berdasakan masing2 variabel dan status data = data training
                
                $kondisi1 = "$getVariabel = '$getNilaiVariabel'";
                $kondisi1Dynamic = "(v.variable_name = '$getVariabel' AND vv.variable_value_name = '$getNilaiVariabel')";

                if ($kondisiVariabelDynamic=="") {
                    $kondisi2 = " $kondisiVariabel";
                    $kondisi2Dynamic = "$kondisiVariabelDynamic";
                } else {
                    $kondisi2 = " $kondisiVariabel";
                    $kondisi2Dynamic = " OR $kondisiVariabelDynamic";
                }

                $kondisigabungan = $kondisi1.$kondisi2;
                $kondisigabunganDynamic = $kondisi1Dynamic.$kondisi2Dynamic;

                $kondisi = "$kondisigabungan";
                $kondisiDynamic = "$kondisigabunganDynamic";

//===============================================================================================================================================================================================================================================================================================================================================================

            if ($kondisiVariabelDynamic=="") {
                    //hitung jumlah kasus Total
                    $sql = "SELECT COUNT(distinct n.id_nasabah) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiDynamic";
                    $sqlJumlahKasusTotalVariabelDynamic = mysql_query("SELECT COUNT(distinct n.id_nasabah) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiDynamic");
                    $sqlJumlahKasusYaVariabelDynamic = mysql_query("SELECT COUNT(distinct n.id_nasabah) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE n.kelancaran = 'Ya' AND nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiDynamic");
                    $sqlJumlahKasusTidakVariabelDynamic = mysql_query("SELECT COUNT(distinct n.id_nasabah) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE n.kelancaran = 'Tidak' AND nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiDynamic");
            } else {
                    $havings = $having+1;
                    $syarat = "group by n.id_nasabah having jumlah > $havings";
                    $kondisiVariabelDynamicAfter = "($kondisiDynamic)".$syarat;
                    $sql = "SELECT COUNT(*) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiVariabelDynamicAfter";
                    $sqlJumlahKasusTotalVariabelDynamic = mysql_query("SELECT count(*) as jumlah FROM (
                        SELECT COUNT(*) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiVariabelDynamicAfter) as jumlah
                         ");
                    $sqlJumlahKasusYaVariabelDynamic = mysql_query("SELECT count(*) as jumlah FROM (
                        SELECT COUNT(*) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE  n.kelancaran = 'Ya' AND nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiVariabelDynamicAfter) as jumlah
                         ");
                    $sqlJumlahKasusTidakVariabelDynamic = mysql_query("SELECT count(*) as jumlah FROM (
                        SELECT COUNT(*) as jumlah FROM nasabah n JOIN nasabah_variable nv ON n.id_nasabah = nv.id_nasabah JOIN variable v ON v.id_variable = nv.id_variable JOIN variable_value vv ON v.id_variable = vv.id_variable WHERE  n.kelancaran = 'Tidak' AND nv.id_variable_value = vv.id_variable_value AND n.kelancaran is not null AND $kondisiVariabelDynamicAfter) as jumlah
                         ");
            }
                // hitung jumlah kasus per variabel
                $sql1 = "SELECT COUNT(*) as jumlah FROM data_anggota WHERE kelancaran is not null AND $kondisi";
                $sqlJumlahKasusTotalVariabel = mysql_query("SELECT COUNT(*) as jumlah FROM data_anggota WHERE kelancaran is not null AND $kondisi");

                // hitung jumlah kasus Ya
                $sqlJumlahKasusYaVariabel = mysql_query("SELECT COUNT(*) as jumlah FROM data_anggota WHERE $kondisi AND kelancaran = 'Ya'");
                // hitung jumlah kasus Tidak
                $sqlJumlahKasusTidakVariabel = mysql_query("SELECT COUNT(*) as jumlah FROM data_anggota WHERE $kondisi AND kelancaran = 'Tidak'");
//===============================================================================================================================================================================================================================================================================================================================================================

                // hitung jumlah kasus per variabel
                $rowJumlahKasusTotalVariabel = mysql_fetch_array($sqlJumlahKasusTotalVariabel);
                $rowJumlahKasusTotalVariabelDynamic = mysql_fetch_array($sqlJumlahKasusTotalVariabelDynamic);
                echo "- 1 - ".$getJumlahKasusTotalVariabel = $rowJumlahKasusTotalVariabel['jumlah'];
                echo "- 1 - ".$getJumlahKasusTotalVariabelDynamic = $rowJumlahKasusTotalVariabelDynamic['jumlah'];

                // hitung jumlah kasus Ya
                $rowJumlahKasusYaVariabel = mysql_fetch_array($sqlJumlahKasusYaVariabel);
                $rowJumlahKasusYaVariabelDynamic = mysql_fetch_array($sqlJumlahKasusYaVariabelDynamic);
                echo "- 1 - ".$getJumlahKasusYaVariabel = $rowJumlahKasusYaVariabel['jumlah'];
                echo "- 1 - ".$getJumlahKasusYaVariabelDynamic = $rowJumlahKasusYaVariabelDynamic['jumlah'];

                // hitung jumlah kasus Tidak
                $rowJumlahKasusTidakVariabel = mysql_fetch_array($sqlJumlahKasusTidakVariabel);
                $rowJumlahKasusTidakVariabelDynamic = mysql_fetch_array($sqlJumlahKasusTidakVariabelDynamic);
                echo "- 1 - ".$getJumlahKasusTidakVariabel = $rowJumlahKasusTidakVariabel['jumlah'];
                echo "- 1 - ".$getJumlahKasusTidakVariabelDynamic = $rowJumlahKasusTidakVariabelDynamic['jumlah'];

            // $x = str_replace("'", "~", $sql1); 
            // $y = str_replace("'", "~", $sql);
            // $xs = str_replace("'", "~", $kondisi); 
            // $ys = str_replace("'", "~", $kondisiDynamic); 
            // $xy = $getJumlahKasusTotalVariabel.":".$getJumlahKasusTotalVariabelDynamic." / ".$x." / ".$y; 
            // $q =  $getJumlahKasusTotal.":".$getJumlahKasusTotalDynamic;
            // $qu =  $getJumlahKasusTotal.":".$getJumlahKasusTotalDynamic."/".$y;
            // // $q = ">";
            // debug_to_console("$xy");

//===============================================================================================================================================================================================================================================================================================================================================================

//#6# Insert jumlah kasus kelancaran, jumlah kasus Ya dan jumlah kasus Tidak masing2 variabel ke DB
                // insert ke database perhitungan_c45
                mysql_query("INSERT INTO perhitungan_c45 VALUES ('', '$getVariabel', '$getNilaiVariabel', '$getJumlahKasusTotalVariabelDynamic', '$getJumlahKasusTidakVariabelDynamic', '$getJumlahKasusYaVariabelDynamic', '', '', '', '', '', '')");
        
          
//#7# Lakukan perhitungan entropy
                // perhitungan entropy
                $sqlEntropy = mysql_query("SELECT id, jml_kasus_kelancaran, jml_kasus_ya, jml_kasus_tidak FROM perhitungan_c45");
                while($rowEntropy = mysql_fetch_array($sqlEntropy)) {
                    $getJumlahKasusTotalEntropy = $rowEntropy['jml_kasus_kelancaran'];
                    $getJumlahKasusYaEntropy = $rowEntropy['jml_kasus_ya'];
                    $getJumlahKasusTidakEntropy = $rowEntropy['jml_kasus_tidak'];
                    $idEntropy = $rowEntropy['id'];

                    // jika jml kasus = 0 maka entropy = 0
                    if ($getJumlahKasusTotalEntropy == 0 OR $getJumlahKasusYaEntropy == 0 OR $getJumlahKasusTidakEntropy == 0) {
                        $getEntropy = 0;
                    // jika jml kasus Ya = jml kasus Tidak, maka entropy = 1
                    } else if ($getJumlahKasusYaEntropy == $getJumlahKasusTidakEntropy) {
                        $getEntropy = 1;
                    } else { // jika jml kasus != 0, maka hitung rumus entropy:
                        $perbandingan_ya = $getJumlahKasusYaEntropy / $getJumlahKasusTotalEntropy;
                        $perbandingan_tidak = $getJumlahKasusTidakEntropy / $getJumlahKasusTotalEntropy;

                        $rumusEntropy = (-($perbandingan_ya) * log($perbandingan_ya,2)) + (-($perbandingan_tidak) * log($perbandingan_tidak,2));
                        $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
                    }

//#8# Update nilai entropy
                    // update nilai entropy
                    mysql_query("UPDATE perhitungan_c45 SET entropy = $getEntropy WHERE id = $idEntropy");
                }
                


//#9# Lakukan perhitungan information gain
                // perhitungan information gain
                // ambil nilai entropy dari kelancaran (jumlah kasus kelancaran)
                $sqlJumlahKasusTotalInfGain = mysql_query("SELECT jml_kasus_kelancaran, entropy FROM perhitungan_c45 WHERE variabel = 'Total'");
                $rowJumlahKasusTotalInfGain = mysql_fetch_array($sqlJumlahKasusTotalInfGain);
                $getJumlahKasusTotalInfGain = $rowJumlahKasusTotalInfGain['jml_kasus_kelancaran'];
                // rumus information gain
                $getInfGain = (-(($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain) * ($getEntropy))); 

//#10# Update information gain tiap nilai variabel (temporary)
                // update inf_gain_temp (utk mencari nilai masing2 variabel)
                mysql_query("UPDATE perhitungan_c45 SET inf_gain_temp = $getInfGain WHERE id = $idEntropy");
                $getEntropy = $rowJumlahKasusTotalInfGain['entropy'];

                // jumlahkan masing2 inf_gain_temp variabel 
                $sqlVariabelInfGain = mysql_query("SELECT SUM(inf_gain_temp) as inf_gain FROM perhitungan_c45 WHERE variabel = '$getVariabel'");
                while ($rowVariabelInfGain = mysql_fetch_array($sqlVariabelInfGain)) {
                    $getVariabelInfGain = $rowVariabelInfGain['inf_gain'];

                    // hitung inf gain
                    $getInfGainFix = round(($getEntropy + $getVariabelInfGain),4);

//#11# Looping perhitungan information gain, sehingga mendapatkan information gain tiap variabel. Update information gain
                    // update inf_gain (fix)
                    mysql_query("UPDATE perhitungan_c45 SET inf_gain = $getInfGainFix WHERE variabel = '$getVariabel'");
                }

                //ATMBAHAN//

//#12# Lakukan perhitungan split info
                // rumus split info
                $getSplitInfo = (($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain) * (log(($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain),2)));
                
//#13# Update split info tiap nilai variabel (temporary)
                // update split_info_temp (utk mencari nilai masing2 variabel)
                mysql_query("UPDATE perhitungan_c45 SET split_info_temp = $getSplitInfo WHERE id = $idEntropy");
                
                // jumlahkan masing2 split_info_temp dari tiap variabel 
                $sqlvariabelSplitInfo = mysql_query("SELECT SUM(split_info_temp) as split_info FROM perhitungan_c45 WHERE variabel = '$getVariabel'");
                while ($rowvariabelSplitInfo = mysql_fetch_array($sqlvariabelSplitInfo)){
                    $getvariabelSplitInfo = $rowvariabelSplitInfo['split_info'];

                    // split info fix (4 angka di belakang koma)
                    $getSplitInfoFix = -(round($getvariabelSplitInfo,4));

//#14# Looping perhitungan split info, sehingga mendapatkan information gain tiap variabel. Update information gain
                    // update split info (fix)
                    mysql_query("UPDATE perhitungan_c45 SET split_info = $getSplitInfoFix WHERE variabel = '$getVariabel'");
                }
                //ATMBAHAN//
                
            }

            //TAMBAHAN//

            
//#15# Lakukan perhitungan gain ratio
            $sqlGainRatio = mysql_query("SELECT id, inf_gain, split_info FROM perhitungan_c45");
            while($rowGainRatio = mysql_fetch_array($sqlGainRatio)) {
                $idGainRatio = $rowGainRatio['id'];
                // jika nilai inf gain == 0 dan split info == 0, maka gain ratio = 0
                if ($rowGainRatio['inf_gain'] == 0 AND $rowGainRatio['split_info'] == 0){
                    $getGainRatio = 0;
                } else {
                    // rumus gain ratio
                    $getGainRatio = round(($rowGainRatio['inf_gain'] / $rowGainRatio['split_info']),4);
                }
                
//#16# Update gain ratio dari setiap variabel
                mysql_query("UPDATE perhitungan_c45 SET gain_ratio = $getGainRatio WHERE id = '$idGainRatio'");
            }
            //TAMBAHAN//
            
        }
    }
            // echo "[".$getInfGainFix;
            // echo "][".$getVariabel;
            // echo "][".$getGainRatio;
            // echo "][".$idGainRatio;
            // echo "]";die;
}

//#17# Insert variabel dgn information gain max ke DB pohon keputusan
function insertVariabelPohonKeputusan($variabel, $nilai_variabel)
{
    // ambil nilai inf gain tertinggi dimana hanya 1 variabel saja yg dipilih
    $sqlInfGainMaxTemp = mysql_query("SELECT distinct variabel, gain_ratio FROM perhitungan_c45 WHERE gain_ratio in (SELECT max(gain_ratio) FROM `perhitungan_c45`) LIMIT 1");
    $rowInfGainMaxTemp = mysql_fetch_array($sqlInfGainMaxTemp);
    // hanya ambil variabel dimana jumlah kasus kelancarannya tidak kosong

    if ($rowInfGainMaxTemp['gain_ratio'] > 0) {
        // ambil nilai variabel yang memiliki nilai inf gain max
        $sqlInfGainMax = mysql_query("SELECT * FROM perhitungan_c45 WHERE variabel = '$rowInfGainMaxTemp[variabel]'");
        while($rowInfGainMax = mysql_fetch_array($sqlInfGainMax)) {
            if ($rowInfGainMax['jml_kasus_ya'] == 0 AND $rowInfGainMax['jml_kasus_tidak'] == 0) {
                $kelancaran = 'Null'; // jika jml_kasus_ya = 0 dan jml_kasus_tidak = 0, maka kelancaran Null
            } else if ($rowInfGainMax['jml_kasus_ya'] !== 0 AND $rowInfGainMax['jml_kasus_tidak'] == 0) {
                $kelancaran = 'Ya'; // jika jml_kasus_ya != 0 dan jml_kasus_tidak = 0, maka kelancaran Ya
            } else if ($rowInfGainMax['jml_kasus_ya'] == 0 AND $rowInfGainMax['jml_kasus_tidak'] !== 0) {
                $kelancaran = 'Tidak'; // jika jml_kasus_ya = 0 dan jml_kasus_tidak != 0, maka kelancaran Tidak
            } else {
                $kelancaran = '?'; // jika jml_kasus_ya != 0 dan jml_kasus_tidak != 0, maka kelancaran ?
            }
            
            if (empty($variabel) AND empty($nilai_variabel)) {
//#18# Jika variabel yang diinput kosong (variabel awal) maka insert ke pohon kelancaran id_parent = 0
                // set kondisi variabel = AND variabel = nilai variabel
                $kondisiVariabel = "AND $rowInfGainMax[variabel] = ~$rowInfGainMax[nilai_variabel]~";
                $kondisiDynamicVariabel = "(v.variable_name = ~$rowInfGainMax[variabel]~ AND vv.variable_value_name = ~$rowInfGainMax[nilai_variabel]~)";
                // insert ke tabel pohon kelancaran
                mysql_query("INSERT INTO pohon_keputusan VALUES ('', '$rowInfGainMax[variabel]', '$rowInfGainMax[nilai_variabel]', 0, '$rowInfGainMax[jml_kasus_tidak]', '$rowInfGainMax[jml_kasus_ya]', '$kelancaran', 'Belum', '$kondisiVariabel', '$kondisiDynamicVariabel', 'Belum')");
            }

//#19# Jika variabel yang diinput tidak kosong maka insert ke pohon keputusan dimana id_parent diambil dari tabel pohon keputusan sebelumnya (where variabel = variabel yang diinput)
            else if (!empty($variabel) AND !empty($nilai_variabel)) {
                $sqlIdParent = mysql_query("SELECT id, variabel, nilai_variabel, jml_kasus_ya, jml_kasus_tidak FROM pohon_keputusan WHERE variabel = '$variabel' AND nilai_variabel = '$nilai_variabel' order by id DESC LIMIT 1");
                $rowIdParent = mysql_fetch_array($sqlIdParent);
                    // insert ke tabel pohon keputusan
                    mysql_query("INSERT INTO pohon_keputusan VALUES ('', '$rowInfGainMax[variabel]', '$rowInfGainMax[nilai_variabel]', $rowIdParent[id], '$rowInfGainMax[jml_kasus_tidak]', '$rowInfGainMax[jml_kasus_ya]', '$kelancaran', 'Belum', '', 'y', 'Belum')");
                    
                    //#PRE PRUNING#
                    // hitung Pessimistic error rate parent dan child 
                    $perhitunganParentPrePruning = loopingPerhitunganPrePruning($rowIdParent['jml_kasus_ya'], $rowIdParent['jml_kasus_tidak']);
                    $perhitunganChildPrePruning = loopingPerhitunganPrePruning($rowInfGainMax['jml_kasus_ya'], $rowInfGainMax['jml_kasus_tidak']);
                    
                    // hitung average Pessimistic error rate child 
                    $perhitunganPessimisticChild = (($rowInfGainMax['jml_kasus_ya'] + $rowInfGainMax['jml_kasus_tidak']) / ($rowIdParent['jml_kasus_ya'] + $rowIdParent['jml_kasus_tidak'])) * $perhitunganChildPrePruning;
                    // Increment average Pessimistic error rate child
                    $perhitunganPessimisticChildIncrement += $perhitunganPessimisticChild;
                    $perhitunganPessimisticChildIncrement = round($perhitunganPessimisticChildIncrement, 4);
                    
                    // jika error rate pada child lebih besar dari error rate parent
                    if ($perhitunganPessimisticChildIncrement >= $perhitunganParentPrePruning) {
                        // hapus child (child tidak diinginkan)
                        mysql_query("DELETE FROM pohon_keputusan WHERE id_parent = $rowIdParent[id]");
                        
                        // jika jml kasus Ya lbh besar, maka keputusan == Ya
                        if ($rowIdParent['jml_kasus_ya'] > $rowIdParent['jml_kasus_tidak']) {
                            $kelancaranPrePruning = 'Ya';
                        // jika jml tdk kasus Ya lbh besar, maka keputusan == Tidak
                        } else if ($rowIdParent['jml_kasus_ya'] < $rowIdParent['jml_kasus_tidak']) {
                            $kelancaranPrePruning = 'Tidak';
                        } 
                        // update keputusan parent
                        mysql_query("UPDATE pohon_keputusan SET kelancaran = '$kelancaranPrePruning' where id = $rowIdParent[id]");
                    }
                
            }
        }
    }
    loopingKondisiVariabel();
}

//#20# Lakukan looping kondisi variabel untuk diproses pada fungsi perhitunganC45()
function loopingKondisiVariabel() 
{
    // ambil semua id dan kondisi variabel
    $sqlLoopingKondisi = mysql_query("SELECT id, kondisi_variabel, dynamic_variable FROM pohon_keputusan");
    while($rowLoopingKondisi = mysql_fetch_array($sqlLoopingKondisi)) {
        // select semua data dimana id_parent = id awal
        $sqlUpdateKondisi = mysql_query("SELECT * FROM pohon_keputusan WHERE id_parent = $rowLoopingKondisi[id] AND looping_kondisi = 'Belum'");
        while($rowUpdateKondisi = mysql_fetch_array($sqlUpdateKondisi)) {
            // set kondisi: kondisi sebelumnya yg diselect berdasarkan id_parent ditambah 'AND variabel = nilai variabel'
            $kondisiVariabel = "$rowLoopingKondisi[kondisi_variabel] AND $rowUpdateKondisi[variabel] = ~$rowUpdateKondisi[nilai_variabel]~";
            $kondisiDynamicVariabel = "$rowLoopingKondisi[dynamic_variable] OR ( v.variable_name = ~$rowUpdateKondisi[variabel]~ AND vv.variable_value_name = ~$rowUpdateKondisi[nilai_variabel]~)";
            // update kondisi variabel
            mysql_query("UPDATE pohon_keputusan SET kondisi_variabel = '$kondisiVariabel', dynamic_variable = '$kondisiDynamicVariabel', looping_kondisi = 'Sudah' WHERE id = $rowUpdateKondisi[id]");
        }
    }
    insertIterasi();
}


//#21# Insert iterasi nilai perhitungan ke DB
function insertIterasi()
{
    $sqlInfGainMaxIterasi = mysql_query("SELECT distinct variabel, gain_ratio FROM perhitungan_c45 WHERE gain_ratio in (SELECT max(gain_ratio) FROM `perhitungan_c45`) LIMIT 1");
    $rowInfGainMaxIterasi = mysql_fetch_array($sqlInfGainMaxIterasi);
    // hanya ambil variabel dimana jumlah kasus totalnya tidak kosong
    if ($rowInfGainMaxIterasi['gain_ratio'] > 0) {
        $kondisivariabel = "$rowInfGainMaxIterasi[variabel]";
        $iterasiKe = 1;
        $sqlInsertIterasiC45 = mysql_query("SELECT * FROM perhitungan_c45");
        while($rowInsertIterasiC45 = mysql_fetch_array($sqlInsertIterasiC45)) {
            // insert ke tabel iterasi
            mysql_query("INSERT INTO iterasi_c45 VALUES ('', $iterasiKe, '$kondisivariabel', '$rowInsertIterasiC45[variabel]', '$rowInsertIterasiC45[nilai_variabel]', '$rowInsertIterasiC45[jml_kasus_kelancaran]', '$rowInsertIterasiC45[jml_kasus_ya]', '$rowInsertIterasiC45[jml_kasus_tidak]', '$rowInsertIterasiC45[entropy]', '$rowInsertIterasiC45[inf_gain]', '$rowInsertIterasiC45[split_info]', '$rowInsertIterasiC45[gain_ratio]')");
            $iterasiKe++;
        }
    }
}

//#22# Ambil information gain max untuk diproses pada fungsi loopingMiningC45()
function getInfGainMax($variabel, $nilai_variabel)
{
    // select inf gain max
    $sqlInfGainMaxVariabel = mysql_query("SELECT distinct variabel FROM perhitungan_c45 WHERE gain_ratio in (SELECT max(gain_ratio) FROM `perhitungan_c45`) LIMIT 1");
    while($rowInfGainMaxVariabel = mysql_fetch_array($sqlInfGainMaxVariabel)) {
        $inf_gain_max_variabel = "$rowInfGainMaxVariabel[variabel]";
        if (empty($variabel) AND empty($nilai_variabel)) {
            // jika variabel kosong, proses variabel dgn inf gain max pada fungsi loopingMiningC45()
            loopingMiningC45($inf_gain_max_variabel);
        } else if (!empty($variabel) AND !empty($nilai_variabel)) {
            // jika variabel tdk kosong, maka update diproses = sudah pada tabel pohon_keputusan_c45
            mysql_query("UPDATE pohon_keputusan SET diproses = 'Sudah' WHERE variabel = '$variabel' AND nilai_variabel = '$nilai_variabel'");
            // proses variabel dgn inf gain max pada fungsi loopingMiningC45()
            loopingMiningC45($inf_gain_max_variabel);
        }
    }
}

//#23# Looping proses perhitungan dimana variabel dgn information gain max yang akan diproses pada fungsi perhitunganC45()
function loopingMiningC45($inf_gain_max_variabel) 
{
    $sqlBelumAdaKeputusanLagi = mysql_query("SELECT * FROM pohon_keputusan WHERE kelancaran = '?' and diproses = 'Belum' AND variabel = '$inf_gain_max_variabel'");
    while($rowBelumAdaKeputusanLagi = mysql_fetch_array($sqlBelumAdaKeputusanLagi)) {
        if ($rowBelumAdaKeputusanLagi['id_parent'] == 0) {
            populateVariabel();
        }
        $variabel = "$rowBelumAdaKeputusanLagi[variabel]";
        $nilai_variabel = "$rowBelumAdaKeputusanLagi[nilai_variabel]";

        $kondisiVariabel = "AND $variabel = \'$nilai_variabel\'";
        mysql_query("TRUNCATE perhitungan_c45");
        mysql_query("DELETE FROM rule_variabel WHERE variabel = '$inf_gain_max_variabel'");
        miningC45($variabel, $nilai_variabel);
    }
}

// rumus menghitung Pessimistic error rate
function perhitunganPrePruning($r, $z, $n)
{
    $rumus = ($r + (($z * $z) / (2 * $n)) + ($z * (sqrt(($r / $n) - (($r * $r) / $n) + (($z * $z) / (4 * ($n * $n))))))) / (1 + (($z * $z) / $n));
    $rumus = round($rumus, 4);
    return $rumus;
}

// looping perhitungan Pessimistic error rate
function loopingPerhitunganPrePruning($positif, $negatif)
{
    $z = 1.645; // z = batas kepercayaan (confidence treshold)
    $n = $positif + $negatif; // n = kelancaran jml kasus
    $n = round($n, 4);
    // r = perbandingan child thd parent
    if ($positif < $negatif) {
        $r = $positif / ($n);
        $r = round($r, 4);
        return perhitunganPrePruning($r, $z, $n);
    } elseif ($positif > $negatif) {
        $r = $negatif / ($n);
        $r = round($r, 4);
        return perhitunganPrePruning($r, $z, $n);
    } elseif ($positif == $negatif) {
        $r = $negatif / ($n);
        $r = round($r, 4);
        return perhitunganPrePruning($r, $z, $n);
    }
}

// update keputusan jika ada keputusan yg Null dan ?
function updateKeputusanUnknown()
{
    $sqlReplaceNull = mysql_query("SELECT id, id_parent FROM pohon_keputusan WHERE kelancaran = 'Null'");
    while($rowReplaceNull = mysql_fetch_array($sqlReplaceNull)) {
        $sqlReplaceNullIdParent = mysql_query("SELECT jml_kasus_ya, jml_kasus_tidak, kelancaran FROM pohon_keputusan WHERE id = $rowReplaceNull[id_parent]");
        $rowReplaceNullIdParent = mysql_fetch_array($sqlReplaceNullIdParent);
        if ($rowReplaceNullIdParent['jml_kasus_ya'] > $rowReplaceNullIdParent['jml_kasus_tidak']) {
            $kelancaranNull = 'Ya'; // jika jml_kasus_ya != 0 dan jml_kasus_tidak = 0, maka keputusan Ya
        } else if ($rowReplaceNullIdParent['jml_kasus_ya'] < $rowReplaceNullIdParent['jml_kasus_tidak']) {
            $kelancaranNull = 'Tidak'; // jika jml_kasus_ya = 0 dan jml_kasus_tidak != 0, maka keputusan Tidak
        }
        mysql_query("UPDATE pohon_keputusan SET kelancaran = '$kelancaranNull' WHERE id = $rowReplaceNull[id]");
    }

    $sqlReplaceUnknown = mysql_query("SELECT id, id_parent FROM pohon_keputusan WHERE kelancaran = '?' and id not in (select id_parent from pohon_keputusan)");
    while($rowReplaceUnknown = mysql_fetch_array($sqlReplaceUnknown)) {
        $sqlReplaceUnknownIdParent = mysql_query("SELECT jml_kasus_tidak, jml_kasus_ya FROM pohon_keputusan WHERE id = $rowReplaceUnknown[id_parent]");
        $rowReplaceUnknownIdParent = mysql_fetch_array($sqlReplaceUnknownIdParent);
        if ($rowReplaceUnknownIdParent['jml_kasus_ya'] > $rowReplaceUnknownIdParent['jml_kasus_tidak']) {
            $kelancaranUnknown = 'Ya'; // jika jml_kasus_ya != 0 dan jml_kasus_tidak = 0, maka keputusan Ya
        } else if ($rowReplaceUnknownIdParent['jml_kasus_ya'] < $rowReplaceUnknownIdParent['jml_kasus_tidak']) {
            $kelancaranUnknown = 'Tidak'; // jika jml_kasus_ya = 0 dan jml_kasus_tidak != 0, maka keputusan Tidak
        }
        mysql_query("UPDATE pohon_keputusan SET kelancaran = '$kelancaranUnknown' WHERE id = $rowReplaceUnknown[id]");
    }
}

function generateRuleAwal($idparent, $spasi)
{
    // ambil data pohon keputusan
    $sqlGetIdParent = mysql_query("select * from pohon_keputusan where id_parent='$idparent'");
    while($rowGetIdParent = mysql_fetch_array($sqlGetIdParent)){
        if (!empty($rowGetIdParent)) {
            // ambil data pohon keputusan dimana id = idparent
            $sqlGetId = mysql_query("select * from pohon_keputusan where id='$rowGetIdParent[id_parent]'");
            $rowGetId = mysql_fetch_array($sqlGetId);
            // jika variabel dan nilai variabel masih kosong
            if (empty($rowGetId['variabel']) AND empty($rowGetId['nilai_variabel'])){
                // insert pada db rule_c45
                mysql_query("insert into rule_pohon_keputusan values ('', '$rowGetIdParent[id_parent]', '$rowGetIdParent[variabel] == $rowGetIdParent[nilai_variabel]', '$rowGetIdParent[kelancaran]')");
            } else {
                // insert pada db rule_c45
                mysql_query("insert into rule_pohon_keputusan values ('', '$rowGetIdParent[id_parent]', '$rowGetId[variabel] == $rowGetId[nilai_variabel] AND $rowGetIdParent[variabel] == $rowGetIdParent[nilai_variabel]', '$rowGetIdParent[kelancaran]')");
            }
            // looping dirinya sendiri
            generateRuleAwal($rowGetIdParent['id'], $spasi + 1);
        }
    }
}

function generateRuleLooping()
{
    // ambil data rule
    $sqlGetDataRule = mysql_query("select * from rule_pohon_keputusan order by id");
    while($rowGetDataRule=mysql_fetch_array($sqlGetDataRule)){
        if (!empty($rowGetDataRule)) {
            // ambil idparent rule dimana id = idparent
            $sqlGetIdParentUpdateRule = mysql_query("select id_parent from pohon_keputusan where id = '$rowGetDataRule[id_parent]'");
            $rowGetIdParentUpdateRule=mysql_fetch_array($sqlGetIdParentUpdateRule);
            
            $sqlGetIdUpdateRule = mysql_query("select * from pohon_keputusan where id = '$rowGetIdParentUpdateRule[id_parent]'");
            while($rowGetIdUpdateRule=mysql_fetch_array($sqlGetIdUpdateRule)){
                // bentuk rule
                $rule = "$rowGetIdUpdateRule[variabel] == $rowGetIdUpdateRule[nilai_variabel] AND $rowGetDataRule[rule]";
                // update rule
                mysql_query("update rule_pohon_keputusan set rule = '$rule', id_parent = '$rowGetIdParentUpdateRule[id_parent]' where id = '$rowGetDataRule[id]'");
            }
            
            // ambil data pohon dimana idparent = 0 (root)
            $sqlGetDataPohonKeputusan = mysql_query("select * from pohon_keputusan where id_parent = 0");
            while($rowGetDataPohonKeputusan=mysql_fetch_array($sqlGetDataPohonKeputusan)){
                // jika idparent rule == id pohon
                if ($rowGetDataRule['id_parent'] == $rowGetDataPohonKeputusan['id']){
                    // update rule set id = id rule
                    mysql_query("update rule_pohon_keputusan set id_parent = 0 where id = '$rowGetDataRule[id]'");
                }
            }
        }
    }
}

function generateRuleFinalPrePruning()
{
    // panggil fungsi generateRuleAwal()
    generateRuleAwal("0", 0);
    
    // ambil data rule
    $sqlUpdateRule = mysql_query("select * from rule_pohon_keputusan order by id" );
    while($rowUpdateRule=mysql_fetch_array($sqlUpdateRule)){
        if (!empty($rowUpdateRule)) {
            // jika idparent rule == 0
            if ($rowUpdateRule['id_parent'] !== 0){
                // lakukan fungsi generateRuleLooping()
                generateRuleLooping();
                // delete rule dimana keputusan == ?
                mysql_query("delete from rule_pohon_keputusan where kelancaran = '?'");
            }
        }
    }
}

function insertRuleC45PrePruning()
{
    // ambil data pada db rule_pohon_keputusan
    $sqlRuleC45 = mysql_query("SELECT id, rule, kelancaran FROM rule_pohon_keputusan");
    while($rowRuleC45 = mysql_fetch_array($sqlRuleC45)) {
        $RuleC45 = "$rowRuleC45[rule]";
        // explode string ' AND ' utk mendapatkan variabel
        $explodeRuleC45 = explode(" AND ", $RuleC45);
        foreach ($explodeRuleC45 as $dataExplodeRuleC45) {
            // explode string ' == ' utk mendapatkan nilai variabel
            $dataFixRuleC45 = explode(" == ", $dataExplodeRuleC45);
            // insert into db
            mysql_query("INSERT INTO rule_prediksi VALUES('', $rowRuleC45[id], '$dataFixRuleC45[0]', '$dataFixRuleC45[1]', '$rowRuleC45[kelancaran]', '', 'C45')");
        }
    }
}