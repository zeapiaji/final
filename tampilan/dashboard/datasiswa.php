<?php  
	include '../../db.php';

	$siswa = mysqli_query($koneksi, "SELECT * FROM register INNER JOIN kelas ON register.id_kelas = kelas.id_kelas INNER JOIN gender ON register.id_gender = gender.id_gender ");

	$no = 1;

 ?>
<body class="bg-dark">
	<?php include '../navbar/nav.php'; ?>
	<div class="container pt-3 pb-2 mt-3 rounded border border-2 border-light" style="background: linear-gradient(to right,#043927,#078d5f, #043927);">
		<div class="row container mt-3">
			<a href="dashboard.php" class="text-decoration-none text-white">Dashboard</a>
			<a href="tambahkelas.php" class="text-end text-decoration-none text-white">Tambah Kelas</a>
			<table class="table text-light">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Nama</th>
			      <th scope="col">Gender</th>
			      <th scope="col">Kelas</th>
			      <th scope="col">Nis</th>
			      <th scope="col">No Tlp</th>
			      <th scope="col">Hapus</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($siswa as $key): ?>
			  		<tr>
				      <th scope="row"><?php echo $no++ ?></th>
				      <td><?php echo $key["nama"]; ?></td>
				      <td><?php echo $key["gender"]; ?></td>
				      <td><?php echo $key["kelas"]; ?></td>
				      <td><?php echo $key["nis"]; ?></td>
				      <td><?php $not = $key["no_tlp"];
				      $tlp = number_format($not, 0, ",", "-");
				      echo $tlp ?></td>
				      <td>
				      	<form action="../../route/web.php" method="post">
				      		<button type="submit" value="<?php echo $key["id_user"]; ?>" name="hapussiswa" class="btn bg-dark border border-2 border-danger text-danger">Hapus</button>
				      	</form>
				      </td>
				    </tr>
			  	<?php endforeach ?>
			  </tbody>
			</table>
		</div>
	</div>
	
</body>