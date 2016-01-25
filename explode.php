<div class="card">
    <div class="card-header">
        <h2>Hover Row <small>Enable a hover state on table rows within a tbody</small></h2>
    </div>

    <!-- CONTENT -->
    <div class="card-body card-padding">
    <table class="table table-bordered table-striped">
    	    <?php 
        		$no = 1;
                $sql=mysql_query("SELECT * FROM pohon_keputusan");
                while ($data=mysql_fetch_array($sql)){
                	$rule = $data['dynamic_variable'];
                	$kondisiVariabel = str_replace("~", "'", $rule); // replace string ~ menjadi '
					$explode = explode("AND",$kondisiVariabel);
					
				    foreach ($explode as $jum_having =>$value)
				    {
					$having = "$jum_having";
				    }


			?>
			<tr>
				<td><?php echo $kondisiVariabel; ?></td>
				<td><?php echo $having; ?></td>
			</tr>
				
			<?php $no++; } ?>
    </table>
    </div>

</div>