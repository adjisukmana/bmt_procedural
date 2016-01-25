<div class="card">
    <div class="card-header">
        <h2>Tabel Perhitungan<small>Tabel Perhitungan Dengan Menggunakan Algoritma C45</small></h2>
    </div>

    <!-- CONTENT -->
    <div class="card-body">
      <table class="table table-bordered" width='100%' border='1' cellspacing='0' cellspading='0'>
           <tr>
               <th>No</th> 
               <th>Att Gain Ratio Max</th>
               <th>Atribut</th>
               <th>Nilai Atribut</th>
               <th>Total Kasus</th>
               <th>Jumlah Ya</th>
               <th>Jumlah Tidak</th>
               <th>Entropy</th>
               <th>Gain</th>
      </tr>
      <?php           
          $sql=mysql_query("SELECT * FROM iterasi_c45");
          while ($data=mysql_fetch_array($sql)){
      ?>
            <tr>
              <td><?php echo $data['iterasi']; ?></td>
              <td><?php echo $data['atribut_gain_ratio_max']; ?></td>
              <td><?php echo $data['atribut']; ?></td>
              <td><?php echo $data['nilai_atribut']; ?></td>
              <td><?php echo $data['jml_kasus_total']; ?></td>
              <td><?php echo $data['jml_laris']; ?></td>
              <td><?php echo $data['jml_tdk_laris']; ?></td>
              <td><?php echo $data['entropy']; ?></td>
              <td><?php echo $data['inf_gain']; ?></td>
            </tr>
            <?php } ?>
    </table>
    </div>

</div>