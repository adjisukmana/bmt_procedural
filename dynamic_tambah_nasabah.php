<div class="card">
    <div class="card-header">
        <h2>Tambah Anggota <small>Silahkan isi data anggota melalui form dibawah ini.</small></h2>
    </div>

    <!-- CONTENT -->
    <form method=POST action='dynamic_aksi.php?module=data_anggota&act=input' align='center'>
    <div class="row m-10">
        <div class="col-sm-12"> 
            <div class="pmbb-edit">
                <dl class="dl-horizontal">
                    <dt class="p-t-10">No Anggota</dt>
                    <dd>                  
                        <div class="input-group">
                            <div class="fg-line">
                                <input type="text" class="form-control" placeholder="Masukkan No Anggota ..." name='id_nasabah' value="<?php echo max_id('id_nasabah','nasabah'); ?>">
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
                                <input type="text" class="form-control" placeholder="Masukkan Nama Anggota ..." name='nasabah_name'>
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
                                    <select class="form-control" name='variable_array[<?php echo $data['id_variable']; ?>]'>
                                        <option value=''>- Pilih <?php echo $data['variable_alias']; ?> -</option>
                                            
                                            <?php 
                                            $sql1=mysql_query("SELECT * FROM variable_value WHERE id_variable = '$data[id_variable]'");
                                            while ($data1=mysql_fetch_array($sql1)){
                                            ?>        
                                            <option value='<?php echo $data1['id_variable_value']; ?>'><?php echo $data1['variable_value_alias']; ?></option>
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
                                        <label class="btn btn-default waves-effect"><input type="radio" name="kelancaran" value="Ya"><span>Ya</span></label>
                                        <label class="btn btn-default waves-effect"><input type="radio" name="kelancaran" value="Tidak"><span>Tidak</span></label>
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