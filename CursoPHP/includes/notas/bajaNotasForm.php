<?php
include_once '/xampp/htdocs/CursoPHP/includes/notas/manipulaNotas.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();
$manipulaNotas = new manipulaNotas();

//Validacion BackEnd
if ($_POST['baja'] != "" || $_POST['baja'] != null) {
    //Significa que se lleno el formulario correctamente
    $idnota = $_POST['idNota'];

    //No hay semestres enlazados, podemos borrar
    $data = $manipulaNotas->eliminaNotas($_SESSION['IDUsuario'], $idnota);
    include_once '/xampp/htdocs/CursoPHP/vistas/notas/notasHome.php';

    echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se elimino la nota correctamente',
        'success'
        )
        </script>";
} else {
    include_once '/xampp/htdocs/CursoPHP/vistas/notas/notasHome.php';
    echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Error al eliminar',
        text: 'Recargaste pero ya se elimino el dato',
        })
        </script>";
}
