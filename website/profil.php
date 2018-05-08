<?php
include_once 'header.php';
include_once 'includes/user.inc.php';
$eks = new User($db);
$eks2 = new User($db);

$eks->id = $_SESSION['id_pengguna'];
$eks2->id = $_SESSION['id_pengguna'];

$eks->readOne();
$eks2->readMhs();
if($_POST){

    $eks->nl = $_POST['nl'];
    $eks->un = $_POST['un'];
	$eks2->nim = $_POST['nim'];
	echo $eks2;
    $eks->pw = md5($_POST['pw']);
    
    if($eks->update()){
?>
<script type="text/javascript">
window.onload=function(){
  showStickySuccessToast();
};
</script>
<?php
    } else{
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
          <div class="col-xs-12 col-sm-12 col-md-2">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="page-header">
              <h5>Profil Anda</h5>
            </div>
            
                <form method="POST">
                  <div class="form-group">
                    <label for="nl">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nl" name="nl" value="<?php echo $eks->nl; ?>" required>
                  </div>
				  <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $eks2->nim; ?>" required>
                  </div>
				  <div class="form-group">
                    <label for="un">Username</label>
                    <input type="text" class="form-control" id="un" name="un" value="<?php echo $eks->un; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="pw">Password</label>
                    <input type="password" class="form-control" id="pw" name="pw" value="<?php echo $eks->pw; ?>" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
              
          </div>
          <div class="col-xs-12 col-sm-12 col-md-2">
          </div>
        </div>
        <?php
include_once 'footer.php';
?>