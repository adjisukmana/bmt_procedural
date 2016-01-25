<div class="card" style="min-height: 500px;">
    <div class="card-header">
        <h2>Proses C4.5<small>Lakukan proses perhitungan algoritma C4.5 berdasarkan data nasabah yang telah dimasukkan.</small></h2>
    </div>

    <!-- CONTENT -->
    <div class="card-body card-padding">
	<div id="menu" class="m-b-20">
        <a href="ajax_proses_hapus_mining.php" id='delete-mining' class="btn btn-lg btn-danger btn-icon-text waves-effect m-r-5"><i class="md md-delete"></i> Hapus Pohon Keputusan</a>
        <a href="ajax_proses_mining.php" id='count-mining' class="btn btn-lg btn-default btn-icon-text waves-effect"><i class="md md-sync"></i> Sync</a>
	    <div id="progress" class="pull-right"></div>
    </div>

    <div id="loading" style="display:none"></div>
    <div id="container1"></div>
    <div id="container2"></div>
    </div>
</div>

        
<script type="text/javascript">
$(function() {
    $( document ).ajaxStart(function() {
	  $( "#loading" ).show();
	});
    $( document ).ajaxStop(function() {
	  $( "#loading" ).hide();
	});

    $('#menu #delete-mining').click(function() {
        var url = $(this).attr('href');
        $('#container1').load(url);
        return false;
    });
    $('#menu #count-mining').click(function() {
        var url = $(this).attr('href');
        $('#container2').load(url);
        return false;
    });
});
</script>
