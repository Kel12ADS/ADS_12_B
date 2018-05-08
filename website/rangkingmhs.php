<?php
include_once 'headermhs.php';
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
include_once 'includes/rangking.inc.php';
include_once 'includes/bobot.inc.php';
$pro0 = new Bobot($db);
$stmt0 = $pro0->readAll();
$pro = new Rangking($db);
$stmt = $pro->readOnly();
$count = $pro->countAll();
?>
	<br/>
	<div>
	
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#lihat" aria-controls="lihat" role="tab" data-toggle="tab">Lihat Semua Data</a></li>
	  </ul>
	
	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane active" id="lihat">
	    	<br/>
	    	<form method="post">
			<div class="row">
				<div class="col-md-6 text-left">
					<h4>Data Rangking</h4>
				</div>
				<div class="col-md-6 text-right">
		            <button type="button" onclick="location.href='rangking-baru.php'" class="btn btn-primary">Tambah Data</button>
				</div>
			</div>
			<br/>
			<table width="100%" class="table table-striped table-bordered" id="tabeldata">
		        <thead>
		            <tr>
						<th>NIM</th>
		                <th>Bobot</th>
		                <th>Kriteria</th>
		                <th>Nilai</th>
		            </tr>
		        </thead>
		
		        <tfoot>
		            <tr>
						<th>NIM</th>
		                <th>Bobot</th>
		                <th>Kriteria</th>
		                <th>Nilai</th>
		            </tr>
		        </tfoot>
		
		        <tbody>
		<?php
		$no=1;
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		?>
		            <tr>
						<td style="vertical-align:middle;"><?php echo $row['nim_mhs'] ?></td>
		                <td style="vertical-align:middle;"><a style="color:#060;" href="https://id.jobsdb.com/ID/ID/Search/FindJobs?KeyOpt=COMPLEX&JSRV=1&RLRSF=1&JobCat=1&SearchFields=Positions,Companies&Key=<?php echo $row['id_alternatif'] ?>"><?php echo $row['nama_alternatif'] ?></a></td>
		                <td style="vertical-align:middle;"><?php echo $row['nama_kriteria'] ?></td>
		                <td style="vertical-align:middle;"><?php echo $row['nilai_rangking'] ?></td>
		            </tr>
		<?php
		}
		?>
		        </tbody>
		
		    </table>
		    	</form>	
	    </div>

	    <div role="tabpanel" class="tab-pane" id="rangking">
	    	<br/>
	    	<h4>Perangkingan</h4>
			<table width="100%" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
		                <th colspan="<?php echo $stmt2->rowCount(); ?>" class="text-center">Kriteria</th>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Vektor S</th>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Vektor V</th>
		            </tr>
		            <tr>
		            <?php
					while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
		                <th><?php echo $row2['nama_kriteria'] ?></th>
		            <?php
					}
					?>
		            </tr>
		        </thead>
		
		        <tbody>
		<?php
		while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
		?>
		            <tr>
		                <th><?php echo $row1['nama_alternatif'] ?></th>
		                <?php
		                $a= $row1['id_alternatif'];
						$stmtr = $pro->readR($a);
						while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
							$b = $rowr['id_kriteria'];
							$tipe = $rowr['tipe_kriteria'];
							$bobot = $rowr['hasil_bobot'];
						?>
		                <td>
		                	<?php 
		                	if($tipe=='benefit'){
		                		$nor = pow($rowr['nilai_rangking'],$bobot);
							} else{
								$nor = pow($rowr['nilai_rangking'],-$bobot);
							}
							echo number_format($nor, 5, '.', ',');

							$pro->ia = $a;
							$pro->ik = $b;
							$pro->nn4 = $nor;
							$pro->normalisasi1();
		                	?>
		                </td>
		                <?php
		                }
						?>
						<td>
							<?php 
							$stmthasil = $pro->readHasil1($a);
							$hasil = $stmthasil->fetch(PDO::FETCH_ASSOC);
							echo number_format($hasil['bbn'], 5, '.', ',');
							$pro->has1 = $hasil['bbn'];
							$pro->hasil1();
							?>
						</td>
						<td>
							<?php
							$stmtmax = $pro->readMax();
							$maxnr = $stmtmax->fetch(PDO::FETCH_ASSOC);
							echo number_format($hasil['bbn']/$maxnr['mnr1'], 5, '.', ',');
							$pro->has2 = $hasil['bbn']/$maxnr['mnr1'];
							$pro->hasil2();
							?>
						</td>
		            </tr>
		<?php
		}
		?>
		        </tbody>
		
		    </table>
		    	
	    </div>
	  </div>
	
	</div>
<?php
include_once 'footer.php';
?>