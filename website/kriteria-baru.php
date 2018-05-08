<?php
include_once 'header.php';
include_once 'includes/nilai.inc.php';
include_once 'includes/alternatif.inc.php';
$pro = new Alternatif($db);
$pgn = new Nilai($db);
if($_POST){
	
	include_once 'includes/kriteria.inc.php';
	$eks = new Kriteria($db);

	$eks->kt = $_POST['kt'];
	$eks->alt = $_POST['alt'];
	$eks->ktt = $_POST['kt'] . ' - ' . $_POST['alt'];
	$eks->tp = $_POST['tp'];
	
	if($eks->insert()){
?>
<script type="text/javascript">
window.onload=function(){
	showStickySuccessToast();
};
</script>
<?php
	}
	
	else{
?>
<script type="text/javascript">
window.onload=function(){
	showStickyErrorToast();
};
</script>
<?php
	}
}
?>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-2"></div>
		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="panel panel-default">
		<div class="panel-body">
		  	<div class="row">
				<div class="col-md-6 text-left">
		  			<h3>Tambah Kriteria</h3>
		  		</div>
		  		<div class="col-md-6 text-right">
		  			<h3>
		  				<button type="button" onclick="location.href='kriteria.php'" class="btn btn-success">Kembali</button>
		  			</h3>
		  		</div>
		  	</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="kt">Nama Mata Kuliah</label>
				    <input type="text" class="form-control" id="kt" name="kt" required>
				  </div>
				  <div class="form-group">
				    <label for="alt">Nama Alternatif</label>
				    <select class="form-control" id="alt" name="alt">
				    	<?php
						$stmt4 = $pro->readKhusus();
						while ($row3 = $stmt4->fetch(PDO::FETCH_ASSOC)){
							extract($row3);
							echo "<option value='{$nama_alternatif}'>{$nama_alternatif}</option>";
						}
						?>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="tp">Tipe Kriteria</label>
				    <select class="form-control" id="tp" name="tp">
				    	<option value='benefit'>Benefit</option>
				    	<option value='cost'>Cost</option>
				    </select>
				  </div>
				  <button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			  
		  </div></div></div>
		  <div class="col-xs-12 col-sm-12 col-md-2">
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>