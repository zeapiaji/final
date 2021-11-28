<?php 
	session_start();
	include '../../db.php';
	include '../../auth/adminSession.php';

	$id = $_POST['id'];

	$siswa = mysqli_query($koneksi, "SELECT * FROM register WHERE id_user = $id");

	$row   = mysqli_fetch_assoc($siswa);

	$dataSaldo = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_user = $id");

	$saldo 	   = mysqli_fetch_assoc($dataSaldo);
 ?>



<?php include '../../public/head/head.php'; ?>

<body class="dy">
  <div class="cont">
    <form action="../../route/web.php" method="POST" class="login-email">
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Saldo <?php echo $row['nama']; ?></p>
    	<p class="login-text" style="font-size: 2rem; font-weight: 800;">Rp.
		<?php $uang = number_format($saldo["saldo"], 0, ",", ".");
		echo $uang; ?>
		</p>

      <div class="input-group">
        <input class="form-password" type="number" placeholder="Tarik Saldo" name="saldo" required>
      </div>
      <div class="input-group mt-5">
        <button name="tariksaldo" class="btn" value="<?php echo $id; ?>">Konfirmasi</button>
      </div>
    </form>
  </div>
</body>