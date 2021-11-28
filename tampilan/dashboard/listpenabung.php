<?php 
	session_start();
	include '../../db.php';
	include '../../auth/adminSession.php';

	$id = $_SESSION["auth"];

	$query = mysqli_query($koneksi, "SELECT	* FROM	register WHERE	id_user='$id'");

	$row = mysqli_fetch_assoc($query);

	$kelas = $row["id_kelas"];


	$list = mysqli_query($koneksi, "SELECT * FROM konfirmasi INNER JOIN register ON konfirmasi.id_user = register.id_user INNER JOIN kelas ON register.id_kelas = kelas.id_kelas WHERE register.id_role= 2 AND register.id_kelas = '$kelas' ORDER BY id_konfirmasi DESC");

	$coba = mysqli_query($koneksi, "SELECT * FROM kelas ");

	$row  = mysqli_fetch_assoc($coba);

	$no = 1;

 ?>
 
<body>
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
					<center class="txt">
						<h1>List Penabung</h1>
					</center>
				</div>
				<div class="col-4 text-end text-decoration-none text-white">
					
					</div>
				</div>

				<div class="form-floating mb-3">
				   		<input type="search" class="boxSearch form-control rounded border border-2" id="cari" placeholder="name@example.com" style="max-width: 200px;" onkeyup="cariSiswa()">
				   		<label for="floatingInput" class="form-label fw-bold">Cari siswa</label>
				   	</div>

		<table class="table fw-bold mt-5">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Nis</th>
					<th>Pesan</th>
					<th>Kelas</th>
					<th>Tanggal</th>
					<th>Nabung</th>
					<th>Konfirm</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($list as $key ): ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $key["nama"]; ?></td>
						<td><?php echo $key["nis"] ?></td>
						<td>
							<span class="collapse" id="baca"><?php echo $key['pesan']; ?></span>
							<a href="#baca" class="btn btn-outline-dark" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Baca Pesan</a>
						</td>
						<td><?php echo $key["kelas"] ?></td>
						<td><?php echo $key["date"] ?></td>
						<td>Rp <?php echo number_format($key["uang"], 0,".","."); ?></td>
						<td>
							<form action="../../route/web.php" method="post">
						    	<button class="btn btn-outline-dark" type="submit" value="<?php echo $key["id_konfirmasi"]; ?>" name="tambahsaldo">Konfirmasi</button>
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