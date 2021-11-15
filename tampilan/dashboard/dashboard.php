<?php 
	session_start();
	include '../../db.php';
	include '../../auth/adminSession.php';

	$siswa = mysqli_query($koneksi, "SELECT * FROM register INNER JOIN kelas ON register.id_kelas = kelas.id_kelas INNER JOIN gender ON register.id_gender = gender.id_gender WHERE register.id_role = 2 ");

	$penabung = mysqli_query($koneksi, "SELECT * FROM konfirmasi");

	$ttl_penabung= mysqli_num_rows($penabung);

	$total = mysqli_num_rows($siswa);

	$saldo = mysqli_query($koneksi, "SELECT sum(saldo) as uang FROM saldo INNER JOIN register ON saldo.id_user = register.id_user WHERE register.id_role = 2 ");

	$row   = mysqli_fetch_assoc($saldo);

	$rupiah= number_format($row["uang"], 0, ",", ".");

 ?>
<body style="background: linear-gradient(to right,#043927,#078d5f, #043927);">
	<?php include '../navbar/nav.php'; ?>
	<div class="container border border-2 border-light mt-4 pt-2 pb-3 rounded" style="background: linear-gradient(to right,#043927,#078d5f, #043927);">
			<div class="row mt-3">
				<div class="col-4">
					<div class="card border border-2 border-light pt-2 pb-2 text-light" style="background: linear-gradient(to right,#043927,#078d5f, #043927); width:18rem;" >
					  <!-- <img src="../../source/gambar.jpg" class="card-img-top rounded" alt="..." style="max-height: 300px;"> -->
					  <div class="card-body" >
					    <h5 class="card-title text-center">Murid</h5>
					    <h3 class="card-text text-center"><?php echo $total ?></h3>
					    <center>
					    <a href="datasiswa.php" class="btn btn-outline-light">Lihat</a>
					    </center>
					  </div>
					</div>
				</div>
				<div class="col-4">
					<div class="card border border-2 border-light pt-2 pb-2 text-light" style="background: linear-gradient(to right,#043927,#078d5f, #043927); width:18rem; margin-left: 40px;" >
					  <!-- <img src="../../source/gambar.jpg" class="card-img-top rounded" alt="..." style="max-height: 300px;"> -->
					  <div class="card-body" >
					    <h5 class="card-title text-center">Saldo</h5>
					    <h3 class="card-text text-center">Rp. <?php echo $rupiah ?></h3>
					    <center>
					    <a href="datasaldo.php" class="btn btn-outline-light">Lihat</a>
					    </center>
					  </div>
					</div>
				</div>
				<div class="col-4">
					<div class="card border border-2 border-light pt-2 pb-2 text-light" style="background: linear-gradient(to right,#043927,#078d5f, #043927); width:18rem; margin-left:67px" >
					  <!-- <img src="../../source/gambar.jpg" class="card-img-top rounded" alt="..." style="max-height: 300px;"> -->
					  <div class="card-body" >
					    <h5 class="card-title text-center">Penabung Hari Ini</h5>
					    <h3 class="card-text text-center"><?php echo $ttl_penabung; ?></h3>
					    <center>
					    <a href="listpenabung.php" class="btn btn-outline-light">Lihat</a>
					    </center>
					  </div>
					</div>
				</div>
			</div>
	</div>
</body>