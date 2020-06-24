<?php
include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
include_once '/xampp/htdocs/CursoPHP/includes/semestres/manipulaSemestre.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();
$manipulaEscuelas = new manipulaEscuelas();
$manipulaSemestre = new manipulaSemestre();



//Validacion BackEnd
if ($_POST['baja'] != "" || $_POST['baja'] != null) {
    //Significa que se lleno el formulario correctamente
    $i = (int) $_POST['baja'];
    $s1 = $manipulaEscuelas->consultaEscuela($_SESSION['IDUsuario']);

    $ide = 0;

    $ide = (int) $s1[$i]->IDEscuela;

    $s2 = $manipulaSemestre->consultaSemestre($ide);

    if ($s2 == "" || $s2 == null) {
        //No hay semestres enlazados, podemos borrar
        $data = $manipulaEscuelas->eliminaEscuela($_SESSION['IDUsuario'], $ide);
        include_once '/xampp/htdocs/CursoPHP/vistas/home.php';

        echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se elimino la escuela correctamente',
        'success'
        )
        </script>";
        $_POST['baja'] = "";
        exit();
    } else {
        //Hay semestres, no podemos borrar

        include_once '/xampp/htdocs/CursoPHP/vistas/escuelas/escuelasHome.php';
        echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Error al eliminar',
        text: 'Asegurate de borrar los semestres enlazados de la escuela a eliminar',
        })
        </script>";
    }
} else {
    include_once '/xampp/htdocs/CursoPHP/vistas/escuelas/escuelasHome.php';
    echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Error al eliminar',
        text: 'Recargaste pero ya se elimino el dato',
        })
        </script>";
}
