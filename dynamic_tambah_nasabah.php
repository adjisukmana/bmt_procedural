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
                    // while (($line = fgetcsv($handle)) !== FALSE) {
                      //$line is an array of the csv elements
                      // echo "<pre>".print_r($line)."</pre>";
                    // }
                                    // if ($a==false) {
                                    //     echo mysql_error();
                                    //     die();
                                    // } else {
                                    //     echo "[berhasil]";
                                    // }
                    //loop through the csv file and insert into database
                    mysql_query("DELETE FROM nasabah");
                    mysql_query("DELETE FROM nasabah_variable");
                    do {
                        if (@$data[0]) {
                            $a = mysql_query("INSERT INTO nasabah VALUES(
                                    '".addslashes($data[0])."',
                                    '".addslashes($data[1])."',
                                    '".addslashes($data[2])."'
                                )");
                            $id = 1;
                            $max_variable = addslashes($data[3]) + 3;
                            for ($i=4; $i <= $max_variable; $i++) { 
                                $sql1=mysql_query("SELECT * FROM variable_value");
                                while ($data1=mysql_fetch_array($sql1)){
                                    if ($data1['variable_value_alias']== addslashes($data[$i])) {
                                // echo addslashes($data[$i])."/";
                                        echo addslashes($data[0])."/".$id."/".$id_variable_value = $data1['id_variable_value']; 
                                        mysql_query("INSERT INTO nasabah_variable VALUES
                                            (
                                                '".addslashes($data[0])."',
                                                '".$id."',
                                                '".$id_variable_value."'
                                            )
                                        ");
                                     }
                                }
                                $id++;
                            }
                            // foreach ($_POST["variable_array"] as $id_variable =>$id_variable_value) {
                            //     mysql_query("INSERT INTO nasabah_variable VALUES(
                            //         '$_POST[id_nasabah]',
                            //         '$id_variable',
                            //         '$id_variable_value'
                            //         )");
                            // }
                        }
                    } while ($data = fgetcsv($handle,1000,";","'"));
                    //

                    //redirect
                    // echo "<script>alert('Data csv berhasil diinput!'); document.location.href='index.php?p=dynamic_nasabah';</script>\n";

                }
                ?>
</div> <!-- card -->
