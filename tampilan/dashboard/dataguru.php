<?php  
	session_start();
	include '../../db.php';
	include '../../auth/adminSession.php';

		$siswa = mysqli_query($koneksi, "SELECT * FROM register INNER JOIN kelas ON register.id_kelas = kelas.id_kelas INNER JOIN gender ON register.id_gender = gender.id_gender WHERE register.id_role = 1 ORDER BY nama ASC ");
	

	$no = 1;

 ?>
<body class="body-cs">
	<?php include '../navbar/nav.php'; ?>
	<div class="container pt-3 mt-3">
		<div class="container pt-3 mt-3">
		<?php if(isset($_SESSION["success"])): ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
	          <strong>Penambahan Guru Berhasil</strong>
	          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	        </div>
		<?php endif ?>
		<?php if (isset($_SESSION["success"])): ?>
			<?php unset($_SESSION['success']) ?>
		<?php endif ?>
		
		<div class="row">
			<div class="col-4">
					<a href="dashboard.php" class="text-decoration-none text-muted up fw-bold utkbtn h5">
						<img src="../../source/svg/caret-square-left-solid.svg" style="width: 20px;"> Kembali
					</a>
				</div>
			<div class="col-4">
				<center class="txt">
					<h1>List Guru</h1>
				</center>
			</div>
			<div class="col-4">
				<a href="tambahguru.php" class="text-end text-decoration-none text-dark">Tambah Guru</a>
			</div>
		</div>	

		<!-- Search -->
		<div class="form-floating mb-3">
			   	<input type="search" class="boxSearch form-control rounded border border-2" onkeyup="cariSiswa()" id="cari" placeholder="name@example.com" style="max-width: 200px;">
			   	<label for="floatingInput" class="form-label fw-bold" >Cari Guru</label>
			</div>
				<!-- Search Default Kukuh -->
				<!-- <div class="d-flex justify-content-center">
			<input type="" id="cari" onkeyup="cariSiswa()" name="" class="form-control mt-3" style="max-width: 430px" placeholder="Cari Guru ..">
				</div> -->

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
				      <td><?php echo $key["nama"]; ?></td>
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
				      		<button type="submit" value="<?php echo $key["id_user"]; ?>" name="hapusGuru" class="btn btn-outline-dark" onclick="hapusMurid()">Hapus</button>
				      	</form>
				      </td>
				    </tr>
			  	<?php endforeach ?>
			  </tbody>
			</table>
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