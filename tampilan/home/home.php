<?php session_start();
	include '../../db.php';
	include '../../auth/userSession.php';

	$auth = $_SESSION['auth'];

	$db = mysqli_query($koneksi, "SELECT * FROM register WHERE id_user = $auth");

	$saldo = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_user = $auth");

	$uang  = mysqli_fetch_assoc($saldo);

	$format= number_format($uang["saldo"], 0, ",", ".");

	$date  = date('d-m-Y');
	// echo $date;
 ?>
<body>
	<?php include '../navbar/nav.php'; ?>
	<div class="bg-dark rounded mt-4 container text-light border border-2 pt-3 pb-3">	
		<h3 style="font-family: Comic Sans Ms">Rp. <?php echo $format ?></h3>
		Isi Saldo
		<form action="../../route/web.php" method="post">
			<h3>Saldo : </h3>
			<input type="number" class="form-control" name="saldo" required>
			<h3 class="mt-4">Pesan : </h3>
			<textarea class="form-control " name="pesan" required>
			</textarea>
			<center>
				<button type="submit" class="mt-2 btn btn-outline-light" name="nabung" value="<?php echo $auth; ?>">Kirim</button>
			</center>
		</form>
	</div>
</body>