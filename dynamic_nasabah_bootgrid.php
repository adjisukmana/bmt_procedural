<div class="card">
    <div class="card-header">
        <h2>Daftar Nasabah<small>Dibawah ini daftar nasabah pada BMT Ihsan Mulia Yogyakarta</small></h2>
        <a href="?p=dynamic_tambah_nasabah" class="btn bgm-cyan btn-icon waves-effect pull-right waves-effect"><i class="md md-add"></i></a>
    </div>
    <!-- CONTENT -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="data-table-command" class="table table-striped">
                <thead>
                    <tr>
                        <th data-column-id="No">No</th>
                        <th data-column-id="id">ID</th>
                        <th data-column-id="Nama">Nama</th>
                        <?php 
                        $no = 3;
                            $sql2=mysql_query("SELECT * FROM variable");
                            while ($data2=mysql_fetch_array($sql2)){
                            ?>  
                            <th data-column-id="<?php echo $data2['variable_name']; ?>"><?php echo $data2['variable_alias']; ?></th>
                        <?php $no++; } ?>
                        <th data-column-id="Kelancaran">Kelancaran</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
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
                </tr>
                <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- body padding -->
  
  <button class="delete btn btn-danger waves-effect" data-photo-id=" + row.id + "><i class="md md-close"></i></button>
  <button class="delete btn btn-danger waves-effect" data-photo-id=" + row.id + "><i class="md md-close"></i></button>
  <button class="delete btn btn-danger waves-effect" data-photo-id=" + row.id + "><i class="md md-close"></i></button>
  <button class="delete btn btn-danger waves-effect" data-photo-id=" + row.id + "><i class="md md-close"></i></button>
  <button class="delete btn btn-danger waves-effect" data-photo-id=" + row.id + "><i class="md md-close"></i></button>

</div> <!-- card -->

<!-- Data Table -->
        <script type="text/javascript">
            $(document).ready(function(){
                //Basic Example
                $("#data-table-basic").bootgrid({
                    css: {
                        icon: 'md icon',
                        iconColumns: 'md-view-module',
                        iconDown: 'md-expand-more',
                        iconRefresh: 'md-refresh',
                        iconUp: 'md-expand-less'
                    },
                });
                
                //Selection
                $("#data-table-selection").bootgrid({
                    css: {
                        icon: 'md icon',
                        iconColumns: 'md-view-module',
                        iconDown: 'md-expand-more',
                        iconRefresh: 'md-refresh',
                        iconUp: 'md-expand-less'
                    },
                    selection: true,
                    multiSelect: true,
                    rowSelect: true,
                    keepSelection: true
                });
                
                //Command Buttons
                $("#data-table-command").bootgrid({
                    css: {
                        icon: 'md icon',
                        iconColumns: 'md-view-module',
                        iconDown: 'md-expand-more',
                        iconRefresh: 'md-refresh',
                        iconUp: 'md-expand-less'
                    },
                    formatters: {
                        "commands": function(column, row) {
                            return "<button class=\"delete btn btn-danger waves-effect\" data-photo-id=" + row.id + "><i class=\"md md-close\"></i></button>";
                        }
                    }
                });
            });
        </script>

<script>
    $('#my-table').dynatable();
</script>

  <script>
  $('button.delete').click(function() {
    var photoId = $(this).attr("data-id");
    deletePhoto(photoId);
  });
 
  function deletePhoto(photoId) {
    swal({
      title: "Are you sure?", 
      text: "Are you sure that you want to delete this photo?", 
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, delete it!",
      confirmButtonColor: "#ec6c62"
    }, function() {
      $.ajax({
        url: "./dynamic_aksi.php?module=data_anggota&act=hapus_data_anggota&id_nasabah=" + photoId,
        type: "DELETE"
      })
      .done(function(data) {
        swal("Deleted!", "Your file was successfully deleted!", "success");
      })
      .error(function(data) {
        swal("Oops", "We couldn't connect to the server!", "error");
      });
    });
  }
  </script>