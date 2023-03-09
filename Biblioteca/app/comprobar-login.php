<?php
    /* Destruimos la sesión en caso de que existiera */
    session_start();
    session_destroy();

    include('database.php');
    session_start();

    if ($connection) {
        /* Si el usuario clickea en el botón de 'entrar como invitado', se le redirigirá a la página principal bajo la sesión de invitado */
        if(isset($_POST['invitado'])){
            $invitado = $_POST['invitado'];
            $_SESSION['invitado'] = $invitado;

            header("Location: ../index.php");
            exit;
        } else if(isset($_POST['correo'])) {
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];    

            if($correo && $contrasena){
                $query = "SELECT * FROM usuario WHERE correo = '$correo' and contrasena = '$contrasena'";
                $result = mysqli_query($connection, $query);

                if(mysqli_fetch_row($result) > 0){
                    $query = "SELECT * FROM usuario WHERE correo = '$correo' and contrasena = '$contrasena'";
                    $result = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_array($result)){
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['nombre'] = $row['nombre'];
                        $_SESSION['correo'] = $correo;

                        if($row['rol'] == 'alumno'){
                            $_SESSION['rol'] = 'alumno';
                            header("refresh:0;url=../index.php");
                        } else if($row['rol'] == 'admin') {
                            $admin = $_SESSION['admin'] = 'admin';
                            header("refresh:0;url=../admin/admin-index.php");
                        }
                    }

                    /* Si el correo y la contraseña resultan ser estos, se le redirigirá a la página de administrador */

                    /* En caso contrario, se recojerá los datos y se comproborá si el usuario está en la base de datos */

                    /* Si no está te devuelve a la página de login */

                } else {
                    header("Location: ../login/login-error.php");;
                }
            } else {
                header("Location: ../login/login-error.php");;
            }
        }
    
    } else {
        header("Location: ../installer/index-install.php");
    }
mysqli_close($connection);
?>