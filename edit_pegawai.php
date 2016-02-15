<?php 
    $sql=mysql_query("SELECT * FROM karyawan WHERE id_karyawan = '$_GET[id_karyawan]'");
    $data=mysql_fetch_array($sql);
?>
<div class="card">
    <div class="card-header">
        <h2>Tambah Pegawai <small>Silahkan isi data Pegawai melalui form dibawah ini.</small></h2>
    </div>

    <!-- CONTENT -->
    <form method="POST" action='aksi.php?module=pegawai&act=edit' enctype='multipart/form-data'  align='center'>
    <div class="row m-10">
        <div class="col-sm-6"> 
                <dl class="dl-horizontal">
                    <dt class="p-t-10">No Pegawai</dt>
                    <dd>                  
                        <div class="input-group">
                            <div class="fg-line">
                                <input type="text" class="form-control" placeholder="Masukkan No Pegawai ..." name='id_karyawan' value="<?php echo $data['id_karyawan']; ?>">
                            </div>
                            <span class="input-group-addon"><i class="md md-format-list-numbered"></i></span>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Nama Pegawai</dt>
                    <dd>                  
                        <div class="input-group">
                            <div class="fg-line">
                                <input type="text" class="form-control" placeholder="Masukkan Nama Pegawai ..." name='nama_karyawan' value="<?php echo $data['nama_karyawan']; ?>">
                            </div>
                            <span class="input-group-addon"><i class="md  md-person"></i></span>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Username</dt>
                    <dd>                  
                        <div class="input-group">
                            <div class="fg-line">
                                <input type="text" class="form-control" placeholder="Masukkan Username ..." name='username' value="<?php echo $data['username']; ?>">
                            </div>
                            <span class="input-group-addon"><i class="md  md-person"></i></span>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Password</dt>
                    <dd>                  
                        <div class="input-group">
                            <div class="fg-line">
                                <input type="password" class="form-control" placeholder="Kosongkan password jika tidak diubah ..." name='password'>
                            </div>
                            <span class="input-group-addon"><i class="md  md-person"></i></span>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Status</dt>
                    <dd>                  
                        <div class="input-group p-t-10">
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="status_karyawan" value="1" <?php if($data['status_karyawan']=='1') echo "checked='checked'"; ?>>
                                <i class="input-helper"></i>  
                                Administrator
                            </label>
                            
                            <label class="radio radio-inline m-r-20">
                                <input type="radio" name="status_karyawan" value="2" <?php if($data['status_karyawan']=='2') echo "checked='checked'"; ?>>
                                <i class="input-helper"></i>  
                                Pegawai
                            </label>
                        </div>
                    </dd>
                </dl>
        </div>
        <div class="col-sm-6">
                <dl class="dl-horizontal">
                    <!-- <dt class="p-t-10">Password</dt> -->
                    <dd>                  
                        <div class="input-group">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput">
                                    <img src="./img_karyawan/<?php echo $data['photo_karyawan']; ?>">
                                </div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="img">
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </dd>
                </dl>
        </div><!-- col-md-12 -->
        <span class="clearfix"></span>
                <div class="m-t-30 m-b-30">
                    <button type="submit" class="btn btn-primary btn-icon-text btn-sm pull-right waves-effect"  id="sa-success"><i class="md md-done-all"></i> Simpan</button>
                    <button class="btn btn-default btn-icon-text waves-effect waves-effect pull-left" onclick="history.go(-1);"><i class="md md-arrow-back"></i> Back</button>
                    <button type="reset" class="btn btn-danger btn-icon-text btn-sm pull-right waves-effect m-r-5"><i class="md md-close"></i> Reset</button>
                    <div class="clearfix"></div>
                </div>

    </div>
    <div class="clearfix"></div>
    </form>
</div> <!-- card -->