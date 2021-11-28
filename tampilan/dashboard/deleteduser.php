<?php 
    session_start();
	include '../../db.php';
	include '../../auth/superAdminSession.php';
	$siswa = mysqli_query($koneksi, "SELECT * FROM register INNER JOIN kelas ON kelas.id_kelas = register.id_kelas INNER JOIN gender ON gender.id_gender = register.id_gender WHERE id_role=0 ");
	$no = 1;
 ?>
 <body class="body-cs">
 	<?php include '../navbar/nav.php'; ?>
 	<div class="container pt-3 mt-3">
 		<div class="container pt-3 mt-3">

 		<div class="row">
 			<div class="col-4">
					<a href="dashboard.php" class="text-decoration-none text-muted up fw-bold utkbtn h5">
						<img src="../../source/svg/caret-square-left-solid.svg" style="width: 20px;"> Kembali
					</a>
				</div>
 			<div class="col-4">
 				<center class="txt"><h1>Kembalikan Siswa</h1></center>
 			</div>
 			<div class="col-4">
 				<div class="row">
 					<form action="../../route/web.php" method="post">
	 					<div class="col-6"><button type="submit" name="deleteAll" class="btn btn-outline-dark">Hapus Semua</button></div>
	 					<div class="col-6"><button type="submit" name="reverseAll" class="btn btn-outline-dark">Kembalikan Semua</button></div>
 					</form>
 					
 				</div>
 				
 			</div>
 		</div>
		

		<div class="form-floating mb-3">
			   	<input type="search" class="boxSearch form-control rounded border border-2" id="cari" onkeyup="cariSiswa()" placeholder="name@example.com" style="max-width: 200px;">
			   	<label for="floatingInput" class="form-label fw-bold">Cari siswa</label>
			</div>

		<!-- <div class="d-flex justify-content-center">
			<input type="" id="cari" onkeyup="cariSiswa()" name="" class="form-control mt-3" style="max-width: 430px" placeholder="Cari siswa ..">
		</div> -->
		<!-- <div class="row container mt-3">
			<a href="dashboard.php" class="text-decoration-none text-white">Dashboard</a>
			<form action="../../route/web.php" method="post">
				<button type="submit" name="deleteAll" class="btn-outline-primary">Hapus Semua</button>
				<button type="submit" name="reverseAll" class="btn-outline-primary">Kembalikan Semua</button>
			</form>
			<a href="tambahkelas.php" class="text-end text-decoration-none text-white">Tambah Kelas</ a> -->

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
			  	<?php if (mysqli_num_rows($siswa) == null): ?>
			  		<td colspan="7" class="text-center">Belum Ada siswa Yang dihapus</td>
			  	<?php endif ?>
			  	<?php foreach ($siswa as $key): ?>
			  		<tr>
				      <th scope="row"><?php echo $no++ ?></th>
				      <td>
				      	<h5><?php echo $key["nama"] ?></h5>
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
				      		<button type="submit" value="<?php echo $key["id_user"]; ?>" name="hapusSiswa" class="btn btn-outline-dark" onclick="hapusMurid()">Hapus</button>
				      		<button type="submit" value="<?php echo $key["id_user"]; ?>" name="kembalikanSiswa" class="btn btn-outline-dark">Kembalikan</button>
				      	</form>
				      </td>
				    </tr>
			  	<?php endforeach ?>
			  </tbody>
			</table>
		</div>
	</div>
	</div>
	<script>
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