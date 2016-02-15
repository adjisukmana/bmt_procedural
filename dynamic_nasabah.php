<div class="card">
    <div class="card-header">
        <h2>Daftar Nasabah<small>Dibawah ini daftar nasabah pada BMT Ihsan Mulia Yogyakarta</small></h2>
        <a href="?p=dynamic_tambah_nasabah" class="btn bgm-cyan btn-icon waves-effect pull-right waves-effect"><i class="md md-add"></i></a>
    </div>
    <!-- CONTENT -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped" id="my-table">
                <thead>
                    <tr>
                        <th data-dynatable-column="no" class="dynatable-head">No</th>
                        <th data-dynatable-column="no1" class="dynatable-head">No Anggota</th>
                        <th data-dynatable-column="no2" class="dynatable-head">Nama Anggota</th>
                        <?php 
                        $no = 3;
                            $sql2=mysql_query("SELECT * FROM variable");
                            while ($data2=mysql_fetch_array($sql2)){
                            ?>  
                            <th data-dynatable-column="no <?php echo $no; ?>" class="dynatable-head"><?php echo $data2['variable_alias']; ?></th>
                        <?php $no++; } ?>
                        <th data-dynatable-column="no8" class="dynatable-head">Kelancaran</th>
                        <th data-dynatable-column="no9" class="dynatable-head" width="130px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    $sql=mysql_query("SELECT DISTINCT(n.id_nasabah),
                                             n.id_nasabah as id_nasabah, 
                                             n.nasabah_name as nasabah_name, 
                                             n.kelancaran as kelancaran  
                                             FROM nasabah n 
                                             JOIN nasabah_variable nv 
                                             ON n.id_nasabah = nv.id_nasabah
                                             JOIN variable v 
                                             ON v.id_variable = nv.id_variable
                                             JOIN variable_value vv 
                                             ON v.id_variable = vv.id_variable
                                    ");
                    while ($data=mysql_fetch_array($sql)){
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['id_nasabah']; ?></td>
                    <td><?php echo $data['nasabah_name']; ?></td>
                        <?php 
                        $sql1=mysql_query("SELECT vv.variable_value_alias as variable_value_alias 
                                             FROM nasabah_variable nv 
                                             JOIN variable v 
                                             ON v.id_variable = nv.id_variable
                                             JOIN variable_value vv
                                             ON v.id_variable = vv.id_variable
                                             WHERE nv.id_variable_value = vv.id_variable_value
                                             AND nv.id_nasabah = '$data[id_nasabah]' 
                                             
                                         ");
                        while ($data1=mysql_fetch_array($sql1)){
                        ?>  
                            <td><?php echo $data1['variable_value_alias']; ?></td>
                        <?php } ?>

                    <td>
                      <span class="badge"><?php echo $data['kelancaran']; ?></span>
                    </td>
                    <td>
                        <a href="?p=dynamic_edit_nasabah&id_nasabah=<?php echo $data['id_nasabah']; ?>" class="btn bgm-orange waves-effect"><i class="md md-create"></i></a>
                        <a href='./dynamic_aksi.php?module=data_anggota&act=delete&id_nasabah=<?php echo $data['id_nasabah']; ?>' class="btn btn-danger waves-effect"><i class="md md-close"></i></a>
                    </td>
                </tr>
                <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- body padding -->
</div> <!-- card -->

<script>
    $('#my-table').dynatable();
</script>
