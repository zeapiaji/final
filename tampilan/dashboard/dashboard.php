<?php 
	session_start();
	include '../../db.php';
	include '../../auth/adminSession.php';
	$id = $_SESSION["auth"];

	$parameter = mysqli_query($koneksi, "SELECT * FROM register WHERE id_user='$id' ");
	$row       = mysqli_fetch_assoc($parameter);

	$kelas = $row["id_kelas"];

	if($row["id_role"] == 3){
		$siswas = mysqli_query($koneksi, "SELECT * FROM register INNER JOIN kelas ON register.id_kelas = kelas.id_kelas INNER JOIN gender ON register.id_gender = gender.id_gender WHERE register.id_role = 2");

		$saldo = mysqli_query($koneksi, "SELECT sum(saldo) as uang FROM saldo INNER JOIN register ON saldo.id_user = register.id_user INNER JOIN kelas ON kelas.id_kelas = register.id_kelas WHERE register.id_role = 2");

		$penabung = mysqli_query($koneksi, "SELECT * FROM register WHERE id_role=0 ");

	}elseif($row["id_role"] == 1){
		$siswas = mysqli_query($koneksi, "SELECT * FROM register INNER JOIN kelas ON register.id_kelas = kelas.id_kelas INNER JOIN gender ON register.id_gender = gender.id_gender WHERE register.id_role = 2 AND register.id_kelas ='$kelas'");

		$saldo = mysqli_query($koneksi, "SELECT sum(saldo) as uang FROM saldo INNER JOIN register ON saldo.id_user = register.id_user INNER JOIN kelas ON kelas.id_kelas = register.id_kelas WHERE register.id_role = 2 AND register.id_kelas='$kelas' ");

		$penabung = mysqli_query($koneksi, "SELECT * FROM konfirmasi INNER JOIN register ON konfirmasi.id_user = register.id_user WHERE register.id_kelas ='$kelas' ");
	}
	
	

	$ttl_penabung= mysqli_num_rows($penabung);

	$total = mysqli_num_rows($siswas);

	$siswa = mysqli_fetch_assoc($siswas);

	$uang   = mysqli_fetch_assoc($saldo);

	$rupiah= number_format($uang["uang"], 0, ",", ".");

 ?>
<body style="background-image: url('https://initiate.alphacoders.com/images/740/cropped-1600-1200-740377.png?4699');">
	<?php include '../navbar/nav.php'; ?>
	<div class="container-fluid">

			<div class="row">

				<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                      <div class="card">
                        <div class="card-header p-3 pt-2">
                          <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <img src="../../source/svg/user-graduate-solid.svg" style="width: 55px;">
                          </div>
                          <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">
                            	<?php 
							    	if ($row["id_role"] == 3) {
							    		echo "Total Murid";
							    	}else{
							    		echo "Total Murid ". $siswa["kelas"];
							    	}
					     		?>
					     	</p>
                            <h4 class="mb-0"><?php echo $total ?></h4>
                          </div>
                        </div>
                        <hr class="dark horizontal my-0">
                          <div class="card-footer p-3 btn btn-light" onclick="window.location.href = 'datasiswa.php';">
                            <span class="text-success text-sm font-weight-bolder"></span>Selengkapnya
                          </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                      <div class="card">
                        <div class="card-header p-3 pt-2">
                          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <img src="../../source/svg/users-solid.svg" style="width: 85px; ">
                          </div>
                          <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize" style="margin-top: 2px;">
								<?php 
								    if ($row["id_role"] == 1) {
								     	echo "Saldo";
								     }else{
								     	echo "Total Guru";
								     } ?>
							</p>
							<p class="text-sm mb-0 text-capitalize">
								<?php if($row["id_role"] == 3){
							  		$totalguru = mysqli_query($koneksi, "SELECT * FROM register WHERE id_role= 1");
							   		echo mysqli_num_rows($totalguru);
							   	?>	
                            </p>
                            <h4 class="text-sm mb-1 text-capitalize">
                            	<?php  }else{
								    		echo "Rp". $rupiah;
								    	} ?>
                            </h4>
                          </div>
                        </div>
                        <hr class="dark horizontal my-0">
                          <div class="card-footer p-3 btn btn-light">
                              <span class="text-success text-sm font-weight-bolder"></span>
                            <?php if ($row["id_role"] == 1){ ?>
					    		<div onclick="window.location.href = 'datasaldo.php';">Selengkapnya</div>
					    	<?php }else{ ?>
					    		<div onclick="window.location.href = 'dataguru.php';">Selengkapnya</div>
					    	<?php } ?>
                          </div>
                        </div>
                      </div>

                    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                      <div class="card">
                        <div class="card-header p-3 pt-2">
                          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                          	<?php if ($row["id_role"] == 3){ ?>
                          		<img src="../../source/svg/user-times-solid.svg" style="width: 72px;">
                          	<?php }else{ ?>
                            	<img src="../../source/svg/piggy-bank-solid.svg" style="width: 72px;">
                          	<?php } ?>
                          </div>
                          <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">
								<?php if ($row["id_role"] == 1) {
							    	echo "Penabung Hari ini";
							    }else{
							    	echo "Siswa yang telah di hapus";
							    } ?>                            	
                            </p>
                            <h4 class="mb-0"><?php echo $ttl_penabung; ?></h4>
                          </div>
                        </div>
                        <hr class="dark horizontal my-0">
                          <div class="card-footer p-3 btn btn-light">
                              <span class="text-success text-sm font-weight-bolder"></span>
						                <?php if ($row["id_role"] == 1){ ?>
											    		<div onclick="window.location.href = 'listpenabung.php';">Selengkapnya</div>
											    	<?php }else{ ?>
											    		<div onclick="window.location.href = 'deleteduser.php';">Selengkapnya</div>
											    	<?php } ?>
                          </div>
                        </div>
                      </div>

			</div>
	</div>
</body>



