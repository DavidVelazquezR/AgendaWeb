<?php
include_once '/xampp/htdocs/CursoPHP/includes/profesores/manipulaProfesores.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();

$manipulaProfesores = new manipulaProfesores();

//Validacion BackEnd
if (isset($_POST['nameProfe'])) {
        //EL formulario se lleno correctamente
        $query = $manipulaProfesores->altaProfesor(
                $_POST['idSem'],
                $_POST['nameProfe'],
                $_POST['apP'],
                $_POST['amP'],
                $_POST['telP'],
                $_POST['emailP']
        );

        if (!$query) {
                //Reset del methodo POST
                $_SESSION['Nav'] = 1;
                include_once '/xampp/htdocs/CursoPHP/vistas/semestres/semestresHome.php';

                echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Este valor ya se encuentra ingresado :C',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
        } else {
                //Reset del methodo POST
                $_SESSION['Nav'] = 1;
                include_once '/xampp/htdocs/CursoPHP/vistas/profesores/profesoresHome.php';

                echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se dio de alta el nuevo profesor',
        'success'
        )
        </script>";
        }

} else {
        //EL formulario no se lleno correctamente

        //Reset del methodo POST
        $_SESSION['Nav'] = 1;
        include_once '/xampp/htdocs/CursoPHP/vistas/profesores/profesoresHome.php';

        echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Captura bien los datos de tu profesor...',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
}
