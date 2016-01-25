<div class="card">
    <div class="card-header">
        <h2>Tambah Anggota <small>Silahkan isi data anggota melalui form dibawah ini.</small></h2>
    </div>

    <!-- CONTENT -->
    <form method=POST action='aksi.php?module=data_anggota&act=input' align='center'>
    <div class="row m-10">
        <div class="col-sm-12"> 
            <div class="pmbb-edit">
                <dl class="dl-horizontal">
                    <dt class="p-t-10">No Anggota</dt>
                    <dd>                  
                        <div class="input-group">
                            <div class="fg-line">
                                <input type="text" class="form-control" placeholder="Masukkan No Anggota ..." name='no_anggota'>
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
                                <input type="text" class="form-control" placeholder="Masukkan Nama Anggota ..." name='nama_anggota'>
                            </div>
                            <span class="input-group-addon"><i class="md  md-person"></i></span>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Penghasilan</dt>
                    <dd>
                        <div class="input-group">
                            <div class="col-sm-12">
                                <div class="fg-line select">    
                                    <select class="form-control" name='penghasilan'>
                                        <option value=''>- Pilih Penghasilan -</option>
                                        <option value='low'>low</option>
                                        <option value='high'>high</option>
                                    </select>
                                </div>
                            </div>
                            <span class="input-group-addon"><i class="md md-phone"></i></span>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Status</dt>
                    <dd>
                        <div class="input-group">
                            <div class="col-sm-12">
                                <div class="fg-line select">    
                                    <select class="form-control" name='status'>
                                        <option value=''>- Pilih Status -</option>
                                        <option value='menikah'>menikah</option>
                                        <option value='belum'>belum menikah</option>
                                    </select>
                                </div>
                            </div>
                            <span class="input-group-addon"><i class="md md-phone"></i></span>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Status Rumah</dt>
                    <dd>
                        <div class="input-group">
                            <div class="col-sm-12">
                                <div class="fg-line select">    
                                    <select class="form-control" name='status_rumah'>
                                        <option value=''>- Status Rumah -</option>
                                        <option value='pribadi'>pribadi</option>
                                        <option value='sewa'>sewa</option>
                                    </select>
                                </div>
                            </div>
                            <span class="input-group-addon"><i class="md md-phone"></i></span>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Pinjaman</dt>
                    <dd>
                        <div class="input-group">
                            <div class="col-sm-12">
                                <div class="fg-line select">    
                                    <select class="form-control" name='pinjaman'>
                                        <option value=''>- Pilih Pinjaman -</option>
                                        <option value='rendah'>rendah</option>
                                        <option value='sedang'>sedang</option>
                                        <option value='tinggi'>tinggi</option>
                                    </select>
                                </div>
                            </div>
                            <span class="input-group-addon"><i class="md md-phone"></i></span>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Pekerjaan</dt>
                    <dd>
                        <div class="input-group">
                            <div class="col-sm-12">
                                <div class="fg-line select">    
                                    <select class="form-control" name='pekerjaan'>
                                        <option value=''>- Pilih Pekerjaan -</option>
                                        <option value='pns'>pns</option>
                                        <option value='swasta'>swasta</option>
                                        <option value='pedagang'>pedagang</option>
                                        <option value='buruh'>buruh</option>
                                    </select>
                                </div>
                            </div>
                            <span class="input-group-addon"><i class="md md-phone"></i></span>
                        </div>
                    </dd>
                </dl>
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

</div>

<div class="card">
    <div class="card-header">
        <h2>Import Data Anggota <small>Silahkan submit file .csv melalui tombol dibawah ini.</small></h2>
    </div>

    <!-- CONTENT -->
    <form action='' method='post' enctype='multipart/form-data' name='form1' id='form1'>
    <div class="row m-10">
        <div class="col-sm-12"> 
            <dl class="dl-horizontal">
                <dt class="p-t-10">File</dt>
                <dd>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <span class="btn btn-primary btn-file m-r-10">
                            <span class="fileinput-new">Select file</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="csv">
                        </span>
                        <span class="fileinput-filename"></span>
                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-icon-text btn-sm pull-right waves-effect" data-swal-success=""><i class="md md-done-all"></i> Submit</button>
                </dd>
            </dl>
        </div>
    </div>
    <div class="clearfix"></div>
    </form>

    <?php if (@$_FILES["csv"]["size"] > 0) {

                    //get the csv file
                    $file = $_FILES["csv"]["tmp_name"];
                    $handle = fopen($file,"r");
                    
                    //loop through the csv file and insert into database
                    mysql_query("TRUNCATE data_anggota");
                    do {
                        if (@$data[0]) {
                            mysql_query("INSERT INTO data_anggota (no_anggota, nama_anggota, penghasilan, status, status_rumah, pinjaman, pekerjaan, kelancaran) VALUES
                                (
                                    '".addslashes($data[0])."',
                                    '".addslashes($data[1])."',
                                    '".addslashes($data[2])."',
                                    '".addslashes($data[3])."',
                                    '".addslashes($data[4])."',
                                    '".addslashes($data[5])."',
                                                    '".addslashes($data[6])."',
                                                    '".addslashes($data[7])."'
                                )
                            ");
                        }
                    } while ($data = fgetcsv($handle,1000,",","'"));
                    //

                    //redirect
                    echo "<script>alert('Data berhasil diinput!'); document.location.href='index.php?p=nasabah';</script>\n";

                }
                ?>

</div>
