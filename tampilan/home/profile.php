<?php 
	session_start();
	include '../../db.php';

	$id   = $_SESSION["auth"];

	$data = mysqli_query($koneksi, "SELECT * FROM register INNER JOIN kelas ON register.id_kelas = kelas.id_kelas INNER JOIN gender ON register.id_gender = gender.id_gender WHERE register.id_user = $id");

	$row  = mysqli_fetch_assoc($data);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 	<?php include '../navbar/nav.php' ?>
 	<div class="container mt-3 pt-3 pb-3 rounded">
 		<center>
 			<?php if ($row["gambar"] == null){ ?>
 				<img src="<?php echo $row["avatar"]; ?>" class="rounded-circle">
 			<?php }else{ ?>
 				<img src="<?php echo "../../source/".$row["gambar"]; ?>" class="rounded-circle" style="width: 200px; height:200px ;">
 			<?php } ?>
 			<h3 class="text-danger" style="font-family: Comic Sans Ms;"><?php echo $row["nama"]; ?></h3>
 			<a href="updateprofile.php" class="btn btn-outline-light">Update Profile</a>
 		</center>
 	</div>
 </body>
 </html>