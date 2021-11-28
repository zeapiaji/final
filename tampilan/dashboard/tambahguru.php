<?php 
    session_start();
	include '../../db.php';
	include '../../auth/superAdminSession.php';
	$kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
	$gender = mysqli_query($koneksi, "SELECT * FROM gender");
 ?>

 <?php include '../../public/head/head.php' ?>
 <body class="dy">
 	<div class="cont">
 		<form action="../../route/web.php" method="post" class="login-email">
 			<div class="row">
 				<div class="col-6">
 					<a href="dashboard.php" class="text-decoration-none text-muted up fw-bold utkbtn h5">
						<img src="../../source/svg/caret-square-left-solid.svg" style="width: 20px;"> Kembali
					</a>
 				</div>
 				<div class="col-6">
 					<p class="login-text text-end" style="font-size: 2rem; font-weight: 800;">Daftar Guru</p>
 				</div>
 			</div>
		 		<div class="input-group">
					<input type="email" name="username" placeholder="Username" required>
				</div>
		 		<div class="input-group">
					<input type="password" name="password" class="form-password" placeholder="Sandi" required>
				</div>
		 		<div class="input-group">
					<input type="password" name="password2" class="form-password" placeholder="Konfirmasi Sandi" required>
	      		</div>
	      		<div class="form-check form-switch mb-4" style="margin-left: 5px;">
				  <input class="form-check-input form-checkbox" type="checkbox" role="switch" onclick="myFunction()">
				  <label class="form-check-label" id="sandi">Perlihatkan Sandi</label>
				</div>
		 		<div class="input-group">
					<input type="text" name="nama" placeholder="Nama" required>
				</div>
		 		<div class="input-group">
					<input type="number" name="tlp" placeholder="No Telepon" required>
				</div>
	 			<div class="input-group">
					<input type="number" name="nis" placeholder="NIS" required>
				</div>
				<select name="gender" class="form-select">
	 			<?php foreach ($gender as $gend ): ?>
	 				<option value="<?php echo $gend["id_gender"] ?>"><?php echo $gend["gender"] ?></option>
	 			<?php endforeach ?>
	 		</select><br>	
	 		Wali Kelas : <br>
	 		<select name="kelas" class="form-select mb-4"> <br>
	 			<?php foreach ($kelas as $key ): ?>
	 				<option value="<?php echo $key["id_kelas"] ?>"><?php echo $key["kelas"] ?></option>
	 			<?php endforeach ?>
	 		</select>
	 		
	 		<div class="input-group">
				<button name="tambahGuru" class="btn">Daftar</button>
			</div>
 		</form>
 	</div>
 </body>