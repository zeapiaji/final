<?php 
	session_start();

	include '../../db.php';
	include '../../auth/userSession.php';

	$auth   = $_SESSION['auth'];

	$db     = mysqli_query($koneksi, "SELECT * FROM register WHERE id_user = $auth");

	$saldo  = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_user = $auth");

	$uang   = mysqli_fetch_assoc($saldo);

	$format = number_format($uang["saldo"], 0, ",", ".");

	$date   = date('d-m-Y');
	// echo $date;
 ?>

<!-- BG -->
<link rel="stylesheet" type="text/css" href="../../public/css/main.css">
<body class="bg-img">


<!-- Toast -->
	<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
	  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
	    <div class="toast-header">
	      <img src="../../source/aset/main-icon.png" style="width: 50px;" class="rounded me-2" alt="...">
	      <strong class="me-auto">TabunganQ</strong>
	      <small>Baru saja</small>
	      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
	    </div>
	    <div class="toast-body">
	      Saldo berhasil ditambahkan,
	      Permintaan sedang dalam antrian.
	      <a href="#" id="detail-toast">detail</a>
	    </div>
	  </div>
	</div>


<?php include '../navbar/nav.php'; ?>
	<div class="bg-dark rounded mt-4 container text-light border border-2 pt-3 pb-3">	
		<h3 style="font-family: Comic Sans Ms">Rp. <?php echo $format ?></h3>
		Isi Saldo
		<form id="main" action="../../route/web.php" method="post">
			<h3>Saldo : </h3>
			<input type="number" class="form-control" name="saldo" required>
			<h3 class="mt-4">Pesan :</h3>
			<textarea class="form-control " name="pesan" required>
			</textarea>
			<center>
				<button type="submit" class="mt-2 btn btn-outline-light" name="nabung" id="ya" value="
				<?php echo $auth; ?>">Kirim</button>
				<!-- Toast Show -->
					<?php if ('$auth'){ ?>
						<script type="text/javascript">$('#ya').on('click',function(e){
							e.preventDefault()
							  $('#liveToast').toast('show');
							  $('#main')[0].reset()
							})
						</script>
					<?php } ?>
					
			</center>
		</form>
	</div>
</body>