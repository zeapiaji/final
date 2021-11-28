<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>regist</title>
	<?php include '../../public/head/head.php' ?>
	
</head>

<?php 
	include '../../db.php';

	$kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
	$gender= mysqli_query($koneksi, "SELECT * FROM gender");
 ?>
<body class="dy">
	<div class="cont">
		<form action="../../route/web.php" method="POST" class="login-email">
      		<p class="login-text" style="font-size: 2rem; font-weight: 800;">Daftar</p>
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
				<input type="number" name="tlp" placeholder="No Telepon" >
			</div>
			<div class="input-group">
				<input type="number" name="nis" placeholder="NIS" >
			</div>
			<select name="kelas" class="form-select mb-4">
					<?php foreach($kelas as $key): ?>
				<option value="<?php echo $key["id_kelas"] ?>"><?php echo $key["kelas"] ?></option>
					<?php endforeach ?>
			</select>
			<select name="gender" class="form-select">
					<?php foreach($gender as $gen): ?>
				<option value="<?php echo $gen["id_gender"] ?>"><?php echo $gen["gender"] ?></option>
					<?php endforeach ?>
			</select><br>
			<div class="input-group">
				<button name="register" class="btn">Daftar</button>
			</div>
			<p class="login-register-text">Sudah punya akun? <a href="login.php"> Masuk disini</a>.</p>
		</form>
	</div>
</body>
</html>