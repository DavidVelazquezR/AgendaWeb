<?php
include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();
$manipulaEscuelas = new manipulaEscuelas();

//Validacion BackEnd
if (isset($_POST['nameEscuela'])) {
        //EL formulario se lleno correctamente
        $query = $manipulaEscuelas->altaEscuela($_SESSION['IDUsuario'], $_POST['nameEscuela']);


        if ($query == "" || $query == null) {
                //Reset del methodo POST
                unset($_POST['nameEscuela']);

                include_once '/xampp/htdocs/CursoPHP/vistas/escuelas/escuelasHome.php';

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

                include_once '/xampp/htdocs/CursoPHP/vistas/escuelas/escuelasHome.php';

                echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se dio de alta la nueva escuela',
        'success'
        )
        </script>";
        }

} else {
        //EL formulario no se lleno correctamente

        //Reset del methodo POST
        unset($_POST['nameEscuela']);

        include_once '/xampp/htdocs/CursoPHP/vistas/escuelas/escuelasHome.php';

        echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Captura bien los datos de tu escuela...',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
}
