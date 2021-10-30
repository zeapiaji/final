<?php 
	$db = mysqli_connect("localhost", "root", "", "latihan");

	function tarikSaldo($data){
		global $db;

		$id 	= $data["tariksaldo"];
		$saldo  = $data["saldo"];

		$dataSaldo = mysqli_query($db, "SELECT * FROM saldo WHERE id_user = $id");

		$row 	   = mysqli_fetch_assoc($dataSaldo);

		if ($saldo < 0) {
			echo "<script>
			alert('Target pasarnya bukan anda1');
			document.location = '../tampilan/dashboard/tarik.php'
			</script>";
		}elseif ($saldo > $row["saldo"] ) {
			echo "<script>
			alert('Target pasarnya bukan anda');
			document.location = '../tampilan/dashboard/tarik.php'
			</script>";
		}elseif($row["saldo"] >= $saldo ) {
			$kurang = $row["saldo"] - $saldo;
			$update = mysqli_query($db, "UPDATE saldo SET saldo='$kurang' WHERE id_user = $id");

			if ($update) {
				echo "<script>
				alert('Penarikan Saldo Sukses');
				document.location = '../tampilan/dashboard/datasaldo.php'
				</script>";
			}else{
				echo "<script>
				alert('Lagi error keknya');
				document.location = '../tampilan/dashboard/tarik.php'
				</script>";
			}
		}else{
			echo "<script>
			alert('Lagi error keknya');
			document.location = '../tampilan/dashboard/tarik.php'
			</script>";
		}
	}

	function tambahKelas($data){
		global $db;

		$kelas = $data["kelas"];

		$tambahKelas = mysqli_query($db, "INSERT INTO kelas(`kelas`) VALUES ('$kelas') ");

		if($tambahKelas){
			echo "<script>
			alert('Penambahan Kelas Berhasil');
			document.location = '../tampilan/dashboard/tambahkelas.php'
			</script>";
		}else{
			echo "<script>
			alert('Lagi error keknya');
			document.location = '../tampilan/dashboard/tambahkelas.php'
			</script>";
		}
	}
	function hapusKelas($data){
		global $db;

		$id 	= $data["hapuskelas"];

		$destroy= mysqli_query($db, "DELETE FROM kelas WHERE id_kelas = $id");

		if($destroy){
			echo "<script>
			alert('Hapus Kelas Berhasil');
			document.location = '../tampilan/dashboard/tambahkelas.php'
			</script>";
		}else{
			echo "<script>
			alert('Penambahan Kelas Gagal');
			document.location = '../tampilan/dashboard/tambahkelas.php'
			</script>";
		}
	}

	function hapusSiswa($data){
		global $db;

		$id 	= $data["hapussiswa"];

		$destroy= mysqli_query($db, "DELETE FROM register WHERE id_user = $id");

		if($destroy){
			echo "<script>
			alert('Hapus Murid Berhasil');
			document.location = '../tampilan/dashboard/datasiswa.php'
			</script>";
		}else{
			echo "<script>
			alert('Penambahan Murid Gagal');
			document.location = '../tampilan/dashboard/datasiswa.php'
			</script>";
		}

	}
 ?>