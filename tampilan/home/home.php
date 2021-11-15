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
	<h3 class="text-center">History</h3>
	<?php 
	$riwayat = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE id_user ='$auth' ORDER BY id_riwayat DESC");?>
	<?php foreach ($riwayat as $history): ?>
		<div class="container mt-4">
			<div class="card text-center">
				<div class="card-header <?php if($history['riwayat'] == 'Penarikan'){
					echo 'bg-danger';
				}else{
					echo 'bg-success';
				} ?>">
				    <h3 class="text-white"><?php echo $history["riwayat"] ?></h3>
				</div>
				<div class="card-body">
				    <div class="row d-flex justify-content-center mt-3">
				   		<h5 class="col-2 text-start">Saldo asal</h5>
				    	<h5 class="col-3 text-end">: Rp <?php echo number_format($history["saldo_asal"], 0,".","."); ?></h5>
				    </div>
				    <div class="row d-flex justify-content-center mt-3">
				   		<h5 class="col-2 text-start">Besar <?php echo $history["riwayat"] ?>
				   			<p class="mt-3 ">Hasil</p>
				   		</h5>
				    	<h5 class="col-3 text-end">: Rp <?php echo number_format($history["aksi"], 0,".","."); ?>
				    		<p class="mt-3">: Rp <?php echo number_format($history["saldo_akhir"], 0, ".", "."); ?></p>
				    	</h5>
				    </div>
				</div>
				<div class="card-footer text-muted">
				    <?php echo $history["tanggal"] ?>
				</div>
			</div>
		</div>
		
	<?php endforeach ?>
</body>