<div style="display:none;">
<?php
include "function/miningPrePruningC45.php";
populateDb(); 
miningC45('', '');
generateRuleFinalPrePruning();
insertRuleC45PrePruning();
?>
</div>
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    Proses Mining Selesai!
</div>
<a href="index.php?p=pohon_keputusan" class="btn btn-primary btn-icon-text waves-effect m-r-5"><i class="md md-visibility"></i> Lihat Pohon Keputusan</a>
