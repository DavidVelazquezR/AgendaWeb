<?php
include_once '/xampp/htdocs/CursoPHP/includes/horarios/manipulaHorarios.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();
$manipulaHorarios = new manipulaHorarios();

//Validacion BackEnd
if ($_POST['bajaH'] != "" || $_POST['bajaH'] != null) {
    //Significa que se lleno el formulario correctamente

    //elimina el horario de la bd
    $arrayData2 = $manipulaHorarios->eliminaHorario($_POST['idhor']);

    $_SESSION['Nav'] = 1;
    include_once '/xampp/htdocs/CursoPHP/vistas/horarios/horariosHome.php';

    echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se elimino el horario correctamente',
        'success'
        )
        </script>";

}else{
    $_SESSION['Nav'] = 1;
    include_once '/xampp/htdocs/CursoPHP/vistas/horarios/horariosHome.php';
    echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Error al eliminar',
        text: 'Recargaste pero ya se elimino el dato',
        })
        </script>";
}

?>
