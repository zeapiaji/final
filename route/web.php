<?php 
 include '../controller/adminController.php';

if (isset($_POST['tariksaldo'])) {
	tarikSaldo($_POST);
}

if (isset($_POST["tambahkelas"])) {
	tambahKelas($_POST);
}

if (isset($_POST["hapuskelas"])) {
	hapusKelas($_POST);
}
if (isset($_POST["hapussiswa"])) {
	hapusSiswa($_POST);
}
 ?>