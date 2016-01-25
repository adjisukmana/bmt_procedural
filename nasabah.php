<div class="card">
<div class="m-10">	
  <!-- <a href="" class="pull-right btn bgm-blue btn-icon waves-effect waves-circle waves-float"><i class="md md-add"></i></a> -->
  <div class="clearfix"></div>
</div>
    <div class="card-header">
        <h2>Data Nasabah<small>Berikut ini daftar anggota nasabah.</small></h2>
        <a href="?p=tambah_nasabah" class="btn bgm-cyan btn-icon waves-effect pull-right waves-effect"><i class="md md-add"></i></a>
    </div>
		<div class="table-responsive">
            <table class="table table-hover" id="my-table">
                <thead>
	                <tr>
        						<th data-dynatable-column="no" class="dynatable-head">No</th>
        						<th data-dynatable-column="no1" class="dynatable-head">No Anggota</th>
		                <th data-dynatable-column="no2" class="dynatable-head">Nama Anggota</th>
						        <th data-dynatable-column="no3" class="dynatable-head">Penghasilan</th>
		                <th data-dynatable-column="no4" class="dynatable-head">Status</th>
		                <th data-dynatable-column="no5" class="dynatable-head">Status Rumah</th>
		                <th data-dynatable-column="no6" class="dynatable-head">Pinjaman</th>
        						<th data-dynatable-column="no7" class="dynatable-head">Pekerjaan</th>
        						<th data-dynatable-column="no8" class="dynatable-head">Kelancaran</th>
		                <th data-dynatable-column="no9" class="dynatable-head">Opsi</th>
		            </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
      			    $sql=mysql_query('SELECT * FROM data_anggota ORDER BY id');
      			    while ($data=mysql_fetch_array($sql)){
                ?>
                <tr>
                   <td><?php echo $no; ?></td>
                   <td><?php echo $data['no_anggota']; ?></td>
                   <td><?php echo $data['nama_anggota']; ?></td>
                   <td><?php echo $data['penghasilan']; ?></td>
				            <td><?php echo $data['status']; ?></td>
                   <td><?php echo $data['status_rumah']; ?></td>
                   <td><?php echo $data['pinjaman']; ?></td>
        				   <td><?php echo $data['pekerjaan']; ?></td>
        				   <td>
                      <span class="badge"><?php echo $data['kelancaran']; ?></span>
                   </td>
                   <td>
                   	<a href="?p=edit_nasabah&id=<?php echo $data['id']; ?>" class="btn bgm-orange waves-effect"><i class="md md-create"></i></a>
                   	<a href='./aksi.php?module=data_anggota&act=hapus_data_anggota&id=<?php echo $data['id'];?>' class="btn btn-danger waves-effect"><i class="md md-close"></i></a>
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