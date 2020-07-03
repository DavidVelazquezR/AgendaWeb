<?php
include_once '/xampp/htdocs/CursoPHP/includes/notas/manipulaNotas.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();
$manipulaNotas = new manipulaNotas();

//Validacion BackEnd
if (isset($_POST['title'])) {
        //EL formulario se lleno correctamente
        $query = $manipulaNotas->altaNotas(
                $_SESSION['IDUsuario'],
                $_POST['title'],
                $_POST['desc']
        );


        if ($query == "" || $query == null) {
                //Reset del methodo POST
                unset($_POST['nameEscuela']);

                include_once '/xampp/htdocs/CursoPHP/vistas/notas/notasHome.php';

                echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Este valor ya se encuentra ingresado :C',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
        } else {
                //Reset del methodo POST
                unset($_POST['nameEscuela']);

                include_once '/xampp/htdocs/CursoPHP/vistas/notas/notasHome.php';

                echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se guardo la nota',
        'success'
        )
        </script>";
        }
} else {
        //EL formulario no se lleno correctamente

        //Reset del methodo POST
        unset($_POST['nameEscuela']);

        include_once '/xampp/htdocs/CursoPHP/vistas/notas/notasHome.php';

        echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Captura bien los datos de tu escuela...',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
}
