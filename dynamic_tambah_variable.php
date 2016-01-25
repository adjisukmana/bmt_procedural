<div class="card">
    <div class="card-header">
        <h2>Tambah Variable<small>Silahkan isi data variable baru melalui form dibawah ini.</small></h2>
    </div>


    <!-- CONTENT -->
    <form method=POST action='dynamic_aksi.php?module=dynamic_variable&act=input' align='center'>
    <div class="row m-10">
        <div class="col-sm-12"> 
            <div class="pmbb-edit">
                <dl class="dl-horizontal">
                    <dt class="p-t-10">ID Variable</dt>
                    <dd>                  
                        <div class="input-group">
                            <div class="fg-line">
                                <input type="text" class="form-control" placeholder="Masukkan ID Variable ..." name='id_variable' value="<?php echo max_id('id_variable', 'variable');; ?>">
                            </div>
                            <span class="input-group-addon"><i class="md md-format-list-numbered"></i></span>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Nama Variable</dt>
                    <dd>                  
                        <div class="input-group">
                            <div class="fg-line">
                                <input type="text" class="form-control" placeholder="Masukkan Nama Variable ..." name='variable_name'>
                            </div>
                            <span class="input-group-addon"><i class="md  md-person"></i></span>
                        </div>
                    </dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Alias Variable</dt>
                    <dd>                  
                        <div class="input-group">
                            <div class="fg-line">
                                <input type="text" class="form-control" placeholder="Masukkan Alias Variable ..." name='variable_alias'>
                            </div>
                            <span class="input-group-addon"><i class="md  md-person"></i></span>
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