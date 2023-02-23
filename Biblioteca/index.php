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
                        <li>
                            <div class="dropdown-menu-button"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp; Administración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                            <ul class="list-unstyled">
                                <li><a href="institution.html"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Datos institución</a></li>
                                <li><a href="provider.html"><i class="zmdi zmdi-truck zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo proveedor</a></li>
                                <li><a href="category.html"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva categoría</a></li>
                                <li><a href="section.html"><i class="zmdi zmdi-assignment-account zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva sección</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registro de usuarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                            <ul class="list-unstyled">
                                <li><a href="admin.html"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo administrador</a></li>
                                <li><a href="teacher.html"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo docente</a></li>
                                <li><a href="student.html"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo estudiante</a></li>
                                <li><a href="personal.html"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo personal administrativo</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Libros y catálogo <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                            <ul class="list-unstyled">
                                <li><a href="book.html"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo libro</a></li>
                                <li><a href="catalog.html"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Catálogo</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos y reservaciones <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                            <ul class="list-unstyled">
                                <li><a href="loan.html"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp; Todos los préstamos</a></li>
                                <li>
                                    <a href="loanpending.html"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp; Devoluciones pendientes <span class="label label-danger pull-right label-mhover">7</span></a>
                                </li>
                                <li>
                                    <a href="loanreservation.html"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp; Reservaciones <span class="label label-danger pull-right label-mhover">7</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="report.html"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes y estadísticas</a></li>
                        <li><a href="advancesettings.html"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp; Configuraciones avanzadas</a></li>
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
                                <a href="login/login.php"><button type="button" class="btn btn-info btn-lg"><i class="zmdi zmdi-account-circle"></i></button></a>
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
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-face"></i></div>
                    <div class="tile-name all-tittles">administradores</div>
                    <div class="tile-num full-reset">7</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-accounts"></i></div>
                    <div class="tile-name all-tittles">estudiantes</div>
                    <div class="tile-num full-reset">70</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-male-alt"></i></div>
                    <div class="tile-name all-tittles">docentes</div>
                    <div class="tile-num full-reset">11</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-male-female"></i></div>
                    <div class="tile-name all-tittles" style="width: 90%;">personal administrativo</div>
                    <div class="tile-num full-reset">17</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-truck"></i></div>
                    <div class="tile-name all-tittles">proveedores</div>
                    <div class="tile-num full-reset">21</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-book"></i></div>
                    <div class="tile-name all-tittles">libros</div>
                    <div class="tile-num full-reset">77</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-bookmark-outline"></i></div>
                    <div class="tile-name all-tittles">categorías</div>
                    <div class="tile-num full-reset">11</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-assignment-account"></i></div>
                    <div class="tile-name all-tittles">secciones</div>
                    <div class="tile-num full-reset">17</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-timer"></i></div>
                    <div class="tile-name all-tittles">reservaciones</div>
                    <div class="tile-num full-reset">10</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-time-restore"></i></div>
                    <div class="tile-name all-tittles" style="width: 90%;">devoluciones pendientes</div>
                    <div class="tile-num full-reset">9</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-calendar"></i></div>
                    <div class="tile-name all-tittles">préstamos</div>
                    <div class="tile-num full-reset">7</div>
                </article>
                <article class="tile">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-trending-up"></i></div>
                    <div class="tile-name all-tittles" style="width: 90%;">reportes y estadísticas</div>
                    <div class="tile-num full-reset">&nbsp;</div>
                </article>
            </section>
            <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                    </div>
                    <div class="modal-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam ipsa accusamus error. Animi mollitia corporis iusto.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                    </div>
                </div>
            </div>
            </div>
            <footer class="footer full-reset">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <h4 class="all-tittles">Acerca de</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam quam dicta et, ipsum quo. Est saepe deserunt, adipisci eos id cum, ducimus rem, dolores enim laudantium eum repudiandae temporibus sapiente.
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
                <div class="footer-copyright full-reset all-tittles">© 2023 Alejandro Torreblanca Menendez</div>
            </footer>
        </div>
    </body>
    </html>

<?php

    } else {
        echo "<script type='text/javascript'>window.location.href = '../Biblioteca/installer/index-install.php';</script>"; 
    }

?>