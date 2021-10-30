<?php 
	include '../../db.php';

	$list = mysqli_query($koneksi, "SELECT * FROM konfirmasi INNER JOIN register ON konfirmasi.id_user = register.id_user ");

 ?>
 
<body>
	<?php include '../navbar/nav.php'; ?>
	<?php foreach ($list as $key): ?>
		<div class="card" style="width: 18rem;">
		  <img src="../../source/gambar.jpg" class="card-img-top" alt="...">
		  <div class="card-body">
		  	<h5 class="card-text"><?php echo $key["nama"]; ?></h5>
		    <p class="card-text">Pesan : <?php echo $key["pesan"]; ?></p>
		    <p class="card-text">Rp. <?php $rupiah = number_format($key["uang"], 0, ",", "."); echo $rupiah;  ?></p>
		    <form action="../../route/web.php" method="post">
		    	<button class="btn btn-dark border border-2 border-danger text-danger" type="submit" value="<?php echo $key["id_konfirmasi"]; ?>">Konfirmasi</button>
		    </form>
		  </div>
		</div>
	<?php endforeach ?>
</body>