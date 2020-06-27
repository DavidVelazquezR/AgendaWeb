<?php
include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
include_once '/xampp/htdocs/CursoPHP/includes/semestres/manipulaSemestre.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$manipulaEscuelas = new manipulaEscuelas();
$arrayData = $manipulaEscuelas->consultaEscuela($_SESSION['IDUsuario']);
$idescuela = 0;
for ($i = 0; $i < count($arrayData); $i++) {
        if ((string) $arrayData[$i]->NombreEscuela == $_POST['CBEscuela']) {
                $flag = $i;
                $idescuela = $arrayData[$i]->IDEscuela;
        }
}

$userSession = new UserSession();
$manipulaSemestre = new manipulaSemestre();

//Validacion BackEnd
if (isset($_POST['CBSemestres'])) {
        //EL formulario se lleno correctamente
        $query = $manipulaSemestre->altaSemestre($_POST['idEscuela'], $_POST['CBSemestres']);


        if ($query == "" || $query == null) {
                //Reset del methodo POST

                include_once '/xampp/htdocs/CursoPHP/vistas/semestres/semetsresHome.php';

                echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Este valor ya se encuentra ingresado :C',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
        } else {
                //Reset del methodo POST

                include_once '/xampp/htdocs/CursoPHP/vistas/semestres/semetsresHome.php';

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

        include_once '/xampp/htdocs/CursoPHP/vistas/semestres/semetsresHome.php';

        echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Captura bien los datos de tu escuela...',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
}
