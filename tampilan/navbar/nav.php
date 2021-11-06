<?php include '../../public/head/head.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark border-bottom border-2 border-light" style="background: linear-gradient(to right,#043927,#078d5f, #043927);">
      <div class="container-fluid">
        <h3 class="navbar-brand text-ligt">Tabungan Q</h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
           <?php if (isset($_SESSION["auth"])){ ?>
            <?php 
            $id   = $_SESSION['auth'];
            $data = mysqli_query($koneksi, "SELECT * FROM register WHERE id_user = $id");
            $nama = mysqli_fetch_assoc($data); ?>
              <li class="nav-item dropdown navbar-nav" style="min-width:150px">
                  <a class="nav-link dropdown-toggle text-white" href="" id="navbarDropdown" style="font-size: 20px" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $nama["nama"]; ?>
                  </a>
                  <ul class="dropdown-menu text-white" aria-labelledby="navbarDropdown">
                    <li ><a class="dropdown-item" href="../home/profile.php" calss="text-white">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <?php if ($nama["id_role"] == 2){ ?>
                    <li><a href="../home/home.php" class="dropdown-item" calss="text-white">Home </a></li>
                    <?php }elseif($nama["id_role"] == 1){ ?>
                    <li><a href="../dashboard/dashboard.php" class="dropdown-item" calss="text-white">Dashboard</a></li>
                    <?php } ?>  
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <a href="../../controller/logout.php" class="dropdown-item" calss="text-white">Logout</a>
                    </li>
                  </ul>
                </li>
           <?php }else{ ?>
              <a href="../login/register.php" class="text-decoration-none text-white">Register</a>
           <?php } ?>
           </ul>
        </div>
      </div>
    </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>