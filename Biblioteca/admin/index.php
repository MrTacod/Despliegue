<?php

    include ("app/database.php");
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
        <script src="js/sweet-alert.min.js"></script>
        <link rel="stylesheet" href="css/sweet-alert.css">
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="css/style.css">
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
                        <li><a href="home.html"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Libros</a></li>
                        <li><a href="home.html"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Categorías</a></li>
                        <li><a href="home.html"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos y reservas</a></li>
                        <li><a href="contacto/contacto.php"><i class="zmdi zmdi-email zmdi-hc-fw"></i>&nbsp;&nbsp; Contacto</a></li>
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
                                    <a href="login/cerrar-sesion.php"><i class="zmdi zmdi-power btn btn-danger btn-lg"></i></a>
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
                        /* En caso de que la sesión sea de un usuario registrado, se mostrarán los botones de favoritos, carrito y el usuario junto a un botón para cerrar sesión */
                        } else if(isset($_SESSION['correo'])){
                        ?>
                            <figure>
                                <img src="assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                            </figure>
                            <li style="color:#fff; cursor:default;">
                                <span class="all-tittles fs-5"><?php echo $_SESSION['nombre'] ?></span>
                                <li class="tooltips-general exit-system-button" data-href="index.html" data-placement="bottom" title="Salir del sistema">
                                    <a href="login/cerrar-sesion.php"><i class="zmdi zmdi-power btn btn-danger btn-lg"></i></a>
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
                        /* En caso de que no sea ninguna de las 2 opciones, es decir, que sea 'invitado', se mostrará unicamente un botón para loguearse */
                        } else {
                        ?>
                            <li class="tooltips-general"  data-href="index.html" data-placement="bottom" title="Iniciar sesión">
                                <a href="login/login.php"><i class="zmdi zmdi-account-circle btn btn-info btn-lg"></i>.</a>
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
            <section class="full-reset text-center" style="padding: 40px 0;">
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi">Libro</i></div>
                    <div class="tile-name all-tittles">Reservar</div>
                    <div class="tile-num full-reset">Título</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi">Libro</i></div>
                    <div class="tile-name all-tittles">Reservar</div>
                    <div class="tile-num full-reset">Título</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi">Libro</i></div>
                    <div class="tile-name all-tittles">Reservar</div>
                    <div class="tile-num full-reset">Título</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi">Libro</i></div>
                    <div class="tile-name all-tittles">Reservar</div>
                    <div class="tile-num full-reset">Título</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi">Libro</i></div>
                    <div class="tile-name all-tittles">Reservar</div>
                    <div class="tile-num full-reset">Título</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi">Libro</i></div>
                    <div class="tile-name all-tittles">Reservar</div>
                    <div class="tile-num full-reset">Título</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi">Libro</i></div>
                    <div class="tile-name all-tittles">Reservar</div>
                    <div class="tile-num full-reset">Título</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi">Libro</i></div>
                    <div class="tile-name all-tittles">Reservar</div>
                    <div class="tile-num full-reset">Título</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi">Libro</i></div>
                    <div class="tile-name all-tittles">Reservar</div>
                    <div class="tile-num full-reset">Título</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi">Libro</i></div>
                    <div class="tile-name all-tittles">Reservar</div>
                    <div class="tile-num full-reset">Título</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi">Libro</i></div>
                    <div class="tile-name all-tittles">Reservar</div>
                    <div class="tile-num full-reset">Título</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi">Libro</i></div>
                    <div class="tile-name all-tittles">Reservar</div>
                    <div class="tile-num full-reset">Título</div>
                </article>
            </section>
            <footer class="footer full-reset" style="height: 128px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <h4 class="all-tittles">Acerca de</h4>
                            <p>
                                Biblioteca escolar nacional. Rincón ideal para aprender y liberar la imaginación sin ningún tipo de límites.
                                Encuentra todo tipo de libros del género que más te guste completos. Hasta 3 libros puedes reservar.
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <h4 class="all-tittles">Desarrollador</h4>
                            <ul class="list-unstyled">
                                <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp; Alejandro Torreblanca</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
    </html>

<?php

    } else {
        echo "<script type='text/javascript'>window.location.href = '../Biblioteca/installer/index-install.php';</script>"; 
    }

?>