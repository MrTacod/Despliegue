<?php

    include ("../app/database.php");
    session_start();

    if ($connection) {

        /* Aquí compruebo si la sesión es 'invitado', 'admin' o un usuario registrado */

        if(isset($_SESSION['invitado'])){
            $invitado = $_SESSION['invitado'];
        } else if(isset($_SESSION['admin'])){
            $admin = $_SESSION['admin'];
        } else if(isset($_SESSION['correo'])){
            $correo = $_SESSION['correo'];

        /* En caso de que no sea ninguna de las 3 opciones, te redirige a la página de login */

        } else {
            header("Location: login/login.php"); 
        }

?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <title>Biblioteca del Saber</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
        <link rel="stylesheet" href="../css/sweet-alert.css">
        <link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/panel.css">
        <script src="https://kit.fontawesome.com/de65a6f925.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="navbar-lateral full-reset">
            <div class="visible-xs font-movile-menu mobile-menu-button"></div>
            <div class="full-reset container-menu-movile custom-scroll-containers">
                <div class="logo full-reset all-tittles">
                    <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                    Biblioteca Escolar del Saber
                </div>
                <div class="full-reset" style="background-color:#2B3D51; padding: 10px 0; color:#fff;">
                    <figure>
                        <img src="assets/img/logo.png" alt="Biblioteca" class="img-responsive center-box" style="width:55%;">
                    </figure>
                    <p class="text-center" style="padding-top: 15px;">Biblioteca Escolar del Saber</p>
                </div>
                <div class="full-reset nav-lateral-list-menu">
                    <ul class="list-unstyled">
                        <li><a href="home.html"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                        <li><a href="home.html"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp; Administración</a></li>
                        <li><a href="home.html"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registro de usuarios</a></li>
                        <li><a href="home.html"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Libros y catálogo</a></li>
                        <li><a href="home.html"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos y reservas</a></li>
                        <li><a href="home.html"><i class="zmdi zmdi-collection-text zmdi-hc-fw"></i>&nbsp;&nbsp; Términos y condiciones</a></li>
                        <li><a href="advancesettings.html"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp; Configuración</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content-page-container full-reset custom-scroll-containers">
            <nav class="navbar-user-top full-reset">
                <ul class="list-unstyled full-reset">
                    <?php
                    /* En caso de que la sesión sea 'admin', se mostrará un botón que te redirige a la página de administrador y un botón para loguearse */
                    if(isset($_SESSION['admin'])) {
                        ?>
                        <figure>
                            <img src="assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                        </figure>
                        <li style="color:#fff; cursor:default;">
                            <span class="all-tittles fs-5"><?php echo $_SESSION['nombre'] ?></span>
                            <li class="tooltips-general exit-system-button" data-href="index.html" data-placement="bottom" title="Salir del sistema">
                                <a href="../login/cerrar-sesion.php"><i class="zmdi zmdi-power btn btn-danger btn-lg"></i></a>
                            </li>
                            <li  class="tooltips-general search-book-button" data-href="searchbook.html" data-placement="bottom" title="Buscar libro">
                                <i class="zmdi zmdi-search"></i>
                            </li>
                            <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                                <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                            </li>
                            <li class="mobile-menu-button visible-xs" style="float: left !important;">
                                <i class="zmdi zmdi-menu"></i>
                            </li>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
            <div class="container">
                <div class="page-header">
                <h1 class="all-tittles">Sistema bibliotecario <small>Inicio</small></h1>
                </div>
            </div>

            <section style="margin: 20px;">
                <article>
                
                    <!-- Lista de mensajes -->

                    <h1><b>Lista de mensajes</b><a href="print/contacto-print-excel.php" id="print-excel-admin" style="float: right; margin-left: 15px; margin-right: 50px;">Excel <i class="fa-solid fa-file-excel"></i></a> <a href="print/contacto-print-pdf.php" id="print-pdf-admin" style="float: right;">PDF <i class="fa-solid fa-file-pdf"></i></a></h1>
                    <div id="scroll" style="margin: 30px; margin-right: 45px;">
                        <table class="table border border-primary" id="tabla-admin">
                            <thead>
                                <tr id="tr-admin">
                                <td scope="col" class="text-white"><b>Id</b></td>
                                <td scope="col" class="text-white"><b>Id_usuario</b></td>
                                <td scope="col" class="text-white"><b>Correo</b></td>
                                <td scope="col" class="text-white"><b>Mensaje</b></td>
                                <td scope="col" class="bg-success text-white"><b>Leído</b></td>
                                </tr>
                                <tbody id="tasksContacto"></tbody>
                            </thead>
                        </table>
                    </div>
                </article>
            </section>

            <div>
                <a href="admin-index.php"><button type="submit" class="btn btn-primary w-100 submit fs-5" style="margin-top: 50px; margin-left: 50px;">Volver al inicio</button></a>
            </div>
            
        </div>
        <script src="./js/jquery.js"></script>
        <script src="./js/app-user.js"></script>
    </body>
    </html>

<?php

    } else {
        echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
    }

?>