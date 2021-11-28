<?php 
	session_start();

  if (isset($_SESSION["auth"])) {
    $id = $_SESSION["auth"];
  }else{
    $id = $_SESSION["ver"];
  }
	

	// echo $id;
 ?>

 <!-- <form action="../../route/web.php" method="post">
 	Masukan Password Baru
 	<input type="password" name="password">
 	<input type="password" name="password2">
 	<button type="submit" value="<?php echo $id; ?>" name="editpw">Kirim</button>
 </form> -->

 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/login.css"> -->
  <?php include '../../public/head/head.php'; ?>
</head>

<body class="dy">
  <div class="cont">
    <form action="../../route/web.php" method="POST" class="login-email">
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Ubah Sandi</p>
      <div class="input-group">
        <input type="password" name="password" class="form-password" placeholder="Masukan Sandi Baru" required>
      </div>
      <div class="input-group">
        <input type="password" name="password2" class="form-password"  placeholder="Konfirmasi Sandi" required>
      </div>
      <div class="form-check form-switch mb-3" style="margin-left: 5px;">
        <input class="form-check-input form-checkbox" type="checkbox" role="switch" onclick="myFunction()">
        <label class="form-check-label" id="sandi">Perlihatkan Sandi</label>
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="editpw" value="<?php echo $id; ?>">Kirim</button>
      </div>
      <?php if (isset($_SESSION["auth"])){ ?>
        <a href="../home/profile.php">Kembali</a>
      <?php }else{ ?>
      <p class="login-register-text">Sudah punya akun?<a href="login.php"> Masuk disini</a>.</p>
      <?php } ?>
    </form>
  </div>
</body>