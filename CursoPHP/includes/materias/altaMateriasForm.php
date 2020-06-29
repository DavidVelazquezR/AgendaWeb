<?php
include_once '/xampp/htdocs/CursoPHP/includes/materias/manipulaMaterias.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();

$manipulaMaterias = new manipulaMaterias();

//Validacion BackEnd
if (isset($_POST['nameMat'])) {
        //EL formulario se lleno correctamente
        $query = $manipulaMaterias->altaMateria(
                $_POST['idSem'],
                $_POST['nameMat']
        );

        if (!$query) {
                //Reset del methodo POST
                $_SESSION['Nav'] = 1;
                include_once '/xampp/htdocs/CursoPHP/vistas/materias/materiasHome.php';

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
                include_once '/xampp/htdocs/CursoPHP/vistas/materias/materiasHome.php';

                echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se dio de alta la nueva materia',
        'success'
        )
        </script>";
        }

} else {
        //EL formulario no se lleno correctamente

        //Reset del methodo POST
        $_SESSION['Nav'] = 1;
        include_once '/xampp/htdocs/CursoPHP/vistas/materias/materiasHome.php';

        echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Captura bien los datos de tu materia...',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
}
