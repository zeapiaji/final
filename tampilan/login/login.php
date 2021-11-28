<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/login.css"> -->
  <?php include '../../public/head/head.php'; ?>
</head>

<body class="dy">
  <?php if(isset($_SESSION['us'])){ ?>
        <div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
          <strong>Akun Tidak Ditemukan</strong> Mohon Periksa Kembali
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php session_destroy(); ?>
  <?php } ?>
  
  <div class="cont">
    <form action="../../route/web.php" method="POST" class="login-email">
      <p class="login-text" style="font-size: 2rem; font-weight: 800;">Masuk</p>
      <div class="input-group">
        <input type="email" placeholder="Email" name="username" required>
      </div>
      <div class="input-group">
        <input type="password" placeholder="Sandi" name="password" class="form-password" required>
      </div>
      <div class="form-check form-switch mb-3" style="margin-left: 5px;">
        <input class="form-check-input form-checkbox" type="checkbox" role="switch" onclick="myFunction()">
        <label class="form-check-label" id="sandi">Perlihatkan Sandi</label>
      </div>
      <div class="input-group">
        <button name="login" class="btn" type="submit">Login</button>
      </div>
      <p class="login-register-text">Belum punya akun? <a href="register.php"> Daftar disini</a>.</p>
      <p class="login-register-text">Lupa Sandi? <a href="verifpw.php"> Lihat disini</a>.</p>
    </form>
  </div>
</body>

