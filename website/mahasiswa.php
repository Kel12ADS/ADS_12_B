<?php
include_once 'headermhs.php';
include_once 'includes/user.inc.php';
$eks = new User($db);
$eks2 = new User($db);

$eks->id = $_SESSION['id_pengguna'];
$eks2->id = $_SESSION['id_pengguna'];

$eks->readOne();
$eks2->readMhs();
if($_GET){

    $eks->nl = $_GET['nl'];
    $eks->un = $_GET['un'];
	$eks2->nim = $_GET['nim'];
}
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readOnly();
$stmt4 = $pro1->readOnly();
?>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<br/>
		  	<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Profil</h3>
			  </div>
			  <div class="panel-body">
			  <form method="GET">
                  <div class="form-group">
                    <label for="nl">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nl" name="nl" value="<?php echo $eks->nl; ?>"  disabled>
                  </div>
				  <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $eks2->nim; ?>"  disabled>
                  </div>
			</form>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
			  </div>
			</div>
		  </div>
		  
		  <div class="col-xs-12 col-sm-12 col-md-8">
			<div id="container2" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
		  </div>
		</div>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-12">
			<div class="panel panel-default" style="margin-left: 0px;">
			  <div class="panel-heading">
			    <h3 class="panel-title text-center">Pekerjaan</h3>
			  </div>
			  <div class="panel-body text-center">
			    <ol>
			    	<?php
					while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li><a style="color:#060;" href="https://id.jobsdb.com/ID/ID/Search/FindJobs?KeyOpt=COMPLEX&JSRV=1&RLRSF=1&JobCat=1&SearchFields=Positions,Companies&Key=<?php echo $row1['nama_alternatif'] ?>"><?php echo $row1['nama_alternatif'] ?></a></li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
			</div>
		  </div>
		</div>
		
		<footer class="text-center">&copy; 2018</footer>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/highcharts.js"></script>
	<script src="js/exporting.js"></script>
	<script>
	var chart1; // globally available
	$(document).ready(function() {
	      chart1 = new Highcharts.Chart({
	         chart: {
	            renderTo: 'container2',
	            type: 'column'
	         },  
	         title: {
	            text: 'Grafik Kecocokan'
	         },
	         xAxis: {
	            categories: ['Pekerjaan']
	         },
	         yAxis: {
	            title: {
	               text: 'Jumlah Nilai'
	            }
	         },
	              series:            
	            [
	            <?php
	            while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
	                  ?>
	                 //data yang diambil dari database dimasukan ke variable nama dan data
	                 //
	                  {
	                      name: '<?php echo $row4['nama_alternatif'] ?>',
	                      data: [<?php echo $row4['vektor_v'] ?>]
	                  },
	                  <?php } ?>
	            ]
	      });
	   });  
	   </script>
	</body>
</html>