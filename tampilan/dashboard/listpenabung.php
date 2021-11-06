<?php 
	session_start();
	include '../../db.php';
	include '../../auth/adminSession.php';

	$list = mysqli_query($koneksi, "SELECT * FROM konfirmasi INNER JOIN register ON konfirmasi.id_user = register.id_user INNER JOIN kelas ON register.id_kelas = kelas.id_kelas WHERE register.id_role= 2");

	$coba = mysqli_query($koneksi, "SELECT * FROM kelas ");

	$row  = mysqli_fetch_assoc($coba);
 ?>
 
<body>
	<?php include '../navbar/nav.php'; ?>

	<form action="" method="post">
		<select name="kelas">
			<option>semua</option>
		<?php foreach ($coba as $data ): ?>
				<option value="<?php echo $data["id_kelas"] ?>"><?php echo $data["kelas"] ?></option>
		<?php endforeach ?>
		</select>
		<button type="submit" name="cari">Kirim</button>
	</form>

	<?php if (isset($_POST['cari'])): ?>
		<?php 
			$kelas = $_POST["kelas"];

			$cariKelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$kelas'");
		 ?>
	<?php endif ?>
	<?php if (isset($_POST['cari'])){ ?>
		<?php 
			$kelas = $_POST["kelas"];

			$cariKelas = mysqli_query($koneksi, "SELECT * FROM konfirmasi INNER JOIN register ON konfirmasi.id_user = register.id_user INNER JOIN kelas ON register.id_kelas = kelas.id_kelas WHERE kelas.id_kelas='$kelas' ");
		 ?>
		 <div class="mt-4">
			<table class="table">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Nis</th>
						<th>Pesan</th>
						<th>Kelas</th>
						<th>Konfirm</th>
					</tr>
				</thead>
				<tbody>
		 <?php foreach ($cariKelas as $key ): ?>
		 			<tr>
						<td><?php echo $key["nama"]; ?></td>
						<td><?php echo $key["nis"] ?></td>
						<td>
							<p><?php echo $key["pesan"] ?></p>
						</td>
						<td><?php echo $key["kelas"] ?></td>
						<td>
							<form action="../../route/web.php" method="post">
						    	<button class="btn btn-dark border border-2 border-danger text-danger" type="submit" value="<?php echo $key["id_konfirmasi"]; ?>" name="tambahsaldo">Konfirmasi</button>
						    </form>
						</td>
					</tr>
		 <?php endforeach ?>
		 		</tbody>
			</table>
		</div>
	<?php }else{ ?>
	<div class="mt-4">
		<table class="table">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Nis</th>
					<th>Pesan</th>
					<th>Kelas</th>
					<th>Konfirm</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($list as $key ): ?>
					<tr>
						<td><?php echo $key["nama"]; ?></td>
						<td><?php echo $key["nis"] ?></td>
						<td>
							<p><?php echo $key["pesan"] ?></p>
						</td>
						<td><?php echo $key["kelas"] ?></td>
						<td>
							<form action="../../route/web.php" method="post">
						    	<button class="btn btn-dark border border-2 border-danger text-danger" type="submit" value="<?php echo $key["id_konfirmasi"]; ?>" name="tambahsaldo">Konfirmasi</button>
						    </form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<?php } ?>
</body>