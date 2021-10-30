<?php include '../../public/head/head.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark border-bottom border-2 border-light" style="background: linear-gradient(to right,#043927,#078d5f, #043927);">
      <div class="container">
        <h3 class="navbar-brand text-ligt">Tabungan Q</h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
           <?php if (isset($_SESSION["Login"])){ ?>
              <li class="nav-item dropdown navbar-nav" style="min-width:150px">
                  <a class="nav-link dropdown-toggle text-white" href="" id="navbarDropdown" style="font-size: 20px" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $_SESSION['nama']; ?>
                  </a>
                  <ul class="dropdown-menu text-white" aria-labelledby="navbarDropdown">
                    <li ><a class="dropdown-item" href="../tampilan/profile.php" calss="text-white">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a href="../tampilan/home.php" class="dropdown-item" calss="text-white">Home </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <a href="../controller/logout.php" class="dropdown-item" calss="text-white">Logout</a>
                    </li>
                  </ul>
                </li>
           <?php }else{ ?>
              <a href="../register/register.php" class="text-decoration-none text-white">Register</a>
           <?php } ?>
           </ul>
        </div>
      </div>
    </nav>