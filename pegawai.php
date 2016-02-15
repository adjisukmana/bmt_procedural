<div class="card">
<div class="m-10">	
  <!-- <a href="" class="pull-right btn bgm-blue btn-icon waves-effect waves-circle waves-float"><i class="md md-add"></i></a> -->
  <div class="clearfix"></div>
</div>
    <div class="card-header">
        <h2>Data Pegawai<small>Berikut ini daftar pegawai BMT Ihsan Mulia.</small></h2>
        <a href="?p=tambah_pegawai" class="btn bgm-cyan btn-icon waves-effect pull-right waves-effect"><i class="md md-add"></i></a>
    </div>
		<div class="table-responsive">
            <table class="table table-hover" id="my-table">
                <thead>
	                <tr>
        						<th data-dynatable-column="no" class="dynatable-head">No</th>
        						<th data-dynatable-column="no1" class="dynatable-head">No Pegawai</th>
                    <th data-dynatable-column="no2" class="dynatable-head">Nama Pegawai</th>
		                <th data-dynatable-column="no3" class="dynatable-head">Status</th>
		                <th data-dynatable-column="no4" class="dynatable-head">Opsi</th>
		            </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
      			    $sql=mysql_query('SELECT * FROM karyawan ORDER BY id_karyawan');
      			    while ($data=mysql_fetch_array($sql)){
                ?>
                <tr>
                   <td><?php echo $no; ?></td>
                   <td><?php echo $data['id_karyawan']; ?></td>
                   <td><?php echo $data['username']; ?></td>
                   <td><?php echo $data['status_karyawan']; ?></td>
                   <td>
                   	<a href="?p=edit_pegawai&id_karyawan=<?php echo $data['id_karyawan']; ?>" class="btn bgm-orange waves-effect"><i class="md md-create"></i></a>
                   	<a href='./aksi.php?module=data_anggota&act=hapus_data_anggota&id_karyawan=<?php echo $data['id'];?>' class="btn btn-danger waves-effect"><i class="md md-close"></i></a>
                   </td>
                </tr>
                <?php $no++; } ?>
                </tbody>
            </table>
        </div>
</div>


<script>
    $('#my-table').dynatable();
</script>