$(document).ready(function() {

    let edit = false;
    console.log('jQuery is Working');
    fetchTasks();
    fetchTasksAlumno();
    fetchTasksAdmin();
    fetchTasksProfesor();
    fetchTasksLibro();

    /* USUARIOS */

    //Funcion que llama a los datos que estan registrados en mi base de datos.
    function fetchTasks() {
        $.ajax({
            url: '../app/user-list.php',
            type: 'GET',
            success: function (response) {
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                    template += `
                        <tr taskId="${task.id}">
                            <td><a href="#editar-user" class="task-item">${task.id}</td></a>
                            <td>${task.nombre}</td>
                            <td>${task.apellido}</td>
                            <td>${task.correo}</td>
                            <td>${task.contrasena}</td>
                            <td>${task.telefono}</td>
                            <td>${task.rol}</td>
                            <td>
                                <img src="../assets/icons/trash.svg" class="task-delete" value="Borrar">
                            </td>
                        </tr>
                    `
                });
                $('#tasks').html(template);
            }
        });
    }

    //Funcion que me permite eliminar un alumno por su id sin necesidad de recargar la pagina.
    $(document).on('click', '.task-delete', function () {
        //Muestro un alert para confirmar eliminar el alumno.
        if (confirm('¿Quieres eliminar este alumno?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskId');
            $.post('../app/user-delete.php', {id}, function (response) {
                fetchTasks();
            });
        }
    });

    //Funcion que me permite editar un alumno sin necesidad de recargar la pagina.
    $(document).on('click', '.task-item', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        $.post('../app/user-single.php', {id}, function (response) {
            const task = JSON.parse(response);
            $('#nombre').val(task.nombre);
            $('#apellido').val(task.apellido);
            $('#correo').val(task.correo);
            $('#contrasena').val(task.contrasena);
            $('#telefono').val(task.telefono);
            $('#rol').val(task.rol);
            $('#taskId').val(task.id);
            edit = true;
        })
    });

    /* ADMINISTRADORES */

    //Funcion que llama a los datos que estan registrados en mi base de datos.
    function fetchTasksAdmin() {
        $.ajax({
            url: '../app/admin-list.php',
            type: 'GET',
            success: function (response) {
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                    template += `
                        <tr taskId="${task.id}">
                            <td><a href="#editar-user" class="task-item">${task.id}</td></a>
                            <td>${task.nombre}</td>
                            <td>${task.apellido}</td>
                            <td>${task.correo}</td>
                            <td>${task.contrasena}</td>
                            <td>${task.telefono}</td>
                            <td>${task.rol}</td>
                            <td>
                                <img src="../assets/icons/trash.svg" class="task-delete" value="Borrar">
                            </td>
                        </tr>
                    `
                });
                $('#tasksAdmin').html(template);
            }
        });
    }

    /* ALUMNOS */

    //Funcion que llama a los datos que estan registrados en mi base de datos.
    function fetchTasksAlumno() {
        $.ajax({
            url: '../app/alumno-list.php',
            type: 'GET',
            success: function (response) {
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                    template += `
                        <tr taskId="${task.id}">
                            <td><a href="#editar-user" class="task-item">${task.id}</td></a>
                            <td>${task.nombre}</td>
                            <td>${task.apellido}</td>
                            <td>${task.correo}</td>
                            <td>${task.contrasena}</td>
                            <td>${task.telefono}</td>
                            <td>${task.rol}</td>
                            <td>
                                <img src="../assets/icons/trash.svg" class="task-delete" value="Borrar">
                            </td>
                        </tr>
                    `
                });
                $('#tasksAlumno').html(template);
            }
        });
    }

    /* PROFESORES */

    //Funcion que llama a los datos que estan registrados en mi base de datos.
    function fetchTasksProfesor() {
        $.ajax({
            url: '../app/profesor-list.php',
            type: 'GET',
            success: function (response) {
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                    template += `
                        <tr taskId="${task.id}">
                            <td><a href="#editar-user" class="task-item">${task.id}</td></a>
                            <td>${task.nombre}</td>
                            <td>${task.apellido}</td>
                            <td>${task.correo}</td>
                            <td>${task.contrasena}</td>
                            <td>${task.telefono}</td>
                            <td>${task.rol}</td>
                            <td>
                                <img src="../assets/icons/trash.svg" class="task-delete" value="Borrar">
                            </td>
                        </tr>
                    `
                });
                $('#tasksProfesor').html(template);
            }
        });
    }

    /* LIBROS */

    //Funcion que llama a los datos que estan registrados en mi base de datos.
    function fetchTasksLibro() {
        $.ajax({
            url: '../app/libro-list.php',
            type: 'GET',
            success: function (response) {
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                    template += `
                        <tr taskId="${task.id}">
                            <td><a href="#editar-libro" class="task-item">${task.id}</td></a>
                            <td>${task.imagen}</td>
                            <td>${task.titulo}</td>
                            <td>${task.autor}</td>
                            <td>${task.isbn}</td>
                            <td>${task.resumen}</td>
                            <td>${task.formato}</td>
                            <td>
                                <img src="../assets/icons/trash.svg" class="task-delete-libro" value="Borrar">
                            </td>
                        </tr>
                    `
                });
                $('#tasksLibro').html(template);
            }
        });
    }

    //Funcion que me permite eliminar un libro por su id sin necesidad de recargar la pagina.
    $(document).on('click', '.task-delete-libro', function () {
        //Muestro un alert para confirmar eliminar el libro.
        if (confirm('¿Quieres eliminar este libro?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskId');
            $.post('../app/libro-delete.php', {id}, function (response) {
                fetchTasksLibro();
            });
        }
    });

    //Funcion que me permite editar un libro sin necesidad de recargar la pagina.
    $(document).on('click', '.task-item', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        $.post('../app/libro-single.php', {id}, function (response) {
            const task = JSON.parse(response);
            $('#imagen').val(task.imagen);
            $('#titulo').val(task.titulo);
            $('#autor').val(task.autor);
            $('#isbn').val(task.isbn);
            $('#resumen').val(task.resumen);
            $('#formato').val(task.formato);
            $('#taskId').val(task.id);
            edit = true;
        })
    });
});

