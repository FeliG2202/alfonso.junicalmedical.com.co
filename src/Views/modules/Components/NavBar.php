<nav class="sb-topnav navbar navbar-expand navbar-dark bg-turquesa">
  <!-- Navbar Brand-->
  <?php if (isset($_SESSION['session'])) { ?>
    <a class="navbar-brand" href="index.php?view=inicio2">
      <img src="<?php echo(host); ?>/src/Views/assets/img/logo.png" alt="Bootstrap" width="180" height="50">
    </a>
  <?php } else { ?>
    <a class="navbar-brand" href="index.php?view=inicio">
      <img src="<?php echo(host); ?>/src/Views/assets/img/logo.png" alt="Bootstrap" width="180" height="50">
    </a>
  <?php } ?>
  <!-- Sidebar Toggle-->
  <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
  <!-- Navbar Search-->
  <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
  </div>
  <!-- Navbar-->
  <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

        <?php if (isset($_SESSION['session'])) { ?>
          <li><a class="dropdown-item" href="index.php?view=salir">Salir</a></li>
        <?php } else { ?>
          <li><a class="dropdown-item" href="index.php?view=login">iniciar sesión</a></li>
        <?php } ?>
      </ul>
    </li>
  </ul>
</nav>