<!DOCTYPE html>
<html lang="es">
<head>
    <title>JUNICAL MEDICAL S.A.S</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- STYLES CSS -->
    <link rel="manifest" href="<?php echo(host); ?>/src/Views/assets/js/manifest.json">
    <link rel="stylesheet" href="<?php echo(host); ?>/src/Views/assets/fontawesome/css/all.min.css">
    <link href="<?php echo(host); ?>/src/Views/assets/css/index.css" rel="stylesheet" />
    <link href="<?php echo(host); ?>/src/Views/assets/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon widt" href="<?php echo(host); ?>/src/Views/assets/img/LogoBot.png"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.9/dayjs.min.js" integrity="sha512-q4Xn+ZU2K+dqJPL8a3TiyGsDa31IkR/rLt/w+fy8jLrx8TdXj0dLM1Aq4aPXnOOKxHEya/bD9DePDB2DHm4jJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="<?php echo(host); ?>/src/Views/assets/js/validador_registro_menu.js"></script>
    <script type="text/javascript">const host = "<?php echo(host); ?>";</script>
    <script src="<?php echo(host); ?>/src/Views/assets/js/scripts.js"></script>
    <script type="text/javascript" src="<?php echo(host); ?>/src/Views/assets/js/functions.js"></script>
</head>

<body class="sb-nav-fixed">
    <!-- se llama el menu de navegación -->
    <?php include("modules/Components/NavBar.php"); ?>

    <!-- se llama el contenido de la pagina-->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include_once("modules/Components/Sidebar.php"); ?>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php include(
                        (new \PHP\Controllers\TemplateControlador())->cargarPaginaAlTemplate()
                    ); ?>
                </div>
            </main>

            <?php
            include_once("modules/Components/Footer.php");
            ?>

        </div>
    </div>
</body>
</html>
