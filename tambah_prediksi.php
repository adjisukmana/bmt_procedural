<div class="card">
    <div class="card-header">
        <h2>Tambah Prediksi <small>Silahkan isi data anggota yang akan diprediksi melalui form dibawah ini.</small></h2>
    </div>

    <!-- CONTENT -->
    <div class="card-body card-padding">
	    <form method='POST' action='function/penentuKeputusan.php' align='center'>
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

	                <div class="m-t-30 m-b-30">
	                    <button type="submit" class="btn btn-primary btn-icon-text btn-sm pull-right waves-effect"  id="sa-success"><i class="md md-done-all"></i> Prediksi</button>
	                    <button class="btn btn-default btn-icon-text waves-effect waves-effect pull-left" onclick="history.go(-1);"><i class="md md-arrow-back"></i> Back</button>
	                    <button type="reset" class="btn btn-danger btn-icon-text btn-sm pull-right waves-effect m-r-5"><i class="md md-close"></i> Reset</button>
	                    <div class="clearfix"></div>
	                </div>

	            </div>
	        </div>
	    </div>
	    <div class="clearfix"></div>
	    </form>

	</div> <!-- CARD BODY -->
</div> <!-- CARD -->