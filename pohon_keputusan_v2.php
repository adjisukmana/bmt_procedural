<div class="card">
    <div class="card-header">
        <h2>Pohon Keputusan<small>Dibawah ini pohon keputusan yang telah diterapkan.</small></h2>
    </div>
    <div class="card-body card-padding">
	    <div class="thumbnail p-20">
		    <h4><b><i class='socicon socicon-forrst m-r-5'></i>Pohon Keputusan : <br></b></h4>
		    <hr>

			<div class="row m-t-30">
				<div class="col-xs-1">
					
			    <?php
			    $no = 1; 
			    $result = mysql_query("select * from pohon_keputusan");
			    while($row=mysql_fetch_row($result)){
			    	echo "<span class='badge m-5'>".$no."</span><br>";
			    	$no++;
			      } ?>
				</div>
				<div class="col-xs-11">
					<!-- <div style="border-left:1px solid;"> -->
					<div>
					<?php
					function get_subfolder($idparent, $spasi, $spasis){
					    $result = mysql_query("select * from pohon_keputusan where id_parent= '$idparent'");
					    // $no = 1;
					    while($row=mysql_fetch_row($result)){
					        

					        if ($row[6] === 'Ya') {
					            $kelancaran = "<font color=blue>$row[6]</font>";
					        } elseif ($row[6] === 'Tidak') {
					            $kelancaran = "<font color=red>$row[6]</font>";
					        } elseif ($row[6] === '?') {
					            $kelancaran = "<font color=orange>$row[6]</font>";
					            $spasis = $spasis - 1;
					        } else {
					            $kelancaran = "<b>$row[6]</b>";
					            $spasis = $spasis - 1;
					        }

					        	$no = 1;
					        	$nos = 1;
					        for($i=1;$i<=$spasi;$i++){
					            // echo "<i class='md md-remove' style='margin: -3px;'></i><i class='md md-remove' style='margin: -3px;'></i><i class='md md-remove' style='margin: -3px 5px -3px -3px;'></i>";
					    	    // echo "<i class='md md-battery-std' style='margin: -3px;'></i><i class='md md-battery-std' style='margin: -3px;'></i><i class='md md-battery-std' style='margin: -3px 5px -3px -3px;'></i>";
					        	if ($spasi<=$nos) {
					        	   echo "<img class='img-pohon-vertical' >";

					        		   } else {

					        	   echo "<img class='img-pohon-vertical' ><img class='img-pohon-vertical' src='img/square.png'>";
					        		   }	   
					        		   $nos++;
					        
					        }

					        echo "<img class='img-pohon-vertical' src='img/square.png'><img class='img-pohon-horizontal' src='img/square.png'><img class='img-pohon-arrow' src='img/arrow.png'>
					        	  </i><span class='badge m-5'>$row[1]</span> = $row[2] (Tidak = $row[4], Ya = $row[5]) : <b>$kelancaran</b><br>";

			   		        		   $no++;
					        		   $nos++;
					        /*panggil dirinya sendiri*/
					        get_subfolder($row[0], $spasi + 1, $spasis + 1);
					    }
					}
					get_subfolder('0', 0, 0);
					?>
				</div> <!-- border -->
				</div>
			</div>


		    
		</div> <!-- thumbnail 1 -->

		<div class='thumbnail p-20'>
			<h4><b><i class='md md-beenhere m-r-5'></i>Rule: <br></b></h4>
			<hr>

			<table class="table table-hover">
			<thead>
                <tr>
                    <th>No</th>
                    <th>Rule</th>
                    <th>Keputusan</th>
                    <th>Id</th>
                </tr>
            </thead>
            <tbody>
				<?php 
				$no = 1;
				$sqlLihatRule = mysql_query("select * from rule_pohon_keputusan order by id" );
				while($rowLihatRule=mysql_fetch_array($sqlLihatRule)){
				    if (@$rowLihatRule['kelancaran'] === 'Ya') {
				        @$kelancaran = "<font color=green>$rowLihatRule[kelancaran]</font>";
				    } elseif (@$rowLihatRule['kelancaran'] === 'Tidak') {
				        @$kelancaran = "<font color=red>$rowLihatRule[kelancaran]</font>";
				    } elseif (@$rowLihatRule['kelancaran'] === '?') {
				        @$kelancaran = "<font color=blue>$rowLihatRule[kelancaran]</font>";
				    } else {
				        @$kelancaran = "<b>$rowLihatRule[kelancaran]</b>";
				    }
				?>
        		<tr>
				    <td><b><?php echo $no; ?></b></td>  
				    <td>IF <b>(</b><?php echo $rowLihatRule['rule']; ?><b>)</b> THEN</td> 
				    <td><b><?php echo $kelancaran; ?></b> </td>
				    <td><span class='badge m-5'><?php echo $rowLihatRule['id']?></span><br></td>
				</tr>
				<?php
				$no++;
				}
				?>
			</tbody>
			</table>
		</div> <!-- thumbail 2 -->
	</div> <!-- card-body -->
</div> <!-- card -->