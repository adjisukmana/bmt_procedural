<div class="card">
    <div class="card-header">
        <h2>Daftar Variable<small>Dibawah ini daftar variable pada BMT Ihsan Mulia Yogyakarta</small></h2>
        <a href="?p=dynamic_tambah_variable" class="btn bgm-cyan btn-icon waves-effect pull-right waves-effect"><i class="md md-add"></i></a>
    </div>
    <!-- CONTENT -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="my-table">
                <thead>
                  <tr>
                    <th class="dynatable-head">No</th>
                    <th class="dynatable-head">ID</th>
                    <th class="dynatable-head">Nama</th>
                    <th class="dynatable-head">Value</th>
                    <th class="dynatable-head">Opsi</th>
                	</tr>
                </thead>
                <tbody>
                  <?php 
                		$no = 1;
                        $sql=mysql_query("SELECT * FROM variable");
                        while ($data=mysql_fetch_array($sql)){
			               ?>
                  	<tr>
                  		<td><?php echo $no; ?></td>
                  		<td><?php echo $data['id_variable']; ?></td>
                  		<td><?php echo $data['variable_alias']; ?></td>
                          <td>
                              <?php 
                              $sql1=mysql_query("SELECT vv.variable_value_alias as variable_value_alias,
                                                   vv.variable_value_name as variable_value_name 
                                                   FROM variable v 
                                                   JOIN variable_value vv 
                                                   ON v.id_variable = vv.id_variable
                                                   WHERE vv.id_variable = '$data[id_variable]'
                                               ");
                              while ($data1=mysql_fetch_array($sql1)){
                                  echo "<span class='badge'>".$data1['variable_value_alias']."</span> ";
                              } ?>
                          </td>
                          <td>
                          <?php if(null_check('variable_value','id_variable',"$data[id_variable]")>0){; ?>
                              <a href="?p=dynamic_edit_variable&id_variable=<?php echo $data['id_variable']; ?>" class="btn bgm-orange waves-effect"><i class="md md-create"></i></a>
                              <?php } else { ?>
                              <a href="?p=dynamic_tambah_variable&id_variable=<?php echo $data['id_variable']; ?>" class="btn bgm-cyan waves-effect"><i class="md md-add"></i></a>
                              <?php } ?>
                              <a href='./dynamic_aksi.php?module=dynamic_variable&act=delete&id=<?php echo $data['id_variable']; ?>' class="btn btn-danger waves-effect"><i class="md md-close"></i></a>
                          </td>
                      </tr>
                    </tbody>
              	<?php $no++; } ?>
              </table>
      </div> 
    </div> <!-- card-body -->
</div> <!-- card -->

<script>
    $('#my-table').dynatable();
</script>