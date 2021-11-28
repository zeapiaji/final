<?php 
session_start();
	include '../../db.php';
	include '../../auth/adminSession.php';
	$id = $_SESSION["auth"];

	$parameter = mysqli_query($koneksi, "SELECT * FROM register WHERE id_user='$id' ");
	$row       = mysqli_fetch_assoc($parameter);

	$kelas = $row["id_kelas"];


$dataSaldo = mysqli_query($koneksi, "SELECT * FROM saldo INNER JOIN register ON saldo.id_user = register.id_user WHERE register.id_role = 2 AND register.id_kelas = '$kelas' ORDER BY saldo DESC");
$no=1;
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
					<h1>Data Saldo</h1>
				</center>
			</div>
			<div class="col-4 text-end text-decoration-none text-white">
				
				</div>
			</div>

			<div class="form-floating mb-3">
			   		<input type="search" class="boxSearch form-control rounded border border-2" id="cari"placeholder="name@example.com" style="max-width: 200px;" onkeyup="cariSiswa()">
			   		<label for="floatingInput" class="form-label fw-bold">Cari siswa</label>
			   	</div>


 			<table class="table fw-bold mt-5">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Nama</th>
			      <th scope="col">Saldo</th>
			      <th scope="col">Penarikan</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($dataSaldo as $key): ?>
			  		<tr>
				      <th scope="row"><?php echo $no++ ?></th>
				      <td><?php echo $key["nama"]; ?></td>
				      <td>Rp. <?php $uang = $key["saldo"];
				      $format = number_format($uang, 0, ",", ".");
				      echo $format; ?></td>
				      <td>
				      		<form action="tarik.php" method="post">
				      			<button class="btn btn-outline-dark" value="<?php echo $key["id_user"]; ?>" name="id">Tarik</button>
				      		</form>
				      </td>
				    </tr>
			  	<?php endforeach ?>
			  	<tr>
					<td colspan="2" style="font-weight: bold;">Total :</td>
					<td colspan="2" >Rp <?php $saldo = mysqli_query($koneksi, "SELECT sum(saldo) as uang FROM saldo INNER JOIN register ON saldo.id_user = register.id_user WHERE register.id_role = 2 AND register.id_kelas= '$kelas' ");
					$row = mysqli_fetch_assoc($saldo);

					echo number_format($row["uang"], 0, ".", ".");
					 ?></td>
				</tr>
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