<?php 
    $sql2=mysql_query("SELECT * FROM nasabah WHERE id_nasabah = '$_GET[id_nasabah]'");
    $data2=mysql_fetch_array($sql2);
?>

<div class="card">
    <div class="card-header">
        <h2>Edit Anggota <small>Silahkan Edit data anggota melalui form dibawah ini.</small></h2>
    </div>

    <!-- CONTENT -->
    <form method=POST action='dynamic_aksi.php?module=data_anggota&act=edit' align='center'>
    <div class="row m-10">
        <div class="col-sm-12"> 
            <div class="pmbb-edit">
                <dl class="dl-horizontal">
                    <dt class="p-t-10">No Anggota</dt>
                    <dd>                  
                        <div class="input-group">
                            <div class="fg-line">
                                <input type="text" class="form-control" placeholder="Masukkan No Anggota ..." name='id_nasabah' value="<?php echo $data2['id_nasabah']; ?>">
                            </div>
                            <span class="input-group-addon"><i class="md md-format-list-numbered"></i></span>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Nama Anggota</dt>
                    <dd>                  
                        <div class="input-group">
                            <div class="fg-line">
                                <input type="text" class="form-control" placeholder="Masukkan Nama Anggota ..." name='nasabah_name' value="<?php echo $data2['nasabah_name']; ?>">
                            </div>
                            <span class="input-group-addon"><i class="md  md-person"></i></span>
                        </div>
                    </dd>
                </dl>

                <?php 
                $sql=mysql_query("SELECT * FROM variable");
                while ($data=mysql_fetch_array($sql)){
                ?>
                <dl class="dl-horizontal">
                    <dt class="p-t-10"><?php echo $data['variable_alias']; ?></dt>
                    <dd>
                        <div class="input-group">
                            <div class="col-sm-12">
                                <div class="fg-line select">    
                                    <select class="form-control" name='penghasilan'>
                                        <option value=''>- Pilih <?php echo $data['variable_alias']; ?> -</option>
                                            
                                            <?php 
                                            $sql1=mysql_query("SELECT * FROM variable_value WHERE id_variable = '$data[id_variable]'");
                                            while ($data1=mysql_fetch_array($sql1)){
                                            ?>        
                                            <option value='<?php echo $data1['variable_value_name']; ?>' 
                                            
                                            <?php 
                                            $sql3=mysql_query("SELECT vv.variable_value_alias as variable_value_alias ,
                                                                vv.id_variable_value as id_variable_value 
                                                                 FROM nasabah_variable nv 
                                                                 JOIN variable v 
                                                                 ON v.id_variable = nv.id_variable
                                                                 JOIN variable_value vv
                                                                 ON v.id_variable = vv.id_variable
                                                                 WHERE nv.id_variable_value = vv.id_variable_value
                                                                 AND nv.id_nasabah = '$data2[id_nasabah]'
                                            ");
                                            while ($data3=mysql_fetch_array($sql3)){
                                                if($data3['id_variable_value']==$data1['id_variable_value']) echo "selected"; 
                                            }
                                            ?>

                                            ><?php echo $data1['variable_value_alias']; ?></option>
                                            <?php } ?>

                                    </select>
                                </div>
                            </div>
                            <span class="input-group-addon"><i class="md md-phone"></i></span>
                        </div>
                    </dd>
                </dl>
                <?php } ?>
                
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Kelancaran</dt>
                    <dd>
                        <div class="input-group">
                            <div class="col-sm-12">
                                <div class="fg-line select">  
                                    <div class="btn-group btn-group-lg radio-button" role="group">
                                        <label class="btn btn-default waves-effect"><input type="radio" name="kelancaran" value="Ya" <?php if($data2['kelancaran']=='Ya') echo 'checked'; ?>><span>Ya</span></label>
                                        <label class="btn btn-default waves-effect"><input type="radio" name="kelancaran" value="Tidak" <?php if($data2['kelancaran']=='Tidak') echo 'checked'; ?>><span>Tidak</span></label>
                                    </div>
                                </div>
                            </div>
                            <span class="input-group-addon"><i class="md md-phone"></i></span>
                        </div>
                    </dd>
                </dl>

                <div class="m-t-30 m-b-30">
                    <button type="submit" class="btn btn-primary btn-icon-text btn-sm pull-right waves-effect"  id="sa-success"><i class="md md-done-all"></i> Simpan</button>
                    <button class="btn btn-default btn-icon-text waves-effect waves-effect pull-left" onclick="history.go(-1);"><i class="md md-arrow-back"></i> Back</button>
                    <button type="reset" class="btn btn-danger btn-icon-text btn-sm pull-right waves-effect m-r-5"><i class="md md-close"></i> Reset</button>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    </form>
</div> <!-- card -->