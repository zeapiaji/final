<?php include '../../public/head/head.php'; ?>

<?php 
  session_start();
  include '../../db.php';

  $id   = $_SESSION["auth"];

  $data = mysqli_query($koneksi, "SELECT * FROM register INNER JOIN kelas ON register.id_kelas = kelas.id_kelas INNER JOIN gender ON register.id_gender = gender.id_gender WHERE register.id_user = $id");

  $row  = mysqli_fetch_assoc($data);
 ?>


  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">TabunganQ</a>
      <div class="d-flex">
        <div class="collapse navbar-collapse">
          <div class="dropstart ms-3">
            <img src="src/img/wallpaper.png" class="dropdown-toggle border border-2" style="width:50px; height:50px; border-radius:100%;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown">
            <ul class="dropdown-menu" id="menu-dropdown" aria-labelledby="dropdownMenuButton1">
            <?php if (isset($_SESSION["auth"])){ ?>
            <?php 
            $id   = $_SESSION['auth'];
            $data = mysqli_query($koneksi, "SELECT * FROM register WHERE id_user = $id");
            $nama = mysqli_fetch_assoc($data); ?>

            <!-- PP User -->
            <center>
            <?php if ($row["gambar"] == null){ ?>
            <img src="<?php echo $row["avatar"]; ?>" class="rounded-circle">
            <?php }else{ ?>
            <img src="<?php echo "../../source/".$row["gambar"]; ?>" class="mt-3 mb-2 border border-2" style="width:100px; height:100px; border-radius:100%;">
            <?php } ?>
            </center>

              <!-- Nama -->
              <li><div class="dropdown-item" id="nama"> <?php echo $nama["nama"]; ?></div></li>

              <!-- Kelas -->
              <li><div class="dropdown-item" id="kelas">Kelas</div></li>
              <hr style="width:100%;" id="line">

              <!-- Profile -->
              <li><a class="dropdown-item" id="profile" href="../home/profile.php">Profile</a></li>

              <!-- Dark Mode -->
              <li class="dropdown-item d-flex" id="dark-mode">Dark Mode<div class="form-check form-switch nav-item ms-5" style="color:white;">
              <input type="checkbox" role="switch" class="form-check-input" id="dark-theme">
              </div></li>

              <!-- Home -->
              <?php if ($nama["id_role"] == 2){ ?>
              <li><a class="dropdown-item" id="profile" href="../home/home.php">Home</a></li>
              
              <?php }elseif($nama["id_role"] == 1){ ?>
              <!-- Dashboard -->
              <li><a href="../dashboard/dashboard.php" class="dropdown-item" calss="text-white">Dashboard</a></li>
              <?php } ?> 

              <!-- Logout -->
              <li><a class="dropdown-item" id="logout" href="../../controller/logout.php">Logout</a></li>
            </ul>

            <!-- Register -->
              <?php }else{ ?>
                <a href="../login/register.php" class="text-decoration-none text-white">Register</a>
             <?php } ?>

          </div>
        </div>
      </div>
    </div>
</nav>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>