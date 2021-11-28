<!-- <form action="../../route/web.php" method="post">
	Masukan Username <input type="email" name="username">
	Masukan No tlp   <input type="number" name="tlp">
	<button type="submit" name="ubahpw">Kirim</button>
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
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Lupa Passowrd</p>
      <div class="input-group">
        <input type="email" name="username" placeholder="Masukan Username" required>
      </div>
      <div class="input-group">
        <input type="number" name="tlp" class="form-password"  placeholder="Masukan No Telepon" required>
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="ubahpw">Kirim</button>
      </div>
      <p class="login-register-text">Sudah punya akun?<a href="login.php"> Masuk disini</a>.</p>
    </form>
  </div>
</body>

