<?php 
  session_start();
  $auth   = $_SESSION['auth'];
  include "../../public/head/head.php";
  include '../../db.php';
  include '../../auth/userSession.php';

  
  $db     = mysqli_query($koneksi, "SELECT * FROM register WHERE id_user = $auth");

  $saldo  = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_user = $auth");

  if (mysqli_num_rows($saldo) === 1) {
    $uang   = mysqli_fetch_assoc($saldo);
    $format = number_format($uang["saldo"], 0, ",", ".");

  }else{
    $format = 0;
  }
  

  $date   = date('d-m-Y');

  $dor = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE id_user ='$auth' AND riwayat='Pengisian' ");

  // echo $date;
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pengeluaran</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/riwayat.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
      /* script menghilangkan Horizontal Scroll */
      html, body {
      max-width: 100%;
      overflow-x: hidden;
      }

      .paragraph {
      width: 150%;
      }
      .header{
        font-size:50px; 
        background: skyblue;
        margin-top: 30px;
        padding-bottom: 10px;
      }
      .header_pemasukkan{
        font-size: 50px;
        background: skyblue;
        margin-top: 20px;
        padding-bottom: 2px;
      }
      .header_pengeluaran{
        font-size: 50px;
        background: skyblue;
        margin-top: 20px;
        padding-bottom: 2px;
      }
      .saldo{
        font-size: 30px;
          margin: 35px;
          font-family: sans-serif;
      }
      .pengeluaran-pemasukan{
        font-size: 25px;
        margin-top: 10px;
        text-decoration: none;
      }
      .pengeluaran-pemasukan-saldo{
        font-size: 20px;
        text-decoration: none;
      }
      .bon{
        margin-left: 90px;
      }
      .bon-2{
        font-size: 17px;
        margin-left: 90px;
      }
      .duit{
        font-size: 90px;
      }
</style>
</head>
<body>
  <?php include '../navbar/nav.php' ?>
   <center>
   	<h1 class="header_pemasukkan">PEMASUKAN</h1>
   </center>
 
    <div>
      <div class="container fw-bold" style="  max-width: 1800px;">
        <?php foreach ($dor as $key): ?>
        <div class="row mt-2">
          <div class="col-6">         
            <p style="margin-left: 103px; "><?php echo $key["riwayat"] ?></p>
            <p style="margin-left: 103px; "><?php echo $key["tanggal"]; ?></p>
          </div>
          <div class="col-3" style="  margin-left: 90px;">Rp <?php echo number_format($key["aksi"], 0, ".", "."); ?></div>
          <hr style="margin-left: 114px;">
        </div>
        <?php endforeach ?>
      </div>
    </div>

   <div>
     <div class="container absolute">
       <footer class="py-3 my-4">
         <ul class="nav justify-content-center border-buttom pb-3 mb-3">
           <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
           <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
           <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
           <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
           <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
         </ul>
         <p class="text-center text-muted">© 2021 Company,Inc</p>
       </footer>
     </div>
   </div>


</body>
</html>