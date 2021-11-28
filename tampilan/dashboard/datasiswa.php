<?php  
	session_start();
	include '../../db.php';
	include '../../auth/adminSession.php';
	$id = $_SESSION["auth"];

	$parameter = mysqli_query($koneksi, "SELECT * FROM register WHERE id_user='$id' ");
	$row       = mysqli_fetch_assoc($parameter);

	$kelas = $row["id_kelas"];

	if ($row["id_role"] == 1) {
		$siswa = mysqli_query($koneksi, "SELECT * FROM register INNER JOIN kelas ON register.id_kelas = kelas.id_kelas INNER JOIN gender ON register.id_gender = gender.id_gender WHERE register.id_role = 2 AND register.id_kelas ='$kelas' ORDER BY nama ASC ");
	}else{
		$siswa = mysqli_query($koneksi, "SELECT * FROM register INNER JOIN kelas ON register.id_kelas = kelas.id_kelas INNER JOIN gender ON register.id_gender = gender.id_gender WHERE register.id_role = 2 ORDER BY nama ASC ");
	}
	

	$no = 1;

 ?>
<body class="body-cs">
	<?php include '../navbar/nav.php'; ?>


	<div class="container pt-3 mt-3">
		<div class="container pt-3 mt-3">

<!-- Header -->			
			<div class="row ">
				<div class="col-4">
					<a href="dashboard.php" class="text-decoration-none text-muted up fw-bold utkbtn h5">
						<img src="../../source/svg/caret-square-left-solid.svg" style="width: 20px;"> Kembali
					</a>
				</div>
				<div class="col-4">
					<center class="txt"><h1>List Siswa</h1></center>
				</div>
				<div class="col-4">
					<?php if ($row["id_role"] == 3): ?>
						<a href="tambahkelas.php" class="text-end text-decoration-none text-dark">Tambah Kelas</a>
					<?php endif ?>
				</div>
			</div>

			<div class="form-floating mb-3">
			   	<input type="search" class="boxSearch form-control rounded border border-2" id="cari" style="max-width: 200px;" onkeyup="cariSiswa()">
			   	<label for="floatingInput" class="form-label fw-bold">Cari siswa</label>
			</div>		
<!-- /Header -->

				<table class="table fw-bold mt-5">
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
				  <tbody id="daftarSiswa">
				  	<?php foreach ($siswa as $key): ?>
				  		<tr>
					      <th scope="row"><?php echo $no++ ?></th>
					      <td>
					      	<form action="../../route/web.php" method="post">
					      		<button type="submit" name="lihatRiwayat" value="<?php echo $key["id_user"] ?>" class="btn btn-outline-dark"><?php echo $key["nama"]; ?></button>
					      	</form>
					      </td>
					      <td><?php echo $key["gender"]; ?></td>
					      <td><?php echo $key["kelas"]; ?></td>
					      <td><?php $nis = sprintf("%s.%s.%s",
	                                substr($key["nis"], 0, 4),
	                                substr($key["nis"], 4, 2),
	                                substr($key["nis"], 6)); 
	                                echo $nis ?></td>

					      <td>0<?php $not = $key["no_tlp"];
					      // $tlp = number_format($not, 0, ",", "-");
					      $result = sprintf("%s-%s-%s",
					                substr($key["no_tlp"], 1, 3),
					                substr($key["no_tlp"], 4, 4),
					                substr($key["no_tlp"], 8)); 
					                echo $result ?></td>
					      <td>
					      	<form action="../../route/web.php" method="post">
					      		<button type="submit" value="<?php echo $key["id_user"]; ?>" name="hapussiswa" class="btn btn-outline-dark" onclick="hapusMurid()">Hapus</button>
					      	</form>
					      </td>
					    </tr>
				  	<?php endforeach ?>
				  </tbody>
				</table>
			</div>
		</div>	
	</div>
	<script >
		function hapusMurid(){
            alert('Apakah Kamu Yakin Ingin Menghapus?');
        }
        
		function cariSiswa(){
		            var input = document.getElementById("cari");
		            var filter = input.value.toLowerCase();
		            var ul = document.getElementById("daftarSiswa");
		            var li = document.querySelectorAll("tr")
		            console.log(li)
		            for(var i = 0; i<li.length; i++){
		                var ahref = document.querySelectorAll("tr")[i];
		                if(ahref.innerHTML.toLowerCase().indexOf(filter) > -1){
		                    li[i].style.display = "";
		                }else{
		                    li[i].style.display = "none";
		                }
		            }
		}
	</script>

</body>